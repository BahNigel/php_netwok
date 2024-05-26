<?php include_once("includes/config.php"); ?>
<?php include_once("includes/textes.php"); ?>
<?php include_once("includes/ouverture_flux_sql.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
      <title>Catalog</title>
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
                  <h1>Catalog</h1>
                  <p><ul style = "background:white">
                        <li><b>eNodeB: </b>Evolved NodeB or with abbreviated version eNodeB is a major part of LTE network structure. 
                        If we compare eNodeB with NodeB which is used in WCDMA network, 
                        there is a big difference between two nodes. Most of the main 
                        functionalities is obtained by RNC in UTRAN network, but in E-UTRAN network these responsibilities are under eNodeB. There is no common controller for eNodeB in LTE, each eNodeB is a controller for itself. eNodeB as base stations have to manage 
                        radio resources and mobility in the cell. eNodeB uses 
                        OFDMA (downlink) and SC-FDMA (uplink) on radio interface.
                        <br />
                        "<i>source: https://telecompedia.net/enodeb/</i>"
                    </li>
                    <li><b>BBU: </b>Base Band Unit, manages the entire base station system. The management involves 
                    uplink and downlink data processing, signaling processing, 
                    resource management, operation and maintenance.
                        <br />
                        "<i>source: https://telecompedia.net/enodeb/</i>"
                    </li>
                    <li><b>RRU: </b>Remote Radio Unit, is used to transmit and receive 
                    baseband signals, modulate and demodulate RF signals, process data, 
                    and amplify the power of signals.
                        <br />
                        "<i>source: https://telecompedia.net/enodeb/</i>"
                    </li>
                    <li><b>CPRI: </b> Common Public Radio Interface standard defines a flexible interface between BBU and RRU. The purpose of 
                    CPRI is to allow replacement of a copper or coax cable connection 
                    between a radio transceiver and a base station
                        <br />
                        "<i>source: https://telecompedia.net/enodeb/</i>"
                    </li>
                    <li><b>Network Interfaces: </b> • eNodeB uses S1-MME interface with MME for control plane traffic.
• eNodeB uses S1-U interface with S-GW for user plane traffic.
• eNodeB uses X2 interface with other eNodeB elements.
• eNodeB uses Uu interface with user equipment (UE)
                        <br />
                        "<i>source: https://telecompedia.net/enodeb/</i>"
                    </li>
				  </ul></p>
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