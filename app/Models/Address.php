<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'contact_id',
        'city',
        'country_id',
        'floor',
        'state',
        'postal_code',
        'street_name',
        'street_number',
    ];

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public function country(): HasOne
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
