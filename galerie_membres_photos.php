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
          //On récupère la valeur du pseudo
          $membre =  $_GET['membre']; $table = "avatar"; ?>
		  
		  <?php include ('includes/fonction_pagination_galerie.php'); ?>
		 
    
<h1>  Galerie photos </h1> 

<?php
 
// Récupération des réponses
$req = $bdd->prepare('SELECT nom_avatar1, nom_avatar2, nom_avatar3, nom_avatar4  FROM '.$table.' WHERE pseudo = ? LIMIT '.$premier_article.','.$dernier_article.'');
$req->execute(array($membre));
 
while ($donnee = $req->fetch())
{
?>

<?php echo '<p>' . '<a href="./images/galerie1/'.htmlspecialchars($donnee['nom_avatar1']).'">
<img src="./images/galerie1/'.htmlspecialchars($donnee['nom_avatar1']).'" alt="" id = "mini_photo"  />' . 

'<a href="./images/galerie2/'.htmlspecialchars($donnee['nom_avatar2']).'">
<img src="./images/galerie2/'.htmlspecialchars($donnee['nom_avatar2']).'" alt="" id = "mini_photo"  />' .

'<a href="./images/galerie3/'.htmlspecialchars($donnee['nom_avatar3']).'">
<img src="./images/galerie3/'.htmlspecialchars($donnee['nom_avatar3']).'" alt="" id = "mini_photo"  />' .

'<a href="./images/galerie4/'.htmlspecialchars($donnee['nom_avatar4']).'">
<img src="./images/galerie4/'.htmlspecialchars($donnee['nom_avatar4']).'" alt="" id = "mini_photo"  />' . '</p>'; ?>

	                      	
<?php
} // Fin de la boucle des réponses
$req->closeCursor();
?>

<?php
 
 // Affichage des numéros de page
 
 echo '<p>[ Page :';

// Boucle sur les pages

echo get_list_page($page, $nbr_pages, './galerie_membres_photos.php?membre='.$membre);

echo ' ]</p>';
?>



</article>
            </section>

                <footer>

                           <?php include("includes/pied_de_page.php"); ?>
                           

                          </footer>
                    </div>
          </body>
</html>       