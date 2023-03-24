<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css" />
		<!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<!--[if lte IE 7]>
        <link rel="stylesheet" href="style_ie.css" />
        <![endif]-->
      
		<title>Le clic</title>
		
		<?php include("includes/fonction_bbcode_tuto.php"); ?>
		

	
    </head>

    <body>
	
	               <div id="bloc_page">
	  <header>
	                         
							  
							  <?php include("includes/entete.php"); ?>
  
                              <?php include("includes/menu.php"); ?>
			
            </header>
			
            <section>
                <article>
				
			
				
				
				    
	            <div id="popup">
				<p>Sur cette page, vous pouvez modifier vos tutoriels. <br />
				   Je précise que vos tutoriels doivent être clairs, précis et que, ils doivent avoir un lien avec la discipline de la rubrique tutoriels selectionnée.</p>
				</div>   
				
					
                    
                
				
				
<?php include ("includes/base.php") ; ?>


<div id = "bbcode_tuto">
<fieldset><legend>Mise en forme</legend>
<input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)"  />
<input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
<input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
<input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
<br /><br />
<img src="./images/smileys/coucou.gif" title="coucou" alt="coucou" id ="emoticone" onClick="javascript:smilies(' :coucou ');return(false)" />
<img src="./images/smileys/degoute.gif" title="degouté" alt="degouté" id ="emoticone" onClick="javascript:smilies(' :degoute: ');return(false)" />
<img src="./images/smileys/etourdi.gif" title="etourdi" alt="etourdi" id ="emoticone" onClick="javascript:smilies(' :etourdi: ');return(false)" />
<img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" id ="emoticone" onClick="javascript:smilies(' :heureux: ');return(false)" />
<img src="./images/smileys/colere.gif" title="colere" alt="colere" id ="emoticone" onClick="javascript:smilies(' :colere: ');return(false)" />
<img src="./images/smileys/pianiste.gif" title="pianiste" alt="pianiste" id ="emoticone" onClick="javascript:smilies(' :pianiste ');return(false)" />
<img src="./images/smileys/salut.gif" title="salut" alt="salut" id ="emoticone" onClick="javascript:smilies(' :salut ');return(false)" />
<img src="./images/smileys/peur.gif" title="peur" alt="peur" id ="emoticone" onClick="javascript:smilies(' :peur: ');return(false)" />
<img src="./images/smileys/triste.gif" title="triste" alt="triste" id ="emoticone" onClick="javascript:smilies(' :triste: ');return(false)" />
<img src="./images/smileys/amoureux.gif" title="amoureux" alt="amoureux" id ="emoticone" onClick="javascript:smilies(' :amoureux: ');return(false)" />
</fieldset>
</div>

