<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
            background: goldenrod; /* blue-400 */
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
            background-color: goldenrod; /* blue-400 */
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
            color: goldenrod; /* blue-400 */
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

    </style>
</head>

<body>
    <input type="checkbox" id="checkbox">
    <header class="header">
        <h2 class="u-name">OPERATION <b>OFFICER</b>
            
        </h2>
        <a href="/">
		<label for="checkbox">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </label>    </a>
    </header>

    <div class="body">
        <nav class="side-bar">
        <ul>
                <li><a href="{{ url('dashboardd') }}"><i class="fa fa-desktop"></i><span>Dashboard</span></a></li>
                <li><a href="{{ route('illitrate') }}"><i class="fa fa-comments"></i><span>Tickets for Illitrates</span></a></li>

                <li><a href="{{ route('manageroute') }}"><i class="fa fa-comments"></i><span>Manage Routes</span></a></li>
                <li><a href="{{ route('trips.create') }}"><i class="fa fa-calendar-check-o"></i><span>Add Trips</span></a></li>
                <li><a href="{{ url('trips.index') }}"><i class="fa fa-users"></i><span>Manage Trips</span></a></li>
                <li><a href="{{ url('bus') }}"><i class="fa fa-file"></i><span>Manage Buses</span></a></li>

                <li><a href="{{ route('schedules.create') }}"><i class="fa fa-address-book"></i><span>Add Schedules</span></a></li>
                <li><a href="{{ url('schedules.index') }}"><i class="fa fa-bullhorn"></i><span>Manage Schedules</span></a></li>
                <li><a href="{{ url('issuedisplay') }}"><i class="fa fa-file"></i><span>Reports</span></a></li>
                <li>
                    <a href="{{ route('refund.requests') }}">
                        <i class="fa fa-file"></i>
                        <span>Refund Requests</span>
                    </a>
                </li>
            </ul>
        </nav>

        <section class="p-8 bg-gray-100">
  <div class="mt-12 container mx-auto py-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-8">Refund Requests</h2>

    @if($refunds->isEmpty())
      <p class="text-gray-600">No refund requests found.</p>
    @else
      <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full border-collapse border border-gray-200">
          <thead class="bg-gray-200">
            <tr>
              <th class="px-4 py-2 border border-gray-300">#</th>
              <th class="px-4 py-2 border border-gray-300">Customer</th>
              <th class="px-4 py-2 border border-gray-300">Route</th>
              <th class="px-4 py-2 border border-gray-300">Reason</th>
              <th class="px-4 py-2 border border-gray-300">Requested Amount</th>
              <th class="px-4 py-2 border border-gray-300">Actions</th>
            </tr>
          </thead>
          <tbody>
          @foreach($refunds as $refund)
            <tr class="even:bg-gray-100">
              <td class="px-4 py-2 border border-gray-300">{{ $refund->id }}</td>
              <td class="px-4 py-2 border border-gray-300">
                {{ $refund->customer->name ?? 'N/A' }}
              </td>
              <td class="px-4 py-2 border border-gray-300">
                {{ $refund->customer->tickets->first()?->schedule->trip->route->origin ?? 'N/A' }} to 
                {{ $refund->customer->tickets->first()?->schedule->trip->route->destination ?? 'N/A' }}
              </td>
              <td class="px-4 py-2 border border-gray-300">{{ $refund->reason ?? 'N/A' }}</td>
              <td class="px-4 py-2 border border-gray-300">{{ $refund->refund_amount }} ETB</td>
              <td class="px-4 py-2 border border-gray-300">
                <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600" 
                        onclick="handleRefund({{ $refund->id }}, 'approve')">Approve</button>
                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2" 
                        onclick="handleRefund({{ $refund->id }}, 'reject')">Reject</button>
              </td>
            </tr>
          @endforeach
          </tbody>

        </table>
      </div>
    @endif
  </div>

  <script>
    // Handle Approve/Reject Actions
    function handleRefund(refundId, action) {
        if (!confirm(`Are you sure you want to ${action} this refund request?`)) return;

        fetch('{{ route('refund.requests.handle') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ refund_id: refundId, action: action })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload();
            } else {
                alert('Failed to process the refund request.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
  </script>
</section>

    

</body>
</html>
</x-app-layout>






























