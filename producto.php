<?php
if(isset($_GET['item']) && !empty($_GET['item']) ){
    $product=$_GET['item'];
	require_once("config.php");
	//Consulta pa traerse todo
	$db->where ("id_product", $product);
	$prodQry = $db->get("TBL_PRODUCT");
	
	if ($db->count > 0)
	{	
		//echo $prodQry[0]["name"];
		$pNombre=$prodQry[0]["name"];
		$pDescripcion=$prodQry[0]["description_b2b"];
		$pSKU=$prodQry[0]["SKU"];
		$pColor=$prodQry[0]["color"];
		$pOdor=$prodQry[0]["odor"];
		$pTaste=$prodQry[0]["taste"];
		$pAspect=$prodQry[0]["aspect"];
		$pLifetime=$prodQry[0]["lifetime"];
		
		$pStorage_temp_min=$prodQry[0]["storage_temp_min"];
		$pStorage_temp_max=$prodQry[0]["storage_temp_max"];
		$pProduct_temp_min=$prodQry[0]["product_temp_min"];
		$pProduct_temp_max=$prodQry[0]["product_temp_max"];
		
		$pPrimary_package_type=$prodQry[0]["primary_package_type"];
		$pPrimary_pack_weight_min=$prodQry[0]["primary_pack_weight_min"];
		$pPrimary_pack_weight_max=$prodQry[0]["primary_pack_weight_max"];
		$pPrimary_pack_weight_number=$prodQry[0]["primary_pack_number"];
		
		$pSecondary_package_type=$prodQry[0]["secondary_pack_type"];
		$pSecondary_pack_weight_min=$prodQry[0]["secondary_pack_weight_min"];
		$pSecondary_pack_weight_max=$prodQry[0]["secondary_pack_weight_max"];
		$pSecondary_pack_weight_number=$prodQry[0]["secondary_pack_weight_number"];
		
		$pTerciary_package_type=$prodQry[0]["terciary_pack_type"];
		$pTerciary_pack_weight_min=$prodQry[0]["terciary_pack_weight_min"];
		$pTerciary_pack_weight_max=$prodQry[0]["terciary_pack_weight_max"];
		$pterciary_pack_weight_number=$prodQry[0]["terciary_pack_weight_number"];
		
		
		$pId_primary_pack=$prodQry[0]["id_primary_pack"];
		$db->where ("id_type", $pId_primary_pack);
		$prodQryPack1 = $db->get("CAT_PACK");
		if ($db->count > 0)
		{
			$pathPack1=$prodQryPack1[0]["img_path"];
		}
		
		
		$pId_secondary_pack=$prodQry[0]["id_secondary_pack"];
		$db->where ("id_type", $pId_secondary_pack);
		$prodQryPack2 = $db->get("CAT_PACK");
		if ($db->count > 0)
		{
			$pathPack2=$prodQryPack2[0]["img_path"];
		}
		
		
		$pId_terciary_pack=$prodQry[0]["id_terciary_pack"];
		$db->where ("id_type", $pId_terciary_pack);
		$prodQryPack3 = $db->get("CAT_PACK");
		if ($db->count > 0)
		{
			$pathPack3=$prodQryPack3[0]["img_path"];
		}
		
		
		$pBoxes1=$prodQry[0]["boxes_per_estiba"];
		$pBoxes2=$prodQry[0]["boxes_per_tarima"];
		$pBoxes3=$prodQry[0]["boxes_per_tarimaBox"];
		
		//Recuperación de imagenes
		$db->where ("id_product", $product);
		$db->where ("main_img", 1);
		$prodQryImg1 = $db->get("TBL_IMG");
		$pathIMG1="";
		$pathIMG2="";
		$imgvacio="images/productos/placeholder.jpg";
		if ($db->count > 0)
		{
			
			if ($prodQryImg1[0]["path"] == '') 
			{
				$pathIMG1=$imgvacio;
			}
			else {
				$pathIMG1=$prodQryImg1[0]["path"];
			}	

		}

		$db->where ("id_product", $product);
		$db->where ("main_img", 0);
		$prodQryImg2 = $db->get("TBL_IMG");

		if ($db->count > 0)
		{
			
			if ($pathIMG2=$prodQryImg2[0]["path"] == '') 
			{
				$pathIMG2=$imgvacio;
			}
			else {
				$pathIMG2=$prodQryImg2[0]["path"];
			}	

		}

		// if ($db->count > 0)
		// {
		// 	$pathIMG2=$prodQryImg2[0]["path"];
		// }
		
		
		$qryTMP="SELECT TBL1.name AS subcat, TBL2.name AS cat FROM TBL_CATEGORY TBL1, TBL_CATEGORY TBL2 WHERE TBL1.id_category_parent=TBL2.id_category AND TBL1.id_category=".$prodQry[0]["id_category"];
		//Categorias
		$prodQryCat = $db->rawQuery($qryTMP);
		if ($db->count > 0)
		{
			$category=$prodQryCat[0]["cat"];
			$subcategory=$prodQryCat[0]["subcat"];
		}
		
	}
}
?>

