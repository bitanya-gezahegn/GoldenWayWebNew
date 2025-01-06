<nav class="side-bar">
           
            <ul>
                <li>
                    <a href="{{url('dashboardd')}}">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manageroute') }}">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <span>Manage Routes</span>
                    </a>
                </li> 
                <li>
                    <a href="{{ route('trips.create') }}">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <span>Add Trips</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('trips.index') }}">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Manage Trips</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('schedules.create') }}">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        <span>Add Schedules</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('schedules.index') }}">
                        <i class="fa fa-bullhorn" aria-hidden="true"></i>
                        <span>Manage Schedules</span>
                    </a>
                </li>
             
               
             
                <li>
                    <a href="{{ url('issuedisplay') }}">
                        <i class="fa fa-file" aria-hidden="true"></i>
                        <span>Reports</span>
                    </a>
                </li>
            </ul>
        </nav>
        