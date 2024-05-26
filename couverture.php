<?php include_once("includes/config.php"); ?>
<!--  -->
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<?php include_once("includes/gestion_projet.php"); ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
	<title><?php echo $couverture_menu ?></title>
	<link rel="stylesheet" href="css/components.css">
	<link rel="stylesheet" href="css/icons.css">
	<link rel="stylesheet" href="css/responsee.css">
	<link href='css/font.css' rel='stylesheet' type='text/css'>
	<link href='includes/style_sup.css' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript">
		function populate(s1, s2) {
			var s1 = document.getElementById(s1);
			var s2 = document.getElementById(s2);
			s2.innerHTML = "";

			if ((s1.value == "Okumura-Hata") || (s1.value == "Cost231-Hata")) {
				var optionArray = ["|", "Périurbaine|Périurbaine", "Rurale|Rurale", "Urbaine des grandes villes|Urbaine des grandes villes", "Urbaine des moyennes villes|Urbaine des moyennes villes", "Urbaine des petites villes|Urbaine des petites villes"];
			} else if (s1.value == "Kfacteurs-deussom-yaounde") {
				var optionArray = ["|", "Urbaine des grandes villes|Urbaine des grandes villes"];
			} else if (s1.value == "Erceig-Greenstein") {
				var optionArray = ["|", "Montagneux avec lourde densité d'arbres|Montagneux avec lourde densité d'arbres", "Vallonné avec une densité modéré d'arbres|Vallonné avec une densité modéré d'arbres", "Plat avec faible densité d'arbres|Plat avec faible densité d'arbres"];
			}

			for (var option in optionArray) {
				var pair = optionArray[option].split("|");
				var newOption = document.createElement("option");
				newOption.value = pair[0];
				newOption.innerHTML = pair[1];
				s2.options.add(newOption);
			}
		}
	</script>
</head>

