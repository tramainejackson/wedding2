<!DOCTYPE html>
<html>
<title>It's Wedding Season</title>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="/css/materialize.min.css" media="screen,projection" />
<link rel="stylesheet" href="/css/app.css" media="screen,projection" />
<link rel="stylesheet" href="/css/mycss.css" media="screen,projection" />
<style>
body,h1,h2{font-family: "Raleway", sans-serif}
body, html {height: 100%}
p {line-height: 2}
.bgimg, .bgimg2 {
    min-height: 100%;
    background-position: 100% 85%;
    background-size: cover;
}
.bgimg { background-image: url("/images/at2.jpg")}
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
    color: #000!important;
    background-image: url("/images/gb3.jpg"); 
	background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
}

@yield('addt_style')
</style>
<body>

<!-- Navbar (sticky bottom) -->
<div class="w3-bottom w3-hide-small">
	<div class="w3-bar w3-white w3-center w3-padding w3-opacity-min w3-hover-opacity-off">
		@if (Auth::check())
			<a href="/" style="width:25%" class="w3-bar-item w3-button">Home</a>
			<a href="/guest_list" style="width:25%" class="w3-bar-item w3-button">Guest List</a>
			<a href="/" style="width:25%" class="w3-bar-item w3-button">Something 1</a>
			<a href="{{ route('logout') }}"	onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="width:25%" class="w3-bar-item w3-button">Logout</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>

		@else
			<a href="/" style="width:14.2%" class="w3-bar-item w3-button">Home</a>
			<a href="/#us" style="width:14.2%" class="w3-bar-item w3-button">Our Story</a>
			<a href="/#wedding" style="width:14.2%" class="w3-bar-item w3-button">Wedding</a>
			<a href="/party" style="width:14.2%" class="w3-bar-item w3-button">Dream Team</a>
			<a href="/photos" style="width:14.2%" class="w3-bar-item w3-button">Photos</a>
			<a href="/registry" style="width:14.2%" class="w3-bar-item w3-button">Registry</a>
			<a href="/#rsvp" style="width:14.2%" class="w3-bar-item w3-button">RSVP</a>
		@endif
	</div>
</div>

@yield('header')

@yield('about_us')
	
@yield('wedding_information')

@yield('rsvp_information')

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
	<div class="container">
		<div class="row">
			<div class="col s8">
				<h4 class="w3-left-align w3-padding-24" style="padding-left:5px">I think we covered everything but if you still want to contact us then you can leave a message at the BEEEEEEEPPPPPPPP.....</h4>

				{!! Form::open([ 'action' => 'MessageController@store', 'class' => '']) !!}
					<div class="input-field col s6">
						<input id="first" class="w3-large validate" type="text" name="name">
						<label for="name" class="active">Full Name</label>
					</div>
					<div class="input-field col s6">
						<input id="last" class="w3-large validate" type="email" name="email">
						<label for="email" class="active">Email Address</label>
					</div>
					<div class="input-field col s12">
						<textarea id="message" class="w3-large materialize-textarea validate" name="message"></textarea>
						<label for="message" class="active">Message</label>
					</div>
					<div class="input-field col s12">
						{!! Form::submit('Send Message', ['name' => 'submit', 'class' => 'btn waves-effect waves-light red accent-2 w3-left']) !!}
					</div>
				{!! Form::close() !!}
			</div>
			<div class="col s4">
				<h4 class="w3-center" style="padding-left:5px">Instagram With Us</h4>

				<div class="w3-display-container">
					<img src="/images/at3.jpg" class="responsive-img w3-center" />
				</div>

				<div class="w3-center">
					<h5 class="w3-center">#jouney2jackson</h5>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-display-container">
		<div class="grey darken-4 comporation">
			<h5 class="w3-align-left">&copy;&nbsp;Copyright by Tramaine & &reg;&nbsp;Registered by Tramaine</h5>
		</div>
	</div>
</footer>
<div class="w3-hide-small" style="margin-bottom:32px"> </div>
<script src="/js/app.js"></script>
<script src="/js/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="/js/materialize.min.js"></script>
@yield('footer')
</body>
</html>