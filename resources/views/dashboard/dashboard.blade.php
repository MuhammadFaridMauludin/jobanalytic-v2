@extends('layouts.user.tabler')
@section('content')
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title k-->
                    <div class="page-pretitle">Overview</div>
                    <h2 class="page-title">Dashboard test</h2>

                </div>
                <div class="col-auto">

                    <div class="text-end">

                        <div class="fw-bold">

                            {{ number_format($jobsCollected) }}
                            Jobs Collected

                        </div>

                        <div class="text-secondary">

                            Updated {{ $lastUpdated }} ago

                        </div>

                    </div>

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

        <div class="page-body">
            <div class="container-xl">
                <!--s1 stats overview -->
                <div class="row row-deck row-cards mb-3">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Total Lowongan IT</div>
                                    <div class="ms-auto lh-1">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle text-secondary" href="#"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7
                                                days</a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item active" href="#">Last 7 days</a>
                                                <a class="dropdown-item" href="#">Last 30 days</a>
                                                <a class="dropdown-item" href="#">Last 3 months</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="h1 mb-3">{{ number_format($totalJobs) }}</div>
                                <div class="d-flex mb-2">
                                    <div>Conversion rate</div>
                                    <div class="ms-auto">
                                        <span class="text-green d-inline-flex align-items-center lh-1">
                                            7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M3 17l6 -6l4 4l8 -8" />
                                                <path d="M14 7l7 0l0 7" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                        <span class="visually-hidden">75% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Perusahaan Aktif</div>
                                    <div class="ms-auto lh-1">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle text-secondary" href="#"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7
                                                days</a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item active" href="#">Last 7 days</a>
                                                <a class="dropdown-item" href="#">Last 30 days</a>
                                                <a class="dropdown-item" href="#">Last 3 months</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2">{{ number_format($totalCompanies) }}</div>
                                    <div class="me-auto">
                                        <span class="text-green d-inline-flex align-items-center lh-1">
                                            8% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M3 17l6 -6l4 4l8 -8" />
                                                <path d="M14 7l7 0l0 7" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div id="chart-revenue-bg" class="chart-sm"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Rata-rata Gaji</div>
                                    <div class="ms-auto lh-1">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle text-secondary" href="#"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last
                                                7 days</a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item active" href="#">Last 7 days</a>
                                                <a class="dropdown-item" href="#">Last 30 days</a>
                                                <a class="dropdown-item" href="#">Last 3 months</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-3 me-2">Rp {{ number_format($avgSalary, 0, ',', '.') }}</div>
                                    <div class="me-auto">
                                        <span class="text-yellow d-inline-flex align-items-center lh-1">
                                            0% <!-- Download SVG icon from http://tabler-icons.io/i/minus -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l14 0" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div id="chart-new-clients" class="chart-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Top Skill</div>
                                    <div class="ms-auto lh-1">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle text-secondary" href="#"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last
                                                7 days</a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item active" href="#">Last 7 days</a>
                                                <a class="dropdown-item" href="#">Last 30 days</a>
                                                <a class="dropdown-item" href="#">Last 3 months</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-3 me-2">{{ $topSkill }}</div>
                                    <div class="me-auto">
                                        <span class="text-green d-inline-flex align-items-center lh-1">
                                            4% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M3 17l6 -6l4 4l8 -8" />
                                                <path d="M14 7l7 0l0 7" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div id="chart-active-users" class="chart-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--s2 -->
                <div class="row mb-3">
                    <!-- tren lowongan it -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="card-title">Tren Lowongan It</div>
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute top-0 left-0 px-3 mt-1 w-75">
                                    <div class="row g-2">
                                        <div class="col-auto">
                                            <div class="chart-sparkline chart-sparkline-square" id="sparkline-activity">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div> {{ number_format($totalJobs) }} Lowongan</div>
                                            <div class="text-secondary">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-inline text-green" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 17l6 -6l4 4l8 -8" />
                                                    <path d="M14 7l7 0l0 7" />
                                                </svg>
                                                +5% more than yesterday
                                                {{-- {{ round($jobGrowth) }}% dibanding minggu lalu --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart-development-activity"></div>
                            </div>
                        </div>
                    </div>
                    <!-- kategori bidang it -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="card-title">
                                    Kategori Bidang IT
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chart-kategori-it"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--s3 -->
                <div class="row mb-3">
                    <!-- top skill it -->
                    <div class="col-lg-6 ">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="card-title">top skill it</h3>
                                <div id="chart-mentions" class="chart-lg"></div>
                            </div>
                        </div>
                    </div>
                    <!-- rata rata gaji -->
                    <div class="col-lg-6">
                        <div class="card h-100">
                            <div class="card-header border-0">
                                <div class="card-title">
                                    Rata-rata Gaji per Role
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chart-average-salary"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--s4 -->
                <div class="row mb-3">
                    <!-- top 10 company -->
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="card-title">
                                    Top 10 Company Hiring
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chart-top-company"></div>
                            </div>
                        </div>
                    </div>
                    <!-- proporsi pengalaman -->
                    <div class="col-lg-5">
                        <div class="card h-100">
                            <div class="card-header border-0">
                                <div class="card-title">
                                    Proporsi Lowongan Berdasarkan Pengalaman
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chart-experience-level"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--s5 -->
                <div class="row">
                    <!-- map lokasi -->
                    <div class="col-lg-8">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="card-title">
                                    Lokasi Lowongan di Indonesia
                                </h3>
                                <div class="ratio ratio-21x9">
                                    <div>
                                        <div id="map-indonesia" class="w-100 h-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- top lokasi -->
                    <div class="col-lg-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="card-title">
                                    Top Lokasi Hiring
                                </h3>
                                @foreach ($topLocations as $location)
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>
                                                {{ $location->location }}
                                            </span>
                                            <span class="fw-bold">
                                                {{ $location->total_jobs }}
                                            </span>
                                        </div>
                                        <!-- progress bar -->
                                        <div class="progress progress-sm">
                                            <div class="progress-bar"
                                                style="width: {{ ($location->total_jobs / $topLocations->max('total_jobs')) * 100 }}%">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- untuk stat overview -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const charts = [
                    // Revenue Chart
                    {
                        id: '#chart-revenue-bg',
                        options: {
                            chart: {
                                type: 'area',
                                height: 40,
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            series: [{
                                data: [10, 20, 15, 30, 25, 40, 35]
                            }],
                            stroke: {
                                width: 2,
                                curve: 'smooth'
                            },
                            fill: {
                                opacity: 0.2
                            }
                        }
                    },
                    // New Clients Chart
                    {
                        id: '#chart-new-clients',
                        options: {
                            chart: {
                                type: 'line',
                                height: 40,
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            series: [{
                                    name: 'Clients',
                                    data: [10, 12, 8, 14, 11, 16, 9, 15, 13, 18, 12]
                                },
                                {
                                    name: 'Previous',
                                    data: [8, 10, 9, 11, 10, 12, 11, 13, 12, 14, 13]
                                }
                            ],
                            stroke: {
                                width: [2, 2],
                                curve: 'smooth',
                                dashArray: [0, 4]
                            },
                            colors: ['#206bc4', '#999'],
                            legend: {
                                show: false
                            }
                        }
                    },
                    // Active Users Chart
                    {
                        id: '#chart-active-users',
                        options: {
                            chart: {
                                type: 'bar',
                                height: 40,
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            series: [{
                                data: [10, 12, 8, 15, 9, 18, 14]
                            }]
                        }
                    }
                ];
                charts.forEach(chart => {
                    new ApexCharts(
                        document.querySelector(chart.id),
                        chart.options
                    ).render();
                });
            });
        </script>
        <!-- untuk tren lowongan it -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                new ApexCharts(document.querySelector("#chart-development-activity"), {
                    chart: {
                        type: "area",
                        height: 300,
                        toolbar: {
                            show: false
                        },
                        sparkline: {
                            enabled: false
                        }
                    },
                    series: [{
                        name: "Lowongan",
                        data: [120, 150, 180, 170, 210, 250, 300]
                        {{-- data: @json($monthlyJobs) --}}
                    }],
                    xaxis: {
                        categories: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "Mei",
                            "Jun",
                            "Jul"
                        ]
                    },
                    stroke: {
                        curve: "smooth",
                        width: 3
                    },
                    fill: {
                        opacity: 0.2
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
        <!-- untuk kategori bidang it -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                new ApexCharts(document.querySelector("#chart-kategori-it"), {
                    chart: {
                        type: "donut",
                        height: 300
                    },
                    // series: [120, 90, 70, 50, 40],
                    series: @json($categoryTotals),
                    // labels: [
                    //     "Web Developer",
                    //     "UI/UX Designer",
                    //     "Data Analyst",
                    //     "Mobile Developer",
                    //     "DevOps"
                    // ],
                    labels: @json($categoryLabels),
                    legend: {
                        position: "bottom"
                    },
                    dataLabels: {
                        enabled: true
                    },
                    stroke: {
                        width: 0
                    }
                }).render();
            });
        </script>
        <!-- untuk top skill it -->
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
        <!-- untuk rata2 gaji -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                new ApexCharts(document.querySelector("#chart-average-salary"), {
                    chart: {
                        type: "bar",
                        height: 300,
                        toolbar: {
                            show: false
                        }
                    },
                    series: [{
                        name: "Rata-rata Gaji",
                        data: @json($salaryRoleData)
                    }],
                    xaxis: {
                        categories: @json($salaryRoleLabels),
                        labels: {
                            formatter: function(value) {
                                return "Rp " + (value / 1000000).toFixed(0) + "jt";
                            }
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true,
                            borderRadius: 6,
                            barHeight: '60%',
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    yaxis: {
                        labels: {
                            show: true
                        }
                    },
                    tooltip: {
                        y: {
                            formatter: function(value) {
                                return "Rp " + value.toLocaleString('id-ID');
                            }
                        }
                    },
                    colors: ["#206bc4"],
                    grid: {
                        strokeDashArray: 4
                    }
                }).render();
            });
        </script>
        <!-- untuk top 10 company -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                new ApexCharts(document.querySelector("#chart-top-company"), {
                    chart: {
                        type: "bar",
                        height: 300,
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
        <!-- untuk tingkatan pengalaman -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                new ApexCharts(document.querySelector("#chart-experience-level"), {
                    chart: {
                        type: "donut",
                        height: 300
                    },
                    // series: [40, 35, 20, 5],
                    series: @json($experienceTotals),
                    labels: @json($experienceLabels),
                    // labels: [
                    //     "Intern",
                    //     "Junior",
                    //     "Senior",
                    //     "Lead"
                    // ],
                    legend: {
                        position: "bottom"
                    },
                    dataLabels: {
                        enabled: true
                    },
                    stroke: {
                        width: 0
                    },
                    colors: [
                        "#206bc4",
                        "#4299e1",
                        "#f59f00",
                        "#d63939"
                    ]
                }).render();
            });
        </script>
        <!-- untuk top lowongan -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const map = new jsVectorMap({
                    selector: "#map-indonesia",
                    map: "world",
                    selectedRegions: ["ID"],
                    focusOn: {
                        regions: ["ID"],
                        animate: true
                    },
                    zoomButtons: true,
                    regionStyle: {
                        initial: {
                            fill: "#dce7f3"
                        },
                        selected: {
                            fill: "#206bc4"
                        }
                    }
                });
            });
        </script>
    @endsection
