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
        'flag_url',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(CountryTranslation::class, 'country_id', 'id');
    }

    public function getTranslation(string $language): ?CountryTranslation
    {
        return $this->translations()->where('language', $language)->first();
    }
}
