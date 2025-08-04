<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <img class="rounded-pill pe-2" src="{{ asset('assets/img/logo.jpg') }}" alt="LOGO POKDARWIS">

        {{-- <img src="assets/img/logo.png" alt=""> --}}
        {{-- Uncomment the line below if you also wish to use a text logo --}}
        <h1 class="sitename">POKDARWIS</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="active">Beranda</a></li>
          <li><a href="about.html">Tentang Kami</a></li>
          <li><a href="single-post.html">Single Post</a></li>
          <li class="dropdown"><a href="{{ route('category.index') }}"><span>Kategori</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              @foreach ($categories as $category )
              <li><a href="{{ route('category.show' , $category->slug) }}">{{ $category->name }}</a></li>
              @endforeach
              {{-- <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li> --}}
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>
  </header>