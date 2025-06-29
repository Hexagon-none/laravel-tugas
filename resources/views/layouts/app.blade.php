<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Data Kelas</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/sidebars.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/DataTables-1.13.3/css/dataTables.bootstrap5.css') }}">
</head>

<body>
    <div class="d-flex" style="min-height: 100vh;">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 200px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-1 me-md-auto text-white text-decoration-none">
                <span class="fs-5">Data Kelas</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="/" class="nav-link text-white">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('kelas') }}" class="nav-link text-white">
                        Data Kelas
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle mb-4"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>{{ Auth::user()->name }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="flex-fill bg-light">
            <nav
                class="navbar navbar-light bg-white shadow-sm px-4 py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Sistem Pendataan Kelas</h5>
                <span class="text-muted small">
                    {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y - H:i') }}
                </span>
            </nav>
            <div class="p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('assets/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables-1.13.3/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables-1.13.3/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/sidebars.js') }}"></script>

    @yield('scripts')
</body>

</html>
