<?php

session_start();?>

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
		<title>Traitement du chat</title>
    </head>
	
	<body>
	
	                             <div id="bloc_page">
            <header>
			                  
							  
							  <?php include("includes/entete.php"); ?>
  
                              <?php include("includes/menu.php"); ?>
			
            </header>
			
			<section>
	<article>

	<?php include("includes/base.php"); ?>
	
	<?php include("includes/constantes.php"); ?>
	
	<?php include("includes/fonction_pagination_pc.php"); ?>
	

<?php
$action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):''; ?>

<?php
switch($action) //On switch sur $action
{

case "repondremp": //Si on veut répondre

    //On récupère le titre et le message
    $message = $_POST['message'];
    $titre = $_POST['titre'];
    $temps = time();

    //On récupère la valeur de l'id du destinataire
    $dest = (int) $_GET['dest'];

    //Enfin on peut envoyer le message
    
	
    $query=$bdd->prepare('INSERT INTO forum_mp
    (mp_expediteur, mp_receveur, mp_titre, mp_text, mp_time, mp_lu)
    VALUES(:id, :dest, :titre, :txt, :tps, 0)'); 
    $query->bindValue(':id',$id,PDO::PARAM_INT);   
    $query->bindValue(':dest',$dest,PDO::PARAM_INT);   
    $query->bindValue(':titre',$titre,PDO::PARAM_STR);   
    $query->bindValue(':txt',$message,PDO::PARAM_STR);   
    $query->bindValue(':tps',$temps,PDO::PARAM_INT);   
    $query->execute();
    $query->CloseCursor(); 

    echo'<p>Votre message a bien été envoyé<br />
    
    Cliquez <a href="./chat_prive.php">ici</a> pour retourner
    à la messagerie</p>';

    break;
?>

<?php
    case "nouveaump": //On envoie un nouveau mp

    //On récupère le titre et le message
    $message = $_POST['message'];
    $titre = $_POST['titre'];
    $temps = time();
    $dest = $_POST['to'];

    //On récupère la valeur de l'id du destinataire
    //Il faut déja vérifier le nom

    $query=$bdd->prepare('SELECT id FROM forum_membres
    WHERE LOWER(pseudo) = :dest');
    $query->bindValue(':dest',$dest,PDO::PARAM_STR);
    $query->execute();
    if($data = $query->fetch())
    {
        $query=$bdd->prepare('INSERT INTO forum_mp
        (mp_expediteur, mp_receveur, mp_titre, mp_text, mp_time, mp_lu)
        VALUES(:id, :dest, :titre, :txt, :tps, :lu)'); 
        $query->bindValue(':id',$id,PDO::PARAM_INT);   
        $query->bindValue(':dest',(int) $data['id'],PDO::PARAM_INT);   
        $query->bindValue(':titre',$titre,PDO::PARAM_STR);   
        $query->bindValue(':txt',$message,PDO::PARAM_STR);   
        $query->bindValue(':tps',$temps,PDO::PARAM_INT);   
        $query->bindValue(':lu','0',PDO::PARAM_STR);   
        $query->execute();
        $query->CloseCursor(); 

       echo'<p>Votre message a bien été envoyé<br />
       Cliquez <a href="./chat_prive.php">ici</a> pour retourner à
       la messagerie</p>';
    }
    //Sinon l'utilisateur n'existe pas !
    else
    {
        echo'<p> Aucun membre ne possède ce pseudo</p>';
    }
    break;

}	
	
?>



</article>
            </section>

                <footer>

                           <?php include("includes/pied_de_page.php"); ?>
                           

                          </footer>
                    </div>
          </body>
</html>


	
	


