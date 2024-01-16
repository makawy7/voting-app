<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class ReportSpam extends Component
{
    public Idea $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }
    public function reportIdeaAsSpam()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_UNAUTHORIZED);
        }
        $this->idea->spam_reports = $this->idea->spam_reports + 1;
        $this->idea->save();

        $this->dispatch('idea-spam-reported');
        $this->dispatch('success-message', message: 'Idea reported as spam.');
    }
    public function render()
    {
        return view('livewire.ideas.report-spam');
    }
}
