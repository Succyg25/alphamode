<div>
    <div class="text-center mb-16">
        <h1 class="text-4xl font-bold mb-4">Membership Plans</h1>
        <p class="text-lg text-gray-600">Choose a plan that fits your lifestyle and fitness goals.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        @foreach($plans as $plan)
            <div
                class="card bg-base-100 shadow-xl border-t-8 border-primary hover:scale-105 transition-transform duration-300">
                <div class="card-body items-center text-center">
                    <h2 class="card-title text-2xl uppercase tracking-widest">{{ $plan->name }}</h2>
                    <div class="my-6">
                        <span class="text-5xl font-extrabold">${{ floor($plan->price) }}</span>
                        <span class="text-xl text-gray-500">.{{ substr(number_format($plan->price, 2), -2) }}</span>
                    </div>
                    <p class="text-gray-500 mb-6 font-semibold">{{ $plan->duration_days }} Days Access</p>

                    <div class="w-full border-t border-gray-200 my-4"></div>

                    <p class="mb-8 text-gray-600">{{ $plan->description }}</p>

                    <div class="card-actions w-full">
                        <button class="btn btn-primary btn-block rounded-full">Choose {{ $plan->name }}</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>