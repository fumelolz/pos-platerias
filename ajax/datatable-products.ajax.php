<?php 
require_once '../controllers/products.controller.php';
require_once '../models/products.model.php';
require_once '../controllers/categories.controller.php';
require_once "../models/categories.model.php";

class ProductsTable{

	/*Mostrar la tabla*/
	public function showProductsTable(){

$item = null;
$value = null;

$products = ProductsController::ctrShowProducts($item,$value);

$jsonData = 
'{
	"data": [';

for ($i=0; $i <count($products) ; $i++) { 

	if ($products[$i]["image"] != "") {
		$image = "<center><img src='".$products[$i]["image"]."' class='img-thumbnail' width='40px'></center><center><a href='".$products[$i]["image"]."' target='_blank'>Ver</a></center>";
	}else{
		$image = "<center><img src='views/img/products/default/anonymous.png' class='img-thumbnail' width='40px'></center>";
	}

	$btns = "<center><div class='btn-group'><button class='btn btn-warning btnEditProduct' productID='".$products[$i]["id"]."' data-toggle='modal' data-target='#editProductModal'><i class='fas fa-pencil-alt'></i></button><button class='btn btn-danger btnDeleteProduct' productID='".$products[$i]["id"]."' codigo='".$products[$i]["code"]."' imagen='".$products[$i]["image"]."'><i class='fas fa-times'></i></button></div></center>";

	if($products[$i]["stock"] > 20){
		$stock = "<button class='btn btn-success'>".$products[$i]["stock"]."</button>";
	}else if ($products[$i]["stock"] < 20 && $products[$i]["stock"] >= 10) {
		$stock = "<button class='btn btn-warning'>".$products[$i]["stock"]."</button>";
	}else if ($products[$i]["stock"] < 10) {
		$stock = "<button class='btn btn-danger'>".$products[$i]["stock"]."</button>";
	}
	
	

	$item1 = "id";
	$value1 = $products[$i]["id_categorie"];

	$categorie = CategoriesController::ctrShowCategories($item1,$value1);

	$jsonData .='[
	"'.($i+1).'",
	"'.$image.'",
	"'.$products[$i]["code"].'",
	"'.$products[$i]["description"].'",
	"'.$categorie["name"].'",
	"'.$stock.'",
	"$ '.$products[$i]["purchase_price"].'",
	"$ '.$products[$i]["sell_price"].'",
	"'.$products[$i]["date"].'",
	"'.$btns.'"
	],';
}

$jsonData = substr($jsonData, 0,-1);

$jsonData .='] 
}';

	echo $jsonData;
		
	}
}

/*Activar tabla de productos*/

$tableLauncher = new ProductsTable();
$tableLauncher -> showProductsTable();