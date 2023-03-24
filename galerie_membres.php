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

	      
<?php include ("includes/base.php"); ?>

<?php include ('includes/fonction_pagination_pc.php'); ?>



<?php

//definition de la table

$table = 'forum_membres';

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


// Préparation de la requete

$req = $bdd->query('SELECT nom, prenom, pseudo, nom_avatar, localisation, DATE_FORMAT(date_inscription, \'%d/%m/%Y à %Hh %imin %ssec\') AS date_inscription_fr
       FROM '.$table.' ORDER BY date_inscription DESC LIMIT '.$premier_article.','.$dernier_article.'');

while ($donnee = $req->fetch())

{

 /* Affichage des éléments */
 
echo '<p class ="bonne">' . '<br />' . '<img src="./images/avatar/'.htmlspecialchars($donnee['nom_avatar']).'" alt="" id = "mini_avatar" />' . '<br /><br />' .
       '<strong>' . 'Nom' . ':' . '</strong>' . htmlspecialchars($donnee['nom']) . '<br /><br />' . '<strong>' . 'Prenom' . ':' . '</strong>'.  htmlspecialchars($donnee['prenom']) .
       '<br /><br />' . '<strong>' . 'Pseudo' . ':'  . '</strong>' . htmlspecialchars($donnee['pseudo'])  . '<br /><br />' . '<strong>' .
	   'Inscrit depuis le' . ':' . '</strong>' . htmlspecialchars($donnee['date_inscription_fr']) .  '<br /><br />' . '<strong>' .
	   'Localisation'. ':' . '</strong>' .  htmlspecialchars($donnee['localisation']) . '<br /><br />' .  '</p>'; ?>
	     
		   
		 
		 <div id = "totale"><a href="galerie_membres_photos.php?membre=<?php echo $donnee['pseudo']; ?>">Voir plus de photos</a></div>
		 
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
 