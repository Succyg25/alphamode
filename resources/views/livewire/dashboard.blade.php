<div class="text-center py-16">


    {{-- Flash Message --}}
    @if (session()->has('feedback'))
        <div role="alert" class="alert alert-primary alert-soft">
            <span>{{ session('feedback') }}</span>
        </div>
    @endif
    <h1 class="text-4xl font-bold text-primary">
        Welcome, {{ $user->username }} 👋
    </h1>
    <br>

    <p>Welcome to the dashboard! You are successfully logged in.</p>


    <a href="{{ route('plans') }}" class="btn btn-primary mt-8 px-8 rounded-xl">
        Explore Membership Plans
    </a>

</div>