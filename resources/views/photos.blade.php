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
			<span class="w3-text-white w3-display-bottommiddle w3-hide-small"><i>- same entourage no extra faces</i></span>
		</div>
	</header>
@endsection

@section('about_us')
	<!-- About / Tramaine & Ashley -->
	<div class="w3-display-container photosPageContainer">
		@foreach ($photos as $photo)
			<img class="mySlides w3-animate-zoom w3-mobile rot{{ $photo->description }}" src="{{ $photo->name }}">
		@endforeach
		<button class="w3-button w3-black w3-display-left" onclick="plusPic(-1)">&#10094;</button>
		<button class="w3-button w3-black w3-display-right" onclick="plusPic(1)" style="">&#10095;</button>
		<div class="w3-display-bottomleft">
			<span id="imgCount" class="w3-black w3-text-whitesmoke"></span>
		</div>
	</div>
	<div class="" style="text-align:center;">
		{{ $photos->links() }}
	</div>
	
	<script>
		var myIndex = 1;
		showPic(myIndex);
		
		function plusPic(n) {
			showPic(myIndex += n);
		}
	
		function showPic(n) {
			var i;
			var x = document.getElementsByClassName("mySlides");

			if(n > x.length) { 
				myIndex = 1; 
			} else if(n < 1) { 
				myIndex = x.length;
			}
			
			for (i = 0; i < x.length; i++) {
			   x[i].style.display = "none";  
			}
			
			x[myIndex-1].style.display = "block";
		} 
	</script>

@endsection