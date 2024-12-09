<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'date_time',
        'amount',
        'outgoing_collection_id',
        'incoming_collection_id',
        'identifier',
        'message',
        'is_imported',
    ];

    protected $casts = [
        'date_time' => 'datetime',
    ];

    public function name()
    {
        $name = '';

        if ($this->incomingCollection) {
            $name = 'Expense';
        } elseif ($this->outgoingCollection) {
            $name = 'Donation';
        }

        if ($this->is_imported) {
            $name .= ' (Imported)';
        }

        return $name;
    }

    public function incomingCollection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'incoming_collection_id');
    }

    public function outgoingCollection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'outgoing_collection_id');
    }

    public function isIncomingFor(Collection $collection): bool
    {
        return $this->incoming_collection_id === $collection->id;
    }

    public function isOutgoingFor(Collection $collection): bool
    {
        return $this->outgoing_collection_id === $collection->id;
    }
}
