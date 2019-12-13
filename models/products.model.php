<?php

require_once "conexion.php";

class ProductsModel{

	/*Crear Producto*/
	static public function mdlCreateProducts($table,$data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(id_categorie,code,description,image,stock,purchase_price,sell_price) VALUES(:id_categorie, :code, :description, :image, :stock, :purchase_price, :sell_price)");

		$stmt->bindParam(":id_categorie",$data["id_categorie"],PDO::PARAM_INT);
		$stmt->bindParam(":code",$data["code"],PDO::PARAM_STR);
		$stmt->bindParam(":description",$data["description"],PDO::PARAM_STR);
		$stmt->bindParam(":stock",$data["stock"],PDO::PARAM_INT);
		$stmt->bindParam(":purchase_price",$data["purchase_price"],PDO::PARAM_STR);
		$stmt->bindParam(":sell_price",$data["sell_price"],PDO::PARAM_STR);
		$stmt->bindParam(":image",$data["image"],PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	/*Editar Productos*/
	static public function mdlEditProducts($table,$data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET id_categorie = :id_categorie, description = :description, image = :image, stock = :stock, purchase_price = :purchase_price, sell_price = :sell_price WHERE code = :code");

		$stmt->bindParam(":id_categorie",$data["id_categorie"],PDO::PARAM_INT);
		$stmt->bindParam(":code",$data["code"],PDO::PARAM_STR);
		$stmt->bindParam(":description",$data["description"],PDO::PARAM_STR);
		$stmt->bindParam(":stock",$data["stock"],PDO::PARAM_INT);
		$stmt->bindParam(":purchase_price",$data["purchase_price"],PDO::PARAM_STR);
		$stmt->bindParam(":sell_price",$data["sell_price"],PDO::PARAM_STR);
		$stmt->bindParam(":image",$data["image"],PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}


	/*Mostrar Productos*/
	static public function mdlShowProducts($table,$item,$value){

		if ($item != null) {

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item,$value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $table");
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = null;

	}


	/*Eliminar Productos*/
	static public function mdlDeleteProducts($table,$productID){

		$stmt = Connection::connect()->prepare("DELETE FROM $table  WHERE id = :id");

		$stmt->bindParam(":id",$productID,PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
	}


}