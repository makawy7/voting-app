<?php

namespace App\Livewire;

use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;
use Livewire\Attributes\Computed;

class Notifications extends Component
{
    const NOTIFICATION_THRESHOULD = 20;
    public $notificationFirstOpen = false;
    public $notifications;

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
        $this->getNotifications();
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->getCount();
    }

    public function goToNotification(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        $notificationLink = route('idea.show', $notification->data['idea_slug']) . '?comment=' . $notification->data['comment_id'];
        $this->redirect($notificationLink, navigate: true);
    }

    public function getNotifications()
    {
        $this->notifications =  auth()->user()
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
