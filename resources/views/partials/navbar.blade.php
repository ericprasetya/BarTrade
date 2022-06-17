<nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top" style="height: 100px; box-shadow: 0px 0px 20px 0px rgb(89, 89, 89); border-radius: 0px 0px 20px 20px;">
  <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/image/logo.png" alt="" height="60">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <form class="d-flex" role="search">
            @csrf
            <input class="form-control me-2 col-8" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <ul class="navbar-nav ms-auto">
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome back, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form> 
                  </li>
                </ul>
              </li>
              @else
              <li class="nav-item">
                <a href="/login" class="nav-link{{ Request::is('login') ? 'active' : '' }}">
                  <button class="btn btn-success">Login</button>
                </a>
              </li>
              <li class="nav-item">
                <a href="/register" class="nav-link{{ Request::is('register') ? 'active' : '' }}">
                  <button class=" btn btn-outline-success">Register</button>
                </a>
              </li>
            </ul>
          @endauth
      </div>
  </div>
</nav>

<ul class="nav justify-content-evenly pb-2 bg-tosca" style="padding-top: 110px;">
  <li class="nav-item">
    <a class="nav-link btn btn-outline-secondary text-dark rounded-pill d-inline-block p-1" style="width: 200px;" href="#">Elektronik</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-outline-secondary text-dark rounded-pill d-inline-block p-1" style="width: 200px;" href="#">Alat Olahraga</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-outline-secondary text-dark rounded-pill d-inline-block p-1" style="width: 200px;" href="#">Alat Dapur</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-outline-secondary text-dark rounded-pill d-inline-block p-1" style="width: 200px;" href="#">Sepatu</a>
  </li>
</ul>