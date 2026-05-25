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
                                        {{ $job->title }}
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
