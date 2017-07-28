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
			
			@foreach ($photos as $photo)
				<img class="mySlides w3-animate-fading" src="{{ $photo->name }}" style="width:100%">
			@endforeach
			
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