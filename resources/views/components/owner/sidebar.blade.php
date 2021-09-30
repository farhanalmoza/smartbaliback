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
                <li class="nav-item {{ 'owner/dashboard' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner/dashboard') }}">
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
                <li class="nav-item {{ 'owner/wisata' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner/wisata') }}">
                        <i class="fas fa-plane"></i>
                        <p>Wisata</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner/hotel' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner/hotel') }}">
                        <i class="fas fa-hotel"></i>
                        <p>Hotel</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner/tempat-ibadah' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner/tempat-ibadah') }}">
                        <i class="fas fa-church"></i>
                        <p>Tempat Ibadah</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner/souvenir' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner/souvenir') }}">
                        <i class="fas fa-gift"></i>
                        <p>Oleh-oleh</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner/tambah-tempat' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner/tambah-tempat') }}">
                        <i class="fas fa-plus-square"></i>
                        <p>Tambah Tempat</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner/mobil' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner/mobil') }}">
                        <i class="fas fa-car"></i>
                        <p>Mobil</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner/sopir' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner/sopir') }}">
                        <i class="fas fa-user-tie"></i>
                        <p>Sopir</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner/daftar-rental' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner/daftar-rental') }}">
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
                <li class="nav-item {{ 'owner/edit-profil' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner/edit-profil') }}">
                        <i class="fas fa-user-cog"></i>
                        <p>Edit Profil</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner/ganti-password' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner/ganti-password') }}">
                        <i class="fas fa-user-lock"></i>
                        <p>Ganti Password</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>