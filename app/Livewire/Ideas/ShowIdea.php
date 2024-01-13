<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

#[Title('Idea')]
class ShowIdea extends Component
{
    public Idea $idea;
    public $votedByUser;
    public $backUrl;
    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->votedByUser = $idea->hasVoted(auth()->user());

        $this->backUrl = url()->previous() !== url()->full()
            ? url()->previous() : route('idea.index');
    }

    #[On('status-updated')]
    public function statusGotUpdated()
    {
        $this->idea->refresh();
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
    }
    public function render()
    {
        return view('livewire.ideas.show-idea');
    }
}
