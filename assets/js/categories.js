
// loading
var loading = '<div class="overlayLoader"><div class="loading-gif"><img src="img/loader.gif" alt="Cargando..." /></div></div>';


function getCategories()
{
	try
	{
		// construimos llamado a ajax
		$.ajax({
			type: 'POST',
			url: 'controller/categoryController.php',
			cache: false,
			dataType: "json",
			async:true,
			data: {
				Action : 'GetCategories'
			},
			// funcion en caso de exito
			success: function (data, textStatus, jqXHR) 
			{
				$("#loading").html("");
				if(data.msg !== undefined) 
				{
					alert('Mensaje: ' + data.msg); 
					console.log(data);
				}
				else
				{
				    console.log(data);
					//alert('Mensaje: exito'); 
                    //console.log(data);
                    $.each(data, function (i, item) {
                        
                              var element= '<li class="nav-item"><a class="nav-link" style = "border-bottom-color: #fff;border-bottom-style: groove; border-bottom-width: 1px;"  data-hash data-hash-offset="0" data-hash-offset-lg="95" href="productos.php?subs='+item.id_category+'&search=2">'+item.name+'</a></li><ul id='+item.name+'></ul>';							  
                              $(element).appendTo("#container_category");
                        });
                        getSubs();
				}
			},
			// funcion en caso de error
			error: function (xhr, status, error) 
			{
				$("#loading").html("");
				console.log(error);
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

function getSubcategories(category)
{
    $("#loading").html(loading);
	
	try
	{
		// construimos llamado a ajax
		$.ajax({
			type: 'POST',
			url: 'controller/categoryController.php',
			cache: false,
			dataType: "json",
			async:true,
			data: {
				Action : 'GetSubcategories',
                id_category: category
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
					//alert('Mensaje: exito'); 
                    console.log(data);
				}
			},
			// funcion en caso de error
			error: function (xhr, status, error) 
			{
				$("#loading").html("");
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

function getCategory(category)
{
    $("#loading").html(loading);
	
	try
	{
		// construimos llamado a ajax
		$.ajax({
			type: 'POST',
			url: 'controller/categoryController.php',
			cache: false,
			dataType: "json",
			async:true,
			data: {
				Action : 'GetCategory',
                id_category: category
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
					//alert('Mensaje: exito'); 
                    console.log(data);
				}
			},
			// funcion en caso de error
			error: function (xhr, status, error) 
			{
				$("#loading").html("");
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


function getSubs()
{
	
	try
	{
		// construimos llamado a ajax
		$.ajax({
			type: 'POST',
			url: 'controller/categoryController.php',
			cache: false,
			dataType: "json",
			async:true,
			data: {
				Action : 'GetSubs'
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
				    console.log(data);
					//alert('Mensaje: exito'); 
					$.each(data, function (i, item) {
					          var id="#"+item.parent;
                              var element= '<li><a  id="'+item.id_category+'" class="nav-link" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="productos.php?subs='+item.id_category+'&search=1">'+item.name+'</a></li>';//</span><span>('+item.count+')</span></a></li>';
                              
							  $(element).appendTo(id);
                        });
                    //console.log(data);
					var id_cat = "#" + $("#subs").val();
					// $(id_cat).css("color","#ffc303");
					// $(id_cat).css("font-weight","bold");
					console.log(id_cat);
				}
			},
			// funcion en caso de error
			error: function (xhr, status, error) 
			{
				$("#loading").html("");
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
	getCategories();
});