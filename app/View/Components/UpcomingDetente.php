<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UpcomingDetente extends Component
{
    public $dateTime;
    public $daysUntil;
    public $hoursUntil;
    public $minutesUntil;
    public $secondsUntil;

    public function __construct($dateTime)
    {
        $this->dateTime = $dateTime;
        $this->daysUntil = round(now()->diffInDays($dateTime));
        $this->hoursUntil = now()->diffInHours($dateTime) % 24;
        $this->minutesUntil = now()->diffInMinutes($dateTime) % 60;
        $this->secondsUntil = now()->diffInSeconds($dateTime) % 60;
    }

    public function render()
    {
        return view('components.upcoming-detente');
    }
}
