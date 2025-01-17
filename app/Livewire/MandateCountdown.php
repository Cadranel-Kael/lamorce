<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class MandateCountdown extends Component
{
    public $dateTime;
    public $title;

    public function mount($dateTime, $title)
    {
        $this->dateTime = $dateTime;
        $this->title = $title ?? 'Mandate Countdown';
    }

    #[Computed]
    public function daysUntil()
    {
        return round(now()->diffInDays($this->dateTime));
    }

    #[Computed]
    public function hoursUntil()
    {
        return now()->diffInHours($this->dateTime) % 24;
    }

    #[Computed]
    public function minutesUntil()
    {
        return now()->diffInMinutes($this->dateTime) % 60;
    }

    #[Computed]
    public function secondsUntil()
    {
        return now()->diffInSeconds($this->dateTime) % 60;
    }

    public function render()
    {
        return view('livewire.mandate-countdown');
    }
}
