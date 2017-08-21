@extends('app')

@section('addt_style')
	.bgimg {
		background-image: url("/images/bridalparty1.png");
		min-height: 65%;
	}
	.container.partyPage {
		background: linear-gradient(to right, floralwhite, #ffb07c, floralwhite, #c0fa8b, floralwhite);
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		background-attachment: fixed;
		margin-left: 0 !important;
		margin-right: 0 !important;
		width: 100%;
		max-width: initial;
		padding: 0% 15%;
		position: relative;
	}
	.partyHeader {
		background: linear-gradient(coral, rgba(255, 127, 80, 0.75), rgba(255, 127, 80, 0.5));
		border-radius: 10px;
	}
@endsection

@section('nav')
	<!-- Navbar (sticky bottom) -->
	<div class="w3-bottom w3-hide-small">
	  <div class="w3-bar w3-white w3-center w3-padding w3-opacity-min w3-hover-opacity-off">
		<a href="/" style="width:20%" class="w3-bar-item w3-button">Home</a>
		<a href="/#us" style="width:20%" class="w3-bar-item w3-button">Our Story</a>
		<a href="/#wedding" style="width:20%" class="w3-bar-item w3-button">Wedding</a>
		<a href="/party" style="width:20%" class="w3-bar-item w3-button w3-hover-black">Dream Team</a>
		<a href="/#rsvp" style="width:20%" class="w3-bar-item w3-button w3-hover-black">RSVP</a>
	  </div>
	</div>
@endsection

@section('header')
	<!-- Header / Home-->
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
	  <div class="w3-display-middle w3-text-white w3-center partyHeader w3-padding">
		<h1 class="w3-jumbo">Wedding Party</h1>
		<h5 class="">- been down since day one</h5>
	  </div>
	</header>

	<!--- Into to Party --->
	<div class="container partyPage">
		<div class="partyPageBgrd"></div>

		@for ($x = 0; $x < count($bridalParty); $x+=2)
		
			<!--- Matchup cards --->
			<div class="">
				<div class="row scrollfire{{$x}}" style="opacity:0;">
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
						<img src="images/flower2.png" class="middeleImg valign-wrapper w3-hide-small" />
						<img src="images/flower2.png" class="middeleImg valign-wrapper w3-hide-small" />
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
	<div id="getting-started"></div>
@endsection

@section('footer')
	<script type="text/javascript">
		$("body").on("click", ".material-icons", function(e) {
			var $this = $(this);
			var card = $this.parents(".card");
			
			if(card.find('.card-content').hasClass('hide-on-small-only')) {
				card.find('.card-content').removeClass('hide-on-small-only').slideDown();
			} else {
				card.find('.card-content').slideUp(function() {
					card.find('.card-content').addClass('hide-on-small-only')
				});				
			}
		});
		
		$("body").on("click", ".readMore", function(e) {
			var $this = $(this);
			var card = $this.parents(".card.large");
			
			$this.text("------ Read Less ------").removeClass("readMore").addClass("readLess");
			card.removeClass("large");
		});
		
		$("body").on("click", ".readLess", function(e) {
			var $this = $(this);
			var card = $this.parents(".card");
			
			$this.text("------ Read Less ------").addClass("readMore").removeClass("readLess");
			card.addClass("large");
		});
	</script>
@endsection