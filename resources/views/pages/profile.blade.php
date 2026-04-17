@extends('layouts.app')

@section('title', 'DawnSweets | My Profile')

@section('content')
	<div class="container">
		<div class="row pt-5">
			<h1 class="h3 mb-5 text-center text-md-start">My Profile</h1>
			<div class="col-md-4 text-center text-md-start">
				<div class="text-center pb-5" width="400" height="400">
          <img src="https://placehold.co/200x200" alt="profile pic" class="img-fluid rounded" height="200" width="200">    
        </div>
				<div class="input-group mb-3 mt-4">
  					<input type="file" class="form-control" id="inputGroupFile01">
				</div>
			</div>
			<div class="col-md-8">
				<form action="{{ route('profile.update') }}" method="POST" onsubmit="document.getElementById('submit').disabled=true;">
                  @csrf
                  @method("PUT")
                  <p class="fs-5 fst-italic">~ Here you can edit your personal details.</p>

                 <!--  @if($errors->any())
                    <div class="alert alert-danger text-satrt">
                      <ul>
                        @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif -->

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

                  <div class="form-outline mb-4">
                  	<label class="form-label fs-5" for="form2Example11">Email Address</label>
                    @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input 
                   	  disabled
                      type="email" 
                      name="email" 
                      id="form2Example11" 
                      class="form-control @error('email') is-invalid @enderror"
                      value="{{ $user->email }}"/>  
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label fs-5" for="form2Example12">Username</label>
                    @error('username')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input 
                      type="text" 
                      name="username" 
                      id="form2Example12" 
                      class="form-control @error('username') is-invalid @enderror"
                      placeholder="Enter your desired username" 
                      value="{{ old('username', $user->username ?? '') }}"/>  
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label fs-5" for="form2Example13">Telephone Number</label>
                    @error('telephone')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input 
                      type="text" 
                      name="telephone" 
                      id="form2Example13" 
                      class="form-control @error('telephone') is-invalid @enderror"
                      placeholder="For example 0876543321" 
                      value="{{ old('telephone', $user->telephone ?? '') }}"/>  
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label fs-5" for="form2Example14">Address</label>
                    @error('address')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input 
                      type="text" 
                      name="address" 
                      id="form2Example14" 
                      class="form-control @error('address') is-invalid @enderror"
                      placeholder="Enter your address" 
                      value="{{ old('address', $user->address ?? '') }}"/>  
                  </div>

                  <div class="form-outline mb-4">
                  	<label class="form-label fs-5" for="form2Example22">Password</label>
                    @error('password')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input 
                      type="password" 
                      name="password" 
                      id="form2Example22" 
                      class="form-control @error('password') is-invalid @enderror" 
                      placeholder="Enter your new password" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label fs-5" for="form2Example23">Confirm Password</label>
                    @error('password_confirmation')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input 
                      type="password" 
                      name="password_confirmation" 
                      id="form2Example23" 
                      class="form-control @error('password_confirmation') is-invalid @enderror" 
                      placeholder="Repeat your new password" />
                  </div>

                  <div class="text-start pt-1 mb-5 pb-1 d-grid d-lg-block">
                    <button class="btn btn-primary btn-block fa-lg mb-3 me-2 hero-btn1" type="submit" id="submit"><i class="bi bi-floppy me-2"></i>Save changes</button>
                    <!-- <a class="text-muted" href="#!">Forgot password?</a> -->

                    <input type="reset" value="Reset" class="btn btn-outline-danger mb-3">
                  </div>

                    

                </form>
			</div>
		</div>
	</div>
@endsection