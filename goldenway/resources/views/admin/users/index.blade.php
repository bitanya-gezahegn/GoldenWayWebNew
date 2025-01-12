




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
    <main class="w-full p-6">

        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">Manage Users</h1>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success mb-4 px-4 py-2 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Users Table -->
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100 text-left text-sm font-medium text-gray-700">
                            <th class="px-4 py-2 border-b">ID</th>
                            <th class="px-4 py-2 border-b">Name</th>
                            <th class="px-4 py-2 border-b">Email</th>
                            <th class="px-4 py-2 border-b">Phone</th>
                            <th class="px-4 py-2 border-b">Role</th>
                            <th class="px-4 py-2 border-b">Status</th>
                            <th class="px-4 py-2 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            @if ($user->role !== 'admin')
                                <tr class="hover:bg-gray-50 transition duration-200">
                                    <td class="px-4 py-3 border-b text-sm">{{ $user->id }}</td>
                                    <td class="px-4 py-3 border-b text-sm">{{ $user->name }}</td>
                                    <td class="px-4 py-3 border-b text-sm">{{ $user->email }}</td>
                                    <td class="px-4 py-3 border-b text-sm">{{ $user->phone }}</td>
                                    <td class="px-4 py-3 border-b text-sm">{{ ucfirst($user->role) }}</td>
                                    <td class="px-4 py-3 border-b text-sm">
                                        <span class="badge {{ $user->status == 'active' ? 'bg-green-500 text-white' : 'bg-yellow-500 text-white' }}">
                                            {{ ucfirst($user->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 border-b text-sm flex space-x-2">
                                        <a href="{{ route('adminediting', $user->id) }}" class="btn btn-sm btn-primary text-white bg-yellow-500 hover:bg-yellow-700 rounded py-2 px-4">
                                            Edit
                                        </a>
                                        <form action="{{ route('admindestroying', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger text-white bg-red-500 hover:bg-red-700 rounded py-2 px-4" onclick="return confirm('Are you sure you want to delete this user?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="7" class="text-center px-4 py-3 text-sm text-gray-500">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
    </main>
</section>


    </div>

</body>
</html>
</x-app-layout>
