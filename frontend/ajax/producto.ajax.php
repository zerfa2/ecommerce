<?php 

	require_once "../controladores/productosControlador.php";
	require_once "../modelos/ProductoModelo.php";
	// require_once "../modelos/conexion.php";

Class AjaxProducto{

	public function ajaxVistaProducto($valor,$item,$ruta){
		// $rspta = Control
		
		$rspta = ProductosControlador::ctrActualizarVistaProducto($valor,$item,$ruta);
		echo $rspta;
	}

}

$vistas = new AjaxProducto();
// $cone = Conexion::conectar();
// $valor=isset($_POST['valor'])? mysqli_real_escape_string($cone,$_POST['valor']): "";
// $item=isset($_POST['item'])? mysqli_real_escape_string($cone,$_POST['item']): "";
// $ruta=isset($_POST['ruta'])? mysqli_real_escape_string($cone,$_POST['ruta']): "";
$valor=$_POST['valor'];
$item=$_POST['item'];
$ruta=$_POST['ruta'];
$vistas->ajaxVistaProducto($valor,$item,$ruta);