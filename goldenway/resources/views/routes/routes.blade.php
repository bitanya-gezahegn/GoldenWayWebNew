



















<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: arial, sans-serif;
}
.header {
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 15px 30px;
	background: #f8b75c;
	color: #f6f3f3;
}
.u-name {
	font-size: 20px;
	padding-left: 17px;
}
.u-name b {
	background: #f8b75c;
}
.header i {
	font-size: 30px;
	cursor: pointer;
	color: #fff;
}
.header i:hover {
	color: #ffb038;
}
.user-p {
	text-align: center;
	padding-left: 10px;
	padding-top: 25px;
}
.user-p img {
	width: 100px;
	border-radius: 50%;
}
.user-p h4 {
	color: #fef3e8;
	padding: 5px 0;

}
.side-bar {
	width: 250px;
	background: hsl(0, 80%, 98%);
	min-height: 100vh;
	transition: 500ms width;
}
.body {
	display: flex;
}
.section-1 {
	width: 100%;
  background-color: #f4efe9;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
    margin: auto;
    
}
.section-1 h1 {
	color: #fff;
	font-size: 60px;
}
.section-1 p {
	color: #f3a93b;
	font-size: 20px;
	background: #fff;
	padding: 7px;
	border-radius: 5px;
}
.side-bar ul {
	margin-top: 20px;
	list-style: none;
}
.side-bar ul li {
	font-size: 16px;
	padding: 15px 0px;
	padding-left: 20px;
	transition: 500ms background;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.side-bar ul li:hover {
	background: #f6aa38;
}
.side-bar ul li a {
	text-decoration: none;
	color: #100f0f;
	cursor: pointer;
	letter-spacing: 1px;
}
.side-bar ul li a i {
	display: inline-block;
	padding-right: 10px;
	font-size: 23px;
}

#navbtn {
	display: inline-block;
	margin-left: 40px;
	font-size: 20px;
	transition: 500ms color;
}
#checkbox {
	display: none;
}
#checkbox:checked ~ .body .side-bar {
	width: 60px;
}
#checkbox:checked ~ .body .side-bar .user-p{
	visibility: hidden;
}
#checkbox:checked ~ .body .side-bar a span{
	display: none;
}
        .side-bar ul {
            list-style: none;
            padding: 0;
        }

        .side-bar ul li {
            position: relative;
        }

        .side-bar ul li a {
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px;
            color: #333;
        }

        .side-bar ul li a:hover {
            background: #fd901b;
        }

        .side-bar ul li .sub-menu {
            display: none;
            list-style: none;
            margin: 0;
            padding-left: 20px;
        }

        .side-bar ul li.active .sub-menu {
            display: block;
        }

        .side-bar ul li .sub-menu li a {
            padding: 5px;
        }
    .section-1 {
        width: 100%;
        background-color: #f4efe9; /* Subtle background for section */
        padding: 20px; /* Add padding for spacing */
    }

    .section-1 h1 {
        color: #f8b75c; /* Matching the header's theme */
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center; /* Center-align the title */
    }

    .text-end {
        margin-bottom: 20px;
        text-align: right;
    }

    .btn-golden {
        background-color: #f8b75c;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
    }

    .btn-golden:hover {
        background-color: #e6a843;
        color: #fff;
    }

    table.table {
        background-color: #ffffff; /* White background for better contrast */
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
        overflow: hidden;
    }

    table.table th {
        background-color: #f8b75c; /* Header background */
        color: white;
        text-align: center;
        font-weight: bold;
        padding: 10px;
    }

    table.table td {
        text-align: center; /* Center-align table cells */
        padding: 10px;
    }

    table.table td:last-child {
        display: flex;
        justify-content: center; /* Align action buttons to the center */
        gap: 10px; /* Add spacing between buttons */
    }

    table.table td .btn {
        font-size: 14px;
        padding: 5px 10px;
        border-radius: 4px;
    }

    table.table .btn-primary {
        background-color: #4CAF50; /* Green for edit */
        border: none;
    }

    table.table .btn-primary:hover {
        background-color: #45a049;
    }

    table.table .btn-danger {
        background-color: #f44336; /* Red for delete */
        border: none;
    }

    table.table .btn-danger:hover {
        background-color: #e53935;
    }
 
    /* Main content container */
    .content-section {
        padding: 20px;
        background-color: #f4efe9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 900px;
        margin: 0 auto;
    }

    /* Form container */
    .form-container {
        margin-bottom: 30px;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Form field styling */
    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .form-group input:focus {
        border-color: #f8b75c;
        outline: none;
    }

    /* Submit button styling */
    .btn-submit {
        background-color: #f8b75c;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
    }

    .btn-submit:hover {
        background-color: #e6a843;
    }

    /* Table styling */
    .route-table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .route-table th, .route-table td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .route-table th {
        background-color: #f8b75c;
        color: white;
        font-weight: bold;
    }

    .route-table td {
        background-color: #fff;
    }

    .route-table tr:hover {
        background-color: #f6f3f3;
    }

    /* Button styles for edit and delete */
    .btn-edit, .btn-delete {
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-edit {
        background-color: #4CAF50;
        color: white;
    }

    .btn-edit:hover {
        background-color: #45a049;
    }

    .btn-delete {
        background-color: #f44336;
        color: white;
    }

    .btn-delete:hover {
        background-color: #e53935;
    }
    .alert-success {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            text-align: center;
        }



    </style>
</head>

<body>
    <input type="checkbox" id="checkbox">
   

    <header class="header">
   

        <h2 class="u-name">OPERATION<b>OFFICER</b>
            <label for="checkbox">
                <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
            </label>
        </h2>
        <a href="/">
		<i class="fa fa-home" aria-hidden="true"></i>
 
		</a>  </header>
    <div class="body">
        <nav class="side-bar">
    @include('sidebar')
           
    </nav>
    <section class="section-1">
    <main class="content-section">
        <!-- Section Title -->
        @if(session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                @endif
        <h1>Manage Routes</h1>

        <!-- Form for Adding New Route -->
        <form action="{{ route('routes.store') }}" method="POST" class="form-container">
            @csrf
            <div class="form-group">
                <label for="start">Start Location:</label>
                <input type="text" id="start" name="start" required placeholder="Enter start location">
            </div>
            <div class="form-group">
                <label for="end">End Location:</label>
                <input type="text" id="end" name="end" required placeholder="Enter end location">
            </div>
            <div class="form-group">
                <label for="stop">Bus Stops (Optional):</label>
                <input type="text" id="stop" name="stop" placeholder="Enter bus stops, separated by commas">
            </div>
            <button type="submit" class="btn-submit">Add Route</button>
        </form>

        <!-- Existing Routes Table -->
        <h2>Existing Routes</h2>
        <table class="route-table">
            <thead>
                <tr>
                    <th>Route</th>
                    <th>Bus Stops</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($routes as $route)
                    <tr>
                        <td>{{ $route->origin }} - {{ $route->destination }}</td>
                        <td>
                            @if($route->bus_stops)
                                {{ implode(', ', json_decode($route->bus_stops)) }}
                            @else
                                No bus stops
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('routes.edit/'.$route->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('routes.destroy', $route->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</section>

    </div>
</body>
</html>
