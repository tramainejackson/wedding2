@extends('layouts.app')

@section('header')	
	@include('layouts.header')
@endsection

@section('addt_script')	
	<script type="text/javascript">
		$('body').on('keyup', 'input#hm_gift_amount', function() {
			var inputAmount = $(this).val();
			
			// Change the paypal.me link to reflect the amount
			// of the input
			$(this).parents('.col').next().find('a').attr('href', 'https://www.paypal.me/actionjack/' + inputAmount);
			
			// Change the display amount to reflect the amount
			// of the input
			$('#hm_amount_display').text(inputAmount);
		});
		
		$('body').on('keyup', 'input#nh_gift_amount', function() {
			var inputAmount = $(this).val();
			
			// Change the paypal.me link to reflect the amount
			// of the input
			$(this).parents('.col').next().find('a').attr('href', 'https://www.paypal.me/actionjack/' + inputAmount);
			
			// Change the display amount to reflect the amount
			// of the input
			$('#nh_amount_display').text(inputAmount);
		});
	</script>
@endsection

@section('about_us')
	<!-- Gift ideas -->
	<div class="container-fluid white">
		<div class="row px-lg-5">
			<div class="col p-5">
			<h1 class="h1-responsive text-center text-lg-left px-lg-5">Gifts</h2>
			<p class="m-0 px-lg-5">We will be accepting gifts through PayPal. Please choose one of the gift options to contribute to and enter an amount. We are extremely thankful and appreciative of any and every blessing that comes our way.</p>
			</div>
		</div>
	</div>
	
	<div class="view giftsView hmGift wow fadeInDownBig">
		<img src="/images/gift_greece.jpg" class="img-fluid d-none d-xl-block" alt="">
		<div class="mask flex-center">
			<div class="rgba-white-strong col-12 col-md-10 col-lg-6 wow slideInRight">
				<h1 class="display-3 text-center py-4 coolText2">Honeymoon</h1>

				<div class="col mb-4">
					<h2 class="h2-responsive">I would like to add to this gift of $<span id="hm_amount_display">0.00</span> towards your honeymoon</h2>
					<h4 class="h4-responsive">(Enter the amount you would like to give)</h4>
				</div>
				
				<div class="col">
					<label for="hm_gift_amount">Gift Amount</label>
					<div class="md-form input-group mt-0">
						<div class="input-group-prepend">
							<i class="fa fa-dollar input-group-text" id="" aria-hidden="true"></i>
						</div>
						
						<input class="giftTotal form-control" id="hm_gift_amount" name="" type="number" min="25" placeholder="Enter Gift Amount" />
					</div>
				</div>
				
				<div class="col">
					<a href="https://www.paypal.me/actionjack/25" target="_blank" class="payPalAmount btn btn-link btn-outline-cyan mx-0">Click Here To Continue</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section white">
		<div class="row">
			<div class="col">
				<h1 class="h1-responsive text-center my-5 py-5">OR</h1>
			</div>
		</div>
	</div>
	<div class="view giftsView nhGift wow fadeInDownBig">
		<img src="https://onepeterfive.com/wp-content/uploads/2014/08/suburb.jpg" class="img-fluid d-none d-xl-block" alt="">
		<div class="mask flex-center">
			<div class="rgba-white-strong col-12 col-md-10 col-lg-6 wow slideInLeft">
				<h1 class="display-3 text-center py-4 coolText2">New Home</h1>

				<div class="col mb-4">
					<h2 class="h2-responsive">I would like to give a gift of $<span id="nh_amount_display">0.00</span> towards your new home</h2>
					<h4 class="h4-responsive">(Enter the amount you would like to give)</h4>
				</div>
				
				<div class="col">
					<label for="hm_gift_amount">Gift Amount</label>
					<div class="md-form input-group mt-0">
						<div class="input-group-prepend">
							<i class="fa fa-dollar input-group-text" id="" aria-hidden="true"></i>
						</div>
						
						<input class="giftTotal form-control" id="nh_gift_amount" name="" type="number" min="25" placeholder="Enter Gift Amount" />
					</div>
				</div>
				
				<div class="col">
					<a href="https://www.paypal.me/actionjack/25" target="_blank" class="payPalAmount btn btn-link btn-outline-cyan mx-0">Click Here To Continue</a>
				</div>
			</div>
		</div>
	</div>
@endsection