<nav class="navbar navbar-expand-lg bg-body-tertiary rounded-5 rounded-top-0 shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('welcome') }}"><img src="{{ asset('images/Screenshot 2026-03-25 220829.png') }}" alt="dawnsweets logo" width="150" class="h-auto"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#products">Products</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-lg-auto">
        <li class="nav-item">
          <a class="nav-link px-3" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-2"></i>Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>