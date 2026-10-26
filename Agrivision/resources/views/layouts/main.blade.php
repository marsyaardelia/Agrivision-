<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriVision Garut</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="text-center">
        <div class="container">
            <h1>AgriVision Kabupaten Garut</h1>
            <p class="mb-0 text-white-50">Sistem Deteksi Hama Tanaman Berbasis Computer Vision</p>
        </div>
    </header>

    @include('partials.navbar')

    <main class="container my-5">
        @yield('content')
    </main>

    <footer class="text-center">
        <div class="container">
            <p class="mb-0">&copy; 2026 AgriVision - Kelompok Tani Makmur Kabupaten Garut</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>