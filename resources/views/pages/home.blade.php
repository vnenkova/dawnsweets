@extends('layouts.app')

@section('title', 'DawnSweets - Home')

 @section('content')
      <section id="home">
        <div class="">
          <div class="container">

            <div class="row align-items-center bg-secondary-subtle p-4 rounded-5 mt-5 mb-5 ">
              <div class="d-flex align-items-center justify-content-center">
                @if($user->isAdmin !== 1)
                  <i class="bi bi-house-door-fill fs-5 me-2"></i>
                  <h1 class="h3 text-center mb-0">Home</h1>
                @else 
                  <i class="bi bi-list-ul fs-5 me-2"></i>
                  <h1 class="h3 text-center mb-0">List of All Cakes</h1>
                @endif
              </div>
            <!-- <h1 class="h3 mt-5">Home</h1> -->

            <!-- <span class=" my-5 text-muted fs-3">Welcome back, {{ $user->username }}!</span> -->
            </div>
            @if(session('success'))
              <div class="alert alert-success mt-5">{{ session('success') }}</div>
            @endif

            @if(session('error'))
              <div class="alert alert-danger mt-5">{{ session('error') }}</div>
            @endif
          </div>
        </div>
      </section>
      <section id="products">
        <div class="container mt-3 mb-5">
          <div class="row">
            <p class="fs-3 pb-3 fst-italic">Welcome back, {{ $user->username }}! @if($user->isAdmin !== 1)Choose what cake you want today: @endif</p>
            <hr>
              @foreach($cakes as $cake)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="card shadow cake-card">
                        <div class="card-body">
                            <img src="{{ asset($cake->filepath) }}" alt="{{ $cake->name }}" class="img-fluid">
                        </div>
                        <div class="card-footer pb-3 bg-pink">
                            <div class="fw-semibold fs-4">{{ $cake->name }}</div>
                            <div class="d-flex justify-content-between">
                                <div class="fs-5">{{ $cake->grams }} g</div>
                                <div class="fs-5">{{ $cake->price }} €</div>
                            </div>
                            <!-- <a href="" class="btn btn-outline-dark mt-3"><i class="bi bi-basket me-2"></i>Add to cart</a> -->
                            @if($user->isAdmin !== 1)
                              <form action="{{ route('cart.add', ['id' => $cake->id]) }}" method="POST" onsubmit="document.querySelector('.cart-add-btn').disabled=true">
                            	@csrf
                            	 <button type="submit" class="cart-add-btn btn btn-outline-dark mt-3"><i class="bi bi-basket me-2"></i>Add to cart</button>
                              </form>
                            @else
                              <div class="d-flex gap-2">
                                <a href="{{ route('cakes.edit', ['id' => $cake->id]) }}" class="btn btn-success mt-3" data-bs-toggle="tooltip" data-bs-title="Edit" data-bs-placement="top">
                                  <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('cakes.delete', ['id' => $cake->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this cake?'); document.querySelector('.cart-add-btn').disabled=true; ">
                                  @csrf
                                  @method('DELETE')
                                 <button type="submit" class="btn btn-danger mt-3" data-bs-toggle="tooltip" data-bs-title="Delete" data-bs-placement="top">
                                  <i class="bi bi-trash"></i>
                                 </button>
                                </form>
                              </div>
                            @endif
                            <!-- <a href="" class="btn btn-outline-danger mt-3"><i class="bi bi-star me-2"></i>Reviews</a> -->
                        </div>
                    </div>
                </div>
              @endforeach
          </div>
        </div>
      </section>
    @endsection