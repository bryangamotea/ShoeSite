$(document).ready(function(){
	

	$('#LeBron').fadeIn(4000);
	$('#Kobe').fadeIn(6000);
	$('#KD').fadeIn(8000);

	$("#logo").mouseenter(function(){

		$(this).animate({opacity:'1'},900);


	});

	$("#logo").mouseleave(function(){

		$(this).animate({opacity:'0.6'},900);
	});


});