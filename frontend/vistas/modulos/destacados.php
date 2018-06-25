<?php 
	$servidor = Ruta::mdlServidor();
	$url = Ruta::mdlRuta();
	$ruta= "sin-categoria";
	$banner = ProductosControlador::ctrMostrarBanner($ruta);
	$titulo1 = json_decode($banner["titulo1"],true);
	$titulo2 = json_decode($banner["titulo2"],true);
	$titulo3 = json_decode($banner["titulo3"],true);

	// var_dump($banner["titulo1"]);
	echo '
	<figure class="banner">
		<img src="'.$servidor.$banner["imagen"].'" class="img-responsive" width="100%">
		<div class="textoBanner '.$banner["estilo"].'">
			<h1 style="color:'.$titulo1["color"].'">'.$titulo1["texto"].'</h1>
			<h2 style="color:'.$titulo2["color"].'"><strong>'.$titulo2["texto"].'</strong></h2>
			<h3 style="color:'.$titulo3["color"].'"><strong>'.$titulo3["texto"].'</strong></h3>
		
		</div>

	</figure>';



?>
<!--=====================================
BANNER
======================================-->


<?php 
$titulosModulos = array("ARTICULOS GRATUITOS","LO MAS VENDIDO","LO MAS VISTO");
$rutaModulos = array("articulos-gratis","lo-mas-vendido","lo-mas-visto");
$base = 0;
$tope = 4;
if($titulosModulos[0] == "ARTICULOS GRATUITOS"){
	$item ='precio';
	$valor= 0;
	$ordenar = 'idproducto';
	$modo= "DESC";
	$gratis = ProductosControlador::ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo);
}

if($titulosModulos[1] == "LO MAS VENDIDO"){
	$item =null;
	$valor= null;
	$ordenar = 'ventas';
	$modo= "DESC";
	$ventas = ProductosControlador::ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo);
}

if($titulosModulos[2] == "LO MAS VISTO"){
	$item =null;
	$valor= null;
	$ordenar = 'vistas';
	$modo= "DESC";
	$vistas = ProductosControlador::ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo);
}
$modulos = array($gratis,$ventas,$vistas);

