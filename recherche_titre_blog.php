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
                    if($_POST['titre_billet']!="")
                    {
					
					 /*on verifie si le titre est valide */
			          if (preg_match("#^[A-Z]{1}+[a-z0-9.-\s]+$#", $_POST['titre_billet']))
			          {
					
					
					
					// Vérification du titre
                    $req = $bdd->prepare('SELECT id FROM billet WHERE titre_billet = :titre_billet' );
                    $req->execute(array('titre_billet' => htmlspecialchars($_POST['titre_billet'])));
 
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

   $req = $bdd->prepare('SELECT id, pseudo, titre_billet, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh %imin %ssec\') AS date_billet_fr FROM 
  billet WHERE titre_billet = :titre_billet  ORDER BY date_billet DESC LIMIT 0,10');
  
  $req->execute(array('titre_billet' => htmlspecialchars($_POST['titre_billet'])));

                    while ($donnee = $req->fetch())
                    {
				    ?>
					
					<?php echo '<p class="bordure">'
                   .'<strong>' . 'Titre' . ':'  .  htmlspecialchars($donnee['titre_billet']) . '</strong>'  . '<br /><br />'  . '<em> Posté par </em>' 
                   . htmlspecialchars($donnee['pseudo'])  . '<br /><br />' . '<em> le </em>' . htmlspecialchars($donnee['date_billet_fr']) . '</p>'; ?>
				
				  
				   
					
					<div id = "input"><a href="billet_comment.php?message=<?php echo $donnee['titre_billet']; ?>">Commentaires</a></div>
				   
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
           echo "Veuillez renseigner le titre du thème"; 
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