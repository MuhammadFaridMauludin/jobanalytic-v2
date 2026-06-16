<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalJobs = DB::table('jobs_clean')->count();


        $totalCompanies = DB::table('jobs_clean')
            ->selectRaw('COUNT(DISTINCT company) as total')
            ->value('total');

        $avgSalary = DB::table('jobs_clean')
            ->whereNotNull('salary_min')
            ->whereNotNull('salary_max')
            ->selectRaw('AVG((salary_min + salary_max) / 2) as avg_salary')
            ->value('avg_salary');

        $monthlyJobs = DB::table('jobs_clean')
            ->selectRaw('EXTRACT(MONTH FROM scraped_at) as month, COUNT(*) as total')
            ->groupByRaw('EXTRACT(MONTH FROM scraped_at)')
            ->orderBy('month')
            ->pluck('total');

        $jobCategories = DB::table('jobs_clean')
            ->selectRaw('keyword as "keyword", COUNT(*) as "total"')
            ->groupBy('keyword')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $categoryLabels = $jobCategories->pluck('keyword');
        $categoryTotals = $jobCategories->pluck('total');

        $skills = DB::table('jobs_clean')
            ->whereNotNull('skills')
            ->pluck('skills');

        $allSkills = [];
        foreach ($skills as $skillRow) {
            foreach (explode(',', $skillRow) as $skill) {
                $skill = trim($skill);
                if ($skill != '') $allSkills[] = $skill;
            }
        }
        $skillCounts = array_count_values($allSkills);
        arsort($skillCounts);
        $topSkillsData = array_slice($skillCounts, 0, 10, true);
        $skillLabels = array_keys($topSkillsData);
        $skillTotals = array_values($topSkillsData);
        $topSkill = $skillLabels[0] ?? 'No Data';

        $salaryPerRole = DB::table('jobs_clean')
            ->whereNotNull('salary_min')
            ->whereNotNull('salary_max')
            ->whereNotNull('keyword')
            ->selectRaw('keyword, AVG((salary_min + salary_max) / 2) as avg_salary')
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

        $topCompanies = DB::table('jobs_clean')
            ->whereNotNull('company')
            ->where('company', '!=', '')
            ->selectRaw('company as "company", COUNT(*) as "total_jobs"')
            ->groupBy('company')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(10)
            ->get();

        $companyLabels = [];
        $companyTotals = [];
        foreach ($topCompanies as $item) {
            $companyLabels[] = $item->company;
            $companyTotals[] = $item->total_jobs;
        }

        $jobExperience = DB::table('jobs_clean')
            ->whereNotNull('experience_level')
            ->where('experience_level', '!=', '')
            ->where('experience_level', '!=', 'Unknown')
            ->selectRaw('experience_level as "experience_level", COUNT(*) as "total_jobs"')
            ->groupBy('experience_level')
            ->get();

        $experienceLabels = [];
        $experienceTotals = [];
        foreach ($jobExperience as $item) {
            $experienceLabels[] = $item->experience_level;
            $experienceTotals[] = $item->total_jobs;
        }

        $topLocations = DB::table('jobs_clean')
            ->whereNotNull('location')
            ->where('location', '!=', '')
            ->where('location', '!=', 'Unknown')
            ->selectRaw('location as "location", COUNT(*) as "total_jobs"')
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

        $jobsCollected = DB::table('jobs_clean')->count();

        $lastUpdated = Carbon::parse(
            DB::table('jobs_clean')->max('scraped_at')
        )->shortAbsoluteDiffForHumans();

        return view('dashboard.dashboard', compact(
            'totalJobs', 'totalCompanies', 'avgSalary', 'topSkill',
            'monthlyJobs', 'jobCategories', 'categoryLabels', 'categoryTotals',
            'skillLabels', 'skillTotals', 'salaryRoleLabels', 'salaryRoleData',
            'companyLabels', 'companyTotals', 'experienceLabels', 'experienceTotals',
            'topLocations', 'locationLabels', 'locationTotals', 'jobsCollected', 'lastUpdated'
        ));
    }
}