<?php
  if (empty($_POST['pseudo']) && empty($_POST['titre_tutoriel']) && empty($_POST['tutoriel']))
  {

    echo '<div id = zoff>' . 'Vous devez tout remplir' .  '</div>' ;  
	

	
	
    echo '<form method="post" action="modif_tuto.php"  name="formulaire">

                
			  <p><label for="tutoriel"></label>
		      <br />
			  
              <textarea name="tutoriel"  id="tuto" cols="120" rows="60" placeholder = "Saisissez votre tuto ici"  ></textarea>
              </p><br />
			  
			  <div id="login"><label for="pseudo">Pseudo :</label></div>  <input type="text" name="pseudo" size="16" id="pseudo" maxlength="10" /><br />
			  
	   <label for="discipline">Discipline :</label>
       <select name="discipline" id="discipline">
	   
           <option> </option>
		   
		   <option value="Assurance">Assurance</option>
		   
		   <option value="Audio-visuel">Audio-visuel</option>
               
		   <option value="Automobile">Automobile</option>

          <option value="Biologie">Biologie</option>
		  
		  <option value="Chimie">Chimie</option>
		  
		  <optgroup label="Comptabilité">
		  <option value="Comptabilité analytique">Comptabilité analytique</option>
		  <option value="Comptabilité des sociétés">Comptabilité des sociétés</option>
		  <option value="Comptabilité générale">Comptabilité générale</option>
		  </optgroup>
		  
		  <optgroup label="Droit">
		  <option value="Droit bancaire">Droit bancaire</option>
		  <option value="Droit commercial">Droit commercial</option>
		  <option value="Droit des affaires">Droit des affaires</option>
		  <option value="Droit des sociétés">Droit des sociétés</option>
		  <option value="Droit des obligations">Droit des obligations</option>
		  <option value="Droit du travail">Droit du travail</option>
		  <option value="Droit fiscal">Droit fiscal</option>
		  </optgroup>
		  
		  <optgroup label="Economie">
		  <option value="Economie d entreprise">Economie d entreprise</option>
		  <option value="Economie financière">Economie financière</option>
		  <option value="Economie générale">Economie générale</option>
		  </optgroup>
		  
		  <optgroup label="Gestion de trésorerie">
		  <option value="Gestion de trésorerie">Gestion de trésorerie</option>
		  </optgroup>
		  
		  <optgroup label="Gestion des stocks">
		  <option value="Gestion des stocks">Gestion des stocks</option>
		  </optgroup>
		  
		  <optgroup label="Jeux vidéos">
		  <option value="Jeux gameboy">Jeux gameboy</option>
		  <option value="Jeux nintendo ds">Jeux nintendo ds</option>
		  <option value="Jeux pc">Jeux pc</option>
		  <option value="Jeux psp">Jeux psp</option>
		  <option value="Jeux ps2">Jeux ps2</option>
		  <option value="Jeux ps3">Jeux ps3</option>
		  <option value="Jeux ps4">Jeux ps4</option>
		  <option value="Jeux wii">Jeux wii</option>
		  <option value="Jeux xbox 360">Jeux xbox 360</option>
		  <option value="Jeux xbox one">Jeux xbox one</option>
		  </optgroup>
		  
		  <optgroup label="Maintenance informatique">
		  <option value="Maintenance informatique">Maintenance informatique</option>
		  </optgroup>
		  
		  <optgroup label="Maths">
		  <option value="Algèbre">Algèbre</option>
		  <option value="Géométrie">Géométrie</option>
		  <option value="Maths appliqués">Maths appliqués</option>
		  <option value="Maths financières">Maths financières</option>
		  </optgroup>
		  
		  <optgroup label="Physique">
		  <option value="Physique">Physique</option>
		  </optgroup>
		  
		  <optgroup label="Programmation">
		  <option value="Langage C">Langage C</option>
		  <option value="Langage C++">Langage C++</option>
		  <option value="Langage CSS">Langage CSS</option>
		  <option value="Langage HTML">Langage HTML</option>
		  <option value="Langage Java">Langage Java</option>
		  <option value="Langage Java script">Langage Java script</option>
		  <option value="Langage PHP">Langage PHP</option>
		  <option value="Autre">Autre</option>
		  </optgroup>
		  
		  <optgroup label="Réseau informatique">
		  <option value="Réseau informatique">Réseau informatique</option>
		  </optgroup>
		  
		  <optgroup label="Santé-médécine">
		  <option value="Santé-médécine">Santé-médécine</option>
		  </optgroup>
		  
		  <optgroup label="Sport">
		  <option value="Aviron">Aviron</option>
		  <option value="Basketball">Basketball</option>
		  <option value="Base-ball">Base-ball</option>
		  <option value="Boxe">Boxe</option>
		  <option value="Catch">Catch</option>
		  <option value="Equitation">Equitation</option>
		  <option value="Football">Football</option>
		  <option value="Golf">Golf</option>
		  <option value="Karaté">Karaté</option>
		  <option value="Kung-fu">Kung-fu</option>
		  <option value="Tennis">Tennis</option>
		  <option value="Autre">Autre</option>
		  </optgroup>
		  
		  <optgroup label="Systèmes d exploitation">
		  <option value="Mandriva">Mandriva</option>
		  <option value="Ubuntu">Ubuntu</option>
		  <option value="Windows XP">Windows XP</option>
		  <option value="Windows Vista">Windows Vista</option>
		  <option value="Windows 7">Windows 7</option>
		  <option value="Windows 8">Windows 8</option>
		  <option value="Windows 9">Windows 9</option>
		  <option value="Windows 10">Windows 10</option>
		  <option value="Autre">Autre</option>
		  </optgroup>
		  
		  <optgroup label="Techniques bancaires">
		  <option value="Techniques bancaires">Techniques bancaires</option>
		  </optgroup>
		  
		  <optgroup label="Téléphonie">
		  <option value="Téléphonie">Téléphonie</option>
          </optgroup>     
			   
		 </select>
	   

			  <label for="titre">Titre du tutoriel :</label><input type="text" size="20" name="titre_tutoriel"  id="titre" maxlength="25" /><br />
			  
			  <input type="submit" class="gr-button" value="Envoyer"  /> <input class="erase-button" type="reset" value="Réinitialiser le formulaire" />
			  </form>';
			  
			  }
	      
		  
		  else 
          {
    
	
	
	$pseudo_erreur1 = NULL;
    $pseudo_erreur2 = NULL;
    $discipline_erreur = NULL;
	$titre_tutoriel_erreur1 = NULL;
    $titre_tutoriel_erreur2 = NULL;
	$tutoriel_erreur = NULL;
	
    
		 
		 ?>
		 
		 <?php  


	// On récupère les variables
    $i = 0; 
    $pseudo = $_POST['pseudo'];
	$discipline=$_POST['discipline'];
	$titre_tutoriel=$_POST['titre_tutoriel'];
	$tutoriel=$_POST['tutoriel'];
	
	
	
	             // on verifie si le pseudo comporte des chiffres et des lettres 
			   if (!preg_match("#^[a-z]+[0-9]{2}$#", $pseudo) || empty($pseudo))
			   {
			   
			     $pseudo_erreur1 = "Veuillez saisir un pseudo comportant des lettres en miniscule et 2 chiffres à la fin";
                 $i++;
				 
				 }
				 
				      // Vérification du pseudo
                      $req = $bdd->prepare('SELECT id FROM forum_membres WHERE pseudo = :pseudo');
                      $req->execute(array('pseudo' => $_POST['pseudo'] ));
				      $resultat = $req->fetch();
		
                     if (!$resultat == true)
                     {
			
			   $pseudo_erreur2 = "Veuillez saisir le même pseudo que celui saisi lors de votre inscription ";
			   $i++;
			   
			   }
			   
			   // on verifie si la discipline a été saisie
			 if (empty($_POST['discipline']))
			 {
			    
				$discipline_erreur = "Veuillez selectionner une discipline";
			    $i++;
				
				}
				
				
				// on verifie si le titre saisi est valide
			 if (!preg_match("#^[A-Z]{1}+[a-z0-9.-\s]+$#", $titre_tutoriel) || empty($titre_tutoriel))
			 {
			 
			    $titre_tutoriel_erreur1 = "Saisir un titre dont la première lettre est en majuscule et le reste en miniscule";
			    $i++;
				      
					  }
				
				      // Vérification du titre du tuto
                      $req = $bdd->prepare('SELECT id FROM tutoriels WHERE titre_tutoriel = :titre_tutoriel ');
                      $req->execute(array('titre_tutoriel' => $_POST['titre_tutoriel'] ));
				      $resultat = $req->fetch();
					  
					  if (!$resultat == true)
					  {
			
			   $titre_tutoriel_erreur2 = "Veuillez saisir le même titre que celui du tutoriel que vous voulez modifier ";
			   $i++;
			   
			   }
			   
			   
			    // on verifie si le message a été saisi
			 if (empty($_POST['tutoriel']))
			 {
			    
				$tutoriel_erreur = "Veuillez saisir le tutoriel";
			    $i++;
				
				}
				
			   
			   if ($i==0)
               {
	                               
								   // Préparation de la requête
								   $query=$bdd->prepare('SELECT pseudo, pass, email, rang
                                   FROM forum_membres WHERE pseudo = :pseudo');
                                   $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
                                   $query->execute();
                                   $data=$query->fetch();
								   
								   if ($data['rang'] == 0) //Le membre est banni
                                  {
                                  echo "<p>Vous avez été banni(chassé) du site parsque , vous n'avez pas respecté les regles en vigueur</p>";
                                  }
                                  else
					              {
					  
					                 echo "Votre tutoriel a été modifié avec succès";
									 
							// Insertion du message à l'aide d'une requête préparée
                    $req = $bdd->prepare('UPDATE tutoriels SET  pseudo = :pseudo, discipline = :discipline, titre_tutoriel = :titre_tutoriel, tutoriel = :tutoriel WHERE titre_tutoriel = :titre_tutoriel');
                   $req->execute(array('pseudo'=>htmlspecialchars($_POST['pseudo']), 'discipline'=>htmlspecialchars($_POST['discipline']), 
				   'titre_tutoriel'=>htmlspecialchars($_POST['titre_tutoriel']), 'tutoriel'=>htmlspecialchars($_POST['tutoriel'])));
	  
	                                        }
		 

			   
			   
		}
    else
    {
        echo'<h1>Interruption</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites lors de l envoi du tutoriel</p>';
        echo'<p>'.$i.' erreur(s)</p>';
		echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
		echo'<p>'.$discipline_erreur.'</p>';
		echo'<p>'.$titre_tutoriel_erreur1.'</p>';
        echo'<p>'.$titre_tutoriel_erreur2.'</p>';
		echo'<p>'.$tutoriel_erreur.'</p>';

		echo'<p>Cliquez <a href="./modif_tuto.php">ici</a> pour recommencer</p>';
		   
				
	}

        }

            ?>		
				
			   
			   
    
			  
			   <div id="mod"><a href="vision_tutoriels.php">Retour à la page globale des tutos postés</a></div> 
			  
			  
			  </article>
		</section>

                    <footer>
					          <?php include("includes/pied_de_page.php"); ?>
                              
			           					
				            </footer>
				</div>
           </body>
</html>						  