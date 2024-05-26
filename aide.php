<?php include_once("includes/config.php"); ?>
<?php include_once("includes/textes.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
      <title><?php echo $aide_menu?></title>
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
                  <h1><?php echo $aide_menu?></h1>
                  <p><ul style = "background:white">
                        <li><a href = '?type=plateforme'><b><?php echo $comment_naviguer;?></b></a></li>
				  </ul></p>
				  <?php if(isset($_GET['type'])&&($_GET['type']=='plateforme'||$_GET['type']=='allocation'||$_GET['type']=='deallocation')) {?>
				  <h2><?php echo $_GET['type']=='plateforme'?$comment_naviguer
				  :'';?></h2>
                  <p>
				  <?php echo $_GET['type']=='plateforme'?$comment_naviguer_description
				  :'';?>
                  </p>
				  <?php }?>
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