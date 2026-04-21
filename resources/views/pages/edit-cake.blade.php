@extends('layouts.app')

@section('title', 'DawnSweets | Edit cake')

@section('content')
	<div class="container">
		<div class="row my-5">
			<div class="d-flex align-items-center mb-5 bg-secondary-subtle p-4 rounded-5 justify-content-center">
        		<i class="bi bi-pencil-square fs-5 me-2"></i>
        		<h1 class="h3 text-center mb-0">Edit cake '{{ $cake->name }}' (ID: {{ $cake->id }})</h1>
	      	</div>
	      	<a href="{{ route('home') }}" class="btn btn-info w-auto hero-btn1 text-white"><i class="bi bi-arrow-left me-2"></i>Back to Cake List</a>

		</div>
		<form action="{{ route('cakes.update', ['id' => $cake->id]) }}" class="bg-light p-5 mb-5 rounded rounded-4" method="POST" onsubmit="return confirm('Are you sure you want to save the changes?')">
			@csrf
			@method('PUT')
	      		<div class="row">
	      			<div class="col-4 text-center">
	      				<img src="{{ asset($cake->filepath) }}" alt="{{ $cake->name }}" class="img-fluid rounded rounded-4" width="300" height="300">
	      			</div>
	      			<div class="col-8">
	      				<label for="cake" class="form-label fw-bold">Cake Name:</label>
	      				@error('name')
	      					<div class="alert alert-danger">{{ $message }}</div>
	      				@enderror
	      				<input type="text" id="cake" name="name" class="form-control mb-3 @error('name') is-invalid @enderror" value="{{ old('name', $cake->name) }}">

	      				<label for="price" class="form-label fw-bold">Price (€):</label>
	      				@error('price')
	      					<div class="alert alert-danger">{{ $message }}</div>
	      				@enderror
	      				<input type="number" id="price" name="price" class="form-control mb-3 @error('price') is-invalid @enderror" min="10" max="100" value="{{ old('price', $cake->price) }}">

	      				<label for="grams" class="form-label fw-bold">Grams:</label>
	      				@error('grams')
	      					<div class="alert alert-danger">{{ $message }}</div>
	      				@enderror
	      				<input type="number" id="grams" name="grams" min="250" max="800" class="form-control mb-3 @error('grams') is-invalid @enderror" value="{{ old('grams', $cake->grams) }}">

	      				<button type="submit" class="btn btn-success btn-lg mt-3">
	      					<i class="bi bi-bookmark-check me-2"></i>Save Changes
	      				</button>
	      				<button type="reset" class="btn btn-lg btn-danger mt-3"><i class="bi bi-arrow-clockwise me-2"></i>Reset</button>
	      			</div>
	      		</div>
	      	</form>
	</div>
@endsection