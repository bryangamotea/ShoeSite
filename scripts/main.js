$(document).ready(function(){
	
	$('#LeBron').fadeIn(1000);
	$('#Kobe').fadeIn(3000);
	$('#KD').fadeIn(5000);

	$("#logo").mouseenter(function(){

		$(this).animate({opacity:'1'},900);


	});

	$("#logo").mouseleave(function(){

		$(this).animate({opacity:'0.6'},900);
	});

	$('#LeBron').mouseenter(function(){

		$(this).hide();
		$('#LeBron2').fadeIn(800);
	});

	$('#LeBron2').mouseleave(function(){

		$(this).hide();
		$('#LeBron').fadeIn(800);

	});

	$('#KD').mouseenter(function(){

		$(this).hide();
		$('#KD2').fadeIn(600);
	});

	$('#KD2').mouseleave(function(){

		$(this).hide();
		$('#KD').fadeIn(600);

	});


	$('#Kobe').mouseenter(function(){

		$(this).hide();
		$('#Kobe2').fadeIn(600);
	});

	$('#Kobe2').mouseleave(function(){

		$(this).hide();
		$('#Kobe').fadeIn(600);

	});

	$("#LoginButton").click(function(){
		$("#cart").hide();
		$("#Register").hide();
		$("#Login").toggle(1000);
	});

	$("#RegisterButton").click(function(){
		$("#Login").hide();
		$("#cart").hide();
		$("#Register").toggle(1000);
	});

	$("#cartButton").click(function() {
		$("#Login").hide();
		$("#Register").hide();
		$("#cart").toggle(1000);
	});

});