<?php

namespace App\Http\Controllers;

use App\Models\Detente;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetenteController extends Controller
{
    public function index()
    {
        $detentes = Detente::orderBy('date_time')->get();
        $upcomingDetente = Detente::where('date_time', '>', now())->orderBy('date_time')->first()->date_time;

        return view('detentes.overview', compact('detentes','upcomingDetente'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date_time' => ['required', 'date'],
        ]);

        return Detente::create($data);
    }

    public function show(Detente $draw)
    {
        return $draw;
    }

    public function update(Request $request, Detente $draw)
    {
        $data = $request->validate([
            'date_time' => ['required', 'date'],
        ]);

        $draw->update($data);

        return $draw;
    }

    public function destroy(Detente $draw)
    {
        $draw->delete();

        return response()->json();
    }
}
