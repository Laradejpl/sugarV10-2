




function openNav()
{
document.getElementById("mysidenav").style.width ="200px";



 

}

function closeNav(){

  document.getElementById("mysidenav").style.width ="0px";
 

  
}

let etatMenu = 0;

function slideToggle()
{
  if (etatMenu == 0) {
    //console.log("ouvrir");
    openNav();//fonction ouvert
    etatMenu = 1;//1 est affecter a etatMenu
   console.log("ca marche");
   
}else {
  //console.log("fermer");
  closeNav();//fonction fermer
  etatMenu = 0;//0 est affecter a etatMenu
}




}


