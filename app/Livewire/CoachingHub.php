<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\CoachingVideo;

#[Title('Coaching Hub')]
class CoachingHub extends Component
{
    public $category = '';
    public $search = '';

    public function render()
    {
        $videos = CoachingVideo::with('trainer.user')
            ->when($this->category, fn($q) => $q->where('category', $this->category))
            ->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%'))
            ->get();

        $categories = CoachingVideo::distinct()->pluck('category');

        return view('livewire.coaching-hub', [
            'videos' => $videos,
            'categories' => $categories,
            'featured' => CoachingVideo::where('is_featured', true)->first(),
        ])->layout('components.layouts.app');
    }
}