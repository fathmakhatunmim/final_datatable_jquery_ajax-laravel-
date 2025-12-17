<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- boostrap --}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

   {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>




{{-- sweetalert --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">



    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <title>@yield("title", "Library Management")</title>



</head>

<body class="bg-light min-vh-100">

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg shadow px-4 py-3" style="background-color:#383033;">
    <div class="container-fluid">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Book Icon" width="48" class="rounded">
            <span class="navbar-brand fw-bold text-white mb-0">
                Library Management System
            </span>
        </div>

        <div class="d-flex gap-3 align-items-center">
            {{-- Search --}}
            {{-- <form action="{{ route('avaBook.index') }}" method="GET" class="d-flex" style="width:350px;">
                <input type="search" name="search"
                       class="form-control me-2"
                       placeholder="Search by title, author, category"
                       value="{{ request('search') }}">
                <button class="btn btn-primary">Search</button>
            </form> --}}
        </div>
    </div>
</nav>

{{-- Main Layout --}}
<div class="d-flex min-vh-100">

    {{-- Sidebar --}}
    <aside class="p-4" style="width:280px; background:#1E1B1C;">
        <div class="d-flex flex-column gap-3">

            <a href="{{ route('avaBook.index') }}" class="sidebar-link">
                <img src="{{ asset('images/1.png') }}" width="28"> Dashboard
            </a>

            <a href="#" class="sidebar-link">
                <img src="{{ asset('images/4.png') }}" width="28"> Review Book
            </a>

            <a href="#" class="sidebar-link">
                <img src="{{ asset('images/5.png') }}" width="28"> Issue Return
            </a>

            <a href="#" class="sidebar-link">
                <img src="{{ asset('images/7.png') }}" width="28"> Overdue Books
            </a>

            <a href="#" class="sidebar-link">
                <img src="{{ asset('images/2.png') }}" width="28"> Report & Analysis
            </a>

        </div>
    </aside>

    {{-- Content --}}
    <main class="flex-fill p-5">
        <div class="container-fluid">

            <div class="mb-4">
                <h1 class="fw-bold text-dark">
                    @yield('title2', 'Dashboard')
                </h1>
                <p class="text-muted">Welcome Back</p>
            </div>

            <div>
                @include('content')
            </div>

        </div>
    </main>
</div>

{{-- Custom Sidebar Style --}}
<style>
    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 16px;
        background-color: #1E1B1C;
        color: #fff;
        font-weight: 600;
        border-radius: 12px;
        text-decoration: none;
        transition: 0.3s;
    }

    .sidebar-link:hover {
        background-color: #BF82FB;
        color: #fff;
    }
</style>
@include('modal')
{{-- Bootstrap JS --}}
@include('script')

</body>
</html>
