<?php

namespace App\Enum;

enum ProjectStatus: string
{
    case IN_DELIBERATION = 'In deliberation';
    case ACCEPTED = 'Accepted';
    case REFUSED = 'Refused';
    case PENDING = 'Pending';
    case POSTPONED = 'Postponed';

    public function color()
    {
        return match ($this) {
            self::IN_DELIBERATION => 'primary',
            self::ACCEPTED => 'success-500',
            self::REFUSED => 'error-500',
            self::PENDING => 'gray-300',
            self::POSTPONED => 'warning-500',
        };
    }
}

