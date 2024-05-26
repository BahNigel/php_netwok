<?php
$message="";
 {
	$user = 'admin';
	$pass = 'admin';
	if(empty($user)){
		$message = $username_vide;
	} else if(empty($pass)){
		$message = $password_vide;
	} else {
		$result = mysqli_query($connexionBD,"SELECT * FROM administrateur WHERE username = '$user' AND password = '$pass'");
		if($row = mysqli_fetch_array($result)) {
			$message = $connexion_reussie;
			$_SESSION['id'] = $row[0];
			header("Location: accueil.php");
			exit;
		} else {
			$result = mysqli_query($connexionBD,"SELECT * FROM administrateur WHERE username = '$user'");
			if(mysqli_fetch_array($result)) {
				$message = $mauvais_password;
			} else {
				$message = $username_inexistant;
			}
		}
	}
}