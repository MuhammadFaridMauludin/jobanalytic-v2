@extends('layouts.user.tabler')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Company Detail
                    </div>
                    <h2 class="page-title">
                        {{ $company }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Lowongan di {{ $company }}
                    </h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Job</th>
                                <th>Location</th>
                                <th>Experience</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>
                                        {{ ($jobs->currentPage() - 1) * $jobs->perPage() + $loop->iteration }}
                                    </td>
                                    <td>
                                        <div class="fw-bold">
                                            {{ $job->title }}
                                        </div>
                                        <div class="mt-1 d-flex gap-1 flex-wrap">
                                            @if ($job->experience_level)
                                                @php
                                                    $experience = strtolower($job->experience_level);
                                                @endphp
                                                @if (str_contains($experience, 'junior'))
                                                    <span class="badge bg-blue-lt">
                                                        Junior
                                                    </span>
                                                @elseif (str_contains($experience, 'mid'))
                                                    <span class="badge bg-yellow-lt">
                                                        Mid
                                                    </span>
                                                @elseif (str_contains($experience, 'senior'))
                                                    <span class="badge bg-red-lt">
                                                        Senior
                                                    </span>
                                                @endif
                                            @endif
                                            @if ($job->salary_max)
                                                @if ($job->salary_max >= 15000000)
                                                    <span class="badge bg-green-lt">
                                                        Top Salary
                                                    </span>
                                                @elseif ($job->salary_max >= 10000000)
                                                    <span class="badge bg-lime-lt">
                                                        High Salary
                                                    </span>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        {{ $job->location }}
                                    </td>
                                    <td>
                                        {{ $job->experience_level }}
                                    </td>
                                    <td>
                                        @if ($job->salary_min && $job->salary_max)
                                            Rp {{ number_format($job->salary_min, 0, ',', '.') }}
                                            -
                                            Rp {{ number_format($job->salary_max, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
