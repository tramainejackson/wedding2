@extends('app')

@section('addt_style')
	.bgimg, .bgimg2 {
		min-height: 30%;
	}
	.row {
		margin-left: auto;
		margin-right: auto;
		margin-bottom: 20px;
	}
@endsection

@section('header')
	<!--- Header / Home --->
	<!--- <header class="w3-display-container" style="height:300px;">
		<h1 class="w3-jumbo w3-display-topmiddle">Ashley</h1>
		<img class="w3-image w3-display-middle" src="/images/infinity1.png" style="max-height:150px">
		<h1 class="w3-jumbo w3-display-bottommiddle">Tramaine</h1>
	</header> --->
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
		<div class="w3-display-middle w3-text-white w3-center headerContent">
			<h1 class="w3-jumbo">Registry</h1>
			<span class="w3-text-white w3-display-bottommiddle w3-hide-small"><i></i></span>
		</div>
	</header>
	<!--- <header class="w3-display-container" style="height:250px;">
		<h1 class="w3-jumbo w3-display-top" style="left:10%">Ashley</h1>
		<img class="w3-image w3-display-middle" src="/images/infinity1.png" style="max-height:150px">
		<h1 class="w3-jumbo w3-display-bottom" style="right:10%">Tramaine</h1>
	</header> --->
@endsection

@section('about_us')
	<!-- About / Tramaine & Ashley -->
	<div class="w3-container w3-padding-64 w3-pale-red w3-grayscale-min" id="us" style="background: linear-gradient(#f5f8fa, #ffdddd, #ffdddd, #ffdddd);">
		<div class="w3-content w3-cell-row hide-on-small-only">
			<div class="w3-container w3-cell w3-mobile">
				<p class="w3-center"><i><span class="w3-xxlarge">&#10077;</span><br/>We know its not traditional and not the way its done,<br/>but rather than a wedding list we'd love a bit of sun.<br/>So if you'd like to give a gift and send us on our way<br/>a donation to our honeymoon would really make our day.<br/><span class="w3-xxlarge">&#10078;</span></i></p>
			</div>
			<div class="w3-container w3-cell w3-cell-middle w3-mobile">
				<p class="w3-center"><i>OR</i></p>
			</div>
			<div class="w3-container w3-cell w3-mobile">
				<p class="w3-center"><i><span class="w3-xxlarge">&#10077;</span><br/>Our house has been filled with love and care,<br/>and is now full to the brim with no room to spare.<br/>If you were thinking of giving a gift, to help us on our way<br/>a monetary gift towards our new home, would really make our day.<br/><span class="w3-xxlarge">&#10078;</span></i></p>
			</div>
		</div>
		<div class="w3-content">			
			<p class="w3-padding-16">If you wish, you can contribute towards our honeymoon and new life together as Mr & Mrs, we will be accepting monetary gift via PayPal, Venmo, Cash, Money Order, or Check. If you're a millenial and prefer to send electronically, please select one of the options below. But if you are more traditional feel free to bring a card to the wedding, there will be a card station</p>
		</div>
		<div class="w3-content row">
			<div class="col offset-s4 s5 m4 l4 w3-padding">
				<div class="" style="height:350px">
					<img src="images/paypal_icon.png" class="w3-circle" style="width:100%;height:300px" />
				</div>
				<a href="{{ route('paypal') }}" class="">
					<p class="w3-center w3-padding regOptionP">If you have a PayPal account and would like to send a gift through PayPal, please click here.</p>
				</a>
			</div>
			<div class="col s12 divider hide-on-med-and-up"></div>
			<div class="col offset-s4 s5 m4 l4 w3-padding">
				<div class="" style="height:350px">
					<img src="images/venmo2.png" class="w3-circle" style="width:100%;height:300px" />
				</div>
				<a href="{{ route('venmo') }}" class="">
					<p class="w3-center w3-padding regOptionP">If you have a Venmo account and would like to send a gift through Venmo, please click here.</p>
				</a>
			</div>
			<div class="col s12 divider hide-on-med-and-up"></div>
			<div class="col offset-s4 s5 m4 l4 w3-padding">
				<div class="" style="height:350px">
					<img src="images/hallmark_envelope1.jpg" class="w3-circle" style="width:100%;height:300px" />
				</div>
				<p class="w3-center w3-padding regOptionP">If you would like to be traditional, we will have a card box station at the wedding and you're free to bring a card with you.</p>
			</div>
		</div>
	</div>
@endsection

@section('wedding_information')
@endsection

@section('rsvp_information')
@endsection