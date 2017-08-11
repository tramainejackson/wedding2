@extends('app')

@section('header')
	<!-- Header / Home-->
	<header class="w3-display-container" style="height:250px;">
		<h1 class="w3-jumbo w3-display-left" style="left:10%">Ashley</h1>
		<img class="w3-image w3-display-middle" src="/images/infinity1.png" style="max-height:150px">
		<h1 class="w3-jumbo w3-display-right" style="right:10%">Tramaine</h1>
	</header>
@endsection

@section('about_us')
	<div class="w3-container w3-padding-64 w3-pale-red w3-grayscale-min" id="us" style="background: linear-gradient(#f5f8fa, #ffdddd, #ffdddd, #ffdddd);">
		<div class="w3-content">			
			<h1 class="w3-jumbo w3-center">Registry</h1>
		</div>
		<div class="w3-content">
			<blockquote class="w3-leftbar w3-panel w3-light-grey">
				<i class="fa fa-quote-right w3-xxlarge"></i>
				<p class=""><i>We know its not traditional and not the way its done, but rather than a wedding list we'd love a bit of sun. So if you'd like to give a gift and send us on our way a donation to our honeymoon would really make our day.</i></p>
			</blockquote>
			<blockquote class="w3-leftbar w3-panel w3-light-grey">
				<i class="fa fa-quote-right w3-xxlarge"></i>
				<p class=""><i>Our house has been filled with love and care, and is now full to the brim with no room to spare. If you were thinking of giving a gift, to help us on our way, A monetary gift towards our new home, would really make our day.</i></p>
			</blockquote>
			<p class="w3-padding-16"><br/>If you wish, you can contribute towards our honeymoon and new life together as Mr & Mrs, please select one of the options below. For the millineials who likes to do things virtually, you can use PayPal or Venmo to send a gift. But if you are more traditional please feel free to bring a card to the wedding if you don't want to select one of the following options.</p><br/>
		</div>
		<div class="w3-content">
			<div class="w3-left w3-padding" style="max-width:33.3%;">
				<div class="" style="height:350px">
					<img src="images/paypal_icon.png" class="w3-circle" style="width:100%;height:300px" />
				</div>
				<a href="{{ route('paypal') }}" class="">
					<p class="w3-center w3-padding">If you have a PayPal account and would like to send a gift through PayPal, please click here.</p>
				</a>
			</div>
			<div class="w3-left w3-padding" style="max-width:33.3%">
				<div class="" style="height:350px">
					<img src="images/venmo2.png" class="w3-circle" style="width:100%;height:300px" />
				</div>
				<a href="{{ route('venmo') }}" class="">
					<p class="w3-center w3-padding">If you have a Venmo account and would like to send a gift through Venmo, please click here.</p>
				</a>
			</div>
			<div class="w3-left w3-padding" style="max-width:33.3%">
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