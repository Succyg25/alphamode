<div>
    <h1 class="text-3xl font-bold mb-8">Dashboard Overview</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Members Card -->
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
            <div class="text-gray-500">Total Members</div>
            <div class="text-3xl font-bold">{{ $totalMembers }}</div>
        </div>

        <!-- Trainers Card -->
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
            <div class="text-gray-500">Total Trainers</div>
            <div class="text-3xl font-bold">{{ $totalTrainers }}</div>
        </div>

        <!-- Plans Card -->
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-purple-500">
            <div class="text-gray-500">Active Plans</div>
            <div class="text-3xl font-bold">{{ $totalPlans }}</div>
        </div>

        <!-- Classes Card -->
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-orange-500">
            <div class="text-gray-500">Workout Classes</div>
            <div class="text-3xl font-bold">{{ $totalClasses }}</div>
        </div>
    </div>
</div>