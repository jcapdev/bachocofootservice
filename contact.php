<!DOCTYPE html>

<html>

	<head>


<?php 
		require_once("head.php");
		?>
		



	</head>

	<body data-plugin-page-transition>

		<div class="body">

		<?php
			require_once("header_normal.php");
			?>

			<div role="main" class="main shop pt-5" style="background-color: #212529;">

				<div class="container">

					<section>

						<div class="row">

							<div class="col-md-12">								

								<h5 class="text-23" style="margin-top: -10px;text-transform: capitalize;">CONTACTO</h5>

								<hr class="solid my-4" style="width: 130px;border-width: 4px;color: #C1974E;margin-bottom: 0rem!important;">

							</div>

						</div>

					</section>               

				</div>

			</div>

			<div role="main" class="section bg-color-grey-scale-1 section-height-3 border-0 m-0 bg-dark">

				<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->

				<div id="googlemaps" class="google-map mt-0" style="height: 500px;"></div>

				<div class="container">

					<div class="row py-4">

						<div class="col-lg-6">

							<h2 class="font-weight-bold text-23 mt-2 mb-0">CONTACTO</h2>

							<p class="mb-4 lead-4">Déjanos un mensaje y uno de nuestros ejecutivos se comunicará contigo a la brevedad.</p>



							<form class="contact-form" action="php/contact-form.php" method="POST">

								<div class="contact-form-success alert alert-success d-none mt-4">

									<strong>Exitoso!</strong> Tus mensaje ha sido enviado.

								</div>



								<div class="contact-form-error alert alert-danger d-none mt-4">

									<strong>Error!</strong> Tu mensaje no ha sido enviado.

									<span class="mail-error-message text-1 d-block"></span>

								</div>



								<div class="row">

									<div class="form-group col-lg-6">

										<label class="form-label mb-1 text-6-5-5">Nombre completo*</label>

										<input type="text" value="" data-msg-required="Porfavor coloca tu nombre." maxlength="100" class="form-control text-3 h-auto py-2" name="name" required>

									</div>

									<div class="form-group col-lg-6">

										<label class="form-label mb-1 text-6-5-5">Email*</label>

										<input type="email" value="" data-msg-required="Porfavor coloca tu correo." data-msg-email="Coloca un correo valido." maxlength="100" class="form-control text-3 h-auto py-2" name="email" required>

									</div>

								</div>

								<div class="row">

									<div class="form-group col-lg-6">

										<label class="form-label mb-1 text-6-5-5">Teléfono*</label>

										<input type="text" value="" data-msg-required="Porfavor coloca tu telefono." maxlength="100" class="form-control text-3 h-auto py-2" name="phone" required>

									</div>

									<div class="form-group col-lg-6">

										<label class="form-label mb-1 text-6-5-5">Empresa*</label>

										<input type="text" value="" data-msg-required="Porfavor coloca una empresa." maxlength="100" class="form-control text-3 h-auto py-2" name="empresa" required>

									</div>

								</div>

								<div class="row">

									<div class="form-group col">

										<label class="form-label mb-1 text-6-5-5">Mensaje</label>

										<textarea maxlength="5000" data-msg-required="Porfavor coloca un mensaje." rows="8" class="form-control text-3 h-auto py-2" name="message" required></textarea>

									</div>

								</div>

								<div class="row">

									<div class="form-group col">

										<input type="submit" value="ENVIAR MENSAJE" class="btn btn-primary btn-modern" data-loading-text="Loading...">

									</div>

								</div>

							</form>



						</div>

						<div class="col-lg-6">



							<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">

								<h4 class="mt-2 text-23 mb-1">Comunícate al Centro de Servicio al:</h4>
								<!-- <p class="mb-4 lead-4">Comunícate al Centro de Servicio al</p> -->
								<!-- Comunícate al Centro de Servicio al 800 607 5000,de lunes a viernes en horario de 8:00 a 18:00 horas. -->

								<ul class="list list-icons text-6-5-2 list-icons-style-2 mt-2">

									<!-- <li><i class="fas fa-map-marker-alt"></i>Prol. 27 Nte. 10262, Parque Industrial 5 de Mayo, 72019 Puebla, Pue.</li> -->

									<li><i class="fas fa-phone"></i>800 607 5000.</li>

									<li><i class="fas fa-envelope"></i><a href="mailto:cercadeti@bachoco.net">cercadeti@bachoco.net</a></li>

								</ul>

							</div>



							<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="950">

								<h4 class="pt-5 text-23">HORARIOS DE ATENCIÓN</h4>

								<ul class="list text-6-5-2 list-icons list-dark mt-2">

									<li><i class="far fa-clock top-6"></i>Lunes a viernes:  8 am a 6 pm</li>

									<!-- <li><i class="far fa-clock top-6"></i>Sábados: 8 am a 1 pm</li>									 -->

								</ul>

							</div>

							<p class="lead mb-0 text-6-5-2">Atendemos eficientemente a un número importante de clientes con gran prestigio y presencia a nivel nacional e internacional. Contamos con el respaldo de un equipo de expertos que te ayudarán a hacer tu negocio más exitoso.</p>

							<p class="text-6-5-6" style="margin-top: 30px;">¡Somos un mundo de posibilidades! Imagina todo lo que podemos hacer juntos.</p>

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
		
		<script src="vendor/jquery.validation/jquery.validate.min.js"  ></script>


		<!-- Theme Base, Components and Settings -->

		<script src="js/theme.js"></script>



		<!-- Circle Flip Slideshow Script -->

		<script src="vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>

		<!-- Current Page Views -->

		<script src="js/views/view.home.js"></script>

		<script src="js/views/view.contact.js"></script>



		<!-- Theme Custom -->

		<script src="js/custom.js"></script>



		<!-- Theme Initialization Files -->

		<script src="js/theme.init.js"></script>


		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0JvjYEap-DcONtcrFFn2A_d6HGEHWMeY"></script>
		<script>

			/*
			Map Settings

				Find the Latitude and Longitude of your address:
					- https://www.latlong.net/
					- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

			*/

			// Map Markers
			var mapMarkers = [{
				address: "RYC CEDIS PUEBLA Alimentos",
				html: "<strong>Porto Auto Services</strong><br>Prol. 27 Nte. 10262, Parque Industrial 5 de Mayo",
				icon: {
					image: "img/demos/auto-services/map-pin.png",
					iconsize: [31, 40],
					iconanchor: [14, 40]
				},
				popup: false
			}];

			// Map Initial Location
			var initLatitude = 19.0895761;
			var initLongitude = -98.1967308;

			// Map Extended Settings
			var mapSettings = {
				controls: {
					draggable: (($.browser.mobile) ? false : true),
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: true,
					streetViewControl: true,
					overviewMapControl: true
				},
				scrollwheel: false,
				markers: mapMarkers,
				latitude: initLatitude,
				longitude: initLongitude,
				zoom: 16
			};

			var map = $('#googlemaps').gMap(mapSettings),
				mapRef = $('#googlemaps').data('gMap.reference');

			var mapRef = $('#googlemaps').data('gMap.reference');

			// Styles from https://snazzymaps.com/
			var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];

			var styledMap = new google.maps.StyledMapType(styles, {
				name: 'Styled Map'
			});

			mapRef.mapTypes.set('map_style', styledMap);
			mapRef.setMapTypeId('map_style');

  			// -- GET DIRECTION --------------------------------------------------------
  			var $getDirectionForm  = $('.custom-get-direction-form'),
  				$directionPanel    = $('.custom-directions-panel'),
				directionsRenderer = new google.maps.DirectionsRenderer(),
				directionsService  = new google.maps.DirectionsService();

			directionsRenderer.setMap( mapRef );
  			directionsRenderer.setPanel( $directionPanel[0] );

  			$getDirectionForm.on('submit', function(e){
  				e.preventDefault();
  				calculateAndDisplayRoute(directionsService, directionsRenderer, mapRef, true);
  			});

  			$(window).afterResize(function(){
  				calculateAndDisplayRoute(directionsService, directionsRenderer, mapRef);
  			});

  			function calculateAndDisplayRoute(directionsService, directionsRenderer, mapRef, scrollTo) {
			  	var $addressInput = $('.custom-get-direction-address'),
			  		start         = $addressInput.val(), // The address entered on input field
			  		end           = 'RYC CEDIS PUEBLA Alimentos'; // Address of destination

			  	if( !$addressInput.val() ) {
			  		return;
			  	}

			  	// Generate the route
			  	directionsService.route(
			    	{
			      		origin: start,
			      		destination: end,
			      		travelMode: google.maps.TravelMode.DRIVING,
			    	},
			    	(response, status) => {
			      		if (status === "OK") {
			        		setMapAndPanelSize();
			        		directionsRenderer.setDirections(response);

					    } else {
							setDirectionErrorMessages( status );
			      		}

			      		if( scrollTo ) {
				      		$('html, body').animate({
				      			scrollTop: $('#get-direction').offset().top - $('#header').outerHeight()
				      		}, 1000);
			      		}
			    	}
			  	);
			}

			function setMapAndPanelSize() {
				var $googleMap      = $('#googlemaps'),
			  		$directionPanel = $('.custom-directions-panel'),
			  		$errorWrapper   = $('.custom-get-direction-error'),
					panelWidth = $directionPanel.width();

				$errorWrapper
					.addClass( 'd-none' )
					.removeClass( 'animated fadeIn' );

        		if( $(window).width() < 768 ) {
        			$directionPanel
        				.removeClass( 'position-absolute mh-100' )
        				.attr( 'style', 'max-height: 300px;' );

        			$googleMap
	        			.css({
	        				'width': '',
	        				'margin-left': ''
	        			});
        		} else {
	        		$directionPanel
        				.addClass( 'position-absolute mh-100' )
        				.css( 'max-height', '' );

	        		$googleMap
	        			.attr( 'style', $googleMap.attr('style') + 'width: calc( 100% - '+ panelWidth +'px ) !important; margin-left: '+ panelWidth +'px !important;' );
	        	}
			}

			function setDirectionErrorMessages( status ) {
				var $errorWrapper   = $('.custom-get-direction-error'),
			  		$errorMessage   = $('.custom-get-direction-error-message');

				$errorWrapper
					.removeClass( 'd-none' )
					.addClass( 'animated fadeIn' );

				var error = '';
				switch ( status ) {
					case 'NOT_FOUND':
						error = 'Address not found. Please try again.';
						break;

					case 'ZERO_RESULTS':
						error = 'By some reason we couldn\'t generate a route for this address.';
						break;

					default:
						error = status;
						break;
				}

				$errorMessage
					.text( 'ERROR: ' + error )
					.removeClass( 'd-none' );
			}

		</script>
		<script id="google-recaptcha-v3" src="https://www.google.com/recaptcha/api.js?render=6LdLu94hAAAAAKdLOqP1cdHtpDJNDPFFUxr3tYPS"></script>


	</body>

</html>