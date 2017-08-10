@extends('app')

@section('addt_style')
	.bgimg {
		min-height: 30%;
	}
@endsection

@section('header')
	<!-- Header / Home-->	
	<!--- <header class="w3-display-container" style="height:300px;">
		<h1 class="w3-jumbo w3-display-topmiddle">Ashley</h1>
		<img class="w3-image w3-display-middle" src="/images/infinity1.png" style="max-height:150px">
		<h1 class="w3-jumbo w3-display-bottommiddle">Tramaine</h1>
	</header> --->
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
		<div class="w3-display-middle w3-text-white w3-center headerContent">
			<h1 class="w3-jumbo">Gifts</h1>
			<span class="w3-text-white w3-display-bottommiddle w3-hide-small"><i></i></span>
		</div>
	</header>
	
	<!-- Gift ideas -->
	<div class="section white" style="background: linear-gradient(#f5f8fa, white, white, white);">
		<div class="row container">
			<h2 class="header">Gifts</h2>
			<p class="grey-text text-darken-3 lighten-3">We will be accepting gifts through PayPal</p>
		</div>
	</div>
	<div class="parallax-container">
		<div class="parallax hide-on-small-only">
			<img src="/images/gift_dinner.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Nice Dinner</h1>
			{{-- <h3 class="parallax-text w3-center w3-xlarge">Fiji</h3> --}}
		</div>
		<div class="hide-on-med-and-up">
			<img src="/images/gift_dinner.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Nice Dinner</h1>
			{{-- <h3 class="parallax-text w3-center w3-xlarge">Fiji</h3> --}}
		</div>
	</div>
	<div class="section white">
		<div class="row container">
			<div class="col s6">
				<h2 class="header">Nice Dinner</h2>
			</div>
			<div class="col s6">
				<div class="input-field">
					<select class="giftTotal" name="">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
			</div>
			<div class="col s12">
				<p class="grey-text text-darken-3 lighten-3">I would like to add to this gift for $25 <a href="https://www.paypal.me/actionjack/25" target="_blank" class="payPalAmount">Click Here</a></p>
			</div>
		</div>
	</div>
	<div class="parallax-container">
		<div class="parallax hide-on-small-only">
			<img src="/images/gift_toronto.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Trip To Toronto</h1>
		</div>
		<div class="hide-on-med-and-up">
			<img src="/images/gift_toronto.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Trip To Toronto</h1>
		</div>
	</div>
	<div class="section white">
		<div class="row container">
			<div class="col s6">
				<h2 class="header">Trip To Toronto</h2>
			</div>
			<div class="col s6 input-field">
				<select class="giftTotal" name="">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
			<div class="col s12">
				<p class="grey-text text-darken-3 lighten-3">I would like to add to this gift for $50 <a href="https://www.paypal.me/actionjack/50" target="_blank" class="payPalAmount">Click Here</a></p>
			</div>
		</div>
	</div>
	<div class="parallax-container">
		<div class="parallax hide-on-small-only">
			<img src="/images/gift_greece.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Trip To Greece</h1>
		</div>
		<div class="hide-on-med-and-up">
			<img src="/images/gift_greece.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Trip To Greece</h1>
		</div>
	</div>
	<div class="section white">
		<div class="row container">
			<div class="col s6" style="margin:20px 0px;">
				<h2 class="header" style="margin:0">Trip To Greece</h2>
			</div>
			<div class="col s6" style="margin:20px 0px;">
				<div class="input-field" style="">
					<select class="giftTotal" name="">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
					<label>Total Gifts</label>
				</div>
			</div>
			<div class="col s12" style="margin:20px 0px;">
				<p class="grey-text text-darken-3 lighten-3">I would like to add to this gift for $100 <a href="https://www.paypal.me/actionjack/100" target="_blank" class="payPalAmount">Click Here</a></p>
			</div>
		</div>
	</div>
	<div class="parallax-container hide-on-small-only">
		<div class="parallax">
			<img src="/images/at3.jpg" />
		</div>
	</div>
@endsection

@section('footer')
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.parallax').parallax();
		});
	</script>
@endsection