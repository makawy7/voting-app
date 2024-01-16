<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use Livewire\Component;

class DeleteIdea extends Component
{
    public Idea $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }
    public function deleteIdea()
    {
        $this->authorize('delete', $this->idea);
        $this->idea->delete();

        session()->flash('success', 'Idea deleted successfully.');
        $this->redirectRoute('idea.index', navigate: true);
    }
    public function render()
    {
        return view('livewire.ideas.delete-idea');
    }
}
