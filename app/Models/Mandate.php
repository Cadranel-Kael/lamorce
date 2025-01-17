<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mandate extends Model
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

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'mandate_project');
    }

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, 'mandate_contact');
    }

    public function getRowNumber()
    {
        return $this->newQuery()->where('date_time', '<', $this->date_time)->count() + 1;
    }
}
