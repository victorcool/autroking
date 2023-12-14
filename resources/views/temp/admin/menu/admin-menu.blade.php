<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
    <img src="{{asset('temp/admin/assets/images/users/avatar-7.jpg')}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
    <img src="{{asset('temp/admin/assets/images/users/avatar-7.jpg')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

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
            <a href="{{route('admin.profile')}}" class="dropdown-item notify-item">
                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                <span>My Account</span>
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
                    <a href="{{route('isonlyadmin')}}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li> 
                <li>
                    <a href="javascript:void(0);">
                        <i data-feather="tv"></i>
                        <span> News</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="javascript:void(0);">
                                <span> Category</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('admin.blogCateg.create') }}">Add New</a></li>
                                {{-- <li><a href="{{ route('admin.blogCateg.index') }}">List Existing</a></li> --}}
                            </ul>
                        </li>
                        <li><a href="{{ route('admin.blog.create') }}">Add New</a></li>
                        <li><a href="{{ route('admin.blog.index') }}">List Existing</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);">
                        <i data-feather="users"></i>
                        <span> Teams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="javascript:void(0);">
                                <span> Category</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('admin.teamCateg.create') }}">Add New</a></li>
                                <li><a href="{{ route('admin.teamCateg.index') }}">List Existing</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span> Players</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('admin.player.create') }}">Add New</a></li>
                                <li><a href="{{ route('admin.player.index') }}">List Existing</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('admin.team.create') }}">Add New</a></li>
                        <li><a href="{{ route('admin.team.index') }}">List Existing</a></li>
                        
                    </ul>
                </li> 

                <li>
                    <a href="javascript:void(0);">
                        <i style="font-size:18px" class="fa">&#xf1e3;</i>
                        <span> Match</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.match.index','fixtures') }}">Fixtures</a></li>
                        <li><a href="{{ route('admin.match.index','results') }}">Result</a></li>
                        <li><a href="{{ route('admin.match.index','table') }}">Table</a></li>
                    </ul>
                </li> 

                <li>
                    <a href="javascript:void(0);">
                        <i data-feather="image"></i>
                        <span> Gallery</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.gallery.create') }}">Add New</a></li>
                        <li><a href="{{ route('admin.gallery.index') }}">List Existing</a></li>
                    </ul>
                </li>  
                <li>
                    <a href="javascript:void(0);">
                        <i data-feather="briefcase"></i>
                        <span> About SUFC</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.about.create') }}">Add New</a></li>
                        <li><a href="{{ route('admin.about.index') }}">List Existing</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.ballposition.index') }}">
                        <i data-feather="list"></i>
                        <span> Ball Positions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.officeposition.index') }}">
                        <i data-feather="list"></i>
                        <span> Office Positions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.club.index') }}">
                        <i data-feather="list"></i>
                        <span> Clubs</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.content') }}">
                        <i data-feather="list"></i>
                        <span> Other Content</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
