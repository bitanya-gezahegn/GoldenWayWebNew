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

        /* Media Queries for Responsiveness */
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
        }

    </style>
</head>

<body>
    <input type="checkbox" id="checkbox">
    <header class="header">
        <h2 class="u-name">ADMIN 
            
        </h2>
        <a href="/">
		<label for="checkbox">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </label>    </a>
    </header>

    <div class="body">
        <nav class="side-bar">
            <ul>
			<li><a href="{{ url('dashboardadmin') }}"><i class="fa fa-desktop"></i><span>Dashboard</span></a></li>
                <li><a href="{{ route('manageusers') }}"><i class="fa fa-desktop"></i><span>Manage Users</span></a></li>
                <li><a href="{{ url('admincreate') }}"><i class="fa fa-desktop"></i><span>Add Users</span></a></li>
             </ul>
        </nav>

     


<section class="p-8 bg-gray-100 justify-center items-center text-center place-items-center m-auto mt-32">
  <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Admin Dashboard</h1>
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="bg-blue-500 text-white p-6 rounded-2xl shadow-lg">
      <h5 class="text-xl font-bold mb-2">Total Users</h5>
      <p class="text-3xl font-semibold">{{$total_user}}</p>
    </div>

    <div class="bg-green-500 text-white p-6 rounded-2xl shadow-lg">
      <h5 class="text-xl font-bold mb-2">Total Tickets</h5>
      <p class="text-3xl font-semibold">{{$total_ticket}}</p>
    </div>

    <div class="bg-yellow-500 text-white p-6 rounded-2xl shadow-lg">
      <h5 class="text-xl font-bold mb-2">Total Bus</h5>
      <p class="text-3xl font-semibold">{{$total_bus}}</p>
    </div>

    <div class="bg-indigo-500 text-white p-6 rounded-2xl shadow-lg">
      <h5 class="text-xl font-bold mb-2">Total Trips</h5>
      <p class="text-3xl font-semibold">{{$total_trips}}</p>
    </div>
  </div>
</section>
    </div>
    </div>

</body>
</html>
</x-app-layout>





































