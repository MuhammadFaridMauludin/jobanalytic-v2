public function index()
{
    $topCompany = DB::table('jobs_clean')
        ->select('company', DB::raw('COUNT(*) as total'))
        ->groupBy('company')
        ->orderByDesc('total')
        ->limit(10)
        ->get();

    return view('dashboard.dashboard', compact('topCompany'));
}