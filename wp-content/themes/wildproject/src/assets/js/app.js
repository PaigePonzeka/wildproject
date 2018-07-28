import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';

$(document).foundation();

/*
  Slideshow plugin -Source: https://codepen.io/supah/pen/zZaPeE

*/

$(document).ready(function(){
  new WPSlideshow();
});

var WPSlideshow = function() {
  var $slider = $('.slideshow .slider'),
  maxItems = $('.item', $slider).length,
  dragging = false,
  currentSlide = 0,
  tracking,
  rightTracking;

  var $sliderRight = $('.slideshow').clone().addClass('slideshow-right').appendTo($('.split-slideshow'));

  var rightItems = $('.item', $sliderRight).toArray();
  var reverseItems = rightItems.reverse();
  $('.slider', $sliderRight).html('');
  for (var i = 0; i < maxItems; i++) {
    $(reverseItems[i]).appendTo($('.slider', $sliderRight));
  }

  $slider.addClass('slideshow-left');
  $('.slideshow-left').slick({
    vertical: true,
    verticalSwiping: true,
    arrows: false,
    infinite: true,
    dots: false,
    speed: 1000,
    autoplay: true,
    autoplayspeed: 1000,
    cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)'
  }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {

    if (currentSlide > nextSlide && nextSlide == 0 && currentSlide == maxItems - 1) {
      $('.slideshow-right .slider').slick('slickGoTo', -1);
      $('.slideshow-text').slick('slickGoTo', maxItems);
    } else if (currentSlide < nextSlide && currentSlide == 0 && nextSlide == maxItems - 1) {
      $('.slideshow-right .slider').slick('slickGoTo', maxItems);
      $('.slideshow-text').slick('slickGoTo', -1);
    } else {
      $('.slideshow-right .slider').slick('slickGoTo', maxItems - 1 - nextSlide);
      $('.slideshow-text').slick('slickGoTo', nextSlide);
    }
  });

  $('.slideshow-right .slider').slick({
    swipe: false,
    vertical: true,
    arrows: false,
    infinite: true,
    speed: 950,
    cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
    initialSlide: maxItems - 1
  });
  $('.slideshow-text').slick({
    swipe: false,
    vertical: true,
    arrows: false,
    infinite: true,
    speed: 900,
    cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)'
  });
};

