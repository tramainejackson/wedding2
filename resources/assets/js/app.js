
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function() {
	// Parallax plugin init
	$('.parallax').parallax();
	
	// Materialize Select Plugin Init
	$('select').material_select();
	
	// Pushpin plugin init
	$('.partyNav').each(function() {
		
		var $this = $(this);
		var $target = $('#' + $(this).attr('data-target'));
		
		$this.pushpin({
			top: $target.offset().top,
			bottom: $target.offset().top + $target.outerHeight() - $this.height()
		});
	});
	
	//ScrollFire plugin init
	var options = [
      {selector: '.scrollfire0', offset: 250, callback: function(el) {
        $(el).fadeTo("slow", 1);
      } },
	  {selector: '.scrollfire2', offset: 250, callback: function(el) {
        $(el).fadeTo("slow", 1);
      } },
	  {selector: '.scrollfire4', offset: 250, callback: function(el) {
        $(el).fadeTo("slow", 1);
      } },
	  {selector: '.scrollfire6', offset: 250, callback: function(el) {
        $(el).fadeTo("slow", 1);
      } },
	  {selector: '.scrollfire8', offset: 250, callback: function(el) {
        $(el).fadeTo("slow", 1);
      } },
	  {selector: '.scrollfire10', offset: 250, callback: function(el) {
        $(el).fadeTo("slow", 1);
      } },
	  {selector: '.scrollfire12', offset: 250, callback: function(el) {
        $(el).fadeTo("slow", 1);
      } },
	  {selector: '.scrollfire14', offset: 250, callback: function(el) {
        $(el).fadeTo("slow", 1);
      } },
	  {selector: '.scrollfire16', offset: 250, callback: function(el) {
        $(el).fadeTo("slow", 1);
      } },
	  {selector: '.guestList', offset: 0, callback: function(el) {
        Materialize.showStaggeredList($(el));
      } }
    ];
    Materialize.scrollFire(options);
	
	// Add image count to the bottom of the display container
	var images = $('.mySlides').length;
	var imagesPage = Number($('li.active span').text());
	var imagesPagination = (imagesPage * 15) - 14;
	var imagesTo = (imagesPagination + images) - 1;
	var total = 150;
	
	$('#imgCount').text('#' + imagesPagination + ' - ' + imagesTo + ' of ' + total);
	
	
	// Increase gift amount by total selected gifts for PayPal
	$('body').on('change', '.giftTotal', function() {
		$this = $(this);
		var a = $this.parent().next().find('a');

		if(a.length > 0){
			var newTotal = Number(a.attr('href').substring(33)) * Number($this.find('option:selected').val());
			var newLink = 'https://www.paypal.me/actionjack/' + newTotal;
			
			a.attr('href', newLink);
		
			console.log($this.find('option:selected').val());
			console.log(newTotal);
		}
	});
});