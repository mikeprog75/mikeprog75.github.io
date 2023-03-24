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

	      <h1>Mon super blog !</h1>
		  
        
		<div id = "nouv_q"><p><a class = "nouv_q" href="billet.php">Nouveau thème</a></p></div>
		<div id ="nouv_rep"><p><a class = "nouv_rep" href="comment.php">Nouveau commentaire</a></p></div>
		<div id="update_questions"><p><a class = "update_questions" href="modif_theme.php">Modifier vos thèmes</a></p></div>
		
		

		  
		  
		  <?php include ("includes/base.php") ; ?>
		  
		  <?php include("includes/fonction_traduction.php"); ?>
		  
		  <?php
          //On récupère la valeur du titre du message
          $topic =  $_GET['message']; $table = "commentaires_blog"; ?>
		  
		  <?php include ('includes/fonction_pagination_blog.php'); ?>
		  
		  


<?php
  // Compteur pour le nombre de thèmes postés par un membre

			$reponse = $bdd->prepare('SELECT COUNT(*) AS nb_themes FROM billet WHERE titre_billet = ?');
			$reponse->execute(array($topic));
			
			while ($donnee = $reponse->fetch())
{
    echo '<p>' . ($donnee['nb_themes']) . ' thème(s) posté(s) </p>';


} // Fin de la boucle du compteur
$reponse->closeCursor(); ?>

<?php
  // Compteur pour le nombre de commentaires postés par un membre

			$reponse = $bdd->prepare('SELECT COUNT(*) AS nb_comment FROM commentaires_blog WHERE titre_billet = ?');
			$reponse->execute(array($topic));
			
			while ($donnee = $reponse->fetch())
{
    echo '<p>' . ($donnee['nb_comment']) . ' commentaire(s) posté(s) </p>';


} // Fin de la boucle du compteur
$reponse->closeCursor(); ?>
 



<h3>Thèmes</h3>

		  
		   <?php
		   // Récupération du thème
          $req = $bdd->prepare('SELECT m.nom_avatar nom_avatar_membre, b.pseudo pseudo_membre, b.titre_billet titre_billet_membre, b.billet billet, 
		  b.date_billet date_billet_membre FROM forum_membres m  LEFT JOIN billet b
          ON m.pseudo = b.pseudo WHERE titre_billet = ? ORDER BY date_billet LIMIT 0,1');
          
		  $req->execute(array($topic));
          
		  while($donnee = $req->fetch())
           {
           ?>
    
        <?php echo '<p class="slalom">'
		. '<strong>'. 'Titre' . ':' . htmlspecialchars($donnee['titre_billet_membre']) . '</strong>'  . '<br /><br />' . '<em> Posté par </em>' 
      . htmlspecialchars($donnee['pseudo_membre'])  . '<br /></br>' . '<img src="./images/avatar/'.htmlspecialchars($donnee['nom_avatar_membre']).'" alt="" id ="mini_avatar" />' .
	  '<br /><br />' .'<em> le </em>' . htmlspecialchars(conversion($donnee['date_billet_membre'])) . '<br /><br />' 
	  . code(nl2br(stripslashes(htmlspecialchars($donnee['billet'])))) .  '</p>'; ?>
	  
	  
	  <?php
} // Fin de la boucle des messages
$req->closeCursor();
?>
    
 
<h3>Commentaires</h3>



<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête
 
// Récupération des commentaires
$req = $bdd->prepare('SELECT m.nom_avatar nom_avatar_membre, c.pseudo pseudo_membre, c.titre_billet titre_billet_membre, c.commentaires commentaires, 
		  c.date_commentaire date_commentaire_membre FROM forum_membres m  LEFT JOIN commentaires_blog c
          ON m.pseudo = c.pseudo WHERE titre_billet = ?  ORDER BY date_commentaire LIMIT '.$premier_article.','.$dernier_article.'');
$req->execute(array($topic));
 
while ($donnee = $req->fetch())
{
?>

<?php echo '<p class="slalom"><strong>' . 'Titre' . ':' . htmlspecialchars($donnee['titre_billet_membre']) . '</strong>'  . '<br /><br />' . '<em> Posté par </em>' 
      . htmlspecialchars($donnee['pseudo_membre'])  . '<br /></br>' . '<img src="./images/avatar/'.htmlspecialchars($donnee['nom_avatar_membre']).'" alt="" id ="mini_avatar" />' . 
	  '<br /><br />' .'<em> le </em>' . htmlspecialchars(conversion($donnee['date_commentaire_membre'])) . '<br /><br />' 
	  . code(nl2br(stripslashes(htmlspecialchars($donnee['commentaires'])))) .  '</p>'; ?>
	  
	  
	
<?php
} // Fin de la boucle des réponses
$req->closeCursor();
?>

<?php
 
 // Affichage des numéros de page
 

 echo '<p>[ Page :';

// Boucle sur les pages

echo get_list_page($page, $nbr_pages, './espace_membre_blog.php?message='.$topic);

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