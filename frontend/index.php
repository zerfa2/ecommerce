<?php 
	require_once "controladores/plantillaControlador.php";
	require_once "controladores/productosControlador.php";

	require_once "modelos/ProductoModelo.php";
	require_once "modelos/Ruta.php";
	$plantilla = new PlantillaControlador();
	$plantilla->plantilla();


 ?>