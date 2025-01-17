<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'address_id',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    public function mandates(): BelongsToMany
    {
        return $this->belongsToMany(Mandate::class, 'mandate_contact');
    }
}
