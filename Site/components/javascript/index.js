$(function(){
  if (screen.width >= 768) {
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
    $('nav').removeClass('scrolled');
  }
});
