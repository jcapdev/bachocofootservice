// loading
var loading =
  '<div class="overlayLoader"><div class="loading-gif"><img src="img/loader.gif" alt="Cargando..." /></div></div>';

function GetProductsRelated(category) {
  $("#loading").html(loading);
  try {
    // construimos llamado a ajax
    $.ajax({
      type: "POST",
      url: "controller/productsController.php",
      cache: false,
      dataType: "json",
      async: true,
      data: {
        Action: "GetProducts",
        name: category,
      },
      // funcion en caso de exito
	  success: function (Response, textStatus, jqXHR) {
        $("#loading").html("");
        if (Response.msg !== undefined) {
          alert("Mensaje: " + Response.msg);
        } else {
			for (var i = 0; i < Response.length; i++) {
				//$('#template_item').append('<li><img src="' + Response[i].id_product + '" data-id="' + Response[i].name + '"/>'+ Response[i].name + '</li>')
				//$('#template_item').append('<div class="col-sm-6 col-lg-4"><div class="product mb-0"><div class="product-thumb-info border-0 mb-3"><a href="ajax/shop-product-quick-view.html"class="quick-view text-uppercase font-weight-semibold text-2">QUICK VIEW</a><a href="shop-product-sidebar-left.html"><div class="product-thumb-info-image"><img alt="" class="border-img img-fluid"src="img/products/product-grey-1.jpg"></div></a></div><div class="d-flex justify-content-between"><div><a href="#"class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">electronics</a><h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html"class="text-color-dark text-color-hover-primary">PhotoCamera</a></h3</div></div><p class="price text-5 mb-3"><span class="sale text-color-dark font-weight-semi-bold"></span><span class="amount"></span></p></div></div>')				
			  }
			  

          $.each(Response, function (i, item) {
            $clon = $("#template_item").clone().removeAttr("id");
            $clon.find("a").attr("href", "producto.php?item=" + item.id_product);            
			$clon.find("img").attr("class", "border-img img-fluid");			
			$clon.find("img").attr("src", "img/products/product-grey-1.jpg");//remover cuando este en produccion
			//$clon.find("img").attr("src", item.image);
            $clon.find("p").text(item.name);
            var codes = "";
            $.each(item.variants, function (j, element) {
              codes += element.sku + "-";
            });
             $clon.find("span").text(codes.slice(0, codes.length - 1));
            $clon.appendTo("#product_container");
          });
          $("#template_item").remove();
      		 console.log(Response);
        }



      },
      // funcion en caso de error
      error: function (xhr, status, error) {
        $("#loading").html("");
        console.log(xhr);
        alert("Error busq:" + error);
        return false;
      },
    });
  } catch (err) {
    alert("Catch: " + err);
    return false;
  }
}

function GetProducts(category) {
  $("#loading").html(loading);
  try {
    // construimos llamado a ajax
    $.ajax({
      type: "POST",
      url: "controller/productsController.php",
      cache: false,
      dataType: "json",
      async: true,
      data: {
        Action: "GetProducts",
        name: category,
      },
      // funcion en caso de exito
	  success: function (Response, textStatus, jqXHR) {
        $("#loading").html("");
        if (Response.msg !== undefined) {
          alert("Mensaje: " + Response.msg);
        } else {
			for (var i = 0; i < Response.length; i++) {
				//$('#template_item').append('<li><img src="' + Response[i].id_product + '" data-id="' + Response[i].name + '"/>'+ Response[i].name + '</li>')
				//$('#template_item').append('<div class="col-sm-6 col-lg-4"><div class="product mb-0"><div class="product-thumb-info border-0 mb-3"><a href="ajax/shop-product-quick-view.html"class="quick-view text-uppercase font-weight-semibold text-2">QUICK VIEW</a><a href="shop-product-sidebar-left.html"><div class="product-thumb-info-image"><img alt="" class="border-img img-fluid"src="img/products/product-grey-1.jpg"></div></a></div><div class="d-flex justify-content-between"><div><a href="#"class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">electronics</a><h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html"class="text-color-dark text-color-hover-primary">PhotoCamera</a></h3</div></div><p class="price text-5 mb-3"><span class="sale text-color-dark font-weight-semi-bold"></span><span class="amount"></span></p></div></div>')				
			  }
			  

          $.each(Response, function (i, item) {
            $clon = $("#template_item").clone().removeAttr("id");
            $clon.find("a").attr("href", "producto.php?item=" + item.id_product);            
			$clon.find("img").attr("class", "border-img img-fluid");			
			//$clon.find("img").attr("src", "img/products/product-grey-1.jpg");//remover cuando este en produccion
			$clon.find("img").attr("src", item.image);
            $clon.find("p").text(item.name);
            $clon.find("#categoria_producto").text(item.parent_name);
            $clon.find("#codigo-producto").text(item.category_name);
            $clon.appendTo("#product_container");
          });
          $("#template_item").remove();
      		 console.log(Response);
        }



      },
      // funcion en caso de error
      error: function (xhr, status, error) {
        $("#loading").html("");
        console.log(xhr);
        alert("Error busq:" + error);
        return false;
      },
    });
  } catch (err) {
    alert("Catch: " + err);
    return false;
  }
}

