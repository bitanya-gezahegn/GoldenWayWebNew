
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>


    <style>
        * {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: arial, sans-serif;
}

.alert-success {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            text-align: center;
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
   

        <h2 class="u-name">DRIVER
            <label for="checkbox">
                <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
            </label>
        </h2>
        <a href="/">
		<i class="fa fa-home" aria-hidden="true"></i>
 
		</a>     </header>
    <div class="body">
        <nav class="side-bar">
    @include('sidebardriver')
           
    </nav>
    <div class="max-w-4xl mx-auto mt-10">
    <header class="header mb-8">
        <h2 class="text-3xl font-semibold text-center text-gray-800">Your Feedbacks</h2>
    </header>

    <section class="bg-gray-100 p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Feedback History</h1>

        @if ($feedbacks->isEmpty())
            <p class="text-center text-gray-500">No feedbacks available yet.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700 uppercase text-sm font-medium">
                            <th class="px-6 py-4 text-left border-b">Customer</th>
                            <th class="px-6 py-4 text-left border-b">Rating</th>
                            <th class="px-6 py-4 text-left border-b">Feedback</th>
                            <th class="px-6 py-4 text-left border-b">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4 border-b">{{ $feedback->customer->name ?? 'Unknown' }}</td>
                                <td class="px-6 py-4 border-b">{{ $feedback->rating }} / 5</td>
                                <td class="px-6 py-4 border-b">{{ $feedback->feedback }}</td>
                                <td class="px-6 py-4 border-b">{{ $feedback->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</div>
    </div>
</section>


    </div>
</body>
</html>


