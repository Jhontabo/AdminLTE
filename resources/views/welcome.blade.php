<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .hero {
            background-color: #f8f9fa;
            padding: 50px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 40px;
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }

        footer a {
            color: #ffffff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/adminlte/public/">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Log In</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Bienvenido a el panel de Editor de Blogs</h1>
            <p>Esta es una aplicacion creada para poder gestionar blogs de manera sencilla y rapida con unos pocos clicks.</p>
            @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">Go to Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-success btn-lg">Log In</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Register</a>
            @endauth
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Por Jhon Tajumbina y Sara Macuace.</p>
            <p><a href="https://laravel.com" target="_blank">Powered by Laravel</a></p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>