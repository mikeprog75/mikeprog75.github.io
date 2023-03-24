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
		<title>Affaires perso</title>
    </head>
	
		   
		   <body>
		   
		     
	                                
	                               <div id="bloc_page">
            <header>
			                  
							  
							  <?php include("includes/entete.php"); ?>
  
                              <?php include("includes/menu.php"); ?>
			
            </header>
			
			<section>
	
	<article>
	
	
	                               
								   <div id = "far">
								   
								   <h1>Bonjour à tous</h1>
								   
								   <?php
                                  // Enregistrons les informations de date dans des variables
 
                                  $jour = date('d');
                                  $mois = date('m');
                                  $annee = date('Y');
                                   
 
                                  // Maintenant on peut afficher ce qu'on a recueilli
								  
                               echo '<p class="date_jour"> Nous sommes le ' . $jour . '/' . $mois . '/' . $annee .  '</p>'; ?>

								   
								   <img src="images/picture/mike.png" alt="mon image" title = "le webmaster"  id="mike">
								   
								   <h3> M'PASSI Michel </h3>
								   
								   <h3> Webmaster, youtubeur et entrepreneur </h3>
								   
								   <p><strong>mon compte gmail:</strong> <br /> <em>michelmpassi75@gmail.com</em> <br /><br />
		                           <strong>mon compte facebook :</strong> <br /> <em>michelmpassi</em></p>
								   <strong>mon pseudo :</strong> <br /> <em>mikepro60</em></p>
								   
								   <p><strong>Mes contacts:</strong> 05-384-41-69 / 06-432-12-37</p>
								   
								   </div>
								   
								   
								   
						
	
	</article>
            </section>

                <footer>

                           <?php include("includes/pied_de_page.php"); ?>
                           

                          </footer>
                    </div>
          </body>
</html> 