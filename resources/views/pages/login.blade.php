<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DawnSweets | Login</title>
	<link rel="icon" type="image/png" href="{{ asset('images/cupcake.png') }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Trispace:wght@100..800&display=swap" rel="stylesheet">
</head>
<body>
	<section class="h-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded rounded-3 text-black shadow">
          <div class="row g-0">
            <div class="col-lg-6 border border-5 border-pink">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <a class="navbar-brand" href="{{ route('welcome') }}"><img src="{{ asset('images/Screenshot 2026-03-25 220829.png') }}" alt="dawnsweets logo" width="250" class="h-auto img-fluid"></a>
                  <h4 class="mt-1 mb-5 pb-1 fs-5">We are DawnSweets</h4>
                </div>

                <form action="{{ route('loginSubmit') }}" method="POST" onsubmit="document.getElementById('submit').disabled=true;">
                	@csrf
                  <p class="fs-5 fst-italic">~ Please login to your account.</p>

                  @if(session('success'))
                	<div class="alert alert-success fade show" role="alert">
                		{{ session('success') }}
                	</div>
                @endif

                @if(session('error'))
                	<div class="alert alert-danger fade show" role="alert">
                		{{ session('error') }}
                	</div>
                @endif

                <!-- @if($errors->any())
                	<div class="alert alert-danger text-start">
                		<ul>
                			@foreach($errors->all() as $error)
                			<li>{{ $error }}</li>
                			@endforeach
                		</ul>
                	</div>
                @endif -->

                  <div data-mdb-input-init class="form-outline mb-4">
                  	<label class="form-label fs-5" for="form2Example11">Email Address</label>
                  	@error('email')
                  		<div class="alert alert-danger">{{ $message }}</div>
                  	@enderror
                    <input type="email" name="email" id="form2Example11" class="form-control @error('email') is-invalid @enderror"
                      placeholder="Enter your email address" value="{{ old('email') }}"/>  
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                  	<label class="form-label fs-5" for="form2Example22">Password</label>
                  	@error('password')
                  		<div class="alert alert-danger">{{ $message }}</div>
                  	@enderror
                    <input type="password" name="password" id="form2Example22" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg mb-3 me-2 hero-btn1" type="submit" id="submit"><i class="bi bi-box-arrow-in-right me-2"></i>Log
                      in</button>
                    <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2 fs-5">Don't have an account?</p>
                    <!-- <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark">Create new</button> -->
                    <a href="{{ route('register') }}" class="btn btn-outline-dark w-50">Create new</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center bg-pink border border-5 border-white">
              <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4 fs-3">We are more than just a sweets shop<i class="bi bi-shop-window ms-2"></i></h4>
                <p class="fs-5 mb-0">At DawnSweets, every treat is made with love, the finest ingredients, and a touch of sweetness to brighten your day. From delicate pastries to indulgent desserts — there’s something for every craving.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>