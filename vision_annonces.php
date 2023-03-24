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
		   
		   
		   
		   
		   
		   <div id = "search">
		   <form  method="post" action="recherche_annonce.php"  >
		   <fieldset>
		   <legend>Recherche</legend>
		   
		   <label>Recherche de l'annonce en fonction du titre </label><input type="text" size="20"  name="titre_annonce" placeholder = "ex: concert" maxlength="25"/>
		   
		   <div id = "ok"><input class="blue-button" type="submit" value="ok" /></div>
		   
		   </fieldset>
		   </form>
		   </div>

		   
		   
		   
		   <?php include ("includes/base.php") ; ?>
		   
		   <?php include ("includes/fonction_pagination_pc.php") ; ?>
		   
		   <?php include ("includes/fonction_traduction.php") ; ?>

 
<?php
//definition de la table

$table = 'annonces';

//nombre de résultats par page

$resultats = 10;


//Calcul du nombre de pages

calcul_des_pages($table, $bdd, $resultats);


//extraction des valeurs

list($page, $nbr_pages,
$premier_article,
$dernier_article) =
calcul_des_pages($table,
$bdd,
$resultats);
?>



<?php
// Préparation de la requete

$req = $bdd->query('SELECT titre_annonce, annonce, DATE_FORMAT(date_annonce, \'%d/%m/%Y à %Hh %imin %ssec\') AS date_annonce_fr 
   FROM '.$table.'  ORDER BY date_annonce DESC LIMIT '.$premier_article.','.$dernier_article.'');

while ($donnee = $req->fetch())
{
?>
         
	
  <?php echo '<p class="slalom">
      <strong>' . 'Annonce' . ':'  .  htmlspecialchars($donnee['titre_annonce']) . '</strong>'  . '<br /><br />'  
	  . '<em> Publié le </em>' . htmlspecialchars($donnee['date_annonce_fr']) .'<br /></br />'
	  . code(nl2br(stripslashes(htmlspecialchars($donnee['annonce'])))) .  '</p>'; ?>

  

	  
<?php	
	
	}// Fin de la boucle des messages
$req->closeCursor();

affichage_des_liens($page, $nbr_pages);
	  
?>	 


		   
		   </article>
            </section>

                <footer>

                           <?php include("includes/pied_de_page.php"); ?>
                           

                          </footer>
                    </div>
          </body>
</html> 