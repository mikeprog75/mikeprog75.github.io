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

	      <h1>Mon super tuto !</h1>
		  
		  <div id = "nouv_q"><p><a class = "nouv_q" href="tutoriel_pc.php">Nouveau tutoriel</a></p></div>
		  
		  <?php include ("includes/base.php") ; ?>
		  
		  <?php include ("includes/fonction_traduction.php"); ?>
		  
		  <?php
		  //On récupère la valeur du titre du message
          $topic =  $_GET['tuto']; $table = "tutoriels"; ?>
		  
		 
		 <?php include ("includes/fonction_pagination_tuto.php"); ?>
		  
	    
  
  <?php
  // Compteur pour le nombre de tutos postés par un membre

			$reponse = $bdd->prepare('SELECT COUNT(*) AS nb_tuto FROM tutoriels WHERE titre_tutoriel = ?');
			$reponse->execute(array($topic));
			
			while ($donnee = $reponse->fetch())
{
    echo '<p>' . ($donnee['nb_tuto']) . ' tutoriel(s) posté(s) </p>';


} // Fin de la boucle du compteur
$reponse->closeCursor(); ?>

      

	  
	   <h3>Tutoriels</h3>
		  
		   <?php
		   // Récupération du message
          $req = $bdd->prepare('SELECT m.nom_avatar nom_avatar_membre, m.nom nom_membre, m.prenom prenom_membre, 
		  t.pseudo pseudo_membre, t.discipline discipline_membre, t.titre_tutoriel titre_tutoriel_membre, t.tutoriel tutoriel, 
		  t.date_tutoriel date_tutoriel_membre FROM forum_membres m  LEFT JOIN tutoriels t
          ON m.pseudo = t.pseudo WHERE titre_tutoriel = ? ORDER BY date_tutoriel DESC LIMIT '.$premier_article.','.$dernier_article.'');
          
		  $req->execute(array($topic));
          
		  while($donnee = $req->fetch())
           {
           ?>
    
        <?php echo '<p class="border"><strong>' . 'Discipline' . ':' . htmlspecialchars($donnee['discipline_membre']) . '</strong>' . '<br /><br />'
		. '<strong>'. 'Titre' . ':' . htmlspecialchars($donnee['titre_tutoriel_membre']) . '</strong>'  . '<br /><br />' . 'Posté par' 
        .'<mark>' . htmlspecialchars($donnee['nom_membre']) . '</mark>'. '|' .'<mark>' . htmlspecialchars($donnee['prenom_membre']) . '</mark>' . '|'. '<strong>Alias</strong>' 
	  .'|'.   htmlspecialchars($donnee['pseudo_membre'])  . '<br /></br>' . '<img src="./images/avatar/'.htmlspecialchars($donnee['nom_avatar_membre']).'" alt="" id = "mini_avatar" />' .
	  '<br /><br />' .'<em> le </em>' . htmlspecialchars(conversion($donnee['date_tutoriel_membre'])) . '<br /><br />' 
	  . code(nl2br(stripslashes(htmlspecialchars($donnee['tutoriel'])))) .  '</p>'; ?>
	  
	  
	  <?php
} // Fin de la boucle des messages
$req->closeCursor();
?>
    
 

<?php
 
 // Affichage des numéros de page
 
 echo '<p>[ Page :';

// Boucle sur les pages

echo get_list_page($page, $nbr_pages, './tuto_vision.php?tuto='.$topic);

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