<nav class="side-bar bg-blue-400 text-white w-64 h-screen p-4">
    <ul class="space-y-4">
        <li>
            <a href="{{ url('dashboardd') }}" class="flex items-center space-x-4 hover:bg-blue-500 p-2 rounded-md transition">
                <i class="fa fa-desktop text-xl"></i>
                <span class="text-lg">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('manageroute') }}" class="flex items-center space-x-4 hover:bg-blue-500 p-2 rounded-md transition">
                <i class="fa fa-comments text-xl"></i>
                <span class="text-lg">Manage Routes</span>
            </a>
        </li>
        <li>
            <a href="{{ route('trips.create') }}" class="flex items-center space-x-4 hover:bg-blue-500 p-2 rounded-md transition">
                <i class="fa fa-calendar-check-o text-xl"></i>
                <span class="text-lg">Add Trips</span>
            </a>
        </li>
        <li>
            <a href="{{ url('trips.index') }}" class="flex items-center space-x-4 hover:bg-blue-500 p-2 rounded-md transition">
                <i class="fa fa-users text-xl"></i>
                <span class="text-lg">Manage Trips</span>
            </a>
        </li>
        <li>
            <a href="{{ route('schedules.create') }}" class="flex items-center space-x-4 hover:bg-blue-500 p-2 rounded-md transition">
                <i class="fa fa-address-book text-xl"></i>
                <span class="text-lg">Add Schedules</span>
            </a>
        </li>
        <li>
            <a href="{{ url('schedules.index') }}" class="flex items-center space-x-4 hover:bg-blue-500 p-2 rounded-md transition">
                <i class="fa fa-bullhorn text-xl"></i>
                <span class="text-lg">Manage Schedules</span>
            </a>
        </li>
        <li>
            <a href="{{ url('issuedisplay') }}" class="flex items-center space-x-4 hover:bg-blue-500 p-2 rounded-md transition">
                <i class="fa fa-file text-xl"></i>
                <span class="text-lg">Reports</span>
            </a>
        </li>
    </ul>
</nav>
