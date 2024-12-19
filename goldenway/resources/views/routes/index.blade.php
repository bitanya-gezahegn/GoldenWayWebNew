<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Buses</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 10px;
            border: 1px solid #e3e6f0;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-title {
            font-weight: bold;
            color: #FFD700; /* Golden accent */
        }

        .btn-golden {
            background-color: #FFD700;
            border-color: #FFD700;
            color: white;
        }

        .btn-golden:hover {
            background-color: #e6be00;
            border-color: #e6be00;
        }

        input.form-control {
            border-radius: 20px;
        }

        input.form-control:focus {
            box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
            border-color: #FFD700;
        }

        .no-data-img {
            width: 150px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4 text-center text-golden">Available Buses</h1>

        <!-- Centered Search Form -->
        <div class="d-flex justify-content-center mb-4">
            <form action="{{ route('routes.index') }}" method="GET" class="w-50">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter starting or destination city" name="search" aria-label="Search Routes" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>

        <!-- Buses Display -->
        <div class="row">
            @forelse($routes as $route)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $route->name ?? 'Bus Service' }}</h5>
                            <p class="mb-1"><strong>From:</strong> {{ $route->start_point }}</p>
                            <p class="mb-1"><strong>To:</strong> {{ $route->end_point }}</p>
                            <p class="mb-1"><strong>Time:</strong> {{ $route->departure_time ?? 'N/A' }}</p>
                            <p class="mb-1"><strong>Price:</strong> NPR {{ $route->price }}</p>
                            <a href="{{ route('book', $route->id) }}" class="btn btn-golden mt-2 w-100">Book Now</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <img src="no-data.svg" alt="No data found" class="no-data-img mb-3">
                    <p>No buses found. Please try searching for a different route.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $routes->links() }}
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>
