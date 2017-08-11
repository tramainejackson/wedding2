
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function() {
	// Parallax plugin init
	$('.parallax').parallax();
	
	//Materialize text fields
	Materialize.updateTextFields();
	
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
	
	$(document).ready(function() {
		$('select').material_select();
	});
	
	// Add image count to the bottom of the display container
	var images = $('.mySlides').length;
	var imagesPage = Number($('li.active span').text());
	var imagesPagination = (imagesPage * 15) - 14;
	var imagesTo = (imagesPagination + images) - 1;
	var total = 150;

	$('#imgCount').text('#' + imagesPagination + ' - ' + imagesTo + ' of ' + total);


	// Increase gift amount by total selected gifts for PayPal
	$('body').on('change keyup mouseup', '.giftTotal', function() {
		$this = $(this);
		var a = $this.parent().parent().next().find('a');
		var span = $this.parent().parent().next().find('.amountDisplay');
		var newLink = 'https://www.paypal.me/actionjack/' + $this.val();

		span.text($this.val());
		a.attr('href', newLink);

		if(a.length > 0){
			a.attr('href', newLink);
		}
	});
});