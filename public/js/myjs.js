$(document).ready(function() {
	
	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')	},
		cache: false
	});
	
	$('.collapsible').collapsible();
	
	// Show the description of the food
	$('body').on('click', '.foodDescrBtn', function() {
		$('.foodDescList').show().animate({right:'0'});
	});
	
	// I should have added a description here before I 
	// forgot what this does
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
	
	// Show more of the bridal party member story
	$("body").on("click", ".readMore", function(e) {
		var $this = $(this);
		var card = $this.parents(".card.large");
		
		$this.text("------ Read Less ------").removeClass("readMore").addClass("readLess");
		card.removeClass("large");
	});
	
	// Show less of the bridal party member story
	$("body").on("click", ".readLess", function(e) {
		var $this = $(this);
		var card = $this.parents(".card");
		
		$this.text("------ Read Less ------").addClass("readMore").removeClass("readLess");
		card.addClass("large");
	});
	
	// Add countdown plugin
	$("#getting-started #countdownClock, #home_countdown").countdown("2018/08/26", function(event) {
		$(this).text(event.strftime('%D days %H:%M:%S'));
	});
	
	//Search option box
	$(".guest_search ").keyup(function(e){
		startSearch($(".guest_search ").val());
	});
});

// Get confirmed RSVP from the 
function getRSVP(firstname, lastname, email) {
	$.ajax({
	  method: "GET",
	  url: "/confirmed",
	  data: {'first':firstname, 'last':lastname, 'email':email}
	})
	
	.fail(function() {	
		alert("Fail");
	})
	
	.done(function(data) {
		var newData = $(data);
		$('#id01.w3-modal .w3-modal-content > div.w3-container').fadeOut(function() {
			$(newData).appendTo('#id01.w3-modal .w3-modal-content').fadeIn();
		});
	});
}

// Get confirmed RSVP from the server
function confirmRSVP(rsvp, email) {
	$.ajax({
	  method: "PATCH",
	  url: "/confirmed/" + rsvp.id,
	  data: {'rsvp':'Going', 'email':email}
	})
	
	.fail(function() {	
		alert("Fail");
	})
	
	.done(function(data) {
		var newData = $(data);
		$(newData).appendTo('#id01.w3-modal .w3-modal-content');
		$('select').material_select();
		$('#confirmation').fadeOut(function() {
			$(newData).fadeIn(function() {
				$('#confirmation').remove();
			});
		});
	});
}

// Get guest and decline invite
function declineRSVP(rsvp, email) {
	$.ajax({
	  method: "PATCH",
	  url: "/declined/" + rsvp.id,
	  data: {'rsvp':'Decline', 'email':email}
	})
	
	.fail(function() {	
		alert("Fail");
	})
	
	.done(function(data) {
		var newData = $(data);
		console.log($(newData));
		$(newData).appendTo('#id01.w3-modal .w3-modal-content');
		$('#confirmation').fadeOut(function() {
			$(newData).fadeIn(function() {
				$('#confirmation').remove();
			});
		});
	});
}

// Confirm plus one and bring up 
function confirmPlusOne(plusOne, guests) {
	$.ajax({
	  method: "PATCH",
	  url: "/additional_guest/" + guests,
	  data: {'plusOne': plusOne}
	})
	
	.fail(function() {	
		alert("Fail");
	})
	
	.done(function(data) {
		var newData = $(data);
		var currentFoodSelectionDiv = $('.foodSelectionDiv');
		
		$(newData).appendTo('#id01.w3-modal .w3-modal-content');
		$('select').material_select();
		$(currentFoodSelectionDiv).slideUp(function() {
			$(newData).slideDown(function() {
				$(currentFoodSelectionDiv).remove();
			});
		});
	});
}

function w3_open() {
	document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
	document.getElementById("mySidebar").style.display = "none";
}

// Check text to see if it matches the search criteria being entered
function startSearch(searchVal) {
	var membersTable = $('ul.guestList li').not('.guestListHeader');
	var searchCriteria = searchVal.toLowerCase();
	var foundResults = 0;
	$(membersTable).removeClass("matches");
	$('.noSearchResults').remove();
	
	if(searchCriteria != "") {
		$(membersTable).each(function(event){
			var dataString = $(this).find('.nameSearch').text().toLowerCase();
			
			if(dataString.includes(searchCriteria)) {
				$(this).addClass("matches");
				$(this).show();
				foundResults++;
			} else if(!dataString.includes(searchCriteria)) {
				$(this).hide();
			}
		});
		
		// If all rows are hidden, then add a row saying no results found
		if(foundResults == 0) {
			$('<li class="noSearchResults"><td>No Results Found</li>').appendTo($('ul.guestList'));
		}
	}
}

function myFunction(id) {
	var id = id;
	var x = $("#" + id);
	console.log(x);
	
	if(id == "his_story") {
		if(x.css("display") != "none") {
			x.slideUp();
			$("li.his").removeClass("w3-border-blue").addClass("w3-border-black");
			
		} else { 
			if($("#her_story").css('display') != 'none') {
				$("#her_story").slideUp(function() {
					setTimeout(function() {
						x.slideDown();						
					}, 500);
				});
				
				$("li.hers").removeClass("w3-border-red").addClass("w3-border-black");
				$(".scrollImg").removeClass("scrolledImg");
				$(".hisAndHers").prev().removeClass("scrolledUl");
			} else {
				x.slideDown();
			}
			
			$("li.his").addClass("w3-border-blue").removeClass("w3-border-black");
		}
	} else {
		if(x.css("display") == "none") {
			if($("#his_story").css('display') != 'none') {
				$("#his_story").slideUp(function() {
					setTimeout(function() {
						x.slideDown();						
					}, 500);
					$("li.his").removeClass("w3-border-blue").addClass("w3-border-black");
				});
			} else {
				x.slideDown();
			}

			$("li.hers").addClass("w3-border-red").removeClass("w3-border-black");
			$(".scrollImg").addClass("scrolledImg");
			$(".hisAndHers").prev().addClass("scrolledUl");
		} else { 
			x.slideUp();
			$("#her_story").removeClass("w3-show w3-animate-zoom");
			$("li.hers").removeClass("w3-border-red").addClass("w3-border-black");
			$(".scrollImg").removeClass("scrolledImg");
			$(".hisAndHers").prev().removeClass("scrolledUl");
		}
	}
}