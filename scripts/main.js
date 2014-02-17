$(document).ready(function(){
	
	$('#LeBron').fadeIn(1000);
	$('#Kobe').fadeIn(2000);
	$('#KD').fadeIn(3000);

	$("#logo").mouseenter(function(){

		$(this).animate({opacity:'1'},900);
	});

	$("#logo").mouseleave(function(){

		$(this).animate({opacity:'0.6'},900);
	});

	$('#players').mouseenter(function(){
		$('#LeBron').hide();
		$('#KD').hide();
		$('#Kobe').hide();
		$('#LeBron2').fadeIn(800);
		$('#Kobe2').fadeIn(800);
		$('#KD2').fadeIn(800);
	});

	$('#players').mouseleave(function(){
		$('#LeBron2').hide();
		$('#KD2').hide();
		$('#Kobe2').hide();
		$('#LeBron').fadeIn(800);
		$('#Kobe').fadeIn(800);
		$('#KD').fadeIn(800);
	});

	// $('#kobe').click(function(){
	// 	$('#search').hide();
	// 	$.ajax({
	// 		url: "shoes.php",
	// 		data: {category:'Kobe',
	// 			   pic1:'"images/KobeLogo.png"',
	// 			   pic2:'"images/Kobe4.png"',
	// 			   pic3:'"images/Kobe2.png"',
	// 			   pic4:'"images/mambamamba.png"',
	// 				},
	// 		type:"GET",
	// 		success:function(result){
	// 			$('.content_two').html(result);
	// 	}});
	// });

	function loadShoesPage(player,image1,image2,image3,image4){

		$.ajax({
			url: "shoes.php",
			data: {category:player,
				   pic1: image1,
				   pic2: image2,
				   pic3: image3,
				   pic4: image4,
					},
			type:"GET",
			success:function(result){
				$('.content_two').html(result);
		}});
	}

	$('#kobe').click(function(){
		loadShoesPage('Kobe',
					'"images/KobeLogo.png"',
					'"images/Kobe4.png"',
					'"images/Kobe2.png"',
					'"images/mambamamba.png"'
					);
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