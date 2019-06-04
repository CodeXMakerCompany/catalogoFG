/*=============================================
CARRUSEL
=============================================*/

$('.flexslider').flexslider({

    animation: "slide",
    animationLoop: false,
    itemWidth: 210,
    itemMargin: 5,
    mousewheel: true,
    rtl: true

  });

$(".flexslider ul li img").click(function(){

	var capturaIndice = $(this).attr("value");

	$(".infoproducto figure.visor img").hide();

	$("#lupa"+capturaIndice).show();

});

/*=============================================
EFECTO LUPA
=============================================*/
$(".infoproducto figure.visor img").mouseover(function(event){

	var capturaImg = $(this).attr("src");

	$(".infoproducto figure.visor img").css({
		"margin-top": "10px",
		"background-color": "black",
		"border-color": "black",
		"border-radius": "4px"

	})

	$(".lupa img").attr("src", capturaImg);

	$(".lupa").fadeIn("fast");

	$(".lupa").css({

		"height":$(".visorImg").height()+"px",

	})
	
});

$(".infoproducto figure.visor img").mouseout(function(event){

	$(".lupa").fadeOut("fast");
})

$(".infoproducto figure.visor img").mousemove(function(event){

	var posX = event.offsetX;
	var posY = event.offsetY;

	$(".lupa img").css({

		"margin-left":-posX+"px",
		"margin-top":-posY+"px"
		
	})

})