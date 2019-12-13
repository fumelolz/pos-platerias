<?php 

require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";

class AjaxCategories {
	//Editar Categorias

	public $categorieID;

	static public function ajaxEditCategorie(){

		$item = "id";
		$value = $_POST["idCategoria"];

		$respuesta = CategoriesController::ctrShowCategories($item,$value);
		echo json_encode($respuesta);

	}

	//vALIDAR CATEGORIA
	static public function ajaxCategorie(){

		$item = "name";
		$value = $_POST["categorie"];

		$respuesta = CategoriesController::ctrShowCategories($item,$value);
		echo json_encode($respuesta);

	}
}

if (isset($_POST["idCategoria"])) {
	
	$categorie = new AjaxCategories();
	$categorie -> ajaxEditCategorie();
}

if (isset($_POST["categorie"])) {
	$categorieName = new AjaxCategories();
	$categorieName -> ajaxCategorie();
	
}