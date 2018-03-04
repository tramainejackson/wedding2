@extends('layouts.app')

@section('header')
	@if(session('status'))
		<!-- RSVP Confirmation modal -->
		  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding:32px;max-width:600px" id="confirmation_modal">
			<div class="w3-container w3-white w3-center">
			  <h1 class="w3-wide">{{ session('status') }}</h1>
			</div>
			<span onclick="document.getElementById('confirmation_modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
		  </div>
	@endif
	
	@unless (Auth::check())
		<a href="/login" style="position:absolute;z-index:2;background:transparent;right:20px;" class="w3-btn w3-large w3-hide-small">Login</a>
	@endif

	<!-- Header / Home-->
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
	  <div class="w3-display-middle w3-text-white w3-center headerContent">
		<h1 class="w3-jumbo">Ashley & Tramaine</h1>
		<h2>Are getting married</h2>
		<h2><b>08.26.2018</b></h2>
		<div id="home_countdown" class="hide-on-small-only"><span id="countdownClock"></span></div>
	  </div>
	<span class="w3-text-white w3-display-bottommiddle w3-hide-small"><i>- I'm only asking for a couple of forevers</i></span>
	</header>
@endsection

@section('about_us')
	<!-- About / Tramaine & Ashley -->
	<div class="w3-container w3-padding-64 usMobile" id="us" style="color:#fff;background: url(/images/map5.jpg); background-size: cover; background-position: center center; background-repeat: no-repeat; background-attachment: fixed; color: black;">
	<div class="w3-display-container w3-wide w3-margin scrollImg" style="position: relative;">
	  <div class="w3-row storyTime" style="padding: 50px 75px;">
		<h2 class="w3-center w3-padding">Let me tell you how it all got started!</h2>
		<h3 class="w3-center w3-padding">Pick a story</h3>
		<!--- <img src="images/flower2.png" class="valign-wrapper w3-hide-small" style="max-height:150px; position:absolute; right:0px; transform:rotate(250deg);" />
		<img src="images/flower2.png" class="valign-wrapper w3-hide-small" style="max-height:150px; position:absolute; left:0px; transform:rotate(250deg);" /> --->
		<ul class="hisAndHers" style="display:flex; margin: 16px 10% !important;">
			<li class="hers w3-half w3-xlarge w3-border w3-border-black w3-center w3-hover-border-red w3-padding" onclick="myFunction('her_story')"><span><i class="fa fa-female"></i>&nbsp;Hers</span></li>
			<li class="his w3-half w3-xlarge w3-border w3-border-black w3-hover-border-blue w3-center w3-padding" onclick="myFunction('his_story')"><span><i class="fa fa-male"></i>&nbsp;His</span></li>
		</ul>
		<div class="hisStory w3-padding-large w3-margin" id="his_story" style="/* background: radial-gradient(circle, transparent 89%, gray, blue); */ position:relative;">
			<div id="bgrdShadow"></div>
			<div class="" style="position:relative;">
				<i class="" style="w3-border">Our story for me starts around the same time, 2008 at Britney's house. While me and guys were driving over to Britney's house party, Kev was giving everybody the run down of who all was going to be there. Once I found out Ashley was pregnant, I put it in the back of my mind and didn't really think twice about it. Some time goes by and me and the guys were heading to another gathering of Kev's friends was having a party at D&B. On our way over there, we're getting the rundown from Kev and we find out Ashley was pregnant again. In my head I'm thinking she must be trying to get a mommy of the year award or something! Fast forward another year or so and we meet again at another gathering (our friends like to have gatherings). After being around each other on so many occassions, this one was the first one I actually remember having a conversation with her. I I kept my distance because I didn't want the baby touch! And it seemed like the conversation went on for hours, talking about everything imaginable. After that night I get a text from Kev asking if it was ok if Ashley had my phone number. I knew it was over for her from there. She had been poisoned by my stinger #scorpioSeason! From that day, we talked, and talked some more and talked a little bit more. She soon became the only person I really wanted to talk to. Then one day she comes and tells me we're in a relationship. She said it from another room because she knew it was a bold move. But I didn't put up much of a fight because when she wants something she's going to get it no matter the cost. Half a decade later, through all the ups and downs, joys and tears, I couldn't think of a better person to have by my side.</i>
			</div>
		</div>
		<div class="herStory w3-padding-large w3-margin" id="her_story" style="/* background: radial-gradient(circle, transparent 89%, gray, red); */ position:relative; text-align: justify;">
			<div id="bgrdShadow"></div>
			<div class="" style="position:relative;">
				<i>How We Met….Our Love Story! I remember first meeting Maine in the Fall of 2008 at Britney’s house; one of my Maids of Honor. She was having her first get together in her new apartment.
				Although my girls say Maine had been around before and at our dorm room a few times, this is the first time I remember actually noticing him. He was cute, and his personality drew me in. He was the life of the party and much like me; goofy, silly, and down for a good time. But I was involved in another relationship and couldn’t make a move.Fast forward three years. Although Maine and I had been in each other’s company quite a few times over the years, we both had been involved with other people. But by the Fall of 2011, things had changed. That’s when Maine really caught my attention.I remember in August of 2011 after a birthday outing with the gang, I started asking my girls if they knew his background and if he was talking to anyone in particular. When the general consensus was “No”, my little wheels began to turn.In September of 2011 at yet another birthday outing, Maine and I finally sparked up a conversation that would be the beginning to forever. In that conversation, he made me realize that my happiness was the most important thing and that, in return, my children would see that happiness and be better off. A few weeks went by and I knew I had to come up with a way to spark another conversation, but how? Not knowing when our next group outing would be, I put the thought to the side, until a coworker told me she applied for a position at DaVita. BINGO! I remembered from a conversation that Maine worked at DaVita. So I kindly asked our mutual friend Kev for Maine’s phone number and added that I wanted to see if Maine had any pull at his job. Of course I knew Kev wouldn’t want to be the middle man, and he quickly sent me Maine’s number.After an exchange of text messages back and forth about my coworker, I thanked Maine for looking out and ended the conversation. The goal was to now wait until Maine randomly texted me because he now had my number.Low and behold, I didn’t have to wait long; he fell right into the trap! lol The next morning I got a text asking how my day was going and what I was up to. We texted all day long about any and everything. I remember not texting back so fast. I didn’t want to seem to into him, but in reality I was checking my phone every five seconds to see if he had written me anything.These conversations continued over the next couple of months, through his 25th birthday, Thanksgiving, and Christmas. We routinely had long phone conversations that didn’t end until one of us fell asleep on the other.By early January of 2012 I knew he was someone special and for me. The way he made me laugh, the way he looked at me, the jokes we shared -- it was just different. Shortly after this, I looked up our zodiac signs and it said that a Taurus and Scorpio would make a powerhouse and relationship-wise were great for each other. Maine and I joked about it at the time, but we have become just that -- a powerhouse. The rest is history!</i>
			</div>
			</div>
		</div>
	  </div>
	<div class="w3-display-container w3-wide hide-on-small-only" style="position: relative; margin: 20px 250px;">
		<img class="w3-round w3-grayscale-min" src="/images/at3.jpg" style="width:100%;margin:32px 0">
	</div>
	</div>
	<div></div>
