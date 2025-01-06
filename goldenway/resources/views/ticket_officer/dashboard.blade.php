




<x-app-layout>
 











<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

     <style>
        * {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: arial, sans-serif;
}
.header {
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 15px 30px;
	background: #f8b75c;
	color: #f6f3f3;
}
.u-name {
	font-size: 20px;
	padding-left: 17px;
}
.u-name b {
	background: #f8b75c;
}
.header i {
	font-size: 30px;
	cursor: pointer;
	color: #fff;
}
.header i:hover {
	color: #ffb038;
}
.user-p {
	text-align: center;
	padding-left: 10px;
	padding-top: 25px;
}
.user-p img {
	width: 100px;
	border-radius: 50%;
}
.user-p h4 {
	color: #fef3e8;
	padding: 5px 0;

}
.side-bar {
	width: 250px;
	background: hsl(0, 80%, 98%);
	min-height: 100vh;
	transition: 500ms width;
}
.body {
	display: flex;
}
.section-1 {
	width: 100%;
  background-color: #f4efe9;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
}
.section-1 h1 {
	color: #fff;
	font-size: 60px;
}
.section-1 p {
	color: #f3a93b;
	font-size: 20px;
	background: #fff;
	padding: 7px;
	border-radius: 5px;
}
.side-bar ul {
	margin-top: 20px;
	list-style: none;
}
.side-bar ul li {
	font-size: 16px;
	padding: 15px 0px;
	padding-left: 20px;
	transition: 500ms background;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.side-bar ul li:hover {
	background: #f6aa38;
}
.side-bar ul li a {
	text-decoration: none;
	color: #100f0f;
	cursor: pointer;
	letter-spacing: 1px;
}
.side-bar ul li a i {
	display: inline-block;
	padding-right: 10px;
	font-size: 23px;
}
#navbtn {
	display: inline-block;
	margin-left: 70px;
	font-size: 20px;
	transition: 500ms color;
}
#checkbox {
	display: none;
}
#checkbox:checked ~ .body .side-bar {
	width: 60px;
}
#checkbox:checked ~ .body .side-bar .user-p{
	visibility: hidden;
}
#checkbox:checked ~ .body .side-bar a span{
	display: none;
}
        .side-bar ul {
            list-style: none;
            padding: 0;
        }

        .side-bar ul li {
            position: relative;
        }

        .side-bar ul li a {
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px;
            color: #333;
        }

        .side-bar ul li a:hover {
            background: #fd901b;
        }

        .side-bar ul li .sub-menu {
            display: none;
            list-style: none;
            margin: 0;
            padding-left: 20px;
        }

        .side-bar ul li.active .sub-menu {
            display: block;
        }

        .side-bar ul li .sub-menu li a {
            padding: 5px;
        }
    .section-1 {
        width: 100%;
        background-color: #f4efe9; /* Subtle background for section */
        padding: 20px; /* Add padding for spacing */
    }

    .section-1 h1 {
        color: #f8b75c; /* Matching the header's theme */
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center; /* Center-align the title */
    }

    .text-end {
        margin-bottom: 20px;
        text-align: right;
    }

    .btn-golden {
        background-color: #f8b75c;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
    }

    .btn-golden:hover {
        background-color: #e6a843;
        color: #fff;
    }

    table.table {
        background-color: #ffffff; /* White background for better contrast */
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
        overflow: hidden;
    }

    table.table th {
        background-color: #f8b75c; /* Header background */
        color: white;
        text-align: center;
        font-weight: bold;
        padding: 10px;
    }

    table.table td {
        text-align: center; /* Center-align table cells */
        padding: 10px;
    }

    table.table td:last-child {
        display: flex;
        justify-content: center; /* Align action buttons to the center */
        gap: 10px; /* Add spacing between buttons */
    }

    table.table td .btn {
        font-size: 14px;
        padding: 5px 10px;
        border-radius: 4px;
    }

    table.table .btn-primary {
        background-color: #4CAF50; /* Green for edit */
        border: none;
    }

    table.table .btn-primary:hover {
        background-color: #45a049;
    }

    table.table .btn-danger {
        background-color: #f44336; /* Red for delete */
        border: none;
    }

    table.table .btn-danger:hover {
        background-color: #e53935;
    }

    </style>
</head>

<body>
    <input type="checkbox" id="checkbox">
   

    <header class="header">
   

        <h2 class="u-name">TICKET <b>OFFICER</b>
            <label for="checkbox">
                <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
            </label>
        </h2>
        <a href="/">
		<i class="fa fa-home" aria-hidden="true"></i>
 
		</a>   </header>
    <div class="body">
        <nav class="side-bar">
    @include('sidebarticketofficer')
           
    </nav>
    <section class="section-1  pt-56 mt-96">
    <div id="qr-reader" class="mx-auto" style="width: 600px; margin-top: -500px; padding-top: -400px;"></div>

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
            fetch(`/update-ticket-status/${paymentId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ status: 'checked' })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const statusCell = document.querySelector(`#payment-${paymentId} .ticket-status`);
                    statusCell.textContent = 'Checked';
                    statusCell.classList.add('bg-green-500', 'text-white');
                    statusCell.classList.remove('bg-gray-200');
                } else {
                    alert('Failed to update ticket status.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>

    <!-- Table for Completed Payments -->
    <div class="text-end mb-4">
        <h2 class="text-2xl font-semibold">Completed Payments</h2>
    </div>
    <table id="payments-table" class="min-w-full table-auto border-collapse bg-white shadow-md rounded-lg overflow-hidden">
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
                            <button onclick="changeTicketStatus({{ $payment->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Mark as Checked
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>



  
</body>
</html>



</x-app-layout>