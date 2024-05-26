<aside class="s-12 l-3">
                  <h3><?php echo $options?></h3>
                  <div class="aside-nav">
                     <ul>
                     <li><a href = 'nouveauprojet.php'><?php echo $nouveau_projet?></a></li>
                     <li><a href = 'consulterprojet.php'><?php echo $consulter_projets?></a></li>
                     <li>
                     <form action="" method="POST" id="selectForm">
								<select name="language" id="langSelect">
									<option selected><?php echo $_SESSION['lang']?></option>
									<option><?php echo $_SESSION['lang'] == 'EN'? 'FR' : 'EN' ?></option>
								</select>
							</form>
                     </li>
                     </ul>
                  </div>
               </aside>

               <script>
         var selectForm = document.getElementById('selectForm');
         var langSelect = document.getElementById('langSelect');
         // console.log(langSelect);
         function submitForm (selecForm){
            console.log(selectForm);
            // selectForm.submit();
         };
         langSelect.addEventListener('change', (e) => {
            console.log(e);
            selectForm.submit();
         });
         console.log(langSelect);
      </script>