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
		<title>Répondre aux questions</title>
		
		<?php include("includes/fonction_bbcode_forum.php"); ?>
    </head>
	
	<body>
	
	                             <div id="bloc_page">
            <header>
			                  
							  
							  <?php include("includes/entete.php"); ?>
  
                              <?php include("includes/menu.php"); ?>
							  
							  <?php include("includes/fonction_traduction.php"); ?>
			
            </header>
			
			<section>
	<article>
               
			   <div id="recap">
				<p>Sur cette page, vous pouvez répondre à une question. <br /><br />
				   Les règles à suivre sont les suivantes: <br /><br />
				   1- Vous devez être inscrit sur le site avant de répondre à une question <br />
				   2- Le titre doit être en rapport avec votre réponse <br />
				   3- Ne publiez pas un message sur le piratage informatique <br />
				   4- N'abrégez pas les mots (écrivez en toutes lettres) </p>
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
  if (empty($_POST['pseudo']) && empty($_POST['titre_message']) && empty($_POST['message']))
  {

    echo '<div id = blio>' . 'Vous devez tout remplir' .  '</div>' ;
	
			   
			echo  '<form method="post" action="reponses_pc.php" name="formulaire">
			   
		      <p><label for="precisions"></label>
		      <br />
			  
              <textarea name="message" id="yo" cols="60" rows="20"  placeholder ="Saisissez votre message ici" ></textarea>
              </p><br />
			  
			  <div id="login"><label for="pseudo">Pseudo :</label></div>  <input type="text" name="pseudo" size="16" id="pseudo" maxlength="10" /><br />
			  
			  <label for="titre">Titre du message :</label><input type="text" name="titre_message" size="25" id="numero" /><br />
			  
			  <input type="submit" class="gre-button" value="Répondre" /> <input class="erase-button" type="reset" value="Réinitialiser le formulaire" />

			  </form>';
			  
			  }
	      
		  
		  else 
          {
    
	
	
	$pseudo_erreur1 = NULL;
    $pseudo_erreur2 = NULL;
	$titre_message_erreur1 = NULL;
    $titre_message_erreur2 = NULL;
	$message_erreur = NULL;
    
		 
		 ?>
		 
		 <?php  


	// On récupère les variables
    $i = 0; 
    $pseudo = $_POST['pseudo'];
	$titre_message=$_POST['titre_message'];
	$message=$_POST['message'];
	
	
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
			 if (!preg_match("#^[A-Z]{1}+[a-z0-9.-\s]+$#", $titre_message) || empty($titre_message))
			 {
			 
			    $titre_message_erreur1 = "Saisir un titre dont la première lettre est en majuscule et le reste en miniscule";
			    $i++;
				      
					  }
				
				      // Vérification du titre du message
                      $req = $bdd->prepare('SELECT id FROM forum_pc WHERE titre_message = :titre_message ');
                      $req->execute(array('titre_message' => $_POST['titre_message'] ));
				      $resultat = $req->fetch();
					  
					  if (!$resultat == true)
					  {
			
			   $titre_message_erreur2 = "Veuillez saisir le même titre que celui de la question posée ";
			   $i++;
			   
			   }
			   
			   
			    // on verifie si le message a été saisi
			 if (empty($_POST['message']))
			 {
			    
				$message_erreur = "Veuillez saisir le message";
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
					  
					                 echo "Votre réponse a été postée";
									 
						// Insertion du message à l'aide d'une requête préparée
                    $req = $bdd->prepare('INSERT INTO topic_pc ( pseudo, titre_message, message, date_message ) VALUES(:pseudo, :titre_message, :message, NOW() )');
                   $req->execute(array( 'pseudo'=>htmlspecialchars($_POST['pseudo']), 'titre_message'=>htmlspecialchars($_POST['titre_message']),
				   'message'=>htmlspecialchars($_POST['message'])));
				   
				                              }


    }
    else
    {
        echo'<h1>Interruption</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites lors de l envoi du message</p>';
        echo'<p>'.$i.' erreur(s)</p>';
		echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
		echo'<p>'.$titre_message_erreur1.'</p>';
        echo'<p>'.$titre_message_erreur2.'</p>';
		echo'<p>'.$message_erreur.'</p>';

		echo'<p>Cliquez <a href="./reponses_pc.php">ici</a> pour recommencer</p>';
		   
				
	}

        }

         ?>


            <div id="dd"><p><a href="questions_pc.php">Retour à la page globale des questions postées</a></p></div>		 
			
			  
			  </article>
            </section>

                <footer>

                           <?php include("includes/pied_de_page.php"); ?>
                           

                          </footer>
                    </div>
          </body>
</html>   