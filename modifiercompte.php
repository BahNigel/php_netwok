<?php include_once("includes/config.php"); ?>
<?php include_once("includes/textes.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<?php include_once("includes/gestion_compte.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
      <title><?php echo $modifiercompte_text?></title>
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
                  <h1><?php $id = $_SESSION['id']; include_once('includes/lecture_utilisateur.php');echo $nom?></h1>
                  <form method="post" enctype="multipart/form-data">
					<fieldset>
						<legend><?php echo $veuillez_modifier_le_compte; ?></legend>
						<?php if(isset($message))echo "$message<br/>"; ?>
						<br/>
						<input type="text" name="nom" placeholder="<?php echo $nom_compte; ?>" value="<?php echo $nom; ?>" required>
						<br/><br/>
						<input type = "file" id="fileinput" name="photo" accept="image/x-png,image/gif,image/jpeg,.jpeg,image/bmp">
						<br/>
						<img id="imginput" src="<?php if(empty($photo)) echo "images/noimage.png"; else echo $photo;?>"> 
						<br/>
						<input type="password" name="repassword" placeholder="<?php echo $repassword_compte; ?>" value="<?php echo isset($_POST['repassword'])?$_POST['repassword']:""; ?>">
						<br/><br/>
						<input type="password" name="password" placeholder="<?php echo $password_compte; ?>" value="<?php echo isset($_POST['password'])?$_POST['password']:""; ?>">
						<br/><br/>
						<input type="hidden" name="modifier" value="ok">
						<input type="submit" value="<?php echo $modifier_button_text; ?>">
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
<script type="text/javascript">
function readURL(input) {
  if(input.files && input.files[0]) {
	  var reader = new FileReader();
	  reader.onload = function(e) {
		  $('#imginput').attr('src',e.target.result);
	  }
	  reader.readAsDataURL(input.files[0]);
  }
}
$('#fileinput').change(function(){
  readURL(this);
});
</script>
<?php include_once("includes/fermeture_flux_sql.php"); ?>