<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Collection;
use App\Models\CollectionType;

class FinancesController extends Controller
{
    public function index()
    {
        $total = auth()->user()->collections->reduce(function ($carry, $collection) {
            return $carry + $collection->amount();
        }, 0);
        $baseCollection = auth()->user()->collections()->where('is_general', true)->first();
        $collectionsTotal = 0;
        $collectionTypes = CollectionType::with(['collections' => function ($query) {
            $query->where('isClosed', false);
        }])->get();

        return view('finances.overview', compact('total', 'collectionsTotal', 'collectionTypes', 'baseCollection'));
    }
}
