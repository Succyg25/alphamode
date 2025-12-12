<div class="max-w-4xl mx-auto py-12">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-8">Manage Subscription</h2>

            <div class="stats shadow w-full mb-8">
                <div class="stat">
                    <div class="stat-title">Current Plan</div>
                    <div class="stat-value text-primary">Gold Member</div>
                    <div class="stat-desc">Next billing date: {{ date('M d, Y', strtotime('+1 month')) }}</div>
                </div>
            </div>

            <h3 class="font-bold text-lg mb-4">Billing History</h3>
            <table class="table w-full mb-8">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ date('M d, Y') }}</td>
                        <td>$49.99</td>
                        <td><span class="badge badge-success">Paid</span></td>
                    </tr>
                </tbody>
            </table>

            <div class="card-actions justify-end gap-4">
                <button class="btn btn-outline btn-error">Cancel Subscription</button>
                <button class="btn btn-primary">Upgrade Plan</button>
            </div>
        </div>
    </div>
</div>