<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

        // filter lokasi
        if ($request->location) {

            $query->where('location', $request->location);

        }

        // cache lokasi filter
        $locations = Cache::remember('filter_locations', 3600, function () {

            return DB::table('jobs_clean')
                ->select('location')
                ->distinct()
                ->orderBy('location')
                ->pluck('location');

        });

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
        $topCompanies = Cache::remember('top_companies_page', 3600, function () {

            return DB::table('jobs_clean')
                ->whereNotNull('company')
                ->where('company', '!=', '')
                ->selectRaw('company, COUNT(*) as total_jobs')
                ->groupBy('company')
                ->orderByDesc('total_jobs')
                ->limit(10)
                ->get();

        });

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

    public function detailCompany(string $company)
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
        $topSkills = Cache::remember('top_skills_page', 3600, function () {

            $skills = DB::table('jobs_clean')
                ->whereNotNull('skills')
                ->pluck('skills');

            $allSkills = [];

            foreach ($skills as $skillRow) {

                $splitSkills = explode(',', $skillRow);

                foreach ($splitSkills as $skill) {

                    $skill = trim($skill);

                    if ($skill != '') {

                        $allSkills[] = $skill;

                    }
                }
            }

            $skillCounts = array_count_values($allSkills);

            arsort($skillCounts);

            return array_slice($skillCounts, 0, 10, true);

        });

        $skillLabels = array_keys($topSkills);
        $skillTotals = array_values($topSkills);

        $topSkill = $skillLabels[0] ?? 'No Data';

        return view('data.topSkill', compact(
            'topSkill',
            'topSkills',
            'skillLabels',
            'skillTotals'
        ));
    }
    public function detailSkill(string $skill)
    {
        $jobs = DB::table('jobs_clean')
            ->where('skills', 'like', '%' . $skill . '%')
            ->paginate(10);

        return view('data.detailSkill', compact(
            'jobs',
            'skill'
        ));
    }
    public function lokasi()
    {
        $locations = Cache::remember('top_locations_page', 3600, function () {

            return DB::table('jobs_clean')
                ->select(
                    'location',
                    DB::raw('COUNT(*) as total_jobs')
                )
                ->whereNotNull('location')
                ->groupBy('location')
                ->orderByDesc('total_jobs')
                ->limit(10)
                ->get();

        });

        $locationLabels = $locations->pluck('location');

        $locationTotals = $locations->pluck('total_jobs');

        return view('data.lokasi', compact(
            'locations',
            'locationLabels',
            'locationTotals'
        ));
    }

     public function detailLokasi(string $location)
    {
        $jobs = DB::table('jobs_clean')
            ->where('location', $location)
            ->paginate(10);

        return view('data.detailLokasi', compact(
            'jobs',
            'location'
        ));
    }
    public function salary()
    {
        $salaryRoles = Cache::remember('salary_roles_page', 3600, function () {

            return DB::table('jobs_clean')
                ->select(
                    'title',
                    DB::raw('AVG((salary_min + salary_max)/2) as avg_salary')
                )
                ->whereNotNull('salary_min')
                ->whereNotNull('salary_max')
                ->groupBy('title')
                ->orderByDesc('avg_salary')
                ->limit(10)
                ->get();

        });

        $salaryLabels = $salaryRoles->pluck('title');

        $salaryTotals = $salaryRoles->pluck('avg_salary');

        $highestSalaryRole = $salaryLabels[0] ?? 'No Data';

        $highestSalaryValue = $salaryTotals[0] ?? 0;

        return view('data.salary', compact(
            'salaryRoles',
            'salaryLabels',
            'salaryTotals',
            'highestSalaryRole',
            'highestSalaryValue'
        ));
    }
}