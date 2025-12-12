<div>
    <!-- Hero Section -->
    <div class="hero min-h-[50vh] bg-base-100 rounded-3xl shadow-xl overflow-hidden mb-12"
        style="background-image: url('https://images.unsplash.com/photo-1540497077202-7c8a3999166f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold text-white">AlphaMode Fitness</h1>
                <p class="mb-5 text-gray-100">Elevate your fitness journey with world-class trainers and personalized
                    plans. Join us today and transform your life.</p>
                <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body items-center text-center">
                <h2 class="card-title">Expert Trainers</h2>
                <p>Work with the best in the industry to achieve your goals.</p>
            </div>
        </div>
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body items-center text-center">
                <h2 class="card-title">Flexible Schedules</h2>
                <p>Book classes that fit your busy lifestyle, anytime, anywhere.</p>
            </div>
        </div>
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body items-center text-center">
                <h2 class="card-title">Modern Facilities</h2>
                <p>Track your progress with our state-of-the-art digital portal.</p>
            </div>
        </div>
    </div>

    <!-- Featured Plans -->
    <h2 class="text-3xl font-bold text-center mb-8">Popular Membership Plans</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        @foreach($plans as $plan)
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body items-center text-center">
                    <h2 class="card-title text-2xl">{{ $plan->name }}</h2>
                    <p class="text-4xl font-bold my-4">${{ $plan->price }}</p>
                    <p class="text-gray-500 mb-4">{{ $plan->duration_days }} Days Access</p>
                    <p class="mb-4">{{ Str::limit($plan->description, 100) }}</p>
                    <div class="card-actions">
                        <a href="{{ route('plans') }}" class="btn btn-outline btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Featured Trainers -->
    <h2 class="text-3xl font-bold text-center mb-8">Meet Our Trainers</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($featuredTrainers as $trainer)
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body items-center text-center">
                    <div class="avatar placeholder mb-4">
                        <div
                            class="bg-neutral-focus text-neutral-content rounded-full w-24 h-24 flex items-center justify-center text-3xl font-bold">
                            {{ substr($trainer->user->name, 0, 1) }}
                        </div>
                    </div>
                    <h2 class="card-title">{{ $trainer->user->name }}</h2>
                    <p class="italic text-primary">{{ $trainer->specialties }}</p>
                    <p class="mt-2 text-sm">{{ Str::limit($trainer->bio, 80) }}</p>
                    <div class="card-actions mt-4">
                        <a href="{{ route('trainers') }}" class="btn btn-ghost btn-sm">View Profile</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>