<?php

class UsersController{

	/*Login*/

	static public function ctrUserLogin() {
		
		if(isset($_POST["user"])) {

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["user"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])){

			   $cryptedPassword = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			   $rest = substr($cryptedPassword, 0, -20);

				$table = "users";
				$item = "user";
				$valor = $_POST["user"];

				$respuesta = UserModel::mdlShowUsers($table,$item,$valor);

				
				if($respuesta["user"] == $_POST["user"]){
				   	
				   	if (hash_equals($respuesta["password"],$rest)) {

				   		if($respuesta["state"] == 1){
				   			$_SESSION["logged"] = "ok";
				   			$_SESSION["id"] = $respuesta["id"];
				   			$_SESSION["name"] = $respuesta["name"];
				   			$_SESSION["username"] = $respuesta["user"];
				   			$_SESSION["profilePicture"] = $respuesta["image"];
				   			$_SESSION["role"] = $respuesta["role"];

				   			date_default_timezone_set('America/Mexico_City');

				   			$date = date('Y-m-d');
				   			$time = date('H:i:s');
				   			$datetime = $date.' '.$time;

				   			$item1 = "last_login";
				   			$value1 = $datetime;
				   			$item2 = "id";
				   			$value2 = $respuesta["id"];

				   			$last_login = UserModel::mdlUserUpdate($table,$item1,$value1,$item2,$value2);

				   			if ($last_login == "ok") {
				   				echo '
				   				<script>
				   				window.location = "home"
				   				</script>
				   				';
				   			}
				   		}else{
				   			echo '<br><div class="alert alert-danger">El usuario esta desactivado</div>';
				   		}
				   		
				   		

				   	}else {
				   		echo"<script>
				   		var user = document.querySelector('.userInput')
						var pass = document.querySelector('.passInput')
						pass.classList.add('is-invalid')
						user.setAttribute('value','";echo $_POST["user"]; echo "')
						</script>";
				   	}
				   	

				}else {

					echo"<script>
						var user = document.querySelector('.userInput')
						user.classList.add('is-invalid')
						user.setAttribute('value','";echo $_POST["user"]; echo "')
					</script>";

					 echo '<br><div class="alert alert-danger">Usuario invalido</div>';
				}

			}else {
				echo '<br><div class="alert alert-danger">Usuario invalido</div>';
			}

		}

	}

	/*Registro de Usuario*/

	static function ctrCreateUser(){

		if (isset($_POST["newUserName"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newUserName"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["newUserUsername"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["newUserPass"])) {

				/*Validar imagen*/

				$route = "";

				if(isset($_FILES["newUserPicture"]["tmp_name"])){

					/*Obtenemos el ancho y el alto de la imagen*/
					list($width,$heigth) = getimagesize($_FILES["newUserPicture"]["tmp_name"]);

					$newWidth = 500;
					$newHeigth = 500;

					/*Nuevo directorio para guardar la imagen del usuario*/
					$dir = "views/img/users/".$_POST["newUserUsername"];

					mkdir($dir,0755);

					/*De acuerdo al tipo de imagen aplicamos por defecto funciones de php*/

					if($_FILES["newUserPicture"]["type"] == "image/jpeg"){

						/*Guardamos la kimagen en el directorio*/

						$random = mt_rand(100,99999);

						$route = "views/img/users/".$_POST["newUserUsername"]."/".$random.".jpg";

						$origin = imagecreatefromjpeg($_FILES["newUserPicture"]["tmp_name"]);

						$destiny = imagecreatetruecolor($newWidth, $newHeigth);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeigth, $width, $heigth);

						imagejpeg($destiny,$route);
					}

					if($_FILES["newUserPicture"]["type"] == "image/png"){

						/*Guardamos la kimagen en el directorio*/

						$random = mt_rand(100,99999);

						$route = "views/img/users/".$_POST["newUserUsername"]."/".$random.".png";

						$origin = imagecreatefrompng($_FILES["newUserPicture"]["tmp_name"]);

						$destiny = imagecreatetruecolor($newWidth, $newHeigth);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeigth, $width, $heigth);

						imagepng($destiny,$route);
					}
				}


				$table = "users";
				$cryptedPassword = crypt($_POST["newUserPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$data = array("name" => $_POST["newUserName"],
							  "user" => $_POST["newUserUsername"],
							  "password" => $cryptedPassword,
							  "role" => $_POST["newUserRole"],
							  "route" => $route);

				$respuesta = UserModel::mdlInsertUser($table,$data);

				if($respuesta == "ok"){
					echo "<script>
					Swal.fire({
						type: 'success',
						title: 'Usuario Agregado Correctamente',
						showConfirmButton:true,
						confirmButtonText: 'Cerrar',
						closeOnConfirm: false
						}).then(function(result){

							if(result.value){
								
								window.location = 'users';

							}

							});

							</script>";	
						}

			}else {
				echo "<script>

				Swal.fire({
					type: 'error',
					title: 'Algo no esta permitido vuelve a intentarlo',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){
						
							window.location = 'users';

						}

					});

					</script>";
					}
				}

			}	

	/*Mostrar Usuarios*/
	static public function ctrShowUsers($item,$value){

		$table = "users";

		$respuesta = UserModel::mdlShowUsers($table,$item,$value);

		return $respuesta;
	}

	/*Editar Usuarios*/
	static public function ctrEditUser(){
		if (isset($_POST["editUserName"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editUserName"])) {

				/*Validamos Foto*/
				
				$route = $_POST["actualPicture"];

				if(isset($_FILES["editUserPicture"]["tmp_name"]) && $_FILES["editUserPicture"]["tmp_name"] != ""){
					/*Obtenemos el ancho y el alto de la imagen*/
					list($width,$heigth) = getimagesize($_FILES["editUserPicture"]["tmp_name"]);

					$newWidth = 500;
					$newHeigth = 500;

					/*Nuevo directorio para guardar la imagen del usuario*/
					$dir = "views/img/users/".$_POST["editUserUsername"];

					/*Preguntamos si existe otra imagen en la db*/
					if($_POST["actualPicture"] != ""){
						unlink($_POST["actualPicture"]);
					}else {
						mkdir($dir,0755);
					}


					/*De acuerdo al tipo de imagen aplicamos por defecto funciones de php*/

					if($_FILES["editUserPicture"]["type"] == "image/jpeg"){

						/*Guardamos la kimagen en el directorio*/

						$random = mt_rand(100,99999);

						$route = "views/img/users/".$_POST["editUserUsername"]."/".$random.".jpg";

						$origin = imagecreatefromjpeg($_FILES["editUserPicture"]["tmp_name"]);

						$destiny = imagecreatetruecolor($newWidth, $newHeigth);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeigth, $width, $heigth);

						imagejpeg($destiny,$route);
					}

					if($_FILES["editUserPicture"]["type"] == "image/png"){

						/*Guardamos la kimagen en el directorio*/

						$random = mt_rand(100,99999);

						$route = "views/img/users/".$_POST["editUserUsername"]."/".$random.".png";

						$origin = imagecreatefrompng($_FILES["editUserPicture"]["tmp_name"]);

						$destiny = imagecreatetruecolor($newWidth, $newHeigth);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeigth, $width, $heigth);

						imagepng($destiny,$route);
					}					
					
				}/*Fin de validar foto*/

				$table = "users";
				$cryptedPassword = "";

				/*Validación de password*/

				if($_POST["editUserPass"] != ""){
					
					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editUserPass"])){
						$cryptedPassword = crypt($_POST["editUserPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					}else{
						echo '<script>

						Swal.fire({
							type: "error",
							title: "Los caracteres de la contraseña son invalidos",
							showConfirmButton:true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = "users";

								}

								});
								</script>';
							}

						}else {
							$cryptedPassword = $_POST["actualPass"];
						}/*Fin de valida Password*/

						if($cryptedPassword != ""){
							$data = array("name" => $_POST["editUserName"],
								"user" => $_POST["editUserUsername"],
								"password" => $cryptedPassword,
								"role" => $_POST["editUserRole"],
								"route" => $route);

							$respuesta = UserModel::mdlEditUser($table,$data);

							if ($respuesta == "ok") {
								echo '<script>
					// var user = document.querySelector("#editUserName")
					// user.classList.add("is-invalid")

								Swal.fire({
									type: "success",
									title: "El usuario ha sido editado correctamente",
									showConfirmButton:true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = "users";

										}

										});
										</script>';
									}
								}else{
									echo '<script>

									Swal.fire({
										type: "error",
										title: "Los caracteres de la contraseña son invalidos",
										showConfirmButton:true,
										confirmButtonText: "Cerrar",
										closeOnConfirm: false
										}).then(function(result){

											if(result.value){

												window.location = "users";

											}

											});
											</script>';
										}


			}else {
				echo '<script>
					// var user = document.querySelector("#editUserName")
					// user.classList.add("is-invalid")

					Swal.fire({
					type: "error",
					title: "El nombre del usuario es invalido",
					showConfirmButton:true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){
						
							window.location = "users";

						}

					});
				</script>';
			}
		}
	}

	/*Eliminar usuario*/
	static public function ctrDeleteUser(){
		if (isset($_GET["userdeleteID"])) {
			
			$table = 'users';
			$userId = $_GET["userdeleteID"];

			if($_GET["picture"]){
				unlink($_GET["picture"]);
				rmdir('views/img/users/'.$_GET["userName"]);
			}else{
				rmdir('views/img/users/'.$_GET["userName"]);
			}

			$respuesta = UserModel::mdlDeleteUser($table,$userId);

			if ($respuesta == "ok") {
				echo '<script>

				Swal.fire({
					type: "success",
					title: "El usuario ha sido borrado correctamente",
					showConfirmButton:true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = "users";

						}

						});
				</script>';
			}
		}
	}
}
