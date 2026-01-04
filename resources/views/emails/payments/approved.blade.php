<x-mail::message>
    # Membership Activated! 🎉

    Hi {{ $transaction->user->name }},

    Great news! Your payment for the **{{ $transaction->plan->name }}** plan has been verified and approved.

    Your premium features are now active. You can now access all the exclusive content and services included in your
    plan.

    <x-mail::button :url="route('dashboard')">
        Go to Dashboard
    </x-mail::button>

    <x-mail::panel>
        **Plan Details:**
        - **Plan:** {{ $transaction->plan->name }}
        - **Amount:** {{ number_format($transaction->amount, 2) }}
        - **Status:** Approved & Active
    </x-mail::panel>

    Welcome to the **AlphaMode** family!

    Thanks,
    {{ config('app.name') }}
</x-mail::message>