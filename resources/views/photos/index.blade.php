@extends('layouts.app')

@section('header')
	@include('layouts.nav')
@endsection

@section('about_us')
	<!-- About / Tramaine & Ashley -->
	<div class="container photosPageContainer">
		@foreach ($photos as $photo)
			<img class="mySlides w3-animate-zoom w3-mobile rot{{ $photo->description }}" src="{{ $photo->name }}">
		@endforeach
		
		<button class="w3-button w3-black w3-display-left" onclick="plusPic(-1)">&#10094;</button>
		
		<button class="w3-button w3-black w3-display-right" onclick="plusPic(1)" style="">&#10095;</button>

		<div class="">
			{{ $photos->links() }}
			<div class="w3-center w3-padding">
				<p class="">Select the next number to see the next set of 15 pictures</p>
				<span id="imgCount" class=""></span>
			</div>
		</div>
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