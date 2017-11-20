{{--
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            --}}
{{--<div class="profile-img"> <img src="../assets/images/users/1.jpg" alt="user" /> </div>--}}{{--

            <!-- User profile text-->
            <div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Maryam Harrison <span class="caret"></span></a>
                <div class="dropdown-menu animated flipInY">
                    <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                    <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                    <div class="dropdown-divider"></div> <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">PERSONAL</li>
                <li>
                    <a href="{{ url('/') }}" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Home</span></a>
                </li>
                @if(auth()->guest())
                    <li>
                        <a href="{{ url('/login') }}" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Login</span></a>
                    </li>
                @endif

                @if(!auth()->guest())
                    <li>
                        <a href="{{ url('/my-event') }}" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">My Event</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/package') }}" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Create Event</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Account Setting</span></a>
                    </li>
                    <li>
                        <a href="{{ url('user-profile') }}" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">My Profile</span></a>
                    </li>
                    <li>
                        <a href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Administration</span></a>
                        <ul>
                            <li>
                                <a href="{{ url('users') }}" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Users Management</span></a>
                            </li>
                            <li></li>
                            <li>
                                <a href="{{ url('roles') }}" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Role Management</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item-->
        <a href="{{ url('/logout') }}" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>--}}

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if(auth()->guest() || !auth()->guest() && !auth()->user()->hasRole(['admin']))
                    <li class="nav-small-cap">PERSONAL</li>
                    <li>
                        <a href="{{ url('/') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Home</span></a>
                    </li>
                    <li>
                        <a href="{{ url('events/display') }}" aria-expanded="false"><i class="mdi mdi-bookmark-music"></i><span class="hide-menu">Book Event</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/package') }}" aria-expanded="false"><i class="mdi mdi-video"></i><span class="hide-menu">Host</span></a>
                    </li>
                @role('subscriber')
                    <li>
                        <a href="{{ url('/my-event') }}" aria-expanded="false"><i class="mdi mdi-play-box-outline"></i><span class="hide-menu">My Events</span></a>
                    </li>

                    <li>
                        <a href="{{ url('my-account') }}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">My Account</span></a>
                    </li>
                @endrole
                @endif


                @role(['super-admin', 'admin'])

                    <li>
                        <a href="{{ url('/admin/dashboard') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                    </li>

                    <li>
                        <a href="{{ url('admin/users') }}" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Users</span></a>
                    </li>
                    <li>
                        <a href="{{ url('admin/roles') }}" aria-expanded="false"><i class="mdi mdi-security"></i><span class="hide-menu">Roles</span></a>
                    </li>
                    <li>
                        <a href="{{ url('admin/events') }}" aria-expanded="false"><i class="mdi mdi-settings-box"></i><span class="hide-menu">Events</span></a>
                    </li>

                    <li>
                        <a href="{{ url('my-account') }}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Accounts</span></a>
                    </li>
                @endrole
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>