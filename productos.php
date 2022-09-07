<?php

if (isset($_GET['subs']) && !empty($_GET['subs']) and isset($_GET['search']) && !empty($_GET['search'])) {

    $subs = $_GET['subs'];

    $search = $_GET['search'];
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

                            <h5 class="text-24" style="text-transform: none">Catálogo de</h5>

                            <h5 class="text-23" style="margin-top: -10px;text-transform: capitalize;">Productos</h5>

                            <hr class="solid my-4" style="width: 130px;border-width: 4px;color: #C1974E;margin-bottom: 0rem!important;">

                        </div>

                    </div>

                </section>

            </div>

        </div>

        <div role="main" class="main pt-4 section bg-color-grey-scale-1 section-height-3 border-0 m-0 bg-dark">

            <div class="container">

                <section>

                    <div class="product-listing">

                        <div class="container">

                            <div class="row">

                                <!-- START STICKY NAV -->

                                <div class="col-lg-3  order-2 order-lg-1">

                                    <aside class="sidebar">

                                        <form action="productos.php" method="GET">

                                            <input type="hidden" name="search" value="2" />

                                            <div class="input-group search-box-form">

                                                <input name="subs" type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar...">

                                                <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>

                                            </div>

                                        </form>

                                        <h5 class="lead-5 pt-3">CATEGORÍAS</h5>

                                        <ul class="nav nav-list flex-column" id="container_category">

                                        </ul>



                                    </aside>

                                </div>

                                <div class="col-lg-3 position-relative" style="display: none;">
                                    <aside class="sidebar" id="sidebar" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 110}}">
                                        <form action="productos.php" method="GET">

                                            <input type="hidden" name="search" value="2" />

                                            <div class="input-group search-box-form">

                                                <input name="subs" type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar...">

                                                <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>

                                            </div>

                                        </form>
                                        <h5 class="lead-5 pt-3">CATEGORÍAS</h5>
                                        <ul class="nav nav-list flex-column mb-5">
                                            <li class="nav-item">
                                                <a class="nav-link" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="#first">First</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="#second">Second</a>
                                                <ul>
                                                    <li class="nav-item"><a class="nav-link" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="#sub-second-1">Sub Second 1</a></li>
                                                    <li class="nav-item"><a class="nav-link" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="#sub-second-2">Sub Second 2</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="#third">Third</a></li>
                                        </ul>

                                    </aside>
                                </div>

                                <!-- END STICKY NAV -->

                                <!-- START PRODUCT COL 8 -->

                                <div class="col-md-12 col-lg-9 order-1 order-lg-2">

                                    <div class="row">

                                        <!-- START LISTING HEADING -->

                                        <div class="col-12 product-listing-heading">

                                            <p class="text-6-5-2 text-left">Nuestros productos son elaborados con altos estándares de calidad, innovando en soluciones cárnicas, siempre buscando la excelencia en todos nuestros productos.</p>

                                        </div>

                                        <!-- END LISTING HEADING -->

                                        <!-- START PRODUCT LISTING SECTION -->

                                        <div class="col-12 product-listing-products">

                                            <!-- START DISPLAY PRODUCT -->

                                            <div id="product_container" class="product-list row">

                                                <div id="template_item" class="col-12 col-md-6 col-lg-3 manage-color-hover wow slideInUp" data-wow-delay=".2s">

                                                    <div class="product-item">

                                                        <div class="item p-item-img">

                                                            <a class="listing-cart-icon" href="producto.php">

                                                                <img>

                                                                <div class="text-center d-flex justify-content-center align-items-center">

                                                                </div>

                                                            </a>

                                                        </div>

                                                        <!-- <div class="item p-item-img">

															<img src="images/productos/producto.jpeg" alt="images">

															<div class="text-center d-flex justify-content-center align-items-center">

																<a class="listing-cart-icon" href="producto.php">

																	<i class="fa fa-search"></i>

																</a>

															</div>

														</div> -->

                                                    </div>

                                                    <div class="p-item-detail" style="margin-top: 12px;">

                                                        <small class="d-block text-uppercase text-decoration-none text-6-5-3 text-color-hover-primary line-height-1 mb-1"><span id="categoria_producto" class="codigo-producto"></span> | <span id="codigo-producto" class="codigo-producto"></span></small>

                                                        <p class="text-6-5-4 text-color-hover-primary"></p>

                                                    </div>

                                                </div>

                                            </div>



                                        </div>

                                        <!-- END DISPLAY PRODUCT -->





                                    </div>

                                    <!-- END PRODUCT LISTING SECTION -->

                                </div>

                            </div>

                            <!-- END PRODUCT COL 8 -->

                        </div>

                    </div>

                </Section>

            </div>

        </div>

    </div>


    <?php
    require_once("footer.php");
    ?>
    <input type="hidden" id="product">

    <input type="hidden" id="subs" value='<?php echo $subs ?>'>

    <input type="hidden" id="search" value="<?php echo $search ?>">

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

    <script src="assets/js/products.js"></script>

    <script src="assets/js/categories.js"></script>

    <script src="assets/js/script.js"></script>

    <script src="vendor__/shop/js/script.js"></script>



</body>



</html>