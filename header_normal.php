<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<title>Bachoco Foodservice</title>	
		<meta name="keywords" content="Bachoco Foodservice" />
		<meta name="description" content="bachoco food service">
		<meta name="author" content="vmasideas">
		<link rel="shortcut icon" href="img/icons/favicon-32x32.png" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="vendor/animate/animate.compat.css">
		<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

	<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">

		<!-- Current Page CSS -->

		<link rel="stylesheet" href="vendor/circle-flip-slideshow/css/component.css">


		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="css/skins/default.css">
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">
		<link rel="preload" href="Actor-Regular.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="Helvetica-Bold.woff2" as="font" type="font/woff2" crossorigin>
		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.min.js"></script>

		<header id="header" class="header-narrow header-below-slider" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAtElement': '#header', 'stickySetTop': '0', 'stickyChangeLogo': false}">

						<div class="header-body header-body-bottom-border-fixed">

							<div class="header-container header-container-height-sm container">

								<div class="header-row">

									<div class="header-column">

										<div class="header-row">

											<div class="header-logo">

												<a href="index">

													<img alt="Porto" width="178" height="69" data-sticky-width="82" data-sticky-height="40" src="img/logobachocofootservice.png">

												</a>

											</div>

										</div>

									</div>

									<div class="header-column justify-content-end">

										<div class="header-row">

											<div class="header-nav header-nav-no-space-dropdown header-nav-stretch">

												<div class="header-nav-main header-nav-main-rounded header-nav-main-dropdown-no-borders header-nav-main-effect-1 header-nav-main-sub-effect-1">

													<nav class="collapse">

														<ul class="nav nav-pills" id="mainNav">

															

															<li class="nav-item" id="tab-about">

																<a class="nav-link" href="about">

																	QUIENES SOMOS

																</a>																

															</li>

															<li class="nav-item" id="tab-socios">

																<a class="nav-link" href="socios">

																	SOCIOS COMERCIALES

																</a>																

															</li>

															<li class="nav-item" id="tab-productos">

																<a class="nav-link" href="productos">

																	PRODUCTOS

																</a>																

															</li>

															<li class="nav-item" id="tab-contact">

																<a class="nav-link" href="contact">

																	CONTACTO

																</a>																

															</li>

														</ul>

													</nav>

												</div>

												<ul class="header-social-icons social-icons d-none d-sm-block">													

													<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>

												</ul>

												<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">

													<i class="fas fa-bars"></i>

												</button>

											</div>

										</div>

									</div>

								</div>

							</div>							

						</div>

					</header>

					<script>
						/// Url actual
							let url = window.location.href;

							/// Elementos de li
							const tabs = ["about","socios","productos","contact"];							
							
							tabs.forEach(e => {
								/// Agregar .php y ver si lo contiene en la url
								if (url.indexOf(e) !== -1) {
									/// Agregar tab- para hacer que coincida la Id
									setActive("tab-" + e);
								}

							});

							/// Funcion que asigna la clase active
							function setActive(id) {
								document.getElementById(id).setAttribute("class", "nav-item active");
							}
												
				</script>
