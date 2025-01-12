


<x-app-layout><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Add custom yellow color from your landing page */
        @layer utilities {
            .bg-theme {
                @apply bg-yellow-600; /* Replace with your specific yellow if needed */
            }
            .hover-bg-theme {
                @apply hover:bg-yellow-500;
            }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container mx-auto text-center px-4">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Choose Your Seat</h1>

        <!-- Seat Map -->
        <div class="grid grid-cols-4 gap-4 max-w-md mx-auto mb-8">
            @foreach ($totalSeats as $seat)
                <div 
                    class="seat w-16 h-16 flex items-center justify-center text-gray-500 font-bold text-lg rounded-md transition-all hover:bg-yellow-500 
                    {{ in_array($seat, $bookedSeats) ? 'bg-gray-400 cursor-not-allowed' : 'bg-theme hover-bg-theme cursor-pointer' }}" 
                    data-seat="{{ $seat }}"
                    role="button" 
                    aria-label="Seat {{ $seat }} {{ in_array($seat, $bookedSeats) ? 'taken' : 'available' }}"
                    tabindex="{{ in_array($seat, $bookedSeats) ? '-1' : '0' }}"
                >
                    {{ $seat }}
                </div>
            @endforeach
        </div>

        <!-- Booking Form -->
        <form action="{{ route('book.ticket', ['schedule' => $schedule->id]) }}" method="POST" class="inline-block">
            @csrf
            <input type="hidden" name="seat_number" id="seat_number" value="">
            <button 
                type="submit" 
                class="btn px-6 py-3 bg-yellow-400 text-white font-bold rounded-lg shadow-md hover:bg-yellow-500 
                focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 disabled:bg-gray-300 disabled:cursor-not-allowed transition-all"
                disabled
            >
                Book Now
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const seats = document.querySelectorAll('.seat');
            const seatInput = document.getElementById('seat_number');
            const submitButton = document.querySelector('.btn');

            // Click event for seat selection
            seats.forEach(seat => {
                if (!seat.classList.contains('bg-gray-400')) { // Only allow clicks on available seats
                    seat.addEventListener('click', () => {
                        // Remove 'selected' class from all seats, then add it to the clicked seat
                        seats.forEach(s => s.classList.remove('ring', 'ring-yellow-400', 'ring-offset-2'));
                        seat.classList.add('ring', 'ring-yellow-400', 'ring-offset-2');
                        seatInput.value = seat.dataset.seat;
                        submitButton.disabled = false; // Enable the "Book Now" button
                    });
                }
            });

            // Prevent form submission without selecting a seat
            document.querySelector('form').addEventListener('submit', (e) => {
                if (!seatInput.value) {
                    e.preventDefault();
                    alert('Please select a seat before confirming.');
                }
            });
        });
    </script>
</body>
</html>
    </x-app-layout>