<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MandateSetting extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'meeting_type',
        'weekday',
        'week_of_month',
        'specific_date',
    ];
}
