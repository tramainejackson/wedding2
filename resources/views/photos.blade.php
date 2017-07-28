@extends('app')

@section('addt_style')
	.bgimg, .bgimg2 {
		min-height: 30%;
	}
@endsection

@section('header')
	<!-- Header / Home-->
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
		<div class="w3-display-middle w3-text-white w3-center headerContent">
			<h1 class="w3-jumbo">Photo Gallery</h1>
			<span class="w3-text-white w3-display-bottommiddle"><i>- no new faces, same entourage</i></span>
		</div>
	</header>
@endsection

@section('about_us')
	<!-- About / Tramaine & Ashley -->
	<div class="w3-container w3-padding-24 w3-pale-red w3-grayscale-min" id="us">
		<div class="w3-content w3-section" style="max-width:500px">
			<h2 class="w3-center">SQUAD GOALS</h2>
			<img class="mySlides w3-animate-fading" src="images/at1.jpg" style="width:100%">
			<img class="mySlides w3-animate-fading" src="images/at2.jpg" style="width:100%">
			<img class="mySlides w3-animate-fading" src="images/at3.jpg" style="width:100%">
			<img class="mySlides w3-animate-fading" src="images/at4.jpg" style="width:100%">
		</div>
	</div>
	<script>
		var myIndex = 0;
		carousel();

		function carousel() {
			var i;
			var x = document.getElementsByClassName("mySlides");
			for (i = 0; i < x.length; i++) {
			   x[i].style.display = "none";  
			}
			myIndex++;
			if (myIndex > x.length) {myIndex = 1}    
			x[myIndex-1].style.display = "block";  
			setTimeout(carousel, 9000);    
		}
</script>
@endsection

@section('footer')
	<!-- Footer -->
	<footer class="w3-center w3-black w3-padding-16">
		<div class="container">
			<div class="row">
				<div class="col s8">
					<h4 class="w3-left-align" style="padding-left:5px">I think we covered everything but if you still want to contact us then you can leave a message at the BEEEEEEEPPPPPPPP.....</h4>
				</div>
				<div class="col s4">
					<h4 class="w3-center" style="padding-left:5px">Instagram With Us</h4>
				</div>
				<div class="col s8">
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
					<div class="w3-display-container">
						<img src="images/at3.jpg" class="responsive-img w3-center" />
					</div>
				</div>
				<div class="col s8"></div>
				<div class="col s4">
					<h5 class="">#jouney2jackson</h5>
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
@endsection