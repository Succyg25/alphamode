<x-mail::message>
    # Payment Proof Received

    Hi {{ $transaction->user->name }},

    Thank you for choosing **AlphaMode**. We have received your payment proof for the **{{ $transaction->plan->name }}**
    plan.

    Our team is currently verifying your transaction. You will receive another email once your membership has been
    activated.

    <x-mail::panel>
        **Transaction Details:**
        - **Plan:** {{ $transaction->plan->name }}
        - **Amount:** {{ number_format($transaction->amount, 2) }}
        - **Status:** Pending Verification
    </x-mail::panel>

    If you have any questions, feel free to reply to this email.

    Thanks,
    {{ config('app.name') }}
</x-mail::message>