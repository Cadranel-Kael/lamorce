<?php

namespace App\Http\Controllers;

use App\Models\Mandate;
use App\Models\MandateSetting;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MandatesController extends Controller
{
    public function index()
    {
        $mandates = Mandate::where('date_time', '>', now())->orderBy('date_time')->get();
        $upcomingMandate = $mandates->first();

        $projects = Project::where('status', '=', 'Pending')->orWhere('status', '=', 'Postponed')->get();

        if ($upcomingMandate == null) {
            $settings = MandateSetting::first();
            if ($settings->meeting_type == 'weekday') {
                $date_time = Carbon::now()->addMonth()->startOfMonth()->next($settings->weekday)->addDays(7 * ($settings->week_of_month-1));
            } elseif ($settings->meeting_type == 'date') {
                $date_time = Carbon::now()->addMonth()->startOfMonth()->day($settings->specific_date);
            }

            $upcomingMandate = Mandate::create([
                'date_time' => $date_time
            ]);

            $previousMandate = Mandate::where('date_time', '<', now())->orderBy('date_time', 'desc')->first();

            if ($previousMandate) {
                $upcomingMandate->contacts()->attach($previousMandate->contacts->slice(3));
            }
        }

        $newContacts = $upcomingMandate->contacts->splice(6);
        $contacts = $upcomingMandate->contacts->splice(0, 6);

        return view('mandates.overview', compact('mandates','upcomingMandate', 'projects', 'contacts', 'newContacts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date_time' => ['required', 'date'],
        ]);

        return Mandate::create($data);
    }

    public function show(Mandate $draw)
    {
        return $draw;
    }

    public function update(Request $request, Mandate $draw)
    {
        $data = $request->validate([
            'date_time' => ['required', 'date'],
        ]);

        $draw->update($data);

        return $draw;
    }

    public function destroy(Mandate $draw)
    {
        $draw->delete();

        return response()->json();
    }
}
