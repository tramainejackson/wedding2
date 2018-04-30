@extends('layouts.app')

@section('header')
	@include('layouts.header')
@endsection

@section('about_us')
	<!-- Photos Header -->
	<div class="container text-center">
		<div class="row">
			<h2 class="h2-responsive m-0 py-3 w-100" style="font-family:'Lobster Two', cursive; background: linear-gradient(rgba(245, 248, 250, 0.85), rgba(255, 176, 124, 0.9));">Squad Goals</h2>
		</div>
	</div>
	
	<!-- Photos -->
	<div class="container photosPageContainer position-relative">
		@foreach ($photos as $photo)
			<img class="mySlides w3-animate-zoom w3-mobile rot{{ $photo->description }}" src="{{ $photo->name }}">
		@endforeach
		
		<a class="btn btn-floating position-absolute middle left blue-gradient" onclick="plusPic(-1)"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
		
		<a class="btn btn-floating position-absolute middle right blue-gradient" onclick="plusPic(1)" style=""><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>

	</div>

	<!-- Photos Paginator -->
	<div class="container" style="text-align:center; background: linear-gradient(rgba(255, 176, 124, 0.9), rgba(255, 176, 124, 0.9), rgba(245, 248, 250, 0.9));">
		{{ $photos->links() }}
		<div class="">
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