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
    <p class="text-gray-800 font-medium">
        @if(!empty($ticketData['date']) && $ticketData['date'] !== 'N/A')
            {{ \Carbon\Carbon::parse($ticketData['date'])->format('Y-m-d') }}
        @else
            N/A
        @endif
    </p>
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
                </div>   <div>
                    <span class="text-gray-500">Distance</span>
                    <p class="text-gray-800 font-medium">{{ $ticketData['distance'] }}km</p>
                </div>
                <div>
                    <span class="text-gray-500">Ticket No</span>
                    <p class="text-gray-800 font-medium">{{ $ticketData['id'] }}</p>
                </div> 
                <div>
                    <span class="text-gray-500">Bus</span>
                    <p class="text-gray-800 font-medium">{{ $ticketData['bus'] }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Seat</span>
                    <p class="text-gray-800 font-medium">{{ $ticketData['seat_number'] }}</p>
                </div>
            </div>
        </div>

        <!-- QR Code -->
        <div class="p-5 text-center flex justify-center ">
            <div id="qr-code-container">
                {!! QrCode::size(200)->generate(
                    "Golden Bus Ticket\n".
                    "Name: {$ticketData['name']}\n".
                    "From: {$ticketData['origin']}\n".
                    "To: {$ticketData['destination']}\n".
                    "Date: {$ticketData['date']}\n".
                    "Departure: {$ticketData['departureTime']}\n".
                    "Arrival: {$ticketData['arrivalTime']}\n".
                    "Seat: {$ticketData['seat_number']}\n".
                    "Bus: {$ticketData['bus']}\n".
                    "Ticket No: {$ticketData['id']}\n".
                    "Price: {$ticketData['price']}"
                ) !!}
            </div>
        </div>

        <!-- Buttons -->
        <div class="p-5 bg-gray-50 text-center">
            <!-- Download Button -->
            <button id="download-ticket" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Download Ticket Image
            </button>

            <!-- Payment Button -->
            
            <form action="{{ route('payment.initialize', $ticketData['id']) }}" method="POST" class="mt-3 ">
                @csrf
                <button class="w-full bg-yellow-600 text-white font-semibold py-2 rounded-md hover:bg-yellow-500">
                    Pay with Chapa
                </button>
               
            </form>
            <form action="{{ route('payment.cash', ['id' => $ticketData['id']]) }}" method="POST">
    @csrf
    <button class="w-full bg-yellow-600 text-white font-semibold py-2 rounded-md hover:bg-yellow-500 mt-3">
        Pay with Cash
    </button>
</form>


             
        </div>
    </div>

    <!-- Script for Downloading QR Code -->
    <script>
        document.getElementById('download-ticket').addEventListener('click', function () {
            const qrContainer = document.getElementById('qr-code-container');
            const svg = qrContainer.querySelector('svg');

            if (svg) {
                const svgData = new XMLSerializer().serializeToString(svg);
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                const img = new Image();

                const svgBlob = new Blob([svgData], { type: 'image/svg+xml;charset=utf-8' });
                const url = URL.createObjectURL(svgBlob);

                img.onload = function () {
                    canvas.width = img.width;
                    canvas.height = img.height;
                    ctx.drawImage(img, 0, 0);

                    URL.revokeObjectURL(url);

                    const a = document.createElement('a');
                    a.download = 'ticket-qr-code.png';
                    a.href = canvas.toDataURL('image/png');
                    a.click();
                };

                img.src = url;
            }
        });
    </script>
</body>
</html>
</x-app-layout>
