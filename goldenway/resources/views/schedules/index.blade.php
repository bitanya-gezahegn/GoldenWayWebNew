

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
                background: goldenrod; /* yellow-400 */
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
                background-color: goldenrod; /* yellow-400 */
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
                color: goldenrod; /* yellow-400 */
            }

            .section-1 p {
                color: goldenrod;
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
                background-color: goldenrod; /* yellow-400 */
                color: white;
                font-size: 18px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .btn-submit:hover {
                background-color: #1E66A4; /* dark yellow */
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
    background-color: goldenrod; /* yellow-400 */
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
    background-color: goldenrod; /* yellow-400 */
    color: white;
    font-size: 14px;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #1E66A4; /* dark yellow */
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
                <li><a href="{{ url('bus') }}"><i class="fa fa-file"></i><span>Manage Buses</span></a></li>

                <li><a href="{{ route('schedules.create') }}"><i class="fa fa-address-book"></i><span>Add Schedules</span></a></li>
                <li><a href="{{ url('schedules.index') }}"><i class="fa fa-bullhorn"></i><span>Manage Schedules</span></a></li>
                <li><a href="{{ url('issuedisplay') }}"><i class="fa fa-file"></i><span>Reports</span></a></li>
                <li>
                    <a href="{{ route('refund.requests') }}">
                        <i class="fa fa-file"></i>
                        <span>Refund Requests</span>
                    </a>
                </li>
            </ul>
            </nav>

            <section class="section-1 py-8">
    <div class="max-w-7xl mx-auto px-4 mb-60">
        <h1 class="text-3xl font-semibold text-center text-yellow-600 ">Schedules</h1>

        <!-- Table for schedules -->
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden pt-10 mt-10">
            <thead>
                <tr class="bg-gray-200 text-left text-sm font-medium text-gray-700">
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Trip</th>
                    <th class="px-4 py-2 border-b">Driver</th>
                    <th class="px-4 py-2 border-b">Bus</th>
                    <th class="px-4 py-2 border-b">Status</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $schedule->id }}</td>
                        <td class="px-4 py-2">{{ $schedule->trip->route->origin ?? 'N/A' }} to {{ $schedule->trip->route->destination ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $schedule->driver->name }}</td>
                        <td class="px-4 py-2">{{ $schedule->bus->bus_type }}</td>
                        <td class="px-4 py-2">{{ $schedule->status }}</td>
                        <td class="px-4 py-2 flex items-center space-x-2">
                            <a href="{{ route('schedules.edit', $schedule->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded-lg hover:bg-yellow-600 transition duration-300">Edit</a> 

                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-lg hover:bg-red-600 transition duration-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

        </div>

    </body>
    </html>
</x-app-layout>
