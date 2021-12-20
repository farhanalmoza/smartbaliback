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
                <li class="nav-item {{ 'owner-worship/dashboard' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-worship/dashboard') }}">
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
                <li class="nav-item {{ 'owner-worship/tempat-ibadah' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-worship/tempat-ibadah') }}">
                        <i class="fas fa-church"></i>
                        <p>Tempat Ibadah</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner-worship/tambah-tempat-ibadah' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-worship/tambah-tempat-ibadah') }}">
                        <i class="fas fa-plus-square"></i>
                        <p>Tambah Tempat Ibadah</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Pengaturan</h4>
                </li>
                <li class="nav-item {{ 'owner-worship/edit-profil' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-worship/edit-profil') }}">
                        <i class="fas fa-user-cog"></i>
                        <p>Edit Profil</p>
                    </a>
                </li>
                <li class="nav-item {{ 'owner-worship/ganti-password' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/owner-worship/ganti-password') }}">
                        <i class="fas fa-user-lock"></i>
                        <p>Ganti Password</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>