<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
    use WithPagination;
    public Idea $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    #[On('comment-added')]
    public function commentAdded()
    {
        $this->idea->refresh();
        $this->gotoPage($this->idea->comments()->paginate()->lastPage());
    }

    public function render()
    {
        return view('livewire.ideas.idea-comments', [
            'comments' => $this->idea->comments()->with('user:id,name')->paginate()->withQueryString()
        ]);
    }
}
