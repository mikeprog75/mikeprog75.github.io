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
                    if( $_POST['email']!="")
                    {
					
					  /* on teste l'adresse email, si c'est bon, on continue, sinon, on affiche un message d'erreur*/
                     if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}.[a-z]{2,4}$#", $_POST['email']))
                     {
					 
					          
					 // Vérification de l'email
                      $req = $bdd->prepare('SELECT id FROM membres WHERE email = :email');
                      $req->execute(array('email' => $_POST['email'] ));
				      $resultat = $req->fetch();
		
                     if (!$resultat == false)
                     {
					 
				  
				  
				                   // Préparation de la requête
								   $query=$bdd->prepare('SELECT pseudo, pass, email, rang
                                   FROM membres WHERE email = :email');
                                   $query->bindValue(':email',$_POST['email'], PDO::PARAM_STR);
                                   $query->execute();
                                   $data=$query->fetch();
								   
								   if ($data['rang'] >= 4) 
                                  {
								  
								  
								  
                                  
				  
				  
				  
				  if (empty($_POST['titre_message']))
                  {	 
						 
				    if (empty($_POST['message']))
					{
				   
				    if (empty($_POST['titre_tutoriel']))
					{
				   
				    if (empty($_POST['commentaire']))
					{
					
					if (empty($_POST['titre_billet']))
					{
					
					if (empty($_POST['commentaires']))
					{
					
				   
				   
				    
                            }
                              else
                              {
                              
							     // Suppression du commentaire à l'aide d'une requête préparée
                    $req = $bdd->prepare('DELETE FROM commentaires_blog WHERE commentaires = :commentaires');
                   $req->execute(array('commentaires'=>htmlspecialchars($_POST['commentaires'])));
							  
							  echo " Commentaire supprimé"; 
                              }					         


							 }
                              else
                              {
                              
							     // Suppression du billet à l'aide d'une requête préparée
                    $req = $bdd->prepare('DELETE FROM billet WHERE titre_billet = :titre_billet');
                   $req->execute(array('titre_billet'=>htmlspecialchars($_POST['titre_billet'])));
							  
							  echo " Thème supprimé"; 
                              }
					
					
					
					          }
                              else
                              {
                              
							     // Suppression du commentaire à l'aide d'une requête préparée
                    $req = $bdd->prepare('DELETE FROM commentaires_tuto WHERE commentaire = :commentaire');
                   $req->execute(array('commentaire'=>htmlspecialchars($_POST['commentaire'])));
							  
							  echo " Commentaire supprimé"; 
                              }
					
					
					
                            
							}
                              else
                              {
                              
							    // Suppression du tuto à l'aide d'une requête préparée
                    $req = $bdd->prepare('DELETE FROM tutoriels WHERE titre_tutoriel = :titre_tutoriel');
                   $req->execute(array('titre_tutoriel'=>htmlspecialchars($_POST['titre_tutoriel']))); 
							  
							  echo " Tutoriel supprimé"; 
                              }
							
                             
							 
							}
                              else
                              {
                              
							     // Suppression de la réponse à l'aide d'une requête préparée
                    $req = $bdd->prepare('DELETE FROM topic_pc WHERE message = :message');
                   $req->execute(array('message'=>htmlspecialchars($_POST['message'])));
							  
							  echo " Réponse supprimée"; 
                              } 
							 
							 
							 }
                              else
                              {
                              
							     // Suppression de la question à l'aide d'une requête préparée
                    $req = $bdd->prepare('DELETE FROM forum_pc WHERE titre_message = :titre_message');
                   $req->execute(array('titre_message'=>htmlspecialchars($_POST['titre_message'])));
							  
							  echo " Question supprimée"; 
                              }
													
							 
							 
							 }
                            else
                              {							
							  echo "<p> L'action que vous tenter d'executer est réservée à l'administrateur du site </p>";
                                  }
                                  							  
						 
							  
							  }
                              else
                              {
                              echo " Cette adresse email n'existe pas"; 
                              }
							  
							  
							  }
                              else
                              {
                              echo "Adresse email invalide"; 
                                }


						   }
                            else
                            {
                             echo "Veuillez renseigner l'adresse email"; 
                                }					
		
					
                ?>
</article>
            </section>

                <footer>

                           <?php include("includes/pied_de_page.php"); ?>
                           

                          </footer>
                    </div>
          </body>
</html> 	