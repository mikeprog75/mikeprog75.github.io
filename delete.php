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

		    
	
	<div id="formulaire">
	<form method="post" action="delete_post.php" >
    <fieldset>
	<legend>Formulaire réservé à l'administrateur du site</legend><br />
	
	<div id="adm"><label>Email de l'administrateur : </label></div> <input type="text" size="25" id="email" name="email" /><br />
	
	<div id="rng"><label>titre du message du membre :</label></div> <input type="text" size="16"  id="pass" name="titre_message" maxlength="25"/><br />
	
	<div id="textarea"><textarea name="message" id="precisions" cols="50" rows="10" placeholder = "saisissez le message du membre"  ></textarea></div><br /><br />
	                    
	<div id = "rng"><label>titre du tutoriel du membre :</label></div> <input type="text" size="16"  id="pass" name="titre_tutoriel" maxlength="25"/><br />
	
	<div id="textarea"><textarea name="commentaire" id="precisions" cols="50" rows="10" placeholder = "saisissez le commentaire du membre"  ></textarea></div><br /><br />
	
	<div id = "rng"><label>titre du thème du membre :</label></div> <input type="text" size="16"  id="pass" name="titre_billet" maxlength="25"/><br />
	
	<div id="textarea"><textarea name="commentaires" id="precisions" cols="50" rows="10" placeholder = "saisissez le commentaire du membre"  ></textarea></div><br /><br />
	
	<div id="send"><input class="blue-button" type="submit" value="Supprimer le message ou le tuto" /></div>
    </fieldset>
	</form>
</div>
         
		

 </article>
			
			</section>
			
			      <footer>
			               <?php include("includes/pied_de_page.php"); ?>
                           
			   </footer>
			</div>
	   </body>
</html>