<x-mail::message>
    # New Contact Form Submission

    You have received a new message from the contact form:

    **From:** {{ $data['name'] }} ({{ $data['email'] }})

    **Message:**
    {{ $data['message'] }}

    <x-mail::button :url="'mailto:' . $data['email']">
        Reply to {{ $data['name'] }}
    </x-mail::button>

    Regards,
    {{ config('app.name') }}
</x-mail::message>