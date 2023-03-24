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
		<title>Avatar</title>
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
if(empty($_POST['pseudo']))
    
{
	echo '<div id = obli>' . 'Veuillez saisir votre pseudo' .  '</div>' ;
	  echo '<form  method="post" action="avatar.php"  enctype="multipart/form-data" >
	  <div id="formulaire">
	  <fieldset>
	  <legend>Complement</legend>
	  
	 <div id="login"><label>Pseudo :</label></div> <input type="text" size="20" id="pseudo" name="pseudo"  placeholder="ex: maxime42" maxlength="10"/><br />
	 
	 <label for="avatar">Choisissez votre photo(facultatif) :</label><input type="file" name="avatar1" id="avatar1" />(Taille max : 2 Mo)<br /><br />
	 
	 <label for="avatar">Choisissez votre photo(facultatif) :</label><input type="file" name="avatar2" id="avatar2" />(Taille max : 2 Mo)<br /><br />
	 
	 <label for="avatar">Choisissez votre photo(facultatif) :</label><input type="file" name="avatar3" id="avatar3" />(Taille max : 2 Mo)<br /><br />
	 
	 <label for="avatar">Choisissez votre photo(facultatif) :</label><input type="file" name="avatar4" id="avatar4" />(Taille max : 2 Mo)<br /><br />
	  
	<div id="send"><input class="blue-button" type="submit" value="Envoyer" /> <input class="red-button-y" type="reset" value="Réinitialiser le formulaire" /></div>
	</fieldset>
	</div>
	</form>';
	}
	else 
{
    
	
	$pseudo_erreur1 = NULL;
    $pseudo_erreur2 = NULL;
	$avatar_erreur1 = NULL;
	$avatar_erreur2 = NULL;
	$avatar_erreur3 = NULL;
	$avatar_erreur4 = NULL;
	$avatar_erreur5 = NULL;
	$avatar_erreur6 = NULL;
	$avatar_erreur7 = NULL;
	$avatar_erreur8 = NULL;
	$avatar_erreur9 = NULL;
	$avatar_erreur10 = NULL;
	$avatar_erreur11 = NULL;
	$avatar_erreur12 = NULL;
	
	
	
	
 
	
	?>
	
	
	<?php
	//On récupère les variables
    $i = 0;
    $pseudo=$_POST['pseudo'];
	
	           // on verifie si le pseudo comporte des chiffres et des lettres 
			   if (!preg_match("#^[a-z]+[0-9]{2}$#", $pseudo) || empty($pseudo))
			   {
			   
			     $pseudo_erreur1 = "Veuillez saisir un pseudo comportant des lettres en miniscule et 2 chiffres à la fin";
                 $i++;
				 
				 }
				 
				  //Vérification du pseudo
                 $query=$bdd->prepare('SELECT COUNT(*) AS nbr FROM forum_membres WHERE pseudo =:pseudo');
                 $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
                 $query->execute();
                 $pseudo_free=($query->fetchColumn()==0)?1:0;
                 $query->CloseCursor();
                 if(!$pseudo_free == false)
			     {
			
			   $pseudo_erreur2 = "Veuillez saisir le même pseudo que celui de l'inscription";
			   $i++;
			   
			   }
	
	
			   
       
	   //Vérification du 1er avatar :
    if (!empty($_FILES['avatar1']['size']))
    {
        //On définit les variables :
        $maxsize = 2000000; //Poid de l'image
        $maxwidth = 100; //Largeur de l'image
        $maxheight = 100; //Longueur de l'image
        $extensions_valides = array( 'jpg' , 'jpeg' , 'png' , 'gif' ); //Liste des extensions valides
        
        if ($_FILES['avatar1']['error'] > 0)
        {
                $avatar_erreur1 = "Il y'a erreur sur le fichier";
        }
		
		
        if ($_FILES['avatar1']['size'] > $maxsize)
        {
                $i++;
                $avatar_erreur2 = "Le fichier est trop gros : (<strong>".$_FILES['avatar_1']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        
        
        
		$extension_upload = strtolower(substr(  strrchr($_FILES['avatar1']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $avatar_erreur3 = "Format d'image non autorisé";
        }
    }	
	
	
	//Vérification du 2ème avatar :
    if (!empty($_FILES['avatar2']['size']))
    {
        //On définit les variables :
        $maxsize = 2000000; //Poid de l'image
        $maxwidth = 100; //Largeur de l'image
        $maxheight = 100; //Longueur de l'image
        $extensions_valides = array( 'jpg' , 'jpeg' , 'png' , 'gif' ); //Liste des extensions valides
        
        if ($_FILES['avatar2']['error'] > 0)
        {
                $avatar_erreur4 = "Il y'a erreur sur le fichier";
        }
		
		
        if ($_FILES['avatar2']['size'] > $maxsize)
        {
                $i++;
                $avatar_erreur5 = "Le fichier est trop gros : (<strong>".$_FILES['avatar2']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        
        
        
		$extension_upload = strtolower(substr(  strrchr($_FILES['avatar2']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $avatar_erreur6 = "Format d'image non autorisé";
        }
    }


     //Vérification du 3ème avatar :
    if (!empty($_FILES['avatar3']['size']))
    {
        //On définit les variables :
        $maxsize = 2000000; //Poid de l'image
        $maxwidth = 100; //Largeur de l'image
        $maxheight = 100; //Longueur de l'image
        $extensions_valides = array( 'jpg' , 'jpeg' , 'png' , 'gif' ); //Liste des extensions valides
        
        if ($_FILES['avatar3']['error'] > 0)
        {
                $avatar_erreur7 = "Il y'a erreur sur le fichier";
        }
		
		
        if ($_FILES['avatar3']['size'] > $maxsize)
        {
                $i++;
                $avatar_erreur8 = "Le fichier est trop gros : (<strong>".$_FILES['avatar3']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        
        
        
		$extension_upload = strtolower(substr(  strrchr($_FILES['avatar3']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $avatar_erreur9 = "Format d'image non autorisé";
        }
    }


    //Vérification du 4ème avatar :
    if (!empty($_FILES['avatar4']['size']))
    {
        //On définit les variables :
        $maxsize = 2000000; //Poid de l'image
        $maxwidth = 100; //Largeur de l'image
        $maxheight = 100; //Longueur de l'image
        $extensions_valides = array( 'jpg' , 'jpeg' , 'png' , 'gif' ); //Liste des extensions valides
        
        if ($_FILES['avatar4']['error'] > 0)
        {
                $avatar_erreur10 = "Il y'a erreur sur le fichier";
        }
		
		
        if ($_FILES['avatar4']['size'] > $maxsize)
        {
                $i++;
                $avatar_erreur11 = "Le fichier est trop gros : (<strong>".$_FILES['avatar4']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        
        
        $extension_upload = strtolower(substr(  strrchr($_FILES['avatar4']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $avatar_erreur12 = "Format d'image non autorisé";
        }
    }	
		
		
	
	
	
	if ($i==0)
   {
	echo'<h1>Téléchargement(s) terminé(s)</h1>';
	echo'<p>Cliquez <a href="./avatar.php">ici</a> pour télécharger d autres photos ou <br /><br />
	Cliquez <a href="./chat_prive.php">ici</a> pour revenir à la messagerie privée </p>';
 
   
	?>
	
        <?php include ("includes/fonction_galerie.php") ; ?>
		
		<?php
		
	   
	   /*S'il n'y a aucun message d'erreur alors, on télécharge les photos*/
        $req=$bdd->prepare('INSERT INTO avatar(pseudo, nom_avatar1, nom_avatar2, nom_avatar3, nom_avatar4 ) 
		VALUES(:pseudo, :nom_avatar1, :nom_avatar2, :nom_avatar3, :nom_avatar4 )');
        $req->execute(array('pseudo'=>htmlspecialchars($pseudo), 'nom_avatar1'=>htmlspecialchars($nom_avatar1), 'nom_avatar2'=>htmlspecialchars($nom_avatar2),
		'nom_avatar3'=>htmlspecialchars($nom_avatar3), 'nom_avatar4'=>htmlspecialchars($nom_avatar4)));
		
		$req->CloseCursor();


        	   
	   
	   
	   }
    else
    {
        echo'<h1>Téléchargement interrompu</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites lors du téléchargement</p>';
        echo'<p>'.$i.' erreur(s)</p>';
		echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
		echo'<p>'.$avatar_erreur1.'</p>';
		echo'<p>'.$avatar_erreur2.'</p>';
		echo'<p>'.$avatar_erreur3.'</p>';
		echo'<p>'.$avatar_erreur4.'</p>';
		echo'<p>'.$avatar_erreur5.'</p>';
		echo'<p>'.$avatar_erreur6.'</p>';
		echo'<p>'.$avatar_erreur7.'</p>';
		echo'<p>'.$avatar_erreur8.'</p>';
		echo'<p>'.$avatar_erreur9.'</p>';
		echo'<p>'.$avatar_erreur10.'</p>';
		echo'<p>'.$avatar_erreur11.'</p>';
		echo'<p>'.$avatar_erreur12.'</p>';
		echo'<p>Cliquez <a href="./avatar.php">ici</a> pour recommencer</p>';
		
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

