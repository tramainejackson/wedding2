@extends('layouts.app')

@section('header')
	@include('layouts.header')
@endsection

@section('about_us')
	<!-- Modal for Accommodations -->
	<div class="modal fade" id="accommodations_page_modal">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background: darkred; color: whitesmoke;">
					<div class="">
						<h2 class="w3-padding">Room Block</h2>
					</div>
					<span class="fa fa-close white-text" data-dismiss="modal" aria-label="Close"></span>
				</div>
				<div class="modal-body">
					<div class="text-center">
						<h2 class="">There is a block of rooms reserved for a discounted rate of $119.00 a night at the hotel listed below.</h2>
						<p class="" style="color:darkred;">**Block Is Under The Clark and Jackson Wedding Party**</p>
					</div>
					<div class="text-center">
						<h2 class="">Wingate by Wyndham Hotel</h2>
						<h3 class=""><i>(856) 627-1000</i></h3>
						<h4 class=""><a href="http://www.wingatehotels.com" target="_blank" class="">www.wingatehotels.com</a></h4>
						<h5 class="">(4.5 miles)</h5>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Accommodations -->
	<div class="container accommodationsPage">
		<div class="row pt-5">
			<div class="col-12">
				<h1 class="text-center display-3 text-truncate" style="margin-bottom:0">Guest</h1>
			</div>
			<div class="col-12">
				<h1 class="text-center display-3 text-truncate">Accommodations</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<h1 class="text-center hotelHeader display-4">Hotels</h1>
			</div>
		</div>
		<div class="row">	
			<div class="col-12 col-lg-4 text-center py-4">
				<h2 class="">Fairfield Inn & Suites by Marriott Mt. Laurel</h2>
				<h3 class=""><i>(856) 642-0600</i></h4>
				<h4 class=""><a href="http://www.fairfieldinn.com/phlfm" target="_blank" class="">www.fairfieldinn.com/phlfm</a></h4>
				<h5 class="">(10.7 miles)</h5>
			</div>
			<div class="col-12 col-lg-4 text-center py-4">
				<h2 class="">Hampton Inn Cherry Hill/Voorhees</h2>
				<h3 class=""><i>(856) 346-4500</i></h3>
				<h4 class=""><a href="http://hamptoninn3.hilton.com/en/hotels/new-jersey/hampton-inn-philadelphia-voorhees-VORHEHX/index.html" target="_blank" class="">www.hamptonvoorhees.com</a></h4>
				<h5 class="">(4.3 miles)</h5>
			</div>
			<div class="col-12 col-lg-4 text-center py-4">
				<h2 class="">SpringHill Suites by Marriott Voorhees Mt. Laurel Cherry Hill</h2>
				<h3 class=""><i>(856) 782-2555</i></h3>
				<h4 class=""><a href="http://www.marriott.com/PHLVO" target="_blank" class="">www.marriott.com/PHLVO</a></h4>
				<h5 class="">(4.8 miles)</h5>
			</div>
			<div class="col-12 col-lg-5 text-center py-4 mx-auto">
				<h2 class="">Staybridge Suites Philadelphia – Mt. Laurel</h2>
				<h3 class=""><i>(856) 722-1900</i></h3>
				<h4 class=""><a href="http://www.staybridge.com/mtlaurel" target="_blank" class="">www.staybridge.com/mtlaurel</a></h4>
				<h5 class="">(10.1 miles)</h5>
			</div>
			<div class="col-12 col-lg-5 text-center py-4 mx-auto">
				<h2 class=" w3-padding">Wingate by Wyndham Hotel</h2>
				<h3 class=""><i>(856) 627-1000</i></h3>
				<h4 class=""><a href="http://www.wingatehotels.com" target="_blank" class="">www.wingatehotels.com</a></h4>
				<h5 class="">(4.5 miles)</h5>
			</div>
		</div>
	</div>
@endsection

@section('wedding_information')
	<!-- Directions -->
	<div class="container accommodationsPage">
		<div class="row directionsDiv text-center">
			<div class="col-12">
				<h1 class="display-3">Directions</h1>
			</div>
			<div class="col-12">
				<h3 class="">81 West White Horse Pike, Berlin, NJ 08009</h1>
			</div>
		</div>
		<div class="row">	
			<div class="col-12 col-lg-8 text-center mx-auto my-4">
				<h2 class="pb-3"><u>From Philadelphia:</u></h2>
				<h3 class=""><i>Walt Whitman or Ben Franklin Bridges to Interstate 295 North. Follow Interstate 295 North to Exit 29A (Rte. 30 E). Stay on Route 30 East for approximately 9 miles. Lucien’s Manor is on the right.</i></h4>
			</div>
			<div class="col-12 col-lg-8 text-center mx-auto my-4">
				<h2 class="pb-3"><u>From Washington & Points South:</u></h2>
				<h3 class=""><i>195 North to 1295 North. Follow 295 N to Exit 29A (Rt. 30 East). Stay on Route 30 East for approximately 9 miles. Lucien’s manor is on the right.</i></h3>
			</div>
			<div class="col-12 col-lg-8 text-center mx-auto my-4">
				<h2 class="pb-3"><u>From New York & Points North:</u></h2>
				<h3 class=""><i>Take the New Jersey Turnpike South to Exit 4. Follow sings to Route 73 South. Follow 73 south for approx 8 miles to Franklin Avenue. Make a right on Franklin Avenue. At the second traffic light make a left onto Route 30 E. Lucien’s Manor is 1/4 mile on the right.</i></h3>
			</div>
		</div>
	</div>
@endsection