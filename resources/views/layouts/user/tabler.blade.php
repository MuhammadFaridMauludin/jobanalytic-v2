<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('tabler/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/demo.min.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        /* ── KPI Cards ─────────────────────────────────────── */
        .kpi-accent-bar {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            border-radius: 4px 0 0 4px;
        }

        .card {
            position: relative;
            overflow: hidden;
        }

        .kpi-value {
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: -0.5px;
            line-height: 1.1;
        }

        .kpi-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            font-weight: 500;
            padding: 3px 10px;
            border-radius: 100px;
            margin-top: 8px;
        }

        .kpi-badge.up {
            background: #eaf3de;
            color: #3b6d11;
        }

        .kpi-badge.flat {
            background: #fef3cd;
            color: #856404;
        }

        .kpi-badge.down {
            background: #fce8e6;
            color: #9b1c1c;
        }

        /* ── Chart Headers ──────────────────────────────────── */
        .chart-header {
            margin-bottom: 4px;
        }

        .chart-header .card-title {
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 2px;
        }

        .chart-header .chart-subtitle {
            font-size: 12px;
            color: #888;
            margin-bottom: 0;
        }

        /* ── Custom Legend ──────────────────────────────────── */
        .apex-legend-custom {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .apex-legend-custom span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .apex-legend-custom .dot {
            width: 9px;
            height: 9px;
            border-radius: 2px;
            flex-shrink: 0;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <script src="{{ asset('tabler/dist/js/demo-theme.min.js') }}"></script>
    <div class="page">
        <!-- Sidebar -->
        @include('layouts.user.sidebar')
        <!-- Navbar -->
        @include('layouts.user.header')
        <!-- isi konten -->
        <div class="page-wrapper">
            @yield('content')
        </div>
        <!-- Footer -->
        @include('layouts.user.footer')
    </div>

    <!-- Libs JS -->
    <script src="{{ asset('tabler/dist/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('tabler/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <script src="{{ asset('tabler/dist/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
    <script src="{{ asset('tabler/dist/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('tabler/dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('tabler/dist/js/demo.min.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://cdn.jsdelivr.net/npm/jsvectormap/dist/css/jsvectormap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/world.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/indonesia.js"></script>

    <!-- konfirmasi logout -->
    <script>
        function confirmLogout(event) {

            event.preventDefault();

            Swal.fire({
                title: 'Logout?',
                text: 'Anda yakin ingin logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, logout',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {

                    document.getElementById('logout-form').submit();

                }

            });

        }
    </script>
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
                    // data: @json($monthlyJobs)

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

</body>
</body>

</html>
