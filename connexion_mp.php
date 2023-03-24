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
		<title>Connexion mp</title>
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
		
		
		
		    
	
	
	<?php
	if (!isset($_POST['pseudo'])) //On est dans la page de formulaire
{
	echo '<div id =formulaire><form method="post" action="connexion_mp.php" >
    <fieldset>
	<legend>Vos identifiants</legend>
	
	<div id="login"><label>Pseudo :</label></div> <input type="text" size="16"  id="pseudo" name="pseudo" placeholder="ex: maxime42" maxlength="10" /> <br />
	                    
	<div id="pwd"><label>Mot de passe :</label></div> <input type="password" size="16"  id="pass" name="pass" maxlength="15"/><br />
	
	<div id="send"><input class="blue-button" type="submit" value="Connexion" /></div>
    </fieldset>
	</form></div>';
	
	 
	
}
else
{
    $message='';
    if (empty($_POST['pseudo']) || empty($_POST['pass']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion_mp.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe
    {
        $query=$bdd->prepare('SELECT id, pass, rang, pseudo
        FROM forum_membres WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
	if ($data['pass'] == sha1('gz'.$_POST['pass'])) // Acces OK !
	{
	
	if ($data['rang'] == 0) //Le membre est banni
    {
        $message="<p>Vous avez été banni(chassé) du site parsque , vous n'avez pas respecté les règles en vigueur</p>";
    }
    else //Sinon c'est ok, on se connecte
	{
	    $_SESSION['pseudo'] = $data['pseudo'];
	    $_SESSION['level'] = $data['rang'];
	    $_SESSION['id'] = $data['id'];
		
		setcookie('pseudo', '', time() + 365*24*3600, null, null, false, true); // On écrit un cookie qui retient le pseudo
        setcookie('pass', '', time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie qui retient le mot de passe haché
		
	    $message = '<p class =bonjour_mp>Bienvenue '.$data['pseudo'].', 
			vous êtes maintenant connecté  <br /><br />  
			<a href="chat_prive.php">Acceder à votre boite de messagerie privée </a><br /><br />
			</p>';
	             ?>
				 
				  
				  
				  <?php
// Préparation de la requete

   $req = $bdd->prepare('SELECT pseudo, nom_avatar, DATE_FORMAT(date_inscription, \'%d/%m/%Y à %Hh %imin %ssec\') AS date_inscription_fr FROM forum_membres WHERE pseudo = :pseudo ');

   $req->execute(array('pseudo' => htmlspecialchars($_POST['pseudo'])));

                    while ($donnee = $req->fetch())
                    {
				    ?>
					
					<?php echo '<p class="bor_mp">'
                   .'<strong>' . 'Profil de'  . ':' .  htmlspecialchars($donnee['pseudo']) . '</strong>'  . '<br /><br />'  .
				   '<img src="./images/avatar/'.htmlspecialchars($donnee['nom_avatar']).'" alt="" id = "mini_avatar" />' . '<br /><br />' .
                   'Vous êtes inscrit depuis le '. htmlspecialchars($donnee['date_inscription_fr']) . '</p>'; ?>
					
					<div id = "bor_mp"><a href="galerie_perso.php?membre=<?php echo $donnee['pseudo']; ?>">Voir toutes vos photos</a></div>
									   
				     <?php
					 }
                     $req->closeCursor();
                      }
		              ?>
					  
					  
		
	<?php	
	
	}
	else // Acces pas OK !
	{
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
        entré est invalide.</p><p>Cliquez <a href="./connexion_mp.php">ici</a> 
	    pour revenir à la page précédente
	    </p>';
	}
    $query->CloseCursor();
    }
    echo $message;

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