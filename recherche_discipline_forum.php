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
                    if($_POST['discipline']!="")
                    {
					
					
					// Vérification de la discipline
                    $req = $bdd->prepare('SELECT id FROM forum_pc WHERE discipline = :discipline' );
                    $req->execute(array('discipline' => htmlspecialchars($_POST['discipline'])));
 
                     $resultat = $req->fetch();
 
                    if (!$resultat)
                    {
                    echo 'Aucun message envoyé avec cette discipline';
                    }
                    else
                    {
					?>
					
					 <?php
                  $req->closeCursor(); // Important : on libère le curseur pour la prochaine requête 
				  ?>
				  
				  <?php
				  
				  // Préparation de la requete

   $req = $bdd->prepare('SELECT id, pseudo, discipline, titre_message, DATE_FORMAT(date_message, \'%d/%m/%Y à %Hh %imin %ssec\') AS date_message_fr FROM 
  forum_pc WHERE discipline = :discipline  ORDER BY date_message DESC LIMIT 0,10');
  
  $req->execute(array('discipline' => htmlspecialchars($_POST['discipline'])));

                    while ($donnee = $req->fetch())
                    {
				    ?>
					
					<?php echo '<p class="bordure"><strong>' . 'Discipline' . ':'  .  htmlspecialchars($donnee['discipline']) . '</strong>' . '<br /><br />'
                   .'<strong>' . 'Titre' . ':'  .  htmlspecialchars($donnee['titre_message']) . '</strong>'  . '<br /><br />'  . '<em> Posté par </em>' 
                   . htmlspecialchars($donnee['pseudo'])  . '<br /><br />' . '<em> le </em>' . htmlspecialchars($donnee['date_message_fr']) . '</p>'; ?>
				
				  
				   
					
					<div id = "z"><a href="discussions_pc.php?message=<?php echo $donnee['titre_message']; ?>">Réponses</a></div>
				   
				     <?php
					 }
                     $req->closeCursor();
					 }
					 ?>
					 
					 
					 <?php
					 
					 					 
					 
			    }
                else
        {
           echo "Veuillez selectionner une discipline"; 
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