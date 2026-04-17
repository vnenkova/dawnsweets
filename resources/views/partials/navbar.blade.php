<nav class="navbar navbar-expand-lg bg-body-tertiary rounded-5 rounded-top-0 shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/Screenshot 2026-03-25 220829.png') }}" alt="dawnsweets logo" width="150" class="h-auto"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteName() === 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteName() === 'profile' ? 'active' : '' }}" href="{{ route('profile') }}" aria-current="page">My Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteName() === 'cart.index' ? 'active' : '' }}" href="{{ route('cart.index') }}" aria-current="page">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteName() === 'orders.index' ? 'active' : '' }}" href="{{ route('orders.index') }}" aria-current="page">Orders</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-lg-auto">
        <li class="nav-item">
          <!-- <a class="nav-link px-3" href="{{ route('logoutSubmit') }}"><i class="bi bi-box-arrow-right me-2"></i>Log Out</a> -->
          <form action="{{ route('logoutSubmit') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link px-3"><i class="bi bi-box-arrow-right me-2"></i>Log Out</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>