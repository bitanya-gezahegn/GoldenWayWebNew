<x-app-layout><

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lemon+Milk&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fffaf0; /* Soft cream background */
            font-family: 'Lemon Milk', sans-serif;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #e3e6f0;
        }

        .btn-edit {
            background-color: #FFD700;
            border-color: #FFD700;
            color: white;
            height: 2rem;
            width: 4.3rem;
        }

        .btn-edit:hover {
            background-color: #e6be00;
            border-color: #e6be00;
        }

        .btn-delete {
            background-color: #FF6347; /* Orangish Red */
            border-color: #FF6347;
            color: white;
            height: 2rem;
            width: 4.3rem;
        }

        .btn-delete:hover {
            background-color: #e5533b;
            border-color: #e5533b;
        }

        .header {
            text-align: center;
            margin: 20px 0;
            color: #FFD700;
        }

        .header h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .placeholder {
            color: #bbb;
            text-align: center;
            margin: 20px 0;
        }
.register{
    border-radius: 20%;
    border-color: #e5533b;
}
        @media (max-width: 576px) {
            .table thead {
                display: none;
            }

            td[data-label] {
                display: block;
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            td[data-label]::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 45%;
                text-align: left;
                font-weight: bold;
                color: #555;
            }
        }

        @media (min-width: 992px) {
            .btn-edit, .btn-delete {
                margin-right: 10px;
            }

            .btn-edit:last-child, .btn-delete:last-child {
                margin-right: 0;
            }

            td {
                vertical-align: middle;
            }

            .btn-edit, .btn-delete {
                min-width: 100px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Manage Users</h1>
    </div>
    <div class="text-end mb-3 mt-3 btn btn-golden"><a href="{{ url('/admincreate') }}" class="mt-3 btn btn-golden register" >Register user</a>
   </div>

@if (session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<table class="table table-striped table-bordered">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Role</th>
<th>Status</th>
<th>Actions</th>
</tr>
</thead>
<tbody>@forelse ($users as $user)
@if ($user->role !== 'admin')
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->phone }}</td>
<td>{{ ucfirst($user->role) }}</td>
<td>
<span class="badge {{ $user->status == 'active' ? 'bg-success' : 'bg-warning' }}">
{{ ucfirst($user->status) }}
</span>
</td>
<td>
<a href="{{ route('adminediting', $user->id) }}" class="btn btn-sm btn-primary">
Edit
</a>
<form action="{{ route('admindestroying', $user->id) }}" method="POST" class="d-inline">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
Delete
</button>
</form>
</td>
</tr>
@endif
@empty
<tr>
<td colspan="7" class="text-center">No users found.</td>
</tr>
@endforelse
</tbody>
</table>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>