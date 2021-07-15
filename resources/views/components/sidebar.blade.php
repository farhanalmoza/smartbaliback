<div class="sidebar">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="https://demo.getstisla.com/assets/img/avatar/avatar-1.png" alt="..." class="avatar-img rounded-circle" id="ava-side">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">Profilku</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profil</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Pengaturan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ 'admin/dashboard' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/admin/dashboard') }}">
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
                <li class="nav-item {{ 'admin/wisata' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/admin/wisata') }}">
                        <i class="fas fa-plane"></i>
                        <p>Wisata</p>
                    </a>
                </li>
                <li class="nav-item {{ 'admin/hotel' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/admin/hotel') }}">
                        <i class="fas fa-hotel"></i>
                        <p>Hotel</p>
                    </a>
                </li>
                <li class="nav-item {{ 'admin/tempat-ibadah' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/admin/tempat-ibadah') }}">
                        <i class="fas fa-pen-square"></i>
                        <p>Tempat Ibadah</p>
                    </a>
                </li>
                <li class="nav-item {{ 'admin/tambah-tempat' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/admin/tambah-tempat') }}">
                        <i class="fas fa-plus-square"></i>
                        <p>Tambah Tempat</p>
                    </a>
                </li>
                <li class="nav-item {{ 'admin/daftar-pengguna' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/admin/daftar-pengguna') }}">
                        <i class="fas fa-users"></i>
                        <p>Daftar Pengguna</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Pengaturan</h4>
                </li>
                <li class="nav-item {{ 'admin/edit-profil' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/admin/edit-profil') }}">
                        <i class="fas fa-user-cog"></i>
                        <p>Edit Profil</p>
                    </a>
                </li>
                <li class="nav-item {{ 'admin/ganti-password' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/admin/ganti-password') }}">
                        <i class="fas fa-user-lock"></i>
                        <p>Ganti Password</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>