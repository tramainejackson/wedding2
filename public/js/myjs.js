$(document).ready(function() {
	
	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')	},
		cache: false
	});
	
	new WOW().init();
	
	$('.collapsible').collapsible();
	
	// Show the description of the food
	$('body').on('click', '.foodDescrBtn', function() {
		$('.foodDescList').show().animate({right:'0', zIndex:'2000'});
	});

	$('body').on('click', '.closeFoodDesc', function() {
		$('.foodDescList').animate({right:'-=100%'});
	});
	
	$('.mdb-select').material_select();
	
	// Create a toggle for the decline/confirm invite checkbox
	$("body").on("click", ".editGuestForm .inviteCheck", function(e) {
		if($(this).attr('id') == 'rsvpYes') {
			$(this).attr('checked', 'checked');
			$('.editGuestForm #rsvpNo').removeAttr('checked');
		} else {
			$(this).attr('checked', 'checked');
			$('.editGuestForm #rsvpYes').removeAttr('checked');
		}
	});

	// Make home page image the same size as the parent div
	$('.view.bgimg img').css({minHeight:$('.view.bgimg').height() + 'px'});
	
	// Make margin bottom on footer same size as navigate
	$('footer').css({marginBottom:$('.fixed-bottom').height() + 'px'});
	
	$('body').on('click', '.getRSVP', function(e) {
		// Remove any error messages if they exist
		$('.guestRsvpCheckFormContainer span.inputError').remove();
		
		if($('#first').val() == '' || $('#last').val() == '') {
			// Append error for missing firstname
			if($('#first').val() == '') {
				$('#first').parent().after('<span class="inputError red-text">Firstname cannot be empty</span>')
			}

			// Append error for missing lastname
			if($('#last').val() == '') {
				$('#last').parent().after('<span class="inputError red-text">Lastname cannot be empty</span>')
			}
		} else {
			getRSVP($('#first').val(), $('#last').val(), $('#email').val());
		}
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
		$('#reservationModal #confirmation').fadeOut(function() {
			$('#reservationModal .guestRsvpCheckFormContainer').fadeIn(function() {
				$('#confirmation').remove();					
			});
		});
	});
	
	// Not sure what this does right this moment
	$('[name="plus_one_selection_form"]').on('submit', function() {
		event.preventDefault();
		confirmPlusOne($('[name="plus_one"]').val(), $('[name="guest_id"]').val());
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
	
	// Call function for file preview when uploading new images
	$("#upload_photo_input").change(function () {
		filePreview(this);
	});
	
	// Call function for file preview when uploading new images
	$("body").on('click', '.removePhotos', function () {
		event.preventDefault();
		$('[name="removePhotos"]').submit();
	});
	
	// Add remove label to images
	$('body').on('click', '.adminGallery input', function() {
		if($(this).prop('checked')) { 
			$(this).parent().addClass('removeMask');
			$(this).next().next().show();
		} else {
			$(this).parent().removeClass('removeMask');
			$(this).next().next().hide();
		}
		
		if($('.adminGallery input:checked').length > 0) {
			$('.removePhotos').fadeIn();
		} else {
			$('.removePhotos').slideUp();
		}
	});
	
	// Do not allow submission if no value
	$('body').on('submit', 'form[name="food_selection_form"]', function() {
		var form = $('form[name="food_selection_form"]');
		var error = 0;
		
		if($(form).find('select option:selected').length > 1) {
			var options = $(form).find('select option:selected');
			
			$(options).each(function() {
				if($(this).val() == '') {
					error++;
				}
			});
			
			if(error >= 0) {
				toastr["error"]("Please make a food selection for both guest");
				return false;
			} else {
				return true;
			}
		} else {
			if($(form).find('option:selected').val() == '') {
				toastr["error"]("Please make a food selection to continue");
				return false;
			} else {
				return true;
			}
		}
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
		$('#reservationModal .guestRsvpCheckFormContainer').fadeOut(function() {
			$(newData).appendTo('#reservationModal .modal-body').fadeIn();
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
		$('#confirmation').fadeOut(function() {
			$(newData).appendTo('#reservationModal .modal-body').fadeIn(function() {
				$('select').material_select();
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
		$('#confirmation').fadeOut(function() {
			$(newData).appendTo('#reservationModal .modal-body').fadeIn(function() {
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

// Preview images before being uploaded on images page and new location page
function filePreview(input) {
    if (input.files && input.files[0]) {
		if(input.files.length > 1) {
			var imgCount = input.files.length
			$('.imgPreview').remove();
			
			for(x=0; x < imgCount; x++) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('<img class="imgPreview img-thumbnail w3-margin" src="' + e.target.result + '" width="350" height="200"/>').appendTo('.uploadsView');
				}
				reader.readAsDataURL(input.files[x]);
			}			
		} else {
			var reader = new FileReader();
			$('.imgPreview').remove();
			
			reader.onload = function (e) {
				$('<img class="imgPreview img-thumbnail" src="' + e.target.result + '" width="450" height="300"/>').appendTo('.uploadsView');
			}
			reader.readAsDataURL(input.files[0]);
		}
    }
}