function GetSearch(category) {
  $("#loading").html(loading);
  try {
    // construimos llamado a ajax
    $.ajax({
      type: "POST",
      url: "controller/productsController.php",
      cache: false,
      dataType: "json",
      async: true,
      data: {
        Action: "GetSearch",
        name: category,
      },
      // funcion en caso de exito
      success: function (Response, textStatus, jqXHR) {
        $("#loading").html("");
        if (Response.msg !== undefined) {
          alert("Mensaje: " + Response.msg);
        } else {
			for (var i = 0; i < Response.length; i++) {
				//$('#template_item').append('<li><img src="' + Response[i].id_product + '" data-id="' + Response[i].name + '"/>'+ Response[i].name + '</li>')
				//$('#template_item').append('<div class="col-sm-6 col-lg-4"><div class="product mb-0"><div class="product-thumb-info border-0 mb-3"><a href="ajax/shop-product-quick-view.html"class="quick-view text-uppercase font-weight-semibold text-2">QUICK VIEW</a><a href="shop-product-sidebar-left.html"><div class="product-thumb-info-image"><img alt="" class="border-img img-fluid"src="img/products/product-grey-1.jpg"></div></a></div><div class="d-flex justify-content-between"><div><a href="#"class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">electronics</a><h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html"class="text-color-dark text-color-hover-primary">PhotoCamera</a></h3</div></div><p class="price text-5 mb-3"><span class="sale text-color-dark font-weight-semi-bold"></span><span class="amount"></span></p></div></div>')				
			  }
			  

          $.each(Response, function (i, item) {
            $clon = $("#template_item").clone().removeAttr("id");
            $clon.find("a").attr("href", "producto.php?item=" + item.id_product);            
			$clon.find("img").attr("class", "border-img img-fluid");			
			//$clon.find("img").attr("src", "img/products/product-grey-1.jpg");//remover cuando este en produccion
			$clon.find("img").attr("src", item.image);
            $clon.find("p").text(item.name);
            $clon.find("#codigo-producto").text(item.category_name);
             $clon.find("#categoria_producto").text(item.parent_name);
            $clon.appendTo("#product_container");
          });
          $("#template_item").remove();
      		 console.log(Response);
        }
      },
      // funcion en caso de error
      error: function (xhr, status, error) {
        $("#loading").html("");
        console.log(xhr);
        alert("Error busq:" + error);
        return false;
      },
    });
  } catch (err) {
    alert("Catch: " + err);
    return false;
  }
}

