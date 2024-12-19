
<x-app-layout>
    <x-slot name="header">
       
    </x-slot>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-2xl w-full">
        <div style="background-color: #8B692E;" class="text-white text-center py-6">
            <h2 class="text-2xl font-bold">Profile</h2>
        </div>
        <div class="p-6 text-center">
            <img class="rounded-full w-32 h-32 mx-auto mb-5 border-4 border-white shadow-md" src="https://www.google.com/imgres?q=avatar%20image%20png&imgurl=https%3A%2F%2Fw7.pngwing.com%2Fpngs%2F340%2F946%2Fpng-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes.png&imgrefurl=https%3A%2F%2Fwww.pngwing.com%2Fen%2Fsearch%3Fq%3Davatar&docid=uglQnDVaECXO6M&tbnid=jai2OL9CvAo52M&vet=12ahUKEwiTkZTetrOKAxUMTqQEHag4K-8QM3oECGwQAA..i&w=920&h=526&hcb=2&ved=2ahUKEwiTkZTetrOKAxUMTqQEHag4K-8QM3oECGwQAA" alt="">
            <h3 class="text-xl mb-4  text-gray-800">Full Name: {{ $actor->name }}</h3>

            <div class="mb-2 flex justify-center">
                <label class="text-gray-600 font-bold">Email:</label>
                <p class="text-gray-800 ml-1">{{ $actor->email }}/p>
            </div>
            <div class="mb-2 flex justify-center">
                <label class="text-gray-600 font-bold">Phone Number:</label>
                <p class="text-gray-800 ml-1"> {{ $actor->phone }}</p>
            </div>
            <div class="mb-4 flex justify-center">
                <label class="text-gray-600 font-bold">Role:</label>
                <p class="text-gray-800 ml-1">{{ $actor->usertype }}</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</body>

</html>
</x-app-layout>