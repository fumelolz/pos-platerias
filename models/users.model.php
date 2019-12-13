<?php

require_once "conexion.php";

class UserModel {

	/*Mostrar Usuarios*/
	static public function mdlShowUsers($table,$item,$value){

		if($item != null){
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

	/*Registro Usuarios*/

	static public function mdlInsertUser($table,$data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(name,user,password,role,image) VALUES(:name, :user, :password, :role, :image)");

		$stmt->bindParam(":name",$data["name"],PDO::PARAM_STR);
		$stmt->bindParam(":user",$data["user"],PDO::PARAM_STR);
		$stmt->bindParam(":password",$data["password"],PDO::PARAM_STR);
		$stmt->bindParam(":role",$data["role"],PDO::PARAM_STR);
		$stmt->bindParam(":image",$data["route"],PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	/*Editar Usuarios*/
	static public function mdlEditUser($table,$data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET name = :name, user = :user, password = :password, role = :role, image = :image WHERE user = :user");

		$stmt -> bindParam(":name",$data["name"],PDO::PARAM_STR);
		$stmt -> bindParam(":user",$data["user"],PDO::PARAM_STR);
		$stmt -> bindParam(":password",$data["password"],PDO::PARAM_STR);
		$stmt -> bindParam(":role",$data["role"],PDO::PARAM_STR);
		$stmt -> bindParam(":image",$data["route"],PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
		
	}
	
	/*Actualizar usuario*/
	static public function mdlUserUpdate($table,$item1,$value1,$item2,$value2){
		$stmt = Connection::connect()->prepare("UPDATE $table SET $item1= :value1 WHERE $item2 = :value2");

		$stmt -> bindParam(":value1",$value1,PDO::PARAM_STR);
		$stmt -> bindParam(":value2",$value2,PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;


	}

	/*Eliminar usuario*/
	static public function mdlDeleteUser($table,$userID){

		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt -> bindParam(":id",$userID,PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}
}