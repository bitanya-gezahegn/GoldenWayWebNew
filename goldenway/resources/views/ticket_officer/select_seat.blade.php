<x-app-layout>
    <div class="container mx-auto py-12">
        <h1 class="text-2xl font-bold mb-6">Choose a Seat for Trip: {{ $trip->route->origin }} → {{ $trip->route->destination }}</h1>

        <div class="grid grid-cols-4 gap-4">
            @foreach ($availableSeats as $seat)
                <div class="p-4 bg-green-500 text-white rounded-md shadow hover:bg-green-600 cursor-pointer">
                    <p>Seat Number: {{ $seat->number }}</p>
                    <form action="{{ route('finalize.booking', ['seat' => $seat->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-white text-green-600 px-3 py-1 mt-2 rounded hover:bg-green-200">
                            Book Seat
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
