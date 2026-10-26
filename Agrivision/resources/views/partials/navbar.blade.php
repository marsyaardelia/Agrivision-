<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-link navbar-brand" href="{{ route('home') }}">AgriVision</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tentang') }}">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('deteksi.form') }}">Input Deteksi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('deteksi.riwayat') }}">Riwayat Deteksi</a></li>
            </ul>
        </div>
    </div>
</nav>