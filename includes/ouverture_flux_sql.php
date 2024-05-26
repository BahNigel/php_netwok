<?php

$connexionBD=mysqli_connect($hostBD,$usernameBD,$passwordBD,$databaseBD);

    if (mysqli_connect_errno()) {
		// echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit($erreur_connexionBD);
    }
    mysqli_query($connexionBD,"SET NAMES UTF8");