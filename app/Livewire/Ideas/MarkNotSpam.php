<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use Livewire\Component;

class MarkNotSpam extends Component
{
    public Idea $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }
    public function resetSpamCounter()
    {
        $this->authorize('admin');
        $this->idea->spam_reports = 0;
        $this->idea->save();

        $this->dispatch('idea-marked-notspam');
    }
    public function render()
    {
        return view('livewire.ideas.mark-not-spam');
    }
}
