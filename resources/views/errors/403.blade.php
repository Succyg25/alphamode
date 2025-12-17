@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message')
    <div class="flex flex-col items-center gap-4">
        <p>{{ __($exception->getMessage() ?: 'Forbidden') }}</p>
        @guest
            <p class="text-sm text-gray-500">Redirecting to login in 3 seconds...</p>
            <script>
                setTimeout(() => {
                    window.location.href = "{{ route('login', ['feedback' => 'Please log in first']) }}";
                }, 3000);
            </script>
        @endguest
    </div>
@endsection