<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    #[On('idea-created')]
    public function render()
    {
        return view('livewire.home', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->latest()
                ->paginate(Idea::PAGINATION_COUNT),
        ]);
    }
}
