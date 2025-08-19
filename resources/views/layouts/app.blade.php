<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8fafc;
        }
        .navbar-brand {
            font-weight: 600;
        }
        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .btn {
            border-radius: 0.375rem;
        }
    </style>

    <!-- (Nuevo) Font Awesome + estilos de breadcrumbs -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root{ --brand-green:#2E7D32; } /* tu verde */

        .link-brand{ color:var(--brand-green); text-decoration:none; }
        .link-brand:hover{ text-decoration:underline; }
        .breadcrumb .active{ color:var(--brand-green); font-weight:600; }
        .breadcrumb-item + .breadcrumb-item::before{
            content:"\f054";              /* chevron-right */
            font-family:"Font Awesome 6 Free";
            font-weight:900;
            color:var(--brand-green);
            margin:0 .5rem;
        }
    </style>
</head>
<body class="font-sans antialiased">
<div class="min-vh-100 bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        <!-- (Nuevo) Breadcrumbs globales -->
        <div class="container py-2">
            <x-breadcrumbs :items="$breadcrumbsItems ?? []" />
        </div>

        @yield('content')
    </main>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
