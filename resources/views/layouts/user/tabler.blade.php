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

        <div class="page-wrapper">
            <!-- Navbar -->
            @include('layouts.user.header')
            <!-- isi konten -->
            @yield('content')
            <!-- Footer -->
            @include('layouts.user.footer')
        </div>
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
</body>

</html>
