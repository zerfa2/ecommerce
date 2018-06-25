/*========================
PLANTILLA
========================*/
var rutaOculta  = $("#rutaOculta").val();


// Herramienta TOOLTIP
$('[data-toggle="tooltip"]').tooltip();


/*========================
CUADRICULA O LISTA
========================*/
var btnList = $(".btnList");
for (var i = 0 ; i < btnList.length; i++) {
	$("#btnGrid"+i).click(function(){
		var numero = $(this).attr('id').substr(-1);
		$(".grid"+numero).show();
		$(".list"+numero).hide();
		$("#btnGrid"+numero).addClass("backColor");
		$("#btnList"+numero).removeClass("backColor");
	})
	$("#btnList"+i).click(function(){
		var numero = $(this).attr('id').substr(-1);
		$(".grid"+numero).hide();
		$(".list"+numero).show();
		$("#btnGrid"+numero).removeClass("backColor");
		$("#btnList"+numero).addClass("backColor");
	})
}

/*========================
EFECTOS SCROLL
========================*/
var ban=$(".banner").val();
if(ban!=null){
	$(window).scroll(function(){
		var scrollY = window.pageYOffset;
		if(window.matchMedia("(min-width:768px)").matches){
			if(scrollY < ($(".banner").offset().top)-200){
				$(".banner img").css({"margin-top":-scrollY/2+"px"});
			}else{
				scrollY = 0;
			}
		}
	})
}
$.scrollUp({
	scrollText:"",
	scrollSpeed:2000,
	easingType:"easeOutQuint"


});

/*=============================================
MIGAS DE PAN BREADCRUMP
=============================================*/
var paginaActiva = $(".paginaActiva").html();
if(paginaActiva !=null){
	var regPaginaActiva = paginaActiva.replace(/-/g," ");
	$(".paginaActiva").html(regPaginaActiva);
}
/*=============================================
ENLACE PAGINACION
=============================================*/
var urll = window.location.href;
var indice = urll.split("/");

var ultimo = indice.pop();
if( ultimo != "#"){
	
	$("#item"+ultimo).addClass("active");
}
var indiceBuscar = urll.split("/");
indiceBuscar.pop();
indiceBuscar.pop();
var ultimoBuscar = indiceBuscar.pop();
$("#item"+ultimoBuscar).addClass("active");