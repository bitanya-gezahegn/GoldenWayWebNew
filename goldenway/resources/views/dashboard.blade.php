<x-app-layout><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Route</title>
    <style>
        body {
            font-family: 'Lemon Milk', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fcf2e5;
            color: #333;
        }

        header {
            /* background-color: #ffcc00; */
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.03);
            font-family: 'Lemon Milk', sans-serif;

        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            color: #333;
        }

        .map-section {
            text-align: center;
            margin: 20px 0;
        }

        .map-section iframe {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        main {
            padding: 20px;
        }

        .search-section {
            text-align: center;
            margin: 20px 0;
            border-radius: 22px;
        }

        .search-section input[type="text"],
        .search-section input[type="date"],
        .search-section button {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 1em;
        }

        .search-section button {
            background-color: #ff9900;
            color: #333;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }

        .search-section button:hover {
            background-color: #e6b800;
        }

        .recent-history {
            margin: 20px 0;
        }

        .recent-history h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .recent-history ul {
            list-style-type: none;
            padding: 0;
        }

        .recent-history ul li {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <header>
        <h1>Find Your Route </h1>
    </header>

    <section class="map-section">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345095966!2d144.95565131531358!3d-37.81732797975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d2b5c5b7b2a0!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1601516867342!5m2!1sen!2sau" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </section>

    <main>
    <section class="search-section">
            <h2>Search Your Ticket</h2>
            <form action="{{ route('schedule.search') }}" method="POST">
                @csrf
                <input type="text" name="destination" placeholder="Enter your destination...">
                <input type="date" name="date">
                <button type="submit">Search Ticket</button>
            </form>
        </section>

        @if(isset($schedules) && count($schedules) > 0)
    <section class="recent-history">
        <h2>Search Results</h2>
        <ul>
            @foreach ($schedules as $schedule)
                <li>
                    <span>Route: {{ $schedule->trip->route->origin ?? 'N/A' }} to {{ $schedule->trip->route->destination ?? 'N/A' }}</span>
                    <span>Date: {{ $schedule->created_at->format('Y-m-d') }}</span>
                    <span>Driver: {{ $schedule->driver->name ?? 'N/A' }}</span>
                    <span>Status: {{ $schedule->status }}</span>
                </li>
            @endforeach
        </ul>
    </section>
@else
    <section class="recent-history">
        <h2>No schedules found</h2>
    </section>
@endif

    </main>

    <footer>
        <p>&copy; 2024 Golden Bus. All Rights Reserved.</p>
    </footer>
</body>
</html>
</x-app-layout>
