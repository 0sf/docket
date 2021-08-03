<aside class="col-12 col-md-2 p-0 bg-dark flex-shrink-1">
    <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
        <div class="collapse navbar-collapse ">
            <ul class="navbar-nav flex-md-column flex-row w-100 justify-content-between">
                <li class="nav-item">
                    <a class="nav-link pl-0 text-nowrap" href="{{ url('/profile') }}"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Upcoming</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0 text-nowrap" href="{{ url('/done') }}"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Done</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link pl-0 text-nowrap" href="{{ route('ref/create_task') }}"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Create</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0 text-nowrap" href="{{ url('/profile') }}"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Edit Profile</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0 text-nowrap" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Logout</span></a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
