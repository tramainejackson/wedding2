@extends('layouts.app')

@section('about_us')
<div class="bgrdImage" style="background: url(/images/map3.jpg); background-repeat: no-repeat; background-position: center center; background-size: 100% 100%; background-attachment: fixed; padding: 0% 5%; color:black;">
	<img src="/images/compass.png" class="countdownCompas hide-on-small-only" />
	<div id="getting-started" class="hide-on-small-only"><span id="countdownClock"></span></div>
	
	<!--- Header / Home --->
	@component('layouts.nav')
	@endcomponent
	
	<div class="container w3-large" style="font-family: 'Lobster Two', cursive;">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Login</div>
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ route('login') }}">
							{{ csrf_field() }}

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email" class="col-md-4 control-label">Username</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password" class="col-md-4 control-label">Password</label>

								<div class="col-md-6">
									<input id="password" type="password" class="form-control" name="password" required>

									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
										</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Login
									</button>

									<a class="btn btn-link" href="{{ route('password.request') }}">
										Forgot Your Password?
									</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
