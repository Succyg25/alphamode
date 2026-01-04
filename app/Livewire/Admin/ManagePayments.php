<?php

namespace App\Livewire\Admin;

use App\Models\PaymentTransaction;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentApproved;
use App\Mail\PaymentRejected;

#[Title('Manage Payments')]
class ManagePayments extends Component
{
    use WithPagination;

    public $search = '';
    public $status = 'pending';

    public function approve($transactionId)
    {
        $transaction = PaymentTransaction::findOrFail($transactionId);

        // Update user plan and status
        $user = $transaction->user;
        $user->current_plan_id = $transaction->plan_id;
        $user->membership_status = 'active';
        $user->save();

        // Update transaction status
        $transaction->status = 'approved';
        $transaction->save();

        // Send approval email
        Mail::to($user->email)->send(new PaymentApproved($transaction));

        session()->flash('message', 'Payment approved and membership activated.');
    }

    public function reject($transactionId)
    {
        $transaction = PaymentTransaction::findOrFail($transactionId);
        $transaction->status = 'rejected';
        $transaction->save();

        // Update user status
        $user = $transaction->user;
        $user->membership_status = 'inactive';
        $user->save();

        // Send rejection email
        Mail::to($transaction->user->email)->send(new PaymentRejected($transaction));

        session()->flash('message', 'Payment rejected.');
    }

    public function render()
    {
        $transactions = PaymentTransaction::with(['user', 'plan'])
            ->where('status', $this->status)
            ->where(function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.manage-payments', [
            'transactions' => $transactions
        ])->layout('components.layouts.admin');
    }
}
