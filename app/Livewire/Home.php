<?php

namespace App\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use App\Models\Status;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    public $status;
    public $category;

    #[On('status-filter')]
    public function status($status)
    {
        $this->resetPage();
        $this->status = $status;
    }
    #[On('category-filter')]
    public function category($category)
    {
        $this->resetPage();
        $this->category = $category;
    }


    #[On('idea-created')]
    public function render()
    {
        $statuses = Status::all()->pluck('id', 'name');
        return view('livewire.home', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->when(($this->status && $this->status !== 'All'), function ($query) use ($statuses) {
                    return $query->where('status_id', $statuses->get($this->status));
                })->when(($this->category), function ($query) {
                    return $query->where('category_id', $this->category);
                })
                ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')])
                ->withCount('votes')
                ->orderBy('id', 'desc')
                ->paginate(Idea::PAGINATION_COUNT),
        ]);
    }
}
