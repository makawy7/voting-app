<?php

namespace App\Livewire\Ideas;

use App\Livewire\Traits\WithAuthRedirects;
use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\On;

class IdeaCard extends Component
{
    use WithAuthRedirects;

    public $idea;
    public $votedByUser;
    public $voteCount;
    public $commentsCount;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->votedByUser = $idea->voted_by_user;
        $this->voteCount = $idea->votes_count;
        $this->commentsCount = $idea->comments_count;
    }
    public function vote()
    {
        if (!auth()->check()) {
            return $this->redirectToLogin();
        }

        if ($this->votedByUser) {
            $this->idea->unVote(auth()->user());
            $this->voteCount--;
            $this->votedByUser = false;
        } else {
            $this->idea->vote(auth()->user());
            $this->voteCount++;
            $this->votedByUser = true;
        }
    }
    public function render()
    {
        return view('livewire.ideas.idea-card');
    }
}
