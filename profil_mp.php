<?php
session_start(); ?>

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
		<title>Le dernier inscrit</title>
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
//On récupère la valeur de nos variables passées par URL
$action = isset($_GET['action'])?htmlspecialchars($_GET['action']):'consulter';
$membre = isset($_GET['fm'])?(int) $_GET['fm']:'';
?>

<?php
//On regarde la valeur de la variable $action
switch($action)
{
    //Si c'est "consulter"
    case "consulter":
       //On récupère les infos du membre
       $reponse=$bdd->prepare('SELECT id, sexe, nom, prenom, pseudo, nom_avatar, email , DATE_FORMAT(date_inscription, \'%d/%m/%Y à %Hh %imin %ssec\') 
	   AS date_inscription_fr FROM forum_membres WHERE id = :membre ');
       $reponse->bindValue(':membre',$membre, PDO::PARAM_INT);
       $reponse->execute();
       $data=$reponse->fetch();

       //On affiche les infos sur le membre
       echo ' <h1>Profil de '.stripslashes(htmlspecialchars($data['pseudo'])).'</h1>';
              
       echo'<img src="./images/avatar/'.$data['nom_avatar'].'"
       alt="Aucun avatar" id = "mini_avatar" />';
       
       echo'<p><strong>Adresse e-Mail : </strong>
       <a href="mailto:'.stripslashes($data['email']).'">
       '.stripslashes(htmlspecialchars($data['email'])).'</a><br /><br />';
       
       echo'Ce membre est inscrit depuis le
       <strong>'.$data['date_inscription_fr'].'</strong>
       
       <br /><br />';
       
       '</p>';
       $reponse->CloseCursor();
       break;
	   
	   }
?>





</article>
            </section>

                <footer>

                           
					       <?php include ("includes/pied_de_page.php") ; ?>


                          </footer>
                    </div>
          </body>
</html> 					 


