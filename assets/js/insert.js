var dataUsuario;
var confirmed;
// debug
var debug = "?XDEBUG_SESSION_START=phpD";
//var debug = "";
// loading
var loading = '<div class="overlayLoader"><div class="loading-gif"><img src="img/loader.gif" alt="Cargando..." /></div></div>';



function insert()
{
    $("#loading").html(loading);
	
	try
	{
		// construimos llamado a ajax
		$.ajax({
			type: 'POST',
			url: 'controller/dataIn.php',
			cache: false,
			dataType: "json",
			async:true,
			data: {
				Action : 'insert'
			},
			// funcion en caso de exito
			success: function (data, textStatus, jqXHR) 
			{
				$("#loading").html("");
				if(data.msg !== undefined) 
				{
					alert('Mensaje: ' + data.msg);  
				}
				else
				{
					alert('Mensaje: exito'); 
                    console.log(data);

				}
			},
			// funcion en caso de error
			error: function (xhr, status, error) 
			{
				$("#loading").html("");
				console.log(xhr);
				console.log('message=:' + xhr + ', text status=:' + status + ', error thrown:=' + error);
				alert('Error busq:' + error);
				return false;
			}
		});
	}
	catch(err)
	{
		alert("Catch: " + err); 
		return false;
	}	
}

$(document).ready(function() 
{
	$("#loading").html("");
    //insert();
});