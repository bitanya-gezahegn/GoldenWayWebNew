
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register New User</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background: linear-gradient(120deg, #fff8dc, #ffe066);
                color: #333;
            }

            .card {
                border-radius: 10px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }

            .card-header {
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .card-title {
                color: BLACK;
                margin: 0;
            }

            .form-label {
                font-weight: bold;
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

            @media (max-width: 500px) {
                .container {
                    margin-top: 20px;
                }
            }.header {
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
	margin-left: 70px;
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

    </style>
</head>

<body>
    <input type="checkbox" id="checkbox">
   

    <header class="header">
   

        <h2 class="u-name">ADMIN
            <label for="checkbox">
                <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
            </label>
        </h2>
        <a href="/">
		<i class="fa fa-home" aria-hidden="true"></i>
 
		</a>    </header>
    <div class="body">
        <nav class="side-bar">
    @include('sidebaradmin')
           
    </nav>
        <section class="section-1">
                     <div class="card">
                        <div class="card-header text-center">
                            <h3 class="card-title">Register New User</h3>
                        </div>
                        <div class="card-body">
                         

<form method="POST" action="{{ route('adminstoring') }}">
@csrf
<!-- Name -->
<div class="mb-3">
<label for="name" class="form-label">Name</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Enter user name" required>
</div>
<!-- Email -->
<div class="mb-3">
<label for="email" class="form-label">Email</label>
<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
</div>
<!-- Phone -->
<div class="mb-3">
<label for="phone" class="form-label">Phone</label>
<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
</div>
<!-- Role -->
<div class="mb-3">
<label for="role" class="form-label">Role</label>
<select class="form-select" id="role" name="role" required>
<option value="" disabled selected>Select user role</option>
<option value="customer">Customer</option>
<option value="admin">Admin</option>
<option value="operations_officer">Operations Officer</option>
<option value="driver">Driver</option>
<option value="ticket_officer">Ticket Officer</option>
</select>
</div>
<!-- Status -->
<div class="mb-3">
<label for="status" class="form-label">Status</label>
<select class="form-select" id="status" name="status" required>
<option value="active">Active</option>
<option value="suspended">Suspended</option>
</select>
</div>
<!-- Password -->
<div class="mb-3">
<label for="password" class="form-label">Password</label>
<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
</div>
<!-- Confirm Password -->
<div class="mb-3">
<label for="password_confirmation" class="form-label">Confirm Password</label>
<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
</div>
<!-- Submit Button -->
<div class="d-grid">
<button type="submit" class="mt-3 btn btn-golden">Register User</button>
</div>
</form>
<!-- Back to Users List -->
<div class="mt-3 text-center">
<a href="/redirect" class="btn btn-secondary">Back to Users List</a>
</div>
        </div>
                    </div>
                </div>
            </div>
    
    
    </section>
    </div>
</body>
</html>
















