<!-- resources/views/routes/create.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Add New Route</h1>
        <a href="{{ route('routes.index') }}">show route</a>
                     
        
        <!-- Display Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('routes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="start_point" class="form-label">Start Point</label>
                <input type="text" class="form-control" id="start_point" name="start_point" value="{{ old('start_point') }}" required>
                @error('start_point')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="end_point" class="form-label">End Point</label>
                <input type="text" class="form-control" id="end_point" name="end_point" value="{{ old('end_point') }}" required>
                @error('end_point')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration (in minutes)</label>
                <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" required>
                @error('duration')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="distance" class="form-label">Distance (in km)</label>
                <input type="number" class="form-control" id="distance" name="distance" step="0.01" value="{{ old('distance') }}" required>
                @error('distance')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price') }}" required>
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Route</button>
        </form>
    </div>
</x-app-layout>
