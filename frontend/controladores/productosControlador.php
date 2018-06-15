<?php 

class ProductosControlador{

	static public function ctrMostrarCategorias($item,$valor){
		$tabla = 'categoria';
		$rspta =  ProductoModelo::mdlMostrarCategorias($tabla,$item,$valor);
		return $rspta;
	}
	static public function ctrMostrarSubCategorias($item,$valor){
		$tabla = 'subcategoria';
		$rspta = ProductoModelo::mdlMostrarSubCategorias($tabla,$item,$valor);
		return $rspta;
	}
	static public function ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo){
		$tabla = 'producto';
		$rspta = ProductoModelo::mdlMostrarProductos($tabla,$ordenar,$item,$valor,$base,$tope,$modo);
		return $rspta;
	}
	public function ctrMostrarInfoProducto($item,$valor){
		$tabla = 'producto';
		$rspta = ProductoModelo::mdlMostrarInfoProducto($tabla,$item,$valor);
		return $rspta;
	}
	static public function ctrListarProductos($ordenar,$item,$valor){
		$tabla =  'producto';
		$rspta = ProductoModelo::mdlListarProductos($tabla,$ordenar,$item,$valor);
		return $rspta; 
	}
}


