<?php include_once("includes/config.php"); ?>
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
					<?php if (!isset($_SESSION["projet"]) || empty($_SESSION["projet"])) {
						echo "<p>$erreurAucunProjetSelectionne</p>";
					} else if (!isset($_SESSION["couverture"]) || empty($_SESSION["couverture"])) {
						echo "<p>$erreurPlanificationCouverture</p>";
					} else { ?>
						<p id="lat_zone" style="display:none"><?php echo $_SESSION["lat_zone"]; ?> </p>
						<p id="long_zone" style="display:none"><?php echo $_SESSION["long_zone"]; ?> </p>
						<div id="googleMap" style="width:100%;height:400px;"></div>

						<script>
							function myMap() {
								var ville = "<?php echo $_SESSION["nom_zone"]; ?>";
								var param = getZone(ville);
								var superficie = "<?php echo $_SESSION["surface_zone"]; ?>";
								var cote = Math.sqrt(superficie);
								var lonMin = +param[0] - cote / 200,
									lonMax = +param[0] + cote / 200,
									latMin = +param[1] - cote / 200,
									latMax = +param[1] + cote / 200;
								console.log(lonMin + "," + lonMax + "," + latMin + "," + latMax);

								console.log("ok");
								var mapProp = {
									center: new google.maps.LatLng(param[0], param[1]),
									zoom: 13,
								};
								var nbsite = <?php echo $_SESSION["nombre_enodeb"]; ?>;
								var nbligne = Math.sqrt(nbsite);
								var distanceenode = (lonMax - lonMin) / nbligne;

								var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
								var marker;
								var myCity;
								var lon = lonMin,
									lat = latMin,
									control = 0;
								for (var i = 0; i < nbsite; i++) {
									if (control >= nbligne) {
										lon += distanceenode;
										lat = latMin;
										control = 0;
									}
									var lonrand = getRandom(-0.003, 0.003),
										latrand = getRandom(-0.003, 0.003);
									marker = new google.maps.Marker({
										position: new google.maps.LatLng(lon + lonrand, lat + latrand),
										map: map,
										draggable:true
									});
									myCity = new google.maps.Circle({
										center: new google.maps.LatLng(lon + lonrand, lat + latrand),
										radius: <?php echo $_SESSION["rayon_cellule"] * 1000; ?>,
										strokeColor: "#0000FF",
										strokeOpacity: 0.8,
										strokeWeight: 2,
										fillColor: "#0000FF",
										fillOpacity: 0.4,
										map: map,
										draggable:true
									});
									lat += distanceenode;
									control++;
								}

								google.maps.event.addListener(map, 'click', function(event) {
									placeMarker(map, event.latLng);
								});
							}

							function getRandom(min, max) {
								return Math.random() * (max - min) + min;
							}

							function placeMarker(map, location) {
								var marker = new google.maps.Marker({
									position: location,
									map: map
								});
								var infowindow = new google.maps.InfoWindow({
									content: 'Latitude: ' + location.lat() +
										'<br>Longitude: ' + location.lng()
								});
								infowindow.open(map, marker);
							}

							function getZone(ville) {
								ville = ville.toLowerCase();
								console.log(ville);
								ville = ville.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
								ville = ville.replace(/a©/g, "e");
								// if (ville.match(/^yaound/)) {
								// 	console.log(ville);
								// 	var ret = [3.8476786220878267, 11.50217056274414];
								// 	return ret;
								// }
								// if (ville.match(/^douala/)) {
								// 	console.log(ville);
								// 	var ret = [4.050619594277706, 9.76786494255066];
								// 	return ret;
								// }
								// if (ville.match(/^bafoussam/)) {
								// 	console.log(ville);
								// 	var ret = [5.480282520724558, 10.428621768951416];
								// 	return ret;
								// }
								// if (ville.match(/^bafang/)) {
								// 	console.log(ville);
								// 	var ret = [5.158479368481802, 10.18733024597168];
								// 	return ret;
								// }
								console.log( <?php echo $_SESSION["lat_zone"]; ?>);
								var ret = [document.getElementById("lat_zone").innerHTML,document.getElementById("long_zone").innerHTML];
								return ret;
								console.log("Erreur");
								return null;
							}
						</script>

						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByMt8TBAbsJWHDDh_FBFH2303Vw2xDcsw&callback=myMap"></script>
					<?php } ?>
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