<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/profiles*') ? 'active' : ''}}" href="/dashboard/profiles">
              <span data-feather="user" class="align-text-bottom"></span>
              Profil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/orders*') ? 'active' : ''}}" href="/dashboard/orders">
              <span data-feather="shopping-bag" class="align-text-bottom"></span>
              Pesanan
            </a>
          </li>
            @can('admin')
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/activities*') ? 'active' : ''}}" href="/dashboard/activities">
                <span data-feather="user-check" class="align-text-bottom"></span>
                Aktivitas
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : ''}}" href="/dashboard/posts">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Penjualan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/products*') ? 'active' : '' }}" href="/dashboard/products">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Stok Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/confirms*') ? 'active' : '' }}" href="/dashboard/confirms">
              <span data-feather="check-square" class="align-text-bottom"></span>
              Konfirmasi Pesanan
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/origins*') ? 'active' : '' }}" href="/dashboard/origins">
              <span data-feather="key" class="align-text-bottom"></span>
              Divisi
            </a>
          </li>
        </ul>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
              <span data-feather="list" class="align-text-bottom"></span>
              Tambah Kategori
            </a>
          </li>
        </ul>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
              <span data-feather="users" class="align-text-bottom"></span>
              Users Management
            </a>
          </li>
        </ul>
        @endcan
      </div>
    </nav>