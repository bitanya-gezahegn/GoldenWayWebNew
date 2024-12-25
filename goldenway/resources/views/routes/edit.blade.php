<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Routes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f8f9fa;
            }

            .container {
                margin-top: 50px;
            }

            .card {
                border-radius: 10px;
                border: 1px solid #e3e6f0;
                transition: transform 0.2s;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .card:hover {
                transform: scale(1.02);
            }

            .card-title {
                font-weight: bold;
                color: #FFD700;
            }

            .btn-golden {
                background-color: #FFD700;
                border-color: #FFD700;
                color: white;
            }

            .btn-golden:hover {
                background-color: #e6be00;
                border-color: #e6be00;
            }

            input.form-control {
                border-radius: 20px;
            }

            input.form-control:focus {
                box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
                border-color: #FFD700;
            }
        </style>
    </head>

    <body style="background: linear-gradient(120deg, #fff8dc, #ffe066);">



        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Edit Route</h2>
                   <form action="{{ url('routes.edit_confirm',$routes->id) }}" method="POST">
@csrf

                        <div class="mb-3">
                            <label for="start" class="form-label">Start Location:</label>
                            <input type="text" id="start" name="start" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="end" class="form-label">End Location:</label>
                            <input type="text" id="end" name="end" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-golden">Add Route</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
</x-app-layout>