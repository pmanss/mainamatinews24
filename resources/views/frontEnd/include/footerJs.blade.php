<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
   <script type="text/javascript" src="{{ asset('js/stellarnav.min.js')}}"></script>
   <script type="text/javascript">
      jQuery(document).ready(function($) {
         jQuery('.stellarnav').stellarNav({
            theme: 'light'
         });
      });
   </script>
   <script src="{{ asset('js/dcalendar.picker.js')}}"></script>
<script>
$('#demo').dcalendarpicker();
$('#calendar-demo').dcalendar(); //creates the calendar

// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

</script>