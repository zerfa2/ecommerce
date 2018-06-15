CREATE TABLE categoria(
	idcategoria int primary key not null AUTO_INCREMENT,
	categoria text not null,
	ruta text not null,
	fecha timestamp not null
);
CREATE TABLE subcategoria(
	idsubcategoria int primary key not null AUTO_INCREMENT,
	subcategoria text not null,
	 constraint subcategoria_categoria_fk foreign key (idcategoria) references categoria(idcategoria),
	idcategoria int not null,
	ruta text not null,
	fecha timestamp not null
	

);

CREATE TABLE banner(
	idbanner int primary key not null AUTO_INCREMENT,
	ruta text not null,
	imagen text not null,
	titulo1 text not null,
	titulo2 text not null,
	titulo3 text not null,
	estilo text not null,
	fecha  timestamp not null
);
CREATE TABLE producto(
	idproducto int primary key not null AUTO_INCREMENT,
	idcategoria int not null,
	idsubcategoria int not null,
	tipo text not null,
	ruta text not null,
	titulo text not null,
	titular text not null,
	descripcion text not null,
	detalles text not null,
	precio float not null,
	portada text not null,
	vistas int not null,
	ventas int not null,
	vistasGratis int not null,
	ventasGratis int not null,
	ofertadoCategoria int not null,
	ofertadoSubCategoria int not null,
	oferta int not null,
	precioOferta float not null,
	descuentoOferta int not null,
	imgOferta text not null,
	finOferta datetime not null,
	nuevo int not null,
	peso float not null,
	entrega float not null,
	fecha timestamp not null,
	constraint producto_categoria_fk foreign key(idcategoria) references categoria(idcategoria),
	constraint producto_subcategoria_fk foreign key(idsubcategoria) references subcategoria(idsubcategoria)

);
insert into categoria(idcategoria,categoria,ruta) values('1','ROPA','ropa');
insert into categoria(idcategoria,categoria,ruta) values('1','CALZADO','calzado');
insert into categoria(idcategoria,categoria,ruta) values('1','ACCESORIOS','accesorios');
insert into categoria(idcategoria,categoria,ruta) values('1','TECNOLOGIA','tecnologia');
insert into categoria(idcategoria,categoria,ruta) values('1','CURSOS','cursos');
	
	
insert into subcategoria(subcategoria,idcategoria,ruta) values('Ropa para dama','1','ropa-para-dama');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Ropa para hombre','1','ropa-para-hombre');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Ropa deportiva','1','ropa-deportiva');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Ropa infantil','1','ropa-infantil');

insert into subcategoria(subcategoria,idcategoria,ruta) values('Calzado para dama','2','calzado-para-dama');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Calzado para hombre','2','calzado-para-hombre');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Calzado deportiva','2','calzado-deportiva');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Calzado infantil','2','calzado-infantil');

insert into subcategoria(subcategoria,idcategoria,ruta) values('Bolsos','3','bolsos');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Relojes','3','relojes');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Pulseras','3','pulseras');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Collares','3','collares');

insert into subcategoria(subcategoria,idcategoria,ruta) values('Telefono movil','4','telefono-movil');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Tablet','4','tablet');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Computadoras','4','computadoras');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Auriculares','4','auriculares');

insert into subcategoria(subcategoria,idcategoria,ruta) values('Desarrollo web','5','desarrollo-web');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Aplicaciones moviles','5','aplicaciones-moviles');
insert into subcategoria(subcategoria,idcategoria,ruta) values('PHP','5','PHP');
insert into subcategoria(subcategoria,idcategoria,ruta) values('Laravel','5','laravel');
 

INSERT INTO `banner` (`idbanner`, `ruta`, `imagen`, `titulo1`, `titulo2`, `titulo3`, `estilo`) VALUES
(1, 'sin-categoria', 'vistas/img/banner/default.jpg', '{"texto": "OFERTAS ESPECIALES","color": "#fff"}', '{"texto": "50% off","color": "#fff"}', '{"texto": "Termina el 31 de Octubre","color": "#fff"}', 'textoDer'),
(2, 'articulos-gratis', 'vistas/img/banner/ropa.jpg', '{"texto": "ARTÍCULOS GRATIS","color": "#fff"}', '{"texto": "¡Entrega inmediata!","color": "#fff"}', '{"texto": "Disfrútalo","color": "#fff"}', 'textoIzq'),
(3, 'desarrollo-web', 'vistas/img/banner/web.jpg', '{"texto": "OFERTAS ESPECIALES","color": "#fff"}', '{"texto": "50% off","color": "#fff"}', '{"texto": "Termina el 31 de Octubre","color": "#fff"}', 'textoCentro'),
(4, 'ropa-para-hombre', 'vistas/img/banner/ropaHombre.jpg', '{"texto": "OFERTAS ESPECIALES","color": "#fff"}', '{"texto": "50% off","color": "#fff"}', '{"texto": "Termina el 31 de Octubre","color": "#fff"}', 'textoDer');
