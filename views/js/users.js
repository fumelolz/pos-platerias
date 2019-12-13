/*Subir foto de usuario*/

$(".newUserPicture").change(function() {
	$(".prevImage").attr('src', "")
	var image = this.files[0];
	
	if(image["type"] != "image/jpeg" && image["type"] != "image/png") {
		$(".newUserPicture").val("")
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen debe estar en formato JPG o PNG",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else if(image["size"] > 1000000) {
		$(".newUserPicture").val("")
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen no debe de pesar más de 1Mb",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else {
		var imageData = new FileReader
		imageData.readAsDataURL(image)

		$(imageData).on("load",function(event){
			var imageUrl = event.target.result

			$(".prevImage").attr('src', imageUrl)
		})
	}

})

/*Editar usuario*/

$(document).on("click",".btnEditUser",function() {
	
	var userID = $(this).attr('userID');
	
	var data = new FormData();
	data.append('userID',userID);

	$.ajax({
		url:"ajax/users.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			console.log("reply", reply);

			$("#editUserName").attr('value', reply["name"]);
			$("#editUserUsername").attr('value', reply["user"]);
			$("#selectedRole").html(reply["role"])
			$("#selectedRole").val(reply["role"])
			$("#actualPass").val(reply["password"])
			$("#actualPicture").val(reply["image"])

			if(reply["image"] != ""){
				$(".prevImage").attr('src', reply["image"])
			}else {
				console.log("El usuario no tiene foto")
				$(".prevImage").attr('src', "views/img/users/default/anonymous.png")
			}
		}
	});

 
});

/*Activar Usuario*/
$(document).on("click",".btnActivate",function() {

	var userID = $(this).attr('userID');
	var state = $(this).attr('state');

	var data = new FormData();
	data.append('userActivateID',userID);
	data.append('stateActivate',state);
	$.ajax({
		url:"ajax/users.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		success: function(reply){
			if (window.matchMedia("(max-width:767px)").matches) {
				Swal.fire({
					type: 'success',
					title: 'El usuario ha sido actualizado',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
				}).then(function(result){

					if(result.value){

						window.location = 'users';

					}

				});
			}
		}
	});

	if (state == 0) {
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('state', '1');
	}else{
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('state', '0');
	}
	
	
});

/*Verificar si existe un usuario con el mismo usuario*/

$("#newUserUsername").change(function() {

	

	var user = $(this).val();
	var data = new FormData();
	data.append('user',user);
	$.ajax({
		url:"ajax/users.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){

			if($("#newUserUsername").val() == ""){
				$("#newUserUsername").removeClass('is-invalid');
				$("#newUserUsername").removeClass('is-valid');
			}else{
				if(reply){
					$("#newUserUsername").removeClass('is-valid');
					$("#newUserUsername").addClass('is-invalid');
					$("#newUserUsername").val("");
				}

				if(reply == false){
					$("#newUserUsername").removeClass('is-invalid');
					$("#newUserUsername").addClass('is-valid');
				}
			}
			
		}
	}); 

});

/*Eliminar Usaurio*/
$(document).on("click",".btnDeleteUser",function() {

	var userID = $(this).attr('userID');
	var userPicture = $(this).attr('userPicture');
	var username = $(this).attr('username');

	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar al usuario?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar usuario!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?route=users&userdeleteID="+userID+"&userName="+username+"&picture="+userPicture;

		}

	});

});