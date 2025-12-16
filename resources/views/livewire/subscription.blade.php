<div class="max-w-4xl mx-auto py-12">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            @if(Auth::user()->currentPlan)
                <h2 class="card-title text-2xl mb-8">Manage Subscription</h2>

                <div class="stats shadow w-full mb-8">
                    <div class="stat">
                        <div class="stat-title">Current Plan</div>
                        <div class="stat-value text-primary">{{ Auth::user()->currentPlan->name }}</div>
                        <div class="stat-desc">Duration: {{ Auth::user()->currentPlan->duration_days }} days</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title">Price</div>
                        <div class="stat-value text-secondary">${{ number_format(Auth::user()->currentPlan->price, 2) }}
                        </div>
                    </div>
                </div>

                <div class="card-actions justify-end gap-4">
                    <button wire:click="cancelSubscription"
                        wire:confirm="Are you sure you want to cancel your subscription?" class="btn btn-outline btn-error">
                        Cancel Subscription
                    </button>
                    <a href="{{ route('plans') }}" class="btn btn-primary">Switch Plan</a>
                </div>
            @else
                <h2 class="card-title text-2xl mb-8">No Active Subscription</h2>
                <div class="alert alert-warning mb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>You are not currently subscribed to any plan.</span>
                </div>
                <div class="card-actions justify-end gap-4">
                    <a href="{{ route('plans') }}" class="btn btn-primary">Browse Plans</a>
                </div>
            @endif
        </div>
    </div>
</div>