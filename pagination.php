<?php include ("includes/base.php"); ?>

<?php include ('includes/fonction_pagination_pc.php'); ?>



<?php

//definition de la table

$table = 'messages';

//nombre de résultats par page

$resultats = 5;


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

$req = $bdd->query('SELECT m.nom_avatar nom_avatar_membre, c.pseudo pseudo_membre, c.message message_membre, c.date_message date_message_membre FROM membres m  LEFT JOIN messages c

ON m.pseudo = c.pseudo ORDER BY date_message DESC LIMIT '.$premier_article.','.$dernier_article.'');

while ($donnee = $req->fetch())

{

 /* Affichage des éléments */
 
echo '<p class="bordure">'   . '<em>Posté par</em>' .'<em> </em>' 
      . htmlspecialchars($donnee['pseudo_membre'])  . '<br /><br />' . '<img src="./images/avatar/'.htmlspecialchars($donnee['nom_avatar_membre']).'" alt="" id = "mini_avatar" />'. '<br /><br />' 
	  .  '<em>le</em>' . '<em>:</em>'. htmlspecialchars(conversion($donnee['date_message_membre'])) . '<br /><br />'
	  . htmlspecialchars($donnee['message_membre'])  . '</p>';

}// Fin de la boucle des messages
$req->closeCursor();

affichage_des_liens($page, $nbr_pages);



?>