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

	      
		  
        <div id = "nouv_q"><p><a class = "nouv_q" href="vision_tutoriels.php">Nouveau commentaire</a></p></div>
	
		
		
	
		
  
		  <?php include ("includes/base.php") ; ?>
		  
		  <?php include ("includes/fonction_traduction.php"); ?>
		  
		  <?php
          //On récupère la valeur du titre du tuto
          $topic =  $_GET['comment']; $table = "commentaires_tuto"; ?>
		  
		  <?php include ("includes/fonction_pagination_comment.php"); ?>
  
  
  <?php
  // Compteur pour le nombre de commentaires postés par un membre

			$reponse = $bdd->prepare('SELECT COUNT(*) AS nb_commentaires FROM commentaires_tuto WHERE titre_tutoriel = ?');
			$reponse->execute(array($topic));
			
			while ($donnee = $reponse->fetch())
{
    echo '<p>' . ($donnee['nb_commentaires']) . ' commentaire(s) posté(s) </p>';


} // Fin de la boucle du compteur
$reponse->closeCursor(); ?>


		  
<h3>Commentaires</h3>



<?php
 
// Récupération des commentaires
$req = $bdd->prepare('SELECT m.nom_avatar nom_avatar_membre, c.pseudo pseudo_membre, c.titre_tutoriel titre_tutoriel_membre, c.commentaire commentaire, 
		  c.date_commentaire date_commentaire_membre FROM forum_membres m  LEFT JOIN commentaires_tuto c
          ON m.pseudo = c.pseudo WHERE titre_tutoriel = ?  ORDER BY date_commentaire LIMIT '.$premier_article.','.$dernier_article.'');
$req->execute(array($topic));
 
while ($donnee = $req->fetch())
{
?>

<?php echo '<p class="slalom"><strong>' . 'Titre' . ':' . htmlspecialchars($donnee['titre_tutoriel_membre']) . '</strong>'  . '<br /><br />' . '<em> Posté par </em>' 
      . htmlspecialchars($donnee['pseudo_membre'])  . '<br /></br>' . '<img src="./images/avatar/'.htmlspecialchars($donnee['nom_avatar_membre']).'" alt="" id = "mini_avatar" />' . 
	  '<br /><br />' .'<em> le </em>' . htmlspecialchars(conversion($donnee['date_commentaire_membre'])) . '<br /><br />' 
	  . code(nl2br(stripslashes(htmlspecialchars($donnee['commentaire'])))) .  '</p>'; ?>
	  
	  
	
<?php
} // Fin de la boucle des réponses
$req->closeCursor();
?>

<?php
 
 // Affichage des numéros de page
 
 echo '<p>[ Page :';

// Boucle sur les pages

echo get_list_page($page, $nbr_pages, './espace_membre_commentaire.php?comment='.$topic);

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