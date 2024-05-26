<?php include_once("includes/config.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<?php include_once("includes/gestion_projet.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
 <head>
 <meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
 <title><?php echo $capex_menu?></title>
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
 <h1><?php if((!isset($message)||empty($message))&&isset($_POST['capex'])&&!empty($_POST['capex'])&&isset($_SESSION['capex'])&&!empty($_SESSION['capex'])){
					 echo $resultat_capex_menu;
				 } else {echo $capex_menu;}?></h1>
				 <?php if(!isset($_SESSION["projet"]) || empty($_SESSION["projet"])) {
					 echo "<p>$erreurAucunProjetSelectionne</p>";
				 } else if(!isset($_SESSION["interface_x1_s2"]) || empty($_SESSION["interface_x1_s2"])) {
					 echo "<p>$erreurPlanificationInterface</p>";
				 } else if((!isset($message)||empty($message))&&isset($_POST['capex'])&&!empty($_POST['capex'])&&isset($_SESSION['capex'])&&!empty($_SESSION['capex'])){?>
					 <p><fieldset>
						<legend><?php 
						$projet=$_SESSION["projet"];
						$resultat = mysqli_query($connexionBD,"SELECT * FROM `projet` WHERE id=$projet");
						$row = mysqli_fetch_array($resultat);
						echo $row[1]?></legend>
						<br/>
						<fieldset>
						<div class="mini-title">Données</div>
							<b>Nombre d'eNodeB(s) :</b> <?php echo $_SESSION['nombre_enodeb']; ?> eNodeBs<br/>
							<b>Nombre de sites loués :</b> <?php echo $_SESSION['nombre_site']; ?> sites<br/>
						</fieldset>
						<fieldset><div class="mini-title">Totaux</div> 
							<b>Coût de conception :</b> <?php echo $_SESSION['s1']; ?> F. CFA<br/>
							<b>Investissement Matériel & logiciel :</b> <?php echo $_SESSION['s2']; ?> F. CFA<br/>
							<b>Coût de déploiement du réseau :</b> <?php echo $_SESSION['s3']; ?> F. CFA<br/>
							<b>Coût de logistique et de suivi :</b> <?php echo $_SESSION['s4']; ?> F. CFA<br/>
						</fieldset>
						<fieldset class="resultat"><div class="mini-title">Résultat capex</div>
							<div class="resultat-final"><b>Montant du CAPEX :</b> <?php echo $_SESSION["capexval"];?> F. CFA<br/></div>
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
							<b>Nombre d'eNodeB(s) :</b> <?php echo $_SESSION['nombre_enodeb']; ?> eNodeBs<br/>
							<b>Nombre de sites loués :</b> <?php echo $_SESSION['nombre_site']; ?> sites<br/>
						</fieldset>
						<fieldset>
							<div class="mini-title">Coût de conception (F. CFA)</div>
							Coût d'étude ingénierie Radio :
							<input name="ing_radio" type="text" <?php if(isset($_POST["ing_radio"])) {echo "value='".$_POST["ing_radio"]."'";} else if(isset($_SESSION["ing_radio"])) {echo "value='".$_SESSION["ing_radio"]."'";} ?> />
							Coût d'étude ingénierie Réseau :
							<input name="ing_reseau" type="text" <?php if(isset($_POST["ing_reseau"])) {echo "value='".$_POST["ing_reseau"]."'";} else if(isset($_SESSION["ing_reseau"])) {echo "value='".$_SESSION["ing_reseau"]."'";} ?> />
							Coût de recherche fournisseur : 
							<input name="rech_four" type="text" <?php if(isset($_POST["rech_four"])) {echo "value='".$_POST["rech_four"]."'";} else if(isset($_SESSION["rech_four"])) {echo "value='".$_SESSION["rech_four"]."'";} ?> />
							Coût de recherche de sites :
							<input name="rech_site" type="text" <?php if(isset($_POST["rech_site"])) {echo "value='".$_POST["rech_site"]."'";} else if(isset($_SESSION["rech_site"])) {echo "value='".$_SESSION["rech_site"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Investissement Matériel & logiciel</div>
							<div class="mini-title2">Coeur de réseau</div>
							Coût des routeurs, Serveurs & Passerelles :
							<input name="rout_ser_pass" type="text" <?php if(isset($_POST["rout_ser_pass"])) {echo "value='".$_POST["rout_ser_pass"]."'";} else if(isset($_SESSION["rout_ser_pass"])) {echo "value='".$_SESSION["rout_ser_pass"]."'";} ?> />
							Coût des infrastructures IP :
							<input name="inf_ip" type="text" <?php if(isset($_POST["inf_ip"])) {echo "value='".$_POST["inf_ip"]."'";} else if(isset($_SESSION["inf_ip"])) {echo "value='".$_SESSION["inf_ip"]."'";} ?> />
							Coût des logiciels d'aplication : 
							<input name="log_appli" type="text" <?php if(isset($_POST["log_appli"])) {echo "value='".$_POST["log_appli"]."'";} else if(isset($_SESSION["log_appli"])) {echo "value='".$_SESSION["log_appli"]."'";} ?> />
							Coût des infrastructures VoIP :
							<input name="inf_voip" type="text" <?php if(isset($_POST["inf_voip"])) {echo "value='".$_POST["inf_voip"]."'";} else if(isset($_SESSION["inf_voip"])) {echo "value='".$_SESSION["inf_voip"]."'";} ?> />
						<div class="mini-title2">Infrastructure Radio et Réseau de Raccordement Interne</div>
							Coût des infrastructures Radio (eNodeB, Antenne) :
							<input name="bs_ant" type="text" <?php if(isset($_POST["bs_ant"])) {echo "value='".$_POST["bs_ant"]."'";} else if(isset($_SESSION["bs_ant"])) {echo "value='".$_SESSION["bs_ant"]."'";} ?> />
							Coût d'infrastructure réseau (faisceau hertzien, fibre optique, câble) :
							<input name="fh_fob_cab" type="text" <?php if(isset($_POST["fh_fob_cab"])) {echo "value='".$_POST["fh_fob_cab"]."'";} else if(isset($_SESSION["fh_fob_cab"])) {echo "value='".$_SESSION["fh_fob_cab"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Coût de déploiement du réseau</div>
							<div class="mini-title2">Location des sites</div>
							Frais de location d'un site (/an) :
							<input name="loc_sit" type="text" <?php if(isset($_POST["loc_sit"])) {echo "value='".$_POST["loc_sit"]."'";} else if(isset($_SESSION["loc_sit"])) {echo "value='".$_SESSION["loc_sit"]."'";} ?> />
							<div class="mini-title2">Acquisition de sites</div>
							Frais d'acuiqition d'un terrain :
							<input name="aq_terr" type="text" <?php if(isset($_POST["aq_terr"])) {echo "value='".$_POST["aq_terr"]."'";} else if(isset($_SESSION["aq_terr"])) {echo "value='".$_SESSION["aq_terr"]."'";} ?> />
							Coût des travaux de Génie Civil et d'installation des pylônes : 
							<input name="travaux" type="text" <?php if(isset($_POST["travaux"])) {echo "value='".$_POST["travaux"]."'";} else if(isset($_SESSION["travaux"])) {echo "value='".$_SESSION["travaux"]."'";} ?> />
							Coût de raccordement électrique :
							<input name="electrique" type="text" <?php if(isset($_POST["electrique"])) {echo "value='".$_POST["electrique"]."'";} else if(isset($_SESSION["electrique"])) {echo "value='".$_SESSION["electrique"]."'";} ?> />
							<div class="mini-title2">Frais d'installation du site</div>
							Frais d'installation d'une eNodeB :
							<input name="inst_sit" type="text" <?php if(isset($_POST["inst_sit"])) {echo "value='".$_POST["inst_sit"]."'";} else if(isset($_SESSION["inst_sit"])) {echo "value='".$_SESSION["inst_sit"]."'";} ?> />
							Frais de raccordement électrique :
							<input name="rac_elec" type="text" <?php if(isset($_POST["rac_elec"])) {echo "value='".$_POST["rac_elec"]."'";} else if(isset($_SESSION["rac_elec"])) {echo "value='".$_SESSION["rac_elec"]."'";} ?> />
							Frais de raccordement au réseau IP : 
							<input name="rac_ip" type="text" <?php if(isset($_POST["rac_ip"])) {echo "value='".$_POST["rac_ip"]."'";} else if(isset($_SESSION["rac_ip"])) {echo "value='".$_SESSION["rac_ip"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Coût de logistique et de suivi</div>
							Coût d'acquisition des locaux et du mobilier :
							<input name="loc_mob" type="text" <?php if(isset($_POST["loc_mob"])) {echo "value='".$_POST["loc_mob"]."'";} else if(isset($_SESSION["loc_mob"])) {echo "value='".$_SESSION["loc_mob"]."'";} ?> />
							Frais de suivi de projet :
							<input name="suiv_proj" type="text" <?php if(isset($_POST["suiv_proj"])) {echo "value='".$_POST["suiv_proj"]."'";} else if(isset($_SESSION["suiv_proj"])) {echo "value='".$_SESSION["suiv_proj"]."'";} ?> />
						</fieldset>
						<?php /*print_r (count($_POST));$list = array_keys($_POST);foreach($list as $key){ mysqli_query($connexionBD,"ALTER TABLE `projet` ADD `$key` VARCHAR(63) NOT NULL");
						 echo"\$_SESSION['$key'] = \$_POST['$key'];<br/>"; }*/
						if(isset($message))echo $message; ?>
						<br/>
						<input type="submit" name="capex" value="Valider" />
						<input type="submit" name="defaut_capex" value="Valeurs Par défaut"/>
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