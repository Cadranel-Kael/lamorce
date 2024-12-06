<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'bank_account',
        'address_id',
    ];

    protected $appends = ['name'];

    protected function name(): Attribute
    {
        return new Attribute(
            get: fn() => $this->first_name . ' ' . $this->last_name
        );
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }
}
