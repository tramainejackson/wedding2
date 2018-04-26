@extends('layouts.app')

@section('header')
	@include('layouts.nav')
@endsection

@section('about_us')
	<!-- Registry -->
	<div class="container registryPage">
		<div class="row pt-5">
			<div class="col-12 text-center">
				<h1 class="display-3">Registry</h1>
			</div>
		</div>
		
		<!-- Registry Poems -->
		<div class="row align-items-center justify-content-around my-5">
			<div class="col-5">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 text-left leftQuote">
							<i class="fa fa-3x fa-quote-left" aria-hidden="true"></i>
						</div>
						<div class="col-10 text-justify mx-auto px-5">
							<i>We know its not traditional and not the way its done,<br/>but rather than a wedding list we'd love a bit of sun.<br/>So if you'd like to give a gift and send us on our way<br/>a donation to our honeymoon would really make our day</i>
						</div>
						<div class="col-12 text-right rightQuote">
							<i class="fa fa-3x fa-quote-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-5">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 text-left leftQuote">
							<i class="fa fa-3x fa-quote-left" aria-hidden="true"></i>
						</div>
						<div class="col-10 text-justify mx-auto px-5">
							<i>Our house has been filled with love and care,<br/>and is now full to the brim with no room to spare.<br/>If you were thinking of giving a gift, to help us on our way<br/>a monetary gift towards our new home, would really make our day.</i>
						</div>
						<div class="col-12 text-right rightQuote">
							<i class="fa fa-3x fa-quote-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">			
			<h3 class="col-10 mx-auto h3-responsive">If you wish, you can contribute towards our honeymoon and new life together as Mr & Mrs, we will be accepting monetary gift via PayPal, Cash, Money Order, or Check. If you're a millenial and prefer to send electronically, please select one of the options below. But if you are more traditional feel free to bring a card to the wedding, there will be a card station</h3>
		</div>
		
		<!-- Registry gifts info -->
		<div class="row">
			<div class="col-4 mx-auto my-5">
				<a href="{{ route('paypal') }}" class="">
					<div class="regOptionDiv">
						<img src="images/paypal_icon.png" class="img-fluid z-depth-1 rounded-circle" />
					</div>
					<div class="">
						<p class="text-center w3-padding regOptionP">If you have a PayPal account and would like to send a gift through PayPal, please click here.</p>
					</div>
				</a>
			</div>
			
			<div class="col divider d-block d-md-none"></div>
			
			<div class="col-4 mx-auto my-5">
				<div class="regOptionDiv">
					<img src="images/hallmark_envelope1.jpg" class="img-fluid z-depth-1 rounded-circle" />
				</div>
				<div class="">
					<p class="text-center w3-padding regOptionP">If you would like to be traditional, we will have a card box station at the wedding and you're free to bring a card with you.</p>
				</div>
			</div>
		</div>
	</div>
@endsection