<?php 

require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";

class AjaxUsers{
	
	//Editar Usuario
	public $userID;

	public function ajaxUserEdit(){

		$item = "id";
		$value = $this->userID; 

		$respuesta = UsersController::ctrShowUsers($item,$value);

		echo json_encode($respuesta);

	}

	//Activar usuario
	public $ActivateID;
	public $ActivateState;

	public function ajaxUserActivate(){

		$table = "users";
		$state = "state";
		$stateValue = $this->ActivateState;
		$id = "id";
		$idValue = $this->ActivateID;

		$respuesta = UserModel::mdlUserUpdate($table,$state,$stateValue,$id,$idValue);

	}

	//Validar nombre de usuario

	public $user;

	public function ajaxUsername(){
		
		$table = "users";

		$item = "user";
		$value = $this->user;

		$respuesta = UsersController::ctrShowUsers($item,$value);
		echo json_encode($respuesta);

	}


}

if (isset($_POST["userID"])) {
	$edit = new AjaxUsers();
	$edit -> userID = $_POST["userID"];
	$edit -> ajaxUserEdit();
}

if(isset($_POST["stateActivate"])){
	$activate = new AjaxUsers();
	$activate -> ActivateState = $_POST["stateActivate"];
	$activate -> ActivateID = $_POST["userActivateID"];
	$activate -> ajaxUserActivate();
}

if(isset($_POST["user"])){
	$valitateUser = new AjaxUsers();
	$valitateUser -> user = $_POST["user"];
	$valitateUser -> ajaxUsername();
}