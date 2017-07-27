<!DOCTYPE html>
<html>
<title>It's Wedding Season</title>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
<link rel="stylesheet" href="css/app.css" media="screen,projection" />
<style>
body,h1,h2{font-family: "Raleway", sans-serif}
body, html {height: 100%}
p {line-height: 2}
.bgimg, .bgimg2 {
    min-height: 100%;
    background-position: 100% 85%;
    background-size: cover;
}
.bgimg {background-image: url("/images/at2.jpg")}
.bgimg2 {background-image: url("/images/flowers.jpg")}
div#confirmation_modal {
    position: absolute;
    z-index: 1;
    top: 20px;
    margin: 0% 25%;
    background: rgba(255, 255, 255, 0.8);
}
@yield('addt_style')
</style>
<body>

<!-- Navbar (sticky bottom) -->
<div class="w3-bottom w3-hide-small">
	<div class="w3-bar w3-white w3-center w3-padding w3-opacity-min w3-hover-opacity-off">
		<a href="/" style="width:16.6%" class="w3-bar-item w3-button">Home</a>
		<a href="/#us" style="width:16.6%" class="w3-bar-item w3-button">Our Story</a>
		<a href="/#wedding" style="width:16.6%" class="w3-bar-item w3-button">Wedding</a>
		<a href="/party" style="width:16.6%" class="w3-bar-item w3-button w3-hover-black">Dream Team</a>
		<a href="/party" style="width:16.6%" class="w3-bar-item w3-button w3-hover-black">Photos</a>
		<a href="/#rsvp" style="width:16.6%" class="w3-bar-item w3-button w3-hover-black">RSVP</a>
	</div>
</div>

@yield('header')

@yield('about_us')
	
@yield('wedding_information')

@yield('rsvp_information')

@yield('footer')

</body>
</html>
