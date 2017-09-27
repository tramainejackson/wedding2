@extends('layouts.app')

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
<div class="bgrdImage" style="background: url(/images/map3.jpg); background-repeat: no-repeat; background-position: center center; background-size: 100% 100%; background-attachment: fixed; padding: 0% 5%;">
	<img src="/images/compass.png" class="countdownCompas hide-on-small-only" />
	<div id="getting-started" class="hide-on-small-only"><span id="countdownClock"></span></div>
	
	<!--- Header / Home --->
	@component('layouts.nav')
	@endcomponent
@endsection

@section('about_us')
	<!-- Registry -->
	<div class="w3-container w3-padding-64" id="us" style="background: linear-gradient(rgba(245, 248, 250, 0.85), #ffb07c, rgba(245, 248, 250, 0.85));color:black;">
		<div class="">
			<h1 class="w3-jumbo w3-center">Registry</h1>
		</div>
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
		<div class="w3-content w3-cell-row hide-on-med-and-up">
			<div class="w3-container w3-cell w3-mobile">
				<p class="w3-center"><i><span class="left w3-xxlarge">&#10077;</span><br/><br/>We know its not traditional and not the way its done, but rather than a wedding list we'd love a bit of sun. So if you'd like to give a gift and send us on our way a donation to our honeymoon would really make our day.<br/><span class="right w3-xxlarge">&#10078;</span></i></p>
			</div>
			<div class="w3-container w3-cell w3-cell-middle w3-mobile">
				<p class="w3-center"><i>OR</i></p>
			</div>
			<div class="w3-container w3-cell w3-mobile">
				<p class="w3-center"><i><span class="left w3-xxlarge">&#10077;</span><br/><br/>Our house has been filled with love and care, and is now full to the brim with no room to spare. If you were thinking of giving a gift, to help us on our way a monetary gift towards our new home, would really make our day.<br/><span class="right w3-xxlarge">&#10078;</span></i></p>
			</div>
		</div>

		<div class="w3-content">			
			<p class="w3-padding-16">If you wish, you can contribute towards our honeymoon and new life together as Mr & Mrs, we will be accepting monetary gift via PayPal, Cash, Money Order, or Check. If you're a millenial and prefer to send electronically, please select one of the options below. But if you are more traditional feel free to bring a card to the wedding, there will be a card station</p>
		</div>
		<div class="w3-content row">
			<div class="col s12 m6 l6 w3-padding">
				<a href="{{ route('paypal') }}" class="">
					<div class="" style="height:350px">
						<img src="images/paypal_icon.png" class="w3-circle mobLogo" style="height:300px; margin: 0 auto; display: -webkit-box; display: block;" />
					</div>
					<div class="">
						<p class="w3-center w3-padding regOptionP">If you have a PayPal account and would like to send a gift through PayPal, please click here.</p>
					</div>
				</a>
			</div>
			<div class="col s12 divider hide-on-med-and-up"></div>
			<div class="col s12 m6 l6 w3-padding">
				<div class="" style="height:350px">
					<img src="images/hallmark_envelope1.jpg" class="w3-circle mobLogo" style="height:300px; width: 300px; margin: 0 auto; display: -webkit-box; display: block;" />
				</div>
				<div class="">
					<p class="w3-center w3-padding regOptionP">If you would like to be traditional, we will have a card box station at the wedding and you're free to bring a card with you.</p>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('wedding_information')
@endsection

@section('rsvp_information')
@endsection