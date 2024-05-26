<?php include_once("includes/config.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<?php
if (isset($_POST['language'])) {
  $_SESSION['lang'] = $_POST['language'];
}
?>
<?php
$message = "";
if (isset($_POST['username']) && isset($_POST['password'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  if (empty($user)) {
    $message = $username_vide;
  } else if (empty($pass)) {
    $message = $password_vide;
  } else {
    $result = mysqli_query($connexionBD, "SELECT * FROM administrateur WHERE username = '$user' AND password = '$pass'");
    if ($row = mysqli_fetch_array($result)) {
      $message = $connexion_reussie;
      $_SESSION['id'] = $row[0];
      header("Location: accueil.php");
      exit;
    } else {
      $result = mysqli_query($connexionBD, "SELECT * FROM administrateur WHERE username = '$user'");
      $message = "Password or Username incorrect";
    }
  }
}
?>
<!doctype html>
<html>

<head>
  <meta http-equiv="Content-Type" content="txt/html; charset=utf-8" />
  <title id="titre">
    <?php echo $connexion_text; ?>

  </title>
  <link rel="stylesheet" href="css/style1.css">
  <style>
    <?php include_once("includes/style.css"); ?>
  </style>
  <link rel="shortcut icon" href="favicon.ico" type="image/ico" />

  <script>
    window.console = window.console || function(t) {};
  </script>

  <script src="js/onglets.js"></script>


  <script>
    if (document.location.search.match(/type=embed/gi)) {
      window.parent.postMessage("resize", "*");
    }
  </script>


</head>

<body style="background-color:white;">

  <div style="display:flex; margin:25px auto;justify-content: center;align-items: center;">
    <div>
      <div style="width: 390px; height: 420px;box-shadow: 0px 6px 10px #aaa/*#2075aa*/;border-radius:10px">
        <div>
        <img src="images/photos/ICTU_logo_copy.jpeg" alt="logo" style="margin: 70px 110px;">
        </div>
      </div>
    </div>
    <div class="flat-form">
      <div style="display:flex;justify-content:center; margin:15px 0;">
      <h2>LTE-FP:</h2>
      <h3 style="margin-left: 10px;">LTE-Fronthaul Planner</h3>
      </div>
    <ul class="tabs">
      <li>
        <!-- <img src="images/nexttel-min.png" alt="logo"> -->
      </li>
      <li>
        <a rel="nofollow" href="#login" class="active"><?php echo $connexion; ?></a>
      </li>
      <li>
        <a rel="nofollow" rel="noreferrer" href="#register"><?php echo $inscription; ?></a>
      </li>
    </ul>
    <div id="login" class="form-action show">
      <h1><?php echo $authentifiez_vous; ?></h1>
      <p><?php echo $app_name_description; ?></p>
      <form method='POST'>
        <ul>
          <li>
            <input type="text" name="username" placeholder="<?php echo $username_employe_text; ?>" value="<?php echo 'admin'; ?>" required>
          </li>
          <li>
            <input type="password" name="password" placeholder="<?php echo $password_employe_text; ?>" value="<?php echo "admin" ?>" required>
          </li>
        </ul>
        <input type="submit" value="<?php echo $connexion_button_text; ?>" class="button" />
      </form>
      <div style="margin-top: 23px;">
        <form action="" method="POST" id="selectForm">
          <div style="display:flex;">
            <label for="language"><?php echo $language; ?></label>
            <select name="language" id="langSelect">
              <option selected><?php echo $_SESSION['lang'] ?></option>
              <option><?php echo $_SESSION['lang'] == 'EN' ? 'FR' : 'EN' ?></option>
            </select>
          </div>
        </form>
      </div>
      <div>
        <?php echo $message; ?>
      </div>

    </div>
    <div id="register" class="form-action hide">
      <h1><?php echo $inscrivez_vous; ?></h1>
      <p><?php echo $inscrivez_vous_description; ?></p>
    </div>
  </div>
  </div>
  <script>
    var selectForm = document.getElementById('selectForm');
    console.log(selectForm);
    var langSelect = document.getElementById('langSelect');
    // console.log(langSelect);
    function submitForm(selecForm) {
      console.log(selectForm);
      // selectForm.submit();
    };
    langSelect.addEventListener('change', (e) => {
      console.log(selectForm);
      selectForm.submit();
    });
  </script>
  <script src="js/stopExecutionOnTimeout.js"></script>
  <script src='js/jquery.js'></script>

  <script>
    $('.tabs').on('click', 'li a', function(e) {
      e.preventDefault();
      var $tab = $(this),
        href = $tab.attr('href');


      $('.active').removeClass('active');
      $tab.addClass('active');

      $('.show')
        .removeClass('show')
        .addClass('hide')
        .hide();

      $(href)
        .removeClass('hide')
        .addClass('show')
        .hide()
        .fadeIn(550);

      var link = document.getElementsByTagName('a');
      for (var i = 0; i < link.length; i++) {
        if (link[i].href.replace(/^.*\#/, "#") === href) {
          var val = document.getElementById('titre');
          val.innerHTML = link[i].innerHTML;
        }
      }
    });
    //# sourceURL=pen.js
  </script>
</body>
<html>
<?php include_once("includes/fermeture_flux_sql.php"); ?>