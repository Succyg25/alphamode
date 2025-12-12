<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }} - AlphaMode</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex flex-col">
            <div class="h-16 flex items-center justify-center font-bold text-xl border-b border-gray-800">
                AlphaMode Admin
            </div>
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : '' }}">Dashboard</a>
                <a href="{{ route('admin.trainers') }}"
                    class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.trainers') ? 'bg-gray-800' : '' }}">Trainers</a>
                <a href="{{ route('admin.plans') }}"
                    class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.plans') ? 'bg-gray-800' : '' }}">Membership
                    Plans</a>
                <a href="{{ route('admin.classes') }}"
                    class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.classes') ? 'bg-gray-800' : '' }}">Workout
                    Classes</a>
                <a href="{{ route('admin.schedules') }}"
                    class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.schedules') ? 'bg-gray-800' : '' }}">Schedule</a>
            </nav>
            <div class="p-4 border-t border-gray-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 rounded hover:bg-red-700 text-red-400">Logout</button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            {{ $slot }}
        </main>
    </div>
</body>

</html>