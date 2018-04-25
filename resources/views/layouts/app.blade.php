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
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Bootstrap core CSS -->
		<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" media="screen,projection">
		<!-- Material Design Bootstrap -->
		<link href="{{ asset('/css/mdb.min.css') }}" rel="stylesheet" media="screen,projection">
		<link href="{{ asset('/css/mycss.css') }}" rel="stylesheet" media="screen,projection" />
		
		<style>
			body,h1,h2{font-family: "Raleway", sans-serif}
			body, html {height: 100%}
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
			div#confirmation_modal {
				position: absolute;
				z-index: 1;
				top: 20px;
				margin: 0% 25%;
				background: rgba(255, 255, 255, 0.8);
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
	<body>
		<!-- Navbar (sticky bottom) -->
		<div class="fixed-bottom rgba-white-light">
			<div class="d-flex align-items-center justify-content-around">
				@if (Auth::check())
					<a href="/" class="btn">Home</a>
					<a href="/guest_list" class="btn">Guest List</a>
					<a href="/guest_list_food" class="btn">Food Selections</a>
					<a href="/photos/create" class="btn">Photos</a>
					<a href="{{ route('logout') }}"	onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>

				@else
					<a href="/" class="btn black-text rgba-blue-grey-light">Home</a>
					<a href="/#us" class="btn">Our Story</a>
					<a href="/#wedding" class="btn">Wedding</a>
					<a href="/party" class="btn">Dream Team</a>
					<a href="/photos" class="btn">Photos</a>
					<a href="/registry" class="btn">Registry</a>
					<a href="/accommodations" class="btn">Accommodations</a>
				@endif
			</div>
		</div>

		<!-- Navbar (mobile) -->
		<a href="#" onclick="w3_open()" class="w3-hide-medium w3-hide-large w3-padding w3-margin btn circle" style="position:fixed;z-index: 1;"><i class="material-icons">menu</i></a>
		<div class="w3-sidebar w3-hide-medium w3-hide-large" style="display:none;z-index:2;" id="mySidebar">
			<ul>
				<li>
					<div class="w3-display-container" style="margin-bottom:5px;">
					  <div class="background">
						<img class="w3-mobile" src="/images/at1.jpg">
					  </div>
					  <div id="getting-started" class=""><span id="countdownClock"></span></div>
					</div>
					<a href="#" class="w3-display-topright"><i onclick="w3_close()" class="material-icons">clear</i></a>
				</li>
				@if (Auth::check())
					<li><a href="/" class="w3-mobile btn waves-effect">Home</a></li>
					<li><a href="/guest_list" class="w3-mobile waves-effect btn" onclick="w3_close()">Guest List</a></li>
					<li><a href="/guest_list_food" class="w3-mobile btn waves-effect" onclick="w3_close()">Food Selections</a></li>
					<li><a href="/photos/create" class="w3-mobile btn">Photos</a></li>
					<li><div class="divider"></div></li>
					<li>
						<a href="{{ route('logout') }}"	onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-mobile btn">Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
					</form>
				@else
					<li><a href="/" class="w3-mobile btn waves-effect">Home</a></li>
					<li><a href="/#us" class="w3-mobile waves-effect btn" onclick="w3_close()">Our Story</a></li>
					<li><a href="/#wedding" class="w3-mobile btn waves-effect" onclick="w3_close()">Wedding</a></li>
					<li><a href="/party" class="w3-mobile btn">Dream Team</a></li>
					<li><a href="/photos" class="w3-mobile btn">Photos</a></li>
					<li><a href="/registry" class="w3-mobile btn">Registry</a></li>
					<li><a href="/accommodations" class="w3-mobile btn">Accommodations</a></li>
					<li><div class="divider"></div></li>
					<li><a href="/login" class="w3-mobile btn">Login</a></li>
				@endif
			</ul>
		</div>

		@yield('header')

		@yield('about_us')
			
		@yield('wedding_information')

		@yield('rsvp_information')

		<!-- Footer -->
		<footer class="black white-text py-3">
			<div class="container">
				<div class="row">
					<div class="col-8">
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
					
					<div class="col-4" id="instagram_us">
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
			<div class="container-fluid grey darken-4 text-center" style="margin-bottom: -15px;">
				<div class="row">
					<div class="col">
						<p class="m-0">&copy;&nbsp; & &reg;&nbsp; by Tramaine</p>
					</div>
				</div>
			</div>
		</footer>

		@if($errors->has('name') || $errors->has('message') || $errors->has('email'))
			<script>
				$('#first').focus();
			</script>
		@endif
		
		<!-- SCRIPTS -->
		<!-- JQuery -->
		<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap tooltips -->
		<script type="text/javascript" src="/js/popper.min.js"></script>
		<!-- Bootstrap core JavaScript -->
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<!-- MDB core JavaScript -->
		<script type="text/javascript" src="/js/mdb.min.js"></script>
		<script src="/js/materialize.min.js"></script>
		<script src="/js/jquery.countdown.min.js"></script>
		<script src="/js/myjs.js"></script>
		
		@yield('footer')
	</body>
</html>