@extends('app')

@section('header')
	<!-- Header / Home-->
	<header class="w3-display-container" style="height:300px;">
		<h1 class="w3-jumbo w3-display-topmiddle">Ashley</h1>
		<img class="w3-image w3-display-middle" src="/images/infinity1.png" style="max-height:150px">
		<h1 class="w3-jumbo w3-display-bottommiddle">Tramaine</h1>
	</header>
@endsection

@section('about_us')
	<!-- About / Tramaine & Ashley -->
	<div class="w3-container w3-padding-64 w3-pale-red w3-grayscale-min" id="us" style="background: linear-gradient(#f5f8fa, #ffdddd, #ffdddd, #ffdddd);">
		<div class="w3-content">			
			<h1 class="w3-jumbo w3-center">Registry</h1>
			<p class="w3-padding-16">We are lucky enough to already have a home filled with everything we need. But some of you have asked about gifts, and so instead of a traditional registry, we will be accepting monitary gift via PayPal, Venmo, or Check.<br/><br/>If you wish, you can contribute towards our honeymoon and new life together as Mr & Mrs, please select one of the options below. Please feel free to bring a card to the wedding if you don't want to select on of the following options.</p>
		</div>
		<div class="w3-content row">
			<div class="col offset-s3 s6 m4 l4 w3-padding">
				<div class="" style="height:350px">
					<img src="images/paypal_icon.png" class="w3-circle" style="width:100%;height:300px" />
				</div>
				<a href="{{ route('paypal') }}" class="">
					<p class="w3-center w3-padding">If you have a PayPal account and would like to send a gift through PayPal, please click here.</p>
				</a>
			</div>
			<div class="col offset-s3 s6 m4 l4 w3-padding">
				<div class="" style="height:350px">
					<img src="images/venmo2.png" class="w3-circle" style="width:100%;height:300px" />
				</div>
				<a href="{{ route('venmo') }}" class="">
					<p class="w3-center w3-padding">If you have a Venmo account and would like to send a gift through Venmo, please click here.</p>
				</a>
			</div>
			<div class="col offset-s3 s6 m4 l4 w3-padding">
				<div class="" style="height:350px">
					<img src="images/hallmark_envelope1.jpg" class="w3-circle" style="width:100%;height:300px" />
				</div>
				<p class="w3-center w3-padding">If you would like to be traditional, we will have a card box station at the wedding and you're free to bring a card with you.</p>
			</div>
		</div>
	</div>
@endsection

@section('wedding_information')
@endsection

@section('rsvp_information')
@endsection