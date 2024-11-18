<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return Transaction::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'date_time' => ['required', 'date'],
            'collection_id' => ['required', 'exists:collections'],
        ]);

        return Transaction::create($data);
    }

    public function show(Transaction $transaction)
    {
        return $transaction;
    }

    public function update(Request $request, Transaction $transaction)
    {
        $data = $request->validate([
            'name' => ['required'],
            'date_time' => ['required', 'date'],
            'collection_id' => ['required', 'exists:collections'],
        ]);

        $transaction->update($data);

        return $transaction;
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return response()->json();
    }
}
