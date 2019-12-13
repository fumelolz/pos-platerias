/*Cargar la tabla dinamica de productos*/

// $.ajax({

// 	url:"ajax/datatable-products.ajax.php",
// 	success:function(reply){
// 		console.log("reply", reply);

// 	}

// })


$('.productTable').DataTable( {
	"ajax": "ajax/datatable-products.ajax.php",
	"deferRender":true,
	"retrieve":true,
	"processing":true,
	"responsive":true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}
} );

/*Carga de categoria para asignar codigo*/

$("#newProductCategorie").change(function(event) {
	var categorieid = $(this).val();
	
	var data = new FormData();
	data.append('idcategoria',categorieid);

	$.ajax({
		url:"ajax/products.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){

			if(!reply){
				var newcode = categorieid+"01";
				$("#newCode").attr('value', newcode);
			}else{
				var newcode = Number(reply["code"])+1;
				$("#newCode").attr('value', newcode);

			}

			
		}
	});	

});

/*Agregando precio de venta*/
$("#newPP").keyup(function(event) {


	if ($("#percentageCheckBox").prop('checked')) {
		var valuePg = $(".nuevoPorcentaje").val();
		var precioVenta = Number(($("#newPP").val()*valuePg)/100)+Number($("#newPP").val())
		$("#newSP").attr('value', precioVenta);
	}else{
		$("#newSP").attr('value', $("#newPP").val());
	}

	
});

/*Cambio de porcentaje*/
$(".nuevoPorcentaje").change(function(event) {
	if ($("#percentageCheckBox").prop('checked')) {
		var valuePg = $(".nuevoPorcentaje").val();
		var precioVenta = Number(($("#newPP").val()*valuePg)/100)+Number($("#newPP").val())
		$("#newSP").attr('value', precioVenta);
		
	}else{
		$("#newSP").attr('value', $("#newPP").val());
		
	}
});

$("#percentageCheckBox").change(function(event) {
	if ($("#percentageCheckBox").prop('checked')) {
		$("#newSP").attr('readonly', true);
	}else{
		$("#newSP").attr('readonly', false);
	}
});



/*Agregando precio de venta a modificado*/
$("#editPP").keyup(function(event) {


	if ($("#percentageCheckBox2").prop('checked')) {
		var valuePg = $(".editPorcentaje").val();
		var precioVenta = Number(($("#editPP").val()*valuePg)/100)+Number($("#editPP").val())
		$("#editSP").attr('value', precioVenta);
	}else{
		$("#editSP").attr('value', $("#editPP").val());
	}

	
});

/*Cambio de porcentaje*/
$(".editPorcentaje").change(function(event) {
	if ($("#percentageCheckBox2").prop('checked')) {
		var valuePg = $(".editPorcentaje").val();
		var precioVenta = Number(($("#editPP").val()*valuePg)/100)+Number($("#editPP").val())
		$("#editSP").attr('value', precioVenta);
		
	}else{
		$("#editSP").attr('value', $("#editPP").val());
		
	}
});

$("#percentageCheckBox2").change(function(event) {
	if ($("#percentageCheckBox2").prop('checked')) {
		$("#editSP").attr('readonly', true);
	}else{
		$("#editSP").attr('readonly', false);
	}
});

/*Subir foto de usuario*/

$(".newProductPicture").change(function() {
	$(".prevImage").attr('src', "")
	var image = this.files[0];
	
	if(image["type"] != "image/jpeg" && image["type"] != "image/png") {
		$(".newProductPicture").val("")
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen debe estar en formato JPG o PNG",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else if(image["size"] > 5000000) {
		$(".newProductPicture").val("")
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen no debe de pesar más de 5Mb",
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

$(document).on("click",".btnEditProduct",function(event) {
	var idproducto = $(this).attr('productid');;
	
	var data = new FormData();
	data.append('productoid',idproducto);

	$.ajax({
		url:"ajax/products.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){

			var data = new FormData();
			data.append('idCategoria',reply["id_categorie"]);

			$.ajax({
				url:"ajax/categories.ajax.php",
				method:"POST",
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(reply){
					
					$("#editProductCategorie").attr('value', reply["id"]);
					$("#editProductCategorie").html(reply["name"]);
				}
			});

			$("#editCode").attr('value', reply["code"]);
			$("#editDescription").attr('value', reply["description"]);
			$("#editStock").attr('value', reply["stock"]);
			$("#actualPicture").attr('value', reply["image"]);
			$("#editPP").attr('value', reply["purchase_price"]);
			$("#editSP").attr('value', reply["sell_price"]);

			if(reply["image"] != ""){
				$(".prevImage").attr('src', reply["image"])
			}else {
				console.log("El usuario no tiene foto")
				$(".prevImage").attr('src', "views/img/products/default/anonymous.png")
			}

		}

	});	

});

/*Eliminar Usaurio*/
$(document).on("click",".btnDeleteProduct",function() {

	var productoID = $(this).attr('productID');
	var productPicture = $(this).attr('imagen');
	var code = $(this).attr('codigo');

	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar el producto?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar producto!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?route=products&productdeleteID="+productoID+"&codeProduct="+code+"&productPicture="+productPicture;

		}

	});


});
