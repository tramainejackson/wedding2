$(document).ready(function(){
	$('.collapsible').collapsible();
	  
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
	
	$("#getting-started #countdownClock").countdown("2018/08/26", function(event) {
		$(this).text(event.strftime('%D days %H:%M:%S'));
	});
});

function w3_open() {
	document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
	document.getElementById("mySidebar").style.display = "none";
}

function myFunction(id) {
	var id = id;
	var x = document.getElementById(id);
	
	if(id == "his_story") {
		if (x.className.indexOf("w3-show") == -1) {
			x.className += " w3-show w3-animate-zoom";
			$("li.his").addClass("w3-border-blue").removeClass("w3-border-black");
			
			if(document.getElementById("her_story").className.indexOf("w3-show") > 0) {
				$("#her_story").removeClass("w3-show");
				$("li.hers").removeClass("w3-border-red").addClass("w3-border-black");
				$(".scrollImg").removeClass("scrolledImg");
				$(".hisAndHers").prev().removeClass("scrolledUl");
			}
		} else { 
			$("#his_story").removeClass("w3-show w3-animate-zoom");
			$("li.his").removeClass("w3-border-blue").addClass("w3-border-black");
		}
	} else {
		if (x.className.indexOf("w3-show") == -1) {
			x.className += " w3-show w3-animate-zoom";
			$("li.hers").addClass("w3-border-red").removeClass("w3-border-black");
			$(".scrollImg").addClass("scrolledImg");
			$(".hisAndHers").prev().addClass("scrolledUl");
			
			if(document.getElementById("his_story").className.indexOf("w3-show") != -1) {
				$("#his_story").removeClass("w3-show");
				$("li.his").removeClass("w3-border-blue").addClass("w3-border-black");
			}
		} else { 
			$("#her_story").removeClass("w3-show w3-animate-zoom");
			$("li.hers").removeClass("w3-border-red").addClass("w3-border-black");
			$(".scrollImg").removeClass("scrolledImg");
			$(".hisAndHers").prev().removeClass("scrolledUl");
		}
	}
}