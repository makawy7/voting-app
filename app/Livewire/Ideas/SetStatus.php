<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use App\Models\Status;
use Illuminate\Http\Response;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class SetStatus extends Component
{
    public Idea $idea;
    public $status;

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

        $this->dispatch('status-updated');
    }
    public function render()
    {
        return view('livewire.ideas.set-status', [
            'statuses' => Status::all()
        ]);
    }
}
