@php
    use Illuminate\Support\Facades\Route;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldenWay - Online Bus Ticketing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .bg-primary {
            background-color: #f4f4f4; /* Soft light color */
        }
        .bg-primary-light {
            background-color: #ECEAFF;
        }
        .hover\:shadow-lg:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .feature-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100">

<header class="bg-primary text-gray-800 py-4 shadow-md">
    <div class="container mx-auto flex items-center justify-between px-4">
        <div class="flex items-center space-x-4 transform hover:scale-105 transition duration-300">
            <img src="images/logo.png" alt="GoldenWay Logo" class="h-16 w-16 rounded-full shadow-lg">
            <h1 class="text-3xl font-bold">GoldenWay</h1>
        </div>
        <nav>
            <ul class="flex space-x-6">
                <li><a href="#" class="hover:text-gray-600 transition">Home</a></li>
                <li><a href="#features" class="hover:text-gray-600 transition">Features</a></li>
                <li><a href="#about" class="hover:text-gray-600 transition">About</a></li>
                @if (Illuminate\Support\Facades\Route::has('login'))
                    @auth
                        <li><a href="{{ url('/redirect') }}" class="hover:text-gray-600 transition">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-gray-600 transition">Login</a></li>
                        @if (Illuminate\Support\Facades\Route::has('register'))
                            <li><a href="{{ route('register') }}" class="hover:text-gray-600 transition">Register</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </nav>
    </div>
</header>

<section class="bg-primary-light py-20">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 text-center md:text-left" data-aos="fade-right">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight">Welcome to GoldenWay, your go-to solution for seamless bus ticket booking.
</h1>
            <p class="text-lg text-gray-600 mt-4">
Enjoy real-time seat availability, secure payments, and instant booking confirmations—all in one place.

Simplify your travel today with GoldenWay!</p>
            <div class="mt-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/redirect') }}" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded shadow-lg font-semibold transition transform hover:scale-105">Get Started</a>
                    @else
                        <a href="{{ route('register') }}" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded shadow-lg font-semibold transition transform hover:scale-105">Get Started</a>
                    @endauth
                @endif
            </div>
        </div>
        <div class="md:w-1/2 mt-10 md:mt-0" data-aos="fade-left">
            <img src="images/logo.png" alt="GoldenWay Logo" class="rounded-lg shadow-lg w-full">
        </div>
    </div>
</section>

<section id="features" class="py-20 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Why Choose GoldenWay?</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="feature-card text-center p-8 bg-white rounded-lg shadow-md" data-aos="zoom-in">
                <img src="images/red.avif" alt="Easy Booking" class="mx-auto   h-36 w-48 mb-6">
                <h3 class="text-xl font-semibold text-gray-700">Easy Booking</h3>
                <p class="text-gray-600 mt-2">Book bus tickets with just a few clicks, anytime and anywhere.</p>
            </div>
            <div class="feature-card text-center p-8 bg-white rounded-lg shadow-md" data-aos="zoom-in" data-aos-delay="200">
                <img src="images/blue.avif" alt="Secure Payments" class="mx-auto  mb-6  h-36 w-48">
                <h3 class="text-xl font-semibold text-gray-700">Secure Payments</h3>
                <p class="text-gray-600 mt-2">Our platform offers safe and reliable payment options.</p>
            </div>
            <div class="feature-card text-center p-8 bg-white rounded-lg shadow-md" data-aos="zoom-in" data-aos-delay="400">
                <img src="images/green.jpg" alt="24/7 Support" class="mx-auto h-36 w-48 mb-6">
                <h3 class="text-xl font-semibold text-gray-700">24/7 Customer Support</h3>
                <p class="text-gray-600 mt-2">Our team is always here to assist you, day or night.</p>
            </div>
        </div>
    </div>
</section>

<section id="about" class="py-20 bg-primary-light">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-800" data-aos="fade-up">About Us</h2>
        <p class="text-lg text-gray-600 mt-4 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">At GoldenWay, we aim to revolutionize the way people travel by making bus ticketing simpler, faster, and more accessible. Join thousands of happy travelers and start your journey today!</p>
    </div>
</section>

<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4 grid md:grid-cols-4 gap-8">
        <div>
            <h3 class="text-lg font-bold mb-4">About</h3>
            <p class="text-gray-400 text-sm">GoldenWay provides reliable and easy online bus ticket booking services. Join us for a hassle-free travel experience.</p>
        </div>
        <div>
            <h3 class="text-lg font-bold mb-4">Quick Links</h3>
            <ul class="text-gray-400 text-sm">
                <li><a href="#" class="hover:text-white">Home</a></li>
                <li><a href="#features" class="hover:text-white">Features</a></li>
                <li><a href="#about" class="hover:text-white">About</a></li>
                <li><a href="{{ route('login') }}" class="hover:text-white">Login</a></li>
            </ul>
        </div>
        <div>
            <h3 class="text-lg font-bold mb-4">Support</h3>
            <ul class="text-gray-400 text-sm">
                <li><a href="#" class="hover:text-white">FAQs</a></li>
                <li><a href="#" class="hover:text-white">Help Center</a></li>
                <li><a href="#" class="hover:text-white">Contact Us</a></li>
            </ul>
        </div>
        <div>
            <h3 class="text-lg font-bold mb-4">Follow Us</h3>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="text-center text-gray-600 text-sm mt-8">
        &copy; 2025 GoldenWay. All rights reserved.
    </div>
</footer>

<script>
    AOS.init({
        duration: 1000,
        once: true,
    });
</script>

</body>
</html>
