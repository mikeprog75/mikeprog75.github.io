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

	      <h1>Mon super forum !</h1>
		  
        <div id = "nouv_q"><p><a class = "nouv_q" href="forum_pc.php">Nouvelle question</a></p></div>
		<div id ="nouv_rep"><p><a class = "nouv_rep" href="reponses_pc.php">Nouvelle réponse</a></p></div>
		<div id="update_questions"><p><a class = "update_questions" href="modification_question_pc.php">Modifier vos questions</a></p></div>
		
		
		
		
		
		
  
		  <?php include ("includes/base.php") ; ?>
		  
		  <?php include ("includes/fonction_traduction.php"); ?>
		  
		  <?php
          //On récupère la valeur du titre du message
          $topic =  $_GET['message']; $table = "topic_pc"; ?>
		  
		  <?php include ('includes/fonction_pagination_messages.php'); ?>
		  
		  
  
  
  <?php
  // Compteur pour le nombre de questions postées par un membre

			$reponse = $bdd->prepare('SELECT COUNT(*) AS nb_messages FROM forum_pc WHERE titre_message = ?');
			$reponse->execute(array($topic));
			
			while ($donnee = $reponse->fetch())
{
    echo '<p>' . ($donnee['nb_messages']) . ' question(s) postée(s) </p>';


} // Fin de la boucle du compteur
$reponse->closeCursor(); ?>

<?php
  // Compteur pour le nombre de réponses postées par un membre

			$reponse = $bdd->prepare('SELECT COUNT(*) AS nb_messages FROM topic_pc WHERE titre_message = ?');
			$reponse->execute(array($topic));
			
			while ($donnee = $reponse->fetch())
{
    echo '<p>' . ($donnee['nb_messages']) . ' réponse(s) postée(s) </p>';


} // Fin de la boucle du compteur
$reponse->closeCursor(); ?>

        <h3>Question</h3>
		  
		   <?php
		   // Récupération du message
          $req = $bdd->prepare('SELECT m.nom_avatar nom_avatar_membre, f.pseudo pseudo_membre, f.discipline discipline_membre, f.titre_message titre_message_membre, f.message message, 
		  f.date_message date_message_membre FROM forum_membres m  LEFT JOIN forum_pc f
          ON m.pseudo = f.pseudo WHERE titre_message = ? ORDER BY date_message LIMIT 0,1');
          
		  $req->execute(array($topic));
          
		  while($donnee = $req->fetch())
           {
           ?>
    
        <?php echo '<p class="slalom"><strong>' . 'Discipline' . ':' . htmlspecialchars($donnee['discipline_membre']) . '</strong>' . '<br /><br />' 
		. '<strong>' . 'Titre' . ':' . htmlspecialchars($donnee['titre_message_membre']) . '</strong>'  . '<br /><br />' . '<em> Posté par </em>' 
      . htmlspecialchars($donnee['pseudo_membre'])  . '<br /></br>' . '<img src="./images/avatar/'.htmlspecialchars($donnee['nom_avatar_membre']).'" alt="" id ="mini_avatar" />' .
	  '<br /><br />' .'<em> le </em>' . htmlspecialchars(conversion($donnee['date_message_membre'])) . '<br /><br />' 
	  . code(nl2br(stripslashes(htmlspecialchars($donnee['message'])))) .  '</p>'; ?>
	  
	  
	  <?php
} // Fin de la boucle des messages
$req->closeCursor();
?>
    
	
<h3>Réponses</h3>



<?php
 
// Récupération des réponses
$req = $bdd->prepare('SELECT m.nom_avatar nom_avatar_membre, t.pseudo pseudo_membre, t.titre_message titre_message_membre, t.message message, 
		  t.date_message date_message_membre FROM forum_membres m  LEFT JOIN topic_pc t
          ON m.pseudo = t.pseudo WHERE titre_message = ?  ORDER BY date_message LIMIT '.$premier_article.','.$dernier_article.'');
$req->execute(array($topic));
 
while ($donnee = $req->fetch())
{
?>

<?php echo '<p class="slalom"><strong>' . 'Titre' . ':' . htmlspecialchars($donnee['titre_message_membre']) . '</strong>'  . '<br /><br />' . '<em> Posté par </em>' 
      . htmlspecialchars($donnee['pseudo_membre'])  . '<br /></br>' . '<img src="./images/avatar/'.htmlspecialchars($donnee['nom_avatar_membre']).'" alt="" id = "mini_avatar" />' . 
	  '<br /><br />' .'<em> le </em>' . htmlspecialchars(conversion($donnee['date_message_membre'])) . '<br /><br />' 
	  . code(nl2br(stripslashes(htmlspecialchars($donnee['message'])))) .  '</p>'; ?>
	  
	  
	
<?php
} // Fin de la boucle des réponses
$req->closeCursor();
?>

<?php
 
 // Affichage des numéros de page
 
 echo '<p>[ Page :';

echo get_list_page($page, $nbr_pages, './espace_membre_forum.php?message='.$topic);

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