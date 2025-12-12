<div class="max-w-4xl mx-auto py-12">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-8">Edit Profile</h2>

            <div class="form-control w-full max-w-xs mb-4">
                <label class="label">
                    <span class="label-text">Name</span>
                </label>
                <input type="text" value="{{ $name }}" class="input input-bordered w-full max-w-xs" disabled />
                <label class="label">
                    <span class="label-text-alt text-warning">Editing disabled in this demo</span>
                </label>
            </div>

            <div class="form-control w-full max-w-xs mb-4">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="text" value="{{ $email }}" class="input input-bordered w-full max-w-xs" disabled />
            </div>

            <div class="card-actions justify-end mt-8">
                <button class="btn btn-primary" disabled>Save Changes</button>
            </div>
        </div>
    </div>
</div>