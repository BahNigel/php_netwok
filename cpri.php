<?php include_once("includes/config.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<?php include_once("includes/gestion_projet.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
 <head>
 <meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
 <title><?php echo $cpri_menu?></title>
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
 <h1><?php if((!isset($message)||empty($message))&&isset($_POST['cpri'])&&!empty($_POST['cpri'])&&isset($_SESSION['combinePlatform'])&&!empty($_SESSION['combinePlatform'])){
					 echo $resultat_cpri_menu;
				 } else {echo $cpri_menu;}?></h1>
				 <?php if(!isset($_SESSION["projet"]) || empty($_SESSION["projet"])) {
					 echo "<p>$erreurAucunProjetSelectionne</p>";
				 } else if(!isset($_SESSION["capacite"]) || empty($_SESSION["capacite"])) {
					 echo "<p>$erreurPlanificationCapacite</p>";
				 } else if(isset($_POST['cpri'])){?>
					 <p><fieldset>
						<legend><?php 
						$projet=$_SESSION["projet"];
						$resultat = mysqli_query($connexionBD,"SELECT * FROM `projet` WHERE id=$projet");
						$row = mysqli_fetch_array($resultat);
						echo $row[1]?></legend>
						<br/>
						<fieldset>
						<div class="mini-title">Données</div>
							<b>Débit de la cellule en DownLink :</b> <?php echo $_SESSION['debit_dl']; ?> Mbps<br/>
							<b>Bande passante allouée à la cellule :</b> <?php echo $_SESSION['bp_cellule']; ?> Mbps<br/>
							<b>Type de site :</b> Site <?php echo $_SESSION['type_site']; ?><br/>
						</fieldset>
						<fieldset class="resultat"><div class="mini-title">Résultat cpri</div>
							<b>Capacité de l'antenne porteuse (AXC) :</b> <?php echo $_SESSION['c_axc']; ?> Mbps<br/>
							<b>Nombre d'AXC du canal :</b> <?php echo $_SESSION['n_axc']; ?><br/>
							<b>Capacité du lien CPRI par secteur :</b> <?php echo $_SESSION['c_cpri']; ?> Mbps<br/>
							<div class="resultat-final"><b>Capacité du lien FRONTHAUL :</b> <?php echo $_SESSION['c_cpri_site']; ?> Mbps<br/></div>
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
							<b>Débit de la cellule en DownLink :</b> <?php echo $_SESSION['debit_dl']; ?> Mbps<br/>
							<b>Bande passante allouée à la cellule :</b> <?php echo $_SESSION['bp_cellule']; ?> Mbps<br/>
							<b>Type de site :</b> Site <?php echo $_SESSION['type_site']; ?><br/>
						</fieldset>
						<?php /*print_r (count($_POST));$list = array_keys($_POST);foreach($list as $key){ mysqli_query($connexionBD,"ALTER TABLE `projet` ADD `$key` VARCHAR(255) NOT NULL");
						 echo"\$_SESSION['$key'] = \$_POST['$key'];<br/>"; }*/
						if(isset($message))echo $message; ?>
						<br/>
						<input type="submit" name="cpri" value="Valider" />
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