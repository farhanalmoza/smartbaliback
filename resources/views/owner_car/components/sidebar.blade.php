<div class="sidebar">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="https://demo.getstisla.com/assets/img/avatar/avatar-1.png" alt="..." class="avatar-img rounded-circle" id="ava-side">
                </div>
                <div class="info">
                    <a>
                        <span id="name-sidebar"></span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ 'owner-car/dashboard' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-car/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Main</h4>
                </li>
                <li class="nav-item {{ 'owner-car/mobil' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-car/mobil') }}">
                        <i class="fas fa-car"></i>
                        <p>Mobil</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner-car/sopir' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-car/sopir') }}">
                        <i class="fas fa-user-tie"></i>
                        <p>Sopir</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner-car/daftar-rental' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-car/daftar-rental') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Daftar Rental</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Pengaturan</h4>
                </li>
                <li class="nav-item {{ 'owner-car/edit-profil' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-car/edit-profil') }}">
                        <i class="fas fa-user-cog"></i>
                        <p>Edit Profil</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner-car/ganti-password' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-car/ganti-password') }}">
                        <i class="fas fa-user-lock"></i>
                        <p>Ganti Password</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>