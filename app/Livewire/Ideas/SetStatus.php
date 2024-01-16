<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use App\Models\Status;
use Livewire\Component;
use App\Jobs\NotifyVotedUsers;


class SetStatus extends Component
{
    public Idea $idea;
    public $status;
    public $notifyVotedUsers;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->status = $idea->status_id;
    }

    public function setStatus()
    {
        $this->authorize('admin');

        $this->idea->status_id = $this->status;
        $this->idea->save();

        if ($this->notifyVotedUsers) {
            NotifyVotedUsers::dispatch($this->idea);
        }

        $this->dispatch('status-updated');
        $this->dispatch('success-message', message: 'Idea status updated.');
    }

    public function render()
    {
        return view('livewire.ideas.set-status', [
            'statuses' => Status::all()
        ]);
    }
}
