<?php

namespace App\Livewire\Ideas;

use App\Models\Status;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class StatusFilters extends Component
{
    #[Url(as: 'status')]
    public $currentStatus = 'All';
    public $currentRouteName;
    public $statusCount;
    public function mount()
    {
        $this->setStatusCount();
        if (Route::currentRouteName() !== 'idea.index') {
            $this->currentStatus = null;
        }

        $this->currentRouteName = Route::currentRouteName();
    }
    #[On('idea-created')]
    public function setStatusCount()
    {   
        $this->reset('currentStatus');
        $this->statusCount = Status::getCount();
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
