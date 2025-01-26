<x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User History</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100">
<div class="container mx-auto py-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">User History</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($tickets->isEmpty())
        <p class="text-gray-600">No tickets found.</p>
    @else
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="w-full border-collapse border border-gray-200">
                <thead class="bg-gray-200">
                <tr>
                    <th class="text-left px-4 py-2 border border-gray-300">#</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Route</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Driver</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Bus Stops</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Price</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Refund Status</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                    <tr class="even:bg-gray-100">
                        <td class="px-4 py-2 border border-gray-300">{{ $ticket->id }}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            {{ $ticket->schedule->trip->route->origin ?? 'N/A' }} to {{ $ticket->schedule->trip->route->destination ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-2 border border-gray-300">{{ $ticket->schedule->driver->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            @if(is_array($ticket->schedule->trip->route->bus_stops))
                                {{ implode(', ', $ticket->schedule->trip->route->bus_stops) }}
                            @else
                                {{ $ticket->schedule->trip->route->bus_stops ?? 'N/A' }}
                            @endif
                        </td>
                        <td class="px-4 py-2 border border-gray-300">{{ $ticket->payment->amount ?? 'N/A' }} ETB</td>

                        <td class="px-4 py-2 border border-gray-300">
                            @php
                                // Check if a refund exists for the current ticket
                                $refund = $refunds->where('payment_id', $ticket->payment->id)->first();
                            @endphp

                            @if($refund)
                                <span class="px-2 py-1 text-xs font-semibold rounded 
                                    {{ $refund->refund_status === 'approved' ? 'bg-green-100 text-green-700' : ($refund->refund_status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                    {{ ucfirst($refund->refund_status) }}
                                </span>
                            @else
                                <span class="text-gray-500">No refund request yet</span>
                            @endif
                        </td>

                        <td class="px-4 py-2 border border-gray-300">
                            @php
                                // Check if a refund exists for the current ticket
                                $refund = $refunds->where('payment_id', $ticket->payment->id)->first();
                            @endphp

                            @if($ticket->status === 'completed')
                                @if(!$refund)
                                    <!-- Show the refund request form if no refund exists -->
                                    <form method="POST" action="{{ route('user.requestRefund') }}" id="refund-form-{{ $ticket->id }}">
                                        @csrf
                                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                        <textarea name="reason" placeholder="Reason for refund (optional)" class="w-full p-2 mt-2 text-sm border border-gray-300 rounded-md"></textarea>
                                        <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 mt-2">
                                            Request Refund
                                        </button>
                                    </form>
                                @else
                                    <!-- Show message if a refund request already exists -->
                                    <span class="px-2 py-1 text-xs font-semibold bg-blue-100 text-blue-700 rounded">
                                        Refund request already submitted ({{ ucfirst($refund->refund_status) }}).
                                    </span>
                                @endif
                            @else
                                <!-- If ticket status is not 'completed', show N/A -->
                                <span class="text-gray-500 text-sm">N/A</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const refundForms = document.querySelectorAll('form[id^="refund-form-"]');

        refundForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        form.innerHTML = '<span class="text-green-500 text-sm">Refund requested successfully!</span>';
                    } else {
                        alert(data.message || 'Something went wrong. Please try again.');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

</body>
</html>

</x-app-layout>
