<?php

namespace App\Livewire\Ideas;

use App\Livewire\Traits\WithAuthRedirects;
use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

#[Title('Idea')]
class ShowIdea extends Component
{
    use WithAuthRedirects;
    public Idea $idea;
    public $votedByUser;
    public $backUrl;
    public $votesCount;
    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->votedByUser = $idea->hasVoted(auth()->user());
        $this->votesCount = $idea->votes()->count();
        $this->backUrl = url()->previous() !== url()->full()
            ? url()->previous() : route('idea.index');
    }

    #[On('status-updated')]
    #[On('idea-updated')]
    #[On('idea-spam-reported')]
    #[On('idea-marked-notspam')]
    #[On('comment-added')]
    public function resetIdea()
    {
        $this->idea->refresh();
    }
    public function vote()
    {
        if (!auth()->check()) {
            return $this->redirectToLogin();
        }

        if ($this->votedByUser) {
            $this->idea->unVote(auth()->user());
            $this->votesCount--;
            $this->votedByUser = false;
        } else {
            $this->idea->vote(auth()->user());
            $this->votesCount++;
            $this->votedByUser = true;
        }
    }
    public function render()
    {
        return view('livewire.ideas.show-idea');
    }
}
