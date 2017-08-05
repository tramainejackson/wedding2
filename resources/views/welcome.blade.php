@extends('app')

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
		<a href="/login" style="position:absolute;z-index:2;background:transparent;" class="w3-btn w3-large">Login</a>
	@endif

	<!-- Header / Home-->
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
		<div class="w3-display-middle w3-text-white w3-center headerContent">
			<h1 class="w3-jumbo">Ashley & Tramaine</h1>
			<h2>Are getting married</h2>
			<h2><b>08.26.2018</b></h2>
		</div>
		<span class="w3-text-white w3-display-bottommiddle"><i>- Unconditional love is the passport to all of lifes journey</i></span>
	</header>
	<div class="section white"></div>
@endsection

@section('about_us')
	<!-- About / Tramaine & Ashley -->
	<div class="w3-container w3-padding-64 w3-pale-red w3-grayscale-min" id="us">
	  <div class="w3-content">
		<h1 class="w3-center w3-padding">Let me tell you how it all got started!</h1>
		<h2 class="w3-center w3-padding">Pick a story</h2>
		<ul class="hisAndHers w3-margin" style="display:flex">
			<li class="hers w3-half w3-xlarge w3-border w3-center w3-hover-border-red w3-padding" onclick="myFunction('her_story')"><span><i class="fa fa-female"></i>&nbsp;Hers</span></li>
			<li class="his w3-half w3-xlarge w3-border w3-hover-border-blue w3-center w3-padding" onclick="myFunction('his_story')"><span><i class="fa fa-male"></i>&nbsp;His</span></li>
		</ul>
		<div class="hisStory w3-padding-large w3-border w3-hide w3-margin" id="his_story" style="background: radial-gradient(circle, transparent 89%, gray, blue);">
			<div class="">
				<i class="" style="w3-border">I remember first meeting Ash... in the Fall of 2008 at Britney’s house; one of my Maids of Honor. She was having her first get together in her new apartment.Although my girls say Maine had been around before and at our dorm room a few times, this is the first time I remember actually noticing him. He was cute, and his personality drew me in. He was the life of the party and much like me; goofy, silly, and down for a good time. But I was involved in another relationship and couldn’t make a move.Fast forward three years. Although Maine and I had been in each other’s company quite a few times over the years, we both had been involved with other people. But by the Fall of 2011, things had changed. That’s when Maine really caught my attention.I remember in August of 2011 after a birthday outing with the gang, I started asking my girls if they knew his background and if he was talking to anyone in particular. When the general consensus was “No”, my little wheels began to turn.In September of 2011 at yet another birthday outing, Maine and I finally sparked up a conversation that would be the beginning to forever. In that conversation, he made me realize that my happiness was the most important thing and that, in return, my children would see that happiness and be better off. A few weeks went by and I knew I had to come up with a way to spark another conversation, but how? Not knowing when our next group outing would be, I put the thought to the side, until a coworker told me she applied for a position at DaVita. BINGO! I remembered from a conversation that Maine worked at DaVita. So I kindly asked our mutual friend Kev for Maine’s phone number and added that I wanted to see if Maine had any pull at his job. Of course I knew Kev wouldn’t want to be the middle man, and he quickly sent me Maine’s number.After an exchange of text messages back and forth about my coworker, I thanked Maine for looking out and ended the conversation. The goal was to now wait until Maine randomly texted me because he now had my number.Low and behold, I didn’t have to wait long; he fell right into the trap! lol The next morning I got a text asking how my day was going and what I was up to. We texted all day long about any and everything. I remember not texting back so fast. I didn’t want to seem to into him, but in reality I was checking my phone every five seconds to see if he had written me anything.These conversations continued over the next couple of months, through his 25th birthday, Thanksgiving, and Christmas. We routinely had long phone conversations that didn’t end until one of us fell asleep on the other.By early January of 2012 I knew he was someone special and for me. The way he made me laugh, the way he looked at me, the jokes we shared -- it was just different. Shortly after this, I looked up our zodiac signs and it said that a Taurus and Scorpio would make a powerhouse and relationship-wise were great for each other. Maine and I joked about it at the time, but we have become just that -- a powerhouse. The rest is history!</i>
			</div>
		</div>
		<div class="herStory w3-padding-large w3-border w3-hide w3-margin" id="her_story" style="background: radial-gradient(circle, transparent 89%, gray, red);">
			<div class="">
				<i>How We Met….Our Love Story! I remember first meeting Maine in the Fall of 2008 at Britney’s house; one of my Maids of Honor. She was having her first get together in her new apartment.
				Although my girls say Maine had been around before and at our dorm room a few times, this is the first time I remember actually noticing him. He was cute, and his personality drew me in. He was the life of the party and much like me; goofy, silly, and down for a good time. But I was involved in another relationship and couldn’t make a move.Fast forward three years. Although Maine and I had been in each other’s company quite a few times over the years, we both had been involved with other people. But by the Fall of 2011, things had changed. That’s when Maine really caught my attention.I remember in August of 2011 after a birthday outing with the gang, I started asking my girls if they knew his background and if he was talking to anyone in particular. When the general consensus was “No”, my little wheels began to turn.In September of 2011 at yet another birthday outing, Maine and I finally sparked up a conversation that would be the beginning to forever. In that conversation, he made me realize that my happiness was the most important thing and that, in return, my children would see that happiness and be better off. A few weeks went by and I knew I had to come up with a way to spark another conversation, but how? Not knowing when our next group outing would be, I put the thought to the side, until a coworker told me she applied for a position at DaVita. BINGO! I remembered from a conversation that Maine worked at DaVita. So I kindly asked our mutual friend Kev for Maine’s phone number and added that I wanted to see if Maine had any pull at his job. Of course I knew Kev wouldn’t want to be the middle man, and he quickly sent me Maine’s number.After an exchange of text messages back and forth about my coworker, I thanked Maine for looking out and ended the conversation. The goal was to now wait until Maine randomly texted me because he now had my number.Low and behold, I didn’t have to wait long; he fell right into the trap! lol The next morning I got a text asking how my day was going and what I was up to. We texted all day long about any and everything. I remember not texting back so fast. I didn’t want to seem to into him, but in reality I was checking my phone every five seconds to see if he had written me anything.These conversations continued over the next couple of months, through his 25th birthday, Thanksgiving, and Christmas. We routinely had long phone conversations that didn’t end until one of us fell asleep on the other.By early January of 2012 I knew he was someone special and for me. The way he made me laugh, the way he looked at me, the jokes we shared -- it was just different. Shortly after this, I looked up our zodiac signs and it said that a Taurus and Scorpio would make a powerhouse and relationship-wise were great for each other. Maine and I joked about it at the time, but we have become just that -- a powerhouse. The rest is history!</i>
			</div>
		</div>
		<img class="w3-round w3-grayscale-min" src="/images/at3.jpg" style="width:100%;margin:32px 0">
	  </div>
	</div>
