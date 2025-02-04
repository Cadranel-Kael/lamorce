<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountryTranslation extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'country_id',
        'language',
        'name',
        'flag_alt'
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
