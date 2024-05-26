<?php include_once("includes/config.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<?php include_once("includes/gestion_projet.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
 <head>
 <meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
 <title><?php echo $capacite_menu?></title>
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
 <?php include_once('includes/header.php')?>
 <!-- ASIDE NAV AND CONTENT -->
 <div class="line">
 <div class="box margin-bottom">
 <div class="margin">
 <!-- ASIDE NAV 1 -->
			 <?php include_once('includes/navigation.php')?>
 <!-- CONTENT -->
 <section class="s-12 l-6">
 <h1><?php if((!isset($message)||empty($message))&&isset($_POST['capacite'])&&!empty($_POST['capacite'])&&isset($_SESSION['capacite'])&&!empty($_SESSION['capacite'])){
					 echo $resultat_capacite_menu;
				 } else {echo $capacite_menu;}?></h1>
				 <?php if(!isset($_SESSION["projet"]) || empty($_SESSION["projet"])) {
					 echo "<p>$erreurAucunProjetSelectionne</p>";
				 } else if(!isset($_SESSION["couverture"]) || empty($_SESSION["couverture"])) {
					 echo "<p>$erreurPlanificationCouverture</p>";
				 } else if((!isset($message)||empty($message))&&isset($_POST['capacite'])&&!empty($_POST['capacite'])&&isset($_SESSION['capacite'])&&!empty($_SESSION['capacite'])){?>
					 <p><fieldset>
						<legend><?php 
						$projet=$_SESSION["projet"];
						$resultat = mysqli_query($connexionBD,"SELECT * FROM `projet` WHERE id=$projet");
						$row = mysqli_fetch_array($resultat);
						echo $row[1]?></legend>
						<br/>
						<fieldset><div class="mini-title">Données</div> 
							<b>Densité d'abonnés :</b> <?php echo $_SESSION['densite_zone']; ?> Ab/Km²<br/>
							<b>Débit moyen par abonné en UpLink :</b> <?php echo $_SESSION['debit_uplink']; ?> Mbps<br/>
							<b>Débit moyen par abonné en DownLink :</b> <?php echo $_SESSION['debit_downlink']; ?> Mbps<br/>
						</fieldset>
						<fieldset class="resultat"><div class="mini-title">Résultat capacité</div>
							<div class="resultat-final"><b>Nombre de site :</b> <?php echo $_SESSION["nombre_site"];?> sites<br/></div>
							<div class="resultat-final"><b>Débit de la cellule en UpLink :</b> <?php echo $_SESSION['debit_ul']; ?> Mbps<br/></div>
							<div class="resultat-final"><b>Débit de la cellule en DownLink :</b> <?php echo $_SESSION['debit_dl']; ?> Mbps<br/></div>
						</fieldset>
						
					</fieldset></p>
				 <?php } else {?>
				 <form method="post" enctype="multipart/form-data">
					<fieldset>
						<legend><?php 
						$projet=$_SESSION["projet"];
						$resultat = mysqli_query($connexionBD,"SELECT * FROM `projet` WHERE id=$projet");
						$row = mysqli_fetch_array($resultat);
						echo $row[1]?></legend>
						<?php if(isset($message))echo "$message<br/>"; ?>
						<br/>
						<fieldset>
						<div class="mini-title">Données</div>
							<b>Densité d'abonnés :</b> <?php echo $_SESSION['densite_zone']; ?> Ab/Km²<br/>
							<b>Débit cellule en UpLink :</b> <?php echo $_SESSION['debit_uplink']; ?> Mbps<br/>
							<b>Débit cellule en DownLink :</b> <?php echo $_SESSION['debit_downlink']; ?> Mbps<br/>
						</fieldset>
						<fieldset>
							<div class="mini-title">Service de messagerie</div>
							Taux de contention (%) :
							<input name="contention_msg" type="text" <?php if(isset($_POST["contention_msg"])) {echo "value='".$_POST["contention_msg"]."'";} else if(isset($_SESSION["contention_msg"])) {echo "value='".$_SESSION["contention_msg"]."'";} ?> />
							Débit Uplink par utilisateur (kbit/s) :
							<input name="debitul_msg" type="text" <?php if(isset($_POST["debitul_msg"])) {echo "value='".$_POST["debitul_msg"]."'";} else if(isset($_SESSION["debitul_msg"])) {echo "value='".$_SESSION["debitul_msg"]."'";} ?> />
							Débit Downlink par utilisateur(kbit/s) : 
							<input name="debitdl_msg" type="text" <?php if(isset($_POST["debitdl_msg"])) {echo "value='".$_POST["debitdl_msg"]."'";} else if(isset($_SESSION["debitdl_msg"])) {echo "value='".$_SESSION["debitdl_msg"]."'";} ?> />
							Pourcentage d'abonnés pour ce service (%) :
							<input name="pourcentage_msg" type="text" <?php if(isset($_POST["pourcentage_msg"])) {echo "value='".$_POST["pourcentage_msg"]."'";} else if(isset($_SESSION["pourcentage_msg"])) {echo "value='".$_SESSION["pourcentage_msg"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Paramètres du service Informations payantes</div>
							Taux de contention (%) :
							<input name="contention_inf" type="text" <?php if(isset($_POST["contention_inf"])) {echo "value='".$_POST["contention_inf"]."'";} else if(isset($_SESSION["contention_inf"])) {echo "value='".$_SESSION["contention_inf"]."'";} ?> />
							Débit Uplink par utilisateur (kbit/s) :
							<input name="debitul_inf" type="text" <?php if(isset($_POST["debitul_inf"])) {echo "value='".$_POST["debitul_inf"]."'";} else if(isset($_SESSION["debitul_inf"])) {echo "value='".$_SESSION["debitul_inf"]."'";} ?> />
							Débit Downlink par utilisateur(kbit/s) : 
							<input name="debitdl_inf" type="text" <?php if(isset($_POST["debitdl_inf"])) {echo "value='".$_POST["debitdl_inf"]."'";} else if(isset($_SESSION["debitdl_inf"])) {echo "value='".$_SESSION["debitdl_inf"]."'";} ?> />
							Pourcentage d'abonnés pour ce service (%) :
							<input name="pourcentage_inf" type="text" <?php if(isset($_POST["pourcentage_inf"])) {echo "value='".$_POST["pourcentage_inf"]."'";} else if(isset($_SESSION["pourcentage_inf"])) {echo "value='".$_SESSION["pourcentage_inf"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Paramètres du service jeux</div>
							Taux de contention (%) :
							<input name="contention_jeu" type="text" <?php if(isset($_POST["contention_jeu"])) {echo "value='".$_POST["contention_jeu"]."'";} else if(isset($_SESSION["contention_jeu"])) {echo "value='".$_SESSION["contention_jeu"]."'";} ?> />
							Débit Uplink par utilisateur (kbit/s) :
							<input name="debitul_jeu" type="text" <?php if(isset($_POST["debitul_jeu"])) {echo "value='".$_POST["debitul_jeu"]."'";} else if(isset($_SESSION["debitul_jeu"])) {echo "value='".$_SESSION["debitul_jeu"]."'";} ?> />
							Débit Downlink par utilisateur(kbit/s) : 
							<input name="debitdl_jeu" type="text" <?php if(isset($_POST["debitdl_jeu"])) {echo "value='".$_POST["debitdl_jeu"]."'";} else if(isset($_SESSION["debitdl_jeu"])) {echo "value='".$_SESSION["debitdl_jeu"]."'";} ?> />
							Pourcentage d'abonnés pour ce service (%) :
							<input name="pourcentage_jeu" type="text" <?php if(isset($_POST["pourcentage_jeu"])) {echo "value='".$_POST["pourcentage_jeu"]."'";} else if(isset($_SESSION["pourcentage_jeu"])) {echo "value='".$_SESSION["pourcentage_jeu"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Paramètres du service M-Commerce</div>
							Taux de contention (%) :
							<input name="contention_mc" type="text" <?php if(isset($_POST["contention_mc"])) {echo "value='".$_POST["contention_mc"]."'";} else if(isset($_SESSION["contention_mc"])) {echo "value='".$_SESSION["contention_mc"]."'";} ?> />
							Débit Uplink par utilisateur (kbit/s) :
							<input name="debitul_mc" type="text" <?php if(isset($_POST["debitul_mc"])) {echo "value='".$_POST["debitul_mc"]."'";} else if(isset($_SESSION["debitul_mc"])) {echo "value='".$_SESSION["debitul_mc"]."'";} ?> />
							Débit Downlink par utilisateur(kbit/s) : 
							<input name="debitdl_mc" type="text" <?php if(isset($_POST["debitdl_mc"])) {echo "value='".$_POST["debitdl_mc"]."'";} else if(isset($_SESSION["debitdl_mc"])) {echo "value='".$_SESSION["debitdl_mc"]."'";} ?> />
							Pourcentage d'abonnés pour ce service (%) :
							<input name="pourcentage_mc" type="text" <?php if(isset($_POST["pourcentage_mc"])) {echo "value='".$_POST["pourcentage_mc"]."'";} else if(isset($_SESSION["pourcentage_mc"])) {echo "value='".$_SESSION["pourcentage_mc"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Paramètres du service Musique</div>
							Taux de contention (%) :
							<input name="contention_sic" type="text" <?php if(isset($_POST["contention_sic"])) {echo "value='".$_POST["contention_sic"]."'";} else if(isset($_SESSION["contention_sic"])) {echo "value='".$_SESSION["contention_sic"]."'";} ?> />
							Débit Uplink par utilisateur (kbit/s) :
							<input name="debitul_sic" type="text" <?php if(isset($_POST["debitul_sic"])) {echo "value='".$_POST["debitul_sic"]."'";} else if(isset($_SESSION["debitul_sic"])) {echo "value='".$_SESSION["debitul_sic"]."'";} ?> />
							Débit Downlink par utilisateur(kbit/s) : 
							<input name="debitdl_sic" type="text" <?php if(isset($_POST["debitdl_sic"])) {echo "value='".$_POST["debitdl_sic"]."'";} else if(isset($_SESSION["debitdl_sic"])) {echo "value='".$_SESSION["debitdl_sic"]."'";} ?> />
							Pourcentage d'abonnés pour ce service (%) :
							<input name="pourcentage_sic" type="text" <?php if(isset($_POST["pourcentage_sic"])) {echo "value='".$_POST["pourcentage_sic"]."'";} else if(isset($_SESSION["pourcentage_sic"])) {echo "value='".$_SESSION["pourcentage_sic"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Paramètres du service Navigation</div>
							Taux de contention (%) :
							<input name="contention_nav" type="text" <?php if(isset($_POST["contention_nav"])) {echo "value='".$_POST["contention_nav"]."'";} else if(isset($_SESSION["contention_nav"])) {echo "value='".$_SESSION["contention_nav"]."'";} ?> />
							Débit Uplink par utilisateur (kbit/s) :
							<input name="debitul_nav" type="text" <?php if(isset($_POST["debitul_nav"])) {echo "value='".$_POST["debitul_nav"]."'";} else if(isset($_SESSION["debitul_nav"])) {echo "value='".$_SESSION["debitul_nav"]."'";} ?> />
							Débit Downlink par utilisateur(kbit/s) : 
							<input name="debitdl_nav" type="text" <?php if(isset($_POST["debitdl_nav"])) {echo "value='".$_POST["debitdl_nav"]."'";} else if(isset($_SESSION["debitdl_nav"])) {echo "value='".$_SESSION["debitdl_nav"]."'";} ?> />
							Pourcentage d'abonnés pour ce service (%) :
							<input name="pourcentage_nav" type="text" <?php if(isset($_POST["pourcentage_nav"])) {echo "value='".$_POST["pourcentage_nav"]."'";} else if(isset($_SESSION["pourcentage_nav"])) {echo "value='".$_SESSION["pourcentage_nav"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Paramètres du service Personnalisation</div>
							Taux de contention (%) :
							<input name="contention_per" type="text" <?php if(isset($_POST["contention_per"])) {echo "value='".$_POST["contention_per"]."'";} else if(isset($_SESSION["contention_per"])) {echo "value='".$_SESSION["contention_per"]."'";} ?> />
							Débit Uplink par utilisateur (kbit/s) :
							<input name="debitul_per" type="text" <?php if(isset($_POST["debitul_per"])) {echo "value='".$_POST["debitul_per"]."'";} else if(isset($_SESSION["debitul_per"])) {echo "value='".$_SESSION["debitul_per"]."'";} ?> />
							Débit Downlink par utilisateur(kbit/s) : 
							<input name="debitdl_per" type="text" <?php if(isset($_POST["debitdl_per"])) {echo "value='".$_POST["debitdl_per"]."'";} else if(isset($_SESSION["debitdl_per"])) {echo "value='".$_SESSION["debitdl_per"]."'";} ?> />
							Pourcentage d'abonnés pour ce service (%) :
							<input name="pourcentage_per" type="text" <?php if(isset($_POST["pourcentage_per"])) {echo "value='".$_POST["pourcentage_per"]."'";} else if(isset($_SESSION["pourcentage_per"])) {echo "value='".$_SESSION["pourcentage_per"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Paramètres du service Réseau de données</div>
							Taux de contention (%) :
							<input name="contention_rd" type="text" <?php if(isset($_POST["contention_rd"])) {echo "value='".$_POST["contention_rd"]."'";} else if(isset($_SESSION["contention_rd"])) {echo "value='".$_SESSION["contention_rd"]."'";} ?> />
							Débit Uplink par utilisateur (kbit/s) :
							<input name="debitul_rd" type="text" <?php if(isset($_POST["debitul_rd"])) {echo "value='".$_POST["debitul_rd"]."'";} else if(isset($_SESSION["debitul_rd"])) {echo "value='".$_SESSION["debitul_rd"]."'";} ?> />
							Débit Downlink par utilisateur(kbit/s) : 
							<input name="debitdl_rd" type="text" <?php if(isset($_POST["debitdl_rd"])) {echo "value='".$_POST["debitdl_rd"]."'";} else if(isset($_SESSION["debitdl_rd"])) {echo "value='".$_SESSION["debitdl_rd"]."'";} ?> />
							Pourcentage d'abonnés pour ce service (%) :
							<input name="pourcentage_rd" type="text" <?php if(isset($_POST["pourcentage_rd"])) {echo "value='".$_POST["pourcentage_rd"]."'";} else if(isset($_SESSION["pourcentage_rd"])) {echo "value='".$_SESSION["pourcentage_rd"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Paramètres du service Tv/Vidéo</div>
							Taux de contention (%) :
							<input name="contention_tv" type="text" <?php if(isset($_POST["contention_tv"])) {echo "value='".$_POST["contention_tv"]."'";} else if(isset($_SESSION["contention_tv"])) {echo "value='".$_SESSION["contention_tv"]."'";} ?> />
							Débit Uplink par utilisateur (kbit/s) :
							<input name="debitul_tv" type="text" <?php if(isset($_POST["debitul_tv"])) {echo "value='".$_POST["debitul_tv"]."'";} else if(isset($_SESSION["debitul_tv"])) {echo "value='".$_SESSION["debitul_tv"]."'";} ?> />
							Débit Downlink par utilisateur(kbit/s) : 
							<input name="debitdl_tv" type="text" <?php if(isset($_POST["debitdl_tv"])) {echo "value='".$_POST["debitdl_tv"]."'";} else if(isset($_SESSION["debitdl_tv"])) {echo "value='".$_SESSION["debitdl_tv"]."'";} ?> />
							Pourcentage d'abonnés pour ce service (%) :
							<input name="pourcentage_tv" type="text" <?php if(isset($_POST["pourcentage_tv"])) {echo "value='".$_POST["pourcentage_tv"]."'";} else if(isset($_SESSION["pourcentage_tv"])) {echo "value='".$_SESSION["pourcentage_tv"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Paramètres du service Voix</div>
							Taux de contention (%) :
							<input name="contention_voix" type="text" <?php if(isset($_POST["contention_voix"])) {echo "value='".$_POST["contention_voix"]."'";} else if(isset($_SESSION["contention_voix"])) {echo "value='".$_SESSION["contention_voix"]."'";} ?> />
							Débit Uplink par utilisateur (kbit/s) :
							<input name="debitul_voix" type="text" <?php if(isset($_POST["debitul_voix"])) {echo "value='".$_POST["debitul_voix"]."'";} else if(isset($_SESSION["debitul_voix"])) {echo "value='".$_SESSION["debitul_voix"]."'";} ?> />
							Débit Downlink par utilisateur(kbit/s) : 
							<input name="debitdl_voix" type="text" <?php if(isset($_POST["debitdl_voix"])) {echo "value='".$_POST["debitdl_voix"]."'";} else if(isset($_SESSION["debitdl_voix"])) {echo "value='".$_SESSION["debitdl_voix"]."'";} ?> />
							Pourcentage d'abonnés pour ce service (%) :
							<input name="pourcentage_voix" type="text" <?php if(isset($_POST["pourcentage_voix"])) {echo "value='".$_POST["pourcentage_voix"]."'";} else if(isset($_SESSION["pourcentage_voix"])) {echo "value='".$_SESSION["pourcentage_voix"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Paramètres du service de Messagerie Jointe</div>
							Taux de contention (%) :
							<input name="contention_msj" type="text" <?php if(isset($_POST["contention_msj"])) {echo "value='".$_POST["contention_msj"]."'";} else if(isset($_SESSION["contention_msj"])) {echo "value='".$_SESSION["contention_msj"]."'";} ?> />
							Débit Uplink par utilisateur (kbit/s) :
							<input name="debitul_msj" type="text" <?php if(isset($_POST["debitul_msj"])) {echo "value='".$_POST["debitul_msj"]."'";} else if(isset($_SESSION["debitul_msj"])) {echo "value='".$_SESSION["debitul_msj"]."'";} ?> />
							Débit Downlink par utilisateur(kbit/s) : 
							<input name="debitdl_msj" type="text" <?php if(isset($_POST["debitdl_msj"])) {echo "value='".$_POST["debitdl_msj"]."'";} else if(isset($_SESSION["debitdl_msj"])) {echo "value='".$_SESSION["debitdl_msj"]."'";} ?> />
							Pourcentage d'abonnés pour ce service (%) :
							<input name="pourcentage_msj" type="text" <?php if(isset($_POST["pourcentage_msj"])) {echo "value='".$_POST["pourcentage_msj"]."'";} else if(isset($_SESSION["pourcentage_msj"])) {echo "value='".$_SESSION["pourcentage_msj"]."'";} ?> />
						</fieldset>
						<?php /*print_r (count($_POST));$list = array_keys($_POST);foreach($list as $key){ mysqli_query($connexionBD,"ALTER TABLE `projet` ADD `$key` VARCHAR(63) NOT NULL");
						 echo"\$_SESSION['$key'] = \$_POST['$key'];<br/>"; }*/
						if(isset($message))echo $message; ?>
						<br/>
						<input type="submit" name="capacite" value="Valider" />
						<input type="submit" name="defaut_capacite" value="Valeurs Par défaut"/>
					</fieldset>
					</form>
				 <?php } ?>
 </section>
 <!-- ASIDE NAV 2 -->
 <?php include_once('includes/options.php')?>
 </div>
 </div>
 </div>
 <!-- FOOTER -->
 <?php include_once('includes/footer.php')?>
 <script type="text/javascript" src="js/responsee.js"></script>
 </body>
</html>
<?php include_once("includes/fermeture_flux_sql.php"); ?>