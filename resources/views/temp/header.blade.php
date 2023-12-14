<!--header start-->

<header id="site-header" class="header">
    <div class="top-bar d-sm-block d-none">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4">
            <div class="topbar-link d-md-block d-none">
              <ul class="list-inline">
                <li class="list-inline-item"><a href="mailto:{{ $siteSetting->email??'' }}"><i class="far fa-envelope-open"></i>{{ $siteSetting->email1??'' }}</a>
                </li>
                <li class="list-inline-item">
                  <a href="tel:+912345678900"> <i class="fas fa-mobile-alt"></i>{{ $siteSetting->phone1??'' }}</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 text-center">
            <div class="search-box">
              <form action="#" method="post" class="form-inline my-2 my-lg-0">
                <input class="form-control" required="" type="search" placeholder="Search">
                <button class="btn" type="submit"><i class="fas fa-search"></i>
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 text-end">
            <div class="social-icons social-hover top-social-list">
              <ul class="list-inline">
                <li class="social-facebook"><a href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="social-gplus"><a href="#"><i class="fab fa-google-plus-g"></i></a>
                </li>
                <li class="social-twitter"><a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="social-linkedin"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="header-wrap">
      <div class="container">
        <div class="row">
          <div class="col">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg">
              <a class="navbar-brand logo" href="{{ route('welcome') }}">
                <img id="logo-img" class="img-fluid" src="{{ asset('temp/assets/images/logo.png?v=0.01') }}" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!-- Left nav -->
                <ul class="nav navbar-nav ms-auto">
                  @if ($mainmenu->isNotEmpty())
                    @foreach ($mainmenu as $key => $menu)
                      @if ($menu->submenu->isEmpty())
                      <li class="nav-item"> <a class="nav-link @if($key == 0) active @endif" href="{{ route('welcome') }}">{{ $menu->name }}</a></li>
                      @else
                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ $menu->name }}</a>
                          <ul class="dropdown-menu">
                            @foreach ($menu->submenu as $submenu)
                              <li><a href="chemical-research.html">{{ $submenu->name }}</a></li>
                            @endforeach
                          </ul>
                        </li>
                      @endif
                    @endforeach
                  @else
                    <li class="nav-item"> <a class="nav-link" href="{{ route('welcome') }}">Empty Menu</a></li>
                  @endif
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <!--header end-->