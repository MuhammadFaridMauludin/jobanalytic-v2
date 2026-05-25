@extends('layouts.user.tabler')
@section('content')
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">Overview</div>
                    <h2 class="page-title">Top Skill</h2>
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
                                Grafik Top Skill
                            </h3>
                        </div>
                        <div class="card-body">
                            <div id="chart-mentions"></div>
                        </div>
                    </div>
                </div>
                <!-- table -->
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Ranking Skill
                            </h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Skill</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topSkills as $skill => $total)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                <a href="{{ route('data.detailSkill', $skill) }}">
                                                    {{ $skill }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $total }}
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
            new ApexCharts(document.querySelector("#chart-mentions"), {
                chart: {
                    type: "bar",
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: "Jumlah Lowongan",
                    // data: [120, 98, 85, 70, 60, 45]
                    data: @json($skillTotals)
                }],
                xaxis: {
                    // categories: [
                    //     "Laravel",
                    //     "Python",
                    //     "React",
                    //     "Java",
                    //     "Node.js",
                    //     "Docker"
                    // ]
                    categories: @json($skillLabels)
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        borderRadius: 2,
                        columnWidth: '50%'
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
