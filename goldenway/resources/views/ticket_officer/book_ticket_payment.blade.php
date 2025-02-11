<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Cash Payment for Ticket #{{ $ticket->id }}</h1>

        <form action="{{ route('payment.processCashPayment', ['id' => $ticket->id]) }}" method="POST">
            @csrf

            <!-- Payment Method -->
            <div class="mb-4">
                <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
                <select name="payment_method" id="payment_method" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="cash" selected>Cash</option>
                </select>
            </div>

            <!-- Payment Status -->
            <div class="mb-4">
                <label for="payment_status" class="block text-sm font-medium text-gray-700">Payment Status</label>
                <select name="payment_status" id="payment_status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="completed">Completed</option>
                    <option value="failed">Failed</option>
                    <option value="pending">Pending</option>
                </select>
            </div>

            <!-- Ticket Officer Credentials -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Ticket Officer Email</label>
                <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full py-2 px-4 bg-green-600 text-white font-semibold rounded-lg">
                    Submit Payment
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
