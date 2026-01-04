<div class="py-12 bg-base-200 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-6">
            <div>
                <h1 class="text-4xl font-extrabold text-base-content tracking-tight">
                    Manual <span class="text-primary">Payments</span>
                </h1>
                <p class="text-base-content/60 mt-2 font-medium">Verify pending receipts and activate memberships.</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                <div class="relative flex-grow">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-base-content/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input wire:model.live.debounce.300ms="search" type="text"
                        class="input input-bordered w-full pl-10 bg-base-100 rounded-2xl"
                        placeholder="Search members...">
                </div>

                <select wire:model.live="status" class="select select-bordered bg-base-100 rounded-2xl">
                    <option value="all">All</option>
                    <option value="pending">Pending Approval</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success shadow-xl rounded-2xl mb-8 border-none bg-success/20 text-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-bold uppercase tracking-widest text-xs">{{ session('message') }}</span>
            </div>
        @endif

        <div class="bg-base-100 rounded-3xl shadow-2xl border border-base-content/5 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="table table-lg w-full">
                    <thead>
                        <tr class="bg-base-200/50 text-base-content/70">
                            <th class="font-bold uppercase tracking-wider text-[11px]">Member</th>
                            <th class="font-bold uppercase tracking-wider text-[11px]">Plan</th>
                            <th class="font-bold uppercase tracking-wider text-[11px]">Amount</th>
                            <th class="font-bold uppercase tracking-wider text-[11px]">Receipt</th>
                            <th class="font-bold uppercase tracking-wider text-[11px]">Date</th>
                            <th class="font-bold uppercase tracking-wider text-[11px]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-base-content/5">
                        @forelse($transactions as $transaction)
                            <tr class="hover:bg-base-200/30 transition-colors">
                                <td>
                                    <div class="flex items-center gap-4">
                                        <div class="avatar">
                                            <div class="w-12 h-12 rounded-2xl">
                                                <img src="{{ $transaction->user->profile_photo_url }}" alt="">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold text-base-content">{{ $transaction->user->name }}</div>
                                            <div class="text-xs opacity-50">{{ $transaction->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span
                                        class="badge badge-primary badge-outline font-bold px-3 py-1 h-auto text-[10px] uppercase tracking-wider">
                                        {{ $transaction->plan->name }}
                                    </span>
                                </td>
                                <td class="font-display font-bold text-lg">
                                    ${{ number_format($transaction->amount, 2) }}
                                </td>
                                <td>
                                    <a href="{{ asset('storage/' . $transaction->receipt_path) }}" target="_blank"
                                        class="btn btn-ghost btn-sm text-primary hover:bg-primary/10 gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        View File
                                    </a>
                                </td>
                                <td class="text-sm opacity-60">
                                    {{ $transaction->created_at->format('M d, Y') }}
                                </td>
                                <td>
                                    @if($transaction->status === 'pending')
                                        <div class="flex gap-2">
                                            <button wire:click="approve({{ $transaction->id }})"
                                                class="btn btn-success btn-sm rounded-xl text-success-content hover:scale-105 transition-transform">
                                                Approve
                                            </button>
                                            <button wire:click="reject({{ $transaction->id }})"
                                                class="btn btn-error btn-sm rounded-xl text-error-content hover:scale-105 transition-transform">
                                                Reject
                                            </button>
                                        </div>
                                    @else
                                        <span
                                            class="badge {{ $transaction->status === 'approved' ? 'badge-success' : 'badge-error' }} badge-md font-bold uppercase tracking-wider text-[10px]">
                                            {{ $transaction->status }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-20 text-center text-base-content/40">
                                    <div class="text-5xl mb-4">📫</div>
                                    <h3 class="text-xl font-bold">No payments found</h3>
                                    <p>Adjust your search/filters or wait for new transactions.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-6 bg-base-200/50">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</div>