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
                <li class="nav-item {{ 'owner-tour/dashboard' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-tour/dashboard') }}">
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
                <li class="nav-item {{ 'owner-tour/wisata' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-tour/wisata') }}">
                        <i class="fas fa-plane"></i>
                        <p>Wisata</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner-tour/tambah-tempat' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-tour/tambah-tempat') }}">
                        <i class="fas fa-plus-square"></i>
                        <p>Tambah Tempat Wisata</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Pengaturan</h4>
                </li>
                <li class="nav-item {{ 'owner-tour/edit-profil' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-tour/edit-profil') }}">
                        <i class="fas fa-user-cog"></i>
                        <p>Edit Profil</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner-tour/ganti-password' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-tour/ganti-password') }}">
                        <i class="fas fa-user-lock"></i>
                        <p>Ganti Password</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>