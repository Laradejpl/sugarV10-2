window.addEventListener("load", function () {
    console.log("Page entièrement chargée");
    document.getElementById('modalPolilik').style.display="block";
   
});

function closePolitik()
{
    document.getElementById('modalPolilik').style.display="none";

}

$(document).ready(function() {
	// variables
	var height = $('#bi-min a').height();
	var timeout = 0;
	var duration = 600;
	
	// La boucle
	function nextA() {
		if($('#bi-min:animated').length) {
			// l'animation n'est pas terminee
			return;
		}
		
		clearTimeout(timeout);
		
		$('#bi-min')
			.css({bottom: 0})
			.animate({bottom: -height}, duration);
		
		
		$('#bi-min a:last-child').prependTo('#bi-min');
		$('#bi-min a:last-child').clone()
			.css({opacity: 0})
			.appendTo('#bi-max')
			.animate({opacity: 1}, duration, function() {
				// complete
				if($('#bi-max a').length >= 2) {
					$('#bi-max a:eq(0)').remove();
				}
			});
		
		timeout = setTimeout(function() {
			nextA();
		}, 5000);
	}
	
	// events
	$('#block-itunes')
		.mouseenter(function() {
			$('#bi-button').stop().animate({opacity: 1});
		})
		.mouseleave(function() {
			$('#bi-button').stop().animate({opacity: 0});
		});
	$('#bi-button')
		.css({opacity: 0})
		.bind('keydown mousedown', function(){
			$(this).addClass('btn-down');
		})
		.bind('keyup blur mouseup mouseleave', function(){
			$(this).removeClass('btn-down');
		})
		.click(function() {
			nextA();
		});
	
	// start
	nextA();
});


