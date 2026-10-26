<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Praktikum Laravel</title>
    <style>
        body {font-family: Arial, sans-serif; margin: 20px; }
        header, footer { background: #f5f5f5; padding: 10px; text-align: center; }
        nav a { margin: 0 10px; text-decoration: none; }
        .card { border: 1px solid #ddd; padding: 15px; margin: 10px 0; border-radius: 6px; }
        .course { background: #eef; margin: 3px; padding: 5px; display: inline-block; border-radius: 4px; }
    </style>
</head>
<body>
    <header>
        <h1>Praktikum Laravel</h1>
        <nav>
            <a href="{{ route('students.index') }}">Mahasiswa</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Praktikum Laravel - Marsya Ardelia Firmansyah</p>
    </footer>
</body>
</html>