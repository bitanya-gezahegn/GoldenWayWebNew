
<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Bus - Your Ticket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-yellow-600 text-white p-5 text-center">
            <h1 class="text-xl font-bold uppercase">Golden Bus Ticket</h1>
            <p class="text-sm mt-1">Your Journey Starts Here</p>
        </div>

        <!-- Passenger Information -->
        <div class="p-5 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Passenger Information</h2>
            <p class="text-gray-700 mt-2"><strong>Name:</strong> {{ $ticketData['name'] }}</p>
        </div>

        <!-- Trip Details -->
        <div class="p-5 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Trip Details</h2>
            <div class="grid grid-cols-2 gap-4 text-sm mt-2">
                <div>
                    <span class="text-gray-500">From</span>
                    <p class="text-gray-800 font-medium">{{ $ticketData['origin'] }}</p>
                </div>
                <div>
                    <span class="text-gray-500">To</span>
                    <p class="text-gray-800 font-medium">{{ $ticketData['destination'] }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Date</span>
                    <p class="text-gray-800 font-medium">{{ $ticketData['date']->format('Y-m-d') }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Departure</span>
                    <p class="text-gray-800 font-medium">{{ $ticketData['departureTime'] }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Arrival</span>
                    <p class="text-gray-800 font-medium">{{ $ticketData['arrivalTime'] }}</p>
                </div>
            </div>
        </div>

        <!-- Bus Information -->
        <div class="p-5 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Bus Information</h2>
            <div class="grid grid-cols-2 gap-4 text-sm mt-2">
                <div>
                    <span class="text-gray-500">Bus Stop</span>
                    <p class="text-gray-800 font-medium">
                        {{ is_array($ticketData['bus_stop']) ? implode(', ', $ticketData['bus_stop']) : $ticketData['bus_stop'] }}
                    </p>
                </div>
                <div>
                    <span class="text-gray-500">Price</span>
                    <p class="text-gray-800 font-medium">{{ $ticketData['price'] }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Ticket No</span>
                    <p class="text-gray-800 font-medium">{{ $ticketData['id'] }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Seat</span>
                    <p class="text-gray-800 font-medium">{{ $ticketData['seat_number'] }}</p>
                </div>
            </div>
        </div>

        <div class="qr-code">
        {!! QrCode::size(200)->generate($ticket->qr_code); !!}
        </div>

        <!-- Buttons -->
        <div class="p-5 bg-gray-50 text-center">
    <!-- Screenshot Button -->
    <a id="download-ticket" class="block mb-3">
     <div class="download-button">
    <button id="download-ticket" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
        Download Ticket Image
    </button>
</div>
    </a>
    <!-- Payment Button -->
    <form action="{{ route('payment.initialize', $ticket->id) }}" method="POST">
        @csrf
        <button class="w-full bg-yellow-600 text-white font-semibold py-2 rounded-md hover:bg-yellow-500">
            Pay with Chapa
        </button>
    </form>
</div>




</body>
</html>

</x-app-layout>