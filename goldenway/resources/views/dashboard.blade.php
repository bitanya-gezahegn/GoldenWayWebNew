<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Route</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .bg-primary {
            background: linear-gradient(135deg, #f7d9b9, #fcf2e5);
        }
        .header-title {
            font-family: 'Lemon Milk', sans-serif;
            letter-spacing: 1px;
        }
        .hover-shadow:hover {
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .card {
            transition: all 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }
        footer p {
            font-size: 0.9em;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="bg-yellow text-gray-800 py-6 shadow-md">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold header-title">Find Your Route</h1>
        </div>
    </header>

    <!-- Map Section -->
    <section class="py-8 grid place-items-center">
        <div class="container mx-auto text-center" data-aos="fade-up">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345095966!2d144.95565131531358!3d-37.81732797975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d2b5c5b7b2a0!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1601516867342!5m2!1sen!2sau"
                class="rounded-lg shadow-lg w-full md:w-3/4"
                height="400"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-16 bg-primary-light">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Search Your Ticket</h2>
            <form action="{{ route('schedule.search') }}" method="POST" class="space-y-4">
                @csrf
                <div class="flex flex-col md:flex-row justify-center gap-4">
                    <input type="text" name="origin" id="origin" placeholder="Enter origin" class="px-4 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-yellow-400 border">
                    <input type="text" name="destination" id="destination" placeholder="Enter destination" class="px-4 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-yellow-400 border">
                    <input type="date" name="date" class="px-4 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-yellow-400 border">
                </div>
                <button type="submit" class="bg-yellow-500 text-gray-800 font-bold px-6 py-2 rounded-md hover:bg-yellow-600 transition transform hover:scale-105 shadow-lg">Search Ticket</button>
            </form>
        </div>
    </section>

    <!-- Search Results Section -->
    @if(isset($schedules) && count($schedules) > 0)
    <section class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-6">Search Results</h2>
            <ul class="space-y-6">
                @foreach ($schedules as $schedule)
                <li class="card bg-white p-6 rounded-lg shadow-md">
                    <p><strong>Route:</strong> {{ $schedule->trip->route->origin ?? 'N/A' }} to {{ $schedule->trip->route->destination ?? 'N/A' }}</p>
                    <p><strong>Date:</strong> {{ $schedule->created_at->format('Y-m-d') }}</p>
                    <p><strong>Driver:</strong> {{ $schedule->driver->name ?? 'N/A' }}</p>
                    <p><strong>Bus Stop:</strong> {{ $schedule->trip->route->bus_stops ?? 'N/A' }}</p>
                    <p><strong>Status:</strong> {{ $schedule->status }}</p>
                    <div class="mt-4 space-x-4">
                        <a href="{{ url('/book-now/' . $schedule->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Book Now</a>
                        <a href="{{ route('feedback.form', $schedule->id) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Feedback</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
    @else
    <section class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold text-gray-700">No Schedules Found</h2>
            <p class="text-gray-500 mt-4">Please try searching with different criteria.</p>
        </div>
    </section>
    @endif

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 GoldenWay Bus. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
</body>
</html>
</x-app-layout>
