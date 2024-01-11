<?php

namespace App\Livewire\Ideas;

use App\Models\Status;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Route;

class StatusFilters extends Component
{
    #[Url(as: 'status')]
    public $currentStatus = 'All';
    public $currentRouteName;
    public $statusCount;
    public function mount()
    {
        $this->statusCount = Status::getCount();
        
        if (Route::currentRouteName() !== 'idea.index') {
            $this->currentStatus = null;
        }

        $this->currentRouteName = Route::currentRouteName();
    }
    public function setStatus($status)
    {
        $this->currentStatus = $status;
        $this->dispatch('status-filter', $status);
        if ($this->currentRouteName !== 'idea.index') {
            return $this->redirect(route('idea.index', [
                'status' => $this->currentStatus
            ]), navigate: true);
        }
    }
    public function render()
    {
        return view('livewire.ideas.status-filters', [
            'statuses' => Status::all()
        ]);
    }
}
