
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Success</title>
        @vite(['resources/css/app.css'])
    </head>
    <body class="bg-gray-100">

        <div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
            @if (session('message'))
                <div class="bg-green-100 text-green-800 border border-green-300 p-4 mb-6 rounded-lg text-center font-bold">
                    {{ session('message') }}
                </div>
            @endif
            {{-- @if (session('ticket'))
            <div class="bg-green-100 text-green-800 border border-green-300 p-4 mb-6 rounded-lg text-center font-bold">
                {{ session('ticket') }}
            </div>
        @endif
        @if (session('userId'))
        <div class="bg-green-100 text-green-800 border border-green-300 p-4 mb-6 rounded-lg text-center font-bold">
            {{ session('userId') }}
        </div>
    @endif --}}

            <h1 class="text-3xl font-semibold text-green-600 text-center">Payment Successful!</h1>

            <p class="mt-4 text-lg text-gray-700 text-center">Your ticket has been successfully booked. Thank you for your payment!</p>

            <div class="mt-8 text-center">
                <a href="{{ route('redirect') }}" class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700">
                    Go to Home
                </a>
            </div>
        </div>

    </body>
    </html>
