<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
    <div class="container-fluid">
        @if ( request()->path() == 'admin/wisata' ||
              request()->path() == 'admin/hotel' ||
              request()->path() == 'admin/tempat-ibadah' ||
              request()->path() == 'admin/souvenir' ||
              request()->path() == 'owner/wisata' ||
              request()->path() == 'owner/hotel' ||
              request()->path() == 'owner/tempat-ibadah' ||
              request()->path() == 'owner/souvenir')
            <div class="collapse" id="search-nav">
                <form class="navbar-left navbar-form nav-search mr-md-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-search pr-1">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                        </div>
                        <input type="text" placeholder="Search ..." class="form-control" id="keyword">
                    </div>
                </form>
            </div>
        @else
            
        @endif
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="notification">4</span>
                </a>
                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                    <li>
                        <div class="dropdown-title">You have 4 new notification</div>
                    </li>
                    <li>
                        <div class="notif-scroll scrollbar-outer">
                            <div class="notif-center">
                                <a href="#">
                                    <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                                    <div class="notif-content">
                                        <span class="block">
                                            New user registered
                                        </span>
                                        <span class="time">5 minutes ago</span> 
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="https://demo.getstisla.com/assets/img/avatar/avatar-1.png" alt="..." class="avatar-img rounded-circle ava-top">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="https://demo.getstisla.com/assets/img/avatar/avatar-1.png" alt="image profile" class="avatar-img rounded ava-top"></div>
                                <div class="u-text">
                                    <h4 id="name-topbar">Hizrian</h4>
                                    <p class="text-muted" id="email-topbar">hello@example.com</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>