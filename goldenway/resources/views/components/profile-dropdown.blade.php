<!-- resources/views/components/profile-dropdown.blade.php -->
@php
    use Illuminate\Support\Facades\Auth;
@endphp


<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        {{ Auth::user()->name }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
      <li><a class="dropdown-item" href="{{ route('account.manage') }}">Manage Account</a></li>
     <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
    </ul>
</div>
