/*Editar categoria*/

$(".btnEditCategorie").click(function() {

	var catID = $(this).attr('categorieID');
	
	var data = new FormData();
	data.append('idCategoria',catID);

	$.ajax({
		url:"ajax/categories.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){


			$("#editCategorie").attr('value', reply["name"]);
			$("#idCategoria").attr('value', reply["id"]);

		}
	});

});

/*Eliminar categoria*/
$(".btnDeleteCategorie").click(function() {

	var catID = $(this).attr('categorieID');

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

			window.location = "index.php?route=categories&categoriedeleteID="+catID;

		}

	});

});

/*Verificar si existe un usuario con el mismo usuario*/

$("#newCategorie").change(function() {

	var categorie = $(this).val();
	console.log("categorie", categorie);
	var data = new FormData();
	data.append('categorie',categorie);
	$.ajax({
		url:"ajax/categories.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			if($("#newCategorie").val() == ""){
				$("#newCategorie").removeClass('is-invalid');
				$("#newCategorie").removeClass('is-valid');
				console.log("entraste aca")
			}else{
				if(reply){
					$("#newCategorie").removeClass('is-valid');
					$("#newCategorie").addClass('is-invalid');
					$("#newCategorie").val("");
					console.log("entraste aquí")
				}

				if(reply == false){
					$("#newCategorie").removeClass('is-invalid');
					$("#newCategorie").addClass('is-valid');
					console.log("entraste hehe")
				}
			}
			
		}
	}); 

});