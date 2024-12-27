<x-app-layout>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Manage Routes</title>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
          @import url('https://fonts.googleapis.com/css2?family=Lemon+Milk&display=swap');

          body {
              background: linear-gradient(120deg, #fff8dc, #ffe066);
              font-family: 'Lemon Milk', sans-serif;
              color: #333;
              padding: 20px;
          }

          h1, h2 {
              color: #FFD700;
              text-align: center;
              margin-bottom: 20px;
          }

          form {
              background-color: #fff;
              border-radius: 10px;
              padding: 20px;
              box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
              margin-bottom: 30px;
              position: relative;
          }

          form label {
              font-weight: bold;
              color: #333;
          }

          form input {
              border: 2px solid #FFD700;
              border-radius: 20px;
              padding: 10px;
              margin-bottom: 15px;
              width: 100%;
              transition: box-shadow 0.3s, border-color 0.3s;
          }

          form input:focus {
              box-shadow: 0 0 10px rgba(255, 215, 0, 0.8);
              border-color: #e6be00;
          }

          form button {
              background-color: #FFD700;
              color: white;
              border: none;
              padding: 10px 20px;
              border-radius: 20px;
              cursor: pointer;
              transition: background-color 0.3s;
          }

          form button:hover {
              background-color: #e6be00;
          }

          .route-list {
              list-style-type: none;
              padding: 0;
              max-width: 800px;
              margin: 0 auto;
          }

          .route-list li {
              background: #fff;
              border: 2px solid #FFD700;
              border-radius: 10px;
              margin: 10px 0;
              padding: 15px;
              display: flex;
              justify-content: space-between;
              align-items: center;
              box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          }

          .route-list li a {
              color: #FFD700;
              text-decoration: none;
              font-weight: bold;
              margin-right: 10px;
          }

          .route-list li form button {
              background: transparent;
              color: #FFD700;
              border: 1px solid #FFD700;
              border-radius: 20px;
              padding: 5px 10px;
              transition: all 0.3s;
          }

          .route-list li form button:hover {
              background: #FFD700;
              color: white;
          }

          .illustration-placeholder {
              text-align: center;
              margin-bottom: 20px;
              padding: 20px;
              border: 2px dashed #FFD700;
              border-radius: 10px;
              background-color: rgba(255, 240, 190, 0.5);
              color: #555;
              font-style: italic;
          }
      </style>
  </head>
  <body>

      <h1>Manage Routes</h1>

<form action="{{ route('routes.store') }}" method="POST">
@csrf
   <div>
              <label for="start">Start Location:</label>
              <input type="text" id="start" name="start" required>
          </div>
          <div>
              <label for="end">End Location:</label>
              <input type="text" id="end" name="end" required>
          </div>
         <button type="submit">Add Route</button>
   </form>

      <div class="text-center mb-4">
             <a href="{{ url('trips.index') }}
" class="btn btn-golden">Add Trips</a>
          <a href="{{ url('schedules.index') }}
" class="btn btn-golden">Add Schedule</a>
<a href="{{ url('issuedisplay') }}
" class="btn btn-golden">Check Issues</a>
      </div>

      <h2>Existing Routes</h2>

      <ul class="route-list">
@foreach($routes as $route)

          <li>
              <span>Route: {{ $route->origin }} - {{ $route->destination }}
        </span>
              <div>
                  <a href="{{ url('routes.edit/'.$route->id) }}
">Edit</a>
               <form action="{{ route('routes.destroy', $route->id) }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')
<button type="submit">Delete</button>
</form>

              </div>
          </li>
          
          @endforeach

          
         
      </ul>

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>
  </x-app-layout>