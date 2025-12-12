<div>
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold mb-4">Our Professional Trainers</h1>
        <p class="text-lg text-gray-600">Experts dedicated to helping you achieve your fitness goals.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($trainers as $trainer)
            <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow duration-300">
                <figure class="px-10 pt-10">
                    <div class="avatar placeholder">
                        <div
                            class="bg-neutral-focus text-neutral-content rounded-full w-32 h-32 flex items-center justify-center text-4xl font-bold">
                            {{ substr($trainer->user->name, 0, 1) }}
                        </div>
                    </div>
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">{{ $trainer->user->name }}</h2>
                    <p class="text-primary font-semibold">{{ $trainer->specialties }}</p>
                    <p class="mt-2 text-gray-600 text-sm">{{ $trainer->bio }}</p>
                    <div class="card-actions mt-4">
                        <button class="btn btn-primary btn-sm">Book a Class</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>