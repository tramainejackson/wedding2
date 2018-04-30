@extends('layouts.app')

@section('header')
	@include('layouts.header')
@endsection

@section('about_us')
	<div class="container">
		<div class="row align-items-center justify-content-center my-4">
			<div class="col-12 col-sm-10 col-md-8 col-xl-6 white rounded p-4 mx-auto">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="h2-responsive">Login</h2>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ route('login') }}">
							{{ csrf_field() }}

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email" class="ontrol-label">Username</label>

								<div class="">
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password" class="control-label">Password</label>

								<div class="">
									<input id="password" type="password" class="form-control" name="password" required>

									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group">
								<div class="">
									<button type="submit" class="btn btn-primary mx-0">
										Login
									</button>
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
