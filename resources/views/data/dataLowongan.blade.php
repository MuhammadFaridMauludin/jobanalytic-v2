@extends('layouts.user.tabler')
@section('content')
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">Overview</div>
                    <h2 class="page-title">Semua Lowongan</h2>
                </div>
                <!-- Page title actions -->
                {{-- <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <span class="d-none d-sm-inline">
                    <a href="#" class="btn btn-1"> New view </a>
                  </span>
                  <a href="#" class="btn btn-primary btn-5 d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                      <path d="M12 5l0 14"></path>
                      <path d="M5 12l14 0"></path>
                    </svg>
                    Create new report
                  </a>
                  <a href="#" class="btn btn-primary btn-6 d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                      <path d="M12 5l0 14"></path>
                      <path d="M5 12l14 0"></path>
                    </svg>
                  </a>
                </div>
                <!-- BEGIN MODAL -->
                <!-- END MODAL -->
            </div> --}}
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Data Lowongan IT
                    </h3>
                    <div class="card-actions">
                        <form action="{{ route('data.dataLowongan') }}" method="GET">
                            <div class="d-flex gap-2">
                                <!-- search -->
                                <input type="text" name="search" class="form-control" placeholder="Cari lowongan..."
                                    value="{{ request('search') }}">
                                <!-- filter lokasi -->
                                <select name="location" class="form-select">
                                    <option value="">
                                        Semua Lokasi
                                    </option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location }}"
                                            {{ request('location') == $location ? 'selected' : '' }}>
                                            {{ $location }}
                                        </option>
                                    @endforeach
                                </select>
                                <!-- button -->
                                <button type="submit" class="btn btn-primary">
                                    Filter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Job Title</th>
                                <th>Company</th>
                                <th>Location</th>
                                <th>Experience</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $item->title }}
                                    </td>
                                    <td>
                                        {{ $item->company }}
                                    </td>
                                    <td>
                                        {{ $item->location }}
                                    </td>
                                    <td>
                                        {{ $item->experience_level }}
                                    </td>
                                    <td>
                                        @if ($item->salary_min && $item->salary_max)
                                            Rp {{ number_format($item->salary_min, 0, ',', '.') }}
                                            -
                                            Rp {{ number_format($item->salary_max, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- pagination -->
                <div class="card-footer d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
