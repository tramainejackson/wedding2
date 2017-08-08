
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function() {
	// Parallax plugin init
	$('.parallax').parallax();
	
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
	
	// Slideshow for squad goals
	// var $slides = $('img.mySlides');
	// $slides.each(function() {
		// var rotate = $(this).attr('class').substr(30);
		// $(this).css({transform:'rotate(' + rotate + 'deg)', height:'inherit', width:'inherit'});
	// });
});