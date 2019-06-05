/*navbar*/
$(function() {
	menu = $('nav ul');

  $('#openup').on('click', function(e) {
    e.preventDefault(); menu.slideToggle();
  });
  
  $(window).resize(function(){
    var w = $(this).width(); if(w > 480 && menu.is(':hidden')) {
      menu.removeAttr('style');
    }
  });
  
  $('nav li').on('click', function(e) {                
    var w = $(window).width(); if(w < 480 ) {
      menu.slideToggle(); 
    }
  });
  $('.open-menu').height($(window).height());
});

// Smooth Scrolling
$('.cf a').on('click', function(event){
  if (this.hash !== ''){
    event.preventDefault();

    const hash = this.hash;

    $('html, body').animate({
      scrollTop: $(hash).offset().top
    },
    800,
    function() {
      window.location.hash = hash;
    })
  }
});
/*Navbar end*/
$(function() {
	menu = $('nav ul');

  $('#openup').on('click', function(e) {
    e.preventDefault(); menu.slideToggle();
  });
  
  $(window).resize(function(){
    var w = $(this).width(); if(w > 480 && menu.is(':hidden')) {
      menu.removeAttr('style');
    }
  });
  
  $('nav li').on('click', function(e) {                
    var w = $(window).width(); if(w < 480 ) {
      menu.slideToggle(); 
    }
  });
  $('.open-menu').height($(window).height());
});

// Smooth Scrolling
$('.cf a').on('click', function(event){
  if (this.hash !== ''){
    event.preventDefault();

    const hash = this.hash;

    $('html, body').animate({
      scrollTop: $(hash).offset().top
    },
    800,
    function() {
      window.location.hash = hash;
    })
  }
});




//Right arrow 
function nextSlide() {
	var currentSlide = $('.slide.active');
	var nextSlide = currentSlide.next();
	var currentDot = $('.dot.active');
	var nextDot = currentDot.next();


	currentSlide.fadeOut(200).removeClass('active');
	nextSlide.fadeIn(200).addClass('active');
	currentDot.removeClass('active');
	nextDot.addClass('active');

	if(nextSlide.length == 0){
		$('.slide').first().fadeIn(200).addClass('active');
		$('.dot').first().addClass('active');
	}
}
 
$('#right-jumbo').click(function() {
	nextSlide();
});

// left (previous)arrow

function prevSlide() {
	var currentSlide = $('.slide.active');
	var prevSlide = currentSlide.prev();
	var currentDot = $('.dot.active');
	var prevDot = currentDot.prev();

	currentSlide.fadeOut(200).removeClass('active');
	prevSlide.fadeIn(200).addClass('active')
	currentDot.removeClass('active');
	prevDot.addClass('active');

	if(prevSlide.length == 0 ) {
		$('.slide').last().fadeIn(200).addClass('active');
		$('.dot').last().addClass('active');
	}
}
$('#left-jumbo').click(function(){
	prevSlide();
});

// Automatic reveal next slide

$(document).ready(function(){
	setInterval(nextSlide, 5000);
})
 
