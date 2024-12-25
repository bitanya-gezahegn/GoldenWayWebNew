<x-app-layout>
  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fffaf0; /* Soft cream background */
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
            margin-top: 50px;
            max-width: 600px;
        }

        h1 {
            color: #FFD700; /* Golden accent */
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input.form-control, select.form-select {
            border-radius: 10px;
            padding: 10px;
        }

        input.form-control:focus, select.form-select:focus {
            box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
            border-color: #FFD700;
        }

        .btn-primary, .btn {
            background-color: #FFD700;
            border-color: #FFD700;
            color: white;
            width: 100%;
            padding: 10px;
            font-weight: bold;
            border-radius: 10px;
        }

        .btn:hover {
            background-color: #e6be00;
            border-color: #e6be00;
        }
        .btnn  {
            background-color: grey;
            border-color: grey;
            color: white;
            width: 100%;
            padding: 10px;
            font-weight: bold;
            border-radius: 10px;
        }
        .btnn:hover{
            background-color: red;
        }

        @media (max-width: 576px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit User</h1>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

  <form action="{{ route('adminupdating', $user->id) }}" method="POST">
    @csrf
@method('PUT')
<div class="mb-3">
<label for="name" class="form-label">Name</label>
<input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
</div>

<div class="mb-3">
<label for="email" class="form-label">Email</label>
<input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
</div>

<div class="mb-3">
<label for="phone" class="form-label">Phone</label>
<input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
</div>

<div class="mb-3">
<label for="role" class="form-label">Role</label>
<select name="role" class="form-control">
<option value="operations_officer" {{ $user->role == 'operations_officer' ? 'selected' : '' }}>Operation Officer</option>
<option value="driver" {{ $user->role == 'driver' ? 'selected' : '' }}>Driver</option>
<option value="ticket_officer" {{ $user->role == 'ticket_officer' ? 'selected' : '' }}>Ticket Officer</option>
</select>

</div>

<div class="mb-3">
<label for="status" class="form-label">Status</label>
<select class="form-select" id="status" name="status" required>
<option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
<option value="suspended" {{ $user->status == 'suspended' ? 'selected' : '' }}>Suspended</option>
</select>
</div>

       
<button type="submit" class="btn btn-primary">Update User</button>
<button href="{{url('redirect')}}" class="btn btn-secondary btnn align-middle flex justify-center mt-2 ">Cancel</button>
</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>