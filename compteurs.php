<?php include ("includes/base.php") ; ?>


  <?php include ("includes/compteur_connectes.php") ; ?>






<?php
            // Compteur pour les membres inscrits sur le site

			$reponse = $bdd->query('SELECT COUNT(*) nb_membres FROM forum_membres ');
			
			while ($donnee = $reponse->fetch())
{
    echo '<p class="membres_mp">'  . ' membre(s) inscrit(s) sur le site' . '<br />' . ($donnee['nb_membres']) . '</p>';


} 

// Fin de la boucle du compteur
$reponse->closeCursor(); 

?>


<?php
            // Compteur pour les mp

			$reponse = $bdd->query('SELECT COUNT(*) nb_mp FROM forum_mp ');
			
			while ($donnee = $reponse->fetch())
{
    echo '<p class="messages_mp">'  . ' message(s) posté(s) sur le chat privé' . '<br />' . ($donnee['nb_mp']) . '</p>';


} 

// Fin de la boucle du compteur
$reponse->closeCursor(); 

?>



<?php
					   // Compteur du dernier membre inscrit sur le chat privé
					   
               $reponse = $bdd->query('SELECT COUNT(*) AS nb_membres FROM forum_membres');
               $donnees = $reponse->fetch();
               $reponse->CloseCursor();	
	 
               $reponse = $bdd->query('SELECT id, pseudo FROM forum_membres ORDER BY id DESC LIMIT 0, 1');
               $data = $reponse->fetch();
               $derniermembre = stripslashes(htmlspecialchars($data['pseudo']));

              echo'<p class = "dernier_membre">Le dernier membre inscrit est <a href="./profil_mp.php?fm='.$data['id'].'&amp;action=consulter">'.$derniermembre.'</a></p>';
              $reponse->CloseCursor();
					 
?>



<?php
			// Compteur des commentaires des tuto
			
			$reponse = $bdd->query('SELECT COUNT(*) AS nb_commentaires FROM commentaires_tuto');
			while ($donnees = $reponse->fetch())
{
    echo '<p class="comment_tuto">' . ' commentaire(s)' . '<br />' . ($donnees['nb_commentaires']) .  '</p>';

}

// Fin de la boucle du compteur
$reponse->closeCursor();
 
			
?>



<?php
            // Compteur pour le nombre total de questions postées sur le forum

			$reponse = $bdd->query('SELECT COUNT(*) nb_messages FROM forum_pc ');
			
			while ($donnee = $reponse->fetch())
{
    echo '<p class="forum_questions">' . ' question(s) sur le forum' . '<br />' . ($donnee['nb_messages']) . '</p>';


} 

// Fin de la boucle du compteur
$reponse->closeCursor(); 
			
?>


<?php
            // Compteur pour le nombre total de réponses postées sur le forum

			$reponse = $bdd->query('SELECT COUNT(*) nb_messages FROM topic_pc ');
			
			while ($donnee = $reponse->fetch())
{
    echo '<p class="forum_reponses">'  . ' réponse(s) sur le forum' . '<br />' . ($donnee['nb_messages']) . '</p>';


} 

// Fin de la boucle du compteur
$reponse->closeCursor(); 

?>


<?php
            // Compteur pour le nombre total de tutoriels

        	$reponse = $bdd->query('SELECT COUNT(*) nb_tuto FROM tutoriels ');
			
			while ($donnee = $reponse->fetch())
{
    echo '<p class="cour">'  . ' tutoriel(s) posté(s)' . '<br />' . ($donnee['nb_tuto']) . '</p>';


} 

// Fin de la boucle du compteur
$reponse->closeCursor(); 

?>








					 
					 