@endsection

@section('wedding_information')
	<!-- Wedding information content -->
	<div class="w3-container w3-padding-64 w3-center usMobile" style="color:#000;background:url('/images/map5.jpg'); background-attachment: fixed; background-repeat: no-repeat; background-position: center center; background-size: cover;">
	
	<!-- Wedding information -->
	<!-- Background photo -->
	<div class="w3-display-container w3-wide w3-margin scrollImg2" id="wedding" style="position: relative; padding: 50px 0px 175px;">
		<div class="w3-center" style="position: relative; padding: 100px 0px 50px;">
			<h1 class="w3-jumbo"><b>THE WEDDING</b></h1>
			<h1 class="w3-xxlarge">Are You Invited?!?!</h1>
			<h2>Of course..</h2>
		</div>
	
	  <div class="w3-content" style="position:relative; /* background: rgba(255, 255, 255, 0.9); */">
		<!--- <img class="w3-round-large w3-mobile" src="http://luciensmanor.com/wp-content/uploads/2016/07/Versailles-2016.jpg"> --->
		<div class="w3-row" style="font-size: 125%;">
		  <div class="w3-half">
			<h2 class="w3-xxlarge">When</h2>
			<p>August 26, 2018</p>
			<p>Wedding Ceremony - 2:30pm</p>
			<p>Cocktail Hour - 3:00pm</p>
			<p>Reception & Dinner - 4:00pm</p>
		  </div>
		  <!--- <div class="">
			<img src="/images/design3.png" class="valign-wrapper w3-hide-small" style="max-height:175px; position:absolute; left:45%; transform:rotate(-35deg); bottom: -20px;" />
		  </div> --->
		  <div class="w3-half">
			<h2 class="w3-xxlarge">Where</h2>
			<p>Lucien's Manor</p>
			<p>81 W. White Horse Pike</p>
			<p>Berlin, NJ 08009</p>
			<p><a href="http://www.luciensmanor.com" target="_blank">luciensmanor.com</a></p>
		  </div>
		  
		</div>
	  </div>
	  <!-- RSVP section -->
	  <div class="w3-content" style="position:relative; /* background: rgba(255, 255, 255, 0.9); */">
		<h1>HOPE YOU CAN MAKE IT!</h1>
		  <p class="w3-large">Kindly Respond By January, 2018</p>
		  <p class="w3-xlarge">
			<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-round w3-red w3-opacity w3-hover-opacity-off" style="padding:8px 60px">RSVP</button>
		  </p>
	  </div>
	  </div>
	</div>
