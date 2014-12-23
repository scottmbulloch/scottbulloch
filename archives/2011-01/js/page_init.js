
$(document).ready(function() {
  
  $(function(){
    $('a').click(function(){
      var targetID = $(this).attr('href');
      var targetPos = $(targetID).offset().top
      $('html, body').animate({scrollTop: targetPos-15}, 800);
      return false;
    });
  });

});

function rollin(id){
  var roller = document.getElementById(id);
  switch(id){
	case 'yellow': roller.style.background = 'transparent url(img/nav_menu.png) 0px -37px no-repeat'; break;
	case 'red': roller.style.background = 'transparent url(img/nav_menu.png) 0px -111px no-repeat'; break;
	case 'green': roller.style.background = 'transparent url(img/nav_menu.png) 0px -185px no-repeat'; break;
	case 'purple': roller.style.background = 'transparent url(img/nav_menu.png) 0px -259px no-repeat'; break;
	case 'blue': roller.style.background = 'transparent url(img/nav_menu.png) 0px -333px no-repeat'; break;
	case 'kimsclasses': roller.style.background = 'transparent url(img/sidebar/kimsclasses.jpg) 0px -70px no-repeat'; break;
	case 'hauntedhill': roller.style.background = 'transparent url(img/sidebar/hauntedhill.jpg) 0px -70px no-repeat'; break;
	case 'blacklight': roller.style.background = 'transparent url(img/sidebar/blacklight.jpg) 0px -70px no-repeat'; break;
	case 'pokernight': roller.style.background = 'transparent url(img/sidebar/pokernight.jpg) 0px -70px no-repeat'; break;
	case 'patspicks': roller.style.background = 'transparent url(img/sidebar/patspicks.jpg) 0px -70px no-repeat'; break;
	case 'jayati': roller.style.background = 'transparent url(img/sidebar/jayati.jpg) 0px -70px no-repeat'; break;
	case 'ecobadge': roller.style.background = 'transparent url(img/sidebar/ecobadge.jpg) 0px -50px no-repeat'; break;
	case 'validhtml': roller.style.background = 'transparent url(img/sidebar/validhtml.jpg) 0px -50px no-repeat'; break;
	case 'validcss': roller.style.background = 'transparent url(img/sidebar/validcss.jpg) 0px -50px no-repeat'; break;
  }
}
function rollout(id){
  var roller = document.getElementById(id);
  switch(id){
	case 'yellow': roller.style.background = 'transparent url(img/nav_menu.png) 0px 0px no-repeat'; break;
	case 'red': roller.style.background = 'transparent url(img/nav_menu.png) 0px -74px no-repeat'; break;
	case 'green': roller.style.background = 'transparent url(img/nav_menu.png) 0px -148px no-repeat'; break;
	case 'purple': roller.style.background = 'transparent url(img/nav_menu.png) 0px -222px no-repeat'; break;
	case 'blue': roller.style.background = 'transparent url(img/nav_menu.png) 0px -296px no-repeat'; break;
	case 'kimsclasses': roller.style.background = 'transparent url(img/sidebar/kimsclasses.jpg) 0px 0px no-repeat'; break;
	case 'hauntedhill': roller.style.background = 'transparent url(img/sidebar/hauntedhill.jpg) 0px 0px no-repeat'; break;
	case 'blacklight': roller.style.background = 'transparent url(img/sidebar/blacklight.jpg) 0px 0px no-repeat'; break;
	case 'pokernight': roller.style.background = 'transparent url(img/sidebar/pokernight.jpg) 0px 0px no-repeat'; break;
	case 'patspicks': roller.style.background = 'transparent url(img/sidebar/patspicks.jpg) 0px 0px no-repeat'; break;
	case 'jayati': roller.style.background = 'transparent url(img/sidebar/jayati.jpg) 0px 0px no-repeat'; break;
	case 'ecobadge': roller.style.background = 'transparent url(img/sidebar/ecobadge.jpg) 0px 0px no-repeat'; break;
	case 'validhtml': roller.style.background = 'transparent url(img/sidebar/validhtml.jpg) 0px 0px no-repeat'; break;
	case 'validcss': roller.style.background = 'transparent url(img/sidebar/validcss.jpg) 0px 0px no-repeat'; break;
  }
}