@extends('layouts.app')

@section('title', 'DawnSweets | My Cart')

@section('content')
	<div class="container">
		<div class="row my-5">
			<h1 class="h3 mb-5 text-center text-md-start">My Cart</h1>
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

			@if($cart_products->isEmpty())
				<div class="alert alert-info"><i class="bi bi-basket me-2"></i>Your cart is currently empty.</div>
				<a href="{{ route('home') }}#products" class="btn btn-outline-dark w-auto"><i class="bi bi-search-heart me-2"></i>Choose a cake now</a>
			@else
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
					<thead class="table-light">
						<th>ID</th>
						<th><i class="bi bi-basket me-2"></i>Product</th>
						<th><i class="bi bi-stack me-2"></i>Quantity</th>
						<th><i class="bi bi-calendar-check me-2"></i>Added to cart on</th>
						<th><i class="bi bi-gear-wide-connected me-2"></i>Actions</th>
					</thead>
					<tbody>
						@foreach($cart_products as $cp)
							<tr>
								<td>{{ $cp->id }}</td>
								<td>
									<img src="{{ asset($cp->cake->filepath) }}" alt="{{ $cp->cake->name }}" class="img-fluid me-2" width="50" height="50">{{ $cp->cake->name }}, {{ $cp->cake->grams }} g, {{ $cp->cake->price }} €
								</td>
								<td>{{ $cp->quantity }} pcs</td>
								<td><span class="text-decoration-underline">{{ $cp->created_at }}</span></td>
								<td>
									<form action="{{ route('cart.destroy', ['id' => $cp->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this item from the cart?')">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-title="Remove from cart" data-bs-placement="right"><i class="bi bi-x-lg"></i></button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="d-flex justify-content-end mt-4 align-items-center gap-4 mb-5">
					<div class="d-flex gap-2 align-items-center">
						<div class="h5">Total:</div>
						<div class="h4 fw-bold">
				            {{ $total }} €
				        </div>
					</div>
			        <form action="{{ route('order.store') }}" method="POST" onsubmit="document.getElementById('submit').disabled=true;">
			            @csrf
			            <button class="btn hero-btn1 text-white w-100" type="submit" onclick="return confirm('Are you sure you want to order the selected items?')">
			                <i class="bi bi-bag-check me-2"></i>Order Now
			            </button>
			        </form>
				</div>
				</div>
			@endif
		</div>
	</div>
	<div class="mt-3">
    {{ $cart_products->links() }}
	</div>
@endsection