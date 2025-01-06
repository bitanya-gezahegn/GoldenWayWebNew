<nav class="side-bar">
           
            <ul>
                <li>
                    <a href="{{url('redirect')}}">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('scheduleview') }}">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Schedules</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/reportissues') }}">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <span>Report issues</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('history') }}">
                        <i class="fa fa-bullhorn" aria-hidden="true"></i>
                        <span>History</span>
                    </a>
                </li>
                <li>
                   <a href="{{ route('feedback.view') }}">
    <i class="fa fa-bullhorn" aria-hidden="true"></i>
    <span>Feedbacks</span>
</a>
                </li>
              
              
              
            </ul>
        </nav>
        