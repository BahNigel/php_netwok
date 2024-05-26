<?php
$id = $_SESSION['id'];
include('includes/lecture_utilisateur.php');
echo "<ul>
<li style='border-bottom:1px #999 solid; padding:5px;list-style: none;'></li>";
if ($niveau >= $niveau_super_admin) {
	$resultat = mysqli_query($connexionBD, "SELECT pro.*, adm.nom AS nomadmin FROM projet pro, administrateur adm WHERE pro.id_administrateur = adm.id ORDER BY id DESC;");
} else {
	$resultat = mysqli_query($connexionBD, "SELECT * FROM projet WHERE id_administrateur = $id ORDER BY id DESC;");
}
while ($row = mysqli_fetch_array($resultat)) {
	$nom = $row['nom'];
	$date_creation = day(date("w", strtotime($row['date_creation']))) . ", " . (date("d ", strtotime($row['date_creation']))) . month(date("m", strtotime($row['date_creation']))) . date(" Y à H:i:s", strtotime($row['date_creation']));
	$date_consultation = $row['date_consultation'];
	$date_modification = $row['date_modification'];
	$nomAdmin = "";
	if ($niveau >= $niveau_super_admin) {
		$nomAdmin = "<li><b>$cree_par</b> " . $row['nomadmin'] . "</li>";
	}
	if ($date_consultation == '0000-00-00 00:00:00') {
		$date_consultation = "$jamais";
	} else {
		$date_consultation = day(date("w", strtotime($date_consultation))) . ", " . (date("d ", strtotime($date_consultation))) . month(date("m", strtotime($date_consultation))) . date(" Y à H:i:s", strtotime($date_consultation));
	}
	if ($date_modification == '0000-00-00 00:00:00') {
		$date_modification = "$jamais";
	} else {
		$date_modification = day(date("w", strtotime($date_modification))) . ", " . (date("d ", strtotime($date_modification))) . month(date("m", strtotime($date_modification))) . date(" Y à H:i:s", strtotime($date_modification));
	}
	echo "<li style='border-bottom:1px #999 solid; padding:5px;'><a><b>$nomprojet</b></a> <u>$nom</u>
		<ul>
		<li><b>$cree_le</b> $date_creation</li>
		$nomAdmin
		<li><b>$derniere_consultation_le</b> $date_consultation</li>
		<li><b>$derniere_modification_le</b> $date_modification</li>
		</ul>
		<input name = 'consulter*$row[0]' type='submit' value = '$consulter_button'";
	if (empty($row['couverture'])) {
		echo " disabled=disabled";
	}
	echo ">
		<input name = 'rapport*$row[0]' type='submit' value = '$rapport_button'";
	if (empty($row['couverture'])) {
		echo " disabled=disabled";
	}
	echo ">
		<input name = 'modifier*$row[0]' type='submit' value = '$modifier_button'>
		<input name = 'supprimer*$row[0]' type='submit' value = '$supprimer_button'>
		</li>
		";
}
echo "</ul>";
function month($entier)
{
	$liste = array("Aucun", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	return $liste[3];
}
function day($entier)
{
	$liste = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
	return $liste[$entier];
}
