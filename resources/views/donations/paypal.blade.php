@extends('app')

@section('addt_style')
	.bgimg {
		background-image: url("/images/bridalparty1.png");
		min-height: 30%;
	}
	.parallax-text {
		position: absolute;
		width: 100%;
	}
	h1.parallax-text {
		top: 20%;
		background: radial-gradient(circle, whitesmoke, rgba(245, 245, 245, 0.85), transparent 65%);
	}
	h3.parallax-text{
		top: 50%;
		background: radial-gradient(circle, whitesmoke, rgba(245, 245, 245, 0.85), transparent 65%);
	}
@endsection

@section('header')
	<!-- Header / Home-->	
	<div class="w3-display-container" style="height:300px;">
		<h1 class="w3-jumbo w3-display-topmiddle">Ashley</h1>
		<img class="w3-image w3-display-middle" src="/images/infinity1.png" style="max-height:150px">
		<h1 class="w3-jumbo w3-display-bottommiddle">Tramaine</h1>
	</div>
	<div class="section white" style="background: linear-gradient(#f5f8fa, white, white, white);">
		<div class="row container">
			<h2 class="header">Gifts</h2>
			<p class="grey-text text-darken-3 lighten-3">We will be taking gifts through PayPal....</p>
		</div>
	</div>
	<div class="parallax-container">
		<div class="parallax">
			<img src="/images/gift_dinner.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Nice Dinner</h1>
			{{-- <h3 class="parallax-text w3-center w3-xlarge">Fiji</h3> --}}
		</div>
	</div>
	<div class="section white">
		<div class="row container">
			<h2 class="header">Nice Dinner</h2>
			<p class="grey-text text-darken-3 lighten-3">I would like to donate to this cause for $25 <a href="https://www.paypal.me/actionjack/25" target="_blank" class="">Click Here</a></p>
		</div>
	</div>
	<div class="parallax-container">
		<div class="parallax">
			<img src="/images/gift_toronto.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Trip To Toronto</h1>
		</div>
	</div><div class="section white">
		<div class="row container">
			<h2 class="header">Trip To Toronto</h2>
			<p class="grey-text text-darken-3 lighten-3">I would like to donate to this cause for $50 <a href="https://www.paypal.me/actionjack/50" target="_blank" class="">Click Here</a></p>
		</div>
	</div>
	<div class="parallax-container">
		<div class="parallax">
			<img src="/images/gift_greece.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Trip To Greece</h1>
		</div>
	</div>
	<div class="section white">
		<div class="row container">
			<h2 class="header">Trip To Greece</h2>
			<p class="grey-text text-darken-3 lighten-3">I would like to donate to this cause for $75 <a href="https://www.paypal.me/actionjack/75" target="_blank" class="">Click Here</a></p>
		</div>
	</div>
	<div class="parallax-container">
		<div class="parallax"><img src="/images/at3.jpg"></div>
	</div>
@endsection

@section('footer')
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.parallax').parallax();
		});
	</script>
@endsection