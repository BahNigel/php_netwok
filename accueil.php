<?php include_once("includes/config.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
      <title><?php echo $accueil_menu?></title>
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/responsee.css"> 
      <link href='css/font.css' rel='stylesheet' type='text/css'>
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
                  <h1><?php echo $accueil_menu?></h1>
				  <?php $id = $_SESSION['id']; include('includes/lecture_utilisateur.php');?>
				  <img src="<?php if(empty($photo)) echo "images/noimage.jpg"; else echo $photo;?>">
				  <br>
                  <p><?php echo $bienvenu."<b>".$nom." !</b>"?></p>
                  <p><b>Supervised by Professor Emmanuel TONYE</b> and <b>Engineer Rholy NKUH</b></p>
                  <h2><?php echo $objectif?></h2>
                  <p><?php echo $objectif_description?></p>
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