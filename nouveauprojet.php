<?php include_once("includes/config.php"); ?>
<?php include_once("includes/textes.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<?php include_once("includes/gestion_projet.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
      <title><?php echo $nouveau_projet?></title>
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
         <div class="box  margin-bottom">
            <div class="margin">
               <!-- ASIDE NAV 1 -->
			   <?php include_once('includes/navigation.php')?>
               <!-- CONTENT -->
               <section class="s-12 l-6">
                  <h1><?php echo $nouveau_projet?></h1>
				  <form method="post" enctype="multipart/form-data">
					<fieldset>
						<legend><?php echo $veuillez_creer_le_projet; ?></legend>
						<?php /*  if(isset($message))echo "$message<br/>";  */ ?>
						<br/>
						<input type="text" name="nom" placeholder="<?php echo $nom_projet; ?>" value="<?php echo isset($_POST['nom'])?$_POST['nom']:""; ?>" required>
						<br/><br/>
						<input name="creer" type="submit" value="<?php echo $creer_button_text; ?>">
						<br/><br/>
						<?php if(isset($message))echo $message; ?>
					</fieldset>
					</form>
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