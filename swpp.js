function like(){  


  $.ajax({
      url:'like.php',
      success:function(data)
      {

          

      }


  });
      

      

};


$(document).ready(function(){

    $(".buddy").on("swiperight",function(){
      $(this).addClass('rotate-left').delay(700).fadeOut(1);
      console.log("right");
      document.getElementById('test').style.backgroundColor="lime";
      document.getElementById('test').innerHTML="OUIII!";
      
      $('.buddy').find('.status').remove();

      $(this).append('<div class="status like"><i class="fa fa-heart"></i></div>');      
      if ( $(this).is(':last-child') ) {
        $('.buddy:nth-child(1)').removeClass ('rotate-left rotate-right').fadeIn(300);
       } else {
          $(this).next().removeClass('rotate-left rotate-right').fadeIn(400);
       }
       like();
    });  

   $(".buddy").on("swipeleft",function(){
    $(this).addClass('rotate-right').delay(700).fadeOut(1);
    console.log("left");
    document.getElementById('test').style.backgroundColor="pink";
    document.getElementById('test').innerHTML="NOOON!";

    $('.buddy').find('.status').remove();
    $(this).append('<div class="status dislike"><i class="fa fa-remove"></i></div>');

    if ( $(this).is(':last-child') ) {
     $('.buddy:nth-child(1)').removeClass ('rotate-left rotate-right').fadeIn(300);
  
     } else {
        $(this).next().removeClass('rotate-left rotate-right').fadeIn(400);
    } 
  });

});