<?php

class ProductsController{

	/*Mostrar Productos*/

	static public function ctrShowProducts($item,$value) {
			
		$table = "products";

		$respuesta = ProductsModel::mdlShowProducts($table,$item,$value);

		return $respuesta;
 
	}

	/*Crear Productos*/

	static public function ctrCreateProduct(){
		if (isset($_POST["newDescription"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newDescription"]) &&
				preg_match('/^[0-9]+$/', $_POST["newStock"])&&
				preg_match('/^[0-9.]+$/', $_POST["newPP"])&&
				preg_match('/^[0-9.]+$/', $_POST["newSP"])){

				/*Validar imagen*/

				$route = "";

				if(isset($_FILES["newProductPicture"]["tmp_name"])){

					/*Obtenemos el ancho y el alto de la imagen*/
					list($width,$heigth) = getimagesize($_FILES["newProductPicture"]["tmp_name"]);

					$newWidth = $width;
					$newHeigth = $heigth;

					/*Nuevo directorio para guardar la imagen del usuario*/
					$dir = "views/img/products/".$_POST["newCode"];

					mkdir($dir,0755);

					/*De acuerdo al tipo de imagen aplicamos por defecto funciones de php*/

					if($_FILES["newProductPicture"]["type"] == "image/jpeg"){

						/*Guardamos la kimagen en el directorio*/

						$random = mt_rand(100,99999);

						$route = "views/img/products/".$_POST["newCode"]."/".$random.".jpg";

						$origin = imagecreatefromjpeg($_FILES["newProductPicture"]["tmp_name"]);

						$destiny = imagecreatetruecolor($newWidth, $newHeigth);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeigth, $width, $heigth);

						imagejpeg($destiny,$route);
					}

					if($_FILES["newProductPicture"]["type"] == "image/png"){

						/*Guardamos la kimagen en el directorio*/

						$random = mt_rand(100,99999);

						$route = "views/img/products/".$_POST["newCode"]."/".$random.".png";

						$origin = imagecreatefrompng($_FILES["newProductPicture"]["tmp_name"]);

						$destiny = imagecreatetruecolor($newWidth, $newHeigth);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeigth, $width, $heigth);

						imagepng($destiny,$route);
					}
				}

				$table = "products";

				$data = array("id_categorie" => $_POST["newProductCategorie"],
							  "code" => $_POST["newCode"],
							  "description" => $_POST["newDescription"],
							  "stock" => $_POST["newStock"],
							  "purchase_price" => $_POST["newPP"],
							  "sell_price" => $_POST["newSP"],
							  "image" => $route);

				$respuesta = ProductsModel::mdlCreateProducts($table,$data);

				if($respuesta == "ok"){
					echo "<script>
					Swal.fire({
						type: 'success',
						title: 'Producto Agregada Correctamente',
						showConfirmButton:true,
						confirmButtonText: 'Cerrar',
						closeOnConfirm: false
						}).then(function(result){

							if(result.value){
								
								window.location = 'products';

							}

							});

							</script>";	
						}
				
			}else{
				echo '<script>

				Swal.fire({
					type: "error",
					title: "El producto no puede ir vacio o llevar caracteres especiales",
					showConfirmButton:true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = "products";

						}

						});
						</script>';
					}
		}
	}


	/*Editar Productos*/

	static public function ctrEditProduct(){
		if (isset($_POST["editDescription"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editDescription"]) &&
				preg_match('/^[0-9]+$/', $_POST["editStock"])&&
				preg_match('/^[0-9.]+$/', $_POST["editPP"])&&
				preg_match('/^[0-9.]+$/', $_POST["editSP"])){

				/*Validar imagen*/

				$routeImage = $_POST["actualPicture"];

				if(isset($_FILES["editProductPicture"]["tmp_name"]) && $_FILES["editProductPicture"]["tmp_name"] != ""){

					/*Obtenemos el ancho y el alto de la imagen*/
					list($width,$heigth) = getimagesize($_FILES["editProductPicture"]["tmp_name"]);

					$newWidth = $width;
					$newHeigth = $heigth;

					/*Nuevo directorio para guardar la imagen del usuario*/
					$dir = "views/img/products/".$_POST["editCode"];

					if($_POST["actualPicture"] != ""){
						unlink($_POST["actualPicture"]);

					}else {
						mkdir($dir,0755);
					}

					/*De acuerdo al tipo de imagen aplicamos por defecto funciones de php*/

					if($_FILES["editProductPicture"]["type"] == "image/jpeg"){

						/*Guardamos la kimagen en el directorio*/

						$random = mt_rand(100,99999);

						$routeImage = "views/img/products/".$_POST["editCode"]."/".$random.".jpg";

						$origin = imagecreatefromjpeg($_FILES["editProductPicture"]["tmp_name"]);

						$destiny = imagecreatetruecolor($newWidth, $newHeigth);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeigth, $width, $heigth);

						imagejpeg($destiny,$routeImage);
					}

					if($_FILES["editProductPicture"]["type"] == "image/png"){

						/*Guardamos la kimagen en el directorio*/

						$random = mt_rand(100,99999);

						$routeImage = "views/img/products/".$_POST["editCode"]."/".$random.".png";

						$origin = imagecreatefrompng($_FILES["editProductPicture"]["tmp_name"]);

						$destiny = imagecreatetruecolor($newWidth, $newHeigth);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeigth, $width, $heigth);

						imagepng($destiny,$routeImage);
					}
				}

				$table = "products";

				$data = array("id_categorie" => $_POST["editProductCategorie"],
							  "code" => $_POST["editCode"],
							  "description" => $_POST["editDescription"],
							  "stock" => $_POST["editStock"],
							  "purchase_price" => $_POST["editPP"],
							  "sell_price" => $_POST["editSP"],
							  "image" => $routeImage);

				$respuesta = ProductsModel::mdlEditProducts($table,$data);

				if($respuesta == "ok"){
					echo "<script>
					Swal.fire({
						type: 'success',
						title: 'Producto Actualizado Correctamente',
						showConfirmButton:true,
						confirmButtonText: 'Cerrar',
						closeOnConfirm: false
						}).then(function(result){

							if(result.value){
								
								window.location = 'products';

							}

							});

							</script>";	
						}
				
			}else{
				echo '<script>

				Swal.fire({
					type: "error",
					title: "El producto no puede ir vacio o llevar caracteres especiales",
					showConfirmButton:true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = "products";

						}

						});
						</script>';
					}
		}
	}


	/*Borrar producto*/

	static public function ctrDeleteProduct(){
		if (isset($_GET["productdeleteID"])) {
			
			$table = "products";
			$productID = $_GET["productdeleteID"];

			if($_GET["productPicture"]){
				unlink($_GET["productPicture"]);
				rmdir('views/img/products/'.$_GET["codeProduct"]);
			}else{
				rmdir('views/img/products/'.$_GET["codeProduct"]);
			}


			$respuesta = ProductsModel::mdlDeleteProducts($table,$productID);

			if ($respuesta == "ok") {
				echo '<script>

				Swal.fire({
					type: "success",
					title: "El producto ha sido borrado correctamente",
					showConfirmButton:true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = "products";

						}

						});
				</script>';
			}

		}
	}

}