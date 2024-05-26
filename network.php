<?php include_once("includes/config.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<?php include_once("includes/gestion_projet.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
 <head>
 <meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
 <title><?php echo $network_menu?></title>
 <link rel="stylesheet" href="css/components.css">
 <link rel="stylesheet" href="css/icons.css">
 <link rel="stylesheet" href="css/responsee.css"> 
 <link href='css/font.css' rel='stylesheet' type='text/css'>
 <link href='includes/style_sup.css' rel='stylesheet' type='text/css'>
 <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
 <script type="text/javascript" src="js/jquery-ui.min.js"></script> 
 </head>
 <body class="size-1140">
 <script type="text/javascript">
 function calcul_attenuation() {
	 var fenetre_optique=document.getElementById("fenetre_optique");
	 var type_fibre=document.getElementById("type_fibre");
	 var attenuation_lineaire=document.getElementById("attenuation_lineaire");
	 var attenuation_connecteur_optique=document.getElementById("attenuation_connecteur_optique");
	 if(type_fibre.value===''||fenetre_optique.value==='') {
			 attenuation_lineaire.value = '';
	 }
	 if(fenetre_optique.value==='1550') {
		 attenuation_connecteur_optique.value = '0.35';
	 } else if(fenetre_optique.value==='1310') {
		 attenuation_connecteur_optique.value = '0.6';
	 }else if(fenetre_optique.value==='850') {
		 attenuation_connecteur_optique.value = '1';
	 } else {
		 attenuation_connecteur_optique.value = '';
	 }
	 if(type_fibre.value==='monomode') {
		 if(fenetre_optique.value==='850') {
			 attenuation_lineaire.value = '2';
		 } else if(fenetre_optique.value==='1310') {
			 attenuation_lineaire.value = '0.4';
		 } else if(fenetre_optique.value==='1550') {
			 attenuation_lineaire.value = '0.2';
		 }
	 }
	 if(type_fibre.value==='multimode') {
		 if(fenetre_optique.value==='850') {
			 attenuation_lineaire.value = '4';
		 } else if(fenetre_optique.value==='1310') {
			 attenuation_lineaire.value = '1';
		 } else if(fenetre_optique.value==='1550') {
			 attenuation_lineaire.value = '';
		 }
	 }
 }
 function calcul_canal() {
	 var type_topo=document.getElementById("type_topo");
	 var nombre_canaux=document.getElementById("nombre_canaux");
	 if(type_topo.value==='p2p') {
		 nombre_canaux.disabled=true;
		 nombre_canaux.value=3;
	 } else {
		 nombre_canaux.disabled=false;
	 }
 }
 </script> 
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
 <h1><?php if((!isset($message)||empty($message))&&isset($_POST['bbu1'])&&!empty($_POST['bbu1'])&&isset($_SESSION['bbu1'])&&!empty($_SESSION['bbu1'])){
					 echo $resultat_network_menu;
				 } else {echo $network_menu;}?></h1>
				 <?php if(!isset($_SESSION["projet"]) || empty($_SESSION["projet"])) {
					 echo "<p>$erreurAucunProjetSelectionne</p>";
				 } else if((!isset($message)||empty($message))&&isset($_POST['bbu1'])&&!empty($_POST['bbu1'])&&isset($_SESSION['bbu1'])&&!empty($_SESSION['bbu1'])){?>
					 <p><fieldset>
						<legend><?php 
						$projet=$_SESSION["projet"];
						$resultat = mysqli_query($connexionBD,"SELECT * FROM `projet` WHERE id=$projet");
						$row = mysqli_fetch_array($resultat);
						echo $row[1]?></legend>
						<br/><fieldset>
						<div class="mini-title">Données</div>
							<b>Nombre de site :</b> <?php echo $_SESSION['nombre_enodeb']; ?> sites<br/>
							<b>Débit de la cellule en DownLink :</b> <?php echo $_SESSION['debit_dl']; ?> Mbps<br/>
						</fieldset>
						<fieldset>
							<div class="mini-title">Choix de la Topologie</div>
							<b>Type de topologie :</b> <?php echo $_SESSION['type_topo']; ?><br/>
						</fieldset>
						<fieldset>
							<div class="mini-title">Choix des caractéristiques des équipements WDM</div>
							<b>Nombre de canaux :</b> <?php echo $_SESSION['nombre_canaux']; ?><br/>
							<b>Sensibilité du récepteur :</b> <?php echo $_SESSION['sensibilite_recepteur']; ?> dBm<br/>
							<b>Fénêtre optique :</b> <?php echo $_SESSION['fenetre_optique']; ?> nm<br/>
							<b>Puissance d'émission :</b> <?php echo $_SESSION['puissance_emission']; ?> dBm<br/>
						</fieldset>
						<fieldset>
							<div class="mini-title">Choix du support et connectiques</div>
							<b>Type de fibre :</b> <?php echo $_SESSION['type_fibre']; ?><br/>
							<b>Atténuation linéaire :</b> <?php echo $_SESSION['attenuation_lineaire']; ?> db/Km<br/>
							<b>Atténuation des connecteurs optiques (dB/Km) :</b> <?php echo $_SESSION['attenuation_connecteur_optique']; ?> db/Km<br/>
							<b>Connecteurs optiques :</b> <?php echo $_SESSION['connecteurs_optiques']; ?><br/>
							<b>Distance de transport :</b> <?php echo $_SESSION['distance_transport']; ?> Km<br/>
						</fieldset>
						<fieldset class="resultat"><div class="mini-title">Résultat fronthaul network</div>
							<div class="resultat-final"><b>Atténuation totale :</b> <?php echo $_SESSION["attenuation_totale"];?> dB<br/></div>
							<div class="resultat-final"><b>Nombre d'équipements :</b> <?php echo $_SESSION["nombre_equipements"];?> équipements<br/></div>
							<div class="resultat-final"><b>Capacité de chaque équipement :</b> <?php echo $_SESSION["capacite_equipements"];?> Mbps<br/></div>
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
							<b>Nombre de site :</b> <?php echo $_SESSION['nombre_enodeb']; ?> sites<br/>
							<b>Débit de la cellule en DownLink :</b> <?php echo $_SESSION['debit_dl']; ?> Mbps<br/>
						</fieldset>
						<fieldset>
							<div class="mini-title">Choix de la Topologie</div>
							Type de topologie :
								<select name="type_topo" onchange='calcul_canal()' id='type_topo'>
									<option value=""></option>
									<option value="p2p"<?php if(isset($_POST["type_topo"])) {if($_POST["type_topo"]=='p2p')echo " selected";} else if(isset($_SESSION["type_topo"])) {if($_SESSION["type_topo"]=='p2p')echo " selected";} ?>>Point to point</option>
									<option value="anneau"<?php if(isset($_POST["type_topo"])) {if($_POST["type_topo"]=='anneau')echo " selected";} else if(isset($_SESSION["type_topo"])) {if($_SESSION["type_topo"]=='anneau')echo " selected";} ?>>Anneau</option>
								</select>
						</fieldset>
						<fieldset>
							<div class="mini-title">Choix des caractéristiques des équipements WDM</div>
							Nombre de canaux :
							<select name="nombre_canaux" id='nombre_canaux'<?php if(isset($_POST["type_topo"])) {if($_POST["type_topo"]=='p2p')echo " disabled='disabled'";} else if(isset($_SESSION["type_topo"])) {if($_SESSION["type_topo"]=='p2p')echo " disabled='disabled'";} ?>>
									<option value=""></option>
									<option value="3"<?php if(isset($_POST["nombre_canaux"])) {if($_POST["nombre_canaux"]=='3')echo " selected";} else if(isset($_SESSION["nombre_canaux"])) {if($_SESSION["nombre_canaux"]=='3')echo " selected";} ?>>3</option>
									<option value="9"<?php if(isset($_POST["nombre_canaux"])) {if($_POST["nombre_canaux"]=='9')echo " selected";} else if(isset($_SESSION["nombre_canaux"])) {if($_SESSION["nombre_canaux"]=='9')echo " selected";} ?>>9</option>
									<option value="18"<?php if(isset($_POST["nombre_canaux"])) {if($_POST["nombre_canaux"]=='18')echo " selected";} else if(isset($_SESSION["nombre_canaux"])) {if($_SESSION["nombre_canaux"]=='18')echo " selected";} ?>>18</option>
									<option value="45"<?php if(isset($_POST["nombre_canaux"])) {if($_POST["nombre_canaux"]=='45')echo " selected";} else if(isset($_SESSION["nombre_canaux"])) {if($_SESSION["nombre_canaux"]=='45')echo " selected";} ?>>45</option>
								</select>
							Sensibilité du récepteur (dBm) :
							<input name="sensibilite_recepteur" type="text" <?php if(isset($_POST["sensibilite_recepteur"])) {echo "value='".$_POST["sensibilite_recepteur"]."'";} else if(isset($_SESSION["sensibilite_recepteur"])) {echo "value='".$_SESSION["sensibilite_recepteur"]."'";} ?> />
							Fénêtre optique (nm) :
								<select name="fenetre_optique" onchange='calcul_attenuation()' id='fenetre_optique'>
									<option value=""></option>
									<option value="850"<?php if(isset($_POST["fenetre_optique"])) {if($_POST["fenetre_optique"]=='850')echo " selected";} else if(isset($_SESSION["fenetre_optique"])) {if($_SESSION["fenetre_optique"]=='850')echo " selected";} ?>>850</option>
									<option value="1310"<?php if(isset($_POST["fenetre_optique"])) {if($_POST["fenetre_optique"]=='1310')echo " selected";} else if(isset($_SESSION["fenetre_optique"])) {if($_SESSION["fenetre_optique"]=='1310')echo " selected";} ?>>1310</option>
									<option value="1550"<?php if(isset($_POST["fenetre_optique"])) {if($_POST["fenetre_optique"]=='1550')echo " selected";} else if(isset($_SESSION["fenetre_optique"])) {if($_SESSION["fenetre_optique"]=='1550')echo " selected";} ?>>1550</option>
								</select>
							Puissance d'émission (dBm) :
							<input name="puissance_emission" type="text" <?php if(isset($_POST["puissance_emission"])) {echo "value='".$_POST["puissance_emission"]."'";} else if(isset($_SESSION["puissance_emission"])) {echo "value='".$_SESSION["puissance_emission"]."'";} ?> />
						</fieldset>
						<fieldset>
							<div class="mini-title">Choix du support et connectiques</div>
							Type de fibre :
								<select name="type_fibre" onchange='calcul_attenuation()' id='type_fibre'>
									<option value=""></option>
									<option value="multimode"<?php if(isset($_POST["type_fibre"])) {if($_POST["type_fibre"]=='multimode')echo " selected";} else if(isset($_SESSION["type_fibre"])) {if($_SESSION["type_fibre"]=='multimode')echo " selected";} ?>>Multimode</option>
									<option value="monomode"<?php if(isset($_POST["type_fibre"])) {if($_POST["type_fibre"]=='monomode')echo " selected";} else if(isset($_SESSION["type_fibre"])) {if($_SESSION["type_fibre"]=='monomode')echo " selected";} ?>>Monomode</option>
								</select>
							Atténuation linéaire (dB/Km) :
								<input name="attenuation_lineaire" readonly='readonly' id='attenuation_lineaire' type="text" <?php if(isset($_POST["attenuation_lineaire"])) {echo "value='".$_POST["attenuation_lineaire"]."'";} else if(isset($_SESSION["attenuation_lineaire"])) {echo "value='".$_SESSION["attenuation_lineaire"]."'";} ?> />
							Atténuation des connecteurs optiques (dB/Km) :
								<input name="attenuation_connecteur_optique" readonly='readonly' id='attenuation_connecteur_optique' type="text" <?php if(isset($_POST["attenuation_connecteur_optique"])) {echo "value='".$_POST["attenuation_connecteur_optique"]."'";} else if(isset($_SESSION["attenuation_connecteur_optique"])) {echo "value='".$_SESSION["attenuation_connecteur_optique"]."'";} ?> />
							Connecteurs optiques :
								<select name="connecteurs_optiques">
									<option value=""></option>
									<option value="SC"<?php if(isset($_POST["connecteurs_optiques"])) {if($_POST["connecteurs_optiques"]=='SC')echo " selected";} else if(isset($_SESSION["connecteurs_optiques"])) {if($_SESSION["connecteurs_optiques"]=='SC')echo " selected";} ?>>SC</option>
									<option value="LC"<?php if(isset($_POST["connecteurs_optiques"])) {if($_POST["connecteurs_optiques"]=='LC')echo " selected";} else if(isset($_SESSION["connecteurs_optiques"])) {if($_SESSION["connecteurs_optiques"]=='LC')echo " selected";} ?>>LC</option>
									<option value="FC"<?php if(isset($_POST["connecteurs_optiques"])) {if($_POST["connecteurs_optiques"]=='FC')echo " selected";} else if(isset($_SESSION["connecteurs_optiques"])) {if($_SESSION["connecteurs_optiques"]=='FC')echo " selected";} ?>>FC</option>
								</select>
							Distance de transport (Km) :
								<input name="distance_transport" id='distance_transport' type="text" <?php if(isset($_POST["distance_transport"])) {echo "value='".$_POST["distance_transport"]."'";} else if(isset($_SESSION["distance_transport"])) {echo "value='".$_SESSION["distance_transport"]."'";} ?> />
							
						</fieldset>
						<?php /*print_r (count($_POST));$list = array_keys($_POST);foreach($list as $key){ mysqli_query($connexionBD,"ALTER TABLE `projet` ADD `$key` VARCHAR(63) NOT NULL");
						 echo"\$_SESSION['$key'] = \$_POST['$key'];<br/>"; }*/
						if(isset($message))echo $message; ?>
						<br/>
						<input type="submit" name="bbu1" value="Valider" />
						<input type="submit" name="defaut_bbu1" value="Valeurs Par défaut"/>
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