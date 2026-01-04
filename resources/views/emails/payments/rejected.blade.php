<x-mail::message>
    # Payment Verification Failed

    Hi {{ $transaction->user->name }},

    We were unable to verify your payment proof for the **{{ $transaction->plan->name }}** plan. As a result, your
    transaction has been rejected.

    This could be due to an unclear image or mismatching transaction details.

    <x-mail::button :url="route('payment.show', $transaction->plan_id)">
        Re-upload Payment Proof
    </x-mail::button>

    If you believe this is a mistake, please reach out to our support team.

    Thanks,
    {{ config('app.name') }}
</x-mail::message>