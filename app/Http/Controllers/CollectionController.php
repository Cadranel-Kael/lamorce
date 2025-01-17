<?php

namespace App\Http\Controllers;

use App\Concerns\HasDialog;
use App\Models\Collection;
use App\Models\Transaction;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class CollectionController extends Controller
{

    public function index()
    {
        $collections = Collection::with('type')->get();

        return view('finances.collections.index', compact('collections'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'amount' => ['required', 'numeric'],
            'description' => ['nullable'],
            'isClosed' => ['boolean'],
        ]);

        return Collection::create($data);
    }

    public function show(string $collection)
    {
        return view('finances.collections.show', compact('collection'));
    }

    public function update(Request $request, Collection $collection)
    {
        $data = $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'amount' => ['required', 'numeric'],
            'description' => ['nullable'],
            'isClosed' => ['boolean'],
        ]);

        $collection->update($data);

        return $collection;
    }

    public function destroy(Collection $collection)
    {
        $collection->delete();

        return response()->json();
    }
}
