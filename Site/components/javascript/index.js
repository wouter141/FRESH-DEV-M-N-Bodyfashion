$(function(){
  $(window).scroll(function() {
     if($(window).scrollTop() >= 100) {
       $('nav').addClass('scrolled');
       document.getElementByTagName("nav").style.color = "blue";
     }
    else {
      $('nav').removeClass('scrolled');
      document.getElementByTagName("nav").style.color = "blue";
    }
  });
});
