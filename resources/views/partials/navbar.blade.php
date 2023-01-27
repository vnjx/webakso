<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/"><i class="bi bi-stop-circle-fill"></i> Webakso</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "home") ? 'active' : '' }}"  href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Kategori Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "products") ? 'active' : '' }}" href="/katalog">Katalog Produk</a>
        </li>
      <ul class="navbar-nav">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i>Dashboard Pengguna</a></li>
            <li><a class="dropdown-item" href="/blog"><i class="bi bi-card-heading"></i>Postingan Harian</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                    @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
              </li>
          </ul>
          <li class="nav-item">
            <div class=dropdown>
              <button type="button" onclick="cart" class="btn btn-outline-warning" data-toggle="dropdown">
                <i class="bi bi-cart4" aria-hidden="true"></i> <span class="badge badge-light">{{ count((array) session('cart')) }}</span>
              </button>
              <div class="dropdown-menu">
                <div class="row total-header-section">
                  @php $total = 0 @endphp
                  @foreach((array) session('cart') as $id => $details)
                      @php $total += $details['price'] * $details['quantity'] @endphp
                  @endforeach
                  <div class="col-lg-15 col-sm-15 col-15 total-section text-right">
                    <p>Total : Rp.<span class="text-info"> {{ $total }} </span></p>
                  </div>
                </div>
                @if(session('cart'))
                  @foreach(session('cart') as $id => $details)
                    <div class="row cart-detail">
                      <div class="col-lg-10 col-sm-10 col-10 cart-detail-img">
                        <img src="{{ asset('storage/') }}/{{ $details['gambar'] }}" width="70" height="100" class="img-responsive" />
                      </div>
                      <div class="col-lg-15 col-sm-15 col-15 cart-detail-product">
                        <p>{{ $details['namaproduk'] }}</p>
                        <span class="price text-info">Rp. {{ $details['price'] }}</span> 
                        <span class="count">Qty :{{ $details['quantity'] }}</span>
                      </div>
                      <hr/>
                    </div>
                  @endforeach
                @endif
                <div class="row">
                  <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                    <a href="/cart" class="btn btn-warning btn-block mt-2">Lihat Semua</a>
                  </div>
                </div>
              </div>
            </div>
      </li>
    </li>
    
        @else
          <li class="nav-item">
              <a href="/login" class="nav-link {{ ($title === "categories") ? 'login' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($title === "categories") ? 'login' : '' }}"><i class="bi bi-cart4"></i></a>
          </li>
      </ul>
    @endauth
    </div>
  </div>
</nav>

