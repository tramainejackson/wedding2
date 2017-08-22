@extends('app')

@section('addt_style')
	.bgimg {
		min-height: 30%;
	}
@endsection

@section('header')
	<!-- Header / Home-->	
	<header class="w3-display-container" style="height:250px;">
		<h1 class="w3-jumbo w3-display-left" style="left:15%;color: black;font-family:'Lobster Two', cursive">Ashley</h1>
		<img class="w3-image w3-display-middle" src="/images/infinity1.png" style="max-height:150px">
		<h1 class="w3-jumbo w3-display-right" style="right:10%;color: black;font-family:'Lobster Two', cursive">Tramaine</h1>
	</header>
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min hide-on-med-and-up" id="home">
		<div class="w3-display-middle w3-text-white w3-center headerContent">
			<h1 class="w3-jumbo">Gifts</h1>
			<span class="w3-text-white w3-display-bottommiddle w3-hide-small"><i></i></span>
		</div>
	</header>
	
	<!-- Gift ideas -->
	<div class="section white" style="background: linear-gradient(#f5f8fa, white, white, white); padding: 0%;">
		<div class="row container">
			<h2 class="col offset-s1 offset-m1 offset-l1 s11 m11 l11 header">Gifts</h2>
			<p class="col offset-s1 offset-m1 offset-l1 s11 m5 l5 grey-text text-darken-3 lighten-3">We will be accepting gifts through PayPal. Please choose one of the gift options to contribute to and enter an amount. We are extremely thankful and appreciative of any and every blessing that comes our way.</p>
		</div>
	</div>
	<div class="parallax-container">
		<div class="parallax hide-on-small-only">
			<img src="/images/gift_greece.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Honeymoon</h1>
		</div>
		<div class="hide-on-med-and-up" style="background:white;">
			<img src="/images/gift_greece.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Honeymoon</h1>
			<span class="parallax-span">Greece</span>
		</div>
	</div>
	<div class="section white">
		<div class="row container">
			<div class="col offset-s1 offset-m1 offset-l1 s11 m4 l4">
				<h2 class="header">Honeymoon</h2>
				<h5 class="header">(Enter the amount you would like to give)</h5>
			</div>
			<div class="col s12 m4 l4" style="margin:20px 0px;">
				<div class="input-field" style="">
					<i class="material-icons prefix">attach_money</i>
					<input class="giftTotal w3-large" name="" type="number" min="0.00" value="0.00" step="0.01"/>
					<label class="w3-large">Gift Amount</label>
				</div>
			</div>
			<div class="col offset-s1 offset-m1 offset-l1 s11 m11 l11">
				<p class="grey-text text-darken-3 lighten-3" style="">I would like to add to this gift of $<span class="amountDisplay">0.00</span> towards your honeymoon<br/><a href="https://www.paypal.me/actionjack/25" target="_blank" class="payPalAmount">Click Here To Continue</a></p>
			</div>
		</div>
	</div>
	<div class="parallax-container" style="background-color:white; z-index: -1;">
		<div class="parallax hide-on-small-only">
			<img src="https://onepeterfive.com/wp-content/uploads/2014/08/suburb.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">New Home</h1>
		</div>
		<div class="hide-on-med-and-up" style="">
			<img src="https://onepeterfive.com/wp-content/uploads/2014/08/suburb.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">New Home</h1>
		</div>
	</div>
	<div class="section white">
		<div class="row container">
			<div class="col offset-s1 offset-m1 offset-l1 s11 m4 l4">
				<h2 class="header" style="margin:0">New Home</h2>
				<h5 class="header">(Enter the amount you would like to give)</h5>
			</div>
			<div class="col s12 m4 l4" style="margin:20px 0px;">
				<div class="input-field" style="">
					<i class="material-icons prefix">attach_money</i>
					<input class="giftTotal w3-large" name="" type="number" min="0.00" value="0.00" step="0.01"/>
					<label class="w3-large">Gift Amount</label>
				</div>
			</div>
			<div class="col offset-s1 offset-m1 offset-l1 s11 m11 l11">
				<p class="grey-text text-darken-3 lighten-3" style="">I would like to add to this gift of $<span class="amountDisplay">0.00</span> towards a new home<br/><a href="https://www.paypal.me/actionjack/25" target="_blank" class="payPalAmount">Click Here To Continue</a></p>
			</div>
		</div>
	</div>
	<!--- <div class="parallax-container hide-on-small-only">
		<div class="parallax">
			<img src="/images/at3.jpg" />
		</div>
	</div> --->
@endsection

@section('footer')
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.parallax').parallax();
		});
	</script>
@endsection