<?php

namespace App\Enum;

enum Month: string
{
    case JANUARY = 'January';
    case FEBRUARY = 'February';
    case MARCH = 'March';
    case APRIL = 'April';
    case MAY = 'May';
    case JUNE = 'June';
    case JULY = 'July';
    case AUGUST = 'August';
    case SEPTEMBER = 'September';
    case OCTOBER = 'October';
    case NOVEMBER = 'November';
    case DECEMBER = 'December';

    public function number(): int
    {
        return match ($this) {
            self::JANUARY => 1,
            self::FEBRUARY => 2,
            self::MARCH => 3,
            self::APRIL => 4,
            self::MAY => 5,
            self::JUNE => 6,
            self::JULY => 7,
            self::AUGUST => 8,
            self::SEPTEMBER => 9,
            self::OCTOBER => 10,
            self::NOVEMBER => 11,
            self::DECEMBER => 12,
        };
    }

    public static function fromNumber(int $number): ?self
    {
        return match ($number) {
            1 => self::JANUARY,
            2 => self::FEBRUARY,
            3 => self::MARCH,
            4 => self::APRIL,
            5 => self::MAY,
            6 => self::JUNE,
            7 => self::JULY,
            8 => self::AUGUST,
            9 => self::SEPTEMBER,
            10 => self::OCTOBER,
            11 => self::NOVEMBER,
            12 => self::DECEMBER,
            default => null,
        };
    }

    public function short(): string
    {
        return match ($this) {
            self::JANUARY => 'Jan',
            self::FEBRUARY => 'Feb',
            self::MARCH => 'Mar',
            self::APRIL => 'Apr',
            self::MAY => 'May',
            self::JUNE => 'Jun',
            self::JULY => 'Jul',
            self::AUGUST => 'Aug',
            self::SEPTEMBER => 'Sep',
            self::OCTOBER => 'Oct',
            self::NOVEMBER => 'Nov',
            self::DECEMBER => 'Dec',
        };
    }
}
