<?php
	$requete = mysqli_query($connexionBD,"SELECT * FROM administrateur WHERE id = $id");
    $row = mysqli_fetch_array($requete);
	$photo = $row['photo'];
	$nom = $row['nom'];
	$niveau = $row['niveau'];