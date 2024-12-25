<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register New User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background: linear-gradient(120deg, #fff8dc, #ffe066);
                color: #333;
            }

            .card {
                border-radius: 10px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }

            .card-header {
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .card-title {
                color: BLACK;
                margin: 0;
            }

            .form-label {
                font-weight: bold;
            }

            .btn-golden {
                background-color: #FFD700;
                border-color: #FFD700;
                color: white;
                width: 100%;
                padding: 10px;
                font-size: 1.1rem;
            }

            .btn-golden:hover {
                background-color: #e6be00;
                border-color: #e6be00;
            }

            @media (max-width: 500px) {
                .container {
                    margin-top: 20px;
                }
            }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-20 col-lg-7">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3 class="card-title">Register New User</h3>
                        </div>
                        <div class="card-body">
                         

<form method="POST" action="{{ route('adminstoring') }}">
@csrf
<!-- Name -->
<div class="mb-3">
<label for="name" class="form-label">Name</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Enter user name" required>
</div>
<!-- Email -->
<div class="mb-3">
<label for="email" class="form-label">Email</label>
<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
</div>
<!-- Phone -->
<div class="mb-3">
<label for="phone" class="form-label">Phone</label>
<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
</div>
<!-- Role -->
<div class="mb-3">
<label for="role" class="form-label">Role</label>
<select class="form-select" id="role" name="role" required>
<option value="" disabled selected>Select user role</option>
<option value="customer">Customer</option>
<option value="admin">Admin</option>
<option value="operations_officer">Operations Officer</option>
<option value="driver">Driver</option>
<option value="ticket_officer">Ticket Officer</option>
</select>
</div>
<!-- Status -->
<div class="mb-3">
<label for="status" class="form-label">Status</label>
<select class="form-select" id="status" name="status" required>
<option value="active">Active</option>
<option value="suspended">Suspended</option>
</select>
</div>
<!-- Password -->
<div class="mb-3">
<label for="password" class="form-label">Password</label>
<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
</div>
<!-- Confirm Password -->
<div class="mb-3">
<label for="password_confirmation" class="form-label">Confirm Password</label>
<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
</div>
<!-- Submit Button -->
<div class="d-grid">
<button type="submit" class="mt-3 btn btn-golden">Register User</button>
</div>
</form>
<!-- Back to Users List -->
<div class="mt-3 text-center">
<a href="/redirect" class="btn btn-secondary">Back to Users List</a>
</div>
        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
</x-app-layout>