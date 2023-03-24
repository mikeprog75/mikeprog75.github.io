
<?php
// A - Fonction pour calculer le nombre de pages

function calcul_des_pages
($table, $bdd, $resultats)

{

         //Décompte du nombre de messages postés

         $reponse = $bdd->query('SELECT COUNT(*) AS nbr_publication FROM '.$table.'');

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
 
         //Nombre de pages
         
		 $nbr_pages = $nbr_publication/$resultats;
 
         $nbr_pages = ceil($nbr_pages);

          //Ligne à partir de laquelle on affiche les résultats
		 
		 $premier_article = $resultats*$page-($resultats*$page/$page);

          
		  //Dernière ligne

		 $dernier_article = $resultats;
       
return array($page, $nbr_pages, $premier_article, $dernier_article);


}

// B -  Fonction pour afficher les liens précédent et suivant

function affichage_des_liens
($page, $nbr_pages)
{

   if ($page > 1)
        echo " <a href=\"?page=".($page-1)."\"><img src= images/picture/fleche_gauche.jpg alt = fleche_gauche title = Précédent id= fleche_gauche></a> ";
    else
        echo "Précédent";
         
    if ($page < $nbr_pages)
        echo " <a href=\"?page=".($page+1)."\"><img src= images/picture/fleche_droite.jpg alt = fleche_droite title = Suivant  id= fleche_droite></a> ";
    else
        echo "Suivant";
    
}

// C -  Fonction pour formater la date et l'heure

function conversion($date)
{
  return strftime('%d/%m/%Y à %Hh %Mmin %Ssec', strtotime($date));
}

?>