<?php

require_once "conexion.php";

class CategoriesModel{

	/*Crear Categoria*/
	static public function mdlCreateCategorie($table,$name){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(name) VALUES(:name)");

		$stmt->bindParam(":name",$name,PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}


	/*Mostrar Categorias*/
	static public function mdlShowCategories($table,$item,$value){

		if ($item != null) {

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

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


	/*Editar Categorias*/
	static public function mdlEditCategorie($table,$name,$id){

	$stmt = Connection::connect()->prepare("UPDATE $table SET name = :name WHERE id = :id");

	$stmt->bindParam(":name",$name,PDO::PARAM_STR);
	$stmt->bindParam(":id",$id,PDO::PARAM_INT);

	if ($stmt->execute()) {
		return "ok";
	}else{
		return "error";
	}

	$stmt -> close();
	$stmt = null;
	
	}

	/*Eliminar Categorias*/
	static public function mdlDeleteCategorie($table,$data){

		$stmt = Connection::connect()->prepare("DELETE FROM $table  WHERE id = :id");

		$stmt->bindParam(":id",$data,PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
	}


}