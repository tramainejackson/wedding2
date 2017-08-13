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
		<div class="w3-content">			
			<p class="w3-padding-16">We are lucky enough to already have a home filled with everything we need. But some of you have asked about gifts, and so instead of a traditional registry, we will be accepting monetary gift via PayPal, Venmo, Cash, Money Order, or Check.<br/><br/>If you wish, you can contribute towards our honeymoon and new life together as Mr & Mrs, please select one of the options below. Please feel free to bring a card to the wedding if you don't want to select one of the following options.</p>
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