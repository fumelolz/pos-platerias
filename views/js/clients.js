$("#newRFC").change(function(event) {
	var num = $("#newRFC").val().length
	console.log("num", num);
	$("#newRFC").val($("#newRFC").val().toUpperCase())
	if ( num == 11) {
		$("#newRFC").removeClass('is-invalid')
		$("#newRFC").addClass('is-valid')
	}else{
		$("#newRFC").addClass('is-invalid')
		$("#newRFC").val("")
	}
});

$("#editRFC").change(function(event) {
	var num = $("#editRFC").val().length
	console.log("num", num);
	$("#editRFC").val($("#editRFC").val().toUpperCase())
	if ( num == 11) {
		$("#editRFC").removeClass('is-invalid')
		$("#editRFC").addClass('is-valid')
	}else{
		$("#editRFC").addClass('is-invalid')
		$("#editRFC").val("")
	}
});



$("#newTel").change(function(event) {
	var  num = $("#newTel").val().length;

	var dig13 = ""
	var dig23 = ""
	var dig34 = ""
	var result = ""

	if (num==10) {
		dig13 =$("#newTel").val()
		dig13 = dig13.substring(0,3)
		dig23 =$("#newTel").val()
		dig23 = dig23.substring(3,6)
		dig34 =$("#newTel").val()
		dig34 = dig34.substring(6,10)
		$("#newTel").removeClass('is-invalid')
		$("#newTel").addClass('is-valid')
		result = dig13+"-"+dig23+"-"+dig34
		$("#newTel").val(result)
	}else{
		$("#newTel").addClass('is-invalid')
		$("#newTel").val("")
	}

});

$("#editTel").change(function(event) {
	var  num = $("#editTel").val().length;

	var dig13 = ""
	var dig23 = ""
	var dig34 = ""
	var result = ""

	if (num==10) {
		dig13 =$("#editTel").val()
		dig13 = dig13.substring(0,3)
		dig23 =$("#editTel").val()
		dig23 = dig23.substring(3,6)
		dig34 =$("#editTel").val()
		dig34 = dig34.substring(6,10)
		$("#editTel").removeClass('is-invalid')
		$("#editTel").addClass('is-valid')
		result = dig13+"-"+dig23+"-"+dig34
		$("#editTel").val(result)
	}else{
		$("#editTel").addClass('is-invalid')
		$("#editTel").val("")
	}

});



/*Validación ajax Editar Clientes*/


$(document).on('click', '.btnEditClient', function(event) {
	var idclient = $(this).attr('clientid');
	
	var data = new FormData();
	data.append('idclient',idclient)

	$.ajax({
		url:"ajax/clients.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			
			$("#editClient").attr('value',reply["name"]);
			$("#editID").attr('value',reply["id"]);
			$("#editRFC").attr('value',reply["rfc"]);
			$("#editAddress").attr('value',reply["address"]);
			$("#editTel").attr('value',reply["phone"]);
			$("#editEmail").attr('value',reply["email"]);

		}
	});

});

/*Eliminar cliente*/
$(document).on('click','.btnDeleteClient',function(event){
	var idclient = $(this).attr('clientid');
	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar al cliente?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar cliente!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?route=clients&clientdeleteID="+idclient;

		}

	});
});