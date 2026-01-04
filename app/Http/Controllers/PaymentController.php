<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'receipt' => 'required|image|max:5120', // Max 5MB
        ]);

        $user = Auth::user();
        $plan = Plan::findOrFail($request->plan_id);

        if ($request->hasFile('receipt')) {
            $path = $request->file('receipt')->store('receipts', 'public');

            \App\Models\PaymentTransaction::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'amount' => $plan->price,
                'receipt_path' => $path,
                'status' => 'pending',
            ]);
        }

        return redirect()->route('dashboard')->with('message', 'Receipt uploaded successfully! Your plan will be activated once verified by our team.');
    }
}
