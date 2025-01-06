














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
    .alert-success {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            text-align: center;
        }

        /* Form styles */
        .form-container {
            margin-top: 30px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group select,
        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .form-group select:focus,
        .form-group input:focus {
            border-color: #f8b75c;
            outline: none;
        }

        .btn-golden {
            background-color: #f8b75c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
        }

        .btn-golden:hover {
            background-color: #e6a843;
            color: #fff;

        }

        .container {
                margin-top: 50px;
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 30px;
            }

            .card {
                width: 100%;
                max-width: 800px;
                border-radius: 10px;
                border: 1px solid #e3e6f0;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                background-color: white;
                padding: 20px;
                gap: 30px;
                display: grid;
                place-items: center;

            }

            .card-title {
                font-weight: bold;
                color: #FFD700;
                text-align: center;
                margin-bottom: 20px;
                font-size: 2rem;
            }

            .form-label {
                font-weight: bold;
                font-size: 1.1rem;
                gap: 30px;
                margin-top: 30px;

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

            input.form-control,
            .form-select {
                border-radius: 20px;
                font-size: 1rem;
            }

            input.form-control:focus,
            .form-select:focus {
                box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
                border-color: #FFD700;
            }

            @media (max-width: 500px) {
                .card {
                    width: 90%;
                }
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
 
		</a> </header>
    <div class="body">
        <nav class="side-bar">
    @include('sidebar')
           
    </nav><section class="section-1">
    <main class="content-section">
        <!-- Section Title -->
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="card">
                <h1 class="card-title">Edit Trip</h1>
                <form action="{{ route('trips.update', $trip->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Route Selection -->
                    <div class="mb-3">
                        <label for="route_id" class="form-label">Route</label>
                        <select name="route_id" id="route_id" class="form-select">
                            @foreach ($routes as $route)
                                <option value="{{ $route->id }}" {{ $trip->route_id == $route->id ? 'selected' : '' }}>
                                    {{ $route->origin }} - {{ $route->destination }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <!-- Date Selection -->
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ $trip->date }}" required>
                    </div>
<br>
                    <!-- Departure Time -->
                    <div class="mb-3">
                        <label for="departure_time" class="form-label">Departure Time</label>
                        <input type="time" name="departure_time" id="departure_time" class="form-control" value="{{ $trip->departure_time }}" required>
                    </div>
                    <br>

                    <!-- Arrival Time -->
                    <div class="mb-3">
                        <label for="arrival_time" class="form-label">Arrival Time</label>
                        <input type="time" name="arrival_time" id="arrival_time" class="form-control" value="{{ $trip->arrival_time }}" required>
                    </div>
<br>
                    <!-- Price Input -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ $trip->price }}" required>
                    </div>
<br>
                    <!-- Capacity Input -->
                    <div class="mb-3">
                        <label for="capacity" class="form-label">Capacity</label>
                        <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $trip->capacity }}" required>
                    </div>
<br>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-golden">Update Trip</button>
                </form>
            </div>
        </div>
    </main>
</section>

    </div>
</body>
</html>















