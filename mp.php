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
		<title>Le laborieux</title>
    </head>

    <body>
	      
		                    
							<div id="bloc_page">
            <header>
			                  
							  
							  <?php include("includes/entete.php"); ?>
  
                              <?php include("includes/menu.php"); ?>         
			</header>
					 
					 <section>
                    <article>
				
					
					
					
					<div id ="private">
					<p> Le chat privé est une rubrique à partir de laquelle, vous pouvez discuter en privé avec un(e) ami(e) ou une personne intime(copain ou copine) <br /><br /> 
					Avant d'envoyer un message privé, vous devez vous inscrire a travers le lien inscription du menu de navigation<br /><br />
					
					</div>
					   
					   <div id = "dof">
					    <p> Si vous êtes déjà inscrit, cliquez sur le lien <a href="connexion_mp.php">Se connecter</a> pour  envoyer des messages privés<br /><br /> 
						   
						   Avant de vous inscrire ou de vous connecter, vous pouvez ausssi cliquer <a href="galerie_membres.php">ici</a> pour voir les informations détaillées
           				   de tous les membres inscrits sur le chat privé </p>
					</div>
					
					    
					
					
					
					</article>
					
					</section>
					
					<footer>
			                       <?php include("includes/pied_de_page.php"); ?>
								   

					</footer>
			    </div>
		   </body>
</html>
		  