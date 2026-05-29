<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JobAnalytics · Tren Lowongan IT Indonesia</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.css" />

    <style>
        /* ── RESET & BASE ─────────────────────────────────── */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --navy: #0f1729;
            --navy-2: #162035;
            --navy-3: #1e2d4a;
            --blue: #206bc4;
            --blue-2: #3d84d6;
            --blue-3: #5b9de0;
            --accent: #38bdf8;
            --green: #2fb344;
            --yellow: #f59f00;
            --red: #d63939;
            --purple: #ae3ec9;
            --white: #ffffff;
            --gray-1: #f8fafc;
            --gray-2: #e9eef6;
            --gray-3: #b0bec5;
            --text: #1a2640;
            --text-2: #4a5a72;
            --radius: 12px;
            --shadow: 0 4px 24px rgba(32, 107, 196, .10);
            --shadow-lg: 0 12px 48px rgba(15, 23, 41, .18);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--white);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ── NAVBAR ───────────────────────────────────────── */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 0 5%;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: background .3s, box-shadow .3s;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, .95);
            backdrop-filter: blur(12px);
            box-shadow: 0 1px 0 rgba(0, 0, 0, .08);
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .nav-logo-icon {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            background: linear-gradient(135deg, var(--blue), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-logo-icon svg {
            width: 20px;
            height: 20px;
            color: white;
        }

        .nav-logo-text {
            font-size: 17px;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -0.3px;
        }

        .nav-logo-text span {
            color: var(--blue);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
            list-style: none;
        }

        .nav-links a {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-2);
            text-decoration: none;
            transition: color .2s;
        }

        .nav-links a:hover {
            color: var(--blue);
        }

        .nav-cta {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all .2s;
            cursor: pointer;
            border: none;
        }

        .btn-outline {
            border: 1.5px solid var(--gray-2);
            color: var(--text);
            background: transparent;
        }

        .btn-outline:hover {
            border-color: var(--blue);
            color: var(--blue);
        }

        .btn-primary {
            background: var(--blue);
            color: white;
            box-shadow: 0 2px 12px rgba(32, 107, 196, .3);
        }

        .btn-primary:hover {
            background: var(--blue-2);
            box-shadow: 0 4px 20px rgba(32, 107, 196, .4);
            transform: translateY(-1px);
        }

        .btn-lg {
            padding: 14px 28px;
            font-size: 15px;
            border-radius: 10px;
        }

        .btn-ghost {
            background: rgba(255, 255, 255, .12);
            color: white;
            border: 1.5px solid rgba(255, 255, 255, .25);
        }

        .btn-ghost:hover {
            background: rgba(255, 255, 255, .2);
        }

        /* ── HERO ─────────────────────────────────────────── */
        .hero {
            min-height: 100vh;
            background: var(--navy);
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 100px 5% 60px;
        }

        /* grid dot bg */
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(32, 107, 196, .18) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(56, 189, 248, .12) 0%, transparent 40%);
            pointer-events: none;
        }

        .hero-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, .03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .03) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
        }

        .hero-inner {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(56, 189, 248, .1);
            border: 1px solid rgba(56, 189, 248, .25);
            color: var(--accent);
            font-size: 12px;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 100px;
            margin-bottom: 20px;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .hero-badge span {
            width: 6px;
            height: 6px;
            background: var(--accent);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .5;
                transform: scale(1.4);
            }
        }

        .hero-title {
            font-size: clamp(32px, 4vw, 52px);
            font-weight: 800;
            color: white;
            line-height: 1.15;
            letter-spacing: -1px;
            margin-bottom: 20px;
        }

        .hero-title em {
            font-style: normal;
            background: linear-gradient(90deg, var(--blue-3), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 16px;
            color: rgba(255, 255, 255, .6);
            line-height: 1.7;
            margin-bottom: 36px;
            max-width: 440px;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .hero-stats {
            display: flex;
            gap: 32px;
            margin-top: 48px;
            padding-top: 32px;
            border-top: 1px solid rgba(255, 255, 255, .08);
        }

        .hero-stat-value {
            font-size: 22px;
            font-weight: 700;
            color: white;
            font-family: 'DM Mono', monospace;
        }

        .hero-stat-label {
            font-size: 12px;
            color: rgba(255, 255, 255, .45);
            margin-top: 2px;
        }

        /* ── DASHBOARD MOCKUP ─────────────────────────────── */
        .hero-visual {
            position: relative;
        }

        .mockup-shell {
            background: #1a2844;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, .08);
            box-shadow: 0 24px 80px rgba(0, 0, 0, .5);
            overflow: hidden;
            transform: perspective(1000px) rotateY(-6deg) rotateX(3deg);
            transition: transform .4s;
        }

        .mockup-shell:hover {
            transform: perspective(1000px) rotateY(-2deg) rotateX(1deg);
        }

        .mockup-bar {
            background: #111e38;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 6px;
            border-bottom: 1px solid rgba(255, 255, 255, .06);
        }

        .mockup-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .mockup-url {
            margin-left: 10px;
            background: rgba(255, 255, 255, .06);
            border-radius: 4px;
            padding: 3px 12px;
            font-size: 11px;
            color: rgba(255, 255, 255, .3);
            font-family: 'DM Mono', monospace;
        }

        .mockup-body {
            padding: 14px;
        }

        /* mini kpi cards in mockup */
        .mockup-kpis {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-bottom: 10px;
        }

        .m-kpi {
            background: #243255;
            border-radius: 8px;
            padding: 10px 12px;
            border-left: 3px solid;
        }

        .m-kpi-label {
            font-size: 9px;
            color: rgba(255, 255, 255, .4);
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .m-kpi-val {
            font-size: 16px;
            font-weight: 700;
            color: white;
            font-family: 'DM Mono', monospace;
        }

        .m-kpi-badge {
            font-size: 9px;
            margin-top: 3px;
        }

        .up {
            color: #4ade80;
        }

        .flat {
            color: #fbbf24;
        }

        .mockup-charts {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 8px;
        }

        .m-card {
            background: #243255;
            border-radius: 8px;
            padding: 12px;
        }

        .m-card-title {
            font-size: 10px;
            color: rgba(255, 255, 255, .5);
            margin-bottom: 8px;
            font-weight: 600;
        }

        /* ── SECTIONS COMMON ──────────────────────────────── */
        section {
            padding: 96px 5%;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(32, 107, 196, .08);
            color: var(--blue);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            padding: 5px 12px;
            border-radius: 100px;
            margin-bottom: 16px;
            border: 1px solid rgba(32, 107, 196, .15);
        }

        .section-title {
            font-size: clamp(26px, 3vw, 40px);
            font-weight: 800;
            color: var(--text);
            letter-spacing: -0.8px;
            line-height: 1.2;
            margin-bottom: 16px;
        }

        .section-subtitle {
            font-size: 16px;
            color: var(--text-2);
            line-height: 1.7;
            max-width: 560px;
        }

        .text-center {
            text-align: center;
        }

        .section-header-center {
            text-align: center;
            margin-bottom: 56px;
        }

        .section-header-center .section-subtitle {
            margin: 0 auto;
        }

        /* ── ABOUT ────────────────────────────────────────── */
        .about {
            background: var(--gray-1);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 64px;
            align-items: center;
        }

        .about-points {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 32px;
        }

        .about-point {
            display: flex;
            gap: 14px;
            align-items: flex-start;
        }

        .about-point-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .about-point-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 2px;
        }

        .about-point-desc {
            font-size: 13px;
            color: var(--text-2);
            line-height: 1.6;
        }

        .about-visual {
            background: var(--navy);
            border-radius: 16px;
            padding: 28px;
            box-shadow: var(--shadow-lg);
        }

        .about-visual-title {
            font-size: 12px;
            color: rgba(255, 255, 255, .4);
            margin-bottom: 16px;
            font-weight: 600;
            letter-spacing: .06em;
            text-transform: uppercase;
        }

        .skill-bars {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .skill-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .skill-name {
            font-size: 12px;
            color: rgba(255, 255, 255, .7);
            width: 70px;
            flex-shrink: 0;
            font-family: 'DM Mono', monospace;
        }

        .skill-track {
            flex: 1;
            height: 6px;
            background: rgba(255, 255, 255, .08);
            border-radius: 3px;
            overflow: hidden;
        }

        .skill-fill {
            height: 100%;
            border-radius: 3px;
            background: linear-gradient(90deg, var(--blue), var(--accent));
            animation: growBar 1.2s ease forwards;
            transform-origin: left;
        }

        @keyframes growBar {
            from {
                transform: scaleX(0);
            }

            to {
                transform: scaleX(1);
            }
        }

        .skill-count {
            font-size: 11px;
            color: rgba(255, 255, 255, .4);
            width: 30px;
            text-align: right;
            font-family: 'DM Mono', monospace;
        }

        /* ── FEATURES ─────────────────────────────────────── */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .feature-card {
            background: white;
            border: 1px solid var(--gray-2);
            border-radius: var(--radius);
            padding: 28px;
            transition: all .25s;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--blue), var(--accent));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .3s;
        }

        .feature-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
            border-color: transparent;
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 16px;
        }

        .feature-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 8px;
        }

        .feature-desc {
            font-size: 13px;
            color: var(--text-2);
            line-height: 1.65;
        }

        /* ── ANALYTICS PREVIEW ────────────────────────────── */
        .preview {
            background: var(--navy);
        }

        .preview .section-title {
            color: white;
        }

        .preview .section-subtitle {
            color: rgba(255, 255, 255, .5);
        }

        .preview .section-badge {
            background: rgba(56, 189, 248, .1);
            color: var(--accent);
            border-color: rgba(56, 189, 248, .2);
        }

        .preview-kpis {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .preview-kpi {
            background: rgba(255, 255, 255, .05);
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: var(--radius);
            padding: 20px;
            border-left: 3px solid;
        }

        .preview-kpi-label {
            font-size: 11px;
            color: rgba(255, 255, 255, .4);
            text-transform: uppercase;
            letter-spacing: .06em;
            margin-bottom: 8px;
        }

        .preview-kpi-value {
            font-size: 28px;
            font-weight: 700;
            color: white;
            font-family: 'DM Mono', monospace;
            letter-spacing: -1px;
        }

        .preview-kpi-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            font-weight: 600;
            margin-top: 8px;
            padding: 2px 8px;
            border-radius: 100px;
        }

        .badge-up {
            background: rgba(47, 179, 68, .15);
            color: #4ade80;
        }

        .badge-flat {
            background: rgba(245, 159, 0, .15);
            color: #fbbf24;
        }

        .preview-charts {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 16px;
        }

        .preview-card {
            background: rgba(255, 255, 255, .05);
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: var(--radius);
            padding: 24px;
        }

        .preview-card-title {
            font-size: 13px;
            font-weight: 600;
            color: rgba(255, 255, 255, .7);
            margin-bottom: 4px;
        }

        .preview-card-sub {
            font-size: 11px;
            color: rgba(255, 255, 255, .35);
            margin-bottom: 16px;
        }

        /* ── STATS ────────────────────────────────────────── */
        .stats {
            background: var(--blue);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            text-align: center;
        }

        .stat-value {
            font-size: 44px;
            font-weight: 800;
            color: white;
            font-family: 'DM Mono', monospace;
            letter-spacing: -2px;
            line-height: 1;
        }

        .stat-plus {
            font-size: 28px;
            color: rgba(255, 255, 255, .6);
        }

        .stat-label {
            font-size: 14px;
            color: rgba(255, 255, 255, .7);
            margin-top: 8px;
            font-weight: 500;
        }

        .stat-divider {
            width: 32px;
            height: 3px;
            background: rgba(255, 255, 255, .25);
            border-radius: 2px;
            margin: 10px auto 0;
        }

        /* ── CTA ──────────────────────────────────────────── */
        .cta-section {
            background: linear-gradient(135deg, var(--navy) 0%, #162a4e 100%);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 50%, rgba(32, 107, 196, .2) 0%, transparent 70%);
        }

        .cta-section .section-title {
            color: white;
        }

        .cta-section .section-subtitle {
            color: rgba(255, 255, 255, .55);
            margin: 0 auto 36px;
        }

        .cta-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            position: relative;
            z-index: 1;
        }

        /* ── FOOTER ───────────────────────────────────────── */
        footer {
            background: var(--navy);
            border-top: 1px solid rgba(255, 255, 255, .06);
            padding: 48px 5% 32px;
        }

        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, .06);
        }

        .footer-desc {
            font-size: 13px;
            color: rgba(255, 255, 255, .4);
            line-height: 1.7;
            margin-top: 12px;
            max-width: 280px;
        }

        .footer-col-title {
            font-size: 12px;
            font-weight: 700;
            color: rgba(255, 255, 255, .6);
            text-transform: uppercase;
            letter-spacing: .08em;
            margin-bottom: 16px;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-links a {
            font-size: 13px;
            color: rgba(255, 255, 255, .35);
            text-decoration: none;
            transition: color .2s;
        }

        .footer-links a:hover {
            color: rgba(255, 255, 255, .8);
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 24px auto 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-copy {
            font-size: 12px;
            color: rgba(255, 255, 255, .25);
        }

        /* ── ANIMATIONS ───────────────────────────────────── */
        .fade-up {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity .6s ease, transform .6s ease;
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .fade-up-delay-1 {
            transition-delay: .1s;
        }

        .fade-up-delay-2 {
            transition-delay: .2s;
        }

        .fade-up-delay-3 {
            transition-delay: .3s;
        }

        .fade-up-delay-4 {
            transition-delay: .4s;
        }

        .fade-up-delay-5 {
            transition-delay: .5s;
        }

        .fade-up-delay-6 {
            transition-delay: .6s;
        }

        /* ── RESPONSIVE ───────────────────────────────────── */
        @media (max-width: 1024px) {
            .hero-inner {
                grid-template-columns: 1fr;
            }

            .mockup-shell {
                transform: none;
            }

            .hero-visual {
                display: none;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .preview-kpis {
                grid-template-columns: repeat(2, 1fr);
            }

            .preview-charts {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-inner {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 640px) {
            section {
                padding: 64px 5%;
            }

            .nav-links {
                display: none;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .preview-kpis {
                grid-template-columns: 1fr 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .footer-inner {
                grid-template-columns: 1fr;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 12px;
                text-align: center;
            }

            .hero-actions {
                flex-direction: column;
            }

            .hero-stats {
                gap: 20px;
                flex-wrap: wrap;
            }

            .mockup-kpis {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>

    <!-- ══ NAVBAR ══════════════════════════════════════════════ -->
    <nav class="navbar" id="navbar">
        <a href="#" class="nav-logo">
            <div class="nav-logo-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <path d="M3 3v18h18" />
                    <path d="M7 16l4-4 4 4 4-7" />
                </svg>
            </div>
            <span class="nav-logo-text">Job<span>Analytics</span></span>
        </a>

        <ul class="nav-links">
            <li><a href="#about">Platform</a></li>
            <li><a href="#features">Fitur</a></li>
            <li><a href="#preview">Analytics</a></li>
            <li><a href="#stats">Statistik</a></li>
        </ul>

        <div class="nav-cta">
            {{-- <a href="/login" class="btn btn-outline">Login</a> --}}
            <a href="/dashboard" class="btn btn-primary">Lihat Dashboard</a>
        </div>
    </nav>


    <!-- ══ HERO ════════════════════════════════════════════════ -->
    <section class="hero" id="home">
        <div class="hero-grid"></div>
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <span></span> Live Analytics · Indonesia IT Jobs
                </div>
                <h1 class="hero-title">
                    Analisis Tren<br>
                    <em>Lowongan IT</em><br>
                    di Indonesia
                </h1>
                <p class="hero-subtitle">
                    Eksplorasi data lowongan IT berdasarkan skill, salary, company,
                    dan lokasi secara interaktif — real-time, visual, dan mendalam.
                </p>
                <div class="hero-actions">
                    <a href="/dashboard" class="btn btn-primary btn-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="7" height="7" rx="1" />
                            <rect x="14" y="3" width="7" height="7" rx="1" />
                            <rect x="3" y="14" width="7" height="7" rx="1" />
                            <rect x="14" y="14" width="7" height="7" rx="1" />
                        </svg>
                        Lihat Dashboard
                    </a>
                    <a href="/login" class="btn btn-ghost btn-lg">Login →</a>
                </div>
                <div class="hero-stats">
                    <div>
                        <div class="hero-stat-value">1.3K+</div>
                        <div class="hero-stat-label">Lowongan IT</div>
                    </div>
                    <div>
                        <div class="hero-stat-value">900+</div>
                        <div class="hero-stat-label">Perusahaan</div>
                    </div>
                    <div>
                        <div class="hero-stat-value">50+</div>
                        <div class="hero-stat-label">Skill Dianalisis</div>
                    </div>
                    <div>
                        <div class="hero-stat-value">20+</div>
                        <div class="hero-stat-label">Kota & Provinsi</div>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="mockup-shell">
                    <div class="mockup-bar">
                        <div class="mockup-dot" style="background:#ff5f57;"></div>
                        <div class="mockup-dot" style="background:#febc2e;"></div>
                        <div class="mockup-dot" style="background:#28c840;"></div>
                        <div class="mockup-url">jobanalytics.id/dashboard</div>
                    </div>
                    <div class="mockup-body">
                        <div class="mockup-kpis">
                            <div class="m-kpi" style="border-color:#206bc4;">
                                <div class="m-kpi-label">Lowongan</div>
                                <div class="m-kpi-val">75%</div>
                                <div class="m-kpi-badge up">↑ 7%</div>
                            </div>
                            <div class="m-kpi" style="border-color:#2fb344;">
                                <div class="m-kpi-label">Perusahaan</div>
                                <div class="m-kpi-val">$4.3K</div>
                                <div class="m-kpi-badge up">↑ 8%</div>
                            </div>
                            <div class="m-kpi" style="border-color:#f59f00;">
                                <div class="m-kpi-label">Rata Gaji</div>
                                <div class="m-kpi-val">6,782</div>
                                <div class="m-kpi-badge flat">→ 0%</div>
                            </div>
                            <div class="m-kpi" style="border-color:#ae3ec9;">
                                <div class="m-kpi-label">Top Skill</div>
                                <div class="m-kpi-val">2,986</div>
                                <div class="m-kpi-badge up">↑ 4%</div>
                            </div>
                        </div>
                        <div class="mockup-charts">
                            <div class="m-card">
                                <div class="m-card-title">Tren Lowongan per Bulan</div>
                                <div id="mockup-trend" style="height:100px;"></div>
                            </div>
                            <div class="m-card">
                                <div class="m-card-title">Top Skill</div>
                                <div id="mockup-skill" style="height:100px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ══ ABOUT ════════════════════════════════════════════════ -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-grid">
                <div>
                    <div class="section-badge fade-up">Tentang Platform</div>
                    <h2 class="section-title fade-up fade-up-delay-1">
                        Semua insight hiring IT<br>dalam satu platform
                    </h2>
                    <p class="section-subtitle fade-up fade-up-delay-2">
                        Platform ini membantu kamu menganalisis tren lowongan kerja IT
                        di Indonesia secara mendalam, interaktif, dan visual.
                    </p>
                    <div class="about-points">
                        <div class="about-point fade-up fade-up-delay-2">
                            <div class="about-point-icon" style="background:rgba(32,107,196,.1);">🔍</div>
                            <div>
                                <div class="about-point-title">Skill Paling Dicari</div>
                                <div class="about-point-desc">Lihat teknologi & skill IT apa yang paling banyak diminta
                                    perusahaan saat ini.</div>
                            </div>
                        </div>
                        <div class="about-point fade-up fade-up-delay-3">
                            <div class="about-point-icon" style="background:rgba(47,179,68,.1);">🏢</div>
                            <div>
                                <div class="about-point-title">Company Paling Aktif Hiring</div>
                                <div class="about-point-desc">Temukan perusahaan mana yang paling banyak membuka
                                    lowongan IT.</div>
                            </div>
                        </div>
                        <div class="about-point fade-up fade-up-delay-4">
                            <div class="about-point-icon" style="background:rgba(245,159,0,.1);">💰</div>
                            <div>
                                <div class="about-point-title">Rata-rata Salary</div>
                                <div class="about-point-desc">Bandingkan rata-rata gaji berdasarkan role, skill, dan
                                    level pengalaman.</div>
                            </div>
                        </div>
                        <div class="about-point fade-up fade-up-delay-5">
                            <div class="about-point-icon" style="background:rgba(174,62,201,.1);">📍</div>
                            <div>
                                <div class="about-point-title">Distribusi Lokasi</div>
                                <div class="about-point-desc">Eksplorasi sebaran lowongan IT berdasarkan kota dan
                                    provinsi di Indonesia.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-visual fade-up fade-up-delay-2">
                    <div class="about-visual-title">Top Skill · Real-time</div>
                    <div class="skill-bars">
                        <div class="skill-row">
                            <span class="skill-name">Laravel</span>
                            <div class="skill-track">
                                <div class="skill-fill" style="width:100%; animation-delay:.1s;"></div>
                            </div>
                            <span class="skill-count">120</span>
                        </div>
                        <div class="skill-row">
                            <span class="skill-name">Python</span>
                            <div class="skill-track">
                                <div class="skill-fill" style="width:82%; animation-delay:.2s;"></div>
                            </div>
                            <span class="skill-count">98</span>
                        </div>
                        <div class="skill-row">
                            <span class="skill-name">React</span>
                            <div class="skill-track">
                                <div class="skill-fill" style="width:71%; animation-delay:.3s;"></div>
                            </div>
                            <span class="skill-count">85</span>
                        </div>
                        <div class="skill-row">
                            <span class="skill-name">Java</span>
                            <div class="skill-track">
                                <div class="skill-fill" style="width:58%; animation-delay:.4s;"></div>
                            </div>
                            <span class="skill-count">70</span>
                        </div>
                        <div class="skill-row">
                            <span class="skill-name">Node.js</span>
                            <div class="skill-track">
                                <div class="skill-fill" style="width:50%; animation-delay:.5s;"></div>
                            </div>
                            <span class="skill-count">60</span>
                        </div>
                        <div class="skill-row">
                            <span class="skill-name">Docker</span>
                            <div class="skill-track">
                                <div class="skill-fill" style="width:38%; animation-delay:.6s;"></div>
                            </div>
                            <span class="skill-count">45</span>
                        </div>
                        <div class="skill-row">
                            <span class="skill-name">Vue.js</span>
                            <div class="skill-track">
                                <div class="skill-fill" style="width:32%; animation-delay:.7s;"></div>
                            </div>
                            <span class="skill-count">38</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ══ FEATURES ═════════════════════════════════════════════ -->
    <section id="features">
        <div class="container">
            <div class="section-header-center">
                <div class="section-badge fade-up">Fitur Platform</div>
                <h2 class="section-title fade-up fade-up-delay-1">Semua yang kamu butuhkan<br>untuk analisis IT jobs
                </h2>
                <p class="section-subtitle fade-up fade-up-delay-2">Dari skill analytics hingga salary insights,
                    semuanya tersedia dalam satu dashboard yang interaktif.</p>
            </div>
            <div class="features-grid">
                <div class="feature-card fade-up fade-up-delay-1">
                    <div class="feature-icon" style="background:rgba(32,107,196,.1);">📊</div>
                    <div class="feature-title">Top Skill Analytics</div>
                    <div class="feature-desc">Lihat skill IT yang paling banyak dicari perusahaan, diurutkan
                        berdasarkan frekuensi kemunculan di lowongan.</div>
                </div>
                <div class="feature-card fade-up fade-up-delay-2">
                    <div class="feature-icon" style="background:rgba(47,179,68,.1);">🏢</div>
                    <div class="feature-title">Company Hiring Analytics</div>
                    <div class="feature-desc">Analisis perusahaan dengan hiring terbanyak, lengkap dengan tren dan
                        distribusi posisi yang dibuka.</div>
                </div>
                <div class="feature-card fade-up fade-up-delay-3">
                    <div class="feature-icon" style="background:rgba(245,159,0,.1);">💰</div>
                    <div class="feature-title">Salary Insights</div>
                    <div class="feature-desc">Bandingkan rata-rata salary berdasarkan role IT — dari Backend Dev hingga
                        Data Scientist dan DevOps.</div>
                </div>
                <div class="feature-card fade-up fade-up-delay-4">
                    <div class="feature-icon" style="background:rgba(214,57,57,.1);">📍</div>
                    <div class="feature-title">Location Distribution</div>
                    <div class="feature-desc">Eksplorasi distribusi lowongan berdasarkan lokasi di seluruh Indonesia
                        dengan peta interaktif.</div>
                </div>
                <div class="feature-card fade-up fade-up-delay-5">
                    <div class="feature-icon" style="background:rgba(56,189,248,.1);">📈</div>
                    <div class="feature-title">Monthly Hiring Trends</div>
                    <div class="feature-desc">Pantau pertumbuhan hiring IT dari waktu ke waktu dan identifikasi peak
                        hiring season.</div>
                </div>
                <div class="feature-card fade-up fade-up-delay-6">
                    <div class="feature-icon" style="background:rgba(174,62,201,.1);">🔬</div>
                    <div class="feature-title">Interactive Exploration</div>
                    <div class="feature-desc">Jelajahi data secara detail melalui fitur drill-down analytics, filter,
                        dan visualisasi yang responsif.</div>
                </div>
            </div>
        </div>
    </section>


    <!-- ══ ANALYTICS PREVIEW ════════════════════════════════════ -->
    <section class="preview" id="preview">
        <div class="container">
            <div class="section-header-center">
                <div class="section-badge fade-up">Analytics Preview</div>
                <h2 class="section-title fade-up fade-up-delay-1">Lihat insight nyata<br>dari data IT jobs</h2>
                <p class="section-subtitle fade-up fade-up-delay-2">Preview langsung data analytics yang tersedia di
                    dalam dashboard.</p>
            </div>

            <div class="preview-kpis fade-up fade-up-delay-2">
                <div class="preview-kpi" style="border-color:#206bc4;">
                    <div class="preview-kpi-label">Total Lowongan</div>
                    <div class="preview-kpi-value">1,240</div>
                    <div class="preview-kpi-badge badge-up">↑ 12% bulan ini</div>
                </div>
                <div class="preview-kpi" style="border-color:#2fb344;">
                    <div class="preview-kpi-label">Perusahaan Aktif</div>
                    <div class="preview-kpi-value">342</div>
                    <div class="preview-kpi-badge badge-up">↑ 8% vs minggu lalu</div>
                </div>
                <div class="preview-kpi" style="border-color:#f59f00;">
                    <div class="preview-kpi-label">Rata-rata Gaji</div>
                    <div class="preview-kpi-value">8.5jt</div>
                    <div class="preview-kpi-badge badge-flat">→ 0% flat</div>
                </div>
                <div class="preview-kpi" style="border-color:#ae3ec9;">
                    <div class="preview-kpi-label">Top Skill</div>
                    <div class="preview-kpi-value">Laravel</div>
                    <div class="preview-kpi-badge badge-up">↑ 4% demand</div>
                </div>
            </div>

            <div class="preview-charts fade-up fade-up-delay-3">
                <div class="preview-card">
                    <div class="preview-card-title">Tren Lowongan IT per Bulan</div>
                    <div class="preview-card-sub">Total 1.240 · ↑ +12% dibanding bulan lalu</div>
                    <div id="preview-trend-chart" style="height:220px;"></div>
                </div>
                <div class="preview-card">
                    <div class="preview-card-title">Kategori Bidang IT</div>
                    <div class="preview-card-sub">Distribusi per segmen</div>
                    <div id="preview-donut-chart" style="height:220px;"></div>
                </div>
            </div>
        </div>
    </section>


    <!-- ══ STATS ════════════════════════════════════════════════ -->
    <section class="stats" id="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="fade-up">
                    <div class="stat-value">1,300<span class="stat-plus">+</span></div>
                    <div class="stat-divider"></div>
                    <div class="stat-label">Lowongan IT Terindeks</div>
                </div>
                <div class="fade-up fade-up-delay-1">
                    <div class="stat-value">900<span class="stat-plus">+</span></div>
                    <div class="stat-divider"></div>
                    <div class="stat-label">Perusahaan Aktif</div>
                </div>
                <div class="fade-up fade-up-delay-2">
                    <div class="stat-value">50<span class="stat-plus">+</span></div>
                    <div class="stat-divider"></div>
                    <div class="stat-label">Skill IT Dianalisis</div>
                </div>
                <div class="fade-up fade-up-delay-3">
                    <div class="stat-value">20<span class="stat-plus">+</span></div>
                    <div class="stat-divider"></div>
                    <div class="stat-label">Kota & Provinsi</div>
                </div>
            </div>
        </div>
    </section>


    <!-- ══ CTA ══════════════════════════════════════════════════ -->
    <section class="cta-section">
        <div class="container" style="position:relative; z-index:1;">
            <div class="section-badge fade-up"
                style="background:rgba(56,189,248,.1); color:#38bdf8; border-color:rgba(56,189,248,.2);">Mulai Sekarang
            </div>
            <h2 class="section-title fade-up fade-up-delay-1">
                Mulai eksplorasi data<br>lowongan IT sekarang
            </h2>
            <p class="section-subtitle fade-up fade-up-delay-2">
                Akses dashboard analytics dan temukan insight hiring IT terbaru.<br>
                Gratis, interaktif, dan selalu update.
            </p>
            <div class="cta-actions fade-up fade-up-delay-3">
                <a href="/dashboard" class="btn btn-primary btn-lg">
                    Masuk ke Dashboard →
                </a>
                <a href="/login" class="btn btn-ghost btn-lg">Login</a>
            </div>
        </div>
    </section>


    <!-- ══ FOOTER ═══════════════════════════════════════════════ -->
    <footer>
        <div class="footer-inner">
            <div>
                <a href="#" class="nav-logo">
                    <div class="nav-logo-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="M3 3v18h18" />
                            <path d="M7 16l4-4 4 4 4-7" />
                        </svg>
                    </div>
                    <span class="nav-logo-text" style="color:white;">Job<span>Analytics</span></span>
                </a>
                <p class="footer-desc">
                    Platform analitik tren lowongan IT di Indonesia. Data interaktif untuk job seeker, recruiter, dan
                    developer.
                </p>
            </div>
            <div>
                <div class="footer-col-title">Platform</div>
                <ul class="footer-links">
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#features">Fitur</a></li>
                    <li><a href="#preview">Analytics</a></li>
                    <li><a href="/dashboard">Dashboard</a></li>
                </ul>
            </div>
            <div>
                <div class="footer-col-title">Tautan</div>
                <ul class="footer-links">
                    <li><a href="/login">Login</a></li>
                    <li><a href="https://github.com" target="_blank">GitHub</a></li>
                    <li><a href="#">Dokumentasi</a></li>
                    <li><a href="#">Kontak</a></li>
                </ul>
            </div>
            <div>
                <div class="footer-col-title">Data</div>
                <ul class="footer-links">
                    <li><a href="#">Semua Lowongan</a></li>
                    <li><a href="#">Top Company</a></li>
                    <li><a href="#">Top Skill</a></li>
                    <li><a href="#">Lokasi</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-copy">© {{ date('Y') }} JobAnalytics · Built with Laravel & ApexCharts</div>
            <div class="footer-copy">Made with ❤️ for IT job seekers Indonesia</div>
        </div>
    </footer>


    <!-- ══ SCRIPTS ═══════════════════════════════════════════════ -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            /* ── Navbar scroll effect ─────────────────────────────── */
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', () => {
                navbar.classList.toggle('scrolled', window.scrollY > 20);
            });

            /* ── Fade-up on scroll ────────────────────────────────── */
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    if (e.isIntersecting) e.target.classList.add('visible');
                });
            }, {
                threshold: 0.12
            });
            document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

            /* ── Shared ApexCharts config ─────────────────────────── */
            const darkTooltip = {
                theme: 'dark',
                style: {
                    fontSize: '11px'
                }
            };

            /* ── Mockup mini charts (hero) ────────────────────────── */
            new ApexCharts(document.querySelector('#mockup-trend'), {
                chart: {
                    type: 'area',
                    height: 100,
                    sparkline: {
                        enabled: true
                    },
                    background: 'transparent'
                },
                series: [{
                    data: [120, 150, 180, 170, 210, 250, 300]
                }],
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        opacityFrom: 0.3,
                        opacityTo: 0.02
                    }
                },
                colors: ['#38bdf8'],
                tooltip: {
                    enabled: false
                },
                theme: {
                    mode: 'dark'
                }
            }).render();

            new ApexCharts(document.querySelector('#mockup-skill'), {
                chart: {
                    type: 'bar',
                    height: 100,
                    sparkline: {
                        enabled: true
                    },
                    background: 'transparent'
                },
                series: [{
                    data: [120, 98, 85, 70, 60, 45]
                }],
                plotOptions: {
                    bar: {
                        borderRadius: 3,
                        columnWidth: '60%'
                    }
                },
                colors: ['#206bc4'],
                tooltip: {
                    enabled: false
                },
                theme: {
                    mode: 'dark'
                }
            }).render();

            /* ── Preview — Tren chart ─────────────────────────────── */
            new ApexCharts(document.querySelector('#preview-trend-chart'), {
                chart: {
                    type: 'area',
                    height: 220,
                    toolbar: {
                        show: false
                    },
                    background: 'transparent',
                    fontFamily: 'Plus Jakarta Sans, sans-serif',
                    animations: {
                        speed: 800
                    }
                },
                series: [{
                    name: 'Lowongan',
                    data: [120, 150, 180, 170, 210, 250, 300]
                }],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
                    labels: {
                        style: {
                            colors: 'rgba(255,255,255,.4)',
                            fontSize: '11px'
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                yaxis: {
                    min: 80,
                    labels: {
                        style: {
                            colors: 'rgba(255,255,255,.4)',
                            fontSize: '11px'
                        }
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 2.5
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.02,
                        stops: [0, 100]
                    }
                },
                dataLabels: {
                    enabled: false
                },
                colors: ['#206bc4'],
                grid: {
                    borderColor: 'rgba(255,255,255,.06)',
                    strokeDashArray: 4
                },
                tooltip: darkTooltip,
                markers: {
                    size: 0,
                    hover: {
                        size: 5
                    }
                },
                theme: {
                    mode: 'dark'
                }
            }).render();

            /* ── Preview — Donut chart ────────────────────────────── */
            new ApexCharts(document.querySelector('#preview-donut-chart'), {
                chart: {
                    type: 'donut',
                    height: 220,
                    background: 'transparent',
                    fontFamily: 'Plus Jakarta Sans, sans-serif',
                    animations: {
                        speed: 800
                    }
                },
                series: [120, 90, 70, 50, 40],
                labels: ['Web Dev', 'UI/UX', 'Data Analyst', 'Mobile', 'DevOps'],
                colors: ['#206bc4', '#2fb344', '#f59f00', '#d63939', '#ae3ec9'],
                stroke: {
                    width: 0
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '68%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total',
                                    fontSize: '11px',
                                    color: 'rgba(255,255,255,.4)',
                                    formatter: () => '370'
                                },
                                value: {
                                    fontSize: '18px',
                                    fontWeight: 700,
                                    color: 'white'
                                }
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    position: 'bottom',
                    fontSize: '11px',
                    labels: {
                        colors: 'rgba(255,255,255,.5)'
                    },
                    markers: {
                        width: 8,
                        height: 8,
                        radius: 2
                    },
                    itemMargin: {
                        horizontal: 6
                    }
                },
                tooltip: darkTooltip,
                theme: {
                    mode: 'dark'
                }
            }).render();

        });
    </script>

</body>

</html>
