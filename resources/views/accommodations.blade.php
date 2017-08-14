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
			<h1 class="w3-jumbo">Guest Accommodations</h1>
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
	<!-- Accommodations -->
	<div class="w3-container w3-padding-64 w3-pale-red w3-grayscale-min" id="us" style="background: linear-gradient(#f5f8fa, #ffdddd, #ffdddd, #ffdddd);">
		<div class="w3-content">
			<h1 class="w3-center w3-jumbo" style="border-bottom: solid 1px; margin: 0% 20% 5%; padding: 2% 0%;">Hotels</h1>
		</div>
		<div class="row">	
			<div class="col s4 m4 l4 w3-padding">
				<h2 class="w3-center">Fairfield Inn & Suites by Marriott Mt. Laurel</h2>
				<h3 class="w3-center"><i>(856) 642-0600</i></h4>
				<h4 class="w3-center"><a href="www.fairfieldinn.com/phlfm" class="">www.fairfieldinn.com/phlfm</a></h4>
			</div>
			<div class="col s4 m4 l4 w3-padding">
				<h2 class="w3-center">Hampton Inn Cherry Hill/Voorhees</h2>
				<h3 class="w3-center"><i>(856) 346-4500</i></h3>
				<h4 class="w3-center"><a href="www.hamptonvoorhees.com" class="">www.hamptonvoorhees.com</a></h4>
			</div>
			<div class="col s4 m4 l4 w3-padding">
				<h2 class="w3-center">SpringHill Suites by Marriott Voorhees Mt. Laurel Cherry Hill</h2>
				<h3 class="w3-center"><i>(856) 782-2555</i></h3>
				<h4 class="w3-center"><a href="www.marriott.com/PHLVO" class="">www.marriott.com/PHLVO</a></h4>
			</div>
			<div class="col offset-s6 offset-m4 m4 offset-l2 l4 w3-padding">
				<h2 class="w3-center">Staybridge Suites Philadelphia – Mt. Laurel</h2>
				<h3 class="w3-center"><i>(856) 722-1900</i></h3>
				<h4 class="w3-center"><a href="www.staybridge.com/mtlaurel" class="">www.staybridge.com/mtlaurel</a></h4>
			</div>
			<div class="col s6 offset-m4 m4 l4 w3-padding">
				<h2 class="w3-center w3-padding">Wingate by Wyndham Hotel</h2>
				<h3 class="w3-center"><i>(856) 627-1000</i></h3>
				<h4 class="w3-center"><a href="www.wingatehotels.com" class="">www.wingatehotels.com</a></h4>
			</div>
		</div>
	</div>
@endsection

@section('wedding_information')
	<!-- Directions -->
	<div class="w3-container w3-padding-64 w3-pale-red w3-grayscale-min" id="us" style="background: linear-gradient(#f5f8fa, #ffdddd, #ffdddd, #ffdddd);">
		<div class="w3-content" style="border-bottom: solid 1px; margin: 0% 20% 5%; padding: 2% 0%;">
			<h1 class="w3-center w3-jumbo">Directions</h1>
			<h3 class="w3-center">81 West White Horse Pike, Berlin, NJ 08009</h1>
		</div>
		<div class="row">	
			<div class="col s12 m12 l12 w3-padding-24">
				<h2 class="w3-center">From Philadelphia:</h2>
				<h3 class="w3-center"><i>Walt Whitman or Ben Franklin Bridges to Interstate 295 North. Follow Interstate 295 North to Exit 29A (Rte. 30 E). Stay on Route 30 East for approximately 9 miles. Lucien’s Manor is on the right.</i></h4>
			</div>
			<div class="col s12 m12 l12 w3-padding-24">
				<h2 class="w3-center">From Washington & Points South:</h2>
				<h3 class="w3-center"><i>195 North to 1295 North. Follow 295 N to Exit 29A (Rt. 30 East). Stay on Route 30 East for approximately 9 miles. Lucien’s manor is on the right.</i></h3>
			</div>
			<div class="col s12 m12 l12 w3-padding-24">
				<h2 class="w3-center">From New York & Points North:</h2>
				<h3 class="w3-center"><i>Take the New Jersey Turnpike South to Exit 4. Follow sings to Route 73 South. Follow 73 south for approx 8 miles to Franklin Avenue. Make a right on Franklin Avenue. At the second traffic light make a left onto Route 30 E. Lucien’s Manor is 1/4 mile on the right.</i></h3>
			</div>
		</div>
	</div>
@endsection

@section('rsvp_information')
@endsection