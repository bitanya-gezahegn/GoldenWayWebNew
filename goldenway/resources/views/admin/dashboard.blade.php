<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffd700;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #007bff;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            font-size: 1rem;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            display: block;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #0056b3;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hidden {
            display: none;
        }

        .visible {
            display: block;
        }
    </style>
</head>
<body>
<x-app-layout>

    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <a href="#register-user" onclick="showSection('register-user')" id="link-register-user">Register New User</a>
        <a href="#add-route" onclick="showSection('add-route')" id="link-add-route">Add Route</a>
        <a href="#view-users" onclick="showSection('view-users')" id="link-view-users">View Total Users</a>
        <a href="#show-routes" onclick="showSection('show-routes')" id="link-show-routes">Show Routes</a>
    </div>

    <div class="main-content">
        <!-- Register New User Section -->
        <div id="register-user" class="content-section visible">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary text-white text-center">
                                <h3>Register New User</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/admin/register-user">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter user name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="usertype" class="form-label">User Type</label>
                                        <select class="form-select" id="usertype" name="usertype" required>
                                            <option value="" disabled selected>Select user type</option>
                                            <option value="registor_officer">Register Officer</option>
                                            <option value="driver">Driver</option>
                                            <option value="ticket_officer">Ticket Officer</option>
                                        </select>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Register User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Route Section -->
        <div id="add-route" class="content-section hidden">
            <div class="container">
                <h3 class="mb-4">Add New Route</h3>
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
        </div>

        <!-- View Users Section -->
        <div id="view-users" class="content-section hidden">
            <h3 class="mb-4">Total Users</h3>
            <div class="card p-4">
                @if ($user->isNotEmpty())
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->usertype }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No users found.</p>
                @endif
            </div>
        </div>

        <!-- Show Routes Section -->
        <div id="show-routes" class="content-section hidden">
            <h3 class="mb-4">Routes</h3>
            <div class="container py-4">
                <h1 class="mb-4 text-center">Available Buses</h1>

                <div class="d-flex justify-content-center mb-4">
                    <form action="{{ route('routes.index') }}" method="GET" class="w-50">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by start or end point" name="search" value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>

                <div class="row">
                    @forelse($routes as $route)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">{{ $route->name ?? 'Bus Service' }}</h5>
                                    <p class="mb-1"><strong>From:</strong> {{ $route->start_point }}</p>
                                    <p class="mb-1"><strong>To:</strong> {{ $route->end_point }}</p>
                                    <p class="mb-1"><strong>Time:</strong> {{ $route->departure_time ?? 'N/A' }}</p>
                                    <p class="mb-1"><strong>Price:</strong> NPR {{ $route->price }}</p>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('routes.edit', $route->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('routes.destroy', $route->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No buses found.</p>
                        </div>
                    @endforelse
                </div>

             
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.content-section');
            const links = document.querySelectorAll('.sidebar a');

            sections.forEach(section => {
                section.classList.add('hidden');
                section.classList.remove('visible');
            });

            links.forEach(link => {
                link.classList.remove('active');
            });

            document.getElementById(sectionId).classList.add('visible');
            document.getElementById(sectionId).classList.remove('hidden');

            document.querySelector(`#link-${sectionId}`).classList.add('active');
        }
    </script>
</body>
</html>
    </x-app-layout>
