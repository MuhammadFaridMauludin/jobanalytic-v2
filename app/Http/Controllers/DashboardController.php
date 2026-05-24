<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // untuk stat overview
        // total lowongan
        $totalJobs = DB::table('jobs_clean')->count();

        // total perusahaan
        $totalCompanies = DB::table('jobs_clean')
            ->distinct('company')
            ->count('company');

        // rata-rata gaji
        $avgSalary = DB::table('jobs_clean')
            ->whereNotNull('salary_min')
            ->whereNotNull('salary_max')
            ->selectRaw('AVG((salary_min + salary_max) / 2) as avg_salary')
            ->value('avg_salary');

        //section 2
        // tren job
        $monthlyJobs = DB::table('jobs_clean')
            ->selectRaw('MONTH(scraped_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total');

        // kategory
        $jobCategories = DB::table('jobs_clean')
            ->select('keyword', DB::raw('COUNT(*) as total'))
            ->groupBy('keyword')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $categoryLabels = $jobCategories->pluck('keyword');
        $categoryTotals = $jobCategories->pluck('total');

        //section 3
        //skill
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
        $topSkills = array_slice($skillCounts, 0, 10, true);
        $skillLabels = array_keys($topSkills);
        $skillTotals = array_values($topSkills);

        $topSkill = $skillLabels[0] ?? 'No Data';

        //rata rata gaji
        $salaryPerRole = DB::table('jobs_clean')
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
            ->get();
        
            $salaryRoleLabels = [];
            $salaryRoleData = [];
            foreach ($salaryPerRole as $item) {
            $salaryRoleLabels[] = $item->keyword;
            $salaryRoleData[] = round($item->avg_salary);
        }
        //section 4
        //top perusahaan
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
        //experience
        $jobExperience = DB::table('jobs_clean')
            ->whereNotNull('experience_level')
            ->where('experience_level', '!=', '')
            ->where('experience_level', '!=', 'Unknown')
            ->selectRaw('experience_level, COUNT(*) as total_jobs')
            ->groupBy('experience_level')
            ->get();
        $experienceLabels = [];
        $experienceTotals = [];
        foreach ($jobExperience as $item) {
        $experienceLabels[] = $item->experience_level;
        $experienceTotals[] = $item->total_jobs;
        }
        //section 5
        //lokasi
        $topLocations = DB::table('jobs_clean')
            ->whereNotNull('location')
            ->where('location', '!=', '')
            ->where('location', '!=', 'Unknown')
            ->selectRaw('location, COUNT(*) as total_jobs')
            ->groupBy('location')
            ->orderByDesc('total_jobs')
            ->limit(10)
            ->get();
        $locationLabels = [];
        $locationTotals = [];
        foreach ($topLocations as $item) {
        $locationLabels[] = $item->location;
        $locationTotals[] = $item->total_jobs;
        }

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
            'locationTotals'

        ));
    }
}