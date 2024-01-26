<?php

namespace App\Livewire;

use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;
use Livewire\Attributes\Computed;

class Notifications extends Component
{
    const NOTIFICATION_THRESHOULD = 20;
    public $notificationFirstOpen = false;

    public $notificationsCount;
    public function mount()
    {
        $this->getCount();
    }

    public function getCount()
    {
        $this->notificationsCount = auth()->user()->unreadNotifications()->count();
    }
    public function openNotification()
    {
        $this->notificationFirstOpen = true;
    }

    public function goToNotification(DatabaseNotification $notification)
    {
        // $notification->markAsRead();

        $notificationLink = route('idea.show', $notification->data['idea_slug']) . '?comment=' . $notification->data['comment_id'];
        $this->redirect($notificationLink, navigate: true);
    }

    #[Computed()]
    public function notifications()
    {
        return auth()->user()
            ->unreadNotifications()
            ->latest()
            ->take(self::NOTIFICATION_THRESHOULD)
            ->get();
    }
    public function render()
    {
        return view('livewire.notifications');
    }
}
