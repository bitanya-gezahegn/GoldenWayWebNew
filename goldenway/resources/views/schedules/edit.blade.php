<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Schedule</h1>
       v<form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="trip_id" class="form-label">Trip</label>
        <select name="trip_id" id="trip_id" class="form-control">
            @foreach ($trips as $trip)
                <option value="{{ $trip->id }}" {{ $trip->id == $schedule->trip_id ? 'selected' : '' }}>{{ $trip->id }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="driver_id" class="form-label">Driver</label>
        <select name="driver_id" id="driver_id" class="form-control">
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}" {{ $driver->id == $schedule->driver_id ? 'selected' : '' }}>{{ $driver->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="active" {{ $schedule->status === 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ $schedule->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
    
    <button type="submit" class="btn btn-primary">Update</button>
</form>

    </div>
</body>
</html>
