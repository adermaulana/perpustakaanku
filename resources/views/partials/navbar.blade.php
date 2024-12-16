  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Perpustakaan XX</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          @if(Request::is('/'))
          <li><a href="/" class="active">Home</a></li>
          @else
          <li><a href="/">Home</a></li>
          @endif
          @if(Request::is('buku'))
          <li><a href="/buku" class="active">Buku</a></li>
          @else
          <li><a href="/buku">Buku</a></li>
          @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="/login">Login</a>

    </div>
  </header>