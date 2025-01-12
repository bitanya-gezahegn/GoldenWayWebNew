










<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }

            /* Header Section */
            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px 30px;
                background: #3B82F6; /* blue-400 */
                color: #fff;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .u-name {
                font-size: 20px;
                font-weight: bold;
            }

            .header i {
                font-size: 30px;
                cursor: pointer;
            }

            .header i:hover {
                color: #ffb038;
            }

            /* Sidebar */
            .side-bar {
                width: 250px;
                background-color: #F3F4F6; /* gray-300 */
                min-height: 100vh;
                padding-top: 20px;
                transition: 300ms width ease-in-out;
                box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.1);
            }

            .side-bar ul {
                list-style: none;
                padding-left: 0;
            }

            .side-bar ul li {
                font-size: 16px;
                padding: 15px;
                padding-left: 20px;
                transition: 300ms background-color ease;
            }

            .side-bar ul li:hover {
                background-color: #3B82F6; /* blue-400 */
                color: white;
            }

            .side-bar ul li a {
                text-decoration: none;
                color: #333;
                display: flex;
                align-items: center;
                font-size: 16px;
                padding-right: 10px;
            }

            .side-bar ul li a i {
                margin-right: 15px;
                font-size: 20px;
            }

            /* Toggle Button */
            #checkbox {
                display: none;
            }

            #checkbox:checked ~ .body .side-bar {
                width: 60px;
            }

            #checkbox:checked ~ .body .side-bar .u-name,
            #checkbox:checked ~ .body .side-bar ul li a span {
                display: none;
            }

            /* Body Section */
            .body {
                display: flex;
                transition: margin-left 300ms ease-in-out;
            }

            /* Section Content */
            .section-1 {
                width: 100%;
                background-color: #F9FAFB; /* light gray */
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                padding: 50px;
            }

            .section-1 h1 {
                font-size: 60px;
                color: #3B82F6; /* blue-400 */
            }

            .section-1 p {
                color: #3B82F6;
                font-size: 20px;
                background-color: #fff;
                padding: 15px;
                border-radius: 8px;
                box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            }

            .user-p img {
                width: 100px;
                border-radius: 50%;
            }

            .user-p h4 {
                color: #333;
                padding: 5px 0;
            }

            /* Form Container */
            .form-container {
                width: 100%;
                max-width: 600px;
                background-color: #fff;
                padding: 25px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                margin-top: 30px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                font-size: 16px;
                color: #333;
                margin-bottom: 5px;
            }

            .form-group input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
            }

            .btn-submit {
                width: 100%;
                padding: 12px;
                background-color: #3B82F6; /* blue-400 */
                color: white;
                font-size: 18px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .btn-submit:hover {
                background-color: #1E66A4; /* dark blue */
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .side-bar {
                    width: 200px;
                }

                .header {
                    flex-direction: column;
                    align-items: flex-start;
                    padding: 15px;
                }

                .section-1 h1 {
                    font-size: 40px;
                }

                .form-container {
                    padding: 20px;
                }

                .route-table th, .route-table td {
                    font-size: 14px;
                }

                .btn-submit {
                    font-size: 16px;
                }
            }
            /* Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th,
.table td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

.table th {
    background-color: #3B82F6; /* blue-400 */
    color: white;
    font-size: 16px;
}

.table tr:nth-child(even) {
    background-color: #f4f4f4;
}

.table td {
    font-size: 14px;
}

/* Responsive Design for Table */
@media (max-width: 768px) {
    .table {
        border: 0;
        display: block;
        overflow-x: auto;
    }

    .table th,
    .table td {
        display: block;
        text-align: right;
        padding: 8px;
        border: 0;
    }

    .table th {
        background-color: #f9fafb;
        color: #333;
    }

    .table td {
        background-color: #fff;
        border-bottom: 1px solid #ddd;
        display: block;
        text-align: left;
        font-size: 14px;
    }

    .table td::before {
        content: attr(data-label);
        font-weight: bold;
        display: block;
        text-align: left;
    }
}
/* Edit and Delete Buttons */
.btn-primary {
    background-color: #3B82F6; /* blue-400 */
    color: white;
    font-size: 14px;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #1E66A4; /* dark blue */
}

.btn-danger {
    background-color: #EF4444; /* red-500 */
    color: white;
    font-size: 14px;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-danger:hover {
    background-color: #9B2C2C; /* dark red */
}


        </style>
    </head>

    <body>
        <input type="checkbox" id="checkbox">
        <header class="header">
            <h2 class="u-name">OPERATION <b>OFFICER</b>
                
            </h2>
            <a href="/">
            <label for="checkbox">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </label>      </a>
        </header>

        <div class="body">
            <nav class="side-bar">
                <ul>
                    <li><a href="{{ url('dashboardd') }}"><i class="fa fa-desktop"></i><span>Dashboard</span></a></li>
                    <li><a href="{{ route('manageroute') }}"><i class="fa fa-comments"></i><span>Manage Routes</span></a></li>
                    <li><a href="{{ route('trips.create') }}"><i class="fa fa-calendar-check-o"></i><span>Add Trips</span></a></li>
                    <li><a href="{{ url('trips.index') }}"><i class="fa fa-users"></i><span>Manage Trips</span></a></li>
                    <li><a href="{{ route('schedules.create') }}"><i class="fa fa-address-book"></i><span>Add Schedules</span></a></li>
                    <li><a href="{{ url('schedules.index') }}"><i class="fa fa-bullhorn"></i><span>Manage Schedules</span></a></li>
                    <li><a href="{{ url('issuedisplay') }}"><i class="fa fa-file"></i><span>Reports</span></a></li>
                </ul>
            </nav>

            <section class="section-1 py-8">
    <main class="content-section">
        <!-- Section Title -->
        @if(session('success'))
            <div class="alert-success mb-4 p-4 bg-green-100 text-green-800 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Edit Schedule</h1>

                <!-- Form for editing schedule -->
                <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Trip Selection -->
                    <div class="mb-4">
                        <label for="trip_id" class="block text-sm font-medium text-gray-700">Trip</label>
                        <select name="trip_id" id="trip_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($trips as $trip)
                                <option value="{{ $trip->id }}" {{ $trip->id == $schedule->trip_id ? 'selected' : '' }}>
                                    {{ $trip->route->origin ?? 'N/A' }} to {{ $trip->route->destination ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Driver Selection -->
                    <div class="mb-4">
                        <label for="driver_id" class="block text-sm font-medium text-gray-700">Driver</label>
                        <select name="driver_id" id="driver_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($drivers as $driver)
                                <option value="{{ $driver->id }}" {{ $driver->id == $schedule->driver_id ? 'selected' : '' }}>
                                    {{ $driver->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status Selection -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option value="active" {{ $schedule->status === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $schedule->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </main>
</section>


</div>

    </body>
    </html>
</x-app-layout>











