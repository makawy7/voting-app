<?php

namespace App\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use App\Models\Status;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Title('Voting App')]
class Home extends Component
{
    use WithPagination;

    #[Url(as: 'status')]
    public $status;

    #[Url(as: 'category')]
    public $category;

    #[Url()]
    public $filter;

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
    #[On('additional-filter')]
    public function filter($filter)
    {
        if ($filter === 'My Ideas' && !auth()->check()) {
            return $this->redirect(route('login'), navigate: true);
        }
        $this->resetPage();
        $this->filter = $filter;
    }
    #[On('idea-created')]
    public function render()
    {
        $statuses = Status::all()->pluck('id', 'name');
        $categories = Category::all()->pluck('id', 'name');
        return view('livewire.home', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->when(($this->status && $this->status !== 'All'), function ($query) use ($statuses) {
                    return $query->where('status_id', $statuses->get($this->status));
                })->when(($this->category && $this->category !== 'All'), function ($query) use ($categories) {
                    return $query->where('category_id', $categories->get($this->category));
                })->when(($this->filter && $this->filter === 'Top Voted'), function ($query) {
                    return $query->orderByDesc('votes_count');
                })->when(($this->filter && $this->filter === 'My Ideas' && auth()->check()), function ($query) {
                    return $query->where('user_id', auth()->id());
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
