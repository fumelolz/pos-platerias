<?php 

require_once '../controllers/products.controller.php';
require_once '../models/products.model.php';

class AjaxProducts{

	static public function ajaxCreateCodeProduct(){

		$item = "id_categorie";
		$value = $_POST["idcategoria"];

		$respuesta = ProductsController::ctrShowProducts($item,$value);

		echo json_encode($respuesta);

	}

	public $idproducto;

	public function ajaxDataProduct(){

		$item = "id";
		$value = $this->idproducto;

		$respuesta = ProductsController::ctrShowProducts($item,$value);

		echo json_encode($respuesta);

	}

}

if (isset($_POST["idcategoria"])) {
	$codeProduct = new AjaxProducts();
	$codeProduct -> ajaxCreateCodeProduct();
}


if (isset($_POST["productoid"])) {
	$dataProduct = new AjaxProducts();
	$dataProduct -> idproducto = $_POST["productoid"];
	$dataProduct -> ajaxDataProduct();
}