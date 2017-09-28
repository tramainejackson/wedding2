@extends('layouts.app')

@section('addt_style')
	.bgimg {
		min-height: 30%;
	}
	
	header:after {
		content: "";
		display: block;
		position: fixed;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		z-index: -10;
		background: url(/images/map3.jpg) no-repeat center center;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
@endsection

@section('header')
	<!-- Header / Home-->
	@component('layouts.nav')
	@endcomponent

	<!-- Gift ideas -->
	<div class="container-fluid white" style="background: linear-gradient(#f5f8fa, white, white, white); padding: 2%;">
		<div class="">
			<h2 class="header">Gifts</h2>
			<p class="grey-text text-darken-3 lighten-3">We will be accepting gifts through PayPal. Please choose one of the gift options to contribute to and enter an amount. We are extremely thankful and appreciative of any and every blessing that comes our way.</p>
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
	<div class="parallax-container" style="">
		<div class="parallax hide-on-small-only">
			<img src="https://onepeterfive.com/wp-content/uploads/2014/08/suburb.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">New Home</h1>
		</div>
		<div class="hide-on-med-and-up" style="">
			<img src="https://onepeterfive.com/wp-content/uploads/2014/08/suburb.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">New Home</h1>
		</div>
	</div>
	<div class="section white" style="margin-top: -35px;">
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
