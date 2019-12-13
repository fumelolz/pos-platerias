<?php

class ClientsController{

	/*Crea un cliente*/
	public function ctrCreateClient() {
		if (isset($_POST["newClient"])) {
			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newClient"])) {
				
				if (preg_match('/^[A-Z0-9]+$/', $_POST["newRFC"])) {
					

					$table = "clients";

					$data = array("name" => $_POST["newClient"],
								  "rfc" => $_POST["newRFC"],
								  "address" => $_POST["newAddress"],
								  "phone" => $_POST["newTel"],
								  "email" => $_POST["newEmail"]);

					$respuesta = ClientsModel::mdlCreateClient($table,$data);

					if($respuesta == "ok"){
					echo "<script>
					Swal.fire({
						type: 'success',
						title: 'Cliente Agregado Correctamente',
						showConfirmButton:true,
						confirmButtonText: 'Cerrar',
						closeOnConfirm: false
						}).then(function(result){

							if(result.value){
								
								window.location = 'clients';

							}

							});

							</script>";	
						}else{
							echo "<script>
							Swal.fire({
								type: 'error',
								title: 'Ya existe un cliente con ese rfc',
								showConfirmButton:true,
								confirmButtonText: 'Cerrar',
								closeOnConfirm: false
								}).then(function(result){

									if(result.value){

										window.location = 'clients';

									}

									});

									</script>";	
						}



				}else {
				echo "<script>

				Swal.fire({
					type: 'error',
					title: 'Solo se permiten letras y numeros en el RFC',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = 'clients';

						}

						});

						</script>";
					}

			}else {
				echo "<script>

				Swal.fire({
					type: 'error',
					title: 'El nombre del cliente no puede llevar caracteres especiales',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = 'clients';

						}

						});

						</script>";
					}
				}
			}
	
	/*Mostrar Clientes*/
	static public function ctrShowClients($item,$value){ 
		
		$table = "clients";
		
		$respuesta = ClientsModel::mdlShowClients($table,$item,$value);

		return $respuesta;

	}		

	/*Editar Cliente*/
	static public function ctrEditClient(){
		if (isset($_POST["editClient"])) {
			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editClient"])) {
				
				if (preg_match('/^[A-Z0-9]+$/', $_POST["editRFC"])) {
					

					$table = "clients";

					$data = array("name" => $_POST["editClient"],
						"rfc" => $_POST["editRFC"],
						"address" => $_POST["editAddress"],
						"phone" => $_POST["editTel"],
						"email" => $_POST["editEmail"],
						"id" => $_POST["editID"]);

					$respuesta = ClientsModel::mdlEditClient($table,$data);

					if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Cliente Actualizado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){
									
									window.location = 'clients';

								}

								});

								</script>";	
							}else{
								echo "<script>
								Swal.fire({
									type: 'error',
									title: 'Ya existe un cliente con ese rfc',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'clients';

										}

										});

										</script>";	
									}



								}else {
									echo "<script>

									Swal.fire({
										type: 'error',
										title: 'Solo se permiten letras y numeros en el RFC',
										showConfirmButton:true,
										confirmButtonText: 'Cerrar',
										closeOnConfirm: false
										}).then(function(result){

											if(result.value){

												window.location = 'clients';

											}

											});

											</script>";
										}

									}else {
										echo "<script>

										Swal.fire({
											type: 'error',
											title: 'El nombre del cliente no puede llevar caracteres especiales',
											showConfirmButton:true,
											confirmButtonText: 'Cerrar',
											closeOnConfirm: false
											}).then(function(result){

												if(result.value){

													window.location = 'clients';

												}

												});

												</script>";
											}
										}	
									}

	/*Eliminar cliente*/
	static public function ctrDeleteClient(){
		if (isset($_GET["clientdeleteID"])) {
			
			$id = $_GET["clientdeleteID"];
			$table = "clients";

			$respuesta = ClientsModel::mdlDeleteClient($table,$id);

			if ($respuesta == "ok") {
				echo '<script>

				Swal.fire({
					type: "success",
					title: "El cliente ha sido borrado correctamente",
					showConfirmButton:true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = "clients";

						}

						});
				</script>';
			}

		}
	}
}