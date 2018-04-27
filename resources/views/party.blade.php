@extends('layouts.app')

@section('addt_style')
	.bgimg {
		background-image: url("/images/bridalparty1.png");
		min-height: 65%;
		background-position: center center;
		background-size: cover;
	}
@endsection

@section('header')
	<!-- Header / Home-->
	<header class="view bgimg" id="home">
		<div class="mask flex-column flex-center rgba-black-light">
			<div class="partyHeader white-text text-center px-3">
				<h1 class="display-3">Wedding Party</h1>
				<h5 class="">- been down since day one</h5>
			</div>
		</div>
	</header>

	<!--- Into to Party --->
	<div class="partyPage">
		<div id="partyPageBgrd"></div>

		@for ($x = 0; $x < count($bridalParty); $x+=2)
		
			<!--- Matchup cards --->
			<div class="container wow fadeInUp">
				<div class="row">
					<div class="col s15 m5 l5 w3-hide-small">
						<h2 class="center-align">{{ $bridalParty[$x]->title }}</h2>
					</div>
					<div class="col s2 m2 l2 w3-hide-small"><span>&nbsp;</span></div>
					<div class="col s5 m5 l5 w3-hide-small">
						<h2 class="center-align">{{ $bridalParty[$x+1]->title }}</h2>
					</div>
					<div class="col s12 m5 l5">
						<div class="card large">
							<div class="card-image">
								<img src="{{ $bridalParty[$x]->image }}" class="responsive-image" />
								<span class="card-title w3-mobile">{{ $bridalParty[$x]->name }}</span>
								<span class="card-title-top w3-mobile hide-on-med-and-up">{{ $bridalParty[$x]->title }}</span>
								<span class="w3-right btn btn-floating pulse hide-on-med-and-up" style="width: initial;height: initial;padding: 2px 5px;margin-top: -50px;margin-right: 15px;"><i class="material-icons">more_vert</i></span>
							</div>
							<div class="card-content hide-on-small-only">
								<p class="">{{ $bridalParty[$x]->blurb }}</p>
							</div>
							<div class="card-action hide-on-small-only">
								<p class="w3-center readMore">------ Read More ------</p>
							</div>
						</div>
					</div>
					<div class="col s2 m2 l2">
						<!--- <img src="images/flower2.png" class="middeleImg valign-wrapper w3-hide-small" /> 
						<img src="images/flower2.png" class="middeleImg valign-wrapper w3-hide-small" /> --->
					</div>
					<div class="col s12 m5 l5">
						<div class="card large">
							<div class="card-image">
								<img src="{{ $bridalParty[$x+1]->image }}" class="responsive-image" />
								<span class="card-title w3-mobile">{{ $bridalParty[$x+1]->name }}</span>
								<span class="card-title-top w3-mobile hide-on-med-and-up">{{ $bridalParty[$x+1]->title }}</span>
								<span class="w3-right btn btn-floating pulse hide-on-med-and-up" style="width: initial;height: initial;padding: 2px 5px;margin-top: -50px;margin-right: 15px;"><i class="material-icons">more_vert</i></span>
							</div>
							<div class="card-content hide-on-small-only">
								<p class="">{{ $bridalParty[$x+1]->blurb }}</p>
							</div>
							<div class="card-action hide-on-small-only">
								<p class="w3-center readMore">------ Read More ------</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="divider"></div>
		@endfor
	</div>
@endsection

@section('about_us')
@endsection

@section('wedding_information')
@endsection

@section('rsvp_information')
@endsection

@section('footer')
@endsection