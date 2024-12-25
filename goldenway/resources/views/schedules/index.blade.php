<x-app-layout>



















<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Available Buses</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Lemon+Milk&display=swap" rel="stylesheet">
<style>
body {
background-color: #fffaf0; /* Soft cream background */
font-family: 'Lemon Milk', sans-serif;
}

.card {
border-radius: 10px;
border: 1px solid #e3e6f0;
transition: transform 0.2s;
background-color: #fff;
}

.card:hover {
transform: scale(1.05);
box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.card-title {
font-weight: bold;
color: #FFD700; /* Golden accent */
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

input.form-control {
border-radius: 20px;
}

input.form-control:focus {
box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
border-color: #FFD700;
}

.no-data-img {
width: 150px;
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

.illustration {
text-align: center;
margin: 40px 0;
}

.illustration img {
max-width: 300px;
}

.placeholder-card {
margin: 20px auto;
padding: 20px;
border-radius: 10px;
background-color: #FFF5CC;
text-align: center;
box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.placeholder-card h2 {
color: #e6be00;
}

.placeholder-card p {
color: #aaa;
}

.footer {
margin-top: 40px;
text-align: center;
color: #FFD700;
}

.footer a {
color: #FFD700;
text-decoration: underline;
}

.footer a:hover {
color: #e6be00;
text-decoration: none;
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
<h1>Schedules</h1>
</div>
<div class="text-end mb-3"><a href="{{ route('schedules.create') }}" class="btn btn-golden mb-3">Create Schedule</a>
</div>
<table class="table table-striped">
<thead>
<tr>
<th>ID</th>
<th>Trip</th>
<th>Driver</th>
<th>Status</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach ($schedules as $schedule)
<tr>
<td>{{ $schedule->id }}</td>
<td>{{ $schedule->trip->id }}</td>
<td>{{ $schedule->driver->name }}</td>
<td>{{ $schedule->status }}</td>
<td>
<a href="{{ route('schedules.edit', $schedule->id) }}
" class="btn btn-primary">Edit</a> </td>
<td> <form action="route('schedules.destroy', $schedule->id) }}
" method="POST" class="d-inline mr-28">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>

