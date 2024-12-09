<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'description',
        'isClosed',
    ];

    protected $casts = [
        'isClosed' => 'boolean',
    ];

    public function incomingTransactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'incoming_collection_id');
    }

    public function outgoingTransactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'outgoing_collection_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(CollectionType::class, 'type_id');
    }

    public function formatedAmount()
    {
        return number_format(($this->amount()*0.01), 2, '.', ' ');
    }

    public function amount(): int
    {
        $incomingSum = $this->incomingTransactions()->sum('amount');
        $outgoingSum = $this->outgoingTransactions()->sum('amount');
        return - $incomingSum + $outgoingSum;
    }
}
