<aside class="s-12 l-3">
                  <h3><?php echo $navigation?></h3>
                  <div class="aside-nav">
                     <ul>
                        <li><a href = 'accueil.php'><?php echo $accueil_menu?></a></li>
                        <li><a href = 'aide.php'><?php echo $aide_menu?></a></li>
                        <li><a href = 'apropos.php'><?php echo $apropos_menu?></a></li>
						<li><a href = 'catalog.php'><?php echo $catalog_menu?></a></li>
						<li>
							<a><?php echo $compte_menu?></a>
							<ul>
								<li><a href = 'modifiercompte.php'><?php echo $modifiercompte_menu?></a></li>
								<li><a href = 'deconnexion.php'><?php echo $deconnexion_menu?></a></li>
								  <?php $id = $_SESSION['id']; include_once('includes/lecture_utilisateur.php');
								  if($niveau >=2){ echo "<li><a href = 'creeruncompte.php'>$creercompte_menu</a></li>";}
								  ?>
							</ul>
						</li>
						<li><a href = '../index.php' target="_top">Return to home page</a></li>
					 </ul>
                  </div>
               </aside>