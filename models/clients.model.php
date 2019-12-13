<?php 

require_once "conexion.php";

class ClientsModel{

	/*Crear Cliente*/

	static public function mdlCreateClient($table,$data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(name,rfc,phone,email,address) VALUES(:name,:rfc,:phone,:email,:address)");

		$stmt->bindParam(":name",$data["name"],PDO::PARAM_STR);
		$stmt->bindParam(":rfc",$data["rfc"],PDO::PARAM_STR);
		$stmt->bindParam(":phone",$data["phone"],PDO::PARAM_STR);
		$stmt->bindParam(":email",$data["email"],PDO::PARAM_STR);
		$stmt->bindParam(":address",$data["address"],PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	/*Mostrar Clientes*/
	static public function mdlShowClients($table,$item,$value){

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

	/*Editar Cliente*/

	static public function mdlEditClient($table,$data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET name =:name, rfc = :rfc, phone = :phone, email = :email, address = :address WHERE id = :id");

		$stmt->bindParam(":id",$data["id"],PDO::PARAM_INT);
		$stmt->bindParam(":name",$data["name"],PDO::PARAM_STR);
		$stmt->bindParam(":rfc",$data["rfc"],PDO::PARAM_STR);
		$stmt->bindParam(":phone",$data["phone"],PDO::PARAM_STR);
		$stmt->bindParam(":email",$data["email"],PDO::PARAM_STR);
		$stmt->bindParam(":address",$data["address"],PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	/*Eliminar Cliente*/
	static public function mdlDeleteClient($table,$id){
		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt->bindParam(":id",$id,PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
	}
}