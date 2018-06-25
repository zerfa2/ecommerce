/*=============================================
CARRUSEL
=============================================*/


$(".flexslider").flexslider({
	animation: "slide",
	controlNav: true,
    animationLoop: false,
    slideshow: false,
    itemWidth: 100,
    itemMargin: 5
})

$(".flexslider ul li img").click(function(){
	var capturarIndice = $(this).attr("value");
	$(".infoProducto figure.visor img").hide();
	$("#lupa"+capturarIndice).show();
})

// Efecto Lupa
$(".infoProducto figure.visor img").mouseover(function(event){
	var capturaImg = $(this).attr("src");
	$(".lupa img").attr("src",capturaImg); 
	$(".lupa").fadeIn("fast");
	$(".lupa").css({
		"height" : $("visorImg").height()+"px",
		"background" : "#eee",
		"width":"100%"
	});

})

$(".infoProducto figure.visor img").mouseout(function(event){
	$(".lupa").fadeOut("fast");
})

$(".infoProducto figure.visor img").mousemove(function(event){
	var posX=event.offsetX;
	var posY=event.offsetY;
	$(".lupa img").css({
		"margin-left" : -posX+"px",
		"margin-top" : -posY+"px"

	});
})
/*=============================================
CONTADOR DE VISTAS
=============================================*/
var contador = 0;
$(window).on("load",function(){
	var vistas = $("span.vistas").html();
	contador = Number(vistas) +1;
	$("span.vistas").html(contador);
	var precio = $("span.vistas").attr("precio");

	if(precio == 0){
		var item = "vistasGratis";
	}else{
		var item = "vistas";
	}

	var urlActual = location.pathname;
	var ruta = urlActual.split("/");
	var rutanew =ruta.pop();

	// var datos = new FormData();
	// datos.append("valor",contador);
	// datos.append("item",item);
	// datos.append("ruta",rutanew);
	// console.log(rutaOculta);
	var datas = 'valor='+contador+'&item='+item+'&ruta='+rutanew;
	$.ajax({
		url: rutaOculta+"ajax/producto.ajax.php",
		method : "POST",
		data : datas,
		// cache: false,
		// contentType:false,
		// processType:false,
		success: function(e){
			// console.log(e);
		}
	})

})