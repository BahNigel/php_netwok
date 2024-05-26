<?php include_once("includes/config.php"); ?>
<?php include_once("includes/textes.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<?php include_once("includes/gestion_projet.php"); ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
	<title><?php echo $cartographie_menu ?></title>
	<link rel="stylesheet" href="css/components.css">
	<link rel="stylesheet" href="css/icons.css">
	<link rel="stylesheet" href="css/responsee.css">
	<link href='css/font.css' rel='stylesheet' type='text/css'>
	<link href='includes/style_sup.css' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
</head>

<body class="size-1140">
	<!-- TOP NAV WITH LOGO -->
	<?php include_once('includes/header.php') ?>
	<!-- ASIDE NAV AND CONTENT -->
	<div class="line">
		<div class="box margin-bottom">
			<div class="margin">
				<!-- ASIDE NAV 1 -->
				<?php include_once('includes/navigation.php') ?>
				<!-- CONTENT -->
				<section class="s-12 l-6">
					<h1><?php echo $cartographie_menu; ?></h1>
						<div id="googleMap" style="width:100%;height:400px;"></div>

						<script>
                            let selectedMarker;
							function myMap() {
								var ville = "<?php echo $_SESSION["nom_zone"]; ?>";
								var param = getZone(ville);
								var superficie = "<?php echo $_SESSION["surface_zone"]; ?>";
								var cote = Math.sqrt(superficie);
								var lonMin = param[0] - cote / 200,
									lonMax = param[0] + cote / 200,
									latMin = param[1] - cote / 200,
									latMax = param[1] + cote / 200;
								console.log(lonMin + "," + lonMax + "," + latMin + "," + latMax);

								console.log("ok");
								var mapProp = {
									center: new google.maps.LatLng(param[0], param[1]),
									zoom: 13,
								};
								var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
								var marker;
								var myCity;
								var lon = lonMin,
									lat = latMin,
									control = 0;

								google.maps.event.addListener(map, 'click', function(event) {
									placeMarker(map, event.latLng);
								});
							}

							function placeMarker(map, location) {
                                selectedMarker ? selectedMarker.setMap(null) : null;
								var marker = new google.maps.Marker({
									position: location,
									map: map
								});
								var infowindow = new google.maps.InfoWindow({
									content: 'Latitude: ' + location.lat() +
										'<br>Longitude: ' + location.lng()
								});
                                selectedMarker = marker;
                                console.log(location.lat(), location.lng());
								infowindow.open(map, selectedMarker);
							}

							function getZone(ville) {
                                //coordinates of Yaounde
                                var ret = [3.8476786220878267, 11.50217056274414];
								return ret;
								return null;
							}
						</script>

						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByMt8TBAbsJWHDDh_FBFH2303Vw2xDcsw&callback=myMap"></script>
				</section>
				<!-- ASIDE NAV 2 -->
				<?php include_once('includes/options.php') ?>
			</div>
		</div>
	</div>
	<!-- FOOTER -->
	<?php include_once('includes/footer.php') ?>
	<script type="text/javascript" src="js/responsee.js"></script>
</body>

</html>
<?php include_once("includes/fermeture_flux_sql.php"); ?>