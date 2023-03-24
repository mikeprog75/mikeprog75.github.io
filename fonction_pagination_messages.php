<?php

		  
          //Décompte du nombre de messages postés

         $reponse = $bdd->prepare('SELECT COUNT(*) AS nbr_publication  FROM '.$table.' WHERE titre_message = ?');
		 
		 $reponse->execute(array($topic));

        $donnees = $reponse->fetch();

         
         //Si le numéro de page est connu
		 
         if (isset($_GET['page']))
         {
         $page = (int)$_GET['page'];

         }
         else //Mais si le numéro de page est inconnu il est égal à 1

         {
         $page = 1;
         }
         $nbr_publication = $donnees['nbr_publication']; //Nombre de messages postés dans la BDD
		 
		 //nombre de résultats par page

         $resultats = 5;

         //Nombre de pages
         
		 $nbr_pages = $nbr_publication/$resultats;
 
         $nbr_pages = ceil($nbr_pages);

          //Ligne à partir de laquelle on affiche les résultats
		 
		 $premier_article = $resultats*$page-($resultats*$page/$page);

          
		  //Dernière ligne

		 $dernier_article = $resultats;
       


?>

<?php

// Fonction pour formater la date et l'heure

function conversion($date)
{
  return strftime('%d/%m/%Y à %Hh %Mmin %Ssec', strtotime($date));
}

?>


<?php
//Fonction listant les pages

function get_list_page($page, $nb_page, $link, $nb = 2){
$list_page = array();
for ($i=1; $i <= $nb_page; $i++){
if (($i < $nb) OR ($i > $nb_page - $nb) OR (($i < $page + $nb) AND ($i > $page -$nb)))
$list_page[] = ($i==$page)?'<strong>'.$i.'</strong>':'<a href="'.$link.'&amp;page='.$i.'">'.$i.'</a>'; 
else{
if ($i >= $nb AND $i <= $page - $nb)
$i = $page - $nb;
elseif ($i >= $page + $nb AND $i <= $nb_page - $nb)
$i = $nb_page - $nb;
$list_page[] = '...';
}
}
$print= implode('-', $list_page);
return $print;
}

?>