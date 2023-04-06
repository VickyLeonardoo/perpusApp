<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('dashboard') }}/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{-- {{ Auth::guard('user')->user()->nama }} --}}
                            <span class="user-level">{{ auth()->user()->name }}</span>

                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('panel-admin') ? 'active' : '' }}">
                    <a href="/panel-admin" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section" >
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item  {{ request()->is('panel-admin/master-data-buku','panel-admin/master-data-anggota-perpustakaan','panel-admin/tambah-data-buku') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#dashboard" class="collapsed " aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Master Data</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('panel-admin/master-data-buku','panel-admin/master-data-anggota-perpustakaan','panel-admin/tambah-data-buku') ? 'show' : '' }}" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li class=" {{ request()->is('panel-admin/master-data-buku','panel-admin/tambah-data-buku') ? 'active' : '' }}">
                                <a href="/panel-admin/master-data-buku">
                                    <span class="sub-item">Buku</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('panel-admin/master-data-anggota-perpustakaan') ? 'active' : '' }}">
                                <a href="/panel-admin/master-data-anggota-perpustakaan">
                                    <span class="sub-item">Anggota Perpustakaan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->is('panel-admin/peminjaman','panel-admin/pengembalian') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#transaksi" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Transaksi </p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('panel-admin/peminjaman','panel-admin/pengembalian') ? 'show' : '' }}" id="transaksi">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('panel-admin/peminjaman') ? 'active' : '' }}">
                                <a href="/panel-admin/peminjaman">
                                    <span class="sub-item">Peminjaman</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('panel-admin/pengembalian') ? 'active' : '' }}" >
                                <a href="/panel-admin/pengembalian">
                                    <span class="sub-item">Log Pengembalian</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
