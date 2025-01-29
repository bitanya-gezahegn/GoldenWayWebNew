

<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            <h2 class="u-name">TICKET <b>OFFICER</b>
                
            </h2>
            <a href="/">
            <label for="checkbox">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </label>      </a>
        </header>

    <div class="body">
        <nav class="side-bar">
            <ul>
                <li><a href="{{ url('redirect') }}"><i class="fa fa-desktop"></i><span>Dashboard</span></a></li>
                   </ul>
        </nav>

        <section class="section-1 py-16">
    <div id="qr-reader" class="mx-auto mb-8" style="width: 600px;"></div>

   

    <!-- Completed Payments Table -->
    <div class="text-end mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">Completed Payments</h2>
    </div>
    <table id="payments-table" class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100 text-left text-sm font-medium text-gray-700">
                <th class="px-4 py-2 border-b">Payment ID</th>
                <th class="px-4 py-2 border-b">Ticket ID</th>
                <th class="px-4 py-2 border-b">Customer Name</th>
                <th class="px-4 py-2 border-b">Amount</th>
                <th class="px-4 py-2 border-b">Payment Method</th>
                <th class="px-4 py-2 border-b">Payment Date</th>
                <th class="px-4 py-2 border-b">Ticket Status</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($completedPayments as $payment)
                <tr id="payment-{{ $payment->id }}" class="hover:bg-gray-50 transition duration-200">
                    <td class="px-4 py-3 border-b text-sm">{{ $payment->id }}</td>
                    <td class="px-4 py-3 border-b text-sm ticket-id">{{ $payment->ticket_id }}</td>
                    <td class="px-4 py-3 border-b text-sm">{{ $payment->customer->name }}</td>
                    <td class="px-4 py-3 border-b text-sm">${{ number_format($payment->amount, 2) }}</td>
                    <td class="px-4 py-3 border-b text-sm">{{ ucfirst($payment->payment_method) }}</td>
                    <td class="px-4 py-3 border-b text-sm">{{ $payment->payment_date }}</td>
                    <td class="px-4 py-3 border-b text-sm ticket-status {{ $payment->ticket_status == 'unchecked' ? 'bg-gray-200' : 'bg-green-500 text-white' }}">
                        {{ ucfirst($payment->ticket_status) }}
                    </td>
                    <td class="px-4 py-3 border-b text-sm">
                        @if($payment->ticket_status == 'unchecked')
                            <button onclick="changeTicketStatus({{ $payment->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Mark as Checked
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>


    </div>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Code scanned = ${decodedText}`, decodedResult);

            const ticketIdMatch = decodedText.match(/ticket_(\d+)\.png/);
            if (ticketIdMatch) {
                const ticketId = ticketIdMatch[1];
                console.log(`Extracted Ticket ID = ${ticketId}`);
                filterTableByTicketId(ticketId);
            } else {
                console.error("Unable to extract Ticket ID from the scanned QR code.");
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);

        function filterTableByTicketId(ticketId) {
            const tableRows = document.querySelectorAll('#payments-table tbody tr');
            tableRows.forEach(row => {
                const ticketIdCell = row.querySelector('.ticket-id');
                if (ticketIdCell && ticketIdCell.textContent.trim() === ticketId) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
        function changeTicketStatus(paymentId) {
            console.log(paymentId); // Debugging
    fetch(`/update-ticket-status/${paymentId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ status: 'checked' })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const statusCell = document.querySelector(`#payment-${paymentId} .ticket-status`);
            statusCell.textContent = 'Checked';
            statusCell.classList.add('bg-green-500', 'text-white');
            statusCell.classList.remove('bg-gray-200');
        } else {
            alert('Failed to update ticket status: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while updating the ticket status.');
    });
}

        
    </script>
</body>
</html>
</x-app-layout>