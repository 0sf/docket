
<aside class="col-12 col-md-2 p-0 flex-shrink-1" style="background-color: black; height:150vh;">
    <nav class="navbar navbar-expand  flex-md-column flex-row align-items-start py-2" style="background-color: black;">
        <div class="collapse navbar-collapse ">
            <ul class="navbar-nav flex-md-column flex-row w-100 justify-content-between">
                <br>
                <li id="nav-active" class="nav-item active">
                    <a class="nav-link  pl-0 text-nowrap" href="{{ url('/home') }}"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Upcoming</span></a><br>
                </li>


                <li class="nav-item">
                    <a class="nav-link pl-0 text-nowrap" href="{{ url('/ref/create_task') }}"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Create</span></a><br>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link pl-0 text-nowrap" href="{{ url('/done') }}"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Done</span></a><br>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0 text-nowrap" href="{{ url('/show') }}"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Profile</span></a><br>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link pl-0 text-nowrap" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Logout</span></a>
                </li> -->
            </ul>
        </div>
    </nav>
</aside>
<script>
    var activeNavItem = $('.nav-item');

    activeNavItem.click(function() {
        activeNavItem.removeClass('active');
        $(this).addClass('active');
    });
</script>
