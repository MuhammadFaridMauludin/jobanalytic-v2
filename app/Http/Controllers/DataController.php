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
    $topCompanies = DB::table('jobs_clean')
            ->whereNotNull('company')
            ->where('company', '!=', '')
            ->selectRaw('company, COUNT(*) as total_jobs')
            ->groupBy('company')
            ->orderByDesc('total_jobs')
            ->limit(10)
            ->get();
        $companyLabels = [];
        $companyTotals = [];
        foreach ($topCompanies as $item) {
        $companyLabels[] = $item->company;
        $companyTotals[] = $item->total_jobs;
        }

    return view('data.topCompany', compact(
        'topCompanies',
        'companyLabels',
        'companyTotals'
    ));
    }
    public function detailCompany (string $company)
{
    $jobs = DB::table('jobs_clean')
        ->where('company', $company)
        ->paginate(10);

    return view('data.detailCompany', compact(
        'jobs',
        'company'
    ));
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
