<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Notifications extends Component
{
    public $notificationFirstOpen = false;

    public function openNotification()
    {
        $this->notificationFirstOpen = true;
    }
    
    #[Computed()]
    public function notifications()
    {
        return auth()->user()->unreadNotifications;
    }
    public function render()
    {
        return view('livewire.notifications');
    }
}
