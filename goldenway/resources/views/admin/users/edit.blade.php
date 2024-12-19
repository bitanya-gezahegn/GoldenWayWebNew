<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
    </div>
    <div class="mb-3">
        <label for="usertype" class="form-label">User Type</label>
        <select class="form-select" id="usertype" name="usertype" required>
            <option value="registor_officer" {{ $user->usertype === 'registor_officer' ? 'selected' : '' }}>Register Officer</option>
            <option value="driver" {{ $user->usertype === 'driver' ? 'selected' : '' }}>Driver</option>
            <option value="ticket_officer" {{ $user->usertype === 'ticket_officer' ? 'selected' : '' }}>Ticket Officer</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update User</button>
</form>
