@extends('layouts.app')

@section('title', 'DawnSweets | My Orders')

@section('content')
	<div class="container">
		<div class="row my-5">
			<h1 class="h3 mb-5 text-center text-md-start">My Orders</h1>
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
							<th><i class="bi bi-info-circle me-2"></i>Status</th>
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
									<td class="table-info">{{ $order->status }} <i class="bi bi-hourglass-split"></i></td>
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