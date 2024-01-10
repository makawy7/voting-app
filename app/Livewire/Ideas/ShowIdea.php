<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use Livewire\Component;

class ShowIdea extends Component
{
    public Idea $idea;
    public $votedByUser;
    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->votedByUser = $idea->hasVoted(auth()->user());
    }

    public function vote()
    {
        if (!auth()->check()) {
            return $this->redirect(route('login'), navigate: true);
        }

        if ($this->votedByUser) {
            $this->idea->unVote(auth()->user());
            $this->votedByUser = false;
        } else {
            $this->idea->vote(auth()->user());
            $this->votedByUser = true;
        }

        $this->render();
    }
    public function render()
    {
        return view('livewire.ideas.show-idea');
    }
}
