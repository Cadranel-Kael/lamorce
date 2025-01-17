<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
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
        return $this->hasMany(Transaction::class, 'outgoing_collection_id');
    }

    public function outgoingTransactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'incoming_collection_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(CollectionType::class, 'type_id');
    }

    public function formatedAmount()
    {
        return number_format(($this->amount() * 0.01), 2, '.', ' ');
    }

    public function amount(): int
    {
        $incomingSum = $this->incomingTransactions()->sum('amount');
        $outgoingSum = $this->outgoingTransactions()->sum('amount');
        return $incomingSum - $outgoingSum;
    }

    public function getFirstTransaction()
    {
        return $this->incomingTransactions()->union($this->outgoingTransactions())->get()->min('date_time');
    }

    public function getLastTransaction()
    {
        return $this->incomingTransactions()->union($this->outgoingTransactions())->get()->max('date_time');
    }

    public function getAmount(string|Carbon|null $date)
    {
        $date ?? $this->getLastTransaction();
        $date = Carbon::parse($date);
        return $this->incomingTransactions()
                ->where('date_time', '<=', $date)
                ->sum('amount') - $this->outgoingTransactions()
                ->where('date_time', '<=', $date)
                ->sum('amount');
    }

    public function getAmountBetweenPeriod(string|Carbon $start, string|Carbon $end)
    {
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);

        $total = $this->getAmount($start);

        for ($i = $start->year; $i <= $end->year; $i++) {
            if ($i === $start->year) {
                $startMonth = $start->month;
            } else {
                $startMonth = 1;
            }

            if ($i === $end->year) {
                $endMonth = $end->month;
            } else {
                $endMonth = 12;
            }


            for ($j = $startMonth; $j <= $endMonth; $j++) {
                $incomingSum = $this->incomingTransactions()
                    ->whereYear('date_time', $i)
                    ->whereMonth('date_time', $j)
                    ->sum('amount');

                $outgoingSum = $this->outgoingTransactions()
                    ->whereYear('date_time', $i)
                    ->whereMonth('date_time', $j)
                    ->sum('amount');

                $total += $incomingSum - $outgoingSum;

                $allMonthlySums[$i . '-' . $j] = [
                    'year' => $i,
                    'month' => $j,
                    'total_incoming' => $incomingSum,
                    'total_outgoing' => $outgoingSum,
                    'total' => $total,
                ];
            }
        }

        return $allMonthlySums;
    }

    public function monthlyAmount()
    {
        $start = $this->incomingTransactions()->union($this->incomingTransactions())->get()->min('date_time');
        $end = $this->incomingTransactions()->union($this->incomingTransactions())->get()->max('date_time');

        if ($start === null || $end === null) {
            return null;
        }

        $start = (array)$start;
        $end = (array)$end;

        $incomingSums = $this->incomingTransactions()
            ->selectRaw('YEAR(date_time) AS year, MONTH(date_time) AS month, SUM(amount) AS sum')
            ->groupBy('year', 'month')
            ->get()
            ->toArray();

        $outgoingSums = $this->outgoingTransactions()
            ->selectRaw('YEAR(date_time) AS year, MONTH(date_time) AS month, SUM(amount) AS sum')
            ->groupBy('year', 'month')
            ->get()
            ->toArray();

        $combinedSums = collect();

        foreach ($incomingSums as $incomingSum) {
            $combinedSums[$incomingSum['year'] . '-' . $incomingSum['month']] = collect([
                'month' => $incomingSum['month'],
                'year' => $incomingSum['year'],
                'total_incoming' => $incomingSum['sum'],
                'total_outgoing' => 0,
                'net_total' => $incomingSum['sum'],
            ]);
        }

        foreach ($outgoingSums as $outgoingSum) {
            $key = $outgoingSum['year'] . '-' . $outgoingSum['month'];
            if ($combinedSums->has($key)) {
                $combinedSums->get($key)->put('total_outgoing', $outgoingSum['sum']);
                $combinedSums->get($key)->put('net_total', $combinedSums[$key]['total_incoming'] - $outgoingSum['sum']);
            } else {
                $combinedSums[$outgoingSum['year'] . '-' . $outgoingSum['month']] = [
                    'month' => $outgoingSum['month'],
                    'year' => $outgoingSum['year'],
                    'total_outgoing' => $outgoingSum['sum'],
                    'total_incoming' => 0,
                    'net_total' => -$outgoingSum['sum'],
                ];
            }
        }

        $total = 0;

        foreach ($combinedSums as $key => $combinedSum) {
            $total += $combinedSum['total_incoming'] - $combinedSum['total_outgoing'];
            $combinedSums[$key]['total'] = $total;
        }

        return $combinedSums->sortBy('month')->sortBy('year');
    }
}
