<?php

namespace App\Livewire\Ideas;

use App\Models\Status;
use Livewire\Component;
use Livewire\Attributes\Url;

class StatusFilters extends Component
{
    public $currentStatus;
    public function setStatus($status)
    {
        $this->currentStatus = $status;
        $this->dispatch('status-filter', $status);
    }
    public function render()
    {
        return view('livewire.ideas.status-filters', [
            'statuses' => Status::all()
        ]);
    }
}
