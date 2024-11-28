<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'bank_account',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'address_id');
    }
}