<body class="size-1140">
	<!-- TOP NAV WITH LOGO -->
	<?php include_once('includes/header.php') ?>
	<!-- ASIDE NAV AND CONTENT -->
	<div class="line">
		<div class="box  margin-bottom">
			<div class="margin">
				<!-- ASIDE NAV 1 -->
				<?php include_once('includes/navigation.php') ?>
				<!-- CONTENT -->
				<section class="s-12 l-6">
					<h1><?php if ((!isset($message) || empty($message)) && isset($_POST['couverture']) && !empty($_POST['couverture']) && isset($_SESSION['couverture']) && !empty($_SESSION['couverture'])) {
							echo $resultat_couverture_menu;
						} else {
							echo $couverture_menu;
						} ?></h1>
					<?php if (!isset($_SESSION["projet"]) || empty($_SESSION["projet"])) {
						echo "<p>$erreurAucunProjetSelectionne</p>";
					} else if ((!isset($message) || empty($message)) && isset($_POST['couverture']) && !empty($_POST['couverture']) && isset($_SESSION['couverture']) && !empty($_SESSION['couverture'])) { ?>
						<p>
						<fieldset>
							<legend><?php
									$projet = $_SESSION["projet"];
									$resultat = mysqli_query($connexionBD, "SELECT * FROM `projet` WHERE id=$projet");
									$row = mysqli_fetch_array($resultat);
									echo $row[1] ?></legend>
							<br />
							<fieldset>
								<div class="mini-title"><?php echo $zone_d_etude; ?></div>
								<b><?php echo $nom_zone; ?> :</b> <?php echo $_SESSION["nom_zone"]; ?><br />
								<b><?php echo $superficie_de_la_zone; ?> :</b> <?php echo $_SESSION["surface_zone"]; ?> Km²<br />
								<b>Type de zone :</b> <?php echo $_SESSION["type_zone"]; ?><br />
								<b><?php echo $densité_de_la_population; ?> :</b> <?php echo $_SESSION["densite_zone"]; ?> Hbts/Km²<br />
							</fieldset>
							<fieldset>
								<div class="mini-title"><?php echo $type_d_eNodeB; ?></div>
								<b><?php echo $nom_de_enodeB; ?> :</b> <?php echo $_SESSION["nom_enodeb"]; ?><br />
								<b><?php echo $puissnace_d_emission; ?> :</b> <?php echo $_SESSION["puissance_enodeb"]; ?> dBm<br />
								<b><?php echo $gain_de_l_antenne; ?> :</b> <?php echo $_SESSION["gain_antenne_enodeb"]; ?> dBi<br />
								<b><?php echo $facteur_de_bruit; ?> :</b> <?php echo $_SESSION["facteur_bruit_enodeb"]; ?> dB<br />
								<b><?php echo $sinr_minimal; ?> :</b> <?php echo $_SESSION["sinr_min_enodeb"]; ?> dB<br />
								<b><?php echo $debit_maximal; ?> :</b> <?php echo $_SESSION["debit_enodeb"]; ?> bps/Hz<br />
							</fieldset>
							<fieldset>
								<div class="mini-title"><?php echo $type_d_UE ; ?></div>
								<b><?php echo $nom_de_UE; ?> :</b> <?php echo $_SESSION["nom_ue"]; ?><br />
								<b><?php echo $puissnace_d_emission; ?> :</b> <?php echo $_SESSION["puissance_ue"]; ?> dBm<br />
								<b><?php echo $gain_de_l_antenne; ?> :</b> <?php echo $_SESSION["gain_antenne_ue"]; ?> dBi<br />
								<b><?php echo $facteur_de_bruit; ?> :</b> <?php echo $_SESSION["facteur_bruit_ue"]; ?> dB<br />
								<b><?php echo $sinr_minimal; ?> :</b> <?php echo $_SESSION["sinr_min_ue"]; ?> dB<br />
								<b><?php echo $debit_maximal; ?> :</b> <?php echo $_SESSION["debit_max_ue"]; ?> bps/Hz<br />
							</fieldset>
							<fieldset>
								<div class="mini-title"><?php echo $scénario_entre_l_UE_et_l_eNodeB; ?></div>
								<b><?php echo $nom_du_scenario; ?> :</b> <?php echo $_SESSION["nom_scenario"]; ?><br />
								<b><?php echo $valeur_de_alpha; ?> :</b> <?php echo $_SESSION["alpha_ul_scenario"]; ?><br />
								<b><?php echo $impfactor; ?> :</b> <?php echo $_SESSION["impfactor_ul_scenario"]; ?><br />
								<b><?php echo $sinr_maximal; ?> :</b> <?php echo $_SESSION["sinr_max_ul_scenario"]; ?> dB<br />
								<b><?php echo $valeur_de_alpha; ?> (DL) :</b> <?php echo $_SESSION["alpha_dl_scenario"]; ?><br />
								<b><?php echo $impfactor; ?> (DL) :</b> <?php echo $_SESSION["impfactor_dl_scenario"]; ?><br />
								<b><?php echo $sinr_maximal; ?> (DL) :</b> <?php echo $_SESSION["sinr_max_dl_scenario"]; ?> dB<br />
								<b><?php echo $details_de_la_simulation; ?> :</b>
								<div class="resultat-textarea"><?php echo nl2br($_SESSION["detail_simul_scenario"]); ?><br /></div>
							</fieldset>
							<fieldset>
								<div class="mini-title"><?php echo $autres_parametres; ?></div>
								<b><?php echo $perted_de_connectivite_de_UE; ?> :</b> <?php echo $_SESSION["pertes_ue"]; ?> dB<br />
								<b><?php echo $perted_dues_au_corps_humain; ?> :</b> <?php echo $_SESSION["pertes_corps"]; ?> dB<br />
								<b><?php echo $debit_de_la_cellule_en_uplink; ?> :</b> <?php echo $_SESSION["debit_uplink"]; ?> Mbps<br />
								<b><?php echo $debit_en_downlink; ?> :</b> <?php echo $_SESSION["debit_downlink"]; ?> Mbps<br />
								<b><?php echo $nombre_de_RB_allouee_a_l_UE; ?> :</b> <?php echo $_SESSION["nombre_rb"]; ?> RBs<br />
								<b><?php echo $bande_passante_alloue; ?> :</b> <?php echo $_SESSION["bp_rb"]; ?> KHz<br />
								<b><?php echo $perted_de_feeder_eNodeB; ?> :</b> <?php echo $_SESSION["pertes_feeder"]; ?> dB<br />
								<b><?php echo $marge_d_évanouissement; ?> :</b> <?php echo $_SESSION["marge_ev"]; ?> dB<br />
								<b><?php echo $marge_de_liaison; ?> :</b> <?php echo $_SESSION["marge_liaison"]; ?> dB<br />
								<b><?php echo $marge_interference; ?> :</b> <?php echo $_SESSION["marge_i"]; ?> dB<br />
								<b><?php echo $marge_ombrage; ?> :</b> <?php echo $_SESSION["marge_o"]; ?> dB<br />
								<b><?php echo $marge_de_penetration; ?> (dB) :</b> <?php echo $_SESSION["marge_p"]; ?> dB<br />
								<b>Bande passante allouée à la cellule :</b> <?php echo $_SESSION["bp_cellule"]; ?> MHz<br />
								<b><?php echo $mode_de_duplexage; ?> :</b> <?php echo $_SESSION["mode_duplex"]; ?><br />
								<b><?php echo $frequency_centrale; ?> :</b> <?php echo $_SESSION["frequence"]; ?> MHz<br />
								<b><?php echo $modele_de_propagation; ?> :</b> <?php echo $_SESSION["model_p"]; ?><br />
								<b><?php echo $Hauteu_de_eNodeB; ?> :</b> <?php echo $_SESSION["h_enodeb"]; ?> m<br />
								<b><?php echo $hauteur_de_UE; ?> :</b> <?php echo $_SESSION["h_ue"]; ?> m<br />
								<b><?php echo $type_de_site; ?> :</b> <?php echo $_SESSION["type_site"]; ?><br />
							</fieldset>
							<fieldset class="resultat">
								<div class="mini-title"><?php echo $resultat_couverture; ?></div>
								<b><?php echo $atenuation; ?> :</b> <?php echo $_SESSION["attenuation"]; ?> dB<br />
								<b><?php echo $rayon_de_la_cellule; ?> :</b> <?php echo $_SESSION["rayon_cellule"]; ?> Km<br />
								<b><?php echo $bruit_de_l_ue; ?> :</b> <?php echo $_SESSION["bruit_ue"]; ?> dB<br />
								<b><?php echo $bruit_de_l_enodeb; ?> :</b> <?php echo $_SESSION["bruit_enodeb"]; ?> dB<br />
								<div class="resultat-final"><b><?php echo $number_d_enodeb; ?> :</b> <?php echo $_SESSION["nombre_enodeb"]; ?> eNodeBs<br /></div>
							</fieldset>
						</fieldset>
						</p>
					<?php } else { ?>
						<form method="post" enctype="multipart/form-data">
							<fieldset>
								<legend><?php
										$projet = $_SESSION["projet"];
										$resultat = mysqli_query($connexionBD, "SELECT * FROM `projet` WHERE id=$projet");
										$row = mysqli_fetch_array($resultat);
										echo $row[1] ?></legend>
								<?php if (isset($message)) echo "$message<br/>"; ?>
								<br />
								<fieldset>
									<div id="googleMap" style="width:100%;height:400px;"></div>

									<div class="mini-title"><?php echo $zone_d_etude; ?></div>
									<?php echo $nom_zone; ?> :<input type="text" name="nom_zone" <?php if (isset($_POST["nom_zone"])) {
																										echo "value='" . $_POST["nom_zone"] . "'";
																									} else if (isset($_SESSION["nom_zone"])) {
																										echo "value='" . $_SESSION["nom_zone"] . "'";
																									} ?> />
									Latitude :<input type="text" name="lat_zone" id="lat_zone" <?php if (isset($_POST["lat_zone"])) {
																									echo "value='" . $_POST["lat_zone"] . "'";
																								} else if (isset($_SESSION["lat_zone"])) {
																									echo "value='" . $_SESSION["lat_zone"] . "'";
																								} ?> />
									Longitude :<input type="text" name="long_zone" id="long_zone" <?php if (isset($_POST["long_zone"])) {
																										echo "value='" . $_POST["long_zone"] . "'";
																									} else if (isset($_SESSION["long_zone"])) {
																										echo "value='" . $_SESSION["long_zone"] . "'";
																									} ?> />
									<?php echo $superficie_de_la_zone; ?> (Km²) :<input type="text" name="surface_zone" <?php if (isset($_POST["surface_zone"])) {
																															echo "value='" . $_POST["surface_zone"] . "'";
																														} else if (isset($_SESSION["surface_zone"])) {
																															echo "value='" . $_SESSION["surface_zone"] . "'";
																														} ?> />

									<?php echo $densité_de_la_population; ?> (Hbts/Km²) :<input type="text" name="densite_zone" <?php if (isset($_POST["densite_zone"])) {
																																	echo "value='" . $_POST["densite_zone"] . "'";
																																} else if (isset($_SESSION["densite_zone"])) {
																																	echo "value='" . $_SESSION["densite_zone"] . "'";
																																} ?> />
								</fieldset>
								<fieldset>
									<div class="mini-title"><?php echo $type_d_eNodeB; ?></div>
									<?php echo $nom_de_enodeB; ?> :<input type="text" name="nom_enodeb" <?php if (isset($_POST["nom_enodeb"])) {
																											echo "value='" . $_POST["nom_enodeb"] . "'";
																										} else if (isset($_SESSION["nom_enodeb"])) {
																											echo "value='" . $_SESSION["nom_enodeb"] . "'";
																										} ?> />
									<?php echo $puissnace_d_emission; ?> (dBm) :<input type="text" name="puissance_enodeb" <?php if (isset($_POST["puissance_enodeb"])) {
																																echo "value='" . $_POST["puissance_enodeb"] . "'";
																															} else if (isset($_SESSION["puissance_enodeb"])) {
																																echo "value='" . $_SESSION["puissance_enodeb"] . "'";
																															} ?> />
									<?php echo $gain_de_l_antenne; ?> (dBi) :<input type="text" name="gain_antenne_enodeb" <?php if (isset($_POST["gain_antenne_enodeb"])) {
																																echo "value='" . $_POST["gain_antenne_enodeb"] . "'";
																															} else if (isset($_SESSION["gain_antenne_enodeb"])) {
																																echo "value='" . $_SESSION["gain_antenne_enodeb"] . "'";
																															} ?> />
									<?php echo $facteur_de_bruit; ?> (dB) :<input type="text" name="facteur_bruit_enodeb" <?php if (isset($_POST["facteur_bruit_enodeb"])) {
																																echo "value='" . $_POST["facteur_bruit_enodeb"] . "'";
																															} else if (isset($_SESSION["facteur_bruit_enodeb"])) {
																																echo "value='" . $_SESSION["facteur_bruit_enodeb"] . "'";
																															} ?> />
									<?php echo $sinr_minimal; ?> (dB) :<input type="text" name="sinr_min_enodeb" <?php if (isset($_POST["sinr_min_enodeb"])) {
																														echo "value='" . $_POST["sinr_min_enodeb"] . "'";
																													} else if (isset($_SESSION["sinr_min_enodeb"])) {
																														echo "value='" . $_SESSION["sinr_min_enodeb"] . "'";
																													} ?> />
									<?php echo $debit_maximal; ?> (bps/Hz) :<input type="text" name="debit_enodeb" <?php if (isset($_POST["debit_enodeb"])) {
																														echo "value='" . $_POST["debit_enodeb"] . "'";
																													} else if (isset($_SESSION["debit_enodeb"])) {
																														echo "value='" . $_SESSION["debit_enodeb"] . "'";
																													} ?> />
								</fieldset>
								<fieldset>
									<div class="mini-title"><?php echo $type_d_UE; ?></div>
									<?php echo $nom_de_UE; ?> :<input type="text" name="nom_ue" <?php if (isset($_POST["nom_ue"])) {
																									echo "value='" . $_POST["nom_ue"] . "'";
																								} else if (isset($_SESSION["nom_ue"])) {
																									echo "value='" . $_SESSION["nom_ue"] . "'";
																								} ?> />
									<?php echo $puissnace_d_emission; ?> (dBm) :<input type="text" name="puissance_ue" <?php if (isset($_POST["puissance_ue"])) {
																															echo "value='" . $_POST["puissance_ue"] . "'";
																														} else if (isset($_SESSION["puissance_ue"])) {
																															echo "value='" . $_SESSION["puissance_ue"] . "'";
																														} ?> />
									<?php echo $gain_de_l_antenne; ?> (dBi) :<input type="text" name="gain_antenne_ue" <?php if (isset($_POST["gain_antenne_ue"])) {
																															echo "value='" . $_POST["gain_antenne_ue"] . "'";
																														} else if (isset($_SESSION["gain_antenne_ue"])) {
																															echo "value='" . $_SESSION["gain_antenne_ue"] . "'";
																														} ?> />
									<?php echo $facteur_de_bruit; ?> (dB) :<input type="text" name="facteur_bruit_ue" <?php if (isset($_POST["facteur_bruit_ue"])) {
																															echo "value='" . $_POST["facteur_bruit_ue"] . "'";
																														} else if (isset($_SESSION["facteur_bruit_ue"])) {
																															echo "value='" . $_SESSION["facteur_bruit_ue"] . "'";
																														} ?> />
									<?php echo $sinr_minimal; ?> (dB) :<input type="text" name="sinr_min_ue" <?php if (isset($_POST["sinr_min_ue"])) {
																													echo "value='" . $_POST["sinr_min_ue"] . "'";
																												} else if (isset($_SESSION["sinr_min_ue"])) {
																													echo "value='" . $_SESSION["sinr_min_ue"] . "'";
																												} ?> />
									<?php echo $debit_maximal; ?> (bps/Hz) :<input type="text" name="debit_max_ue" <?php if (isset($_POST["debit_max_ue"])) {
																														echo "value='" . $_POST["debit_max_ue"] . "'";
																													} else if (isset($_SESSION["debit_max_ue"])) {
																														echo "value='" . $_SESSION["debit_max_ue"] . "'";
																													} ?> />
								</fieldset>
								<fieldset>
									<div class="mini-title"><?php echo $scénario_entre_l_UE_et_l_eNodeB; ?></div>
									<?php echo $nom_du_scenario; ?> :<input type="text" name="nom_scenario" <?php if (isset($_POST["nom_scenario"])) {
																												echo "value='" . $_POST["nom_scenario"] . "'";
																											} else if (isset($_SESSION["nom_scenario"])) {
																												echo "value='" . $_SESSION["nom_scenario"] . "'";
																											} ?> />
									<?php echo $valeur_de_alpha; ?> (UL) :<input type="text" name="alpha_ul_scenario" <?php if (isset($_POST["alpha_ul_scenario"])) {
																															echo "value='" . $_POST["alpha_ul_scenario"] . "'";
																														} else if (isset($_SESSION["alpha_ul_scenario"])) {
																															echo "value='" . $_SESSION["alpha_ul_scenario"] . "'";
																														} ?> />
									<?php echo $impfactor; ?> :<input type="text" name="impfactor_ul_scenario" <?php if (isset($_POST["impfactor_ul_scenario"])) {
																													echo "value='" . $_POST["impfactor_ul_scenario"] . "'";
																												} else if (isset($_SESSION["impfactor_ul_scenario"])) {
																													echo "value='" . $_SESSION["impfactor_ul_scenario"] . "'";
																												} ?> />
									<?php echo $sinr_maximal; ?> (UL) (dB) :<input type="text" name="sinr_max_ul_scenario" <?php if (isset($_POST["sinr_max_ul_scenario"])) {
																																echo "value='" . $_POST["sinr_max_ul_scenario"] . "'";
																															} else if (isset($_SESSION["sinr_max_ul_scenario"])) {
																																echo "value='" . $_SESSION["sinr_max_ul_scenario"] . "'";
																															} ?> />
									<?php echo $valeur_de_alpha; ?> (DL) :<input type="text" name="alpha_dl_scenario" <?php if (isset($_POST["alpha_dl_scenario"])) {
																															echo "value='" . $_POST["alpha_dl_scenario"] . "'";
																														} else if (isset($_SESSION["alpha_dl_scenario"])) {
																															echo "value='" . $_SESSION["alpha_dl_scenario"] . "'";
																														} ?> />
									<?php echo $impfactor; ?> (DL) :<input type="text" name="impfactor_dl_scenario" <?php if (isset($_POST["impfactor_dl_scenario"])) {
																														echo "value='" . $_POST["impfactor_dl_scenario"] . "'";
																													} else if (isset($_SESSION["impfactor_dl_scenario"])) {
																														echo "value='" . $_SESSION["impfactor_dl_scenario"] . "'";
																													} ?> />
									<?php echo $sinr_maximal; ?> (DL) (dB) :<input type="text" name="sinr_max_dl_scenario" <?php if (isset($_POST["sinr_max_dl_scenario"])) {
																																echo "value='" . $_POST["sinr_max_dl_scenario"] . "'";
																															} else if (isset($_SESSION["sinr_max_dl_scenario"])) {
																																echo "value='" . $_SESSION["sinr_max_dl_scenario"] . "'";
																															} ?> />
									<?php echo $details_de_la_simulation; ?> :<textarea name="detail_simul_scenario"><?php if (isset($_POST["detail_simul_scenario"])) {
																															echo $_POST["detail_simul_scenario"];
																														} else if (isset($_SESSION["detail_simul_scenario"])) {
																															echo $_SESSION["detail_simul_scenario"];
																														} ?></textarea>
								</fieldset>
								<fieldset>
									<div class="mini-title"><?php echo $autres_parametres; ?></div>
									<?php echo $perted_de_connectivite_de_UE; ?> (dB) :<input type="text" name="pertes_ue" <?php if (isset($_POST["pertes_ue"])) {
																																echo "value='" . $_POST["pertes_ue"] . "'";
																															} else if (isset($_SESSION["pertes_ue"])) {
																																echo "value='" . $_SESSION["pertes_ue"] . "'";
																															} ?> />
									<?php echo $perted_dues_au_corps_humain; ?> (dB) :<input type="text" name="pertes_corps" <?php if (isset($_POST["pertes_corps"])) {
																																	echo "value='" . $_POST["pertes_corps"] . "'";
																																} else if (isset($_SESSION["pertes_corps"])) {
																																	echo "value='" . $_SESSION["pertes_corps"] . "'";
																																} ?> />
									<?php echo $debit_de_la_cellule_en_uplink; ?> (Mbps) :<input type="text" name="debit_uplink" <?php if (isset($_POST["debit_uplink"])) {
																																		echo "value='" . $_POST["debit_uplink"] . "'";
																																	} else if (isset($_SESSION["debit_uplink"])) {
																																		echo "value='" . $_SESSION["debit_uplink"] . "'";
																																	} ?> />
									<?php echo $debit_en_downlink; ?> (Mbps) :<input type="text" name="debit_downlink" <?php if (isset($_POST["debit_downlink"])) {
																															echo "value='" . $_POST["debit_downlink"] . "'";
																														} else if (isset($_SESSION["debit_downlink"])) {
																															echo "value='" . $_SESSION["debit_downlink"] . "'";
																														} ?> />
									<?php echo $nombre_de_RB_allouee_a_l_UE; ?> (RBs) :<input type="text" name="nombre_rb" <?php if (isset($_POST["nombre_rb"])) {
																																echo "value='" . $_POST["nombre_rb"] . "'";
																															} else if (isset($_SESSION["nombre_rb"])) {
																																echo "value='" . $_SESSION["nombre_rb"] . "'";
																															} ?> />
									<?php echo $bande_passante_alloue; ?> (KHz) :<input type="text" name="bp_rb" <?php if (isset($_POST["bp_rb"])) {
																														echo "value='" . $_POST["bp_rb"] . "'";
																													} else if (isset($_SESSION["bp_rb"])) {
																														echo "value='" . $_SESSION["bp_rb"] . "'";
																													} ?> />
									<?php echo $perted_de_feeder_eNodeB; ?> (dB) :<input type="text" name="pertes_feeder" <?php if (isset($_POST["pertes_feeder"])) {
																																echo "value='" . $_POST["pertes_feeder"] . "'";
																															} else if (isset($_SESSION["pertes_feeder"])) {
																																echo "value='" . $_SESSION["pertes_feeder"] . "'";
																															} ?> />
									<?php echo $marge_d_évanouissement; ?> (dB) :<input type="text" name="marge_ev" <?php if (isset($_POST["marge_ev"])) {
																														echo "value='" . $_POST["marge_ev"] . "'";
																													} else if (isset($_SESSION["marge_ev"])) {
																														echo "value='" . $_SESSION["marge_ev"] . "'";
																													} ?> />
									<?php echo $marge_de_liaison; ?> (dB) :<input type="text" name="marge_liaison" <?php if (isset($_POST["marge_liaison"])) {
																														echo "value='" . $_POST["marge_liaison"] . "'";
																													} else if (isset($_SESSION["marge_liaison"])) {
																														echo "value='" . $_SESSION["marge_liaison"] . "'";
																													} ?> />
									<?php echo $marge_interference; ?> (dB) :<input type="text" name="marge_i" <?php if (isset($_POST["marge_i"])) {
																													echo "value='" . $_POST["marge_i"] . "'";
																												} else if (isset($_SESSION["marge_i"])) {
																													echo "value='" . $_SESSION["marge_i"] . "'";
																												} ?> />
									<?php echo $marge_ombrage; ?> (dB) :<input type="text" name="marge_o" <?php if (isset($_POST["marge_o"])) {
																												echo "value='" . $_POST["marge_o"] . "'";
																											} else if (isset($_SESSION["marge_o"])) {
																												echo "value='" . $_SESSION["marge_o"] . "'";
																											} ?> />
									<?php echo $marge_de_penetration; ?> (dB) :<input type="text" name="marge_p" <?php if (isset($_POST["marge_p"])) {
																														echo "value='" . $_POST["marge_p"] . "'";
																													} else if (isset($_SESSION["marge_p"])) {
																														echo "value='" . $_SESSION["marge_p"] . "'";
																													} ?> />
									<?php echo $bande_passnate; ?> (MHz) :<select name="bp_cellule">
										<option value=""></option>
										<option value="1.25" <?php if (isset($_POST["bp_cellule"])) {
																	if ($_POST["bp_cellule"] == '1.25') echo " selected";
																} else if (isset($_SESSION["bp_cellule"])) {
																	if ($_SESSION["bp_cellule"] == '1.25') echo " selected";
																} ?>>1.25</option>
										<option value="2.5" <?php if (isset($_POST["bp_cellule"])) {
																if ($_POST["bp_cellule"] == '2.5') echo " selected";
															} else if (isset($_SESSION["bp_cellule"])) {
																if ($_SESSION["bp_cellule"] == '2.5') echo " selected";
															} ?>>2.5</option>
										<option value="5" <?php if (isset($_POST["bp_cellule"])) {
																if ($_POST["bp_cellule"] == '5') echo " selected";
															} else if (isset($_SESSION["bp_cellule"])) {
																if ($_SESSION["bp_cellule"] == '5') echo " selected";
															} ?>>5</option>
										<option value="10" <?php if (isset($_POST["bp_cellule"])) {
																if ($_POST["bp_cellule"] == '10') echo " selected";
															} else if (isset($_SESSION["bp_cellule"])) {
																if ($_SESSION["bp_cellule"] == '10') echo " selected";
															} ?>>10</option>
										<option value="15" <?php if (isset($_POST["bp_cellule"])) {
																if ($_POST["bp_cellule"] == '15') echo " selected";
															} else if (isset($_SESSION["bp_cellule"])) {
																if ($_SESSION["bp_cellule"] == '15') echo " selected";
															} ?>>15</option>
										<option value="20" <?php if (isset($_POST["bp_cellule"])) {
																if ($_POST["bp_cellule"] == '20') echo " selected";
															} else if (isset($_SESSION["bp_cellule"])) {
																if ($_SESSION["bp_cellule"] == '20') echo " selected";
															} ?>>20</option>
									</select>
									<?php echo $mode_de_duplexage; ?> :<select name="mode_duplex">
										<option value=""></option>
										<option value="FDD" <?php if (isset($_POST["mode_duplex"])) {
																if ($_POST["mode_duplex"] == 'FDD') echo " selected";
															} else if (isset($_SESSION["mode_duplex"])) {
																if ($_SESSION["mode_duplex"] == 'FDD') echo " selected";
															} ?>>FDD</option>
										<option value="TDD" <?php if (isset($_POST["mode_duplex"])) {
																if ($_POST["mode_duplex"] == 'TDD') echo " selected";
															} else if (isset($_SESSION["mode_duplex"])) {
																if ($_SESSION["mode_duplex"] == 'TDD') echo " selected";
															} ?>>TDD</option>
									</select>
									<?php echo $frequency_centrale; ?> (MHz) :<input type="text" name="frequence" <?php if (isset($_POST["frequence"])) {
																														echo "value='" . $_POST["frequence"] . "'";
																													} else if (isset($_SESSION["frequence"])) {
																														echo "value='" . $_SESSION["frequence"] . "'";
																													} ?> />
									<?php echo $modele_de_propagation; ?> :<select id="model_p" name="model_p" onchange="populate('model_p','type_zone')">
										<option value=""></option>
										<option value="Okumura-Hata" <?php if (isset($_POST["model_p"])) {
																			if ($_POST["model_p"] == 'Okumura-Hata') echo " selected";
																		} else if (isset($_SESSION["model_p"])) {
																			if ($_SESSION["model_p"] == 'Okumura-Hata') echo " selected";
																		} ?>>Okumura-Hata</option>
										<option value="Cost231-Hata" <?php if (isset($_POST["model_p"])) {
																			if ($_POST["model_p"] == 'Cost231-Hata') echo " selected";
																		} else if (isset($_SESSION["model_p"])) {
																			if ($_SESSION["model_p"] == 'Cost231-Hata') echo " selected";
																		} ?>>Cost231-Hata</option>
										<option value="Kfacteurs-deussom-yaounde" <?php if (isset($_POST["model_p"])) {
																						if ($_POST["model_p"] == 'Kfacteurs-deussom-yaounde') echo " selected";
																					} else if (isset($_SESSION["model_p"])) {
																						if ($_SESSION["model_p"] == 'Kfacteurs-deussom-yaounde') echo " selected";
																					} ?>>Kfacteurs-deussom-yaounde</option>
										<option value="Erceig-Greenstein" <?php if (isset($_POST["model_p"])) {
																				if ($_POST["model_p"] == 'Erceig-Greenstein') echo " selected";
																			} else if (isset($_SESSION["model_p"])) {
																				if ($_SESSION["model_p"] == 'Erceig-Greenstein') echo " selected";
																			} ?>>Erceig-Greenstein</option>
									</select>
									<?php echo $type_de_zone; ?> :<select id="type_zone" name="type_zone"></select>
									<?php echo $Hauteu_de_eNodeB; ?> (m) :<input type="text" name="h_enodeb" <?php if (isset($_POST["h_enodeb"])) {
																													echo "value='" . $_POST["h_enodeb"] . "'";
																												} else if (isset($_SESSION["h_enodeb"])) {
																													echo "value='" . $_SESSION["h_enodeb"] . "'";
																												} ?> />
									<?php echo $hauteur_de_UE; ?> (m) :<input type="text" name="h_ue" <?php if (isset($_POST["h_ue"])) {
																											echo "value='" . $_POST["h_ue"] . "'";
																										} else if (isset($_SESSION["h_ue"])) {
																											echo "value='" . $_SESSION["h_ue"] . "'";
																										} ?> />
									<?php echo $type_site; ?> :<select name="type_site">
										<option value=""></option>
										<option value="Omnidirectionnel" <?php if (isset($_POST["type_site"])) {
																				if ($_POST["type_site"] == 'Omnidirectionnel') echo " selected";
																			} else if (isset($_SESSION["type_site"])) {
																				if ($_SESSION["type_site"] == 'Omnidirectionnel') echo " selected";
																			} ?>>Omnidirectionnel</option>
										<option value="Bisectoriel" <?php if (isset($_POST["type_site"])) {
																		if ($_POST["type_site"] == 'Bisectoriel') echo " selected";
																	} else if (isset($_SESSION["type_site"])) {
																		if ($_SESSION["type_site"] == 'Bisectoriel') echo " selected";
																	} ?>>Bisectoriel</option>
										<option value="Trisectoriel" <?php if (isset($_POST["type_site"])) {
																			if ($_POST["type_site"] == 'Trisectoriel') echo " selected";
																		} else if (isset($_SESSION["type_site"])) {
																			if ($_SESSION["type_site"] == 'Trisectoriel') echo " selected";
																		} ?>>Trisectoriel</option>
									</select>
								</fieldset>
								<?php /*print_r($_POST);$list = array_keys($_POST);foreach($list as $key){ mysqli_query($connexionBD,"ALTER TABLE `projet` ADD `$key` VARCHAR(255) NOT NULL");
						 echo"\$_SESSION['$key'] = \$_POST['$key'];<br/>"; }*/
								if (isset($message)) echo $message; ?>
								<br />
								<input type="submit" name="couverture" value=<?php echo $valider; ?> />
								<input type="submit" name="defaut_couverture" value=<?php echo $valeurs_par_defaut; ?> />
							</fieldset>
						</form>
					<?php } ?>
				</section>
				<!-- ASIDE NAV 2 -->
				<?php include_once('includes/options.php') ?>
			</div>
		</div>
	</div>
	<!-- FOOTER -->
	<?php include_once('includes/footer.php') ?>
	<script type="text/javascript">
		var s1 = document.getElementById('model_p');
		var s2 = document.getElementById('type_zone');
		s2.innerHTML = "";

		if ((s1.value == "Okumura-Hata") || (s1.value == "Cost231-Hata")) {
			var optionArray = ["|", "Périurbaine|Périurbaine", "Rurale|Rurale", "Urbaine des grandes villes|Urbaine des grandes villes", "Urbaine des moyennes villes|Urbaine des moyennes villes", "Urbaine des petites villes|Urbaine des petites villes"];
		} else if (s1.value == "Kfacteurs-deussom-yaounde") {
			var optionArray = ["|", "Urbaine des grandes villes|Urbaine des grandes villes"];
		} else if (s1.value == "Erceig-Greenstein") {
			var optionArray = ["|", "Montagneux avec lourde densité d'arbres|Montagneux avec lourde densité d'arbres", "Vallonné avec une densité modéré d'arbres|Vallonné avec une densité modéré d'arbres", "Plat avec faible densité d'arbres|Plat avec faible densité d'arbres"];
		}

		for (var option in optionArray) {
			var pair = optionArray[option].split("|");
			var newOption = document.createElement("option");
			console.log(newOption);
			newOption.value = pair[0];
			newOption.innerHTML = pair[1];
			if (pair[0] == "Urbaine des grandes villes") {
				newOption.selected = true;
			}
			s2.options.add(newOption);
		}
	</script>
	<script>
		let selectedMarker;
		let lat_zone = document.getElementById('lat_zone');
		let long_zone = document.getElementById('long_zone');
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

			if (lat_zone.value && long_zone.value) {
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(lat_zone.value, long_zone.value),
					map: map
				});
				var infowindow = new google.maps.InfoWindow({
					content: 'Latitude: ' + lat_zone.value +
						'<br>Longitude: ' + long_zone.value
				});
				infowindow.open(map, marker);
			}
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
			lat_zone.value = location.lat();
			long_zone.value = location.lng();
		}

		function getZone(ville) {
			//coordinates of Yaounde
			var ret = [3.8476786220878267, 11.50217056274414];
			return ret;
			return null;
		}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByMt8TBAbsJWHDDh_FBFH2303Vw2xDcsw&callback=myMap"></script>
	<script type="text/javascript" src="js/responsee.js"></script>
</body>

</html>
<?php include_once("includes/fermeture_flux_sql.php"); ?>