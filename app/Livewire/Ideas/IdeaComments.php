<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use Livewire\Attributes\On;
use Livewire\Component;

class IdeaComments extends Component
{
    public Idea $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    #[On('comment-added')]
    public function render()
    {
        return view('livewire.ideas.idea-comments', [
            'comments' => $this->idea->comments->load('user:id,name')
        ]);
    }
}
