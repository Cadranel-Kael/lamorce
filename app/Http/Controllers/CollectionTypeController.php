<?php

namespace App\Http\Controllers;

use App\Models\CollectionType;
use Illuminate\Http\Request;

class CollectionTypeController extends Controller
{
    public function index()
    {
        return CollectionType::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Name' => ['required'],
        ]);

        return CollectionType::create($data);
    }

    public function show(CollectionType $collectionType)
    {
        return $collectionType;
    }

    public function update(Request $request, CollectionType $collectionType)
    {
        $data = $request->validate([
            'Name' => ['required'],
        ]);

        $collectionType->update($data);

        return $collectionType;
    }

    public function destroy(CollectionType $collectionType)
    {
        $collectionType->delete();

        return response()->json();
    }
}
