<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        // untuk stat overview
       // total lowongan
        $totalJobs = Cache::remember('dashboard_total_jobs', 3600, function () {
            return DB::table('jobs_clean')->count();
        });

        // total perusahaan
        $totalCompanies = Cache::remember('dashboard_total_companies', 3600, function () {
            return DB::table('jobs_clean')
                ->distinct('company')
                ->count('company');
        });

        // rata-rata gaji
        $avgSalary = Cache::remember('dashboard_avg_salary', 3600, function () {
            return DB::table('jobs_clean')
                ->whereNotNull('salary_min')
                ->whereNotNull('salary_max')
                ->selectRaw('AVG((salary_min + salary_max) / 2) as avg_salary')
                ->value('avg_salary');
        });


        //section 2
       // tren job bulanan
        $monthlyJobs = Cache::remember('dashboard_monthly_jobs', 3600, function () {
            return DB::table('jobs_clean')
                ->selectRaw('MONTH(scraped_at) as month, COUNT(*) as total')
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('total')
                ->toArray();
        });

        // kategori pekerjaa
        $jobCategories = Cache::remember('dashboard_job_categories', 3600, function () {
            return DB::table('jobs_clean')
                ->select('keyword', DB::raw('COUNT(*) as total'))
                ->groupBy('keyword')
                ->orderByDesc('total')
                ->limit(5)
                ->get()
                ->toArray();
        });

        $categoryLabels = array_column($jobCategories, 'keyword');
        $categoryTotals = array_column($jobCategories, 'total');

        //section 3
        // top skills
        $topSkillsData = Cache::remember('dashboard_top_skills', 3600, function () {

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

        $skillLabels = array_keys($topSkillsData);
        $skillTotals = array_values($topSkillsData);

        $topSkill = $skillLabels[0] ?? 'No Data';

        // rata-rata gaji per role
        $salaryPerRole = Cache::remember('dashboard_salary_per_role', 3600, function () {
            return DB::table('jobs_clean')
                ->whereNotNull('salary_min')
                ->whereNotNull('salary_max')
                ->whereNotNull('keyword')
                ->selectRaw('
                    keyword,
                    AVG((salary_min + salary_max) / 2) as avg_salary
                ')
                ->groupBy('keyword')
                ->orderByDesc('avg_salary')
                ->limit(7)
                ->get()
                ->toArray();
        });

        $salaryRoleLabels = [];
        $salaryRoleData = [];

        foreach ($salaryPerRole as $item) {
        $salaryRoleLabels[] = $item['keyword'];
        $salaryRoleData[] = round($item['avg_salary']);
    }
        //section 4
        // top perusahaan
        $topCompanies = Cache::remember('dashboard_top_companies', 3600, function () {
            return DB::table('jobs_clean')
                ->whereNotNull('company')
                ->where('company', '!=', '')
                ->selectRaw('company, COUNT(*) as total_jobs')
                ->groupBy('company')
                ->orderByDesc('total_jobs')
                ->limit(10)
                ->get()
                ->toArray();
        });

        $companyLabels = [];
        $companyTotals = [];

        foreach ($topCompanies as $item) {
        $companyLabels[] = $item['company'];
        $companyTotals[] = $item['total_jobs'];
    }

        // experience level
        $jobExperience = Cache::remember('dashboard_experience', 3600, function () {
            return DB::table('jobs_clean')
                ->whereNotNull('experience_level')
                ->where('experience_level', '!=', '')
                ->where('experience_level', '!=', 'Unknown')
                ->selectRaw('experience_level, COUNT(*) as total_jobs')
                ->groupBy('experience_level')
                ->get()
                ->toArray();
        });

        $experienceLabels = [];
        $experienceTotals = [];

        foreach ($jobExperience as $item) {
        $experienceLabels[] = $item['experience_level'];
        $experienceTotals[] = $item['total_jobs'];
    }


        //section 5
        //lokasi
        // top lokasi
        $topLocations = Cache::remember('dashboard_top_locations', 3600, function () {
            return DB::table('jobs_clean')
                ->whereNotNull('location')
                ->where('location', '!=', '')
                ->where('location', '!=', 'Unknown')
                ->selectRaw('location, COUNT(*) as total_jobs')
                ->groupBy('location')
                ->orderByDesc('total_jobs')
                ->limit(10)
                ->get()
                ->toArray();
        });

        $locationLabels = [];
        $locationTotals = [];

        foreach ($topLocations as $item) {
        $locationLabels[] = $item['location'];
        $locationTotals[] = $item['total_jobs'];
    }

        $jobsCollected = Cache::remember('dashboard_jobs_collected', 3600, function () {
            return DB::table('jobs_clean')->count();
        });

        $lastUpdated = Cache::remember('dashboard_last_updated', 3600, function () {

            $date = DB::table('jobs_clean')
                ->max('scraped_at');

            return Carbon::parse($date)
                ->shortAbsoluteDiffForHumans();
        });


        return view('dashboard.dashboard', compact(
            'totalJobs',
            'totalCompanies',
            'avgSalary',
            'topSkill',
            'monthlyJobs',
            'jobCategories',
            'categoryLabels',
            'categoryTotals',
            'skillLabels',
            'skillTotals',
            'salaryRoleLabels',
            'salaryRoleData',
            'companyLabels',
            'companyTotals',
            'experienceLabels',
            'experienceTotals',
            'topLocations',
            'locationLabels',
            'locationTotals',
            'jobsCollected',
            'lastUpdated'
        ));
    }
}