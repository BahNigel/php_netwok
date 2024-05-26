<?php

if(isset($_POST["creer"])&&isset($_POST["nom"])&&isset($_POST["password"])&&isset($_POST["repassword"])&&isset($_POST["username"])&&isset($_POST["categorie"])) {
	$message="";
	$id = $_SESSION['id']; include('includes/lecture_utilisateur.php');
	$nom = $_POST["nom"];
	$username = $_POST["username"];
	$categorie = $_POST["categorie"];
	$password = $_POST["password"];
	$repassword = $_POST["repassword"];
	$photo = "";
	if(!empty($password) && $password!=$repassword) {
		$message = $erreurPasswordDifferents;
	} elseif($niveau <= $categorie) {
		$message = $erreurNiveauInsuffisant;
	} else {
		$resultat = mysqli_query($connexionBD,"SELECT * FROM `administrateur` WHERE username='$username'");
		if($row = mysqli_fetch_array($resultat)) {
			$message = $erreurUserExistant;
		}
	}
	if(empty($message)) {
		if (isset($_FILES['photo']) AND $_FILES['photo']['error'] <= 0) {
			if ($_FILES['photo']['size'] <= 2000000) {
				$infosfichier = pathinfo($_FILES['photo']['name']);
				$extension_upload = strtolower($infosfichier['extension']);
				$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
				if (in_array($extension_upload, $extensions_autorisees))
				{
					$ListeExtension = array(
					'image/jpeg','image/jpeg','image/jpg','image/jp_','application/jpg','image/x-jpg','application/x-jpg','image/pjpeg','image/pipeg','image/vnd.swiftview-jpeg','image/x-xbitmap',
					'image/png','application/png','image/x-png','application/x-png',
					'image/gif','image/x-xbitmap','image/gi_',
					'image/bmp','image/x-bmp','image/x-bitmap','image/x-xbitmap','image/x-win-bitmap','image/x-windows-bmp','image/ms-bmp','image/x-ms-bmp','application/bmp','application/x-bmp','application/x-win-bitmap'
					);
					$ImageNews = getimagesize($_FILES['photo']['tmp_name']);
					if(in_array($ImageNews['mime'], $ListeExtension)) {
						if(file_exists('images/photos/' . basename($_FILES['photo']['name']))){
							$rand=true;
							$numberTryNewName=0;
							while($rand){
								$num = rand(0,2000000000);
								if(!file_exists('images/photos/' . preg_replace("#(\.[^\.]+)$#",$num.'$1',basename($_FILES['photo']['name'])))){
									$rand = false;
									$_FILES['photo']['name'] = preg_replace("#(\.[^\.]+)$#",$num.'$1',basename($_FILES['photo']['name']));
								}
								$numberTryNewName++;
								if($numberTryNewName >=200000) {
									$message = $erreurRenommerImage;
									break;
								}
							}
						}
						if(empty($message)) {
							move_uploaded_file($_FILES['photo']['tmp_name'], 'images/photos/' . basename($_FILES['photo']['name']));
							$photo = 'images/photos/'. basename($_FILES['photo']['name']);
						}
					} else {
						$message = $erreurDencodage;
					}
				} else {
					$message = $erreurExtension;
				}
			} else {
				$message = $erreurTaille;
			}
		}
	}
	if(empty($message)) {
		mysqli_query($connexionBD,"INSERT INTO `administrateur`(nom, password, photo, username, niveau) VALUES('$nom', '$password', '$photo','$username','$categorie')");
		$message = $compteInsere;
	}
}

if(isset($_POST["modifier"])&&isset($_POST["nom"])&&isset($_POST["password"])&&isset($_POST["repassword"])) {
	$message="";
	$nom = $_POST["nom"];
	$password = $_POST["password"];
	$repassword = $_POST["repassword"];
	if(!empty($password) && $password!=$repassword) {
		$message = $erreurPasswordDifferents;
	} else {
		$resultat = mysqli_query($connexionBD,"SELECT * FROM `administrateur` WHERE id=".$_SESSION['id']);
		$row = mysqli_fetch_array($resultat);
		if(empty($password)) {
			$password = $row['password'];
		} else if($repassword != $row['password']) {
			$message = $erreurAncienPassword;
		}
	}
	if(empty($message)) {
		$photo = $row['photo'];
		if (isset($_FILES['photo']) AND $_FILES['photo']['error'] <= 0) {
			if ($_FILES['photo']['size'] <= 2000000) {
				$infosfichier = pathinfo($_FILES['photo']['name']);
				$extension_upload = strtolower($infosfichier['extension']);
				$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
				if (in_array($extension_upload, $extensions_autorisees))
				{
					$ListeExtension = array(
					'image/jpeg','image/jpeg','image/jpg','image/jp_','application/jpg','image/x-jpg','application/x-jpg','image/pjpeg','image/pipeg','image/vnd.swiftview-jpeg','image/x-xbitmap',
					'image/png','application/png','image/x-png','application/x-png',
					'image/gif','image/x-xbitmap','image/gi_',
					'image/bmp','image/x-bmp','image/x-bitmap','image/x-xbitmap','image/x-win-bitmap','image/x-windows-bmp','image/ms-bmp','image/x-ms-bmp','application/bmp','application/x-bmp','application/x-win-bitmap'
					);
					$ImageNews = getimagesize($_FILES['photo']['tmp_name']);
					if(in_array($ImageNews['mime'], $ListeExtension)) {
						if(file_exists('images/photos/' . basename($_FILES['photo']['name']))){
							$rand=true;
							$numberTryNewName=0;
							while($rand){
								$num = rand(0,2000000000);
								if(!file_exists('images/photos/' . preg_replace("#(\.[^\.]+)$#",$num.'$1',basename($_FILES['photo']['name'])))){
									$rand = false;
									$_FILES['photo']['name'] = preg_replace("#(\.[^\.]+)$#",$num.'$1',basename($_FILES['photo']['name']));
								}
								$numberTryNewName++;
								if($numberTryNewName >=200000) {
									$message = $erreurRenommerImage;
									break;
								}
							}
						}
						if(empty($message)) {
							move_uploaded_file($_FILES['photo']['tmp_name'], 'images/photos/' . basename($_FILES['photo']['name']));
							$photo = 'images/photos/'. basename($_FILES['photo']['name']);
						}
					} else {
						$message = $erreurDencodage;
					}
				} else {
					$message = $erreurExtension;
				}
			} else {
				$message = $erreurTaille;
			}
		}
	}
	if(empty($message)) {
		mysqli_query($connexionBD,"UPDATE `administrateur` SET nom='$nom', password='$password', photo='$photo' WHERE id=".$_SESSION['id']);
		$message = $compteModifie;
	}
}