function GetProduct(product) {
  $("#loading").html(loading);

  try {
    // construimos llamado a ajax
    $.ajax({
      type: "POST",
      url: "controller/productsController.php",
      cache: false,
      dataType: "json",
      async: true,
      data: {
        Action: "GetProduct",
        id_product: product,
      },
      // funcion en caso de exito
	  success: function (Response, textStatus, jqXHR) {
        $("#loading").html("");
        if (Response.msg !== undefined) {
          alert("Mensaje: " + Response.msg);
        } else {
			for (var i = 0; i < Response.length; i++) {
				//$('#template_item').append('<li><img src="' + Response[i].id_product + '" data-id="' + Response[i].name + '"/>'+ Response[i].name + '</li>')
				//$('#template_item').append('<div class="col-sm-6 col-lg-4"><div class="product mb-0"><div class="product-thumb-info border-0 mb-3"><a href="ajax/shop-product-quick-view.html"class="quick-view text-uppercase font-weight-semibold text-2">QUICK VIEW</a><a href="shop-product-sidebar-left.html"><div class="product-thumb-info-image"><img alt="" class="border-img img-fluid"src="img/products/product-grey-1.jpg"></div></a></div><div class="d-flex justify-content-between"><div><a href="#"class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">electronics</a><h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html"class="text-color-dark text-color-hover-primary">PhotoCamera</a></h3</div></div><p class="price text-5 mb-3"><span class="sale text-color-dark font-weight-semi-bold"></span><span class="amount"></span></p></div></div>')				
			  }
			  

          $.each(Response, function (i, item) {
            $clon = $("#template_item").clone().removeAttr("id");
            $clon.find("a").attr("href", "producto.php?item=" + item.id_product);            
			$clon.find("img").attr("class", "border-img img-fluid");			
			$clon.find("img").attr("src", "img/products/product-grey-1.jpg");//remover cuando este en produccion
			//$clon.find("img").attr("src", item.image);
            $clon.find("p").text(item.name);
            var codes = "";
            $.each(item.variants, function (j, element) {
              codes += element.sku + "-";
            });
             $clon.find("span").text(codes.slice(0, codes.length - 1));
            $clon.appendTo("#product_container");
          });
          $("#template_item").remove();
      		 console.log(Response);
        }
      },
      // funcion en caso de error
      error: function (xhr, status, error) {
        $("#loading").html("");
        alert("Error busq:" + error);
        return false;
      },
    });
  } catch (err) {
    alert("Catch: " + err);
    return false;
  }
}

function GetProductAll() {
  $("#loading").html(loading);

  try {
    // construimos llamado a ajax
    $.ajax({
      type: "POST",
      url: "controller/productsController.php",
      cache: false,
      dataType: "json",
      async: true,
      data: {
        Action: "GetProductAll",
      },
      // funcion en caso de exito
      success: function (Response, textStatus, jqXHR) {
        $("#loading").html("");
        if (Response.msg !== undefined) {
          alert("Mensaje: " + Response.msg);
        } else {
			for (var i = 0; i < Response.length; i++) {
				//$('#template_item').append('<li><img src="' + Response[i].id_product + '" data-id="' + Response[i].name + '"/>'+ Response[i].name + '</li>')
				//$('#template_item').append('<div class="col-sm-6 col-lg-4"><div class="product mb-0"><div class="product-thumb-info border-0 mb-3"><a href="ajax/shop-product-quick-view.html"class="quick-view text-uppercase font-weight-semibold text-2">QUICK VIEW</a><a href="shop-product-sidebar-left.html"><div class="product-thumb-info-image"><img alt="" class="border-img img-fluid"src="img/products/product-grey-1.jpg"></div></a></div><div class="d-flex justify-content-between"><div><a href="#"class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">electronics</a><h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html"class="text-color-dark text-color-hover-primary">PhotoCamera</a></h3</div></div><p class="price text-5 mb-3"><span class="sale text-color-dark font-weight-semi-bold"></span><span class="amount"></span></p></div></div>')				
			  }
			  

          $.each(Response, function (i, item) {
            $clon = $("#template_item").clone().removeAttr("id");
            $clon.find("a").attr("href", "producto.php?item=" + item.id_product);            
			$clon.find("img").attr("class", "border-img img-fluid");			
			//$clon.find("img").attr("src", "img/products/product-grey-1.jpg");//remover cuando este en produccion
			$clon.find("img").attr("src", item.image);
            $clon.find("p").text(item.name);
             $clon.find("#codigo-producto").text(item.category_name);
             $clon.find("#categoria_producto").text(item.parent_name);
            $clon.appendTo("#product_container");
          });
          $("#template_item").remove();
      		 console.log(Response);
        }



      },
      // funcion en caso de error
      error: function (xhr, status, error) {
        $("#loading").html("");
        alert("Error busq:" + error);
        console.log(xhr);
        return false;
      },
    });
  } catch (err) {
    alert("Catch: " + err);
    return false;
  }
}

$(document).ready(function () {
  $("#loading").html("");
//   if ($("#product").val() !== "") {
//     GetProduct($("#product").val());
//   }

  if ($("#subs").val().length == 0) {
    GetProductAll();
	//console.log("llegamos aqui");

  } else {
    if ($("#search").val() == 1) {
      GetProducts($("#subs").val());
    } else {
      GetSearch($("#subs").val());
    }
  }
});
