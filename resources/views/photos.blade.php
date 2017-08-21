@extends('app')

@section('addt_style')
	.bgimg, .bgimg2 {
		min-height: 30%;
	}
@endsection

@section('header')
	<!-- Header / Home-->
	<!--- <header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
		<div class="w3-display-middle w3-text-white w3-center headerContent">
			<h1 class="w3-jumbo">Photo Gallery</h1>
			<span class="w3-text-white w3-display-bottommiddle w3-hide-small"><i>- same entourage no extra faces</i></span>
		</div>
	</header> --->
	<!--- <header class="w3-display-container" style="height:300px;background: linear-gradient(white, white, #ffb07c);">
		<h1 class="w3-jumbo w3-display-topmiddle" style="">Ashley</h1>
		<img class="w3-image w3-display-middle" src="/images/infinity1.png" style="max-height:150px">
		<h1 class="w3-jumbo w3-display-bottommiddle" style="">Tramaine</h1>
	</header> --->
	<header class="w3-display-container" style="height:250px;background: url(/images/map.jpg);">
		<h1 class="w3-jumbo w3-display-left" style="left:15%;color: black;">Ashley</h1>
		<img class="w3-image w3-display-middle" src="/images/infinity1.png" style="max-height:150px">
		<h1 class="w3-jumbo w3-display-right" style="right:10%;color: black;">Tramaine</h1>
	</header>
	<div class="">
		<h3 class="w3-center w3-text-black w3-padding-32 w3-xxlarge" style="font-family:'Sedgwick Ave Display', cursive; margin:0;background: linear-gradient(#f5f8fa 20%, #ffb07c, #ffb07c);">Squad Goals</h3>
	</div>
@endsection

@section('about_us')
	<!-- About / Tramaine & Ashley -->
	<div class="w3-display-container photosPageContainer">
		@foreach ($photos as $photo)
			<img class="mySlides w3-animate-zoom w3-mobile rot{{ $photo->description }}" src="{{ $photo->name }}">
		@endforeach
		<button class="w3-button w3-black w3-display-left" onclick="plusPic(-1)">&#10094;</button>
		<button class="w3-button w3-black w3-display-right" onclick="plusPic(1)" style="">&#10095;</button>
	</div>
	<div class="w3-text-black" style="text-align:center; background: linear-gradient(#a4bf20, #a4bf20, #ffb16d);">
		{{ $photos->links() }}
		<div class="w3-center w3-padding">
			<p class="">Select the next number to see the next set of 15 pictures</p>
			<span id="imgCount" class=""></span>
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