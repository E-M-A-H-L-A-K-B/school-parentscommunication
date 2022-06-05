  $(window).on("scroll",function(){
    if ($(window).scrollTop()){
      $('#logo').addClass('black');
    }
    else{
$('#logo').removeClass('black');

    }
  })
  
jQuery(document).ready(function(){
  jQuery(".menu_btn").click(function(){
      $(".menu").toggleClass("menu_list"); 
      $(this).toggleClass(".menu_btn_open");
  });
}); 

jQuery(document).ready(function(){
  jQuery(".lan ").click(function(){
      $("nav ul .showlist ").toggleClass("show");       
  });
});

