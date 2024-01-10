<?php

namespace App\Livewire;

use App\Models\Idea;
use App\Models\Vote;
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
                ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')])
                ->withCount('votes')
                ->orderBy('id', 'desc')
                ->paginate(Idea::PAGINATION_COUNT),
        ]);
    }
}
