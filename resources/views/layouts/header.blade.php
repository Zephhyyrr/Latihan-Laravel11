
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Fixed navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('home') ? 'active' : ''}}" aria-current="page" href="/home">Home</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="/nilai-mahasiswa">Nilai Mahasiswa</a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link {{ Request::is('index-mahasiswa') ? 'active' : ''}}" href="/index-mahasiswa">Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('index-dosen') ? 'active' : ''}}" href="/index-dosen">Dosen</a>
              </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('index-prodi') ? 'active' : ''}}" href="/index-prodi">Prodi</a>
              </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('index-berita') ? 'active' : ''}}" href="/index-berita">Berita</a>
              </li>
          </ul>
          {{-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> --}}
          <ul class="navbar-nav">
            <li class="nav-item">
                @auth()
                <form action="/logout" method="POST">
                    @csrf
                    <button class="nav-link px-3 btn btn-danger" type="submit">Logout</button>
                </form>
                @else
                <a href="/login" class="nav-link">Login</a>
                @endauth
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
