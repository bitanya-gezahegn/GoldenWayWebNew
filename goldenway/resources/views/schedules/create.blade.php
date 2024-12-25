<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Schedule</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 30px;
        }

        h1 {
            color: #343a40;
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

        .form-label {
            font-weight: bold;
        }
    </style>
</head>

<body style="background: linear-gradient(120deg, #fff8dc, #ffe066);">
    <div class="container mt-5">
        <h1 class="text-center">Create Schedule</h1>
        <form action="{{ route('schedules.store') }}" method="POST">
     @csrf

            <div class="form-group">
                <label for="trip_id" class="form-label">Trip</label>
                <select name="trip_id" id="trip_id" class="form-control">
                    @foreach ($trips as $trip)
                    <option value="{{ $trip->id }}">{{ $trip->id }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group">
                <label for="driver_id" class="form-label">Driver</label>
                <select name="driver_id" id="driver_id" class="form-control">
                    @foreach ($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-golden btn-block">Create</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>