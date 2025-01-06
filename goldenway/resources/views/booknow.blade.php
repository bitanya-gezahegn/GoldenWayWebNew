<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now</title>
    <style>
        .container {
            text-align: center;
            margin-top: 50px;
        }

        .seat-map {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Adjust columns as needed */
            gap: 10px;
            margin: 30px auto;
            width: 100%;
            max-width: 400px;
        }

        .seat {
            width: 60px;
            height: 60px;
            background-color: #f5a510;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .seat.taken {
            background-color: #888;
            cursor: not-allowed;
        }

        .seat.selected {
            background-color: #ff5100;
            color: #fff;
        }

        .action {
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Choose Your Seat</h1>

        <div class="seat-map">
            @foreach ($totalSeats as $seat)
                <div 
                    class="seat {{ in_array($seat, $bookedSeats) ? 'taken' : '' }}" 
                    data-seat="{{ $seat }}"
                >
                    {{ $seat }}
                </div>
            @endforeach
        </div>

        <form action="{{ route('book.ticket', ['schedule' => $schedule->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="seat_number" id="seat_number" value="">
            <button type="submit" class="btn">Book Now</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const seats = document.querySelectorAll('.seat');
            const seatInput = document.getElementById('seat_number');

            // Click event for seat selection
            seats.forEach(seat => {
                if (!seat.classList.contains('taken')) { // Allow click only on available seats
                    seat.addEventListener('click', () => {
                        // Highlight selected seat and set value in hidden input
                        seats.forEach(s => s.classList.remove('selected'));
                        seat.classList.add('selected');
                        seatInput.value = seat.dataset.seat;
                    });
                }
            });

            // Prevent form submission without a selected seat
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
