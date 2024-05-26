<?php include_once("includes/config.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<?php include_once("includes/gestion_projet.php"); ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
	<title><?php echo $consulter_projets ?></title>
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
		<div class="box  margin-bottom">
			<div class="margin">
				<!-- ASIDE NAV 1 -->
				<?php include_once('includes/navigation.php') ?>
				<!-- CONTENT -->
				<section class="s-12 l-6">
					<h1><?php echo $consulter_projets ?></h1>
					<form method="post" enctype="multipart/form-data">
						<fieldset>
							<legend><?php echo $ouvrir_projet; ?></legend>
							<?php if (isset($modifier_var) || isset($supprimer_var)) echo "$message<br/>";
							elseif (isset($consulter_var)) { ?>
								<p>
								<fieldset>
									<legend><?php
											$projet = $_SESSION["projet"];
											$resultat = mysqli_query($connexionBD, "SELECT * FROM `projet` WHERE id=$projet");
											$row = mysqli_fetch_array($resultat);
											echo $row[1]; ?></legend>
									<br />
									<?php if (isset($_SESSION["couverture"]) && !empty($_SESSION["couverture"])) { ?>
										<h2><?php echo $couverture_menu ?></h2>
										<fieldset>
											<div class="mini-title">Zone d'étude</div>
											<b>Nom de la zone :</b> <?php echo $_SESSION["nom_zone"]; ?><br />
											<b>Superficie de la zone :</b> <?php echo $_SESSION["surface_zone"]; ?> Km²<br />
											<b>Type de zone :</b> <?php echo $_SESSION["type_zone"]; ?><br />
											<b>Densité de la population :</b> <?php echo $_SESSION["densite_zone"]; ?> Hbts/Km²<br />
										</fieldset>
										<fieldset>
											<div class="mini-title">Type d'eNodeB</div>
											<b>Nom de l'enodeB :</b> <?php echo $_SESSION["nom_enodeb"]; ?><br />
											<b>Puissance d'émission :</b> <?php echo $_SESSION["puissance_enodeb"]; ?> dBm<br />
											<b>Gain de l'antenne :</b> <?php echo $_SESSION["gain_antenne_enodeb"]; ?> dBi<br />
											<b>Facteur de bruit :</b> <?php echo $_SESSION["facteur_bruit_enodeb"]; ?> dB<br />
											<b>SINR minimal :</b> <?php echo $_SESSION["sinr_min_enodeb"]; ?> dB<br />
											<b>Débit maximal :</b> <?php echo $_SESSION["debit_enodeb"]; ?> bps/Hz<br />
										</fieldset>
										<fieldset>
											<div class="mini-title">Type d'UE</div>
											<b>Nom de l'UE :</b> <?php echo $_SESSION["nom_ue"]; ?><br />
											<b>Puissance d'émission :</b> <?php echo $_SESSION["puissance_ue"]; ?> dBm<br />
											<b>Gain de l'antenne :</b> <?php echo $_SESSION["gain_antenne_ue"]; ?> dBi<br />
											<b>Facteur de bruit :</b> <?php echo $_SESSION["facteur_bruit_ue"]; ?> dB<br />
											<b>SINR minimal :</b> <?php echo $_SESSION["sinr_min_ue"]; ?> dB<br />
											<b>Débit maximal :</b> <?php echo $_SESSION["debit_max_ue"]; ?> bps/Hz<br />
										</fieldset>
										<fieldset>
											<div class="mini-title">Scénario entre l'UE et l'eNodeB</div>
											<b>Nom du scénario :</b> <?php echo $_SESSION["nom_scenario"]; ?><br />
											<b>Valeur de alpha (UL) :</b> <?php echo $_SESSION["alpha_ul_scenario"]; ?><br />
											<b>ImpFactor (UL) :</b> <?php echo $_SESSION["impfactor_ul_scenario"]; ?><br />
											<b>SINR maximal (UL) :</b> <?php echo $_SESSION["sinr_max_ul_scenario"]; ?> dB<br />
											<b>Valeur de alpha (DL) :</b> <?php echo $_SESSION["alpha_dl_scenario"]; ?><br />
											<b>ImpFactor (DL) :</b> <?php echo $_SESSION["impfactor_dl_scenario"]; ?><br />
											<b>SINR maximal (DL) :</b> <?php echo $_SESSION["sinr_max_dl_scenario"]; ?> dB<br />
											<b>Détails de la simulation :</b>
											<div class="resultat-textarea"><?php echo nl2br($_SESSION["detail_simul_scenario"]); ?><br /></div>
										</fieldset>
										<fieldset>
											<div class="mini-title">Autres paramètres</div>
											<b>Pertes de connectivité de l'UE :</b> <?php echo $_SESSION["pertes_ue"]; ?> dB<br />
											<b>Pertes dues au corps humain :</b> <?php echo $_SESSION["pertes_corps"]; ?> dB<br />
											<b>Débit de la cellule en UpLink :</b> <?php echo $_SESSION["debit_uplink"]; ?> Mbps<br />
											<b>Débit en DownLink :</b> <?php echo $_SESSION["debit_downlink"]; ?> Mbps<br />
											<b>Nombre de RB allouée(s) à l'UE :</b> <?php echo $_SESSION["nombre_rb"]; ?> RBs<br />
											<b>Bande passante allouée à un RB :</b> <?php echo $_SESSION["bp_rb"]; ?> KHz<br />
											<b>Pertes de feeder eNodeB :</b> <?php echo $_SESSION["pertes_feeder"]; ?> dB<br />
											<b>Marge d'évanouissement :</b> <?php echo $_SESSION["marge_ev"]; ?> dB<br />
											<b>Marge de liaison :</b> <?php echo $_SESSION["marge_liaison"]; ?> dB<br />
											<b>Marge d'interférence :</b> <?php echo $_SESSION["marge_i"]; ?> dB<br />
											<b>Marge d'ombrage :</b> <?php echo $_SESSION["marge_o"]; ?> dB<br />
											<b>Marge de pénétration (dB) :</b> <?php echo $_SESSION["marge_p"]; ?> dB<br />
											<b>Bande passante allouée à la cellule :</b> <?php echo $_SESSION["bp_cellule"]; ?> MHz<br />
											<b>Mode de Duplexage :</b> <?php echo $_SESSION["mode_duplex"]; ?><br />
											<b>Fréquence centrale :</b> <?php echo $_SESSION["frequence"]; ?> MHz<br />
											<b>Modèle de propagation :</b> <?php echo $_SESSION["model_p"]; ?><br />
											<b>Hauteur de l'eNodeB :</b> <?php echo $_SESSION["h_enodeb"]; ?> m<br />
											<b>Hauteur de l'UE :</b> <?php echo $_SESSION["h_ue"]; ?> m<br />
											<b>Type de site :</b> <?php echo $_SESSION["type_site"]; ?><br />
										</fieldset>
										<fieldset class="resultat">
											<div class="mini-title">Résultat couverture</div>
											<b>Atténuation :</b> <?php echo $_SESSION["attenuation"]; ?> dB<br />
											<b>Rayon de la cellule :</b> <?php echo $_SESSION["rayon_cellule"]; ?> Km<br />
											<b>Bruit de l'UE :</b> <?php echo $_SESSION["bruit_ue"]; ?> dB<br />
											<b>Bruit de l'eNodeB :</b> <?php echo $_SESSION["bruit_enodeb"]; ?> dB<br />
											<div class="resultat-final"><b>Nombre d'enodeB :</b> <?php echo $_SESSION["nombre_enodeb"]; ?> eNodeBs<br /></div>
										</fieldset><br />
									<?php }
									if (isset($_SESSION["capacite"]) && !empty($_SESSION["capacite"])) { ?>
										<h2><?php echo $capacite_menu ?></h2>
										<fieldset>
											<div class="mini-title">Étape 1</div>
											<b>Densité d'abonnés :</b> <?php echo $_SESSION['densite_zone']; ?> Ab/Km²<br />
											<b>Débit de la cellule en UpLink :</b> <?php echo $_SESSION['debit_ul']; ?> Mbps<br />
											<b>Débit de la cellule en DownLink :</b> <?php echo $_SESSION['debit_dl']; ?> Mbps<br />
											<b>Débit moyen par abonné en UpLink :</b> <?php echo $_SESSION['debit_uplink']; ?> Mbps<br />
											<b>Débit moyen par abonné en DownLink :</b> <?php echo $_SESSION['debit_downlink']; ?> Mbps<br />
										</fieldset>
										<fieldset class="resultat">
											<div class="mini-title">Résultat capacité</div>
											<div class="resultat-final"><b>Nombre de site :</b> <?php echo $_SESSION["nombre_site"]; ?> sites<br /></div>
										</fieldset><br />
									<?php }
									if (isset($_SESSION["combinePlatform"]) && !empty($_SESSION["combinePlatform"])) { ?>
										<h2><?php echo $cpri_menu ?></h2>
										<fieldset>
											<div class="mini-title">Données</div>
											<b>Débit de la cellule en DownLink :</b> <?php echo $_SESSION['debit_dl']; ?> Mbps<br />
											<b>Bande passante allouée à la cellule :</b> <?php echo $_SESSION['bp_cellule']; ?> Mbps<br />
											<b>Type de site :</b> Site <?php echo $_SESSION['type_site']; ?><br />
										</fieldset>
										<fieldset class="resultat">
											<div class="mini-title">Résultat cpri</div>
											<b>Capacité de l'antenne porteuse (AXC) :</b> <?php echo $_SESSION['c_axc']; ?> Mbps<br />
											<b>Nombre d'AXC du canal :</b> <?php echo $_SESSION['n_axc']; ?><br />
											<b>Capacité du lien CPRI par secteur :</b> <?php echo $_SESSION['c_cpri']; ?> Mbps<br />
											<div class="resultat-final"><b>Capacité du lien FRONTHAUL :</b> <?php echo $_SESSION['c_cpri_site']; ?> Mbps<br /></div>
										</fieldset><br />
									<?php }
									if (isset($_SESSION["combinePlatform1"]) && !empty($_SESSION["combinePlatform1"])) { ?>
										<h2><?php echo $network_menu ?></h2>
										<fieldset>
											<div class="mini-title">Données</div>
											<b>Nombre de site :</b> <?php echo $_SESSION['nombre_site']; ?> sites<br />
											<b>Débit de la cellule en DownLink :</b> <?php echo $_SESSION['debit_dl']; ?> Mbps<br />
										</fieldset>
										<fieldset>
											<div class="mini-title">Choix de la Topologie</div>
											<b>Type de topologie :</b> <?php echo $_SESSION['type_topo']; ?><br />
										</fieldset>
										<fieldset>
											<div class="mini-title">Choix des caractéristiques des équipements WDM</div>
											<b>Nombre de canaux :</b> <?php echo $_SESSION['nombre_canaux']; ?><br />
											<b>Sensibilité du récepteur :</b> <?php echo $_SESSION['sensibilite_recepteur']; ?> dBm<br />
											<b>Fénêtre optique :</b> <?php echo $_SESSION['fenetre_optique']; ?> nm<br />
											<b>Puissance d'émission :</b> <?php echo $_SESSION['puissance_emission']; ?> dBm<br />
										</fieldset>
										<fieldset>
											<div class="mini-title">Choix du support et connectiques</div>
											<b>Type de fibre :</b> <?php echo $_SESSION['type_fibre']; ?><br />
											<b>Atténuation linéaire :</b> <?php echo $_SESSION['attenuation_lineaire']; ?> db/Km<br />
											<b>Atténuation des connecteurs optiques (dB/Km) :</b> <?php echo $_SESSION['attenuation_connecteur_optique']; ?> db/Km<br />
											<b>Connecteurs optiques :</b> <?php echo $_SESSION['connecteurs_optiques']; ?><br />
											<b>Distance de transport :</b> <?php echo $_SESSION['distance_transport']; ?> Km<br />
										</fieldset>
										<fieldset class="resultat">
											<div class="mini-title">Résultat fronthaul network</div>
											<div class="resultat-final"><b>Atténuation totale :</b> <?php echo $_SESSION["attenuation_totale"]; ?> dB<br /></div>
											<div class="resultat-final"><b>Nombre d'équipements :</b> <?php echo $_SESSION["nombre_equipements"]; ?> équipements<br /></div>
											<div class="resultat-final"><b>Capacité de chaque équipement :</b> <?php echo $_SESSION["capacite_equipements"]; ?> Mbps<br /></div>
										</fieldset><br />
									<?php }
									if (isset($_SESSION["interface_x1_s2"]) && !empty($_SESSION["interface_x1_s2"])) { ?>
										<h2><?php echo $interface_menu ?></h2>
										<fieldset>
											<div class="mini-title">Étape 1</div>
											<b>Heure d'occupation :</b> <?php echo $_SESSION['heure_occ']; ?> Kbps<br />
											<b>Taux de trafic de données UL et DL :</b> <?php echo $_SESSION['trafic_UL_DL']; ?><br />
											<b>Taux de trafic moyen : </b> <?php echo $_SESSION['trafic_moy']; ?><br />
											<b>Nombre d'abonné par eNodeB :</b> <?php echo $_SESSION['abon_par_eNodeB']; ?><br />
											<b>Trafic Radio UL (%) :</b> <?php echo $_SESSION['T_R_UL']; ?> %<br />
											<b>Trafic Radio DL (%) :</b> <?php echo $_SESSION['T_R_DL']; ?> %<br />
											<b>ER :</b> <?php echo $_SESSION['ER']; ?><br />
										</fieldset>
										<fieldset>
											<div class="mini-title">Étape 2</div>
											<b>BH_Data_Trafic_subs_UL :</b> <?php echo $_SESSION['BH_Data_Trafic_subs_UL']; ?><br />
											<b>BH_Data_Trafic_subs_DL :</b> <?php echo $_SESSION['BH_Data_Trafic_subs_DL']; ?><br />
											<b>Data_Trafic_Throughput_UL :</b> <?php echo $_SESSION['Data_Trafic_Throughput_subs_UL']; ?><br />
											<b>Data_Trafic_Throughput_DL :</b> <?php echo $_SESSION['Data_Trafic_Throughput_subs_DL']; ?><br />
											<b>T_UL_Data_trafic_subs :</b> <?php echo $_SESSION['T_UL_Data_trafic_subs']; ?><br />
											<b>T_DL_Data_trafic_subs :</b> <?php echo $_SESSION['T_DL_Data_trafic_subs']; ?><br />
											<b>T_UL_user_plane_subs :</b> <?php echo $_SESSION['T_UL_user_plane_subs']; ?> Kpbs<br />
											<b>T_DL_user_plane_subs :</b> <?php echo $_SESSION['T_DL_user_plane_subs']; ?> Kpbs<br />
											<div class="resultat-final"><b>T_Total_user_plane_subs_sites :</b> <?php echo $_SESSION['T_Total_user_plane_subs']; ?> Mbps<br />
										</fieldset>
										<fieldset class="resultat">
											<div class="mini-title">Résultat interface</div>
											<div class="resultat-final"><b>Plan de control :</b> <?php echo $_SESSION["plan_control"]; ?> Mbps<br /></div>
											<div class="resultat-final"><b>Largeur de bande de l'interface S1 :</b> <?php echo $_SESSION["S1_bandW"]; ?> Mbps<br /></div>
											<div class="resultat-final"><b>Largeur de bande de l'interface X2 :</b> <?php echo $_SESSION["X2_bandW"]; ?> Mbps<br /></div>
										</fieldset><br />
									<?php }
									if (isset($_SESSION["capex"]) && !empty($_SESSION["capex"])) { ?>
										<h2><?php echo $capex_menu ?></h2>
										<fieldset>
											<div class="mini-title">Données</div>
											<b>Nombre d'eNodeB(s) :</b> <?php echo $_SESSION['nombre_enodeb']; ?> eNodeBs<br />
											<b>Nombre de sites loués :</b> <?php echo $_SESSION['nombre_site']; ?> sites<br />
										</fieldset>
										<fieldset>
											<div class="mini-title">Totaux</div>
											<b>Coût de conception :</b> <?php echo $_SESSION['s1']; ?> F. CFA<br />
											<b>Investissement Matériel & logiciel :</b> <?php echo $_SESSION['s2']; ?> F. CFA<br />
											<b>Coût de déploiement du réseau :</b> <?php echo $_SESSION['s3']; ?> F. CFA<br />
											<b>Coût de logistique et de suivi :</b> <?php echo $_SESSION['s4']; ?> F. CFA<br />
										</fieldset>
										<fieldset class="resultat">
											<div class="mini-title">Résultat capex</div>
											<div class="resultat-final"><b>Montant du CAPEX :</b> <?php echo $_SESSION["capexval"]; ?> F. CFA<br /></div>
										</fieldset><br />
									<?php }
									if (isset($_SESSION["opex"]) && !empty($_SESSION["opex"])) { ?>
										<h2><?php echo $opex_menu ?></h2>
										<fieldset>
											<div class="mini-title">Données</div>
											<b>Nombre d'habitants :</b> <?php echo $_SESSION['densite_zone'] * $_SESSION['surface_zone']; ?> Hbts<br />
											<b>Pourcentage d'abonnés :</b> 65 %<br />
										</fieldset>
										<fieldset class="resultat">
											<div class="mini-title">Résultat opex</div>
											<table id="myTable">
												<tr>
													<th><a href="#">ANNÉE</a></th>
													<th><a href="#">OPEX (F. CFA)</a></th>
													<th><a href="#">RECETTES (F. CFA)</a></th>
													<th><a href="#">BÉNÉFICES (F. CFA)</a></th>
												</tr>
												<tr>
													<td>I</td>
													<td><?php echo $_SESSION['opex1']; ?></td>
													<td><?php echo $_SESSION['rcet1']; ?></td>
													<td><?php echo $_SESSION['bene1']; ?></td>
												</tr>
												<tr>
													<td>II</td>
													<td><?php echo $_SESSION['opex2']; ?></td>
													<td><?php echo $_SESSION['rcet2']; ?></td>
													<td><?php echo $_SESSION['bene2']; ?></td>
												</tr>
												<tr>
													<td>III</td>
													<td><?php echo $_SESSION['opex3']; ?></td>
													<td><?php echo $_SESSION['rcet3']; ?></td>
													<td><?php echo $_SESSION['bene3']; ?></td>
												</tr>
												<tr>
													<td>IV</td>
													<td><?php echo $_SESSION['opex4']; ?></td>
													<td><?php echo $_SESSION['rcet4']; ?></td>
													<td><?php echo $_SESSION['bene4']; ?></td>
												</tr>
												<tr>
													<td>V</td>
													<td><?php echo $_SESSION['opex5']; ?></td>
													<td><?php echo $_SESSION['rcet5']; ?></td>
													<td><?php echo $_SESSION['bene5']; ?></td>
												</tr>
											</table>
										</fieldset><br />
									<?php } ?>
								</fieldset>
								</p>
							<?php
							} else {
								include_once("includes/lecture_projet.php");
							}						?>
						</fieldset>
					</form>
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