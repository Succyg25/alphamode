<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentReceived;

class PaymentController extends Controller
{
    public function show($planId)
    {
        $plan = Plan::findOrFail($planId);
        $user = Auth::user();

        // Split name into parts for display
        $nameParts = explode(' ', $user->name);
        $firstName = array_shift($nameParts);
        $lastName = array_pop($nameParts); // If only one name, this might be null, handle carefully
        $middleName = implode(' ', $nameParts);

        if (!$lastName && $firstName) {
            // If user only has one name, use it as first name.
            // (Logic above: if explode gives 1 element, firstName has it, lastName is null)
        }

        $data = [
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'last_name' => $lastName,
            'email' => $user->email,
        ];

        return view('payment.checkout', [
            'amount' => $plan->price,
            'planName' => $plan->name,
            'planId' => $plan->id,
            'data' => $data,
        ]);
    }

    public function process(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'payment_method' => 'required|in:card,manual',
            'receipt' => 'required_if:payment_method,manual|image|max:5120',
        ]);

        $user = Auth::user();
        $plan = Plan::findOrFail($request->plan_id);
        $method = $request->payment_method;

        if ($method === 'manual') {
            if ($request->hasFile('receipt')) {
                $path = $request->file('receipt')->store('receipts', 'public');

                $transaction = \App\Models\PaymentTransaction::create([
                    'user_id' => $user->id,
                    'plan_id' => $plan->id,
                    'amount' => $plan->price,
                    'receipt_path' => $path,
                    'status' => 'pending',
                    'payment_method' => 'manual',
                ]);

                $user->membership_status = 'pending';
                $user->save();

                Mail::to($user->email)->queue(new PaymentReceived($transaction));

                return redirect()->route('dashboard')->with('message', 'Receipt uploaded successfully! Your plan will be activated once verified by our team.');
            }
        } elseif ($method === 'card') {
            // Simulate successful card payment auth
            $transaction = \App\Models\PaymentTransaction::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'amount' => $plan->price,
                'status' => 'approved',
                'payment_method' => 'card',
                // receipt_path is null for card
            ]);

            // Auto-approve for card payments
            $user->current_plan_id = $plan->id;
            $user->membership_status = 'active';
            $user->save();

            Mail::to($user->email)->queue(new PaymentReceived($transaction));

            return redirect()->route('dashboard')->with('message', 'Payment successful! Your ' . $plan->name . ' plan is now active.');
        }

        return back()->withErrors(['error' => 'Invalid payment request.']);
    }
}
