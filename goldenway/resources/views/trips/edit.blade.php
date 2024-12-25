<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Trip</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f8f9fa;
            }

            .container {
                margin-top: 50px;
                display: flex;
                justify-content: center;
            }

            .card {
                width: 100%;
                max-width: 800px;
                border-radius: 10px;
                border: 1px solid #e3e6f0;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                background-color: white;
                padding: 20px;
            }

            .card-title {
                font-weight: bold;
                color: #FFD700;
                text-align: center;
                margin-bottom: 20px;
                font-size: 2rem;
            }

            .form-label {
                font-weight: bold;
                font-size: 1.1rem;
            }

            .btn-golden {
                background-color: #FFD700;
                border-color: #FFD700;
                color: white;
                width: 100%;
                padding: 10px;
                font-size: 1.1rem;
            }

            .btn-golden:hover {
                background-color: #e6be00;
                border-color: #e6be00;
            }

            input.form-control,
            .form-select {
                border-radius: 20px;
                font-size: 1rem;
            }

            input.form-control:focus,
            .form-select:focus {
                box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
                border-color: #FFD700;
            }

            @media (max-width: 500px) {
                .card {
                    width: 90%;
                }
            }
        </style>
    </head>

    <body style="background: linear-gradient(120deg, #fff8dc, #ffe066);">
        <div class="container">
            <div class="card">
                <h1 class="card-title">Edit Trip</h1>
              <form action="{{ route('trips.update', $trip->id) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-3">
<label for="route_id" class="form-label">Route</label>
<select name="route_id" id="route_id" class="form-select">
@foreach ($routes as $route)
<option value="{{ $route->id }}" {{ $trip->route_id == $route->id ? 'selected' : '' }}>
{{ $route->origin }} - {{ $route->destination }}
</option>
@endforeach
</select>
</div>

<div class="mb-3">
<label for="departure_time" class="form-label">Departure Time</label>
<input type="time" name="departure_time" id="departure_time" class="form-control" value="{{ $trip->departure_time }}" required>
</div>

<div class="mb-3">
<label for="arrival_time" class="form-label">Arrival Time</label>
<input type="time" name="arrival_time" id="arrival_time" class="form-control" value="{{ $trip->arrival_time }}" required>
</div>

<div class="mb-3">
<label for="price" class="form-label">Price</label>
<input type="number" name="price" id="price" class="form-control" value="{{ $trip->price }}" required>
</div>

<div class="mb-3">
<label for="capacity" class="form-label">Capacity</label>
<input type="number" name="capacity" id="capacity" class="form-control" value="{{ $trip->capacity }}" required>
</div>

<button type="submit" class="btn btn-golden">Update Trip</button>
</form>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
</x-app-layout>