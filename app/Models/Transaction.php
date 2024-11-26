<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'date_time',
        'collection_id',
    ];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    protected function casts()
    {
        return [
            'date_time' => 'datetime',
        ];
    }
}