@endsection

@section('wedding_information')
	<div class="section white"></div>
	
	<!-- Wedding information -->
	<!-- Background photo -->
	<div class="w3-display-container bgimg2">
		<div id="wedding" class="w3-display-middle w3-text-white w3-center">
			<h1 class="w3-jumbo w3-center w3-padding"><b>THE WEDDING</b></h1><br>
			<h2 class="w3-xlarge">You Are Invited</h2><br>
			<h3>Of course..</h3>
		</div>
	</div>

	<!-- Wedding information content -->
	<div class="section white"></div>
	<div id="test1" class="w3-container w3-padding-64 w3-pale-red w3-grayscale-min w3-center">
	  <div class="w3-content">
		<!--- <img class="w3-round-large w3-grayscale-min" src="http://luciensmanor.com/wp-content/uploads/2016/07/Versailles-2016.jpg" style="width:100%;margin:64px 0"> --->
		<div class="w3-row">
		  <div class="w3-half">
			<h2>When</h2>
			<p>August 26, 2018</p>
			<p>Wedding Ceremony - 2:30pm</p>
			<p>Cocktail Hour - 3:00pm</p>
			<p>Reception & Dinner - 4:00pm</p>
		  </div>
		  <div class="w3-half">
			<h2>Where</h2>
			<p>Lucien's Manor</p>
			<p>81 W. White Horse Pike</p>
			<p>Berlin, NJ 08009</p>
			<p><a href="http://www.luciensmanor.com" target="_blank">luciensmanor.com</a></p>
		  </div>
		</div>
	  </div>
	<div class="w3-container w3-padding-64 w3-pale-red w3-center w3-wide" id="rsvp">
	  <h1>HOPE YOU CAN MAKE IT!</h1>
	  <p class="w3-large">Kindly Respond By January, 2018</p>
	  <p class="w3-xlarge">
		<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-round w3-red w3-opacity w3-hover-opacity-off" style="padding:8px 60px">RSVP</button>
	  </p>
	</div>
	</div>
@endsection

@section('rsvp_information')
	<!-- RSVP section -->

	<!-- RSVP modal -->
	<div id="id01" class="w3-modal">
	  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding:32px;max-width:600px">
		<div class="w3-container w3-white w3-center row">
		  
		  <h1 class="w3-wide col s12">CAN YOU COME?</h1>
		  <p class="col s12">We really hope you can make it.</p>
		  
		  <form class="col s12" action="/confirmed" method="POST">
			<div class="row">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="input-field col s6">
					<input id="first" class="w3-large" type="text" name="first">
					<label for="first" class="active">First Name</label>
				</div>
				<div class="input-field col s6">
					<input id="last" class="w3-large" type="text" name="last">
					<label for="last" class="active">Last Name</label>
				</div>
			  <p class="w3-center"><i>Sincerely, Tramaine & Ashley</i></p>
			  <div class="w3-row">
				<div class="w3-half">
				  <input type="submit" name="rsvp" value="Going" class="w3-button w3-block w3-green" />
				</div>
				<div class="w3-half">
				  <input type="submit" name="rsvp" value="Cant come" class="w3-button w3-block w3-red" />
				</div>
			  </div>
			</div>
		  </form>
		</div>
		<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
	  </div>
	</div>
@endsection

@section('footer')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.collapsible').collapsible();
		  });
		  
		function myFunction(id) {
			var id = id;
			var x = document.getElementById(id);
			
			if(id == "his_story") {
				if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show w3-border-blue w3-animate-zoom";
					$("li.his").addClass("w3-border-blue");
					
					if(document.getElementById("her_story").className.indexOf("w3-show") > 0) {
						$("#her_story").removeClass("w3-show");
						$("li.hers").removeClass("w3-border-red");
					}
				} else { 
					$("#his_story").removeClass("w3-show w3-animate-zoom");
					$("li.his").removeClass("w3-border-blue");
				}
			} else {
				if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show w3-border-red w3-animate-zoom";
					$("li.hers").addClass("w3-border-red");
					
					if(document.getElementById("his_story").className.indexOf("w3-show") != -1) {
						$("#his_story").removeClass("w3-show");
						$("li.his").removeClass("w3-border-blue");
					}
				} else { 
					$("#her_story").removeClass("w3-show w3-animate-zoom");
					$("li.hers").removeClass("w3-border-red");
				}
			}
		}
	</script>
@endsection