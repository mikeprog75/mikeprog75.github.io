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
		<title>Modif profil</title>
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
			  
			<?php include ("includes/fonction_avatar.php") ; ?>
			
			
			

 
		<?php
if ( empty($_POST['pseudo']) && empty($_POST['pass'])  && empty($_POST['confirm']) &&
 empty($_POST['email']) && empty($_POST['localisation']))
    
   
   
{
	echo '<div id = obli>' . 'Vous devez remplir tout ce qui est obligatoire' .  '</div>' ;
	  echo '<form  method="post" action="modification_profil_mp.php"  enctype="multipart/form-data" >
	  <div id="formulaire">
	  <fieldset>
	  <legend>Formulaire d inscription</legend>
	
	           <label for="sexe"> Qui êtes vous ? </label>
			   <select name="sexe" id="sexe">
	           <option> </option>
			   
               <option value="Un homme">Un homme</option>
               <option value="Une femme">Une femme</option>
         
			   </select><br /><br />
	
        	
	
	    <div id="login"><label>Pseudo :</label></div> <input type="text" size="25" id="pseudo" name="pseudo"  placeholder="ex: maxime42" maxlength="10"/><br />
	
	<div id="pwd"><label>Mot de passe :</label></div> <input type="password" size="25" id="pass" name="pass" maxlength="15" /><br />
	
	<div id="pwc"><label>Mot de passe confirmatif :</label></div> <input type="password" size="25" id="confirm" name="confirm" maxlength="15" /><br />
	
	</fieldset>
	<fieldset><legend>Contacts</legend>
	<div id="courriel"><label>Email : </label></div> <input type="text" size="25" id="email" name="email" maxlength="30" /><br />
	
	           
	
	</fieldset>
	<fieldset><legend>Informations supplémentaires</legend>
	<label for="localisation">Localisation :</label><input type="text" name="localisation" placeholder = "ex: France" id="localisation" maxlength = "30" /><br />
	</fieldset>
	<fieldset><legend>Profil</legend>
	<label for="avatar">Choisissez votre image de profil(facultatif) :</label><input type="file" name="avatar" id="avatar" />(Taille max : 1 Mo)<br /><br />
	
	
	<div id="send"><input class="blue-button-x" type="submit" value="Modifier vos identifiants" /> <input class="red-button-x" type="reset" value="Réinitialiser le formulaire" /></div>
	</fieldset>
	</div>
	</form><br />';
	  
	

	
	}
	  else
	  
	     {
    
	
	
	$pseudo_erreur1 = NULL;
    $pseudo_erreur2 = NULL;
	$localisation_erreur = NULL;
    $mdp_erreur1 = NULL;
	$mdp_erreur2 = NULL;
    $email_erreur1 = NULL;
	$email_erreur2 = NULL;
    $avatar_erreur1 = NULL;
    $avatar_erreur2 = NULL;
    $avatar_erreur3 = NULL;
		 
		 ?>
		 
		 <?php  


	// On récupère les variables
    $i = 0;
    $temps = time(); 
	$sexe=$_POST['sexe'];
	$pseudo=$_POST['pseudo'];
    $email = $_POST['email'];
    $localisation = $_POST['localisation'];
    $pass = sha1('gz'.$_POST['pass']);
    $confirm = sha1('gz'.$_POST['confirm']);
	
    
	   	    
		  
			   
			   // on verifie si le pseudo comporte des chiffres et des lettres 
			   if (!preg_match("#^[a-z]+[0-9]{2}$#", $pseudo) || empty($pseudo))
			   {
			   
			     $pseudo_erreur1 = "Veuillez saisir un pseudo comportant des lettres en miniscule et 2 chiffres à la fin";
                 $i++;
				 
				 }
				 
				 //on verifie si le pseudo saisi est le même que celui qui est dans la table membre
				  
				  $query=$bdd->prepare('SELECT COUNT(*) AS nbr FROM forum_membres WHERE pseudo =:pseudo');
                 $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
                 $query->execute();
                 $pseudo_free=($query->fetchColumn()==0)?1:0;
                 $query->CloseCursor();
                 if(!$pseudo_free == false)
			     {
			
			   $pseudo_erreur2 = "Veuillez taper le même pseudo que celui saisi lors de votre inscription";
			   $i++;
			   
			   }
				 
				 

			   // on verifie si la localisation saisie est valide
			   if (!preg_match("#^[A-Z]{1}[A-Za-z.-\s]+$#", $localisation) || empty($localisation))
			   {
			   
			      $localisation_erreur = "Saisir le nom d'un pays valide";
			      $i++;
				  
				 }
    

               /*on verifie si le mot de passe possède 6 caractères ou plus*/
				if (strlen($_POST['pass']) < 6)
                {
				
				   $mdp_erreur1 = "Veuillez saisir un mot de passe compris entre 6 et 15 caractères";
				   $i++;
				   
				   }
				   
				   // on verifie si le mot de passe saisi est identique à celui saisi précédemment*/
                     if ($pass != $confirm || empty($confirm) || empty($pass))
                     {
					 
					    $mdp_erreur2 = "veuillez confirmer votre mot de passe";
						$i++;
						
						}
				   
                        
						/* on teste l'adresse email, si c'est bon, on continue, sinon, on affiche un message d'erreur*/
                       if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
                       {
					   
					      $email_erreur1 = "Saisir une adresse email valide";
						  $i++;
						  
						  }
						  
						  //Il faut que l'adresse email n'ait jamais été utilisée
    $query=$bdd->prepare('SELECT COUNT(*) AS nbr FROM forum_membres WHERE email =:email');
    $query->bindValue(':email',$email, PDO::PARAM_STR);
    $query->execute();
    $mail_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();
    
    if(!$mail_free)
    {
        $email_erreur2 = "Votre adresse email est déjà utilisée par un membre";
        $i++;
    }
	
    //Vérification de l'avatar :
    if (!empty($_FILES['avatar']['size']))
    {
        //On définit les variables :
        $maxsize = 1000000; //Poid de l'image
        $maxwidth = 100; //Largeur de l'image
        $maxheight = 100; //Longueur de l'image
        $extensions_valides = array( 'jpg' , 'jpeg' , 'png' , 'gif', 'bmp' ); //Liste des extensions valides
        
        if ( $_FILES['avatar']['error'] > 0)
        {
                $avatar_erreur1 = "Il y'a erreur sur le fichier";
        }
        if ($_FILES['avatar']['size'] > $maxsize)
        {
                $i++;
                $avatar_erreur2 = "Le fichier est trop gros : (<strong>".$_FILES['avatar']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        
        
        $extension_upload = strtolower(substr(  strrchr($_FILES['avatar']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $avatar_erreur3 = "Format d'avatar non autorisé";
        }
    }	
	
	
	if ($i==0)
   {
	echo'<h1>Modification terminée</h1>';
        echo'<p> Vous avez modifié vos identifiants avec succès'. '<br /><br />'.
		'Cliquez <a href="index.php">ici</a> pour revenir à la page d accueil du site'. '</p>';
		 
	
	
        //La ligne suivante sera commentée plus bas
	   $nom_avatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):''; 
   
                    /*S'il n'y a aucun message d'erreur alors, le membre peut modifier ses identifiants*/
                    $req=$bdd->prepare('UPDATE forum_membres SET pseudo = :pseudo, nom_avatar = :nom_avatar, pass = :pass, email = :email,
					localisation = :localisation WHERE pseudo = :pseudo'); 
                    $req->execute(array('pseudo'=>htmlspecialchars($pseudo),
					'nom_avatar'=>htmlspecialchars($nom_avatar), 'pass'=>htmlspecialchars($pass), 'email'=>htmlspecialchars($email),
                    'localisation'=>htmlspecialchars($localisation)));



	
	                //On définit les variables  de session et les cookies
                    
					$_SESSION['id'] = $bdd->lastInsertId();;
					$_SESSION['pseudo'] = $pseudo;
					$_SESSION['level'] = 2;
                    $req->CloseCursor();
                  
				  setcookie('pseudo', '', time() + 365*24*3600, null, null, false, true); // On écrit un cookie qui retient le pseudo
				  setcookie('pass', '', time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie qui retient le mot de passe haché
	
	
	
    }
    else
    {
        echo'<h1>Interruption</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites </p>';
        echo'<p>'.$i.' erreur(s)</p>';
		echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
		echo'<p>'.$localisation_erreur.'</p>';
        echo'<p>'.$mdp_erreur1.'</p>';
		echo'<p>'.$mdp_erreur2.'</p>';
        echo'<p>'.$email_erreur1.'</p>';
		echo'<p>'.$email_erreur2.'</p>';
        echo'<p>'.$avatar_erreur1.'</p>';
        echo'<p>'.$avatar_erreur2.'</p>';
        echo'<p>'.$avatar_erreur3.'</p>';
		
		echo'<p>Cliquez <a href="./modification_profil_mp.php">ici</a> pour recommencer</p>';
	
       
        
    }
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