@endsection

@section('rsvp_information')
	<!-- RSVP modal -->
	<div id="id01" class="w3-modal">
	  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding:32px;max-width:600px">
		<div class="w3-container w3-white w3-center row">
		  
		  <h1 class="w3-wide col s12">CAN YOU COME?</h1>
		  <p class="col s12">We really hope you can make it.</p>
		  <p class="w3-center"><i>Sincerely, Tramaine & Ashley</i></p>
		  
		  {!! Form::open([ 'action' => 'GuestController@store', 'class' => 'col s12']) !!}
			<div class="row">
				<div class="input-field col s6">
					<input id="first" class="w3-large" type="text" name="first">
					<label for="first" class="active">First Name</label>
				</div>
				<div class="input-field col s6">
					<input id="last" class="w3-large" type="text" name="last">
					<label for="last" class="active">Last Name</label>
				</div>
				<div class="input-field col s12">
					<input id="email" class="w3-large" type="email" name="email">
					<label for="email" class="active">Email Address</label>
				</div>
				<div class="">
					<span class="w3-xlarge getRSVP">Next</span>&nbsp;<span><i class="fa fa-2x fa-arrow-circle-right w3-text-green getRSVP"></i></span>
					
				  <!-- {!! Form::submit('', ['name' => 'rsvp', 'class' => 'w3-button w3-block w3-green']) !!} -->
				  <!-- {!! Form::submit('Cant Come', ['name' => 'rsvp', 'class' => 'w3-button w3-block w3-red']) !!} -->
				</div>
			</div>
		{!! Form::close() !!}
		</div>
		<span onclick="document.getElementById('id01').style.display='none'; document.getElementById('food_desc_list').style.display='none';" class="w3-button w3-display-topright">&times;</span>
	  </div>
	</div>
@endsection

@section('footer')
	<!-- Description modal for all the food selections -->
	<div class="foodDescList" id="food_desc_list">
		<ul class="">
			<li class="">
				<div class="container">
					<h2 class="">Grilled Mediterranean Chicken</h2>
					<div class="row valign-wrapper">
						<div class="col s4">
							<img src="{{ asset('/images/med_chicken.jpg') }}" class="circle  responsive-img" />
						</div>
						<div class="col s8">
							<p class="">Grilled chicken topped with Feta Cheese, Kalamata Olives, Tri Color Peppers, Red Onions, Lemon Thyme Sauce</p>
						</div>
					</div>
				</div>
			</li>
			<li class="">
				<div class="container">
					<h2 class="">Grilled Rib-Eye</h2>
					<div class="row valign-wrapper">
						<div class="col s4">
							<img src="{{ asset('/images/grilled_steak.jpg') }}" class="circle  responsive-img" />
						</div>
						<div class="col s8">
							<p class="">Tender Rib Eye Grilled to Perfection with a Caramelized Onion Demi-glace</p>
						</div>
					</div>
				</div>
			</li>
			<li class="">
				<div class="container">
					<h2 class="">Stuffed Salmon</h2>
					<div class="row valign-wrapper">
						<div class="col s4">
							<img src="{{ asset('/images/salmon.jpg') }}" class="circle  responsive-img" />
						</div>
						<div class="col s8">
							<p class="">Salmon stuffed with Crab Imperial topped with Hollandaise Sauce</p>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<script>
		$('body').on('click', '.getRSVP', function() {
			getRSVP($('#first').val(), $('#last').val(), $('#email').val());
		});
		
		$('body').on('click', '.yesPO', function() {
			$('.foodSelectionForm').slideUp(function() {
				$('.plusOneSelectionForm').slideDown();
				$('.foodSelectionSelect').attr('disabled', true);
				$('[name="plus_one"]').removeAttr('disabled').focus();
			});
		});
		
		$('body').on('click', '.noPO', function() {
			$('.plusOneSelectionForm').slideUp(function() {
				$('.foodSelectionForm').slideDown();				
				$('[name="plus_one"]').attr('disabled', true);
				$('.foodSelectionSelect').removeAttr('disabled').focus();
			});
			
		});
		
		$('body').on('click', '.findRSVP', function() {
			$('#confirmation').fadeOut(function() {
				$('#id01.w3-modal .w3-modal-content > div.w3-container').fadeIn(function() {
					$('#confirmation').remove();					
				});
			});
		});
	</script>
@endsection