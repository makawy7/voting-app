<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use Livewire\Component;

class ShowIdea extends Component
{
    public Idea $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }
    public function render()
    {
        return view('livewire.ideas.show-idea');
    }
}
