$(function(){
  if (screen.width >= 767) {
    $(window).scroll(function() {
       if($(window).scrollTop() >= 100) {
         $('nav').addClass('scrolled');
       }
      else {
        $('nav').removeClass('scrolled');
      }
    });
  }
  else {
    alert("Kleiner dan 767px");
  }
});
