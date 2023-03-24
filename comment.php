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
		
		<?php include("includes/fonction_bbcode_com_blog.php"); ?>
    </head>
	
	<body>
	
	                             <div id="bloc_page">
            <header>
			                  
							  
							  <?php include("includes/entete.php"); ?>
  
                              <?php include("includes/menu.php"); ?>
			
            </header>
			
			<section>
	<article>
               
			   <div id="recap">
				<p>Sur cette page, vous pouvez envoyer votre commentaire. <br />
				   Je précise que votre commentaire doit avoir un lien avec le titre du thème posté  </p>
				</div>
			   
		<?php include ("includes/base.php") ; ?>	  
			   
<div id = "bbcode">
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
  if (empty($_POST['pseudo']) && empty($_POST['titre_billet']) && empty($_POST['commentaires']))
  {

    echo '<div id = blio>' . 'Vous devez tout remplir' .  '</div>' ;  
	
	
    echo '<form method="post" action="comment.php"  name="formulaire">

				   
              <p><label for="precisions"></label>
		      <br />
			  
              <textarea name="commentaires" id="yo" cols="60" rows="20"  placeholder ="Saisissez votre commentaire ici" ></textarea>
              </p><br />
			  
			  <div id="login"><label for="pseudo">Pseudo :</label></div>  <input type="text" name="pseudo" size="16" id="pseudo" maxlength="10" /><br />
			  
			  <label for="titre">Titre du thème :</label><input type="text" name="titre_billet" size="25" id="numero" /><br />
			  
			  <input type="submit" class="gre-button" value="Envoyer" /> <input class="erase-button" type="reset" value="Réinitialiser le formulaire" />
			  </form>';
			  
			  }
			  else 
              {
    
	
	
	$pseudo_erreur1 = NULL;
    $pseudo_erreur2 = NULL;
	$titre_billet_erreur1 = NULL;
    $titre_billet_erreur2 = NULL;
	$commentaires_erreur = NULL;
    
		 
		 ?>
		 
		 <?php  


	// On récupère les variables
    $i = 0; 
    $pseudo = $_POST['pseudo'];
	$titre_billet=$_POST['titre_billet'];
	$commentaires=$_POST['commentaires'];
	
	
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
			   
			   
			
				// on verifie si le titre saisi est valide
			 if (!preg_match("#^[A-Z]{1}+[a-z0-9.-\s]+$#", $titre_billet) || empty($titre_billet))
			 {
			 
			    $titre_billet_erreur1 = "Saisir un titre dont la première lettre est en majuscule et le reste en miniscule";
			    $i++;
				      
					  }
				
				      // Vérification du titre du message
                      $req = $bdd->prepare('SELECT id FROM billet WHERE titre_billet = :titre_billet ');
                      $req->execute(array('titre_billet' => $_POST['titre_billet'] ));
				      $resultat = $req->fetch();
					  
					  if (!$resultat == true)
					  {
			
			   $titre_billet_erreur2 = "Saisir le même titre que celui du thème posté ";
			   $i++;
			   
			   }
			   
			   
			    // on verifie si le commentaire a été saisi
			 if (empty($_POST['commentaires']))
			 {
			    
				$commentaires_erreur = "Veuillez saisir le commentaire";
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
					  
					                 echo "Votre commentaire a été posté";
									 
									 // Insertion du commentaire à l'aide d'une requête préparée
                    $req = $bdd->prepare('INSERT INTO commentaires_blog ( pseudo, titre_billet, commentaires, date_commentaire ) VALUES(:pseudo, :titre_billet, :commentaires, NOW() )');
                   $req->execute(array( 'pseudo'=>htmlspecialchars($_POST['pseudo']), 'titre_billet'=>htmlspecialchars($_POST['titre_billet']), 'commentaires'=>htmlspecialchars($_POST['commentaires'])));
				   
				                              }
											  
											  
		}		
    else
    {
        echo'<h1>Interruption</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites lors de l envoi du commentaire</p>';
        echo'<p>'.$i.' erreur(s)</p>';
		echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
		echo'<p>'.$titre_billet_erreur1.'</p>';
        echo'<p>'.$titre_billet_erreur2.'</p>';
		echo'<p>'.$commentaires_erreur.'</p>';

		echo'<p>Cliquez <a href="./comment.php">ici</a> pour recommencer</p>';
		   
				
	}

        }								  
				?>


                <div id="consul"><a href="billet_vision.php">Acceder à la liste des thèmes postés</a></div>				
									 
									 
			
			  
			  </article>
            </section>

                <footer>

                           <?php include("includes/pied_de_page.php"); ?>
                           

                          </footer>
                    </div>
          </body>
</html>   