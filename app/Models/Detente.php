<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detente extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'date_time',
    ];

    protected function casts(): array
    {
        return [
            'date_time' => 'datetime',
        ];
    }
}
