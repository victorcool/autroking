<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
    <img src="{{asset('assets/images/users/avatar-7.jpg')}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
    <img src="{{asset('assets/images/users/avatar-7.jpg')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">{{Auth::user()->name}}</h6>
            <span class="pro-user-desc">Administrator</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="#" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>My Account</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                    <span>Settings</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                    <span>Support</span>
                </a>

                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                    <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <a id="logout" href="javascript:void(0);"  class="dropdown-item notify-item">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('home')}}">
                        <i data-feather="home"></i>
                        <span class="badge badge-success float-right">1</span>
                        <span> Dashboard </span>
                    </a>

                </li>
                <li class="menu-title">Manage</li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="uil uil-bill"></i>
                        <span> Debtors </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                        <a href="{{route('debtors.create')}}">Add New</a>
                        </li>
                        <li>
                        <a href="{{route('debtors.index')}}">List Existing</a>
                        </li>
                    </ul>
                </li>
                <li>

                    <a href="javascript: void(0);">
                        <i data-feather="umbrella"></i>
                        <span> Institutions </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('institutions.create')}}">Add New</a>
                        </li>
                        <li>
                            <a href="{{route('institutions.index')}}">List Existing</a>
                        </li>
                    </ul>
                </li>


                <li class="menu-title">Setups</li>
                 <li>
                    <a href="javascript: void(0);">
                        <i data-feather="briefcase"></i>
                        <span> Institution Types </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="pages-starter.html">Add New</a>
                        </li>
                        <li>
                            <a href="pages-profile.html">List Existing</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="bookmark"></i>
                        <span> Educational Levels </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="task-list.html">Add New</a>
                        </li>
                        <li>
                            <a href="task-board.html">List Existing</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">Security</li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="uil uil-user-square"></i>
                        <span> Institution Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                        <a href="{{route('institutions.users.create')}}">Add New</a>
                        </li>
                        <li>
                        <a href="{{route('institutions.users.index')}}">List Existing</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="user-plus"></i>
                        <span> Administrators </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                        <a href="{{route('admins.users.create')}}">Add New</a>
                        </li>
                        <li>
                        <a href="{{route('admins.users.index')}}">List Existing</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" aria-expanded="false">
                        <i data-feather="award"></i>
                        <span> Roles </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="forms-basic.html">Add New</a>
                        </li>
                        <li>
                            <a href="forms-advanced.html">List Existing</a>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>