<?php

if (isset($_POST["creer"]) && isset($_POST["nom"])) {
	$message = "";
	$nom = $_POST["nom"];
	$id = $_SESSION['id'];
	$resultat = mysqli_query($connexionBD, "SELECT * FROM `projet` WHERE nom='$nom'");
	if ($row = mysqli_fetch_array($resultat)) {
		$message = $erreurProjetExistant;
	}
	if (empty($message)) {
		mysqli_query($connexionBD, "INSERT INTO `projet`(nom, date_creation,id_administrateur) VALUES('$nom',NOW(),$id)");
		$resultat = mysqli_query($connexionBD, "SELECT * FROM `projet` ORDER BY id DESC");
		$row = mysqli_fetch_array($resultat);
		$message = $projetCree;
		$_SESSION["projet"] = $row[0];
		$_SESSION['nom_zone'] = '';
		$_SESSION['surface_zone'] = '';
		$_SESSION['type_zone'] = '';
		$_SESSION['densite_zone'] = '';
		$_SESSION['nom_enodeb'] = '';
		$_SESSION['puissance_enodeb'] = '';
		$_SESSION['gain_antenne_enodeb'] = '';
		$_SESSION['facteur_bruit_enodeb'] = '';
		$_SESSION['sinr_min_enodeb'] = '';
		$_SESSION['debit_enodeb'] = '';
		$_SESSION['nom_ue'] = '';
		$_SESSION['puissance_ue'] = '';
		$_SESSION['gain_antenne_ue'] = '';
		$_SESSION['facteur_bruit_ue'] = '';
		$_SESSION['sinr_min_ue'] = '';
		$_SESSION['debit_max_ue'] = '';
		$_SESSION['nom_scenario'] = '';
		$_SESSION['alpha_ul_scenario'] = '';
		$_SESSION['impfactor_ul_scenario'] = '';
		$_SESSION['sinr_max_ul_scenario'] = '';
		$_SESSION['alpha_dl_scenario'] = '';
		$_SESSION['impfactor_dl_scenario'] = '';
		$_SESSION['sinr_max_dl_scenario'] = '';
		$_SESSION['detail_simul_scenario'] = '';
		$_SESSION['pertes_ue'] = '';
		$_SESSION['pertes_corps'] = '';
		$_SESSION['debit_uplink'] = '';
		$_SESSION['debit_downlink'] = '';
		$_SESSION['nombre_rb'] = '';
		$_SESSION['bp_rb'] = '';
		$_SESSION['pertes_feeder'] = '';
		$_SESSION['marge_ev'] = '';
		$_SESSION['marge_liaison'] = '';
		$_SESSION['marge_i'] = '';
		$_SESSION['marge_o'] = '';
		$_SESSION['marge_p'] = '';
		$_SESSION['bp_cellule'] = '';
		$_SESSION['mode_duplex'] = '';
		$_SESSION['frequence'] = '';
		$_SESSION['model_p'] = '';
		$_SESSION['h_enodeb'] = '';
		$_SESSION['h_ue'] = '';
		$_SESSION['type_site'] = '';
		$_SESSION['attenuation'] = '';
		$_SESSION['rayon_cellule'] = '';
		$_SESSION['bruit_ue'] = '';
		$_SESSION['bruit_enodeb'] = '';
		$_SESSION['nombre_enodeb'] = '';
		$_SESSION['couverture'] = '';
		$_SESSION['capacite'] = '';
		$_SESSION['capex'] = '';
		$_SESSION['opex'] = '';
		$_SESSION['cartographie'] = '';
		$_SESSION['interface_x1_s2'] = '';
		$_SESSION['bbu'] = '';
		$_SESSION['bbu1'] = '';
		$_SESSION['contention_msg'] = '';
		$_SESSION['debitul_msg'] = '';
		$_SESSION['debitdl_msg'] = '';
		$_SESSION['pourcentage_msg'] = '';
		$_SESSION['contention_inf'] = '';
		$_SESSION['debitul_inf'] = '';
		$_SESSION['debitdl_inf'] = '';
		$_SESSION['pourcentage_inf'] = '';
		$_SESSION['contention_jeu'] = '';
		$_SESSION['debitul_jeu'] = '';
		$_SESSION['debitdl_jeu'] = '';
		$_SESSION['pourcentage_jeu'] = '';
		$_SESSION['contention_mc'] = '';
		$_SESSION['debitul_mc'] = '';
		$_SESSION['debitdl_mc'] = '';
		$_SESSION['pourcentage_mc'] = '';
		$_SESSION['contention_sic'] = '';
		$_SESSION['debitul_sic'] = '';
		$_SESSION['debitdl_sic'] = '';
		$_SESSION['pourcentage_sic'] = '';
		$_SESSION['contention_nav'] = '';
		$_SESSION['debitul_nav'] = '';
		$_SESSION['debitdl_nav'] = '';
		$_SESSION['pourcentage_nav'] = '';
		$_SESSION['contention_per'] = '';
		$_SESSION['debitul_per'] = '';
		$_SESSION['debitdl_per'] = '';
		$_SESSION['pourcentage_per'] = '';
		$_SESSION['contention_rd'] = '';
		$_SESSION['debitul_rd'] = '';
		$_SESSION['debitdl_rd'] = '';
		$_SESSION['pourcentage_rd'] = '';
		$_SESSION['contention_tv'] = '';
		$_SESSION['debitul_tv'] = '';
		$_SESSION['debitdl_tv'] = '';
		$_SESSION['pourcentage_tv'] = '';
		$_SESSION['contention_voix'] = '';
		$_SESSION['debitul_voix'] = '';
		$_SESSION['debitdl_voix'] = '';
		$_SESSION['pourcentage_voix'] = '';
		$_SESSION['contention_msj'] = '';
		$_SESSION['debitul_msj'] = '';
		$_SESSION['debitdl_msj'] = '';
		$_SESSION['pourcentage_msj'] = '';
		$_SESSION['debit_ul'] = '';
		$_SESSION['debit_dl'] = '';
		$_SESSION['nombre_site'] = '';
		$_SESSION['heure_occ'] = '';
		$_SESSION['trafic_UL_DL'] = '';
		$_SESSION['T_R_UL'] = '';
		$_SESSION['T_R_DL'] = '';
		$_SESSION['trafic_moy'] = '';
		$_SESSION['abon_par_eNodeB'] = '';
		$_SESSION['ER'] = '';
		$_SESSION['BH_Data_Trafic_subs_UL'] = '';
		$_SESSION['BH_Data_Trafic_subs_DL'] = '';
		$_SESSION['Data_Trafic_Throughput_subs_UL'] = '';
		$_SESSION['Data_Trafic_Throughput_subs_DL'] = '';
		$_SESSION['T_UL_Data_trafic_subs'] = '';
		$_SESSION['T_DL_Data_trafic_subs'] = '';
		$_SESSION['T_UL_user_plane_subs'] = '';
		$_SESSION['T_DL_user_plane_subs'] = '';
		$_SESSION['T_Total_user_plane_subs'] = '';
		$_SESSION['plan_control'] = '';
		$_SESSION['S1_bandW'] = '';
		$_SESSION['X2_bandW'] = '';
		$_SESSION['c_axc'] = '';
		$_SESSION['n_axc'] = '';
		$_SESSION['c_cpri'] = '';
		$_SESSION['c_cpri_site'] = '';
		$_SESSION['type_topo'] = '';
		$_SESSION['nombre_canaux'] = '';
		$_SESSION['sensibilite_recepteur'] = '';
		$_SESSION['fenetre_optique'] = '';
		$_SESSION['puissance_emission'] = '';
		$_SESSION['type_fibre'] = '';
		$_SESSION['connecteurs_optiques'] = '';
		$_SESSION['distance_transport'] = '';
		$_SESSION['attenuation_lineaire'] = '';
		$_SESSION['attenuation_connecteur_optique'] = '';
		$_SESSION['attenuation_totale'] = '';
		$_SESSION['nombre_equipements'] = '';
		$_SESSION['capacite_equipements'] = '';
		$_SESSION['ing_radio'] = '';
		$_SESSION['ing_reseau'] = '';
		$_SESSION['rech_four'] = '';
		$_SESSION['rech_site'] = '';
		$_SESSION['rout_ser_pass'] = '';
		$_SESSION['inf_ip'] = '';
		$_SESSION['log_appli'] = '';
		$_SESSION['inf_voip'] = '';
		$_SESSION['bs_ant'] = '';
		$_SESSION['fh_fob_cab'] = '';
		$_SESSION['loc_sit'] = '';
		$_SESSION['aq_terr'] = '';
		$_SESSION['travaux'] = '';
		$_SESSION['electrique'] = '';
		$_SESSION['inst_sit'] = '';
		$_SESSION['rac_elec'] = '';
		$_SESSION['rac_ip'] = '';
		$_SESSION['loc_mob'] = '';
		$_SESSION['suiv_proj'] = '';
		$_SESSION['s1'] = '';
		$_SESSION['s2'] = '';
		$_SESSION['s3'] = '';
		$_SESSION['s4'] = '';
		$_SESSION['capexval'] = '';
		$_SESSION['loc_sit_total'] = '';
		$_SESSION['Editbox3'] = '';
		$_SESSION['Editbox4'] = '';
		$_SESSION['Editbox5'] = '';
		$_SESSION['Editbox17'] = '';
		$_SESSION['Editbox18'] = '';
		$_SESSION['Editbox19'] = '';
		$_SESSION['Editbox20'] = '';
		$_SESSION['Editbox21'] = '';
		$_SESSION['Editbox22'] = '';
		$_SESSION['Editbox23'] = '';
		$_SESSION['Editbox24'] = '';
		$_SESSION['Editbox25'] = '';
		$_SESSION['Editbox6'] = '';
		$_SESSION['rev_msg'] = '';
		$_SESSION['rev_inf'] = '';
		$_SESSION['rev_jeu'] = '';
		$_SESSION['rev_mc'] = '';
		$_SESSION['rev_sic'] = '';
		$_SESSION['rev_nav'] = '';
		$_SESSION['rev_per'] = '';
		$_SESSION['rev_rd'] = '';
		$_SESSION['rev_tvv'] = '';
		$_SESSION['rev_voix'] = '';
		$_SESSION['rev_msj'] = '';
		$_SESSION['rcet1'] = '';
		$_SESSION['rcet2'] = '';
		$_SESSION['rcet3'] = '';
		$_SESSION['rcet4'] = '';
		$_SESSION['rcet5'] = '';
		$_SESSION['opex1'] = '';
		$_SESSION['opex2'] = '';
		$_SESSION['opex3'] = '';
		$_SESSION['opex4'] = '';
		$_SESSION['opex5'] = '';
		$_SESSION['bene1'] = '';
		$_SESSION['bene2'] = '';
		$_SESSION['bene3'] = '';
		$_SESSION['bene4'] = '';
		$_SESSION['bene5'] = '';
	}
} else if (isset($_POST["couverture"])) {
	$message = "";
	foreach ($_POST as $key => $post) {
		if ($post == '') {
			$erreur = true;
			break;
		}
	}
	if (!isset($erreur)) {
		$_SESSION['nom_zone'] = $_POST['nom_zone'];
		$update = "nom_zone = '" . $_SESSION['nom_zone'] . "'";
		$_SESSION['lat_zone'] = $_POST['lat_zone'];
		$update .= ",lat_zone = '" . $_SESSION['lat_zone'] . "'";
		$_SESSION['long_zone'] = $_POST['long_zone'];
		$update .= ",long_zone = '" . $_SESSION['long_zone'] . "'";
		$_SESSION['surface_zone'] = $_POST['surface_zone'];
		$update .= ",surface_zone = '" . $_SESSION['surface_zone'] . "'";
		$_SESSION['type_zone'] = $_POST['type_zone'];
		$update .= ",type_zone = '" . $_SESSION['type_zone'] . "'";
		$_SESSION['densite_zone'] = $_POST['densite_zone'];
		$update .= ",densite_zone = '" . $_SESSION['densite_zone'] . "'";
		$_SESSION['nom_enodeb'] = $_POST['nom_enodeb'];
		$update .= ",nom_enodeb = '" . $_SESSION['nom_enodeb'] . "'";
		$_SESSION['puissance_enodeb'] = $_POST['puissance_enodeb'];
		$update .= ",puissance_enodeb = '" . $_SESSION['puissance_enodeb'] . "'";
		$_SESSION['gain_antenne_enodeb'] = $_POST['gain_antenne_enodeb'];
		$update .= ",gain_antenne_enodeb = '" . $_SESSION['gain_antenne_enodeb'] . "'";
		$_SESSION['facteur_bruit_enodeb'] = $_POST['facteur_bruit_enodeb'];
		$update .= ",facteur_bruit_enodeb = '" . $_SESSION['facteur_bruit_enodeb'] . "'";
		$_SESSION['sinr_min_enodeb'] = $_POST['sinr_min_enodeb'];
		$update .= ",sinr_min_enodeb = '" . $_SESSION['sinr_min_enodeb'] . "'";
		$_SESSION['debit_enodeb'] = $_POST['debit_enodeb'];
		$update .= ",debit_enodeb = '" . $_SESSION['debit_enodeb'] . "'";
		$_SESSION['nom_ue'] = $_POST['nom_ue'];
		$update .= ",nom_ue = '" . $_SESSION['nom_ue'] . "'";
		$_SESSION['puissance_ue'] = $_POST['puissance_ue'];
		$update .= ",puissance_ue = '" . $_SESSION['puissance_ue'] . "'";
		$_SESSION['gain_antenne_ue'] = $_POST['gain_antenne_ue'];
		$update .= ",gain_antenne_ue = '" . $_SESSION['gain_antenne_ue'] . "'";
		$_SESSION['facteur_bruit_ue'] = $_POST['facteur_bruit_ue'];
		$update .= ",facteur_bruit_ue = '" . $_SESSION['facteur_bruit_ue'] . "'";
		$_SESSION['sinr_min_ue'] = $_POST['sinr_min_ue'];
		$update .= ",sinr_min_ue = '" . $_SESSION['sinr_min_ue'] . "'";
		$_SESSION['debit_max_ue'] = $_POST['debit_max_ue'];
		$update .= ",debit_max_ue = '" . $_SESSION['debit_max_ue'] . "'";
		$_SESSION['nom_scenario'] = $_POST['nom_scenario'];
		$update .= ",nom_scenario = '" . $_SESSION['nom_scenario'] . "'";
		$_SESSION['alpha_ul_scenario'] = $_POST['alpha_ul_scenario'];
		$update .= ",alpha_ul_scenario = '" . $_SESSION['alpha_ul_scenario'] . "'";
		$_SESSION['impfactor_ul_scenario'] = $_POST['impfactor_ul_scenario'];
		$update .= ",impfactor_ul_scenario = '" . $_SESSION['impfactor_ul_scenario'] . "'";
		$_SESSION['sinr_max_ul_scenario'] = $_POST['sinr_max_ul_scenario'];
		$update .= ",sinr_max_ul_scenario = '" . $_SESSION['sinr_max_ul_scenario'] . "'";
		$_SESSION['alpha_dl_scenario'] = $_POST['alpha_dl_scenario'];
		$update .= ",alpha_dl_scenario = '" . $_SESSION['alpha_dl_scenario'] . "'";
		$_SESSION['impfactor_dl_scenario'] = $_POST['impfactor_dl_scenario'];
		$update .= ",impfactor_dl_scenario = '" . $_SESSION['impfactor_dl_scenario'] . "'";
		$_SESSION['sinr_max_dl_scenario'] = $_POST['sinr_max_dl_scenario'];
		$update .= ",sinr_max_dl_scenario = '" . $_SESSION['sinr_max_dl_scenario'] . "'";
		$_SESSION['detail_simul_scenario'] = $_POST['detail_simul_scenario'];
		$update .= ",detail_simul_scenario = '" . $_SESSION['detail_simul_scenario'] . "'";
		$_SESSION['pertes_ue'] = $_POST['pertes_ue'];
		$update .= ",pertes_ue = '" . $_SESSION['pertes_ue'] . "'";
		$_SESSION['pertes_corps'] = $_POST['pertes_corps'];
		$update .= ",pertes_corps = '" . $_SESSION['pertes_corps'] . "'";
		$_SESSION['debit_uplink'] = $_POST['debit_uplink'];
		$update .= ",debit_uplink = '" . $_SESSION['debit_uplink'] . "'";
		$_SESSION['debit_downlink'] = $_POST['debit_downlink'];
		$update .= ",debit_downlink = '" . $_SESSION['debit_downlink'] . "'";
		$_SESSION['nombre_rb'] = $_POST['nombre_rb'];
		$update .= ",nombre_rb = '" . $_SESSION['nombre_rb'] . "'";
		$_SESSION['bp_rb'] = $_POST['bp_rb'];
		$update .= ",bp_rb = '" . $_SESSION['bp_rb'] . "'";
		$_SESSION['pertes_feeder'] = $_POST['pertes_feeder'];
		$update .= ",pertes_feeder = '" . $_SESSION['pertes_feeder'] . "'";
		$_SESSION['marge_ev'] = $_POST['marge_ev'];
		$update .= ",marge_ev = '" . $_SESSION['marge_ev'] . "'";
		$_SESSION['marge_liaison'] = $_POST['marge_liaison'];
		$update .= ",marge_liaison = '" . $_SESSION['marge_liaison'] . "'";
		$_SESSION['marge_i'] = $_POST['marge_i'];
		$update .= ",marge_i = '" . $_SESSION['marge_i'] . "'";
		$_SESSION['marge_o'] = $_POST['marge_o'];
		$update .= ",marge_o = '" . $_SESSION['marge_o'] . "'";
		$_SESSION['marge_p'] = $_POST['marge_p'];
		$update .= ",marge_p = '" . $_SESSION['marge_p'] . "'";
		$_SESSION['bp_cellule'] = $_POST['bp_cellule'];
		$update .= ",bp_cellule = '" . $_SESSION['bp_cellule'] . "'";
		$_SESSION['mode_duplex'] = $_POST['mode_duplex'];
		$update .= ",mode_duplex = '" . $_SESSION['mode_duplex'] . "'";
		$_SESSION['frequence'] = $_POST['frequence'];
		$update .= ",frequence = '" . $_SESSION['frequence'] . "'";
		$_SESSION['model_p'] = $_POST['model_p'];
		$update .= ",model_p = '" . $_SESSION['model_p'] . "'";
		$_SESSION['h_enodeb'] = $_POST['h_enodeb'];
		$update .= ",h_enodeb = '" . $_SESSION['h_enodeb'] . "'";
		$_SESSION['h_ue'] = $_POST['h_ue'];
		$update .= ",h_ue = '" . $_SESSION['h_ue'] . "'";
		$_SESSION['type_site'] = $_POST['type_site'];
		$update .= ",type_site = '" . $_SESSION['type_site'] . "'";

		$nom_z = $_SESSION['nom_zone'];
		$superficie = $_SESSION['surface_zone'];
		$type_z = $_SESSION['type_zone'];
		$densite_zone = $_SESSION['densite_zone'];

		$nom_enod = $_SESSION['nom_enodeb'];
		$puissance_enod = $_SESSION['puissance_enodeb'];
		$gain_enod = $_SESSION['gain_antenne_enodeb'];
		$facteur_enod = $_SESSION['facteur_bruit_enodeb'];
		$sinr_min_enod = $_SESSION['sinr_min_enodeb'];
		$debitmax_enod = $_SESSION['debit_enodeb'];

		$nom_ue = $_SESSION['nom_ue'];
		$puissance_ue = $_SESSION['puissance_ue'];
		$gain_ue = $_SESSION['gain_antenne_ue'];
		$facteur_ue = $_SESSION['facteur_bruit_ue'];
		$sinr_min_ue = $_SESSION['sinr_min_ue'];
		$debitmax_ue = $_SESSION['debit_max_ue'];

		$nom_scen = $_SESSION['nom_scenario'];
		$alphaul = $_SESSION['alpha_ul_scenario'];
		$impfactorul = $_SESSION['impfactor_ul_scenario'];
		$sinrmaxul = $_SESSION['sinr_max_ul_scenario'];
		$alphadl = $_SESSION['alpha_dl_scenario'];
		$impfactordl = $_SESSION['impfactor_dl_scenario'];
		$sinrmaxdl = $_SESSION['sinr_max_dl_scenario'];
		$detail_simul_scenario = $_SESSION['detail_simul_scenario'];

		$pertes_ue = $_SESSION['pertes_ue'];
		$pertes_corps = $_SESSION['pertes_corps'];
		$debit_uplink = $_SESSION['debit_uplink'];

		$debit_downlink = $_SESSION['debit_downlink'];
		$nombre_rb = $_SESSION['nombre_rb'];
		$bp_rb = $_SESSION['bp_rb'];
		$pertes_enodeb = $_SESSION['pertes_feeder'];
		$marge_ev = $_SESSION['marge_ev'];
		$marge_liaison = $_SESSION['marge_liaison'];
		$marge_i = $_SESSION['marge_i'];
		$marge_o = $_SESSION['marge_o'];
		$marge_p = $_SESSION['marge_p'];
		$bp_cellule = $_SESSION['bp_cellule'];
		$mode_duplex = $_SESSION['mode_duplex'];
		$frequence = $_SESSION['frequence'];
		$model_p = $_SESSION['model_p'];
		$h_enodeb = $_SESSION['h_enodeb'];
		$h_ue = $_SESSION['h_ue'];
		$type_site = $_SESSION['type_site'];
		/*/----------------------------DEBUT DES CALCULS----------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------*/
		//		function sinr($debit,$alpha,$i){ $c=$debit/$alpha; return round(10*$i*log(pow(2,$c)-1)/log(10),0); }
		$spectral_ul = $debit_uplink / $bp_cellule;
		$spectral_dl = $debit_downlink / $bp_cellule;

		$sinr_ul = round(10 * $impfactorul * log(pow(2, $spectral_ul / $alphaul) - 1) / log(10), 0);

		$sinr_dl = round(10 * $impfactordl * log(pow(2, $spectral_dl / $alphadl) - 1) / log(10), 0);

		if ($sinr_ul < $sinr_min_ue) {
			$requiredsinr_ul = $sinr_min_ue;
		} else {
			if ($sinr_ul > $sinrmaxul) {
				$requiredsinr_ul = $sinrmaxul;
			} else {
				$requiredsinr_ul = $sinr_ul;
			}
		}

		if ($sinr_dl < $sinr_min_enod) {
			$requiredsinr_dl = $sinr_min_enod;
		} else {
			if ($sinr_dl > $sinrmaxdl) {
				$requiredsinr_dl = $sinrmaxdl;
			} else {
				$requiredsinr_dl = $sinr_dl;
			}
		}

		//------------------------------------------------------BRUITS------------------------------------------------------------------------------------------------------
		$bruit_ue = round(-203.8 + 10 * log($nombre_rb * $bp_rb * 1000) / log(10) + $facteur_ue);
		$bruit_enodeb = round(-203.8 + 10 * log($nombre_rb * $bp_rb * 1000) / log(10) + $facteur_enod);

		//-----------------------------------------------------ATTENUATION-----------------------------------------------------------------------------------
		$L_ul = $puissance_ue - 30 + $gain_ue - $pertes_ue - $pertes_corps - $marge_ev - $marge_liaison - $marge_i - $marge_o - $marge_p - $requiredsinr_ul + $gain_enod - $pertes_enodeb - $bruit_enodeb;

		$L_dl = $puissance_enod - 30 + $gain_enod - $pertes_enodeb - $pertes_corps - $marge_ev - $marge_liaison - $marge_i - $marge_o - $marge_p - $requiredsinr_dl + $gain_ue - $pertes_ue - $bruit_ue;
		$attenuation = max($L_ul, $L_dl);
		//------------------------------------------------------------------------------------------------------------------------------------------------------------------
		//test sur le type de la zone et affzctation de la valeur de l'index correspondante


		if (($type_z == "Urbaine des grandes villes") or ($type_z == "Montagneux avec lourde densité d'arbres")) {
			$index = 0;
		}
		if (($type_z == "Urbaine des moyennes villes") or ($type_z == "Vallonné avec une densité modéré d'arbres")) {
			$index = 1;
		}
		if (($type_z == "Urbaine des petites villes") or ($type_z == "Plat avec faible densité d'arbres")) {
			$index = 2;
		}
		if ($type_z == "Périurbaine") {
			$index = 3;
		}
		if ($type_z == "Rurale") {
			$index = 4;
		}


		//-------------------------------DEFINITION DES FONCTIONS okumura-hata et cost231-hata--------------------------------------------------------------------------------
		function okumurahata($Lv, $f, $hb, $hm, $index)
		{
			if ($index == 0) {
				if ($f < 300) {
					$E = (log(1.54 * $hm) / log(10));
					$Ch = 8.29 * pow($E, 2) - 1.11;
					$A = $Lv - 69.55 - 26.16 * (log($f) / log(10)) + 13.82 * (log($hb) / log(10)) + $Ch;
					$B = 44.9 - (6.55 * log($hb) / log(10));
					$C = $A / $B;
					$r = pow(10, $C);
					return $r;
				} else {
					$E = (log(11.75 * $hm) / log(10));
					$Ch = 3.2 * pow($E, 2) - 4.97;
					$A = $Lv - 69.55 - 26.16 * (log($f) / log(10)) + 13.82 * (log($hb) / log(10)) + $Ch;
					$B = 44.9 - (6.55 * log($hb) / log(10));
					$C = $A / $B;
					$r = pow(10, $C);
					return $r;
				}
			}
			if ($index == 1) {
				$Ch = (1.1 * (log($f) / log(10)) - 0.7) * $hm - (1.56 * (log($f) / log(10)) - 0.8);
				$A = $Lv - 69.55 - 26.16 * (log($f) / log(10)) + 13.82 * (log($hb) / log(10)) + $Ch;
				$B = 44.9 - (6.55 * log($hb) / log(10));
				$C = $A / $B;
				$r = pow(10, $C);
				return $r;
			}
			if ($index == 2) {
				$Ch = (1.1 * (log($f) / log(10)) - 0.7) * $hm - (1.56 * (log($f) / log(10)) - 0.8);
				$A = $Lv - 69.55 - 26.16 * (log($f) / log(10)) + 13.82 * (log($hb) / log(10)) + $Ch;
				$B = 44.9 - (6.55 * log($hb) / log(10));
				$C = $A / $B;
				$r = pow(10, $C);
				return $r;
			}
			if ($index == 3) {
				$i = 2 * pow(log($f / 28) / log(10), 2) + 5.4;

				$r = pow(10, (($A + $i) / $B));
				return $r;
			}

			if ($index == 4) {
				$D = -4.78 * pow(log($f) / log(10), 2) + 18.33 * log($f) / log(10) - 40.94;

				$r = pow(10, (($A - $D) / $B));
				return $r;
			}
		}
		function costhata($Lv, $f, $hb, $hm, $index)
		{
			$F = 46.3 + (33.9 * log($f) / log(10)) - 13.82 * (log($hb) / log(10));
			$B = 44.9 - (6.55 * log($hb) / log(10));
			$E = (1.1 * log($f) / log(10) - 0.7) * $hm - (1.56 * log($f) / log(10) - 0.8);

			if ($index == 0) {
				$G = 3;
				$r = pow(10, (($Lv + $E - $G - $F) / $B));
				return $r;
			} else {
				$G = 0;

				$r = pow(10, (($Lv + $E - $G - $F) / $B));
				return $r;
			}
		}
		function Kfacteurs_deussom_yaounde($Lv, $f, $hb, $hm)
		{
			$E = 149 - 0.8 - 2.49 * $hm - 13.82 * (log($hb) / log(10));
			$A = $Lv - $E;
			$B = 44.9 - (6.55 * log($hb) / log(10));
			$C = $A / $B;
			$r = pow(10, $C);
			return $r;
		}
		function Erceig($Lv, $f, $hb, $hm, $index)
		{

			if ($index == 0) {
				$E = 6 * (log($f / 2000) / log(10)) - 10.8 * (log(0.5 * $hm) / log(10)) + 20 * (log(4 * 100 * M_PI * $f / 300) / log(10));
				$A = $Lv - $E;
				$B = 10 * (4.6 - 0.0075 * $hb + 12.6 / $hb);
				$C = $A / $B;
				$r = 0.1 * pow(10, $C);
				return $r;
			} else if ($index == 1) {
				$E = 6 * (log($f / 2000) / log(10)) - 10.8 * (log(0.5 * $hm) / log(10)) + 20 * (log(4 * 100 * M_PI * $f / 300) / log(10));
				$A = $Lv - $E;
				$B = 10 * (4 - 0.0065 * $hb + 17.1 / $hb);
				$C = $A / $B;
				$r = 0.1 * pow(10, $C);
				return $r;
			} else if ($index == 2) {
				$E = 6 * (log($f / 2000) / log(10)) - 20 * (log(0.5 * $hm) / log(10)) + 20 * (log(4 * 100 * M_PI * $f / 300) / log(10));
				$A = $Lv - $E;
				$B = 10 * (3.6 - 0.005 * $hb + 20 / $hb);
				$C = $A / $B;
				$r = 0.1 * pow(10, $C);
				return $r;
			}
		}
		//suivant le modele de propagation le rayon de la cellule est calculé différemment---------------------------------------------------------------
		if ($model_p == "Okumura-Hata") {
			$rayon_cellule = round(okumurahata($attenuation, $frequence, $h_enodeb, $h_ue, $index), 3);
		}
		if ($model_p == "Erceig-Greenstein") {
			$rayon_cellule = round(Erceig($attenuation, $frequence, $h_enodeb, $h_ue, $index), 3);
		}
		if ($model_p == "Cost231-Hata") {
			$rayon_cellule = round(costhata($attenuation, $frequence, $h_enodeb, $h_ue, $index), 3);
		}
		if ($model_p == "Kfacteurs-deussom-yaounde") {
			$rayon_cellule = round(Kfacteurs_deussom_yaounde($attenuation, $frequence, $h_enodeb, $h_ue), 3);
		}

		//--------------------------------------CALCUL DU NOMBRE DE ENODEB CORRESPONDANTS EN FONCTION DU TYPE DE SITE CONSIDERE------------------------------------------------
		$rf = $rayon_cellule * $rayon_cellule; //Rayon au carré
		if ($type_site == "Omnidirectionnel") {
			$nombre_enodeb = round($superficie / (2.6 * $rf));
		}
		if ($type_site == "Bisectoriel") {
			$nombre_enodeb = round($superficie / (1.3 * 2.6 * $rf));
		}
		if ($type_site == "Trisectoriel") {
			$nombre_enodeb = round($superficie / (1.95 * 2.6 * $rf));
		}

		$_SESSION['attenuation'] = $attenuation;
		$update .= ",attenuation = '" . $_SESSION['attenuation'] . "'";
		$_SESSION['rayon_cellule'] = $rayon_cellule;
		$update .= ",rayon_cellule = '" . $_SESSION['rayon_cellule'] . "'";
		$_SESSION['bruit_ue'] = $bruit_ue;
		$update .= ",bruit_ue = '" . $_SESSION['bruit_ue'] . "'";
		$_SESSION['bruit_enodeb'] = $bruit_enodeb;
		$update .= ",bruit_enodeb = '" . $_SESSION['bruit_enodeb'] . "'";
		$_SESSION['nombre_enodeb'] = $nombre_enodeb;
		$update .= ",nombre_enodeb = '" . $_SESSION['nombre_enodeb'] . "'";
		$_SESSION['couverture'] = "ok";
		$update .= ",couverture = '" . $_SESSION['couverture'] . "'";
		$_SESSION['capacite'] = '';
		$update .= ",capacite = '" . $_SESSION['capacite'] . "'";
		$_SESSION['capex'] = '';
		$update .= ",capex = '" . $_SESSION['capex'] . "'";
		$_SESSION['opex'] = '';
		$update .= ",opex = '" . $_SESSION['opex'] . "'";
		$_SESSION['cartographie'] = '';
		$update .= ",cartographie = '" . $_SESSION['cartographie'] . "'";
		$_SESSION['interface_x1_s2'] = '';
		$update .= ",interface_x1_s2 = '" . $_SESSION['interface_x1_s2'] . "'";
		$_SESSION['bbu'] = '';
		$update .= ",bbu = '" . $_SESSION['bbu'] . "'";
		$_SESSION['bbu1'] = '';
		$update .= ",bbu1 = '" . $_SESSION['bbu1'] . "'";
		mysqli_query($connexionBD, "update projet SET $update, date_modification=NOW() WHERE id = " . $_SESSION["projet"]);
	} else {
		$message = $veuillez_remplir_tous_les_champs;
	}
} else if (isset($_POST["defaut_couverture"])) {
	$_POST['nom_zone'] = "Yaoundé";
	$_POST['surface_zone'] = "180";
	$_POST['type_zone'] = "Urbaine des grandes villes";
	$_POST['densite_zone'] = "420";
	$_POST['nom_enodeb'] = "E-UTRA Reference eNodeB";
	$_POST['puissance_enodeb'] = "43";
	$_POST['gain_antenne_enodeb'] = "15";
	$_POST['facteur_bruit_enodeb'] = "5";
	$_POST['sinr_min_enodeb'] = "-10";
	$_POST['debit_enodeb'] = "4.4";
	$_POST['nom_ue'] = "E-UTRA Reference UE";
	$_POST['puissance_ue'] = "24";
	$_POST['gain_antenne_ue'] = "0";
	$_POST['facteur_bruit_ue'] = "9";
	$_POST['sinr_min_ue'] = "-10";
	$_POST['debit_max_ue'] = "2";
	$_POST['nom_scenario'] = "Baseline Link Level Simulations";
	$_POST['alpha_ul_scenario'] = "0.4";
	$_POST['impfactor_ul_scenario'] = "1";
	$_POST['sinr_max_ul_scenario'] = "15";
	$_POST['alpha_dl_scenario'] = "0.6";
	$_POST['impfactor_dl_scenario'] = "1";
	$_POST['sinr_max_dl_scenario'] = "22";
	$_POST['detail_simul_scenario'] = "* 1:2 Antenna configuration
		* 3G Network";
	$_POST['pertes_ue'] = "2";
	$_POST['pertes_corps'] = "2";
	$_POST['debit_uplink'] = "5";
	$_POST['debit_downlink'] = "10";
	$_POST['nombre_rb'] = "5";
	$_POST['bp_rb'] = "375";
	$_POST['pertes_feeder'] = "2";
	$_POST['marge_ev'] = "2";
	$_POST['marge_liaison'] = "2";
	$_POST['marge_i'] = "2";
	$_POST['marge_o'] = "2";
	$_POST['marge_p'] = "2";
	$_POST['bp_cellule'] = "1.25";
	$_POST['mode_duplex'] = "FDD";
	$_POST['frequence'] = "900";
	$_POST['model_p'] = "Okumura-Hata";
	$_POST['h_enodeb'] = "90";
	$_POST['h_ue'] = "1.5";
	$_POST['type_site'] = "Omnidirectionnel";
} else if (isset($_POST["capacite"])) {
	$message = "";
	foreach ($_POST as $key => $post) {
		if ($post == '') {
			$erreur = true;
			break;
		}
	}
	if (!isset($erreur)) {
		$_SESSION['contention_msg'] = $_POST['contention_msg'];
		$update = "contention_msg = '" . $_SESSION['contention_msg'] . "'";
		$_SESSION['debitul_msg'] = $_POST['debitul_msg'];
		$update .= ",debitul_msg = '" . $_SESSION['debitul_msg'] . "'";
		$_SESSION['debitdl_msg'] = $_POST['debitdl_msg'];
		$update .= ",debitdl_msg = '" . $_SESSION['debitdl_msg'] . "'";
		$_SESSION['pourcentage_msg'] = $_POST['pourcentage_msg'];
		$update .= ",pourcentage_msg = '" . $_SESSION['pourcentage_msg'] . "'";
		$_SESSION['contention_inf'] = $_POST['contention_inf'];
		$update .= ",contention_inf = '" . $_SESSION['contention_inf'] . "'";
		$_SESSION['debitul_inf'] = $_POST['debitul_inf'];
		$update .= ",debitul_inf = '" . $_SESSION['debitul_inf'] . "'";
		$_SESSION['debitdl_inf'] = $_POST['debitdl_inf'];
		$update .= ",debitdl_inf = '" . $_SESSION['debitdl_inf'] . "'";
		$_SESSION['pourcentage_inf'] = $_POST['pourcentage_inf'];
		$update .= ",pourcentage_inf = '" . $_SESSION['pourcentage_inf'] . "'";
		$_SESSION['contention_jeu'] = $_POST['contention_jeu'];
		$update .= ",contention_jeu = '" . $_SESSION['contention_jeu'] . "'";
		$_SESSION['debitul_jeu'] = $_POST['debitul_jeu'];
		$update .= ",debitul_jeu = '" . $_SESSION['debitul_jeu'] . "'";
		$_SESSION['debitdl_jeu'] = $_POST['debitdl_jeu'];
		$update .= ",debitdl_jeu = '" . $_SESSION['debitdl_jeu'] . "'";
		$_SESSION['pourcentage_jeu'] = $_POST['pourcentage_jeu'];
		$update .= ",pourcentage_jeu = '" . $_SESSION['pourcentage_jeu'] . "'";
		$_SESSION['contention_mc'] = $_POST['contention_mc'];
		$update .= ",contention_mc = '" . $_SESSION['contention_mc'] . "'";
		$_SESSION['debitul_mc'] = $_POST['debitul_mc'];
		$update .= ",debitul_mc = '" . $_SESSION['debitul_mc'] . "'";
		$_SESSION['debitdl_mc'] = $_POST['debitdl_mc'];
		$update .= ",debitdl_mc = '" . $_SESSION['debitdl_mc'] . "'";
		$_SESSION['pourcentage_mc'] = $_POST['pourcentage_mc'];
		$update .= ",pourcentage_mc = '" . $_SESSION['pourcentage_mc'] . "'";
		$_SESSION['contention_sic'] = $_POST['contention_sic'];
		$update .= ",contention_sic = '" . $_SESSION['contention_sic'] . "'";
		$_SESSION['debitul_sic'] = $_POST['debitul_sic'];
		$update .= ",debitul_sic = '" . $_SESSION['debitul_sic'] . "'";
		$_SESSION['debitdl_sic'] = $_POST['debitdl_sic'];
		$update .= ",debitdl_sic = '" . $_SESSION['debitdl_sic'] . "'";
		$_SESSION['pourcentage_sic'] = $_POST['pourcentage_sic'];
		$update .= ",pourcentage_sic = '" . $_SESSION['pourcentage_sic'] . "'";
		$_SESSION['contention_nav'] = $_POST['contention_nav'];
		$update .= ",contention_nav = '" . $_SESSION['contention_nav'] . "'";
		$_SESSION['debitul_nav'] = $_POST['debitul_nav'];
		$update .= ",debitul_nav = '" . $_SESSION['debitul_nav'] . "'";
		$_SESSION['debitdl_nav'] = $_POST['debitdl_nav'];
		$update .= ",debitdl_nav = '" . $_SESSION['debitdl_nav'] . "'";
		$_SESSION['pourcentage_nav'] = $_POST['pourcentage_nav'];
		$update .= ",pourcentage_nav = '" . $_SESSION['pourcentage_nav'] . "'";
		$_SESSION['contention_per'] = $_POST['contention_per'];
		$update .= ",contention_per = '" . $_SESSION['contention_per'] . "'";
		$_SESSION['debitul_per'] = $_POST['debitul_per'];
		$update .= ",debitul_per = '" . $_SESSION['debitul_per'] . "'";
		$_SESSION['debitdl_per'] = $_POST['debitdl_per'];
		$update .= ",debitdl_per = '" . $_SESSION['debitdl_per'] . "'";
		$_SESSION['pourcentage_per'] = $_POST['pourcentage_per'];
		$update .= ",pourcentage_per = '" . $_SESSION['pourcentage_per'] . "'";
		$_SESSION['contention_rd'] = $_POST['contention_rd'];
		$update .= ",contention_rd = '" . $_SESSION['contention_rd'] . "'";
		$_SESSION['debitul_rd'] = $_POST['debitul_rd'];
		$update .= ",debitul_rd = '" . $_SESSION['debitul_rd'] . "'";
		$_SESSION['debitdl_rd'] = $_POST['debitdl_rd'];
		$update .= ",debitdl_rd = '" . $_SESSION['debitdl_rd'] . "'";
		$_SESSION['pourcentage_rd'] = $_POST['pourcentage_rd'];
		$update .= ",pourcentage_rd = '" . $_SESSION['pourcentage_rd'] . "'";
		$_SESSION['contention_tv'] = $_POST['contention_tv'];
		$update .= ",contention_tv = '" . $_SESSION['contention_tv'] . "'";
		$_SESSION['debitul_tv'] = $_POST['debitul_tv'];
		$update .= ",debitul_tv = '" . $_SESSION['debitul_tv'] . "'";
		$_SESSION['debitdl_tv'] = $_POST['debitdl_tv'];
		$update .= ",debitdl_tv = '" . $_SESSION['debitdl_tv'] . "'";
		$_SESSION['pourcentage_tv'] = $_POST['pourcentage_tv'];
		$update .= ",pourcentage_tv = '" . $_SESSION['pourcentage_tv'] . "'";
		$_SESSION['contention_voix'] = $_POST['contention_voix'];
		$update .= ",contention_voix = '" . $_SESSION['contention_voix'] . "'";
		$_SESSION['debitul_voix'] = $_POST['debitul_voix'];
		$update .= ",debitul_voix = '" . $_SESSION['debitul_voix'] . "'";
		$_SESSION['debitdl_voix'] = $_POST['debitdl_voix'];
		$update .= ",debitdl_voix = '" . $_SESSION['debitdl_voix'] . "'";
		$_SESSION['pourcentage_voix'] = $_POST['pourcentage_voix'];
		$update .= ",pourcentage_voix = '" . $_SESSION['pourcentage_voix'] . "'";
		$_SESSION['contention_msj'] = $_POST['contention_msj'];
		$update .= ",contention_msj = '" . $_SESSION['contention_msj'] . "'";
		$_SESSION['debitul_msj'] = $_POST['debitul_msj'];
		$update .= ",debitul_msj = '" . $_SESSION['debitul_msj'] . "'";
		$_SESSION['debitdl_msj'] = $_POST['debitdl_msj'];
		$update .= ",debitdl_msj = '" . $_SESSION['debitdl_msj'] . "'";
		$_SESSION['pourcentage_msj'] = $_POST['pourcentage_msj'];
		$update .= ",pourcentage_msj = '" . $_SESSION['pourcentage_msj'] . "'";


		$c = 100;
		//on recupère les valeurs; sans tester les valeurs, car on utilisera une fonction de valeurs pas défaut
		$contention_msg = $_SESSION['contention_msg'];
		$debitul_msg = $_SESSION['debitul_msg'];
		$debitdl_msg = $_SESSION['debitdl_msg'];
		$pourcentage_msg = $_SESSION['pourcentage_msg'];

		$contention_inf = $_SESSION['contention_inf'];
		$debitul_inf = $_SESSION['debitul_inf'];
		$debitdl_inf = $_SESSION['debitdl_inf'];
		$pourcentage_inf = $_SESSION['pourcentage_inf'];

		$contention_jeu = $_SESSION['contention_jeu'];
		$debitul_jeu = $_SESSION['debitul_jeu'];
		$debitdl_jeu = $_SESSION['debitdl_jeu'];
		$pourcentage_jeu = $_SESSION['pourcentage_jeu'];

		$contention_mc = $_SESSION['contention_mc'];
		$debitul_mc = $_SESSION['debitul_mc'];
		$debitdl_mc = $_SESSION['debitdl_mc'];
		$pourcentage_mc = $_SESSION['pourcentage_mc'];

		$contention_sic = $_SESSION['contention_sic'];
		$debitul_sic = $_SESSION['debitul_sic'];
		$debitdl_sic = $_SESSION['debitdl_sic'];
		$pourcentage_sic = $_SESSION['pourcentage_sic'];

		$contention_nav = $_SESSION['contention_nav'];
		$debitul_nav = $_SESSION['debitul_nav'];
		$debitdl_nav = $_SESSION['debitdl_nav'];
		$pourcentage_nav = $_SESSION['pourcentage_nav'];

		$contention_per = $_SESSION['contention_per'];
		$debitul_per = $_SESSION['debitul_per'];
		$debitdl_per = $_SESSION['debitdl_per'];
		$pourcentage_per = $_SESSION['pourcentage_per'];

		$contention_tv = $_SESSION['contention_tv'];
		$debitul_tv = $_SESSION['debitul_tv'];
		$debitdl_tv = $_SESSION['debitdl_tv'];
		$pourcentage_tv = $_SESSION['pourcentage_tv'];

		$contention_rd = $_SESSION['contention_rd'];
		$debitul_rd = $_SESSION['debitul_rd'];
		$debitdl_rd = $_SESSION['debitdl_rd'];
		$pourcentage_rd = $_SESSION['pourcentage_rd'];

		$contention_voix = $_SESSION['contention_voix'];
		$debitul_voix = $_SESSION['debitul_voix'];
		$debitdl_voix = $_SESSION['debitdl_voix'];
		$pourcentage_voix = $_SESSION['pourcentage_voix'];

		$contention_msj = $_SESSION['contention_msj'];
		$debitul_msj = $_SESSION['debitul_msj'];
		$debitdl_msj = $_SESSION['debitdl_msj'];
		$pourcentage_msj = $_SESSION['pourcentage_msj'];
		//--------------------------------NOMBRE D'ABONNES DE LA ZONE------------------------------------------------------------
		$nbo = $_SESSION['densite_zone'];
		$nb = 0.65 * $nbo;
		$nbb = $_SESSION['surface_zone'];
		$nombre_abonnes = $nb * $nbb;
		$_SESSION['nombre_ab'] = $nombre_abonnes;
		$_SESSION['nbre_hbt'] = $nbo * $nbb;
		$_SESSION['p_ab'] = $nombre_abonnes / $_SESSION['nbre_hbt'];
		//---------------------------NOMBRE D'ABONNES POUR CHAQUE SERVICE---------------------------------------------------
		$n = $nombre_abonnes / 100;
		//----------------service messagerie-----------------------
		$nbre_ab_msg = $pourcentage_msg * $n;
		//-------------------------service informations payantes
		$nbre_ab_inf = $pourcentage_inf * $n;
		//------------------SERVICE JEUX--------------------------------------------------
		$nbre_ab_jeux = $pourcentage_jeu * $n;
		//---------------------service mcommerce--------------------------------------
		$nbre_ab_mc = $pourcentage_mc * $n;
		//service muique-------------------------
		$nbre_ab_sic = $pourcentage_sic * $n;
		//service navigation------------------------------------------
		$nbre_ab_nav = $pourcentage_nav * $n;
		//service personalisation
		$nbre_ab_per = $pourcentage_per * $n;
		//service tv/video
		$nbre_ab_tv = $pourcentage_tv * $n;
		//service réseaux de données 
		$nbre_ab_rd = $pourcentage_rd * $n;
		///service voix 
		$nbre_ab_voix = $pourcentage_voix * $n;
		//service massagerie jointe
		$nbre_ab_msj = $pourcentage_msj * $n;
		//--------------------------DEBIT PAR ABONNE POUR CHAQUE SERVICE EN UL---------------------------------------------
		$debit_ab_msg_ul = $contention_msg * ($debitul_msg / 100); //service messagerie
		$debit_ab_inf_ul = $contention_inf * ($debitul_inf / 100); //service informations payantes
		$debit_ab_jeu_ul = $contention_jeu * $debitul_jeu / 100; //service jeux
		$debit_ab_mc_ul = $contention_mc * $debitul_mc / 100; //service du mcommerce
		$debit_ab_sic_ul = $contention_sic * $debitul_sic / 100; //service de musique
		$debit_ab_nav_ul = $contention_nav * $debitul_nav / 100; //service de navigation
		$debit_ab_per_ul = $contention_per * $debitul_per / 100; //service de peronnalisation
		$debit_ab_tv_ul = $contention_tv * $debitul_tv / 100; //service tv/video
		$debit_ab_rd_ul = $contention_rd * $debitul_rd / 100; //serice réseaus de données
		$debit_ab_msj_ul = $contention_msj * $debitul_msj / 100; //service de messagerie jointe
		//------------------------------DEBIT TOTAL DE CHAQUE SERVICE---------------------------------------------------------------------
		$debit_msg_ul = $debit_ab_msg_ul * $nbre_ab_msg; //debit total du service messagerie
		$debit_inf_ul = $debit_ab_inf_ul * $nbre_ab_inf; //service information payantes
		$debit_jeu_ul = $debit_ab_jeu_ul * $nbre_ab_jeux;
		$debit_mc_ul = $debit_ab_mc_ul * $nbre_ab_mc;
		$debit_sic_ul = $debit_ab_sic_ul * $nbre_ab_sic;
		$debit_nav_ul = $debit_ab_nav_ul * $nbre_ab_nav;
		$debit_per_ul = $debit_ab_per_ul * $nbre_ab_per;
		$debit_tv_ul = $debit_ab_tv_ul * $nbre_ab_tv;
		$debit_rd_ul = $debit_ab_rd_ul * $nbre_ab_rd;
		$debit_msj_ul = $debit_ab_msj_ul * $nbre_ab_msj;
		//--------------------------DEBIT PAR ABONNE POUR CHAQUE SERVICE EN DL---------------------------------------------
		$debit_ab_msg_dl = $contention_msg * $debitdl_msg / 100; //service messagerie
		$debit_ab_inf_dl = $contention_inf * $debitdl_inf / 100; //service informations payantes
		$debit_ab_jeu_dl = $contention_jeu * $debitdl_jeu / 100; //service jeux
		$debit_ab_mc_dl = $contention_mc * $debitdl_mc / 100; //service du mcommerce
		$debit_ab_sic_dl = $contention_sic * $debitdl_sic / 100; //service de musique
		$debit_ab_nav_dl = $contention_nav * $debitdl_nav / 100; //service de navigation
		$debit_ab_per_dl = $contention_per * $debitdl_per / 100; //service de peronnalisation
		$debit_ab_tv_dl = $contention_tv * $debitdl_tv / 100; //service tv/video
		$debit_ab_rd_dl = $contention_rd * $debitdl_rd / 100; //serice réseaus de données
		$debit_ab_msj_dl = $contention_msj * $debitdl_msj / 100; //service de messagerie jointe
		//------------------------------DEBIT TOTAL DE CHAQUE SERVICE---------------------------------------------------------------------
		$debit_msg_dl = $debit_ab_msg_dl * $nbre_ab_msg; //debit total du service messagerie
		$debit_inf_dl = $debit_ab_inf_dl * $nbre_ab_inf; //service inromation payantes
		$debit_jeu_dl = $debit_ab_jeu_dl * $nbre_ab_jeux;
		$debit_mc_dl = $debit_ab_mc_dl * $nbre_ab_mc;
		$debit_sic_dl = $debit_ab_sic_dl * $nbre_ab_sic;
		$debit_nav_dl = $debit_ab_nav_dl * $nbre_ab_nav;
		$debit_per_dl = $debit_ab_per_dl * $nbre_ab_per;
		$debit_tv_dl = $debit_ab_tv_dl * $nbre_ab_tv;
		$debit_rd_dl = $debit_ab_rd_dl * $nbre_ab_rd;
		$debit_msj_dl = $debit_ab_msj_dl * $nbre_ab_msj;
		//SOMME DES DEBITS TOTAUX DES SERVICES---------------------------------------------------------
		//EN UL----------------------------
		$debit_ul = $debit_ab_msg_ul + $debit_inf_ul + $debit_jeu_ul + $debit_mc_ul + $debit_sic_ul + $debit_nav_ul + $debit_per_ul + $debit_tv_ul + $debit_rd_ul + $debit_msj_ul;
		$_SESSION['debit_ul'] = $debit_ul / 2727;
		$update .= ",debit_ul = '" . $_SESSION['debit_ul'] . "'";
		//EN DL-----------------------
		$debit_dl = $debit_msg_dl + $debit_inf_dl + $debit_jeu_dl + $debit_mc_dl + $debit_sic_dl + $debit_nav_dl + $debit_per_dl + $debit_tv_dl + $debit_rd_dl + $debit_msj_dl;
		$_SESSION['debit_dl'] = $debit_dl / 2727;
		$update .= ",debit_dl = '" . $_SESSION['debit_dl'] . "'";
		//NOMBRE D'ABONNES EN UL PAR SITE--------------------------------------------
		$no = $_SESSION['debit_uplink'];
		$nop = $_SESSION['debit_downlink'];
		$nbre_ab_ul = $debit_ul / ($no * 1000);
		$nbre_ab_dl = $debit_dl / ($nop * 1000);
		//NOMBRE DE SITE EN UL ET EN DL
		$nbre_site_ul = round($nombre_abonnes / $nbre_ab_ul);
		$nbre_site_dl = round($nombre_abonnes / $nbre_ab_dl);
		$nombre_site = min($nbre_site_ul, $nbre_site_dl);
		$_SESSION['nombre_site'] = $nombre_site;
		$update .= ",nombre_site = '" . $_SESSION['nombre_site'] . "'";
		$_SESSION['couverture'] = "ok";
		$update .= ",couverture = '" . $_SESSION['couverture'] . "'";
		$_SESSION['capacite'] = 'ok';
		$update .= ",capacite = '" . $_SESSION['capacite'] . "'";
		$_SESSION['capex'] = '';
		$update .= ",capex = '" . $_SESSION['capex'] . "'";
		$_SESSION['opex'] = '';
		$update .= ",opex = '" . $_SESSION['opex'] . "'";
		$_SESSION['cartographie'] = '';
		$update .= ",cartographie = '" . $_SESSION['cartographie'] . "'";
		$_SESSION['interface_x1_s2'] = '';
		$update .= ",interface_x1_s2 = '" . $_SESSION['interface_x1_s2'] . "'";
		$_SESSION['bbu'] = '';
		$update .= ",bbu = '" . $_SESSION['bbu'] . "'";
		$_SESSION['bbu1'] = '';
		$update .= ",bbu1 = '" . $_SESSION['bbu1'] . "'";
		mysqli_query($connexionBD, "update projet SET $update, date_modification=NOW() WHERE id = " . $_SESSION["projet"]);
	} else {
		$message = $veuillez_remplir_tous_les_champs;
	}
} else if (isset($_POST["defaut_capacite"])) {
	$_POST['contention_msg'] = "25";
	$_POST['debitul_msg'] = "256";
	$_POST['debitdl_msg'] = "256";
	$_POST['pourcentage_msg'] = "80";
	$_POST['contention_inf'] = "40";
	$_POST['debitul_inf'] = "256";
	$_POST['debitdl_inf'] = "1024";
	$_POST['pourcentage_inf'] = "40";
	$_POST['contention_jeu'] = "20";
	$_POST['debitul_jeu'] = "50";
	$_POST['debitdl_jeu'] = "85";
	$_POST['pourcentage_jeu'] = "35";
	$_POST['contention_mc'] = "50";
	$_POST['debitul_mc'] = "128";
	$_POST['debitdl_mc'] = "256";
	$_POST['pourcentage_mc'] = "25";
	$_POST['contention_sic'] = "1";
	$_POST['debitul_sic'] = "1024";
	$_POST['debitdl_sic'] = "256";
	$_POST['pourcentage_sic'] = "70";
	$_POST['contention_nav'] = "25";
	$_POST['debitul_nav'] = "128";
	$_POST['debitdl_nav'] = "512";
	$_POST['pourcentage_nav'] = "100";
	$_POST['contention_per'] = "10";
	$_POST['debitul_per'] = "256";
	$_POST['debitdl_per'] = "512";
	$_POST['pourcentage_per'] = "80";
	$_POST['contention_rd'] = "1";
	$_POST['debitul_rd'] = "32";
	$_POST['debitdl_rd'] = "1800";
	$_POST['pourcentage_rd'] = "60";
	$_POST['contention_tv'] = "50";
	$_POST['debitul_tv'] = "256";
	$_POST['debitdl_tv'] = "512";
	$_POST['pourcentage_tv'] = "30";
	$_POST['contention_voix'] = "98";
	$_POST['debitul_voix'] = "512";
	$_POST['debitdl_voix'] = "512";
	$_POST['pourcentage_voix'] = "99";
	$_POST['contention_msj'] = "25";
	$_POST['debitul_msj'] = "512";
	$_POST['debitdl_msj'] = "512";
	$_POST['pourcentage_msj'] = "80";
} else if (isset($_POST["interface"])) {
	$message = "";
	foreach ($_POST as $key => $post) {
		if ($post == '') {
			$erreur = true;
			break;
		}
	}
	if (!isset($erreur)) {
		$_SESSION['heure_occ'] = $_POST['heure_occ'];
		$update = "heure_occ = '" . $_SESSION['heure_occ'] . "'";
		$_SESSION['trafic_UL_DL'] = $_POST['trafic_UL_DL'];
		$update .= ",trafic_UL_DL = '" . $_SESSION['trafic_UL_DL'] . "'";
		$_SESSION['T_R_UL'] = $_POST['T_R_UL'];
		$update .= ",T_R_UL = '" . $_SESSION['T_R_UL'] . "'";
		$_SESSION['T_R_DL'] = $_POST['T_R_DL'];
		$update .= ",T_R_DL = '" . $_SESSION['T_R_DL'] . "'";
		$_SESSION['trafic_moy'] = $_POST['trafic_moy'];
		$update .= ",trafic_moy = '" . $_SESSION['trafic_moy'] . "'";
		$_SESSION['abon_par_eNodeB'] = $_POST['abon_par_eNodeB'];
		$update .= ",abon_par_eNodeB = '" . $_SESSION['abon_par_eNodeB'] . "'";
		$_SESSION['ER'] = $_POST['ER'];
		$update .= ",ER = '" . $_SESSION['ER'] . "'";

		$heure_occ = $_SESSION['heure_occ'];
		$trafic_UL_DL = $_SESSION['trafic_UL_DL'];
		$T_R_UL = $_SESSION['T_R_UL'];
		$T_R_DL = $_SESSION['T_R_DL'];
		$trafic_moy = $_SESSION['trafic_moy'];
		$abon_par_eNodeB = $_SESSION['abon_par_eNodeB'];
		$ER = $_SESSION['ER'];
		// CALCULS
		$BH_Data_Trafic_subs_UL = round(($heure_occ * $T_R_UL / 100) * 1000) / 1000;
		$BH_Data_Trafic_subs_DL = round(($heure_occ * $T_R_DL / 100) * 1000) / 1000;
		$Data_Trafic_Throughput_subs_UL = round(($BH_Data_Trafic_subs_UL * $ER) * 1000) / 1000;
		$Data_Trafic_Throughput_subs_DL = round(($BH_Data_Trafic_subs_DL * $ER) * 1000) / 1000;
		$T_UL_Data_trafic_subs = round(($Data_Trafic_Throughput_subs_UL * $trafic_moy) * 1000) / 1000;
		$T_DL_Data_trafic_subs = round(($Data_Trafic_Throughput_subs_DL * $trafic_moy) * 1000) / 1000;
		$T_UL_user_plane_subs = round(($T_UL_Data_trafic_subs * $abon_par_eNodeB) * 1000) / 1000;
		$T_DL_user_plane_subs = round(($T_DL_Data_trafic_subs * $abon_par_eNodeB) * 1000) / 1000;
		$T_Total_user_plane_subs = round(((int)($T_UL_user_plane_subs) + (int)($T_DL_user_plane_subs)) / 1000 * 1000) / 1000;

		$plan_control = round(($T_Total_user_plane_subs * 2 / 100) * 1000) / 1000;
		$S1_bandW = round(((float)($plan_control) + (float)($T_Total_user_plane_subs)) * 1000) / 1000;
		$X2_bandW = round(($S1_bandW * 3 / 100) * 1000) / 1000;

		$_SESSION['BH_Data_Trafic_subs_UL'] = $BH_Data_Trafic_subs_UL;
		$update .= ",BH_Data_Trafic_subs_UL = '" . $_SESSION['BH_Data_Trafic_subs_UL'] . "'";
		$_SESSION['BH_Data_Trafic_subs_DL'] = $BH_Data_Trafic_subs_DL;
		$update .= ",BH_Data_Trafic_subs_DL = '" . $_SESSION['BH_Data_Trafic_subs_DL'] . "'";
		$_SESSION['Data_Trafic_Throughput_subs_UL'] = $Data_Trafic_Throughput_subs_UL;
		$update .= ",Data_Trafic_Throughput_subs_UL = '" . $_SESSION['Data_Trafic_Throughput_subs_UL'] . "'";
		$_SESSION['Data_Trafic_Throughput_subs_DL'] = $Data_Trafic_Throughput_subs_DL;
		$update .= ",Data_Trafic_Throughput_subs_DL = '" . $_SESSION['Data_Trafic_Throughput_subs_DL'] . "'";
		$_SESSION['T_UL_Data_trafic_subs'] = $T_UL_Data_trafic_subs;
		$update .= ",T_UL_Data_trafic_subs = '" . $_SESSION['T_UL_Data_trafic_subs'] . "'";
		$_SESSION['T_DL_Data_trafic_subs'] = $T_DL_Data_trafic_subs;
		$update .= ",T_DL_Data_trafic_subs = '" . $_SESSION['T_DL_Data_trafic_subs'] . "'";
		$_SESSION['T_UL_user_plane_subs'] = $T_UL_user_plane_subs;
		$update .= ",T_UL_user_plane_subs = '" . $_SESSION['T_UL_user_plane_subs'] . "'";
		$_SESSION['T_DL_user_plane_subs'] = $T_DL_user_plane_subs;
		$update .= ",T_DL_user_plane_subs = '" . $_SESSION['T_DL_user_plane_subs'] . "'";
		$_SESSION['T_Total_user_plane_subs'] = $T_Total_user_plane_subs;
		$update .= ",T_Total_user_plane_subs = '" . $_SESSION['T_Total_user_plane_subs'] . "'";
		$_SESSION['plan_control'] = $plan_control;
		$update .= ",plan_control = '" . $_SESSION['plan_control'] . "'";
		$_SESSION['S1_bandW'] = $S1_bandW;
		$update .= ",S1_bandW = '" . $_SESSION['S1_bandW'] . "'";
		$_SESSION['X2_bandW'] = $X2_bandW;
		$update .= ",X2_bandW = '" . $_SESSION['X2_bandW'] . "'";

		if (!isset($_SESSION['couverture'])) {
			$_SESSION['couverture'] = "";
		}
		$update .= ",couverture = '" . $_SESSION['couverture'] . "'";
		if (!isset($_SESSION['capacite'])) {
			$_SESSION['capacite'] = '';
		}
		$update .= ",capacite = '" . $_SESSION['capacite'] . "'";
		if (!isset($_SESSION['capex'])) {
			$_SESSION['capex'] = '';
		}
		$update .= ",capex = '" . $_SESSION['capex'] . "'";
		if (!isset($_SESSION['opex'])) {
			$_SESSION['opex'] = '';
		}
		$update .= ",opex = '" . $_SESSION['opex'] . "'";
		if (!isset($_SESSION['cartographie'])) {
			$_SESSION['cartographie'] = '';
		}
		$update .= ",cartographie = '" . $_SESSION['cartographie'] . "'";
		$_SESSION['interface_x1_s2'] = 'ok';
		$update .= ",interface_x1_s2 = '" . $_SESSION['interface_x1_s2'] . "'";
		if (!isset($_SESSION['bbu'])) {
			$_SESSION['bbu'] = '';
		}
		$update .= ",bbu = '" . $_SESSION['bbu'] . "'";
		if (!isset($_SESSION['bbu1'])) {
			$_SESSION['bbu1'] = '';
		}
		$update .= ",bbu1 = '" . $_SESSION['bbu1'] . "'";
		mysqli_query($connexionBD, "update projet SET $update, date_modification=NOW() WHERE id = " . $_SESSION["projet"]);
	} else {
		$message = $veuillez_remplir_tous_les_champs;
	}
} else if (isset($_POST["defaut_interface"])) {
	$_POST['heure_occ'] = "25";
	$_POST['trafic_UL_DL'] = "0.25";
	$_POST['T_R_UL'] = "20";
	$_POST['T_R_DL'] = "80";
	$_POST['trafic_moy'] = "1.2";
	$_POST['abon_par_eNodeB'] = "1000";
	$_POST['ER'] = "1.37";
} else if (isset($_POST["defaut_combinePlatform1"])) {
	$_POST['heure_occ'] = "25";
	$_POST['trafic_UL_DL'] = "0.25";
	$_POST['T_R_UL'] = "20";
	$_POST['T_R_DL'] = "80";
	$_POST['trafic_moy'] = "1.2";
	$_POST['abon_par_eNodeB'] = "1000";
	$_POST['ER'] = "1.37";
} else if (isset($_POST["cpri"])) {
	$message = "";
	foreach ($_POST as $key => $post) {
		if ($post == '') {
			$erreur = true;
			break;
		}
	}
	if (!isset($erreur)) {
		$debit_dl = $_SESSION['debit_dl'];
		$bp_cellule = $_SESSION['bp_cellule'];
		$type_site = $_SESSION['type_site'];
		switch ($bp_cellule) {
			case '1.25':
				$c_axc = '0.0576';
				break;
			case '2.5':
				$c_axc = '0.1152';
				break;
			case '5':
				$c_axc = '0.2304';
				break;
			case '10':
				$c_axc = '0.4608';
				break;
			case '15':
				$c_axc = '0.6912';
				break;
			case '20':
				$c_axc = '0.9216';
				break;
		}
		$n_axc = round($debit_dl / $c_axc / 1000);
		$c_cpri = cap_cpri($bp_cellule, $n_axc);
		$nb = 0;
		switch ($type_site) {
			case 'Omnidirectionnel':
				$nb = 1;
				break;
			case 'Bisectoriel':
				$nb = 2;
				break;
			case 'Trisectoriel':
				$nb = 3;
				break;
		}
		$c_cpri_site = $c_cpri * $nb;

		$_SESSION['c_axc'] = $c_axc;
		$update = "c_axc = '" . $_SESSION['c_axc'] . "'";
		$_SESSION['n_axc'] = $n_axc;
		$update .= ",n_axc = '" . $_SESSION['n_axc'] . "'";
		$_SESSION['c_cpri'] = $c_cpri;
		$update .= ",c_cpri = '" . $_SESSION['c_cpri'] . "'";
		$_SESSION['c_cpri_site'] = $c_cpri_site;
		$update .= ",c_cpri_site = '" . $_SESSION['c_cpri_site'] . "'";

		$_SESSION['couverture'] = "ok";
		$update .= ",couverture = '" . $_SESSION['couverture'] . "'";
		$_SESSION['capacite'] = "ok";
		$update .= ",capacite = '" . $_SESSION['capacite'] . "'";
		$_SESSION['capex'] = '';
		$update .= ",capex = '" . $_SESSION['capex'] . "'";
		$_SESSION['opex'] = '';
		$update .= ",opex = '" . $_SESSION['opex'] . "'";
		if (!isset($_SESSION['cartographie'])) {
			$_SESSION['cartographie'] = '';
		}
		$update .= ",cartographie = '" . $_SESSION['cartographie'] . "'";
		if (!isset($_SESSION['interface_x1_s2'])) {
			$_SESSION['interface_x1_s2'] = '';
		}
		$update .= ",interface_x1_s2 = '" . $_SESSION['interface_x1_s2'] . "'";
		$_SESSION['bbu'] = 'ok';
		$update .= ",bbu = '" . $_SESSION['bbu'] . "'";
		if (!isset($_SESSION['bbu1'])) {
			$_SESSION['bbu1'] = '';
		}
		$update .= ",bbu1 = '" . $_SESSION['bbu1'] . "'";
		mysqli_query($connexionBD, "update projet SET $update, date_modification=NOW() WHERE id = " . $_SESSION["projet"]);
	} else {
		$message = $veuillez_remplir_tous_les_champs;
	}
} else if (isset($_POST["bbu1"])) {
	$message = "";
	foreach ($_POST as $key => $post) {
		if ($post == '') {
			$erreur = true;
			break;
		}
	}
	if (!isset($erreur)) {
		$_SESSION['type_topo'] = $_POST['type_topo'];
		$update = "type_topo = '" . $_SESSION['type_topo'] . "'";
		if (isset($_POST['nombre_canaux'])) $_SESSION['nombre_canaux'] = $_POST['nombre_canaux'];
		$_SESSION['sensibilite_recepteur'] = $_POST['sensibilite_recepteur'];
		$update .= ",sensibilite_recepteur = '" . $_SESSION['sensibilite_recepteur'] . "'";
		$_SESSION['fenetre_optique'] = $_POST['fenetre_optique'];
		$update .= ",fenetre_optique = '" . $_SESSION['fenetre_optique'] . "'";
		$_SESSION['puissance_emission'] = $_POST['puissance_emission'];
		$update .= ",puissance_emission = '" . $_SESSION['puissance_emission'] . "'";
		$_SESSION['type_fibre'] = $_POST['type_fibre'];
		$update .= ",type_fibre = '" . $_SESSION['type_fibre'] . "'";
		$_SESSION['connecteurs_optiques'] = $_POST['connecteurs_optiques'];
		$update .= ",connecteurs_optiques = '" . $_SESSION['connecteurs_optiques'] . "'";
		$_SESSION['distance_transport'] = $_POST['distance_transport'];
		$update .= ",distance_transport = '" . $_SESSION['distance_transport'] . "'";
		$_SESSION['attenuation_lineaire'] = $_POST['attenuation_lineaire'];
		$update .= ",attenuation_lineaire = '" . $_SESSION['attenuation_lineaire'] . "'";
		$_SESSION['attenuation_connecteur_optique'] = $_POST['attenuation_connecteur_optique'];
		$update .= ",attenuation_connecteur_optique = '" . $_SESSION['attenuation_connecteur_optique'] . "'";

		$type_topo = $_SESSION['type_topo'];
		$nombre_canaux = $_SESSION['nombre_canaux'];
		$sensibilite_recepteur = $_SESSION['sensibilite_recepteur'];
		$fenetre_optique = $_SESSION['fenetre_optique'];
		$puissance_emission = $_SESSION['puissance_emission'];
		$type_fibre = $_SESSION['type_fibre'];
		$connecteurs_optiques = $_SESSION['connecteurs_optiques'];
		$distance_transport = $_SESSION['distance_transport'];
		$attenuation_lineaire = $_SESSION['attenuation_lineaire'];
		$attenuation_connecteur_optique = $_SESSION['attenuation_connecteur_optique'];
		$type_site = $_SESSION['type_site'];
		$nombre_site = $_SESSION['nombre_site'];
		switch ($type_site) {
			case 'Omnidirectionnel':
				$nb = 1;
				break;
			case 'Bisectoriel':
				$nb = 2;
				break;
			case 'Trisectoriel':
				$nb = 3;
				break;
		}
		$attenuation_totale = $puissance_emission - $sensibilite_recepteur - $attenuation_lineaire * $distance_transport - 2 * $attenuation_connecteur_optique;
		if ($type_topo == 'p2p') {
			$nombre_canaux = 3;
			$_SESSION['nombre_canaux'] = $nombre_canaux;
			$capacite_equipements = $_SESSION['c_cpri_site'];
		} else {
			$capacite_equipements = $_SESSION['c_cpri_site'] * $nombre_canaux / 3;
		}
		$update .= ",nombre_canaux = '" . $_SESSION['nombre_canaux'] . "'";
		$nombre_equipements = $nb * $nombre_site / $nombre_canaux;
		$nombre_equipements = ceil($nombre_equipements);

		$_SESSION['attenuation_totale'] = $attenuation_totale;
		$update .= ",attenuation_totale = '" . $_SESSION['attenuation_totale'] . "'";
		$_SESSION['nombre_equipements'] = $nombre_equipements;
		$update .= ",nombre_equipements = '" . $_SESSION['nombre_equipements'] . "'";
		$_SESSION['capacite_equipements'] = $capacite_equipements;
		$update .= ",capacite_equipements = '" . $_SESSION['capacite_equipements'] . "'";

		$_SESSION['couverture'] = "ok";
		$update .= ",couverture = '" . $_SESSION['couverture'] . "'";
		$_SESSION['capacite'] = 'ok';
		$update .= ",capacite = '" . $_SESSION['capacite'] . "'";
		$_SESSION['capex'] = '';
		$update .= ",capex = '" . $_SESSION['capex'] . "'";
		$_SESSION['opex'] = '';
		$update .= ",opex = '" . $_SESSION['opex'] . "'";
		if (!isset($_SESSION['cartographie'])) {
			$_SESSION['cartographie'] = '';
		}
		$update .= ",cartographie = '" . $_SESSION['cartographie'] . "'";
		if (!isset($_SESSION['interface_x1_s2'])) {
			$_SESSION['interface_x1_s2'] = '';
		}
		$update .= ",interface_x1_s2 = '" . $_SESSION['interface_x1_s2'] . "'";
		$_SESSION['bbu'] = 'ok';
		$update .= ",bbu = '" . $_SESSION['bbu'] . "'";
		$_SESSION['bbu1'] = 'ok';
		$update .= ",bbu1 = '" . $_SESSION['bbu1'] . "'";
		mysqli_query($connexionBD, "update projet SET $update, date_modification=NOW() WHERE id = " . $_SESSION["projet"]);
	} else {
		$message = $veuillez_remplir_tous_les_champs;
	}
} else if (isset($_POST["defaut_bbu1"])) {
	$_POST['type_topo'] = "anneau";
	$_POST['nombre_canaux'] = "18";
	$_POST['sensibilite_recepteur'] = "-30";
	$_POST['fenetre_optique'] = "1550";
	$_POST['puissance_emission'] = "20";
	$_POST['type_fibre'] = "monomode";
	$_POST['attenuation_lineaire'] = "0.2";
	$_POST['attenuation_connecteur_optique'] = "0.35";
	$_POST['connecteurs_optiques'] = "SC";
	$_POST['distance_transport'] = "100";
} else if (isset($_POST["capex"])) {
	$message = "";
	foreach ($_POST as $key => $post) {
		if ($post == '') {
			$erreur = true;
			break;
		}
	}
	if (!isset($erreur)) {
		$_SESSION['ing_radio'] = $_POST['ing_radio'];
		$update = "ing_radio = '" . $_SESSION['ing_radio'] . "'";
		$_SESSION['ing_reseau'] = $_POST['ing_reseau'];
		$update .= ",ing_reseau = '" . $_SESSION['ing_reseau'] . "'";
		$_SESSION['rech_four'] = $_POST['rech_four'];
		$update .= ",rech_four = '" . $_SESSION['rech_four'] . "'";
		$_SESSION['rech_site'] = $_POST['rech_site'];
		$update .= ",rech_site = '" . $_SESSION['rech_site'] . "'";
		$_SESSION['rout_ser_pass'] = $_POST['rout_ser_pass'];
		$update .= ",rout_ser_pass = '" . $_SESSION['rout_ser_pass'] . "'";
		$_SESSION['inf_ip'] = $_POST['inf_ip'];
		$update .= ",inf_ip = '" . $_SESSION['inf_ip'] . "'";
		$_SESSION['log_appli'] = $_POST['log_appli'];
		$update .= ",log_appli = '" . $_SESSION['log_appli'] . "'";
		$_SESSION['inf_voip'] = $_POST['inf_voip'];
		$update .= ",inf_voip = '" . $_SESSION['inf_voip'] . "'";
		$_SESSION['bs_ant'] = $_POST['bs_ant'];
		$update .= ",bs_ant = '" . $_SESSION['bs_ant'] . "'";
		$_SESSION['fh_fob_cab'] = $_POST['fh_fob_cab'];
		$update .= ",fh_fob_cab = '" . $_SESSION['fh_fob_cab'] . "'";
		$_SESSION['loc_sit'] = $_POST['loc_sit'];
		$update .= ",loc_sit = '" . $_SESSION['loc_sit'] . "'";
		$_SESSION['aq_terr'] = $_POST['aq_terr'];
		$update .= ",aq_terr = '" . $_SESSION['aq_terr'] . "'";
		$_SESSION['travaux'] = $_POST['travaux'];
		$update .= ",travaux = '" . $_SESSION['travaux'] . "'";
		$_SESSION['electrique'] = $_POST['electrique'];
		$update .= ",electrique = '" . $_SESSION['electrique'] . "'";
		$_SESSION['inst_sit'] = $_POST['inst_sit'];
		$update .= ",inst_sit = '" . $_SESSION['inst_sit'] . "'";
		$_SESSION['rac_elec'] = $_POST['rac_elec'];
		$update .= ",rac_elec = '" . $_SESSION['rac_elec'] . "'";
		$_SESSION['rac_ip'] = $_POST['rac_ip'];
		$update .= ",rac_ip = '" . $_SESSION['rac_ip'] . "'";
		$_SESSION['loc_mob'] = $_POST['loc_mob'];
		$update .= ",loc_mob = '" . $_SESSION['loc_mob'] . "'";
		$_SESSION['suiv_proj'] = $_POST['suiv_proj'];
		$update .= ",suiv_proj = '" . $_SESSION['suiv_proj'] . "'";
		$ing_radio = $_SESSION['ing_radio'];
		$ing_reseau = $_SESSION['ing_reseau'];
		$rech_four = $_SESSION['rech_four'];
		$rech_site = $_SESSION['rech_site'];
		$s1 = $ing_radio + $ing_reseau + $rech_four + $rech_site;
		$_SESSION['s1'] = $s1;
		$update .= ",s1 = '" . $_SESSION['s1'] . "'";
		$rout_ser_pass = $_SESSION['rout_ser_pass'];
		$inf_ip = $_SESSION['inf_ip'];
		$log_appli = $_SESSION['log_appli'];
		$inf_voip = $_SESSION['inf_voip'];
		$bs_ant = $_SESSION['bs_ant'];
		$fh_fob_cab = $_SESSION['fh_fob_cab'];
		$bs = $_SESSION['nombre_enodeb'];
		$s2 = $rout_ser_pass + $inf_ip + $log_appli + $inf_voip + ($bs * $bs_ant) + ($bs * $fh_fob_cab);
		$_SESSION['s2'] = $s2;
		$update .= ",s2 = '" . $_SESSION['s2'] . "'";
		$loc_sit = $_SESSION['loc_sit'];
		$nb_sit_lou = $_SESSION['nombre_site'];
		$aq_terr = $_SESSION['aq_terr'];
		$travaux = $_SESSION['travaux'];
		$electrique = $_SESSION['electrique'];
		$inst_sit = $_SESSION['inst_sit'];
		$rac_elec = $_SESSION['rac_elec'];
		$rac_ip = $_SESSION['rac_ip'];

		$s3 = ($loc_sit * $nb_sit_lou) + (($aq_terr + $travaux + $electrique) * ($bs - $nb_sit_lou)) + (($inst_sit + $rac_elec + $rac_ip) * $bs);
		$_SESSION['s3'] = $s3;
		$update .= ",s3 = '" . $_SESSION['s3'] . "'";
		$loc_mob = $_SESSION['loc_mob'];
		$suiv_proj = $_SESSION['suiv_proj'];
		$s4 = $loc_mob + $suiv_proj;
		$_SESSION['s4'] = $s4;
		$update .= ",s4 = '" . $_SESSION['s4'] . "'";
		$capexval = $s1 + $s2 + $s3 + $s4;
		$_SESSION['capexval'] = $capexval;
		$update .= ",capexval = '" . $_SESSION['capexval'] . "'";
		$_SESSION['loc_sit_total'] = $loc_sit * $nb_sit_lou;
		$update .= ",loc_sit_total = '" . $_SESSION['loc_sit_total'] . "'";
		$_SESSION['couverture'] = "ok";
		$update .= ",couverture = '" . $_SESSION['couverture'] . "'";
		$_SESSION['capacite'] = 'ok';
		$update .= ",capacite = '" . $_SESSION['capacite'] . "'";
		$_SESSION['capex'] = 'ok';
		$update .= ",capex = '" . $_SESSION['capex'] . "'";
		$_SESSION['opex'] = '';
		$update .= ",opex = '" . $_SESSION['opex'] . "'";
		if (!isset($_SESSION['cartographie'])) {
			$_SESSION['cartographie'] = '';
		}
		$update .= ",cartographie = '" . $_SESSION['cartographie'] . "'";
		if (!isset($_SESSION['interface_x1_s2'])) {
			$_SESSION['interface_x1_s2'] = '';
		}
		$update .= ",interface_x1_s2 = '" . $_SESSION['interface_x1_s2'] . "'";
		$_SESSION['bbu'] = 'ok';
		$update .= ",bbu = '" . $_SESSION['bbu'] . "'";
		$_SESSION['bbu1'] = 'ok';
		$update .= ",bbu1 = '" . $_SESSION['bbu1'] . "'";
		mysqli_query($connexionBD, "update projet SET $update, date_modification=NOW() WHERE id = " . $_SESSION["projet"]);
	} else {
		$message = $veuillez_remplir_tous_les_champs;
	}
} else if (isset($_POST["defaut_capex"])) {
	$_POST['ing_radio'] = '20000000';
	$_POST['ing_reseau'] = '35000000';
	$_POST['rech_four'] = '1000000';
	$_POST['rech_site'] = '2000000';
	$_POST['rout_ser_pass'] = '2000000000';
	$_POST['inf_ip'] = '250000000';
	$_POST['log_appli'] = '25000000';
	$_POST['inf_voip'] = '250000000';
	$_POST['bs_ant'] = '75000000';
	$_POST['fh_fob_cab'] = '25000000';
	$_POST['loc_sit'] = '30000000';
	$_POST['aq_terr'] = '5000000';
	$_POST['travaux'] = '50000000';
	$_POST['electrique'] = '3000000';
	$_POST['inst_sit'] = '30000000';
	$_POST['rac_elec'] = '3000000';
	$_POST['rac_ip'] = '10000000';
	$_POST['loc_mob'] = '1000000';
	$_POST['suiv_proj'] = '20000000';
} else if (isset($_POST["opex"])) {
	$message = "";
	foreach ($_POST as $key => $post) {
		if ($post == '') {
			$erreur = true;
			break;
		}
	}
	if (!isset($erreur)) {
		$_SESSION['Editbox3'] = $_POST['Editbox3'];
		$update = "Editbox3 = '" . $_SESSION['Editbox3'] . "'";
		$_SESSION['Editbox4'] = $_POST['Editbox4'];
		$update .= ",Editbox4 = '" . $_SESSION['Editbox4'] . "'";
		$_SESSION['Editbox5'] = $_POST['Editbox5'];
		$update .= ",Editbox5 = '" . $_SESSION['Editbox5'] . "'";
		$_SESSION['Editbox17'] = $_POST['Editbox17'];
		$update .= ",Editbox17 = '" . $_SESSION['Editbox17'] . "'";
		$_SESSION['Editbox18'] = $_POST['Editbox18'];
		$update .= ",Editbox18 = '" . $_SESSION['Editbox18'] . "'";
		$_SESSION['Editbox19'] = $_POST['Editbox19'];
		$update .= ",Editbox19 = '" . $_SESSION['Editbox19'] . "'";
		$_SESSION['Editbox20'] = $_POST['Editbox20'];
		$update .= ",Editbox20 = '" . $_SESSION['Editbox20'] . "'";
		$_SESSION['Editbox21'] = $_POST['Editbox21'];
		$update .= ",Editbox21 = '" . $_SESSION['Editbox21'] . "'";
		$_SESSION['Editbox22'] = $_POST['Editbox22'];
		$update .= ",Editbox22 = '" . $_SESSION['Editbox22'] . "'";
		$_SESSION['Editbox23'] = $_POST['Editbox23'];
		$update .= ",Editbox23 = '" . $_SESSION['Editbox23'] . "'";
		$_SESSION['Editbox24'] = $_POST['Editbox24'];
		$update .= ",Editbox24 = '" . $_SESSION['Editbox24'] . "'";
		$_SESSION['Editbox25'] = $_POST['Editbox25'];
		$update .= ",Editbox25 = '" . $_SESSION['Editbox25'] . "'";
		$_SESSION['Editbox6'] = $_POST['Editbox6'];
		$update .= ",Editbox6 = '" . $_SESSION['Editbox6'] . "'";
		$_SESSION['rev_msg'] = $_POST['rev_msg'];
		$update .= ",rev_msg = '" . $_SESSION['rev_msg'] . "'";
		$_SESSION['rev_inf'] = $_POST['rev_inf'];
		$update .= ",rev_inf = '" . $_SESSION['rev_inf'] . "'";
		$_SESSION['rev_jeu'] = $_POST['rev_jeu'];
		$update .= ",rev_jeu = '" . $_SESSION['rev_jeu'] . "'";
		$_SESSION['rev_mc'] = $_POST['rev_mc'];
		$update .= ",rev_mc = '" . $_SESSION['rev_mc'] . "'";
		$_SESSION['rev_sic'] = $_POST['rev_sic'];
		$update .= ",rev_sic = '" . $_SESSION['rev_sic'] . "'";
		$_SESSION['rev_nav'] = $_POST['rev_nav'];
		$update .= ",rev_nav = '" . $_SESSION['rev_nav'] . "'";
		$_SESSION['rev_per'] = $_POST['rev_per'];
		$update .= ",rev_per = '" . $_SESSION['rev_per'] . "'";
		$_SESSION['rev_rd'] = $_POST['rev_rd'];
		$update .= ",rev_rd = '" . $_SESSION['rev_rd'] . "'";
		$_SESSION['rev_tvv'] = $_POST['rev_tvv'];
		$update .= ",rev_tvv = '" . $_SESSION['rev_tvv'] . "'";
		$_SESSION['rev_voix'] = $_POST['rev_voix'];
		$update .= ",rev_voix = '" . $_SESSION['rev_voix'] . "'";
		$_SESSION['rev_msj'] = $_POST['rev_msj'];
		$update .= ",rev_msj = '" . $_SESSION['rev_msj'] . "'";

		$nb_habit = $_SESSION['densite_zone'] * $_SESSION['surface_zone'];
		$pour_ab = 65 / 100;
		$taux_croi = $_SESSION['Editbox6'];
		$revinf = $_SESSION['rev_inf'];
		$tinf = $_SESSION['pourcentage_inf'];
		$revper = $_SESSION['rev_per'];
		$tper = $_SESSION['pourcentage_per'] / 100;
		$revmsg = $_SESSION['rev_msg'];
		$tmsg = $_SESSION['pourcentage_msg'] / 100;
		$revnav = $_SESSION['rev_nav'];
		$tnav = $_SESSION['pourcentage_nav'] / 100;
		$revsic = $_SESSION['rev_sic'];
		$tsic = $_SESSION['pourcentage_sic'] / 100;
		$revmsj = $_SESSION['rev_msj'];
		$tmsj = $_SESSION['pourcentage_msj'] / 100;
		$revmc = $_SESSION['rev_mc'];
		$tmc = $_SESSION['pourcentage_mc'] / 100;
		$revjeu = $_SESSION['rev_jeu'];
		$tjeu = $_SESSION['pourcentage_jeu'] / 100;
		$revrd = $_SESSION['rev_rd'];
		$trd = $_SESSION['pourcentage_rd'] / 100;
		$revvoix = $_SESSION['rev_voix'];
		$tvoix = $_SESSION['pourcentage_voix'] / 100;
		$revtvv = $_SESSION['rev_tvv'];
		$ttvv = $_SESSION['pourcentage_tv'] / 100;
		$market = $_SESSION['Editbox3'];
		$inter_web = $_SESSION['Editbox4'];
		$admin = $_SESSION['Editbox5'];
		$assur = $_SESSION['Editbox17'];
		$loc_sit = $_SESSION['Editbox18'];
		$loc_freq = $_SESSION['Editbox19'];
		$energ_elec = $_SESSION['Editbox20'];
		$loc_infra = $_SESSION['Editbox21'];
		$form_perso = $_SESSION['Editbox22'];
		$maint = $_SESSION['Editbox23'];
		$facture = $_SESSION['Editbox24'];
		$impot = $_SESSION['Editbox25'];

		$rcet1 = $nb_habit * $pour_ab * (($revinf * $tinf) + ($revper * $tper) + ($revmsg * $tmsg) + ($revnav * $tnav) + ($revsic * $tsic) + ($revmsj * $tmsj) + ($revmc * $tmc) + ($revjeu * $tjeu) + ($revrd * $trd) + ($revvoix * $tvoix) + ($revtvv * $ttvv)) * pow((1 + $taux_croi), 1) * 12;

		$rcet2 = $nb_habit * $pour_ab * (($revinf * $tinf) + ($revper * $tper) + ($revmsg * $tmsg) + ($revnav * $tnav) + ($revsic * $tsic) + ($revmsj * $tmsj) + ($revmc * $tmc) + ($revjeu * $tjeu) + ($revrd * $trd) + ($revvoix * $tvoix) + ($revtvv * $ttvv)) * pow((1 + $taux_croi), 2) * 12;

		$rcet3 = $nb_habit * $pour_ab * (($revinf * $tinf) + ($revper * $tper) + ($revmsg * $tmsg) + ($revnav * $tnav) + ($revsic * $tsic) + ($revmsj * $tmsj) + ($revmc * $tmc) + ($revjeu * $tjeu) + ($revrd * $trd) + ($revvoix * $tvoix) + ($revtvv * $ttvv)) * pow((1 + $taux_croi), 3) * 12;

		$rcet4 = $nb_habit * $pour_ab * (($revinf * $tinf) + ($revper * $tper) + ($revmsg * $tmsg) + ($revnav * $tnav) + ($revsic * $tsic) + ($revmsj * $tmsj) + ($revmc * $tmc) + ($revjeu * $tjeu) + ($revrd * $trd) + ($revvoix * $tvoix) + ($revtvv * $ttvv)) * pow((1 + $taux_croi), 4) * 12;

		$rcet5 = $nb_habit * $pour_ab * (($revinf * $tinf) + ($revper * $tper) + ($revmsg * $tmsg) + ($revnav * $tnav) + ($revsic * $tsic) + ($revmsj * $tmsj) + ($revmc * $tmc) + ($revjeu * $tjeu) + ($revrd * $trd) + ($revvoix * $tvoix) + ($revtvv * $ttvv)) * pow((1 + $taux_croi), 5) * 12;


		$_SESSION['rcet1'] = $rcet1;
		$update .= ",rcet1 = '" . $_SESSION['rcet1'] . "'";
		$_SESSION['rcet2'] = $rcet2;
		$update .= ",rcet2 = '" . $_SESSION['rcet2'] . "'";
		$_SESSION['rcet3'] = $rcet3;
		$update .= ",rcet3 = '" . $_SESSION['rcet3'] . "'";
		$_SESSION['rcet4'] = $rcet4;
		$update .= ",rcet4 = '" . $_SESSION['rcet4'] . "'";
		$_SESSION['rcet5'] = $rcet5;
		$update .= ",rcet5 = '" . $_SESSION['rcet5'] . "'";
		$opex1 =  $market + $inter_web + $admin + $assur + $loc_sit + $loc_freq + $energ_elec + $loc_infra + $form_perso + $maint + ($facture * pow((1 + $taux_croi), 1)) + ($impot * $rcet1);
		$opex2 =  $market + $inter_web + $admin + $assur + $loc_sit + $loc_freq + $energ_elec + $loc_infra + $form_perso + $maint + ($facture * pow((1 + $taux_croi), 2)) + ($impot * $rcet2);
		$opex3 =  $market + $inter_web + $admin + $assur + $loc_sit + $loc_freq + $energ_elec + $loc_infra + $form_perso + $maint + ($facture * pow((1 + $taux_croi), 3)) + ($impot * $rcet3);
		$opex4 =  $market + $inter_web + $admin + $assur + $loc_sit + $loc_freq + $energ_elec + $loc_infra + $form_perso + $maint + ($facture * pow((1 + $taux_croi), 4)) + ($impot * $rcet4);
		$opex5 =  $market + $inter_web + $admin + $assur + $loc_sit + $loc_freq + $energ_elec + $loc_infra + $form_perso + $maint + ($facture * pow((1 + $taux_croi), 5) + ($impot * $rcet5));
		$_SESSION['opex1'] = $opex1;
		$update .= ",opex1 = '" . $_SESSION['opex1'] . "'";
		$_SESSION['opex2'] = $opex2;
		$update .= ",opex2 = '" . $_SESSION['opex2'] . "'";
		$_SESSION['opex3'] = $opex3;
		$update .= ",opex3 = '" . $_SESSION['opex3'] . "'";
		$_SESSION['opex4'] = $opex4;
		$update .= ",opex4 = '" . $_SESSION['opex4'] . "'";
		$_SESSION['opex5'] = $opex5;
		$update .= ",opex5 = '" . $_SESSION['opex5'] . "'";
		$invest = $_SESSION['capexval'] + $opex1;
		$bene1 = $rcet1 - $invest;
		$bene2 = $rcet2 + $bene1 - $opex2;
		$bene3 = $rcet3 + $bene2 - $opex3;
		$bene4 = $rcet4 + $bene3 - $opex4;
		$bene5 = $rcet5 + $bene4 - $opex5;
		$_SESSION['bene1'] = $bene1;
		$update .= ",bene1 = '" . $_SESSION['bene1'] . "'";
		$_SESSION['bene2'] = $bene2;
		$update .= ",bene2 = '" . $_SESSION['bene2'] . "'";
		$_SESSION['bene3'] = $bene3;
		$update .= ",bene3 = '" . $_SESSION['bene3'] . "'";
		$_SESSION['bene4'] = $bene4;
		$update .= ",bene4 = '" . $_SESSION['bene4'] . "'";
		$_SESSION['bene5'] = $bene5;
		$update .= ",bene5 = '" . $_SESSION['bene5'] . "'";

		$_SESSION['couverture'] = "ok";
		$update .= ",couverture = '" . $_SESSION['couverture'] . "'";
		$_SESSION['capacite'] = 'ok';
		$update .= ",capacite = '" . $_SESSION['capacite'] . "'";
		$_SESSION['capex'] = 'ok';
		$update .= ",capex = '" . $_SESSION['capex'] . "'";
		$_SESSION['opex'] = 'ok';
		$update .= ",opex = '" . $_SESSION['opex'] . "'";
		if (!isset($_SESSION['cartographie'])) {
			$_SESSION['cartographie'] = '';
		}
		$update .= ",cartographie = '" . $_SESSION['cartographie'] . "'";
		if (!isset($_SESSION['interface_x1_s2'])) {
			$_SESSION['interface_x1_s2'] = '';
		}
		$update .= ",interface_x1_s2 = '" . $_SESSION['interface_x1_s2'] . "'";
		$_SESSION['bbu'] = 'ok';
		$update .= ",bbu = '" . $_SESSION['bbu'] . "'";
		$_SESSION['bbu1'] = 'ok';
		$update .= ",bbu1 = '" . $_SESSION['bbu1'] . "'";
		mysqli_query($connexionBD, "update projet SET $update, date_modification=NOW() WHERE id = " . $_SESSION["projet"]);
	} else {
		$message = $veuillez_remplir_tous_les_champs;
	}
} else if (isset($_POST["defaut_opex"])) {
	$_POST['Editbox19'] = "1200000";
	$_POST['Editbox20'] = "1000000";
	$_POST['Editbox21'] = "200000";
	$_POST['Editbox17'] = "50000";
	$_POST['Editbox18'] = "500000";
	$_POST['Editbox3'] = "500000";
	$_POST['Editbox4'] = "72000";
	$_POST['Editbox5'] = "120000";
	$_POST['Editbox22'] = "120000";
	$_POST['Editbox23'] = "1000000";
	$_POST['Editbox24'] = "25000";
	$_POST['Editbox6'] = "0.5";
	$_POST['Editbox25'] = "0.1925";
	$_POST['rev_inf'] = "20000";
	$_POST['rev_tvv'] = "50000";
	$_POST['rev_msg'] = "10000";
	$_POST['rev_msj'] = "20000";
	$_POST['rev_voix'] = "15000";
	$_POST['rev_per'] = "10000";
	$_POST['rev_nav'] = "20000";
	$_POST['rev_sic'] = "25000";
	$_POST['rev_jeu'] = "15000";
	$_POST['rev_rd'] = "20000";
	$_POST['rev_mc'] = "30000";
} else {
	$index = array_keys($_POST);
	foreach ($index as $val) {
		if (preg_match("#^((modifier)|(consulter)|(rapport))#", $val)) {
			$projet = preg_split("#^((modifier)|(consulter)|(rapport))\*#", $val);
			$resultat = mysqli_query($connexionBD, "SELECT * FROM `projet` WHERE id=$projet[1]");
			$row = mysqli_fetch_array($resultat);
			$_SESSION["projet"] = $row[0];
			$_SESSION['nom_zone'] = $row['nom_zone'];
			$_SESSION['lat_zone'] = $row['lat_zone'];
			$_SESSION['long_zone'] = $row['long_zone'];
			$_SESSION['surface_zone'] = $row['surface_zone'];
			$_SESSION['type_zone'] = $row['type_zone'];
			$_SESSION['densite_zone'] = $row['densite_zone'];
			$_SESSION['nom_enodeb'] = $row['nom_enodeb'];
			$_SESSION['puissance_enodeb'] = $row['puissance_enodeb'];
			$_SESSION['gain_antenne_enodeb'] = $row['gain_antenne_enodeb'];
			$_SESSION['facteur_bruit_enodeb'] = $row['facteur_bruit_enodeb'];
			$_SESSION['sinr_min_enodeb'] = $row['sinr_min_enodeb'];
			$_SESSION['debit_enodeb'] = $row['debit_enodeb'];
			$_SESSION['nom_ue'] = $row['nom_ue'];
			$_SESSION['puissance_ue'] = $row['puissance_ue'];
			$_SESSION['gain_antenne_ue'] = $row['gain_antenne_ue'];
			$_SESSION['facteur_bruit_ue'] = $row['facteur_bruit_ue'];
			$_SESSION['sinr_min_ue'] = $row['sinr_min_ue'];
			$_SESSION['debit_max_ue'] = $row['debit_max_ue'];
			$_SESSION['nom_scenario'] = $row['nom_scenario'];
			$_SESSION['alpha_ul_scenario'] = $row['alpha_ul_scenario'];
			$_SESSION['impfactor_ul_scenario'] = $row['impfactor_ul_scenario'];
			$_SESSION['sinr_max_ul_scenario'] = $row['sinr_max_ul_scenario'];
			$_SESSION['alpha_dl_scenario'] = $row['alpha_dl_scenario'];
			$_SESSION['impfactor_dl_scenario'] = $row['impfactor_dl_scenario'];
			$_SESSION['sinr_max_dl_scenario'] = $row['sinr_max_dl_scenario'];
			$_SESSION['detail_simul_scenario'] = $row['detail_simul_scenario'];
			$_SESSION['pertes_ue'] = $row['pertes_ue'];
			$_SESSION['pertes_corps'] = $row['pertes_corps'];
			$_SESSION['debit_uplink'] = $row['debit_uplink'];
			$_SESSION['debit_downlink'] = $row['debit_downlink'];
			$_SESSION['nombre_rb'] = $row['nombre_rb'];
			$_SESSION['bp_rb'] = $row['bp_rb'];
			$_SESSION['pertes_feeder'] = $row['pertes_feeder'];
			$_SESSION['marge_ev'] = $row['marge_ev'];
			$_SESSION['marge_liaison'] = $row['marge_liaison'];
			$_SESSION['marge_i'] = $row['marge_i'];
			$_SESSION['marge_o'] = $row['marge_o'];
			$_SESSION['marge_p'] = $row['marge_p'];
			$_SESSION['bp_cellule'] = $row['bp_cellule'];
			$_SESSION['mode_duplex'] = $row['mode_duplex'];
			$_SESSION['frequence'] = $row['frequence'];
			$_SESSION['model_p'] = $row['model_p'];
			$_SESSION['h_enodeb'] = $row['h_enodeb'];
			$_SESSION['h_ue'] = $row['h_ue'];
			$_SESSION['type_site'] = $row['type_site'];
			$_SESSION['attenuation'] = $row['attenuation'];
			$_SESSION['rayon_cellule'] = $row['rayon_cellule'];
			$_SESSION['bruit_ue'] = $row['bruit_ue'];
			$_SESSION['bruit_enodeb'] = $row['bruit_enodeb'];
			$_SESSION['nombre_enodeb'] = $row['nombre_enodeb'];
			$_SESSION['couverture'] = $row['couverture'];
			$_SESSION['capacite'] = $row['capacite'];
			$_SESSION['capex'] = $row['capex'];
			$_SESSION['opex'] = $row['opex'];
			$_SESSION['cartographie'] = $row['cartographie'];
			$_SESSION['interface_x1_s2'] = $row['interface_x1_s2'];
			$_SESSION['bbu'] = $row['bbu'];
			$_SESSION['bbu1'] = $row['bbu1'];
			$_SESSION['contention_msg'] = $row['contention_msg'];
			$_SESSION['debitul_msg'] = $row['debitul_msg'];
			$_SESSION['debitdl_msg'] = $row['debitdl_msg'];
			$_SESSION['pourcentage_msg'] = $row['pourcentage_msg'];
			$_SESSION['contention_inf'] = $row['contention_inf'];
			$_SESSION['debitul_inf'] = $row['debitul_inf'];
			$_SESSION['debitdl_inf'] = $row['debitdl_inf'];
			$_SESSION['pourcentage_inf'] = $row['pourcentage_inf'];
			$_SESSION['contention_jeu'] = $row['contention_jeu'];
			$_SESSION['debitul_jeu'] = $row['debitul_jeu'];
			$_SESSION['debitdl_jeu'] = $row['debitdl_jeu'];
			$_SESSION['pourcentage_jeu'] = $row['pourcentage_jeu'];
			$_SESSION['contention_mc'] = $row['contention_mc'];
			$_SESSION['debitul_mc'] = $row['debitul_mc'];
			$_SESSION['debitdl_mc'] = $row['debitdl_mc'];
			$_SESSION['pourcentage_mc'] = $row['pourcentage_mc'];
			$_SESSION['contention_sic'] = $row['contention_sic'];
			$_SESSION['debitul_sic'] = $row['debitul_sic'];
			$_SESSION['debitdl_sic'] = $row['debitdl_sic'];
			$_SESSION['pourcentage_sic'] = $row['pourcentage_sic'];
			$_SESSION['contention_nav'] = $row['contention_nav'];
			$_SESSION['debitul_nav'] = $row['debitul_nav'];
			$_SESSION['debitdl_nav'] = $row['debitdl_nav'];
			$_SESSION['pourcentage_nav'] = $row['pourcentage_nav'];
			$_SESSION['contention_per'] = $row['contention_per'];
			$_SESSION['debitul_per'] = $row['debitul_per'];
			$_SESSION['debitdl_per'] = $row['debitdl_per'];
			$_SESSION['pourcentage_per'] = $row['pourcentage_per'];
			$_SESSION['contention_rd'] = $row['contention_rd'];
			$_SESSION['debitul_rd'] = $row['debitul_rd'];
			$_SESSION['debitdl_rd'] = $row['debitdl_rd'];
			$_SESSION['pourcentage_rd'] = $row['pourcentage_rd'];
			$_SESSION['contention_tv'] = $row['contention_tv'];
			$_SESSION['debitul_tv'] = $row['debitul_tv'];
			$_SESSION['debitdl_tv'] = $row['debitdl_tv'];
			$_SESSION['pourcentage_tv'] = $row['pourcentage_tv'];
			$_SESSION['contention_voix'] = $row['contention_voix'];
			$_SESSION['debitul_voix'] = $row['debitul_voix'];
			$_SESSION['debitdl_voix'] = $row['debitdl_voix'];
			$_SESSION['pourcentage_voix'] = $row['pourcentage_voix'];
			$_SESSION['contention_msj'] = $row['contention_msj'];
			$_SESSION['debitul_msj'] = $row['debitul_msj'];
			$_SESSION['debitdl_msj'] = $row['debitdl_msj'];
			$_SESSION['pourcentage_msj'] = $row['pourcentage_msj'];
			$_SESSION['debit_ul'] = $row['debit_ul'];
			$_SESSION['debit_dl'] = $row['debit_dl'];
			$_SESSION['nombre_site'] = $row['nombre_site'];
			$_SESSION['heure_occ'] = $row['heure_occ'];
			$_SESSION['trafic_UL_DL'] = $row['trafic_UL_DL'];
			$_SESSION['T_R_UL'] = $row['T_R_UL'];
			$_SESSION['T_R_DL'] = $row['T_R_DL'];
			$_SESSION['trafic_moy'] = $row['trafic_moy'];
			$_SESSION['abon_par_eNodeB'] = $row['abon_par_eNodeB'];
			$_SESSION['ER'] = $row['ER'];
			$_SESSION['BH_Data_Trafic_subs_UL'] = $row['BH_Data_Trafic_subs_UL'];
			$_SESSION['BH_Data_Trafic_subs_DL'] = $row['BH_Data_Trafic_subs_DL'];
			$_SESSION['Data_Trafic_Throughput_subs_UL'] = $row['Data_Trafic_Throughput_subs_UL'];
			$_SESSION['Data_Trafic_Throughput_subs_DL'] = $row['Data_Trafic_Throughput_subs_DL'];
			$_SESSION['T_UL_Data_trafic_subs'] = $row['T_UL_Data_trafic_subs'];
			$_SESSION['T_DL_Data_trafic_subs'] = $row['T_DL_Data_trafic_subs'];
			$_SESSION['T_UL_user_plane_subs'] = $row['T_UL_user_plane_subs'];
			$_SESSION['T_DL_user_plane_subs'] = $row['T_DL_user_plane_subs'];
			$_SESSION['T_Total_user_plane_subs'] = $row['T_Total_user_plane_subs'];
			$_SESSION['plan_control'] = $row['plan_control'];
			$_SESSION['S1_bandW'] = $row['S1_bandW'];
			$_SESSION['X2_bandW'] = $row['X2_bandW'];
			$_SESSION['c_axc'] = $row['c_axc'];
			$_SESSION['n_axc'] = $row['n_axc'];
			$_SESSION['c_cpri'] = $row['c_cpri'];
			$_SESSION['c_cpri_site'] = $row['c_cpri_site'];
			$_SESSION['type_topo'] = $row['type_topo'];
			$_SESSION['nombre_canaux'] = $row['nombre_canaux'];
			$_SESSION['sensibilite_recepteur'] = $row['sensibilite_recepteur'];
			$_SESSION['fenetre_optique'] = $row['fenetre_optique'];
			$_SESSION['puissance_emission'] = $row['puissance_emission'];
			$_SESSION['type_fibre'] = $row['type_fibre'];
			$_SESSION['connecteurs_optiques'] = $row['connecteurs_optiques'];
			$_SESSION['distance_transport'] = $row['distance_transport'];
			$_SESSION['attenuation_lineaire'] = $row['attenuation_lineaire'];
			$_SESSION['attenuation_connecteur_optique'] = $row['attenuation_connecteur_optique'];
			$_SESSION['attenuation_totale'] = $row['attenuation_totale'];
			$_SESSION['nombre_equipements'] = $row['nombre_equipements'];
			$_SESSION['capacite_equipements'] = $row['capacite_equipements'];
			$_SESSION['ing_radio'] = $row['ing_radio'];
			$_SESSION['ing_reseau'] = $row['ing_reseau'];
			$_SESSION['rech_four'] = $row['rech_four'];
			$_SESSION['rech_site'] = $row['rech_site'];
			$_SESSION['rout_ser_pass'] = $row['rout_ser_pass'];
			$_SESSION['inf_ip'] = $row['inf_ip'];
			$_SESSION['log_appli'] = $row['log_appli'];
			$_SESSION['inf_voip'] = $row['inf_voip'];
			$_SESSION['bs_ant'] = $row['bs_ant'];
			$_SESSION['fh_fob_cab'] = $row['fh_fob_cab'];
			$_SESSION['loc_sit'] = $row['loc_sit'];
			$_SESSION['aq_terr'] = $row['aq_terr'];
			$_SESSION['travaux'] = $row['travaux'];
			$_SESSION['electrique'] = $row['electrique'];
			$_SESSION['inst_sit'] = $row['inst_sit'];
			$_SESSION['rac_elec'] = $row['rac_elec'];
			$_SESSION['rac_ip'] = $row['rac_ip'];
			$_SESSION['loc_mob'] = $row['loc_mob'];
			$_SESSION['suiv_proj'] = $row['suiv_proj'];
			$_SESSION['s1'] = $row['s1'];
			$_SESSION['s2'] = $row['s2'];
			$_SESSION['s3'] = $row['s3'];
			$_SESSION['s4'] = $row['s4'];
			$_SESSION['capexval'] = $row['capexval'];
			$_SESSION['loc_sit_total'] = $row['loc_sit_total'];
			$_SESSION['Editbox3'] = $row['Editbox3'];
			$_SESSION['Editbox4'] = $row['Editbox4'];
			$_SESSION['Editbox5'] = $row['Editbox5'];
			$_SESSION['Editbox17'] = $row['Editbox17'];
			$_SESSION['Editbox18'] = $row['Editbox18'];
			$_SESSION['Editbox19'] = $row['Editbox19'];
			$_SESSION['Editbox20'] = $row['Editbox20'];
			$_SESSION['Editbox21'] = $row['Editbox21'];
			$_SESSION['Editbox22'] = $row['Editbox22'];
			$_SESSION['Editbox23'] = $row['Editbox23'];
			$_SESSION['Editbox24'] = $row['Editbox24'];
			$_SESSION['Editbox25'] = $row['Editbox25'];
			$_SESSION['Editbox6'] = $row['Editbox6'];
			$_SESSION['rev_msg'] = $row['rev_msg'];
			$_SESSION['rev_inf'] = $row['rev_inf'];
			$_SESSION['rev_jeu'] = $row['rev_jeu'];
			$_SESSION['rev_mc'] = $row['rev_mc'];
			$_SESSION['rev_sic'] = $row['rev_sic'];
			$_SESSION['rev_nav'] = $row['rev_nav'];
			$_SESSION['rev_per'] = $row['rev_per'];
			$_SESSION['rev_rd'] = $row['rev_rd'];
			$_SESSION['rev_tvv'] = $row['rev_tvv'];
			$_SESSION['rev_voix'] = $row['rev_voix'];
			$_SESSION['rev_msj'] = $row['rev_msj'];
			$_SESSION['rcet1'] = $row['rcet1'];
			$_SESSION['rcet2'] = $row['rcet2'];
			$_SESSION['rcet3'] = $row['rcet3'];
			$_SESSION['rcet4'] = $row['rcet4'];
			$_SESSION['rcet5'] = $row['rcet5'];
			$_SESSION['opex1'] = $row['opex1'];
			$_SESSION['opex2'] = $row['opex2'];
			$_SESSION['opex3'] = $row['opex3'];
			$_SESSION['opex4'] = $row['opex4'];
			$_SESSION['opex5'] = $row['opex5'];
			$_SESSION['bene1'] = $row['bene1'];
			$_SESSION['bene2'] = $row['bene2'];
			$_SESSION['bene3'] = $row['bene3'];
			$_SESSION['bene4'] = $row['bene4'];
			$_SESSION['bene5'] = $row['bene5'];

			$message = "$projetOuvert <br><b>::$row[1]::</b>";
			if (preg_match("#^(modifier)#", $val)) {
				$modifier_var = "ok";
			}
			if (preg_match("#^(consulter)#", $val)) {
				mysqli_query($connexionBD, "update projet SET date_consultation=NOW() WHERE id = " . $_SESSION["projet"]);
				$consulter_var = "ok";
			}
			if (preg_match("#^rapport#", $val)) {
				$projet = preg_split("#^rapport\*#", $val);
				require_once __DIR__ . '/../vendor/autoload.php';
				$mpdf = new \Mpdf\Mpdf();
				$valeur = "<style>legend{
				color:#933;
				font-size:26px;
				font-weight:bold;
				padding: 10px;
				}
				fieldset {
				background: #f7f7f7;
				border:#999 solid 1px;
				padding: 10px;
				margin:2px;
				}
				.mini-title {
				border-bottom:#999 solid 1px;
				font-size:14px;
				font-weight:bold;
				color:red;
				margin-bottom:15px;
				}
				.mini-title2 {
				font-size:14px;
				text-align:center;
				color:#777;
				margin:10px;
				}
				.resultat-textarea {
				background:#edd;
				}
				.resultat {
				background:#caa;
				}
				.resultat-final {
				font-size:14px;
				background:#edd;
				}
				h1,h2,h3,h4,h5,h6 {
				color:#fff;
				font-weight: normal;
				line-height: 1.3;
				margin:0.5rem 2px;
				background:#e74c3c;
				padding:4px;
				}
				p,.p {
				background:#f7f7f7;
				padding:4px;
				}
				h1 {font-size:2.7rem;}
				h2 {font-size:2.2rem;}  
				h3 {font-size:1.8rem;}  
				h4 {font-size:1.4rem;}  
				h5 {font-size:1.1rem;}  
				h6 {font-size:0.9rem;}
				table tr td, table tr th {padding:0.625rem;}
				table tfoot, table thead,table tr:nth-of-type(2n) {background:none repeat scroll 0 0 #f0f0f0;}
				th,table tr:nth-of-type(2n) td {border-right:1px solid #fff;}
				td {border-right:1px solid #f0f0f0;}
				table {
				background:#fff;
				border:1px solid #f0f0f0;
				border-collapse:collapse;
				border-spacing:0;
				text-align:left;
				width:100%;
				font-size: 0.85rem;
				line-height: 1.6;
				}
				td {border-right:1px solid #f0f0f0;}
				a, a:link, a:visited, a:hover, a:active {
				text-decoration:none;
				color:#780243;
				}  
				a:hover {
					color:#9A0456;
					text-decoration: underline;
				}
				body {
				background:none repeat scroll 0 0 #ddd;
					font: 80%/1.4 tahoma, arial, helvetica, lucida sans, sans-serif;
				color:#444;
				}
				.colortr {background:#eee;}
				</style><p>
				<div style='color:#fff; font-size:26px;font-weight: bold; text-align:center;line-height: 1.3; margin:0.5rem 0;background:#c0392b; padding:4px;'>
				<img src='images/photos/ICTU_logo_copy.jpeg'>
				</div><br/><fieldset>
				<legend>";
				// $projet = $_SESSION["projet"];
				$resultat = mysqli_query($connexionBD, "SELECT * FROM `projet` WHERE id=$projet[1]");
				$row = mysqli_fetch_array($resultat);
				$valeur .= "$row[1]</legend>
				<br/><br/>";
				if (isset($_SESSION["couverture"]) && !empty($_SESSION["couverture"])) {
					$valeur .= "<h2>$couverture_menu</h2>
					<fieldset><div class='mini-title'>Zone d'étude</div> 
					<b>Nom de la zone :</b> " . $_SESSION["nom_zone"] . "<br/>
					<b>Superficie de la zone :</b> " . $_SESSION["surface_zone"] . " Km²<br/>
					<b>Type de zone :</b> " . $_SESSION["type_zone"] . "<br/>
					<b>Densité de la population :</b> " . $_SESSION["densite_zone"] . " Hbts/Km²<br/>
					</fieldset>
					<fieldset><div class='mini-title'>Type d'eNodeB</div>
					<b>Nom de l'enodeB :</b> " . $_SESSION["nom_enodeb"] . "<br/>
					<b>Puissance d'émission :</b> " . $_SESSION["puissance_enodeb"] . " dBm<br/>
					<b>Gain de l'antenne :</b> " . $_SESSION["gain_antenne_enodeb"] . " dBi<br/>
					<b>Facteur de bruit :</b> " . $_SESSION["facteur_bruit_enodeb"] . " dB<br/>
					<b>SINR minimal :</b> " . $_SESSION["sinr_min_enodeb"] . " dB<br/>
					<b>Débit maximal :</b> " . $_SESSION["debit_enodeb"] . " bps/Hz<br/>
					</fieldset>
					<fieldset><div class='mini-title'>Type d'UE</div>
					<b>Nom de l'UE :</b> " . $_SESSION["nom_ue"] . "<br/>
					<b>Puissance d'émission :</b> " . $_SESSION["puissance_ue"] . " dBm<br/>
					<b>Gain de l'antenne :</b> " . $_SESSION["gain_antenne_ue"] . " dBi<br/>
					<b>Facteur de bruit :</b> " . $_SESSION["facteur_bruit_ue"] . " dB<br/>
					<b>SINR minimal :</b> " . $_SESSION["sinr_min_ue"] . " dB<br/>
					<b>Débit maximal :</b> " . $_SESSION["debit_max_ue"] . " bps/Hz<br/>
					</fieldset>
					<fieldset><div class='mini-title'>Scénario entre l'UE et l'eNodeB</div>
					<b>Nom du scénario :</b> " . $_SESSION["nom_scenario"] . "<br/>
					<b>Valeur de alpha (UL) :</b> " . $_SESSION["alpha_ul_scenario"] . "<br/>
					<b>ImpFactor (UL) :</b> " . $_SESSION["impfactor_ul_scenario"] . "<br/>
					<b>SINR maximal (UL) :</b> " . $_SESSION["sinr_max_ul_scenario"] . " dB<br/>
					<b>Valeur de alpha (DL) :</b> " . $_SESSION["alpha_dl_scenario"] . "<br/>
					<b>ImpFactor (DL) :</b> " . $_SESSION["impfactor_dl_scenario"] . "<br/>
					<b>SINR maximal (DL) :</b> " . $_SESSION["sinr_max_dl_scenario"] . " dB<br/>
					<b>Détails de la simulation :</b> <div class='resultat-textarea'>" . nl2br($_SESSION["detail_simul_scenario"]) . "<br/></div>
					</fieldset>
					<fieldset><div class='mini-title'>Autres paramètres</div>
					<b>Pertes de connectivité de l'UE :</b> " . $_SESSION["pertes_ue"] . " dB<br/>
					<b>Pertes dues au corps humain :</b> " . $_SESSION["pertes_corps"] . " dB<br/>
					<b>Débit de la cellule en UpLink :</b> " . $_SESSION["debit_uplink"] . " Mbps<br/>
					<b>Débit en DownLink :</b> " . $_SESSION["debit_downlink"] . " Mbps<br/>
					<b>Nombre de RB allouée(s) à l'UE :</b> " . $_SESSION["nombre_rb"] . " RBs<br/>
					<b>Bande passante allouée à un RB :</b> " . $_SESSION["bp_rb"] . " KHz<br/>
					<b>Pertes de feeder eNodeB :</b> " . $_SESSION["pertes_feeder"] . " dB<br/>
					<b>Marge d'évanouissement :</b> " . $_SESSION["marge_ev"] . " dB<br/>
					<b>Marge de liaison :</b> " . $_SESSION["marge_liaison"] . " dB<br/>
					<b>Marge d'interférence :</b> " . $_SESSION["marge_i"] . " dB<br/>
					<b>Marge d'ombrage :</b> " . $_SESSION["marge_o"] . " dB<br/>
					<b>Marge de pénétration (dB) :</b> " . $_SESSION["marge_p"] . " dB<br/>
					<b>Bande passante allouée à la cellule :</b> " . $_SESSION["bp_cellule"] . " MHz<br/>
					<b>Mode de Duplexage :</b> " . $_SESSION["mode_duplex"] . "<br/>
					<b>Fréquence centrale :</b> " . $_SESSION["frequence"] . " MHz<br/>
					<b>Modèle de propagation :</b> " . $_SESSION["model_p"] . "<br/>
					<b>Hauteur de l'eNodeB :</b> " . $_SESSION["h_enodeb"] . " m<br/>
					<b>Hauteur de l'UE :</b> " . $_SESSION["h_ue"] . " m<br/>
					<b>Type de site :</b> " . $_SESSION["type_site"] . "<br/>
					</fieldset>
					<fieldset class='resultat'><div class='mini-title'>Résultat couverture</div>
					<b>Atténuation :</b> " . $_SESSION["attenuation"] . " dB<br/>
					<b>Rayon de la cellule :</b> " . $_SESSION["rayon_cellule"] . " Km<br/>
					<b>Bruit de l'UE :</b> " . $_SESSION["bruit_ue"] . " dB<br/>
					<b>Bruit de l'eNodeB :</b> " . $_SESSION["bruit_enodeb"] . " dB<br/>
					<div class='resultat-final'><b>Nombre d'enodeB :</b> " . $_SESSION["nombre_enodeb"] . " eNodeBs<br/></div>
					</fieldset><br/>";
				}
				if (isset($_SESSION["capacite"]) && !empty($_SESSION["capacite"])) {
					$valeur .= "<h2>" . $capacite_menu . "</h2>
					<fieldset><div class='mini-title'>Étape 1</div> 
					<b>Densité d'abonnés :</b> " . $_SESSION['densite_zone'] . " Ab/Km²<br/>
					<b>Débit de la cellule en UpLink :</b> " . $_SESSION['debit_ul'] . " Mbps<br/>
					<b>Débit de la cellule en DownLink :</b> " . $_SESSION['debit_dl'] . " Mbps<br/>
					<b>Débit moyen par abonné en UpLink :</b> " . $_SESSION['debit_uplink'] . " Mbps<br/>
					<b>Débit moyen par abonné en DownLink :</b> " . $_SESSION['debit_downlink'] . " Mbps<br/>
					</fieldset>
					<fieldset class='resultat'><div class='mini-title'>Résultat capacité</div>
					<div class='resultat-final'><b>Nombre de site :</b> " . $_SESSION["nombre_site"] . " sites<br/></div>
					</fieldset><br/>";
				}
				if (isset($_SESSION["bbu"]) && !empty($_SESSION["bbu"])) {
					$valeur .= "<h2>" . $cpri_menu . "</h2>
					<fieldset>
					<div class='mini-title'>Données</div>
					<b>Débit de la cellule en DownLink :</b> " . $_SESSION['debit_dl'] . " Mbps<br/>
					<b>Bande passante allouée à la cellule :</b> " . $_SESSION['bp_cellule'] . " Mbps<br/>
					<b>Type de site :</b> Site " . $_SESSION['type_site'] . "<br/>
					</fieldset>
					<fieldset class='resultat'><div class='mini-title'>Résultat cpri</div>
					<b>Capacité de l'antenne porteuse (AXC) :</b> " . $_SESSION['c_axc'] . " Mbps<br/>
					<b>Nombre d'AXC du canal :</b> " . $_SESSION['n_axc'] . "<br/>
					<b>Capacité du lien CPRI par secteur :</b> " . $_SESSION['c_cpri'] . " Mbps<br/>
					<div class='resultat-final'><b>Capacité du lien FRONTHAUL :</b> " . $_SESSION['c_cpri_site'] . " Mbps<br/></div>
					</fieldset><br/>";
				}
				if (isset($_SESSION["bbu1"]) && !empty($_SESSION["bbu1"])) {
					$valeur .= "<h2>" . $network_menu . "</h2>
					<fieldset>
					<div class='mini-title'>Données</div>
					<b>Nombre de site :</b> " . $_SESSION['nombre_site'] . " sites<br/>
					<b>Débit de la cellule en DownLink :</b> " . $_SESSION['debit_dl'] . " Mbps<br/>
					</fieldset>
					<fieldset>
					<div class='mini-title'>Choix de la Topologie</div>
					<b>Type de topologie :</b> " . $_SESSION['type_topo'] . "<br/>
					</fieldset>
					<fieldset>
					<div class='mini-title'>Choix des caractéristiques des équipements WDM</div>
					<b>Nombre de canaux :</b> " . $_SESSION['nombre_canaux'] . "<br/>
					<b>Sensibilité du récepteur :</b> " . $_SESSION['sensibilite_recepteur'] . " dBm<br/>
					<b>Fénêtre optique :</b> " . $_SESSION['fenetre_optique'] . " nm<br/>
					<b>Puissance d'émission :</b> " . $_SESSION['puissance_emission'] . " dBm<br/>
					</fieldset>
					<fieldset>
					<div class='mini-title'>Choix du support et connectiques</div>
					<b>Type de fibre :</b> " . $_SESSION['type_fibre'] . "<br/>
					<b>Atténuation linéaire :</b> " . $_SESSION['attenuation_lineaire'] . " db/Km<br/>
					<b>Atténuation des connecteurs optiques (dB/Km) :</b> " . $_SESSION['attenuation_connecteur_optique'] . " db/Km<br/>
					<b>Connecteurs optiques :</b> " . $_SESSION['connecteurs_optiques'] . "<br/>
					<b>Distance de transport :</b> " . $_SESSION['distance_transport'] . " Km<br/>
					</fieldset>
					<fieldset class='resultat'><div class='mini-title'>Résultat fronthaul network</div>
					<div class='resultat-final'><b>Atténuation totale :</b> " . $_SESSION["attenuation_totale"] . " dB<br/></div>
					<div class='resultat-final'><b>Nombre d'équipements :</b> " . $_SESSION["nombre_equipements"] . " équipements<br/></div>
					<div class='resultat-final'><b>Capacité de chaque équipement :</b> " . $_SESSION["capacite_equipements"] . " Mbps<br/></div>
					</fieldset><br/>";
				}
				if (isset($_SESSION["interface_x1_s2"]) && !empty($_SESSION["interface_x1_s2"])) {
					$valeur .= "<h2>" . $interface_menu . "</h2>
					<fieldset>
					<div class='mini-title'>Étape 1</div>
					<b>Heure d'occupation :</b> " . $_SESSION['heure_occ'] . " Kbps<br/>
					<b>Taux de trafic de données UL et DL :</b> " . $_SESSION['trafic_UL_DL'] . "<br/>
					<b>Taux de trafic moyen : </b> " . $_SESSION['trafic_moy'] . "<br/>
					<b>Nombre d'abonné par eNodeB :</b> " . $_SESSION['abon_par_eNodeB'] . "<br/>
					<b>Trafic Radio UL (%) :</b> " . $_SESSION['T_R_UL'] . " %<br/>
					<b>Trafic Radio DL (%) :</b> " . $_SESSION['T_R_DL'] . " %<br/>
					<b>ER :</b> " . $_SESSION['ER'] . "<br/>
					</fieldset>
					<fieldset><div class='mini-title'>Étape 2</div>
					<b>BH_Data_Trafic_subs_UL :</b> " . $_SESSION['BH_Data_Trafic_subs_UL'] . "<br/>
					<b>BH_Data_Trafic_subs_DL :</b> " . $_SESSION['BH_Data_Trafic_subs_DL'] . "<br/>
					<b>Data_Trafic_Throughput_UL :</b> " . $_SESSION['Data_Trafic_Throughput_subs_UL'] . "<br/>
					<b>Data_Trafic_Throughput_DL :</b> " . $_SESSION['Data_Trafic_Throughput_subs_DL'] . "<br/>
					<b>T_UL_Data_trafic_subs :</b> " . $_SESSION['T_UL_Data_trafic_subs'] . "<br/>
					<b>T_DL_Data_trafic_subs :</b> " . $_SESSION['T_DL_Data_trafic_subs'] . "<br/>
					<b>T_UL_user_plane_subs :</b> " . $_SESSION['T_UL_user_plane_subs'] . " Kpbs<br/>
					<b>T_DL_user_plane_subs :</b> " . $_SESSION['T_DL_user_plane_subs'] . " Kpbs<br/>
					<div class='resultat-final'><b>T_Total_user_plane_subs_sites :</b> " . $_SESSION['T_Total_user_plane_subs'] . " Mbps<br/>
					</fieldset>
					<fieldset class='resultat'><div class='mini-title'>Résultat interface</div>
					<div class='resultat-final'><b>Plan de control :</b> " . $_SESSION["plan_control"] . " Mbps<br/></div>
					<div class='resultat-final'><b>Largeur de bande de l'interface S1 :</b> " . $_SESSION["S1_bandW"] . " Mbps<br/></div>
					<div class='resultat-final'><b>Largeur de bande de l'interface X2 :</b> " . $_SESSION["X2_bandW"] . " Mbps<br/></div>
					</fieldset><br/>";
				}
				if (isset($_SESSION["capex"]) && !empty($_SESSION["capex"])) {
					$valeur .= "<h2>" . $capex_menu . "</h2>
					<fieldset>
					<div class='mini-title'>Données</div>
					<b>Nombre d'eNodeB(s) :</b> " . $_SESSION['nombre_enodeb'] . " eNodeBs<br/>
					<b>Nombre de sites loués :</b> " . $_SESSION['nombre_site'] . " sites<br/>
					</fieldset>
					<fieldset><div class='mini-title'>Totaux</div> 
					<b>Coût de conception :</b> " . $_SESSION['s1'] . " F. CFA<br/>
					<b>Investissement Matériel & logiciel :</b> " . $_SESSION['s2'] . " F. CFA<br/>
					<b>Coût de déploiement du réseau :</b> " . $_SESSION['s3'] . " F. CFA<br/>
					<b>Coût de logistique et de suivi :</b> " . $_SESSION['s4'] . " F. CFA<br/>
					</fieldset>
					<fieldset class='resultat'><div class='mini-title'>Résultat capex</div>
					<div class='resultat-final'><b>Montant du CAPEX :</b> " . $_SESSION["capexval"] . " F. CFA<br/></div>
					</fieldset><br/>";
				}
				if (isset($_SESSION["opex"]) && !empty($_SESSION["opex"])) {
					$valeur .= "<h2>" . $opex_menu . "</h2>
					<fieldset>
					<div class='mini-title'>Données</div>
					<b>Nombre d'habitants :</b> " . $_SESSION['densite_zone'] * $_SESSION['surface_zone'] . " Hbts<br/>
					<b>Pourcentage d'abonnés :</b> 65 %<br/>
					</fieldset>
					<fieldset class='resultat'><div class='mini-title'>Résultat opex</div>
					<table id='myTable'>
					<tr>
					<th><a href ='#'>ANNÉE</a></th>
					<th><a href ='#'>OPEX (F. CFA)</a></th>
					<th><a href ='#'>RECETTES (F. CFA)</a></th>
					<th><a href ='#'>BÉNÉFICES (F. CFA)</a></th>
					</tr>
					<tr class='colortr'><td>I</td><td>" . $_SESSION['opex1'] . "</td><td>" . $_SESSION['rcet1'] . "</td><td>" . $_SESSION['bene1'] . "</td></tr>
					<tr><td>II</td><td>" . $_SESSION['opex2'] . "</td><td>" . $_SESSION['rcet2'] . "</td><td>" . $_SESSION['bene2'] . "</td></tr>
					<tr class='colortr'><td>III</td><td>" . $_SESSION['opex3'] . "</td><td>" . $_SESSION['rcet3'] . "</td><td>" . $_SESSION['bene3'] . "</td></tr>
					<tr><td>IV</td><td>" . $_SESSION['opex4'] . "</td><td>" . $_SESSION['rcet4'] . "</td><td>" . $_SESSION['bene4'] . "</td></tr>
					<tr class='colortr'><td>V</td><td>" . $_SESSION['opex5'] . "</td><td>" . $_SESSION['rcet5'] . "</td><td>" . $_SESSION['bene5'] . "</td></tr>
					</table>
					</fieldset><br/>";
				}
				$valeur .= "</fieldset></p>";
				$mpdf->WriteHTML($valeur);
				$mpdf->Output();
			}
			break;
		}
		if (preg_match("#^supprimer#", $val)) {
			$projet = preg_split("#^supprimer\*#", $val);
			$_SESSION["projet"] = '';
			$_SESSION['nom_zone'] = '';
			$_SESSION['surface_zone'] = '';
			$_SESSION['type_zone'] = '';
			$_SESSION['densite_zone'] = '';
			$_SESSION['nom_enodeb'] = '';
			$_SESSION['puissance_enodeb'] = '';
			$_SESSION['gain_antenne_enodeb'] = '';
			$_SESSION['facteur_bruit_enodeb'] = '';
			$_SESSION['sinr_min_enodeb'] = '';
			$_SESSION['debit_enodeb'] = '';
			$_SESSION['nom_ue'] = '';
			$_SESSION['puissance_ue'] = '';
			$_SESSION['gain_antenne_ue'] = '';
			$_SESSION['facteur_bruit_ue'] = '';
			$_SESSION['sinr_min_ue'] = '';
			$_SESSION['debit_max_ue'] = '';
			$_SESSION['nom_scenario'] = '';
			$_SESSION['alpha_ul_scenario'] = '';
			$_SESSION['impfactor_ul_scenario'] = '';
			$_SESSION['sinr_max_ul_scenario'] = '';
			$_SESSION['alpha_dl_scenario'] = '';
			$_SESSION['impfactor_dl_scenario'] = '';
			$_SESSION['sinr_max_dl_scenario'] = '';
			$_SESSION['detail_simul_scenario'] = '';
			$_SESSION['pertes_ue'] = '';
			$_SESSION['pertes_corps'] = '';
			$_SESSION['debit_uplink'] = '';
			$_SESSION['debit_downlink'] = '';
			$_SESSION['nombre_rb'] = '';
			$_SESSION['bp_rb'] = '';
			$_SESSION['pertes_feeder'] = '';
			$_SESSION['marge_ev'] = '';
			$_SESSION['marge_liaison'] = '';
			$_SESSION['marge_i'] = '';
			$_SESSION['marge_o'] = '';
			$_SESSION['marge_p'] = '';
			$_SESSION['bp_cellule'] = '';
			$_SESSION['mode_duplex'] = '';
			$_SESSION['frequence'] = '';
			$_SESSION['model_p'] = '';
			$_SESSION['h_enodeb'] = '';
			$_SESSION['h_ue'] = '';
			$_SESSION['type_site'] = '';
			$_SESSION['attenuation'] = '';
			$_SESSION['rayon_cellule'] = '';
			$_SESSION['bruit_ue'] = '';
			$_SESSION['bruit_enodeb'] = '';
			$_SESSION['nombre_enodeb'] = '';
			$_SESSION['couverture'] = '';
			$_SESSION['capacite'] = '';
			$_SESSION['capex'] = '';
			$_SESSION['opex'] = '';
			$_SESSION['cartographie'] = '';
			$_SESSION['interface_x1_s2'] = '';
			$_SESSION['bbu'] = '';
			$_SESSION['bbu1'] = '';
			$_SESSION['contention_msg'] = '';
			$_SESSION['debitul_msg'] = '';
			$_SESSION['debitdl_msg'] = '';
			$_SESSION['pourcentage_msg'] = '';
			$_SESSION['contention_inf'] = '';
			$_SESSION['debitul_inf'] = '';
			$_SESSION['debitdl_inf'] = '';
			$_SESSION['pourcentage_inf'] = '';
			$_SESSION['contention_jeu'] = '';
			$_SESSION['debitul_jeu'] = '';
			$_SESSION['debitdl_jeu'] = '';
			$_SESSION['pourcentage_jeu'] = '';
			$_SESSION['contention_mc'] = '';
			$_SESSION['debitul_mc'] = '';
			$_SESSION['debitdl_mc'] = '';
			$_SESSION['pourcentage_mc'] = '';
			$_SESSION['contention_sic'] = '';
			$_SESSION['debitul_sic'] = '';
			$_SESSION['debitdl_sic'] = '';
			$_SESSION['pourcentage_sic'] = '';
			$_SESSION['contention_nav'] = '';
			$_SESSION['debitul_nav'] = '';
			$_SESSION['debitdl_nav'] = '';
			$_SESSION['pourcentage_nav'] = '';
			$_SESSION['contention_per'] = '';
			$_SESSION['debitul_per'] = '';
			$_SESSION['debitdl_per'] = '';
			$_SESSION['pourcentage_per'] = '';
			$_SESSION['contention_rd'] = '';
			$_SESSION['debitul_rd'] = '';
			$_SESSION['debitdl_rd'] = '';
			$_SESSION['pourcentage_rd'] = '';
			$_SESSION['contention_tv'] = '';
			$_SESSION['debitul_tv'] = '';
			$_SESSION['debitdl_tv'] = '';
			$_SESSION['pourcentage_tv'] = '';
			$_SESSION['contention_voix'] = '';
			$_SESSION['debitul_voix'] = '';
			$_SESSION['debitdl_voix'] = '';
			$_SESSION['pourcentage_voix'] = '';
			$_SESSION['contention_msj'] = '';
			$_SESSION['debitul_msj'] = '';
			$_SESSION['debitdl_msj'] = '';
			$_SESSION['pourcentage_msj'] = '';
			$_SESSION['debit_ul'] = '';
			$_SESSION['debit_dl'] = '';
			$_SESSION['nombre_site'] = '';
			$_SESSION['heure_occ'] = '';
			$_SESSION['trafic_UL_DL'] = '';
			$_SESSION['T_R_UL'] = '';
			$_SESSION['T_R_DL'] = '';
			$_SESSION['trafic_moy'] = '';
			$_SESSION['abon_par_eNodeB'] = '';
			$_SESSION['ER'] = '';
			$_SESSION['BH_Data_Trafic_subs_UL'] = '';
			$_SESSION['BH_Data_Trafic_subs_DL'] = '';
			$_SESSION['Data_Trafic_Throughput_subs_UL'] = '';
			$_SESSION['Data_Trafic_Throughput_subs_DL'] = '';
			$_SESSION['T_UL_Data_trafic_subs'] = '';
			$_SESSION['T_DL_Data_trafic_subs'] = '';
			$_SESSION['T_UL_user_plane_subs'] = '';
			$_SESSION['T_DL_user_plane_subs'] = '';
			$_SESSION['T_Total_user_plane_subs'] = '';
			$_SESSION['plan_control'] = '';
			$_SESSION['S1_bandW'] = '';
			$_SESSION['X2_bandW'] = '';
			$_SESSION['c_axc'] = '';
			$_SESSION['n_axc'] = '';
			$_SESSION['c_cpri'] = '';
			$_SESSION['c_cpri_site'] = '';
			$_SESSION['type_topo'] = '';
			$_SESSION['nombre_canaux'] = '';
			$_SESSION['sensibilite_recepteur'] = '';
			$_SESSION['fenetre_optique'] = '';
			$_SESSION['puissance_emission'] = '';
			$_SESSION['type_fibre'] = '';
			$_SESSION['connecteurs_optiques'] = '';
			$_SESSION['distance_transport'] = '';
			$_SESSION['attenuation_lineaire'] = '';
			$_SESSION['attenuation_connecteur_optique'] = '';
			$_SESSION['attenuation_totale'] = '';
			$_SESSION['nombre_equipements'] = '';
			$_SESSION['capacite_equipements'] = '';
			$_SESSION['ing_radio'] = '';
			$_SESSION['ing_reseau'] = '';
			$_SESSION['rech_four'] = '';
			$_SESSION['rech_site'] = '';
			$_SESSION['rout_ser_pass'] = '';
			$_SESSION['inf_ip'] = '';
			$_SESSION['log_appli'] = '';
			$_SESSION['inf_voip'] = '';
			$_SESSION['bs_ant'] = '';
			$_SESSION['fh_fob_cab'] = '';
			$_SESSION['loc_sit'] = '';
			$_SESSION['aq_terr'] = '';
			$_SESSION['travaux'] = '';
			$_SESSION['electrique'] = '';
			$_SESSION['inst_sit'] = '';
			$_SESSION['rac_elec'] = '';
			$_SESSION['rac_ip'] = '';
			$_SESSION['loc_mob'] = '';
			$_SESSION['suiv_proj'] = '';
			$_SESSION['s1'] = '';
			$_SESSION['s2'] = '';
			$_SESSION['s3'] = '';
			$_SESSION['s4'] = '';
			$_SESSION['capexval'] = '';
			$_SESSION['loc_sit_total'] = '';
			$_SESSION['Editbox3'] = '';
			$_SESSION['Editbox4'] = '';
			$_SESSION['Editbox5'] = '';
			$_SESSION['Editbox17'] = '';
			$_SESSION['Editbox18'] = '';
			$_SESSION['Editbox19'] = '';
			$_SESSION['Editbox20'] = '';
			$_SESSION['Editbox21'] = '';
			$_SESSION['Editbox22'] = '';
			$_SESSION['Editbox23'] = '';
			$_SESSION['Editbox24'] = '';
			$_SESSION['Editbox25'] = '';
			$_SESSION['Editbox6'] = '';
			$_SESSION['rev_msg'] = '';
			$_SESSION['rev_inf'] = '';
			$_SESSION['rev_jeu'] = '';
			$_SESSION['rev_mc'] = '';
			$_SESSION['rev_sic'] = '';
			$_SESSION['rev_nav'] = '';
			$_SESSION['rev_per'] = '';
			$_SESSION['rev_rd'] = '';
			$_SESSION['rev_tvv'] = '';
			$_SESSION['rev_voix'] = '';
			$_SESSION['rev_msj'] = '';
			$_SESSION['rcet1'] = '';
			$_SESSION['rcet2'] = '';
			$_SESSION['rcet3'] = '';
			$_SESSION['rcet4'] = '';
			$_SESSION['rcet5'] = '';
			$_SESSION['opex1'] = '';
			$_SESSION['opex2'] = '';
			$_SESSION['opex3'] = '';
			$_SESSION['opex4'] = '';
			$_SESSION['opex5'] = '';
			$_SESSION['bene1'] = '';
			$_SESSION['bene2'] = '';
			$_SESSION['bene3'] = '';
			$_SESSION['bene4'] = '';
			$_SESSION['bene5'] = '';

			$id = $_SESSION['id'];
			include('includes/lecture_utilisateur.php');
			if ($niveau >= $niveau_super_admin) {
				mysqli_query($connexionBD, "DELETE FROM `projet` WHERE id=$projet[1]");
			} else {
				mysqli_query($connexionBD, "DELETE FROM `projet` WHERE id=$projet[1] AND id_administrateur=" . $_SESSION['id']);
			}
			$message = $projetSupprime;
			$supprimer_var = 'ok';
		}
	}
}

function cap_cpri($bp, $n_axc)
{
	$frequence = array(1.25, 2.5, 5, 10, 15, 20);
	switch ($bp) {
		case '1.25':
			$nombre = array(8, 16, 32, 40, 64, 80, 128, 160, 192);
			break;
		case '2.5':
			$nombre = array(4, 8, 16, 20, 32, 40, 64, 80, 96);
			break;
		case '5':
			$nombre = array(2, 4, 8, 10, 16, 20, 32, 40, 48);
			break;
		case '10':
			$nombre = array(1, 2, 4, 5, 8, 10, 16, 20, 24);
			break;
		case '15':
			$nombre = array(0, 1, 2, 3, 5, 6, 10, 13, 16);
			break;
		case '20':
			$nombre = array(0, 1, 1, 2, 4, 5, 8, 10, 12);
			break;
	}
	$ret = array(614.4, 1228.8, 2457.6, 3072, 4915.2, 6144, 9830.4, 10137.6, 12165.12);
	for ($i = 0; $i < count($nombre); $i++) {
		if ($nombre[$i] == $n_axc) {
			return $ret[$i];
		}
	}
	return 0;
}
