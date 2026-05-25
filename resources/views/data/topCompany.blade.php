@extends('layouts.user.tabler')
@section('content')
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">Overview</div>
                    <h2 class="page-title">Top Company</h2>
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
            <div class="row">
                <!-- chart -->
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Top Company Hiring
                            </h3>
                        </div>
                        <div class="card-body">
                            <div id="chart-top-company"></div>
                        </div>
                    </div>
                </div>
                <!-- table -->
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Ranking Company
                            </h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topCompanies as $company)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                <a href="{{ route('data.detailCompany', $company->company) }}">

                                                    {{ $company->company }}

                                                </a>
                                            </td>
                                            <td>
                                                {{ $company->total_jobs }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new ApexCharts(document.querySelector("#chart-top-company"), {
                chart: {
                    type: "bar",
                    height: 400,
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: "Jumlah Lowongan",
                    // data: [120, 110, 95, 88, 80, 72, 65, 58, 50, 45]
                    data: @json($companyTotals)
                }],
                xaxis: {
                    // categories: [
                    //     "Tokopedia",
                    //     "Shopee",
                    //     "Traveloka",
                    //     "Gojek",
                    //     "Bukalapak",
                    //     "Blibli",
                    //     "Ruangguru",
                    //     "OVO",
                    //     "Dana",
                    //     "Telkom"
                    // ]
                    categories: @json($companyLabels)
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        borderRadius: 6
                    }
                },
                dataLabels: {
                    enabled: false
                },
                colors: ["#206bc4"],
                grid: {
                    strokeDashArray: 4
                }
            }).render();
        });
    </script>
@endsection
