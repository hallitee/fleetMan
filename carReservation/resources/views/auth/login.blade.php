@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Login</div>
      <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
		
					
					<input id="password" type="password" class="form-control" name="password" required>

					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif			
					
					
          </div>
          <div class="form-group">
            <div class="form-check">
					<label>
						<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
					</label>
          </div>
								<button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
        </form>
        <div class="text-center">
          <a class="d-block small" href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
      </div>
    
	
	</div>
  </div>
    
   </div>
@endsection
