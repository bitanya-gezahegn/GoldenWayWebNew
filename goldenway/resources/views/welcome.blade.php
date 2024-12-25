<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldenWay - Online Bus Ticketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom golden theme styling */
      
    @import url('https://fonts.googleapis.com/css2?family=Lemon+Milk&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Lemon Milk', sans-serif;
}

body {
    background-color: #f8face;
    color: #333;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 10%;
    background-color: #f8face;
    color: #f99005;
}

.logo {
    font-size: 1.5rem;
    font-weight: bold;
}

nav ul {
    list-style: none;
    display: flex;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #070707;
    font-size: 1rem;
    transition: color 0.3s;
}

nav ul li a:hover {
    color: #f99005;
}

.hero {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 50px 10%;
    background: url('bus-5840875_1280.webp') no-repeat right;
    background-size: contain;
    background-color: #f8face;
    height: 500px;
    color: #0c0c0c;
}

.hero-text {
    max-width: 50%;
}

.hero-text h1 {
    font-size: 3rem;
    margin-bottom: 20px;
}

.hero-text p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.hero-text .btn {
    background-color: #f99005;
    color: #333;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1.1rem;
    text-decoration: none;
    transition: background-color 0.3s;
}

.hero-text .btn:hover {
    background-color: #ffc107;
}

@media (max-width: 768px) {
    .hero {
        background-position: right top;
        background-size: cover;
    }

    .hero-text {
        max-width: 100%;
        text-align: center;
    }

    .hero-text h1 {
        font-size: 2rem;
    }

    .hero-text p {
        font-size: 1rem;
    }
}

.features {
    display: flex;
    justify-content: space-around;
    padding: 50px 10%;
    background-color: #fff;
}

.feature {
    text-align: center;
    max-width: 300px;
}

.feature img {
    width: 100px;
    margin-bottom: 20px;
}

.feature h3 {
    margin-bottom: 10px;
    font-size: 1.5rem;
}

.feature p {
    font-size: 1rem;
}

    </style>
</head>
<body>
    <header>
        <div class="logo"> GoldenWay</div>
      
      </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">About</a></li>
                @if (Route::has('login'))
                        @auth
                            <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link ">Dashboard</a></li>
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link ">Login</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link ">Register</a></li>
                            @endif
                        @endauth
                    @endif

            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-text">
            <h1>Book Your Bus Tickets Hassle-Free</h1>
            <p>Convenient and reliable bus ticketing services at your fingertips. Plan your journey with ease today!</p>
            @if (Route::has('login'))
                        @auth
                            <li class="btn"><a href="{{ url('/redirect') }}" class="nav-link ">Get Started</a></li>
                        @else
                        <li class="btn"><a href="{{ route('login') }}" class="nav-link ">Get Started</a></li>
                        @endif
                        @endauth
            
        </div>
    </section>

    <section class="features">
        <div class="feature">
            <img src="Orange Array of Literary Display.jpeg" alt="Feature 1" style="height: 9rem;">
            <h3>Easy Booking</h3>
            <p>Quick and easy online booking with just a few clicks.</p>
        </div>
        <div class="feature">
            <img src="Vibrant Alarm Clock Promotion.jpeg" alt="Feature 2" style="height: 9rem;">
            <h3>Secure Payments</h3>
            <p>Enjoy secure and hassle-free payment options.</p>
        </div>
        <div class="feature">
            <img src="Minimalist Key on Peach Gradient.jpeg" alt="Feature 3"style="height: 9rem;">
            <h3>24/7 Support</h3>
            <p>Our support team is always here to help you.</p>
        </div>
    </section>

   
</body>
</html>
