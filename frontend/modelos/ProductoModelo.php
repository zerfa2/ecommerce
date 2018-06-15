<?php 

require_once "conexion.php";

	class ProductoModelo{
		static public function mdlMostrarCategorias($tabla,$item,$valor){
			if($item!= null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");
				$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();
			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt->execute();
				return $stmt->fetchAll();
			}
			
			$stmt->close();
			$stmt= null;
		}	

		static public function mdlMostrarSubCategorias($tabla,$item,$valor){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");
			$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
			$stmt=null;
		}
		static public function mdlMostrarProductos($tabla,$ordenar,$item,$valor,$base,$tope,$modo){
			if($item!=null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item ORDER BY $ordenar $modo LIMIT $base,$tope");
				$stmt->bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetchAll();
			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar $modo LIMIT $base,$tope");
				$stmt->execute();
				return $stmt->fetchAll();
			}
			$stmt->close();
			$stmt=null;

		}
		static public function mdlMostrarInfoProducto($tabla,$item,$valor){
			if($item!=null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");
				$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();
			}
			// else{
			// 	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			// 	$stmt->execute();
			// 	return $stmt->fetchAll();
			// }
			$stmt->close();
			$stmt=null;
		}
		static public function mdlListarProductos($tabla,$ordenar,$item,$valor){
			if($item !=null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar DESC");
				$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetchAll();
			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC");
				$stmt->execute();
				return $stmt->fetchAll();
			}
			$stmt->close();
			$stmt=null;
		}
	}

