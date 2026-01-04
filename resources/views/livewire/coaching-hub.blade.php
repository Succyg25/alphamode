<div class="py-12 bg-base-200 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-base-content sm:text-5xl tracking-tight mb-4">
                Coaching <span class="text-primary">Hub</span>
            </h1>
            <p class="text-xl text-base-content/70 max-w-2xl mx-auto">
                Master your technique with our daily professional coaching videos and expert tutorials.
            </p>
        </div>

        <!-- Featured Video (Spotlight) -->
        @if($featured)
            <div class="mb-16 relative group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-primary to-secondary rounded-3xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200">
                </div>
                <div class="relative bg-base-100 rounded-3xl overflow-hidden shadow-2xl flex flex-col lg:flex-row">
                    <div class="lg:w-2/3 aspect-video bg-neutral flex items-center justify-center">
                        <iframe class="w-full h-full" src="{{ $featured->video_url }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="lg:w-1/3 p-8 flex flex-col justify-center">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-primary/10 text-primary mb-4 w-fit">
                            Featured Video
                        </span>
                        <h2 class="text-3xl font-bold mb-4">{{ $featured->title }}</h2>
                        <p class="text-base-content/70 mb-6 line-clamp-4">
                            {{ $featured->description }}
                        </p>
                        <div class="flex items-center gap-4 border-t border-base-content/10 pt-6">
                            <img src="{{ $featured->trainer->user->profile_photo_url }}"
                                class="w-12 h-12 rounded-full border-2 border-primary" alt="">
                            <div>
                                <p class="font-bold">{{ $featured->trainer->user->name }}</p>
                                <p class="text-sm opacity-60">Master Trainer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Filters & Search -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12">
            <div class="flex flex-wrap gap-2">
                <button wire:click="$set('category', '')"
                    class="btn btn-sm {{ $category == '' ? 'btn-primary' : 'btn-ghost' }}">
                    All Videos
                </button>
                @foreach($categories as $cat)
                    <button wire:click="$set('category', '{{ $cat }}')"
                        class="btn btn-sm {{ $category == $cat ? 'btn-primary' : 'btn-ghost' }}">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>

            <div class="relative w-full md:w-80">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-base-content/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input wire:model.live.debounce.300ms="search" type="text"
                    class="input input-bordered w-full pl-10 bg-base-100 rounded-full" placeholder="Search videos...">
            </div>
        </div>

        <!-- Video Library Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($videos as $video)
                <div
                    class="card bg-base-100 shadow-xl hover:shadow-2xl transition hover:-translate-y-1 overflow-hidden group border border-base-content/5">
                    <figure class="relative aspect-video">
                        <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}" class="w-full h-full object-cover">
                        <div
                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <button
                                class="btn btn-circle btn-primary btn-lg scale-75 group-hover:scale-100 transition duration-300">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <span
                            class="absolute bottom-2 right-2 px-2 py-1 bg-black/70 text-white text-[10px] rounded font-bold">
                            {{ $video->duration }}
                        </span>
                    </figure>
                    <div class="card-body p-6">
                        <div class="flex justify-between items-start mb-2">
                            <span
                                class="text-[10px] font-bold uppercase tracking-widest text-primary">{{ $video->category }}</span>
                            <div class="flex items-center gap-1 text-[10px] opacity-60">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                {{ rand(100, 999) }}
                            </div>
                        </div>
                        <h3 class="card-title text-lg mb-2 line-clamp-1">{{ $video->title }}</h3>
                        <p class="text-sm text-base-content/60 line-clamp-2 mb-4">
                            {{ $video->description }}
                        </p>
                        <div class="card-actions justify-between items-center mt-auto pt-4 border-t border-base-content/5">
                            <div class="flex items-center gap-2">
                                <img src="{{ $video->trainer->user->profile_photo_url }}" class="w-8 h-8 rounded-full"
                                    alt="">
                                <span class="text-xs font-medium">{{ $video->trainer->user->name }}</span>
                            </div>
                            <a href="{{ route('booking', $video->trainer->id) }}"
                                class="btn btn-ghost btn-xs text-primary hover:bg-primary/10">
                                Book Coach
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <div class="text-6xl mb-4">📹</div>
                    <h3 class="text-2xl font-bold mb-2">No videos found</h3>
                    <p class="opacity-60">Try adjusting your filters or search keywords.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>