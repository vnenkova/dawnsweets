<div class="container-fluid bg-brown px-5 mt-5"> 
	<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 mt-5 border-top">
		<div class="col-12 col-md-6 mb-3">
			<a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none" aria-label="Bootstrap"> <svg class="bi me-2" width="40" height="32" aria-hidden="true"><use xlink:href="#bootstrap"></use></svg> 
			</a> 
			<p class="text-white">DawnSweets © {{ date('Y') }}. All Rights Reserved</p> 
		</div> 
		<!-- <div class="col mb-3"></div>  -->
		<div class="col-12 col-md-3 mb-3"> 
			<h5 class="fst-italic">Quick Links</h5> 
			<ul class="nav flex-column"> 
				<li class="nav-item mb-2 text-white"><a href="#" class="nav-link p-0 text-white">Home</a></li>
				<li class="nav-item mb-2"><a href="#about" class="nav-link p-0 text-white">About Us</a></li> 
				<li class="nav-item mb-2 text-white"><a href="#products" class="nav-link p-0 text-white">Products</a></li> 
				<li class="nav-item mb-2 text-white"><a href="{{ route('login') }}" class="nav-link p-0 text-white">Login</a></li>
				<!-- <li class="nav-item mb-2 text-white"><a href="#" class="nav-link p-0 text-white">About</a></li>  -->
				<li class="nav-item mb-2 text-white"><a href="{{ route('register') }}" class="nav-link p-0 text-white">Register</a></li>
			</ul> 
		</div> 
		<div class="col-12 col-md-3 mb-3"> 
			<h5 class="fst-italic">Contacts</h5> 
			<ul class="nav flex-column"> 
				<li class="nav-item mb-2 text-white"><a href="#" class="nav-link p-0 text-white">Facebook</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Instagram</a></li> 
				<li class="nav-item mb-2 text-white"><a href="#" class="nav-link p-0 text-white">Twitter/X</a></li> 
			</ul> 
			</div> 
		</footer> 
	</div>