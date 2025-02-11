

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
                    <section class=" mb-48">
        <h2 class="text-4xl font-bold text-center text-gray-800 pt-10">Edit Bus</h2>


                    <!-- Form for Editing Route -->
                    <form action="{{ route('buses.edit_confirm', $bus->id) }}" method="POST" class="form-container">
                        @csrf
                        <!-- Start Location Field -->
                        <div class="form-group">
                        <label for="bus_type" class="form-label"> Bus Type:</label>
                            <input type="text" id="bus_type" name="bus_type" class="form-control" value="{{ $bus->bus_type }}" required>
     </div>

                        <!-- End Location Field -->
                        <div class="form-group">
                        <label for="plate_number" class="form-label">Plate Number:</label>
        <input type="text" name="plate_number" id="plate_number"   class="form-control" value="{{ $bus->plate_number }}" required>
       </div> 
                        <button type="submit" class="btn-submit">Update Bus</button>
                    </form>

                </main>
            </section>

        </div>

    </body>
    </html>
</x-app-layout>












