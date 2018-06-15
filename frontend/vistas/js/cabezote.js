/*=================================
CABEZOTE
=================================*/


$("#btnCategoria").click(function(){
	if(window.matchMedia("(max-width:767px)").matches){
		$("#btnCategoria").after($("#categorias").slideToggle('fast'));
	}else{
		$("#cabezote").after($("#categorias").slideToggle('fast'));
	}
})