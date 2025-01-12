
<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

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
      
    /* Center Section */
    .section-1 {
        width: 100%;
        background-color: #F9FAFB; /* light gray */
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 50px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Section Title */
    .section-1 h1 {
        font-size: 50px;
        color: goldenrod; /* yellow-400 */
        margin-bottom: 30px;
    }

    /* Form Container */
    .form-container {
        width: 100%;
        max-width: 600px;
        background-color: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

    /* Existing Routes Table */
    .route-table {
        width: 100%;
        max-width: 900px;
        margin-top: 30px;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .route-table th,
    .route-table td {
        padding: 15px;
        text-align: left;
        font-size: 16px;
        border-bottom: 1px solid #ddd;
    }

    .route-table th {
        background-color: #F3F4F6; /* light gray */
    }

    .route-table td {
        color: #333;
    }

    .btn-edit, .btn-delete {
        padding: 6px 12px;
        font-size: 14px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-edit {
        background-color: #FFA500; /* orange */
        color: white;
    }

    .btn-edit:hover {
        background-color: #FF7F00; /* dark orange */
    }

    .btn-delete {
        background-color: #E74C3C; /* red */
        color: white;
    }

    .btn-delete:hover {
        background-color: #C0392B; /* dark red */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
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
            <h2 class="u-name">ADMIN</b>
                
            </h2>
            <a href="/">
            <label for="checkbox">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </label>      </a>
        </header>

    <div class="body">
        <nav class="side-bar">
            <ul>
                <li><a href="{{ url('dashboardadmin') }}"><i class="fa fa-desktop"></i><span>Dashboard</span></a></li>
                <li><a href="{{ url('redirect') }}"><i class="fa fa-desktop"></i><span>Manage Users</span></a></li>
                <li><a href="{{ url('admincreate') }}"><i class="fa fa-desktop"></i><span>Add Users</span></a></li>
                   </ul>
        </nav>

        <section class="section-1 py-16">
    <main class="content-section w-full p-6">

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert-success bg-green-100 text-green-800 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit User</h1>

            <!-- Error Alert -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-6">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('adminupdating', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                    <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <!-- Phone -->
                <div class="mb-6">
                    <label for="phone" class="block text-gray-700 font-medium mb-2">Phone</label>
                    <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                </div>

                <!-- Role -->
                <div class="mb-6">
                    <label for="role" class="block text-gray-700 font-medium mb-2">Role</label>
                    <select name="role" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <option value="operations_officer" {{ $user->role == 'operations_officer' ? 'selected' : '' }}>Operation Officer</option>
                        <option value="driver" {{ $user->role == 'driver' ? 'selected' : '' }}>Driver</option>
                        <option value="ticket_officer" {{ $user->role == 'ticket_officer' ? 'selected' : '' }}>Ticket Officer</option>
                    </select>
                </div>

                <!-- Status -->
                <div class="mb-6">
                    <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" id="status" name="status" required>
                        <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="suspended" {{ $user->status == 'suspended' ? 'selected' : '' }}>Suspended</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="submit" class="bg-yellow-500 text-white py-2 px-6 rounded-lg hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-500 focus:outline-none">Update User</button>
                    <a href="{{ url('redirect') }}" class="bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600 focus:ring-2 focus:ring-gray-500 focus:outline-none">Cancel</a>
                </div>
            </form>
        </div>

    </main>
</section>

    </div>

</body>
</html>
</x-app-layout>
