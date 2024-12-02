<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'code',
        'iso3_code',
    ];

    public function tranlations(): HasMany
    {
        return $this->hasMany(CountryTranslation::class, 'country_id', 'id');
    }

    public function getTranslation(string $language): ?CountryTranslation
    {
        return $this->tranlations()->where('language', $language)->first();
    }
}
