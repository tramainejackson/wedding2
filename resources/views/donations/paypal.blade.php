@extends('app')

@section('addt_style')
	.bgimg {
		min-height: 30%;
	}
@endsection

@section('header')
	<!-- Header / Home-->	
	<header class="w3-display-container" style="height:250px;">
		<h1 class="w3-jumbo w3-display-left" style="left:10%">Ashley</h1>
		<img class="w3-image w3-display-middle" src="/images/infinity1.png" style="max-height:150px">
		<h1 class="w3-jumbo w3-display-right" style="right:10%">Tramaine</h1>
	</header>
	<!-- <header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
		<div class="w3-display-middle w3-text-white w3-center headerContent">
			<h1 class="w3-jumbo">Gifts</h1>
			<span class="w3-text-white w3-display-bottommiddle w3-hide-small"><i></i></span>
		</div>
	</header> -->
	
	<!-- Gift ideas -->
	<div class="parallax-container">
		<div class="parallax hide-on-small-only">
			<img src="/images/gift_toronto.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Honeymoon</h1>
		</div>
		<div class="hide-on-med-and-up">
			<img src="/images/gift_toronto.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">Honeymoon</h1>
		</div>
	</div>
	<div class="section white">
		<div class="row container">
			<div class="col s6 m4 l4">
				<h2 class="header">Honeymoon</h2>
			</div>
			<div class="col s6 m4 l4" style="margin:20px 0px;">
				<div class="input-field" style="">
					<i class="material-icons prefix">attach_money</i>
					<input class="giftTotal w3-large" name="" type="number" min="25.00" placeholder="25.00" value="25.00" step="0.01"/>
					<label class="w3-large">Gift Amount</label>
				</div>
			</div>
			<div class="col s12">
				<p class="grey-text text-darken-3 lighten-3" style="">I would like to add to this gift of $<span class="amountDisplay">25</span> towards your honeymoon<br/><a href="https://www.paypal.me/actionjack/25" target="_blank" class="payPalAmount">Click Here To Continue</a></p>
			</div>
		</div>
	</div>
	<div class="parallax-container">
		<div class="parallax hide-on-small-only">
			<img src="http://www.awesomefloridahomes.com/florida-homes/w1-disney-castle.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">New Home</h1>
		</div>
		<div class="hide-on-med-and-up">
			<img src="http://www.awesomefloridahomes.com/florida-homes/w1-disney-castle.jpg">
			<h1 class="parallax-text w3-center w3-jumbo">New Home</h1>
		</div>
	</div>
	<div class="section white">
		<div class="row container">
			<div class="col s6 m4 l4" style="margin:20px 0px;">
				<h2 class="header" style="margin:0">New Home</h2>
			</div>
			<div class="col s6 m4 l4" style="margin:20px 0px;">
				<div class="input-field" style="">
					<i class="material-icons prefix">attach_money</i>
					<input class="giftTotal w3-large" name="" type="number" min="25.00" placeholder="25.00" value="25.00" step="0.01"/>
					<label class="w3-large">Gift Amount</label>
				</div>
			</div>
			<div class="col s12">
				<p class="grey-text text-darken-3 lighten-3" style="">I would like to add to this gift of $<span class="amountDisplay">25</span> towards a new home<br/><a href="https://www.paypal.me/actionjack/25" target="_blank" class="payPalAmount">Click Here To Continue</a></p>
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