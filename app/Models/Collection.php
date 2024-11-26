<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'amount',
        'description',
        'isClosed',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function type()
    {
        return $this->belongsTo(CollectionType::class, 'type_id');
    }

    public function formatedAmount()
    {
        return number_format(($this->amount*0.01), 2, '.', ' ');
    }

    protected function casts()
    {
        return [
            'isClosed' => 'boolean',
        ];
    }
}
