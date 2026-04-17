@extends('layouts.app')

@section('title', 'DawnSweets - Home')

 @section('content')
      <section id="home">
        <div class="bg-light">
          <div class="container">
            <div class="row align-items-center pt-5 pt-xl-0 pb-5">
            <!-- <h1 class="h3 mt-5">Home</h1> -->
            @if(session('success'))
            	<div class="alert alert-success mt-5">{{ session('success') }}</div>
            @endif

            @if(session('error'))
            	<div class="alert alert-danger mt-5">{{ session('error') }}</div>
            @endif
              <div class="col-md-6 pt-lg-5">
                <p class="fs-3 pb-3 fst-italic">Freshly Baked Happiness, Every Morning.</p>
                <hr>
                <p class="fs-5">At DawnSweets, every treat is made with love, the finest ingredients, and a touch of sweetness to brighten your day. From delicate pastries to indulgent desserts — there’s something for every craving.</p>
                <div class="d-flex gap-4 pt-3">
                    <a href="#products" class="btn btn-lg btn-primary hero-btn1 shadow"><i class="bi bi-search-heart me-2"></i>Explore Our Sweets</a>
                    <!-- <a href="{{ route('login') }}" class="btn btn-lg btn-outline-primary hero-btn2 shadow"><i class="bi bi-basket me-2"></i>Order Now</a> -->
                </div>
              </div>
              <div class="col-md-6 text-center">
                <img src="{{ asset('images/cake-hero.webp') }}" alt="" class="img-fluid hero-cake">
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="about">
        <div class="container pt-5 mt-3">
          <div class="row align-items-center">
                <div class="col-md-6 text-center d-none d-md-block">
                    <img src="{{ asset('images/cake2.jpg') }}" alt="" class="img-fluid cake2">
                </div>
                <div class="col-md-6">
                    <p class="fs-3 pb-3 fst-italic">Who Are We And What We Offer?</p>
                    <hr>
                    <p class="fs-5 text-lg-end">We bake fresh every day, filling our kitchen with the aroma of cakes, pastries, and everything in between. Our goal is simple: to bring people together through desserts made with love, tradition, and attention to detail. Every bite is meant to remind you of the joy in simple, homemade goodness.</p>
                </div>
            </div>
        </div>
      </section>
      <section id="products">
        <div class="container pt-5 mt-3 mb-5">
          <div class="row">
            <p class="fs-3 pb-3 fst-italic">Our Goods:</p>
            <hr>
              @foreach($cakes as $cake)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="card shadow cake-card">
                        <div class="card-body">
                            <img src="{{ asset($cake->filepath) }}" alt="{{ $cake->name }}" class="img-fluid">
                        </div>
                        <div class="card-footer pb-3">
                            <div class="fw-semibold fs-4">{{ $cake->name }}</div>
                            <div class="d-flex justify-content-between">
                                <div class="fs-5">{{ $cake->grams }} g</div>
                                <div class="fs-5">{{ $cake->price }} €</div>
                            </div>
                            <!-- <a href="" class="btn btn-outline-dark mt-3"><i class="bi bi-basket me-2"></i>Add to cart</a> -->
                            <form action="{{ route('cart.add', ['id' => $cake->id]) }}" method="POST" onsubmit="document.querySelector('.cart-add-btn').disabled=true">
                            	@csrf
                            	<button type="submit" class="cart-add-btn btn btn-outline-dark mt-3"><i class="bi bi-basket me-2"></i>Add to cart</button>
                            </form>
                            <!-- <a href="" class="btn btn-outline-danger mt-3"><i class="bi bi-star me-2"></i>Reviews</a> -->
                        </div>
                    </div>
                </div>
              @endforeach
          </div>
        </div>
      </section>
    @endsection