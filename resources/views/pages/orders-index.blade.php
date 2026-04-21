@extends('layouts.app')

@section('title', 'DawnSweets | Orders')

@section('content')
	<div class="container">
		<div class="row my-5">
			<div class="d-flex align-items-center mb-5 bg-secondary-subtle p-4 rounded-5 justify-content-center">
		        <i class="bi bi-list-ul fs-5 me-2"></i>
		        @if($user->isAdmin !== 1)
		        	<h1 class="h3 text-center mb-0">My Orders</h1>
		        @else
		        	<h1 class="h3 text-center mb-0">List of All Orders</h1>
		        @endif
		      </div>

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

			@if($orders->isEmpty())
				<div class="alert alert-info"><i class="bi bi-basket me-2"></i>You haven't placed any orders yet.</div>
			@else
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead class="table-light">
							<th>ID</th>
							<th><i class="bi bi-list-ol me-2"></i>Ordered products</th>
							<th><i class="bi bi-tag me-2"></i>Total price</th>
							<th><i class="bi bi-calendar-check me-2"></i>Ordered on</th>
							@if($user->isAdmin === 1)
								<th><i class="bi bi-calendar-check me-2"></i>Ordered by</th>
							@endif
							<th><i class="bi bi-info-circle me-2"></i>Status</th>
							@if($user->isAdmin === 1)
								<th><i class="bi bi-calendar-check me-2"></i>Actions</th>
							@endif
						</thead>
						<tbody>
							@foreach($orders as $order)
								<tr>
									<td>{{ $order->id }}</td>
									<td>
										@foreach($order->orderItems as $oi)
											<div><img src="{{ asset($oi->cake->filepath) }}" alt="{{ $oi->cake->name }}" class="img-fluid me-2" width="50" height="50">{{ $oi->cake->name }} {{ $oi->quantity }} x {{ $oi->price }} €</div>
										@endforeach
									</td>
									<td>{{ $order->total_price }} €</td>
									<td><span class="text-decoration-underline">{{ $order->created_at }}</span></td>
									<td>{{ $order->user->username }} <br> <small class="text-muted">({{ $order->user->email }})</small></td>
									<td class="@if($order->status == 'pending') table-info @elseif($order->status == 'completed') table-success @elseif($order->status == 'canceled') table-danger @endif">{{ $order->status }} @if($order->status == 'pending')<i class="bi bi-hourglass-split"></i> @elseif($order->status == 'completed') <i class="bi bi-check-circle-fill"></i> @elseif($order->status == 'canceled') <i class="bi bi-x-circle-fill"></i> @endif</td>
									<td>
										<div class="d-flex gap-2">
											<!-- <a href="{{ route('orders.complete', ['id' => $order->id]) }}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-title="Mark as completed" data-bs-placement="top">
											<i class="bi bi-check-lg"></i>
											</a> -->
											<form action="{{ route('orders.complete', ['id' => $order->id]) }}" method="POST" onsubmit="document.querySelector('.btn-complete').disabled=true">
												@csrf
												@method('PUT')
												<button type="submit" class="btn btn-success btn-complete" data-bs-toggle="tooltip" data-bs-title="Mark as completed" data-bs-placement="top" @if($order->status == 'completed' || $order->status == 'canceled') disabled  @endif><i class="bi bi-check-lg"></i></button>
											</form>
											<form action="{{ route('orders.cancel', ['id' => $order->id]) }}" method="POST" onsubmit="document.querySelector('.btn-cancel').disabled=true; return confirm('Are you sure you want to cancel this order?')">
												@csrf
												@method('PUT')
												<button type="submit" class="btn btn-danger btn-cancel" data-bs-toggle="tooltip" data-bs-title="Cancel" data-bs-placement="top" @if($order->status == 'completed' || $order->status == 'canceled') disabled  @endif><i class="bi bi-x-lg"></i></button>
											</form>
											<!-- <a href="" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-title="Cancel" data-bs-placement="top">
												<i class="bi bi-x-lg"></i>
											</a> -->
											<form action="{{ route('orders.delete', ['id' => $order->id]) }}" method="POST" onsubmit="document.querySelector('.btn-delete').disabled=true; return confirm('Are you sure you want to delete this order?')">
			                                  @csrf
			                                  @method('DELETE')
			                                 <button type="submit" class="btn btn-dark btn-delete" data-bs-toggle="tooltip" data-bs-title="Delete" data-bs-placement="top">
			                                  <i class="bi bi-trash"></i>
			                                 </button>
			                                </form>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@endif
		</div>
	</div>
	<div class="mt-3">
    	{{ $orders->links() }}
	</div>
@endsection