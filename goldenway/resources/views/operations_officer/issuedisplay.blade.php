

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
   

        <h2 class="u-name">OPERATION <b>OFFICER</b>
            <label for="checkbox">
                <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
            </label>
        </h2>
        <a href="/">
		<i class="fa fa-home" aria-hidden="true"></i>
 
		</a>    </header>
    <div class="body">
        <nav class="side-bar">
    @include('sidebar')
           
    </nav>
        <section class="section-1">
        <main class="p-4 w-100 section-1">

        <h1>Issue Reports</h1>


<table class="table table-striped">
<thead>
<tr>
<th>Driver</th>
<th>Issue</th>
<th>Date</th>

</tr>
</thead>
<tbody>
@foreach ($reports as $report)
<tr>
<td>{{ $report->driver->name }}</td>
<td>{{ $report->description }}</td>
<td>{{ $report->reported_at }}</td>

</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
        </main>
    
    </section>
    </div>
</body>
</html>

















