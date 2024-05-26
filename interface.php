<?php include_once("includes/config.php"); ?>
<?php include_once("includes/textes.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<?php include_once("includes/gestion_projet.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
 <head>
 <meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
 <title><?php echo $interface_menu?></title>
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
 <h1><?php if((!isset($message)||empty($message))&&isset($_POST['interface'])&&!empty($_POST['interface'])&&isset($_SESSION['interface_x1_s2'])&&!empty($_SESSION['interface_x1_s2'])){
					 echo $resultat_interface_menu;
				 } else {echo $interface_menu;}?></h1>
				 <?php if(!isset($_SESSION["projet"]) || empty($_SESSION["projet"])) {
					 echo "<p>$erreurAucunProjetSelectionne</p>";
				 } else if((!isset($message)||empty($message))&&isset($_POST['interface'])&&!empty($_POST['interface'])&&isset($_SESSION['interface_x1_s2'])&&!empty($_SESSION['interface_x1_s2'])){?>
					 <p><fieldset>
						<legend><?php 
						$projet=$_SESSION["projet"];
						$resultat = mysqli_query($connexionBD,"SELECT * FROM `projet` WHERE id=$projet");
						$row = mysqli_fetch_array($resultat);
						echo $row[1]?></legend>
						<br/>
						<fieldset>
							<div class="mini-title">Étape 1</div>
							<b>Heure d'occupation :</b> <?php echo $_SESSION['heure_occ']; ?> Kbps<br/>
							<b>Taux de trafic de données UL et DL :</b> <?php echo $_SESSION['trafic_UL_DL']; ?><br/>
							<b>Taux de trafic moyen : </b> <?php echo $_SESSION['trafic_moy']; ?><br/>
							<b>Nombre d'abonné par eNodeB :</b> <?php echo $_SESSION['abon_par_eNodeB']; ?><br/>
							<b>Trafic Radio UL (%) :</b> <?php echo $_SESSION['T_R_UL']; ?> %<br/>
							<b>Trafic Radio DL (%) :</b> <?php echo $_SESSION['T_R_DL']; ?> %<br/>
							<b>ER :</b> <?php echo $_SESSION['ER']; ?><br/>
						</fieldset>
						<fieldset><div class="mini-title">Étape 2</div>
							<b>BH_Data_Trafic_subs_UL :</b> <?php echo $_SESSION['BH_Data_Trafic_subs_UL']; ?><br/>
							<b>BH_Data_Trafic_subs_DL :</b> <?php echo $_SESSION['BH_Data_Trafic_subs_DL']; ?><br/>
							<b>Data_Trafic_Throughput_UL :</b> <?php echo $_SESSION['Data_Trafic_Throughput_subs_UL']; ?><br/>
							<b>Data_Trafic_Throughput_DL :</b> <?php echo $_SESSION['Data_Trafic_Throughput_subs_DL']; ?><br/>
							<b>T_UL_Data_trafic_subs :</b> <?php echo $_SESSION['T_UL_Data_trafic_subs']; ?><br/>
							<b>T_DL_Data_trafic_subs :</b> <?php echo $_SESSION['T_DL_Data_trafic_subs']; ?><br/>
							<b>T_UL_user_plane_subs :</b> <?php echo $_SESSION['T_UL_user_plane_subs']; ?> Kpbs<br/>
							<b>T_DL_user_plane_subs :</b> <?php echo $_SESSION['T_DL_user_plane_subs']; ?> Kpbs<br/>
							<div class="resultat-final"><b>T_Total_user_plane_subs_sites :</b> <?php echo $_SESSION['T_Total_user_plane_subs']; ?> Mbps<br/>
						</fieldset>
						<fieldset class="resultat"><div class="mini-title">Résultat interface</div>
							<div class="resultat-final"><b>Plan de control :</b> <?php echo $_SESSION["plan_control"];?> Mbps<br/></div>
							<div class="resultat-final"><b>Largeur de bande de l'interface S1 :</b> <?php echo $_SESSION["S1_bandW"];?> Mbps<br/></div>
							<div class="resultat-final"><b>Largeur de bande de l'interface X2 :</b> <?php echo $_SESSION["X2_bandW"];?> Mbps<br/></div>
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
							<div class="mini-title">Étape 1</div>
							Heure d'occupation (Kbps) :
							<input name="heure_occ" type="text" <?php if(isset($_POST["heure_occ"])) {echo "value='".$_POST["heure_occ"]."'";} else if(isset($_SESSION["heure_occ"])) {echo "value='".$_SESSION["heure_occ"]."'";} ?> />
							Taux de trafic de données UL et DL :
							<input name="trafic_UL_DL" type="text" <?php if(isset($_POST["trafic_UL_DL"])) {echo "value='".$_POST["trafic_UL_DL"]."'";} else if(isset($_SESSION["trafic_UL_DL"])) {echo "value='".$_SESSION["trafic_UL_DL"]."'";} ?> />
							Taux de trafic moyen : 
							<input name="trafic_moy" type="text" <?php if(isset($_POST["trafic_moy"])) {echo "value='".$_POST["trafic_moy"]."'";} else if(isset($_SESSION["trafic_moy"])) {echo "value='".$_SESSION["trafic_moy"]."'";} ?> />
							Nombre d'abonné par eNodeB :
							<input name="abon_par_eNodeB" type="text" <?php if(isset($_POST["abon_par_eNodeB"])) {echo "value='".$_POST["abon_par_eNodeB"]."'";} else if(isset($_SESSION["abon_par_eNodeB"])) {echo "value='".$_SESSION["abon_par_eNodeB"]."'";} ?> />
							Trafic Radio UL (%) :
							<input name="T_R_UL" type="text" <?php if(isset($_POST["T_R_UL"])) {echo "value='".$_POST["T_R_UL"]."'";} else if(isset($_SESSION["T_R_UL"])) {echo "value='".$_SESSION["T_R_UL"]."'";} ?> />
							Trafic Radio DL (%) :
							<input name="T_R_DL" type="text" <?php if(isset($_POST["T_R_DL"])) {echo "value='".$_POST["T_R_DL"]."'";} else if(isset($_SESSION["T_R_DL"])) {echo "value='".$_SESSION["T_R_DL"]."'";} ?> />
							ER : 
							<input name="ER" type="text" <?php if(isset($_POST["ER"])) {echo "value='".$_POST["ER"]."'";} else if(isset($_SESSION["ER"])) {echo "value='".$_SESSION["ER"]."'";} ?> />
						</fieldset>
						<?php /*print_r (count($_POST));$list = array_keys($_POST);foreach($list as $key){ mysqli_query($connexionBD,"ALTER TABLE `projet` ADD `$key` VARCHAR(63) NOT NULL");
						 echo"\$_SESSION['$key'] = \$_POST['$key'];<br/>"; }*/
						if(isset($message))echo $message; ?>
						<br/>
						<input type="submit" name="interface" value="Valider" />
						<input type="submit" name="defaut_interface" value="Valeurs Par défaut"/>
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