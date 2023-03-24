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
					
					<?php include ("includes/fonction_traduction.php") ; ?>

					
	
					
					<?php
					
					/*il faut que tous les champs soient renseignes*/
                    if($_POST['titre_annonce']!="")
                    {
					
					 /*on verifie si le titre est valide */
			          if (preg_match("#^[A-Z]{1}+[a-z0-9.-\s]+$#", $_POST['titre_annonce']))
			          {
					
					
					
					// Vérification du titre
                    $req = $bdd->prepare('SELECT id FROM annonces WHERE titre_annonce = :titre_annonce' );
                    $req->execute(array('titre_annonce' => htmlspecialchars($_POST['titre_annonce'])));
 
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
          //On récupère la valeur du titre de l'annonce
          $zone = $_POST['titre_annonce'];  $table = "annonces"; ?>
		  
		 
		  
		  
		  <?php
  // Compteur pour le nombre d'annonces postées par l'admin

			$reponse = $bdd->prepare('SELECT COUNT(*) AS nb_annonces FROM annonces WHERE titre_annonce = :titre_annonce');
			$reponse->execute(array('titre_annonce' => htmlspecialchars($zone)));
			
			while ($donnee = $reponse->fetch())
{
    echo '<p>' . ($donnee['nb_annonces']) . ' annonces(s) postée(s) </p>';


} // Fin de la boucle du compteur
$reponse->closeCursor(); ?>
				  
				  <?php
				  
				  // Préparation de la requete

   $req = $bdd->prepare('SELECT titre_annonce, annonce, DATE_FORMAT(date_annonce, \'%d/%m/%Y à %Hh %imin %ssec\') AS date_annonce_fr 
   FROM '.$table.' WHERE titre_annonce = :titre_annonce  ORDER BY date_annonce DESC LIMIT 0,10');
  
  $req->execute(array('titre_annonce' => htmlspecialchars($zone)));

                 while ($donnee = $req->fetch())
{
?>
         
	
  <?php echo '<p class="slalom">
      <strong>' . 'Annonce' . ':'  .  htmlspecialchars($donnee['titre_annonce']) . '</strong>'  . '<br /><br />'  
	  . '<em> Publié le </em>' . htmlspecialchars($donnee['date_annonce_fr']) .'<br /></br />'
	  . code(nl2br(stripslashes(htmlspecialchars($donnee['annonce'])))) .  '</p>'; ?>

  

	  
<?php	
	
	}// Fin de la boucle des messages
$req->closeCursor();   ?>

 
					 <?php
					 
					 }
					 
				}
				 else
				 {
				    echo "Saisir un titre dont la première lettre est en majuscule et le reste en miniscule";
					}
					 
					 
			    }
                else
        {
           echo "Veuillez renseigner le titre de l'annonce"; 
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