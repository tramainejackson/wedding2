<!DOCTYPE html>
<html>
	<head>
		<title>It's Wedding Season</title>

		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<!-- Styles -->
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Bootstrap core CSS -->
		<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" media="screen,projection">
		<!-- Material Design Bootstrap -->
		<link href="{{ asset('/css/mdb.min.css') }}" rel="stylesheet" media="screen,projection">
		<link href="{{ asset('/css/mycss.css') }}" rel="stylesheet" media="screen,projection" />
		
		<style>
			p {line-height: 2}
			
			.bgimg, .bgimg2 {
				min-height: 100vh;
				max-height: 100vh;
			}
			
			.bgimg2 { 
				background-image: url("/images/flowers.jpg"); 
				background-repeat: no-repeat;
				background-position: center center;
				background-size: cover;
			}
			
			#us.w3-container, #test1 {
				/* color: #000!important;
				background-image: url("/images/gb4.jpg"); 
				background-repeat: no-repeat;
				background-position: center center;
				background-size: cover;
				background-attachment: fixed; */
				position: relative;
			}

			@yield('addt_style')
		</style>
	</head>
	<body class="">
		<!-- Navbar (sticky bottom) -->
		<div class="fixed-bottom rgba-white-strong d-none d-lg-block">
			<div class="d-flex align-items-center justify-content-around">
				@if (Auth::check())
					<a href="/" class="btn nav-link">Home</a>
					<a href="/guest_list" class="btn nav-link">Guest List</a>
					<a href="/guest_list_food" class="btn nav-link">Food Selections</a>
					<a href="/photos/create" class="btn nav-link">Photos</a>
					<a href="{{ route('logout') }}"	onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn nav-link">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>

				@else
					<a href="/" class="btn nav-link">Home</a>
					<a href="/#us" class="btn nav-link">Our Story</a>
					<a href="/#wedding" class="btn nav-link">Wedding</a>
					<a href="/party" class="btn nav-link">Dream Team</a>
					<a href="/photos" class="btn nav-link">Photos</a>
					<a href="/registry" class="btn nav-link">Registry</a>
					<a href="/accommodations" class="btn nav-link">Accommodations</a>
				@endif
			</div>
		</div>

		<!-- Navbar (mobile) -->
		<!-- SideNav slide-out button -->
		<button type="button" data-activates="slide-out" class="btn btn-sm btn-primary d-block d-lg-none button-collapse" style="position:fixed;z-index: 1039;"><i class="fa fa-bars" aria-hidden="true"></i></button>
		
		<!-- Sidebar navigation -->
		<div id="slide-out" class="side-nav fixed white">
			<ul class="custom-scrollbar pb-4">
				<li>
					<div class="position-relative">
						<div class="background">
							<img class="img-fluid" src="/images/at1.jpg">
						</div>
						<div id="side_nav_countdown" class="">
							<span id="countdownClock"></span>
						</div>
					</div>
				</li>
				@if (Auth::check())
					<li>
						<a href="/" class="btn nav-link">Home</a>
					</li>
					<li>
						<a href="/guest_list" class="btn nav-link">Guest List</a>
					</li>
					<li>
						<a href="/guest_list_food" class="btn nav-link">Food Selections</a>
					</li>
					<li>
						<a href="/photos/create" class="btn nav-link">Photos</a>
					</li>
					<li><div class="divider"></div></li>
					<li>
						<a href="{{ route('logout') }}"	onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn nav-link">Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
					</form>
				@else
					<li>
						<a href="/" class="btn nav-link">Home</a>
					</li>
					<li>
						<a href="/#us" class="btn nav-link">Our Story</a>
					</li>
					<li>
						<a href="/#wedding" class="btn nav-link">Wedding</a>
					</li>
					<li>
						<a href="/party" class="btn nav-link">Dream Team</a>
					</li>
					<li>
						<a href="/photos" class="btn nav-link">Photos</a>
					</li>
					<li>
						<a href="/registry" class="btn nav-link">Registry</a>
					</li>
					<li>
						<a href="/accommodations" class="btn nav-link">Accommodations</a>
					</li>
					<li><div class="divider"></div></li>
					<li>
						<a href="/login" class="btn nav-link">Login</a>
					</li>
				@endif
			</ul>
		</div>

		@yield('header')

		@yield('about_us')
			
		@yield('wedding_information')

		@yield('rsvp_information')
		
		@yield('footer')
		
		<!-- Footer -->
		<footer class="black white-text pt-5">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-8">
						<h4 class="h4-responsive">I think we covered everything but if you still want to contact us then you can leave a message at the BEEEEEEEPPPPPPPP.....</h4>

						{!! Form::open([ 'action' => 'MessageController@store', 'class' => '']) !!}
							<div class="row">
								<div class="col">
									<div class="md-form">
										<input id="first" class="form-control" type="text" name="name" value="{{ old('name') }}">
										
										<label for="name" class="">Full Name</label>
										
										@if($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
										@endif
									</div>
								</div>
								<div class="col">
									<div class="md-form">
										<input id="last" class="form-control" type="email" name="email" value="{{ old('email') }}">
										
										<label for="email" class="">Email Address</label>
										
										@if($errors->has('email'))
											<span class="text-danger">{{ $errors->first('email') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="md-form">
								<textarea id="message" class="form-control md-textarea" name="message">{{ old('message') }}</textarea>
								
								<label for="message" class="">Message</label>
								
								@if($errors->has('message'))
									<span class="text-danger">{{ $errors->first('message') }}</span>
								@endif
							</div>
							<div class="md-form">
								{!! Form::submit('Send Message', ['name' => 'submit', 'class' => 'btn btn-lg red accent-2 m-0']) !!}
							</div>
						{!! Form::close() !!}
					</div>
					
					<div class="col-12 col-md-4 mt-5 mt-md-2" id="instagram_us">
						<h4 class="text-center">Instagram With Us</h4>

						<div class="w3-display-container">
							<img src="/images/at3.jpg" class="img-fluid" />
						</div>

						<div class="text-center">
							<h5 class="text-center">#journey2jackson</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid grey darken-4 text-center">
				<div class="row">
					<div class="col">
						<p class="m-0">&copy;&nbsp; & &reg;&nbsp; by Tramaine</p>
					</div>
				</div>
			</div>
		</footer>

		
		<!-- SCRIPTS -->
		<!-- JQuery -->
		<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap tooltips -->
		<script type="text/javascript" src="/js/popper.min.js"></script>
		<!-- Bootstrap core JavaScript -->
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<!-- MDB core JavaScript -->
		<script type="text/javascript" src="/js/mdb.min.js"></script>
		<script src="/js/jquery.countdown.min.js"></script>
		<script src="/js/myjs.js"></script>

		@if($errors->has('name') || $errors->has('message') || $errors->has('email'))
			<script>
				$('#first').focus();
			</script>
		@endif

		@yield('addt_script')
	</body>
</html>