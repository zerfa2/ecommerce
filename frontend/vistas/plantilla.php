<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="title" content="Tienda Virtual">
	<meta name="description" content="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500">
	<meta name="keyword" content="Lorem, Ipsum, is simply dummy, text, printing , typesetting, industry ">

	<title>Tienda Virtual</title>
	
	<!--=====================================
	MANTENER LA RUTA FIJA DEL PROYECTO
	======================================-->
	<?php 
		session_start();
		$servidor = Ruta::mdlServidor();
    	echo '<link rel="shortcut icon" href="'.$servidor.'vistas/img/plantilla/icono.png">';
		$url = Ruta::mdlRuta();
		// var_dump($ruta);


	 ?>
	
	

	<link rel="stylesheet" type="text/css" href="<?php echo $url;  ?>vistas/css/plugins/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url;  ?>vistas/css/plugins/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?php echo $url;  ?>vistas/css/plantilla.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url;  ?>vistas/css/cabezote.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url;  ?>vistas/css/slide.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url;  ?>vistas/css/productos.css">

	<script type="text/javascript" src="<?php echo $url;  ?>vistas/js/plugins/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $url;  ?>vistas/js/plugins/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $url;  ?>vistas/js/plugins/jquery.easing.js"></script>
	<script type="text/javascript" src="<?php echo $url;  ?>vistas/js/plugins/jquery.scrollUp.js"></script>



</head>
<body>

<?php 

/*=============================================
CABEZOTE
=============================================*/

include "modulos/cabezote.php";

/*=============================================
CONTENIDO DINAMICO
=============================================*/

$rutas = array();
$ruta=null;
if(isset($_GET['ruta'])){
	$rutas = explode('/', $_GET['ruta']);
	// var_dump($rutas[0]);
	$item = 'ruta';
	$valor = $rutas[0];
	/*=============================================
	URL AMIGABLES DE CATEGORIAS
	=============================================*/
	$rutaCategorias = ProductosControlador::ctrMostrarCategorias($item,$valor);

  	// var_dump($rutaCategorias["ruta"]);

	if($valor == $rutaCategorias["ruta"] ){
		$ruta = $valor;
	}
	/*=============================================
	URL AMIGABLES DE SUBCATEGORIAS
	=============================================*/
	$rutaSubCategoria = ProductosControlador::ctrMostrarSubCategorias($item,$valor);

	// var_dump($rutaSubCategoria[0]["ruta"]);
	foreach ($rutaSubCategoria as $key => $value) {
		if($rutas[0] == $value['ruta']){
			$ruta = $rutas[0];
		}
	}
	/*=============================================
	URL AMIGABLES DE PRODUCTOS
	=============================================*/
	$rutaProductos = productosControlador::ctrMostrarInfoProducto($item,$valor);
	if($rutas[0] == $rutaProductos["ruta"] ){
		$infoProducto = $rutas[0];
	}


	/*=============================================
	LISTA BLANCA DE URL AMIGABLES
	=============================================*/
	if($ruta!=null || $rutas[0] == "articulos-gratis" || $rutas[0] == "lo-mas-vendido" || $rutas[0] == "lo-mas-visto"){
		include "modulos/productos.php";
	}else if ($infoProducto !=null){
		include "modulos/infoProducto.php";
	}else{
		include "modulos/error404.php";

	}

}else{
	include "modulos/slide.php";
	include "modulos/destacados.php";

}


?>
<!-- <input type="hidden" name="<?php echo $url; ?>" id="rutaOculta"> -->

<script type="text/javascript" src="<?php echo $url;  ?>vistas/js/cabezote.js"></script>
<script type="text/javascript" src="<?php echo $url;  ?>vistas/js/slide.js"></script>
<script type="text/javascript" src="<?php echo $url;  ?>vistas/js/plantilla.js"></script>


</body>
</html>