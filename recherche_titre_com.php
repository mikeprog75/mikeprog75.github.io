<?php
session_start(); ?>

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
    </head>
	
	<body>
	                                
	                               <div id="bloc_page">
            <header>
			                  
							  
							  
							  <?php include("includes/entete.php"); ?>
  
                              <?php include("includes/menu.php"); ?>
							  
							  
							  
							
			
            </header>
			
			<section>
			
			<article>

 
                    
					<?php include ("includes/base.php") ; ?>
					
					<?php
					
					/*il faut que tous les champs soient renseignes*/
                    if($_POST['titre_tutoriel']!="")
                    {
					
					 /*on verifie si le titre est valide */
			          if (preg_match("#^[A-Z]{1}+[a-z0-9.-\s]+$#", $_POST['titre_tutoriel']))
			          {
					
					
					
					// Vérification du titre
                    $req = $bdd->prepare('SELECT id FROM commentaires_tuto WHERE titre_tutoriel = :titre_tutoriel' );
                    $req->execute(array('titre_tutoriel' => htmlspecialchars($_POST['titre_tutoriel'])));
 
                     $resultat = $req->fetch();
 
                    if (!$resultat)
                    {
                    echo 'Ce titre n existe pas';
                    }
                    else
                    {
					?>
					
					 <?php
                  $req->closeCursor(); // Important : on libère le curseur pour la prochaine requête 
				  ?>
				  
				  <?php
				  
				  // Préparation de la requete

   $req = $bdd->prepare('SELECT id, pseudo, titre_tutoriel, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh %imin %ssec\') AS date_commentaire_fr FROM 
  commentaires_tuto WHERE titre_tutoriel = :titre_tutoriel  ORDER BY date_commentaire DESC LIMIT 0,10');
  
  $req->execute(array('titre_tutoriel' => htmlspecialchars($_POST['titre_tutoriel'])));

                    while ($donnee = $req->fetch())
                    {
				    ?>
					
					<?php echo '<p class="bordure">
                   <strong>' . 'Titre' . ':'  .  htmlspecialchars($donnee['titre_tutoriel']) . '</strong>'  . '<br /><br />'  . '<em> Posté par </em>' 
                   . htmlspecialchars($donnee['pseudo'])  . '<br /><br />' . '<em> le </em>' . htmlspecialchars($donnee['date_commentaire_fr']) . '</p>'; ?>
				
				  
				   
					
					<div id = "input"><a href="espace_membre_commentaire.php?comment=<?php echo $donnee['titre_tutoriel']; ?>">Commentaires</a></div>
				   
				     <?php
					 }
                     $req->closeCursor();
					 }
					 ?>
					 
					 
					 <?php
					 
					 
					 
				}
				 else
				 {
				    echo "Saisir un titre dont la première lettre est en majuscule et le reste en miniscule";
					}
					 
					 
			    }
                else
        {
           echo "Veuillez renseigner le titre du tutoriel"; 
        }
		
		?>
					 
 
 
 
 </article>
            </section>

                <footer>

                           
					       <?php include ("includes/pied_de_page.php") ; ?>


                          </footer>
                    </div>
          </body>
</html>