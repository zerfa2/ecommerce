<?php 
	$servidor = Ruta::mdlServidor();
	$url = Ruta::mdlRuta();

?>
 
<figure class="banner">
	<img src="<?php echo $servidor; ?>vistas/img/banner/default.jpg" class="img-responsive" width="100%">
	<div class="textoBanner textDer">
		<h1 style="color:#fff">OFERTAS ESPECIALES</h1>
		<h2 style="color:#fff"><strong>50% off</strong></h2>
		<h3 style="color:#fff"><strong>Termina el 31 de octubre</strong></h3>
	
	</div>

</figure>
<!--=====================================
	BARRA PRODUCTOS GRATIS
	======================================-->
	<div class="container-fluid well well-sm barraProductos">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="btn-group">
						<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Ordenar productos<span class="caret"></span></button>
						<ul class="dropdown-menu" rol="menu">
							<?php 
							echo '<li><a href="'.$url.$rutas[0].'/1/recientes">Mas reciente</a></li>
								<li><a href="'.$url.$rutas[0].'/1/antiguos">Mas antiguo</a></li>';

							 ?>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12 organizarProductos">
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-default btnGrid" id="btnGrid0">
							<i class="fa fa-th" aria-hidden="true"></i>
							<span class="col-xs-0 pull-right">GRID</span>		
						</button>
						<button type="button" class="btn btn-default btnList" id="btnList0">
							<i class="fa fa-list" aria-hidden="true"></i>
							<span class="col-xs-0 pull-right">LIST</span>		
						</button>
					</div>

				</div>
			</div>
		</div>	
	</div>
	<div class="container-fluid productos">
		<div class="container">
			<div class="row">
				<!--=====================================
				MIGA DE PAN
				======================================-->
				<ul class="breadcrumb fondoBreadcrumb lead">
					<li><a href="<?php echo $url; ?>">Inicio</a></li>
					<li class="activo paginaActiva"><?php echo $rutas[0]; ?></li>
				</ul>
				<!--=====================================
				BARRA TITULO
				======================================-->
				<!-- <div class="col-xs-12 tituloDestacado">
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

				<hr> -->

			<!-- </div> -->
			<!--=====================================
			LLAMADOS DE PAGINACION
			======================================-->
			<?php 
				if(isset($rutas[1])){
					if(isset($rutas[2])){
						if($rutas[2] == "recientes"){
							$modo = "DESC";
							$_SESSION["ordenar"] = "DESC";

						}else{
							$modo = "ASC";
							$_SESSION["ordenar"] = "ASC";

						}
					}else{
						$modo = $_SESSION["ordenar"];
					}

					// $pag = $rutas[1];
					$base = ($rutas[1]-1)*12;
					$tope = 12;
				}else{
					$rutas[1]=1;
					$base = 0;
					$tope = 12;
					$modo = "DESC";

				}


				
			 ?>
					
			


			<!--=====================================
			LLAMADOS DE PRODUCTOS CATREGORIA, SUBCATEGORIA Y DESTACADOS
			======================================-->
			

			<?php 

				if($rutas[0] == "articulos-gratis" ){
					$ordenar = "idproducto";
					$item2 = "precio";
					$valor2 = 0;

				}else if($rutas[0] == "lo-mas-vendido"){
					$ordenar = "ventas";
					$item2 = null;
					$valor2 = null;

				}else if($rutas[0] == "lo-mas-visto"){
					$ordenar = "vistas";
					$item2 = null;
					$valor2 = null;

				}else{
					$ordenar = "idproducto";
					$item1 = "ruta";
					$valor1 = $rutas[0];
					
					$categoria = productosControlador::ctrMostrarCategorias($item1,$valor1);
					if(!$categoria){
						$subcategoria = productosControlador::ctrMostrarSubCategorias($item1,$valor1);
						$item2 = "idsubcategoria";
						$valor2 = $subcategoria[0]["idsubcategoria"];
					}else{
						$item2 = "idcategoria";
						$valor2 = $categoria["idcategoria"];
					}
				}
				
				// $base = 0;
				// $tope = 12;

				$productos = ProductosControlador::ctrMostrarProductos($ordenar,$item2,$valor2,$base,$tope,$modo);
				$listarproductos = ProductosControlador::ctrListarProductos($ordenar,$item2,$valor2);
				// var_dump(count($productos));
				if(!$productos){

					echo ' <div class="col-xs-12 text-center error404">
								<h1>Oops!</h1>
								<h2>Aún no hay productos en esta sección</h2>
						   </div>';


				}else{
					echo '<ul class="grid0">';
							foreach ($productos as $key => $value) {
							echo '<!-- producto  -->
								<li class="col-md-3 col-sm-6 col-xs-12">
									<figure>
										<a href="'.$value["ruta"].'" class="pixelProducto">
											<img src="'.$servidor.$value["portada"].'" class="img-responsive">
										</a>
									</figure>
									'.$value["idproducto"].'
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
						<ul class="list0" style="display:none;">';
						foreach ($productos as $key => $value) {
						
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
						
						echo '</ul>';
				}
// var_dump(count($listarproductos));
			 ?>
		 <div class="clearfix"></div>
			 	
			 <center>
			 	<!--=====================================
				PAGINACION
			 	======================================-->
			 	
			 	
			 	
			 	<?php 
			 	if(count($listarproductos)!= 0){
			 		$pagProductos = ceil(count($listarproductos)/12);
			 		if($pagProductos >4){
			 			if($rutas[1] == 1){
				 			echo ' <ul class="pagination">';
				 			for ($i=1; $i <= 4  ; $i++) { 
					 			echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
				 				
				 			}  
				 			echo '<li><a class="disabled">...</a></li>
					 				<li><a href="'.$url.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
					 				<li><a href="'.$url.$rutas[0].'/2"><i class="fa fa-angle-right"></i></a></li>
					 				</ul>';
			 				
			 			}

			 			/*==================================================================
			 			BOTONES DE LA MITAD DE PAGINAS HACIA ABAJO
			 			==================================================================*/
			 			else if($rutas[1] != $pagProductos &&
			 					$rutas[1] != 1 &&
			 					$rutas[1] < ($pagProductos/2) &&
			 					$rutas[1] < ($pagProductos-3)){
			 					$pagActual = $rutas[1];
			 					echo ' <ul class="pagination">
			 						<li><a href="'.$url.$rutas[0].'/'.($pagActual-1).'"><i class="fa fa-angle-left"></i></a></li>
			 					';
					 			for ($i=$pagActual; $i <= ($pagActual+3) ; $i++) { 
						 			echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
					 				
					 			}  
					 			echo '<li class="disabled"><a>...</a></li>
						 				<li><a href="'.$url.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
						 				<li><a href="'.$url.$rutas[0].'/'.($pagActual+1).'"><i class="fa fa-angle-right"></i></a></li>
						 				</ul>';
			 			}
			 			/*==================================================================
			 			BOTONES DE LA MITAD DE PAGINAS HACIA ARRIBA
			 			==================================================================*/
			 			else if($rutas[1] != $pagProductos &&
			 					$rutas[1] != 1 &&
			 					$rutas[1] >= ($pagProductos/2) &&
			 					$rutas[1] < ($pagProductos-3)){
			 					$pagActual = $rutas[1];
			 					echo ' <ul class="pagination">
			 						<li><a href="'.$url.$rutas[0].'/'.($pagActual-1).'"><i class="fa fa-angle-left"></i></a></li>
			 						<li><a href="'.$url.$rutas[0].'/1">1</a></li>
			 						<li class="disabled"><a>...</a></li>
			 					';
					 			for ($i=$pagActual; $i <= ($pagActual+3) ; $i++) { 
						 			echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
					 				
					 			}  
					 			echo '
						 				<li><a href="'.$url.$rutas[0].'/'.($pagActual+1).'"><i class="fa fa-angle-right"></i></a></li>
						 				</ul>';
			 			}
			 			/*==================================================================
			 			BOTONES DE LAS ULTIMAS 4 PAGINAS
			 			==================================================================*/
			 			else{
			 				$pagActual = $rutas[1];

			 				echo '<ul class="pagination">

			 				<li><a href="'.$url.$rutas[0].'/'.($pagActual-1).'"><i class="fa fa-angle-left"></i></a></li>
			 				<li><a href="'.$url.$rutas[0].'/1">1</a></li>
			 				<li><a class="disabled">...</a></li>';
			 				for ($i=($pagProductos -3); $i <= $pagProductos  ; $i++) { 
					 			echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
				 				
				 			}  
				 			echo '</ul>';
			 			}		 			

			 		}else{
			 			// $pagActual = $rutas[1];

			 			echo ' <ul class="pagination">';
			 			for ($i=1; $i <= $pagProductos  ; $i++) { 
				 			echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
			 				
			 			}
			 			echo '</ul>';
			 		}


			 	}
			 	 ?>
			 </center>

			</div>
 		</div>
	</div>