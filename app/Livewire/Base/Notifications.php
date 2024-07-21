<?php

namespace App\Livewire\Base;

use App\Models\Notification;
use Livewire\Component;

class Notifications extends Component
{
    public $newNotifications = [];
    public $oldNotifications = [];

    public function render()
    {
        $this->newNotifications = auth()->user()->unreadNotifications;

        $this->oldNotifications = auth()->user()->readNotifications;
        return view('livewire.base.notifications');
    }
}
