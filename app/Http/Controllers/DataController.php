<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function dataLowongan(Request $request)
{
    $query = DB::table('jobs_clean');

    // search
    if ($request->search) {

        $query->where(function ($q) use ($request) {

            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('company', 'like', '%' . $request->search . '%');

        });
    }
    if ($request->location) {

    $query->where('location', $request->location);

    }

    $locations = DB::table('jobs_clean')
    ->select('location')
    ->distinct()
    ->orderBy('location')
    ->pluck('location');

    $data = $query
        ->orderByDesc('scraped_at')
        ->paginate(8)
        ->withQueryString();

    return view('data.dataLowongan', compact(
        'data',
        'locations'
        ));
}
    public function topCompany()
    {
    return view('data.topCompany');
    }
    public function topSkill()
    {
    return view('data.topSkill');
    }
    public function lokasi()
    {
        return view('data.lokasi');

    }
}
