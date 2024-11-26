<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Collection;
use App\Models\CollectionType;

class FinancesController extends Controller
{
    public function index()
    {
        $total = Account::sum('total');
        $collectionsTotal = Collection::sum('amount');
        $collectionTypes = CollectionType::with(['collections' => function ($query) {
            $query->where('isClosed', false);
        }])->get();

        return view('finances.overview', compact('total', 'collectionsTotal', 'collectionTypes'));
    }
}
