(function(){
 var video = document.getElementById('video'),
 vendorUrl = window.Url  || window.webkitURL;
 navigator.getMedia =   navigator.getUserMedia ||
                        navigator.webkitGetUserMedia ||
                        navigator. mozGetUserMedia ||
                        navigator.msGetUserMedia ;
//captureer la video 
navigator.getMedia({

    video:true,
    audio:false
},function(stream){
   video.scr = vendorUrl.createObjectURL(stream);
   video.play();
    

  }, function (error){
      //mettre le code d'erreur
      
  });                       
 
})();