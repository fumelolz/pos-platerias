<?php 

require_once '../controllers/clients.controller.php';
require_once '../models/clients.model.php';

class AjaxClients{

	/*Muestra la información del cliente*/
	public $idclient;

	public function ajaxShowClient(){

		$item = "id";
		$value = $this->idclient;

		$respuesta = ClientsController::ctrShowClients($item,$value);

		echo json_encode($respuesta);
	}

}

if (isset($_POST["idclient"])) {
	$client = new AjaxClients();
	$client -> idclient = $_POST["idclient"];
	$client -> ajaxShowClient();
}