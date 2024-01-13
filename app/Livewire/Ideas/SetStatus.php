<?php

namespace App\Livewire\Ideas;

use App\Mail\IdeaStatusUpdatedMailable;
use App\Models\Idea;
use App\Models\Status;
use Livewire\Component;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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
            $this->notifyVotedUsers();
        }

        $this->dispatch('status-updated');
    }

    public function notifyVotedUsers()
    {
        $this->idea->votes()
            ->select('name', 'email')
            ->chunk(10, function ($voters) {
                foreach ($voters as $voter) {
                    Mail::to($voter)
                        ->queue(new IdeaStatusUpdatedMailable($this->idea));
                }
            });
    }
    public function render()
    {
        return view('livewire.ideas.set-status', [
            'statuses' => Status::all()
        ]);
    }
}