<!DOCTYPE html>

<html>
<head>
<?php 
		require_once("head.php");
?>

</head>



<body data-plugin-page-transition>



    <div class="body">

        <div class="notice-top-bar bg-primary" data-sticky-start-at="180">

            <button class="hamburguer-btn hamburguer-btn-light notice-top-bar-close m-0 active" data-set-active="false">

                <span class="close">

                    <span></span>

                    <span></span>

                </span>

            </button>

        </div>
       
		<?php
			require_once("header_normal.php");
		?>


        <div role="main" class="main shop pt-4" style="background-color: #212529;">

            <div class="container">

                <section>

                    <div class="row">

                        <div class="col-md-12">

                            <h5 class="text-24" style="text-transform: none"><?php echo $category; ?> | <?php echo $subcategory; ?></h5>

                            <h5 class="text-23" style="margin-top: -10px;text-transform: capitalize;"><?php echo $pNombre; ?></h5>

                            <hr class="solid my-4" style="width: 130px;border-width: 4px;color: #C1974E;margin-bottom: 0rem!important;">

                        </div>

                    </div>

                </section>               

            </div>

        </div>

        <div role="main" class="main shop pt-4" style="background-color: black; background-image: url('img/home/fondo.jpg')">

            <div class="container" style="padding-bottom: 80px;">    
				
				<div class="row wow fadeInDown">
					<div class="col-lg-1 ">
						<p class="lead-3" style="text-align: center; color: white;">Clave: <br><span style="font-size: 30px;"><?php echo $pSKU; ?></span></p>
					</div>
					<div class="col-lg-11">
						
						<div class="main-title text-lg-left mb-0" data-wow-delay="300ms">
                        <p id="description" class="lead-3 pb-4" data-wow-delay="500ms"><?php echo $pDescripcion; ?></p>
                    </div>
						
					</div>
				</div>

              <div class="row">
                <div class="col-lg-4 product-listing-products  wow fadeInLeft">
                     <img src="<?php echo $pathIMG1;?>" class="card-img-top">
					<a href="#" class="btn btn-outline btn-primary font-weight-bold text-1 px-4 btn-py-2" style="margin-top: 20px; width: 100%;">SOLICITAR COTIZACIÓN</a>
                </div>
                <div class="col-lg-8">
					<div class="row wow fadeInRight">
						<div class="col-lg-12" style="margin-bottom: 20px;">
							<h5 class="lead-5 pt-3">CARACTERÍSTICAS SENSORIALES</h5>
						</div>
						
						<div class="col-lg-3">
							<img style="margin:auto; display:block; margin-bottom: 5px;" src="img/color_png.png">
							<p class="lead-3" style="font-style: italic; text-align: center;"><?php echo $pColor; ?></p>
						</div>
						<div class="col-lg-3">
							<img style="margin:auto; display:block; margin-bottom: 5px;" src="img/olor_png.png">
							<p class="lead-3" style="font-style: italic; text-align: center;"><?php echo $pOdor; ?></p>
						</div>
						<div class="col-lg-3">
							<img style="margin:auto; display:block; margin-bottom: 5px;" src="img/sabor_png.png">
							<p class="lead-3" style="font-style: italic; text-align: center;"><?php echo $pTaste; ?></p>
						</div>
						<div class="col-lg-3">
							<img style="margin:auto; display:block; margin-bottom: 5px;" src="img/aspecto.png">
							<p class="lead-3" style="font-style: italic; text-align: center;"><?php echo $pAspect; ?></p>
						</div>
						
						<div class="col-lg-9">
							
							<h5 class="lead-5 pt-3">CONSERVACIÓN</h5>
							
							  <table id="table_variant" class="lead-3 tabla-producto wow fadeInUp table-responsive" data-wow-delay="500ms" style="width: 100%;">
								<tr style="background-color: #212529;">
								  <th>Temperatura</th>
								  <th>Mínimo</th>
								  <th>Máximo</th>
								</tr>
								<tr style="border-bottom: 1px solid white;">
									<td>Almacenamiento</td>
									<td><?php echo $pStorage_temp_min; ?></td>
									<td><?php echo $pStorage_temp_max; ?></td>
								</tr>
								  <tr style="border-bottom: 1px solid white;">
									<td>Producto</td>
									<td><?php echo $pProduct_temp_min; ?></td>
									<td><?php echo $pProduct_temp_max; ?></td>
								</tr>
							  </table>
						</div>
						
						<div class="col-lg-3">
							<h5 class="lead-5 pt-3" style="margin-bottom: 30px;">VIDA EN ANQUEL</h5>
							<p class="lead-3" style="text-align: center;"><span style="font-size: 60px;"><?php echo $pLifetime; ?></span><br>días</p>
						</div>
						
					</div>
                </div>
            </div>

				
				
			<div class="row" style="margin-top: 100px;">
						<div class="col-lg-9">
							  <table id="table_variant" class="lead-3 tabla-producto wow fadeInUp table-responsive" data-wow-delay="500ms" style="width: 100%;">
								<tr style="background-color: #212529;">
								  <th></th>
								  <th>Tipo de empaque</th>
								  <th style="text-align: center;">Peso Máximo (Kg)</th>
								  <th style="text-align: center;">Peso Mínimo (Kg)</th>
								  <th style="text-align: center;">No de piezas por empaque</th>
								</tr>
								<tr style="border-bottom: 1px solid white;">
									<td>Primario</td>
									<td><?php echo $pPrimary_package_type; ?></td>
									<td style="text-align: center;"><?php echo $pPrimary_pack_weight_min; ?></td>
									<td style="text-align: center;"><?php echo $pPrimary_pack_weight_max; ?></td>
									<td style="text-align: center;"><?php echo $pPrimary_pack_weight_number; ?></td>
								</tr>
								  <tr style="border-bottom: 1px solid white;">
									<td>Secundario</td>
									<td><?php echo $pSecondary_package_type; ?></td>
									<td style="text-align: center;"><?php echo $pSecondary_pack_weight_min; ?></td>
									<td style="text-align: center;"><?php echo $pSecondary_pack_weight_max; ?></td>
									<td style="text-align: center;"><?php echo $pSecondary_pack_weight_number; ?></td>
								</tr>
								   <tr style="border-bottom: 1px solid white;">
									<td>Terciario</td>
									<td><?php echo $pTerciary_package_type; ?></td>
									<td style="text-align: center;"><?php echo $pTerciary_pack_weight_min; ?></td>
									<td style="text-align: center;"><?php echo $pTerciary_pack_weight_max; ?></td>
									<td style="text-align: center;"><?php echo $pterciary_pack_weight_number; ?></td>
								</tr>
							  </table>
						</div>
						
						<div class="col-lg-3 wow fadeInRight">
							  <img src="<?php echo $pathIMG2;?>" class="card-img-top">
						</div>
					</div>
				
				
			  	<div class="row wow fadeInUp" style="margin-top: 50px;">
					<div class="col-lg-4">
						<img style="margin:auto; display:block; margin-bottom: 5px;" src="<?php echo $pathPack1; ?>">
					</div>
					<div class="col-lg-4">
						<img style="margin:auto; display:block; margin-bottom: 5px;" src="<?php echo $pathPack2; ?>">

					</div>
					<div class="col-lg-4">
						<img style="margin:auto; display:block; margin-bottom: 5px;" src="<?php echo $pathPack3; ?>">
					</div>
				</div>
				
				
				
				
				  	<div class="row wow fadeInUp" style="margin-top: 50px;">
					<div class="col-lg-6">
						<table id="table_variant" class="lead-3 tabla-producto wow fadeInUp table-responsive" data-wow-delay="500ms" style="width: 100%;">
								<tr style="background-color: #212529;">
								  <th></th>
								  <th style="text-align: center;">Estibado</th>
								</tr>
								<tr style="border-bottom: 1px solid white;">
									<td>Cajas por estiba</td>
									<td style="text-align: center;"><?php echo $pBoxes1; ?></td>
								</tr>
								  <tr style="border-bottom: 1px solid white;">
									<td>Estibas por tarima</td>
									<td style="text-align: center;"><?php echo $pBoxes2; ?></td>
								</tr>
								   <tr style="border-bottom: 1px solid white;">
									<td>Cajas por tarima</td>
									<td style="text-align: center;"><?php echo $pBoxes3; ?></td>
								</tr>
							  </table>
					</div>
					<div class="col-lg-6">
						<img style="margin:auto; display:block; margin-bottom: 5px;" src="img/logo_blanco_bachoco.png">

					</div>
				</div>
				
				
            </div>

        </div>

    </div>



    <?php
    require_once("footer.php");
    ?>
	
    </div>



    <!-- Vendor -->
    <script src="vendor/plugins/js/plugins.min.js"></script>
    <script src="vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
    <script src="vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>
    <script src="vendor/jquery.countdown/jquery.countdown.min.js"></script>


    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Current Page Vendor and Views -->
    <script src="js/views/view.shop.js"></script>

    <!-- Theme Custom -->
    <script src="js/custom.js"></script>
    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>


    <?php require_once('scripts.php'); ?>
    <script src="vendor__/js/functions.js"></script>
    <script src="vendor__/shop/js/nouislider.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="vendor__/shop/js/script.js"></script>



</body>



</html>