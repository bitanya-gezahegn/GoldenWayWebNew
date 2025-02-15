


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
                background: goldenrod; /* blue-400 */
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
                background-color: goldenrod; /* blue-400 */
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
                color: goldenrod; /* blue-400 */
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
                background-color: goldenrod; /* blue-400 */
                color: white;
                font-size: 18px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .btn-submit:hover {
                background-color: yellow; /* dark blue */
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

            <section class="section-1">
    <main class="content-section">
        <!-- Section Title -->
        @if(session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h1 class="card-title text-center">Create Trip</h1>

<!-- Trip creation form -->
<form action="{{ route('trips.store') }}" method="POST" class="form-container">
    @csrf

    <!-- Route Selection -->
    <div class="form-group mb-3">
        <label for="route_id" class="form-label">Route</label>
        <select name="route_id" id="route_id" class="form-select" required>
            @foreach ($routes as $route)
                <option value="{{ $route->id }}">{{ $route->origin }} - {{ $route->destination }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="date" class="form-label">Date:</label>
        <input type="date" name="date" id="date" class="form-control" required>
    </div>


    <!-- Departure Time -->
    <div class="form-group mb-3">
        <label for="departure_time" class="form-label">Departure Time</label>
        <input type="time" name="departure_time" id="departure_time" class="form-control" required>
    </div>

    <!-- Arrival Time -->
    <div class="form-group mb-3">
        <label for="arrival_time" class="form-label">Arrival Time</label>
        <input type="time" name="arrival_time" id="arrival_time" class="form-control" required>
    </div> 
    
  
    <!-- Price -->
    <div class="form-group mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" name="price" id="price" class="form-control" step="0.01" required>
    </div>

    <!-- Capacity -->
    <div class="form-group mb-3">
        <label for="capacity" class="form-label">Capacity</label>
        <input type="number" name="capacity" id="capacity" class="form-control" required>
    </div>

    <!-- Submit Button --> 
    <button type="submit" class="btn-submit">Create Trip</button>
</form>
    </main>
</section>
        </div>

    </body>
    </html>
</x-app-layout>
