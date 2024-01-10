<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use Livewire\Component;

class ShowIdea extends Component
{
    public Idea $idea;
    public $voted_by_user;
    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->voted_by_user = $idea->hasVoted(auth()->user());
    }
    public function render()
    {
        return view('livewire.ideas.show-idea');
    }
}
