<x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ticket Officer</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Sidebar -->
    <div class="flex">
        <div class="w-64 bg-gray-800 text-white min-h-screen">
            <div class="py-4 text-center bg-gray-900">
                <h2 class="text-xl font-bold">Ticket Officer</h2>
            </div>
            <ul class="mt-6">
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="#" class="block">Dashboard</a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="#" class="block">Profile</a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="#" class="block">Manage Tickets</a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="#" class="block">Settings</a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="#" class="block">Logout</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Header -->
            <div class="bg-white rounded-lg shadow p-4 mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Welcome, {{ $actor->name }}</h2>
                <p class="text-gray-600">Here is an overview of your account and activities.</p>
            </div>

            <!-- User Info -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Your Profile</h3>
                <div class="text-center mb-6">
                    <img class="rounded-full w-32 h-32 mx-auto border-4 border-gray-300 shadow-md" 
                        src="https://www.pngwing.com/en/search?q=avatar" alt="Avatar">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="font-bold text-gray-600">Full Name:</label>
                        <p class="text-gray-800">{{ $actor->name }}</p>
                    </div>
                    <div>
                        <label class="font-bold text-gray-600">Email:</label>
                        <p class="text-gray-800">{{ $actor->email }}</p>
                    </div>
                    <div>
                        <label class="font-bold text-gray-600">Phone Number:</label>
                        <p class="text-gray-800">{{ $actor->phone }}</p>
                    </div>
                    <div>
                        <label class="font-bold text-gray-600">Role:</label>
                        <p class="text-gray-800">{{ $actor->usertype }}</p>
                    </div>
                </div>
            </div>

            <!-- Placeholder Sections -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Recent Activities -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Recent Activities</h3>
                    <ul class="text-gray-700">
                        <li>- Checked ticket status</li>
                        <li>- Updated profile</li>
                        <li>- Responded to a customer inquiry</li>
                    </ul>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h3>
                    <ul>
                        <li>
                            <button class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Create New Ticket</button>
                        </li>
                        <li>
                            <button class="w-full bg-green-500 text-white py-2 mt-4 rounded hover:bg-green-600">View All Tickets</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
</x-app-layout>
