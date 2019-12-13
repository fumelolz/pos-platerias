<?php

class CategoriesController{

	/*Crear Categoria*/
	static public function ctrCreateCategorie(){
		if (isset($_POST["newCategorie"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newCategorie"])) {
				
				$table = "categories";
				$name = $_POST["newCategorie"];

				$respuesta = CategoriesModel::mdlCreateCategorie($table,$name);

				if($respuesta == "ok"){
					echo "<script>
					Swal.fire({
						type: 'success',
						title: 'Categoria Agregada Correctamente',
						showConfirmButton:true,
						confirmButtonText: 'Cerrar',
						closeOnConfirm: false
						}).then(function(result){

							if(result.value){
								
								window.location = 'categories';

							}

							});

							</script>";	
						}

			}else{
				echo '<script>

				Swal.fire({
					type: "error",
					title: "Los caracteres de la categoria son invalidos",
					showConfirmButton:true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = "categories";

						}

						});
						</script>';
					}
		}
	} 


	/*Mostrar Categorias*/
	static public function ctrShowCategories($item,$value){ 
		
		$table = "categories";
		
		$respuesta = CategoriesModel::mdlShowCategories($table,$item,$value);

		return $respuesta;

	}

	/*Editar Categoria*/
	static public function ctrEditCategorie(){
		if (isset($_POST["editCategorie"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editCategorie"])) {
				
				$table = "categories";
				$name = $_POST["editCategorie"];
				$id = $_POST["idCategoria"];

				$respuesta = CategoriesModel::mdlEditCategorie($table,$name,$id);

				if($respuesta == "ok"){
					echo "<script>
					Swal.fire({
						type: 'success',
						title: 'Categoria Actualizada Correctamente',
						showConfirmButton:true,
						confirmButtonText: 'Cerrar',
						closeOnConfirm: false
						}).then(function(result){

							if(result.value){
								
								window.location = 'categories';

							}

							});

							</script>";	
						}

					}else{
						echo '<script>

						Swal.fire({
							type: "error",
							title: "Los caracteres de la categoria son invalidos",
							showConfirmButton:true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = "categories";

								}

								});
								</script>';
							}
						}
					}

	/*Eliminar Categorias*/
	static public function ctrDeleteCategories(){

		if(isset($_GET["categoriedeleteID"])) {
			$table = "categories";
			$data = $_GET["categoriedeleteID"];

			$respuesta = CategoriesModel::mdlDeleteCategorie($table,$data);

			if($respuesta == "ok"){
				echo "<script>
				Swal.fire({
					type: 'success',
					title: 'se elimino correctamente',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){
							
							window.location = 'categories';

						}

						});

						</script>";	
					}
				}

			}


}