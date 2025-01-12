<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback for Driver</title>
    @vite('resources/css/app.css') <!-- Ensure Tailwind CSS is included -->
</head>
<body class="bg-gray-100">
@if (session('success') || session('error'))
    <div 
        class="fixed inset-0 flex items-center justify-center z-50">
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-init="setTimeout(() => show = false, 5000)" 
            class="p-4 text-sm rounded-lg shadow-lg 
            {{ session('success') ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }}">

            <span class="font-medium">
                {{ session('success') ? 'Success:' : 'Error:' }}
            </span> 
            {{ session('success') ?? session('error') }}
        </div>
    </div>
@endif

    <div class="container mx-auto p-6">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold text-center mb-4">Feedback for Driver</h1>
            
            <form action="{{ route('feedback.submit') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="schedule_id" value="{{ $scheduleId }}">
                <input type="hidden" name="driver_id" value="{{ $driverId }}">
                <input type="hidden" name="customer_id" value="{{ $customerId }}">

                <!-- Driver Details -->
                <div>
                    <h2 class="text-lg font-medium text-gray-700">Driver: {{ $driverName }}</h2>
                    <p class="text-sm text-gray-500">Schedule ID: {{ $scheduleId }}</p>
                </div>

                <!-- Rating -->
                <div>
                    <label for="rating" class="block text-gray-700 font-medium">Rating</label>
                    <select name="rating" id="rating" required
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                        <option value="" disabled selected>Rate the Driver (1-5)</option>
                        <option value="1">1 - Poor</option>
                        <option value="2">2 - Fair</option>
                        <option value="3">3 - Good</option>
                        <option value="4">4 - Very Good</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                </div>

                <!-- Feedback -->
                <div>
                    <label for="feedback" class="block text-gray-700 font-medium">Feedback (Optional)</label>
                    <textarea name="feedback" id="feedback" rows="4"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300 focus:outline-none"
                        placeholder="Write your feedback here..."></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class=" bg-blue-500 hover:bg-gray-500 text-white font-semibold px-6 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                        Submit Feedback
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


</x-app-layout>