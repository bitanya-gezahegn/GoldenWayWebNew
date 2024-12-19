<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NepBus - Online Bus Ticketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">GoldenWay</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mr-24">
                    <li class="nav-item"><a class="nav-link text-white" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Buses</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Profile</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link text-white">Dashboard</a></li>
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-white">Login</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link text-white">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1 class="mb-3">Welcome to NepBus</h1>
            <p>Experience hassle-free bus ticket booking across Nepal!</p>
        </div>
        <div class="card mx-auto shadow-sm" style="max-width: 600px; padding: 20px;">
            <form>
                <div class="mb-3">
                    <label for="from" class="form-label">From</label>
                    <input type="text" id="from" class="form-control" placeholder="Enter starting location">
                </div>
                <div class="mb-3">
                    <label for="to" class="form-label">To</label>
                    <input type="text" id="to" class="form-control" placeholder="Enter destination">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" id="date" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary w-100"><a href="{{ route('login') }}" class="nav-link text-white">Search buses</a></button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script

    </body>
</html>
