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
		   <form  method="post" action="recherche_pseudo_com.php"  >
		   <fieldset>
		   <legend>Recherche</legend>
		   
		   <label>Recherche du commentaire en fonction du pseudo </label><input type="text" size="17"  name="pseudo"  placeholder="ex: maxime42" maxlength="10"/><br />
		   
		   <div id = "ok"><input class="blue-button" type="submit" value="ok" /></div>
		   
		   </fieldset>
		   </form>
		   
		   <form  method="post" action="recherche_titre_com.php"  >
		   <fieldset>
		   <legend>Recherche</legend>
		   
		   <label>Recherche du commentaire en fonction du titre </label><input type="text" size="20"  name="titre_tutoriel" placeholder="ex: Windows 7"  maxlength="25"/><br />
		   
		   <div id = "ok"><input class="blue-button" type="submit" value="ok" /></div>
		   
		   </fieldset>
		   </form>
		   </div>

		   
		   
		   
		   <?php include ("includes/base.php") ; ?>
		   
		   <?php include ("includes/fonction_pagination_pc.php") ; ?>
		   
		   <?php include ("includes/fonction_traduction.php") ; ?>

 
<?php
//definition de la table

$table = 'commentaires_tuto';

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

$req = $bdd->query('SELECT m.nom_avatar nom_avatar_membre, c.pseudo pseudo_membre, c.titre_tutoriel titre_tutoriel_membre, 
    c.commentaire commentaire, c.date_commentaire date_commentaire_membre FROM forum_membres m LEFT JOIN commentaires_tuto c ON m.pseudo = c.pseudo 
    ORDER BY date_commentaire DESC LIMIT '.$premier_article.','.$dernier_article.'');

while ($donnee = $req->fetch())
{
?>
         
	
  <?php echo '<p class="slalom">
      <strong>' . 'Titre' . ':'  .  htmlspecialchars($donnee['titre_tutoriel_membre']) . '</strong>'  . '<br /><br />'  . '<em> Posté par </em>' 
      . htmlspecialchars($donnee['pseudo_membre']) . '<br /></br>' . '<img src="./images/avatar/'.htmlspecialchars($donnee['nom_avatar_membre']).'" alt="" id = "mini_avatar" />' .'<br /><br />'
	  . '<em> le </em>' . htmlspecialchars(conversion($donnee['date_commentaire_membre'])) .'<br /></br />'
	  . code(nl2br(stripslashes(htmlspecialchars($donnee['commentaire'])))) .  '</p>'; ?>

  

	  
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