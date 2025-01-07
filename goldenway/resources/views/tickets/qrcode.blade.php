














<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket - Golden Bus</title>
    <style>
        body {
            font-family: 'Lemon Milk', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f1eb;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .ticket-container {
            background: #ffffff;
            border-radius: 15px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
        }

        .ticket-header {
            background: linear-gradient(135deg, #ffbf8b, #d75f03);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .ticket-header h1 {
            margin: 0;
            font-size: 1.5em;
        }

        .ticket-section {
            padding: 20px;
            position: relative;
        }

        .ticket-section:not(:last-child) {
            border-bottom: 2px dotted #ccc;
            margin-bottom: 10px;
        }

        .ticket-section:not(:last-child)::before,
        .ticket-section:not(:last-child)::after {
            content: "";
            position: absolute;
            width: 10px;
            height: 5px;
            background: #ffffff;
            border: 2px solid #ccc;
            border-radius: 50%;
            top: 100%;
            transform: translateY(-50%);
        }

        .ticket-section:not(:last-child)::before {
            left: -10px;
        }

        .ticket-section:not(:last-child)::after {
            right: -10px;
        }

        .ticket-section h2 {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            font-size: 0.9em;
        }

        .info-grid div {
            display: flex;
            flex-direction: column;
        }

        .info-grid span {
            font-weight: bold;
        }

        .qr-code {
            text-align: center;
            padding: 20px;
        }

        .qr-code img {
            width: 150px;
            height: 150px;
        }

        .download-button {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #ffbf8b, #fc7108);
        }

        .download-button button {
            background: #f5ddbc;
            color: #080808;
            font-size: 1em;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .download-button button:hover {
            background: #ef9954;
            color: rgb(8, 8, 8);
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="ticket-header">
            <h1>Your Ticket</h1>
        </div>

        <div class="ticket-section">
            <h2>Passenger Information</h2>
            <p><strong>Name:</strong> {{ $ticketData['name'] }}</p>
        </div>

        <div class="ticket-section">
            <h2>Trip Details</h2>
            <div class="info-grid">
                <div>
                    <span>From</span>
                    <p>{{ $ticketData['origin'] }}</p>
                </div>
                <div>
                    <span>To</span>
                    <p>{{ $ticketData['destination'] }}</p>
                </div>
                <div>
                    <span>Date</span>
                    <p>{{ $ticketData['date']->format('Y-m-d') }}</p>
                </div>   
                <div>
                    <span>Departure Time</span>
                    <p>{{ $ticketData['departureTime'] }}</p>
                </div>
                <div>
                    <span>Arrival Time</span>
                    <p>{{ $ticketData['arrivalTime'] }}</p>
                </div> 
               
            </div>
        </div>

        <div class="ticket-section">
            <h2>Bus Information</h2>
            <div class="info-grid">
                <div>
                    <span>Bus Stop</span>
                    <p>{{ is_array($ticketData['bus_stop']) ? implode(', ', $ticketData['bus_stop']) : $ticketData['bus_stop'] }}</p>


                </div>
                <div>
                    <span>Price</span>
                    <p> {{ $ticketData['price'] }}</p>
                </div>
                <div>
                    <span>Ticket No</span>
                    <p> {{ $ticketData['id'] }}</p>

                </div>
                <div>
                    <span>Seat</span>
                    <p> {{ $ticketData['seat_number'] }}</p>
                </div>
            </div>
        </div>

        <div class="qr-code">
        {!! QrCode::size(200)->generate($ticket->qr_code) !!}
        </div>

        <div class="download-button">
    <a href="{{ asset('path/to/your/ticket_image.png') }}" download="ticket_image.png">
        <button>Take A Screenshot</button>
    </a>
</div>
        <form action="{{route('payment.initialize',  $ticket->id) }}">
    @csrf

        <div class="download-button">
            <button>Pay With Chapa</button>
        </div>
        </form>
    </div>



</body>
</html>