@extends('app')

@section('header')
	<!-- Header / Home-->
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
	  <div class="w3-display-middle w3-text-white w3-center headerContent">
		<h1 class="w3-jumbo">Ashley & Tramaine</h1>
		<h2>Are getting married</h2>
		<h2><b>17.07.2017</b></h2>
	  </div>
	<span class="w3-text-white w3-display-bottommiddle"><i>- is it unconditional when the rarri don't start</i></span>
	</header>
@endsection

@section('about_us')
	<!-- About / Tramaine & Ashley -->
	<div class="w3-container w3-padding-64 w3-pale-red w3-grayscale-min" id="us">
		<div class="w3-content">			
			<h1 class="w3-jumbo w3-center">Registry</h1>
			<p class="w3-padding-16">We are lucky enough to already have a home filled with everything we need. But some of you have asked about gifts, and so instead of a traditional registry, we will be accepting monitary gift via PayPal. 

			If you wish, you can contribute towards our honeymoon and new life together as Mr & Mrs, please select one of the options below. </p>
		</div>
		<div class="w3-content">
			<div class="w3-left w3-padding" style="max-width:33.3%;">
				<img src="images/paypal_icon.png" class="w3-circle" style="width:100%" />
				<p class="w3-center w3-padding">This will be for PayPal</p>
			</div>
			<div class="w3-left w3-padding" style="max-width:33.3%">
				<img src="images/venmo.png" class="w3-circle" style="width:100%" />
				<p class="w3-center w3-padding">This will be for Option B</p>
			</div>
			<div class="w3-left w3-padding" style="max-width:33.3%">
				<img src="images/dino.jpg" class="w3-circle" style="width:100%" />
				<p class="w3-center w3-padding">This will be for Option C</p>
			</div>
		</div>
	</div>
@endsection

@section('wedding_information')
@endsection

@section('rsvp_information')
@endsection