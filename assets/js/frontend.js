(function ($) {
	"use strict";

  $(document).ready(function($){
  
    $(".modern-slider").slick({
      autoplay:true,
      autoplaySpeed:10000,
      speed:600,
      slidesToShow:2,
      slidesToScroll:1,
      pauseOnHover:false,
      dots:false,
      pauseOnDotsHover:true,
      cssEase:'linear',
     // fade:true,
      draggable:true,
      prevArrow:'<button class="prev-arrow"></button>',
      nextArrow:'<button class="next-arrow"></button>', 
    });
    
  });

})(jQuery);