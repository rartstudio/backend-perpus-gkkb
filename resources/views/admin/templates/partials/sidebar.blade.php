<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/img/logo-gkkb.png') }}"class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">Perpus GKKB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Transaksi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.transactions-borrow') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sedang dipinjam</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.transactions-return') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dikembalikan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.transactions-reject') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ditolak</p>
                            </a>
                        </li>
                    </ul>
                  </li>
                <li class="nav-item">
                    <a href="{{ route('admin.recommendation-books.index') }}" class="nav-link {{ Request::path() == 'admin/recommendation-books' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Recommendation
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.books.index') }}" class="nav-link {{ Request::path() == 'admin/books' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Buku
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.member-index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Member
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.authors.index') }}" class="nav-link {{ Request::path() == 'admin/authors' ? 'active' : '' }}">
                        <i class="far fa-user nav-icon"></i>
                        <p>Penulis</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories_book.index') }}" class="nav-link {{ Request::path() == 'admin/categories_book' ? 'active' : '' }}">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>Kategori Buku</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.publishers.index') }}" class="nav-link {{ Request::path() == 'admin/publishers' ? 'active' : '' }}">
                        <i class="fas fa-building nav-icon"></i>
                        <p>Penerbit</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.categories_state.index') }}" class="nav-link {{ Request::path() == 'admin/categories_state' ? 'active' : '' }}">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Kategori Member</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
      <!-- /.sidebar-menu -->

      
    </div>
    <!-- /.sidebar -->
</aside>