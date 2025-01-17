<?php

namespace App\Http\Controllers;

use App\Enum\Month;
use App\Models\Account;
use App\Models\Collection;
use App\Models\CollectionType;
use Carbon\Carbon;

class FinancesController extends Controller
{
    public function index()
    {
        $collections = Collection::get();

        $total = $collections->reduce(function ($carry, $collection) {
            return $carry + $collection->amount();
        }, 0);

        $baseCollection = $collections->where('is_general', true)->first();

        $collectionsTotal = 0;

        $collectionTypes = CollectionType::with(['collections' => function ($query) {
            $query->where('isClosed', false);
        }])->get();

        $allMonthlySums = collect();

        foreach ($collections as $collection) {
            $monthlyAmounts = $collection->getAmountBetweenPeriod(Carbon::now()->subMonths(12), Carbon::now());

            foreach ($monthlyAmounts as $monthYear => $amounts) {
                if (!isset($allMonthlySums[$monthYear])) {
                    $allMonthlySums[$monthYear] = [
                        'year' => $amounts['year'],
                        'month' => $amounts['month'],
                        'total_incoming' => 0,
                        'total_outgoing' => 0,
                        'total' => 0,
                    ];
                }

                $allMonthlySums[$monthYear] = [
                    'year' => $amounts['year'],
                    'month' => $amounts['month'],
                    'total_incoming' => $allMonthlySums[$monthYear]['total_incoming'] + $amounts['total_incoming'],
                    'total_outgoing' => $allMonthlySums[$monthYear]['total_outgoing'] + $amounts['total_outgoing'],
                    'total' => $allMonthlySums[$monthYear]['total'] + $amounts['total'],
                ];
            }
        }

        $results = $allMonthlySums->sortBy('month')->sortBy('year');
        $graphLabels = $results->pluck('month')->map(fn($val) => Month::fromNumber($val)->short())->toArray();
        $graphValues = $results->pluck('total')->map(fn($val) => $val/100)->toArray();


        return view('finances.overview', compact('total', 'collectionsTotal', 'collectionTypes', 'baseCollection', 'graphLabels', 'graphValues'));
    }
}
