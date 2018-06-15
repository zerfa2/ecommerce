<?php 

	$servidor = Ruta::mdlServidor();

 ?>

<!--=====================================
=            TOP
======================================-->

<div class="container-fluid barraSuperior" id="top">
	<div class="container">
		<div class="row">
			<!--============================
			SOCIAL
			=============================-->
			
			<div class="col-lg-9 col-md-9 col-xs-8 col-xs-12 social">
				<ul>
					<li>
						<a href="http://facebook.com/" target="_blank">
							<i class="fa fa-facebook redSocial facebookBlanco" aria-hidden="true"></i>
						</a>
					</li>
					
					<li>
						<a href="http://youtube.com/" target="_blank">
							<i class="fa fa-youtube redSocial youtubeBlanco" aria-hidden="true"></i>
						</a>
					</li>

					<li>
						<a href="http://twitter.com/" target="_blank">
							<i class="fa fa-twitter redSocial twitterBlanco" aria-hidden="true"></i>
						</a>
					</li>

					<li>
						<a href="http://google.com/" target="_blank">
							<i class="fa fa-google-plus redSocial googleBlanco" aria-hidden="true"></i>
						</a>
					</li>

					<li>
						<a href="http://instagram.com/" target="_blank">
							<i class="fa fa-instagram redSocial instagramBlanco" aria-hidden="true"></i>
						</a>
					</li>
				</ul>

			</div>
			<!--=====================================
			REGISTRO
			======================================-->
			
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro">
				<ul>
					<li><a href="#modalIngreso" data-toggle="modal">Ingresar</a></li>
					<li>|</li>
					<li><a href="#modalRegistro" data-toggle="modal">Crear una cuenta</a></li>
				</ul>
			</div>
			
		</div>
	</div>

</div>

<!--=====================================
HEADER
======================================-->
<header class="container-fluid">
	<div class="container">
		<div class="row" id="cabezote">
			<!--=====================================
			LOGOTIPO
			======================================-->
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="logotipo">
				<a href="<?php echo $url; ?>">
					<img src="<?php echo $servidor; ?>vistas/img/plantilla/logo.png" class="img-responsive">
				</a>
			</div>
			<!--=====================================
			BLOQUE CATEGORIAS Y BUSCADOR
			======================================-->
			<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12" id="logotipo">
				<!--=====================================
				BOTON CATEGORIA
				======================================-->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 backColor" id="btnCategoria">
					<p>CATEGORIAS
						<span class="pull-right">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</span>
					</p>
				</div>
				<!--=====================================
				BUSCADOR
				======================================-->

				<div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12 backColor" id="buscador">
					<input type="search" name="buscar" class="form-control" placeholder="Buscar...">
					<span class="input-group-btn">
						<a href="#">
							<button class="btn btn-default backColor" type="submit">
								<i class="fa fa-search" aria-hidden="true"></i>								
							</button>
						</a>
					</span>
				</div>
			</div>
			<!--=====================================
			CARRITO
			======================================-->
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="carrito">
				<a href="#">
					<button class="btn btn-default pull-left backColor">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</button>
				</a>
				<p>TU CESTA <span class="cantidadCesta"></span><br> USD $ <span class="sumaCesta"></span></p>
			</div>
			
			
		</div>

			<!--=====================================
			CATEGORIAS
			======================================-->
			<div class="col-xs-12 backColor" id="categorias" >
				<?php 
					$item=null;
					$valor=null;
					$categorias = ProductosControlador::ctrMostrarCategorias($item,$valor);
					foreach ($categorias as $key => $value) {

						
				 
				echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
					<h4>
						<a href="'.$url.$value['ruta'].'" class="pixelCategorias">'.$value['categoria'].'</a>
					</h4>
					<hr>
					<ul>';
					$item="idcategoria";
					$valor=$value['idcategoria'];
					$subcategorias = new ProductosControlador();
					$sub = $subcategorias->ctrMostrarSubCategorias($item,$valor);
						foreach ($sub as $key => $value) {
							echo'<li><a href="'.$url.$value['ruta'].'" class="pixelSubCategorias">'.$value['subcategoria'].'</a></li>';
						}

					echo '</ul>
					</div>';
				
				}
				?>
			</div>


	</div>

</header>