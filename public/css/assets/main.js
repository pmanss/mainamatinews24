(function($) {
    "use strict";


        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();

            if (scroll > 100) {
                $(".menu_parent").addClass("menu_affix"); // you don't need to add a "." in before your class name
            } else {
                $(".menu_parent").removeClass("menu_affix");
            }
        });




        /*--------------------------------------------------------------
        ## Owl Carousel Activated
        --------------------------------------------------------------*/
          $('.owl-carousel').owlCarousel({
              loop:true,
              margin:10,
              nav:true,
              items:1,
              navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
              autoplay: true,
              autoplaySpeed: 2000,
              autoplayTimeout: 6000,
              navSpeed:1000,
              animateOut: 'fadeOut',
              animateIn: 'fadeIn'
              /*responsive:{
                  0:{
                      items:1
                  },
                  600:{
                      items:3
                  },
                  1000:{
                      items:5
                  }
              }*/
          })



        /*--------------------------------------------------------------
        ## Meanmenu Activated
        --------------------------------------------------------------*/
     jQuery('#main-nav').stellarNav({

        // number in pixels to determine when the nav should turn mobile friendly
        breakpoint: 768, 
        
      });
    
    jQuery('#date').datetimepicker({
        timepicker: false,
        format: 'Y-m-d'
    });


   
})(jQuery); // End of use strict

