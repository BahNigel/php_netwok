<?php include_once("includes/config.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<?php include_once("includes/gestion_projet.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
 <head>
 <meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
 <title><?php echo $opex_menu?></title>
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
 <h1><?php if((!isset($message)||empty($message))&&isset($_POST['opex'])&&!empty($_POST['opex'])&&isset($_SESSION['opex'])&&!empty($_SESSION['opex'])){
					 echo $resultat_opex_menu;
				 } else {echo $opex_menu;}?></h1>
				 <?php if(!isset($_SESSION["projet"]) || empty($_SESSION["projet"])) {
					 echo "<p>$erreurAucunProjetSelectionne</p>";
				 } else if(!isset($_SESSION["capex"]) || empty($_SESSION["capex"])) {
					 echo "<p>$erreurPlanificationCapex</p>";
				 } else if((!isset($message)||empty($message))&&isset($_POST['opex'])&&!empty($_POST['opex'])&&isset($_SESSION['opex'])&&!empty($_SESSION['opex'])){?>
					 <p><fieldset>
						<legend><?php 
						$projet=$_SESSION["projet"];
						$resultat = mysqli_query($connexionBD,"SELECT * FROM `projet` WHERE id=$projet");
						$row = mysqli_fetch_array($resultat);
						echo $row[1]?></legend>
						<br/>
						<fieldset>
						<div class="mini-title">Données</div>
							<b>Nombre d'habitants :</b> <?php echo $_SESSION['densite_zone']*$_SESSION['surface_zone']; ?> Hbts<br/>
							<b>Pourcentage d'abonnés :</b> 65 %<br/>
						</fieldset>
						<fieldset class="resultat"><div class="mini-title">Résultat opex</div>
						<table id="myTable">
						  <tr>
							<th><a href ="#">ANNÉE</a></th>
							<th><a href ="#">OPEX (F. CFA)</a></th>
							<th><a href ="#">RECETTES (F. CFA)</a></th>
							<th><a href ="#">BÉNÉFICES (F. CFA)</a></th>
						  </tr>
						  <tr><td>I</td><td><?php echo $_SESSION['opex1']; ?></td><td><?php echo $_SESSION['rcet1']; ?></td><td><?php echo $_SESSION['bene1']; ?></td></tr>
						  <tr><td>II</td><td><?php echo $_SESSION['opex2']; ?></td><td><?php echo $_SESSION['rcet2']; ?></td><td><?php echo $_SESSION['bene2']; ?></td></tr>
						  <tr><td>III</td><td><?php echo $_SESSION['opex3']; ?></td><td><?php echo $_SESSION['rcet3']; ?></td><td><?php echo $_SESSION['bene3']; ?></td></tr>
						  <tr><td>IV</td><td><?php echo $_SESSION['opex4']; ?></td><td><?php echo $_SESSION['rcet4']; ?></td><td><?php echo $_SESSION['bene4']; ?></td></tr>
						  <tr><td>V</td><td><?php echo $_SESSION['opex5']; ?></td><td><?php echo $_SESSION['rcet5']; ?></td><td><?php echo $_SESSION['bene5']; ?></td></tr>
						  </table>
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
							<b>Nombre d'habitants :</b> <?php echo $_SESSION['densite_zone']*$_SESSION['surface_zone']; ?> Hbts<br/>
							<b>Pourcentage d'abonnés :</b> 65 %<br/>
						</fieldset>
						<fieldset>
							<div class="mini-title">Paramètres de l'OPEX</div>
							<div class="mini-title2">Frais Généraux & Commerciaux</div>
							Dépense Annuelle en Marketing :
							<input name="Editbox3" type="text" <?php if(isset($_POST["Editbox3"])) {echo "value='".$_POST["Editbox3"]."'";} else if(isset($_SESSION["Editbox3"])) {echo "value='".$_SESSION["Editbox3"]."'";} ?> />
							Coût Annuel de l'interconnexion Web :
							<input name="Editbox4" type="text" <?php if(isset($_POST["Editbox4"])) {echo "value='".$_POST["Editbox4"]."'";} else if(isset($_SESSION["Editbox4"])) {echo "value='".$_SESSION["Editbox4"]."'";} ?> />
							Frais Généraux et Administration Annuels : 
							<input name="Editbox5" type="text" <?php if(isset($_POST["Editbox5"])) {echo "value='".$_POST["Editbox5"]."'";} else if(isset($_SESSION["Editbox5"])) {echo "value='".$_SESSION["Editbox5"]."'";} ?> />
							Coût Annuel de l'Assurance :
							<input name="Editbox17" type="text" <?php if(isset($_POST["Editbox17"])) {echo "value='".$_POST["Editbox17"]."'";} else if(isset($_SESSION["Editbox17"])) {echo "value='".$_SESSION["Editbox17"]."'";} ?> />
							<div class="mini-title2">Fonction du Réseau</div>
							Location Annuelle des Sites Radio :
							<input name="Editbox18" type="text" <?php if(isset($_POST["Editbox18"])) {echo "value='".$_POST["Editbox18"]."'";} else if(isset($_SESSION["Editbox18"])) {echo "value='".$_SESSION["Editbox18"]."'";} ?> />
							Location Annuelle des Fréquences :
							<input name="Editbox19" type="text" <?php if(isset($_POST["Editbox19"])) {echo "value='".$_POST["Editbox19"]."'";} else if(isset($_SESSION["Editbox19"])) {echo "value='".$_SESSION["Editbox19"]."'";} ?> />
							Energie Electrique Annuelle : 
							<input name="Editbox20" type="text" <?php if(isset($_POST["Editbox20"])) {echo "value='".$_POST["Editbox20"]."'";} else if(isset($_SESSION["Editbox20"])) {echo "value='".$_SESSION["Editbox20"]."'";} ?> />
							Location Annuelle des Infrastructures (Fibre Optique, Câbles Coaxiaux) :
							<input name="Editbox21" type="text" <?php if(isset($_POST["Editbox21"])) {echo "value='".$_POST["Editbox21"]."'";} else if(isset($_SESSION["Editbox21"])) {echo "value='".$_SESSION["Editbox21"]."'";} ?> />
							Coût Annuel de Formation du Personnel Exploitant :
							<input name="Editbox22" type="text" <?php if(isset($_POST["Editbox22"])) {echo "value='".$_POST["Editbox22"]."'";} else if(isset($_SESSION["Editbox22"])) {echo "value='".$_SESSION["Editbox22"]."'";} ?> />
							Coût Annuel de la Maintenance et du Suivi du Réseau :
							<input name="Editbox23" type="text" <?php if(isset($_POST["Editbox23"])) {echo "value='".$_POST["Editbox23"]."'";} else if(isset($_SESSION["Editbox23"])) {echo "value='".$_SESSION["Editbox23"]."'";} ?> />
							<div class="mini-title2">Fonction des Abonnés</div>
							Frais Annuels de Facturation des Abonnés :
							<input name="Editbox24" type="text" <?php if(isset($_POST["Editbox24"])) {echo "value='".$_POST["Editbox24"]."'";} else if(isset($_SESSION["Editbox24"])) {echo "value='".$_SESSION["Editbox24"]."'";} ?> />
							Taux d'imposition Marginales sur le Bénéfice :
							<input name="Editbox25" type="text" <?php if(isset($_POST["Editbox25"])) {echo "value='".$_POST["Editbox25"]."'";} else if(isset($_SESSION["Editbox25"])) {echo "value='".$_SESSION["Editbox25"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Prévision des Recettes</div>
							Taux de Croissance Annuelle des Abonnés :
							<input name="Editbox6" type="text" <?php if(isset($_POST["Editbox6"])) {echo "value='".$_POST["Editbox6"]."'";} else if(isset($_SESSION["Editbox6"])) {echo "value='".$_SESSION["Editbox6"]."'";} ?> />
							Revenu par Abonné (<?php echo $_SESSION['pourcentage_msg'];?> %) pour le service messagerie :
							<input name="rev_msg" type="text" <?php if(isset($_POST["rev_msg"])) {echo "value='".$_POST["rev_msg"]."'";} else if(isset($_SESSION["rev_msg"])) {echo "value='".$_SESSION["rev_msg"]."'";} ?> />
							Revenu par Abonné (<?php echo $_SESSION['pourcentage_inf'];?> %) pour le service Informations Payantes :
							<input name="rev_inf" type="text" <?php if(isset($_POST["rev_inf"])) {echo "value='".$_POST["rev_inf"]."'";} else if(isset($_SESSION["rev_inf"])) {echo "value='".$_SESSION["rev_inf"]."'";} ?> />
							Revenu par Abonné (<?php echo $_SESSION['pourcentage_jeu'];?> %) pour le service jeux :
							<input name="rev_jeu" type="text" <?php if(isset($_POST["rev_jeu"])) {echo "value='".$_POST["rev_jeu"]."'";} else if(isset($_SESSION["rev_jeu"])) {echo "value='".$_SESSION["rev_jeu"]."'";} ?> />
							Revenu par Abonné (<?php echo $_SESSION['pourcentage_mc'];?> %) pour le service Informations M-Commerce :
							<input name="rev_mc" type="text" <?php if(isset($_POST["rev_mc"])) {echo "value='".$_POST["rev_mc"]."'";} else if(isset($_SESSION["rev_mc"])) {echo "value='".$_SESSION["rev_mc"]."'";} ?> />
							Revenu par Abonné (<?php echo $_SESSION['pourcentage_sic'];?> %) pour le service Musique :
							<input name="rev_sic" type="text" <?php if(isset($_POST["rev_sic"])) {echo "value='".$_POST["rev_sic"]."'";} else if(isset($_SESSION["rev_sic"])) {echo "value='".$_SESSION["rev_sic"]."'";} ?> />
							Revenu par Abonné (<?php echo $_SESSION['pourcentage_nav'];?> %) pour le service Navigation :
							<input name="rev_nav" type="text" <?php if(isset($_POST["rev_nav"])) {echo "value='".$_POST["rev_nav"]."'";} else if(isset($_SESSION["rev_nav"])) {echo "value='".$_SESSION["rev_nav"]."'";} ?> />
							Revenu par Abonné (<?php echo $_SESSION['pourcentage_per'];?> %) pour le service Personnalisation :
							<input name="rev_per" type="text" <?php if(isset($_POST["rev_per"])) {echo "value='".$_POST["rev_per"]."'";} else if(isset($_SESSION["rev_per"])) {echo "value='".$_SESSION["rev_per"]."'";} ?> />
							Revenu par Abonné (<?php echo $_SESSION['pourcentage_rd'];?> %) pour le service Réseau de données :
							<input name="rev_rd" type="text" <?php if(isset($_POST["rev_rd"])) {echo "value='".$_POST["rev_rd"]."'";} else if(isset($_SESSION["rev_rd"])) {echo "value='".$_SESSION["rev_rd"]."'";} ?> />
							Revenu par Abonné (<?php echo $_SESSION['pourcentage_tv'];?> %) pour le service Tv/Vidéo :
							<input name="rev_tvv" type="text" <?php if(isset($_POST["rev_tvv"])) {echo "value='".$_POST["rev_tvv"]."'";} else if(isset($_SESSION["rev_tvv"])) {echo "value='".$_SESSION["rev_tvv"]."'";} ?> />
							Revenu par Abonné (<?php echo $_SESSION['pourcentage_voix'];?> %) pour le service Voix :
							<input name="rev_voix" type="text" <?php if(isset($_POST["rev_voix"])) {echo "value='".$_POST["rev_voix"]."'";} else if(isset($_SESSION["rev_voix"])) {echo "value='".$_SESSION["rev_voix"]."'";} ?> />
							Revenu par Abonné (<?php echo $_SESSION['pourcentage_msj'];?> %) pour le service Messagerie Jointe :
							<input name="rev_msj" type="text" <?php if(isset($_POST["rev_msj"])) {echo "value='".$_POST["rev_msj"]."'";} else if(isset($_SESSION["rev_msj"])) {echo "value='".$_SESSION["rev_msj"]."'";} ?> />
						</fieldset>
						<?php /*print_r (count($_POST));$list = array_keys($_POST);foreach($list as $key){ mysqli_query($connexionBD,"ALTER TABLE `projet` ADD `$key` VARCHAR(63) NOT NULL");
						 echo"\$_SESSION['$key'] = \$_POST['$key'];<br/>"; }*/
						if(isset($message))echo $message; ?>
						<br/>
						<input type="submit" name="opex" value="Valider" />
						<input type="submit" name="defaut_opex" value="Valeurs Par défaut"/>
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