for ($i=0; $i <count($titulosModulos) ; $i++) { 
	echo '
	<!--=====================================
	BARRA PRODUCTOS GRATIS
	======================================-->
	<div class="container-fluid well well-sm barraProductos">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 organizarProductos">
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-default btnGrid" id="btnGrid'.$i.'">
							<i class="fa fa-th" aria-hidden="true"></i>
							<span class="col-xs-0 pull-right">GRID</span>		
						</button>
						<button type="button" class="btn btn-default btnList" id="btnList'.$i.'">
							<i class="fa fa-list" aria-hidden="true"></i>
							<span class="col-xs-0 pull-right">LIST</span>		
						</button>
					</div>

				</div>
			</div>
		</div>	
	</div>
	<!--=====================================
	VITRINA DE PRODUCTOS GRATIS
	======================================-->
	<div class="container-fluid productos">
		<div class="container">
			<div class="row">
				<!--=====================================
				BARRA TITULO
				======================================-->
				<div class="col-xs-12 tituloDestacado">
					<div class="col-sm-6 col-xs-12">
						<h1><small>'.$titulosModulos[$i].'</small></h1>
					</div>
					<div class="col-sm-6 col-xs-12">
						<a href="'.$rutaModulos[$i].'">
							<button class="btn btn-default backColor pull-right">
								VER MAS <span class="fa fa-chevron-right"></span>
							</button>
						</a>
					</div>
				</div class="clearfix">

				<hr>

			</div>
			<!--=====================================
			VITRINA DE PRODUCTOS EN CUADRICULA
			======================================--><div class="hh"></div>
			<ul class="grid'.$i.'"  >';
			foreach ($modulos[$i] as $key => $value) {
				echo '<!-- producto  -->
					<li class="col-md-3 col-sm-6 col-xs-12">
						<figure>
							<a href="'.$value["ruta"].'" class="pixelProducto">
								<img src="'.$servidor.$value["portada"].'" class="img-responsive">
							</a>
						</figure>

						<h4>
							<small>
								<a href="'.$value["ruta"].'" class="pixelProducto">
									'.$value["titulo"].'<br>
									<span style="color: rgba(0,0,0,0)">-</span>
									';
									if ($value["nuevo"]!=0) {
										echo '<span class="label label-warning fontSize">Nuevo</span>';
									}
									if($value["oferta"]!=0){
										echo ' <span class="label label-warning fontSize">'.$value["descuentoOferta"].'% off</span>';
									}
							echo '</a>
							</small>
						</h4>

						<div class="col-xs-6 precio">';
						if($value["precio"] == 0){
							echo '<h2><small>GRATIS</small></h2>';
						}else{
							if($value["oferta"]!=0){
								echo '
									<h2>
										<small>
										<strong class="oferta">USD $'.$value["precio"].'</strong>
										</small>
										<small>$'.$value["precioOferta"].'</small>
									</h2>';


							}else{
								echo '<h2><small>USD $'.$value["precio"].'</small></h2>';
								
							}

						}
						echo '</div>

						 <div class="col-xs-6 enlaces">
							<div class="btn-group pull-right">
								<button type="button" class="btn btn-default btn-xs deseos" idProducto="'.$value["idproducto"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">
									<i class="fa fa-heart" aria-hidden="true"></i>
								</button>';


								if($value["tipo"]=="virtual"){
									if($value["oferta"]!=0){
									echo '
							<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["idproducto"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</button>
									';
									}else{

									

									echo '
							<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["idproducto"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</button>
									';
								}
							}

							echo '<a href="'.$value["ruta"].'" class="pixelProducto">
									<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
										<i class="fa fa-eye" aria-hidden="true"></i>
									</button>
								</a>
							</div>
						</div>

					</li>';
			}
			echo '	
			</ul>
			<!--=====================================
			VITRINA DE PRODUCTOS EN LISTA
			======================================--><div class="hh"></div>
			<ul class="list'.$i.'" style="display:none;">';
			foreach ($modulos[$i] as $key => $value) {
			
			echo '<!-- Productos -->
				<li class="col-xs-12">
					<!--========================-->
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<figure>  
							<a href="'.$value["ruta"].'" class="pixelProducto">
								<img src="'.$servidor.$value["portada"].'" class="img-responsive">
							</a>
						</figure>
					</div>
					<!--========================-->
					<div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">
						<h1>
							<small>
								<a href="'.$value["ruta"].'" class="pixelProducto">
									'.$value["titulo"].'
								</a> ';
								if ($value["nuevo"]!=0) {
										echo '<span class="label label-warning fontSize">Nuevo</span>';
									}
									if($value["oferta"]!=0){
										echo ' <span class="label label-warning fontSize">'.$value["descuentoOferta"].'% off</span>';
									}
							echo'</small>
						</h1>
						<p class="text-muted">'.$value["titular"].'</p>';
						if($value["precio"] == 0){
							echo '<h2><small>GRATIS</small></h2>';
						}else{
							if($value["oferta"]!=0){
								echo '
									<h2>
										<small>
										<strong class="oferta">USD $'.$value["precio"].'</strong>
										</small>
										<small>$'.$value["precioOferta"].'</small>
									</h2>';


							}else{
								echo '<h2><small>USD $'.$value["precio"].'</small></h2>';
								
							}

						}
					echo'<div class="btn-group pull-left enlaces">
								<button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">
									<i class="fa fa-heart" aria-hidden="true"></i>
								</button>';
							if($value["tipo"]=="virtual"){
								if($value["oferta"]!=0){
									echo '
							<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["idproducto"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</button>
									';
									}else{
									echo '
							<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["idproducto"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</button>
									';
								}
							}
							

							echo'<a href="'.$value["ruta"].'" class="pixelProducto">
									<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
										<i class="fa fa-eye" aria-hidden="true"></i>
									</button>
								</a>
						</div>
					</div>
					<!-- ========================= -->
					<div class="col-xs-12">
						<hr>
						
					</div>
					<!-- ========================= -->

				</li>';
			}
			
			echo '</ul>

		</div>
	</div>

	';
}

 ?>


		
