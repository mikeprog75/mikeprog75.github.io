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
		   
		   <h1>Mon super forum !</h1>
		   
		   
		   
		   <div id = "search">
		   <form  method="post" action="recherche_pseudo.php"  >
		   <fieldset>
		   <legend>Recherche</legend>
		   
		   <label>Recherche du message en fonction du pseudo </label><input type="text" size="20"  name="pseudo"  placeholder="ex: maxime42" maxlength="10"/><br />
		   
		   <div id = "ok"><input class="blue-button" type="submit" value="ok" /></div>
		   
		   </fieldset>
		   </form>
		   
		   <form  method="post" action="recherche_titre.php"  >
		   <fieldset>
		   <legend>Recherche</legend>
		   
		   <label>Recherche du message en fonction du titre </label><input type="text" size="20"  name="titre_message" placeholder="ex: Bug fifa 12"  maxlength="25"/><br />
		   
		   <div id = "ok"><input class="blue-button" type="submit" value="ok" /></div>
		   
		   </fieldset>
		   </form>
		   
		   <form  method="post" action="recherche_discipline_forum.php"  >
		   <fieldset>
		   <legend>Recherche</legend>
		   
		   <label>Recherche du message en fonction de la discipline</label>
		   
       <select name="discipline" id="discipline" >
	   
           <option> </option>
		   
		   <option value="Assurance">Assurance</option>
		   
		   <option value="Audio-visuel">Audio-visuel</option>
               
		   <option value="Automobile">Automobile</option>

          <option value="Biologie">Biologie</option>
		  
		  <option value="Chimie">Chimie</option>
		  
		  <optgroup label="Comptabilité">
		  <option value="Comptabilité analytique">Comptabilité analytique</option>
		  <option value="Comptabilité des sociétés">Comptabilité des sociétés</option>
		  <option value="Comptabilité générale">Comptabilité générale</option>
		  </optgroup>
		  
		  <optgroup label="Droit">
		  <option value="Droit bancaire">Droit bancaire</option>
		  <option value="Droit commercial">Droit commercial</option>
		  <option value="Droit des affaires">Droit des affaires</option>
		  <option value="Droit des sociétés">Droit des sociétés</option>
		  <option value="Droit des obligations">Droit des obligations</option>
		  <option value="Droit du travail">Droit du travail</option>
		  <option value="Droit fiscal">Droit fiscal</option>
		  </optgroup>
		  
		  <optgroup label="Economie">
		  <option value="Economie d'entreprise">Economie d'entreprise</option>
		  <option value="Economie financière">Economie financière</option>
		  <option value="Economie générale">Economie générale</option>
		  </optgroup>
		  
		  <optgroup label="Gestion de trésorerie">
		  <option value="Gestion de trésorerie">Gestion de trésorerie</option>
		  </optgroup>
		  
		  <optgroup label="Gestion des stocks">
		  <option value="Gestion des stocks">Gestion des stocks</option>
		  </optgroup>
		  
		  <optgroup label="Jeux vidéos">
		  <option value="Jeux gameboy">Jeux gameboy</option>
		  <option value="Jeux nintendo ds">Jeux nintendo ds</option>
		  <option value="Jeux pc">Jeux pc</option>
		  <option value="Jeux psp">Jeux psp</option>
		  <option value="Jeux ps2">Jeux ps2</option>
		  <option value="Jeux ps3">Jeux ps3</option>
		  <option value="Jeux ps4">Jeux ps4</option>
		  <option value="Jeux wii">Jeux wii</option>
		  <option value="Jeux xbox 360">Jeux xbox 360</option>
		  <option value="Jeux xbox one">Jeux xbox one</option>
		  </optgroup>
		  
		  <optgroup label="Maintenance informatique">
		  <option value="Maintenance informatique">Maintenance informatique</option>
		  </optgroup>
		  
		  <optgroup label="Maths">
		  <option value="Algèbre">Algèbre</option>
		  <option value="Géométrie">Géométrie</option>
		  <option value="Maths appliqués">Maths appliqués</option>
		  <option value="Maths financières">Maths financières</option>
		  </optgroup>
		  
		  <optgroup label="Physique">
		  <option value="Physique">Physique</option>
		  </optgroup>
		  
		  <optgroup label="Programmation">
		  <option value="Langage C">Langage C</option>
		  <option value="Langage C++">Langage C++</option>
		  <option value="Langage CSS">Langage CSS</option>
		  <option value="Langage HTML">Langage HTML</option>
		  <option value="Langage Java">Langage Java</option>
		  <option value="Langage Java script">Langage Java script</option>
		  <option value="Langage PHP">Langage PHP</option>
		  <option value="Autre">Autre</option>
		  </optgroup>
		  
		  <optgroup label="Réseau informatique">
		  <option value="Réseau informatique">Réseau informatique</option>
		  </optgroup>
		  
		  <optgroup label="Santé-médécine">
		  <option value="Santé-médécine">Santé-médécine</option>
		  </optgroup>
		  
		  <optgroup label="Sport">
		  <option value="Aviron">Aviron</option>
		  <option value="Basketball">Basketball</option>
		  <option value="Base-ball">Base-ball</option>
		  <option value="Boxe">Boxe</option>
		  <option value="Catch">Catch</option>
		  <option value="Equitation">Equitation</option>
		  <option value="Football">Football</option>
		  <option value="Golf">Golf</option>
		  <option value="Karaté">Karaté</option>
		  <option value="Kung-fu">Kung-fu</option>
		  <option value="Tennis">Tennis</option>
		  <option value="Autre">Autre</option>
		  </optgroup>
		  
		  <optgroup label="Systèmes d'exploitation">
		  <option value="Mandriva">Mandriva</option>
		  <option value="Ubuntu">Ubuntu</option>
		  <option value="Windows XP">Windows XP</option>
		  <option value="Windows Vista">Windows Vista</option>
		  <option value="Windows 7">Windows 7</option>
		  <option value="Windows 8">Windows 8</option>
		  <option value="Windows 9">Windows 9</option>
		  <option value="Windows 10">Windows 10</option>
		  <option value="Autre">Autre</option>
		  </optgroup>
		  
		  <optgroup label="Techniques bancaires">
		  <option value="Techniques bancaires">Techniques bancaires</option>
		  </optgroup>
		  
		  <optgroup label="Téléphonie">
		  <option value="Téléphonie">Téléphonie</option>
          </optgroup>     
			   
		 </select><br /><br /><br />
	   
		      
		   <div id = "ok"><input class="blue-button" type="submit" value="ok" /></div>
		   
		   </fieldset>
		   </form>
		   </div>

		   
		   
		   
		   <?php include ("includes/base.php") ; ?>
		   
		   <?php include ("includes/fonction_pagination_pc.php") ; ?>

 
<?php
//definition de la table

$table = 'forum_pc';

//nombre de résultats par page

$resultats = 10;


//Calcul du nombre de pages

calcul_des_pages($table, $bdd, $resultats);


//extraction des valeurs

list($page, $nbr_pages,
$premier_article,
$dernier_article) =
calcul_des_pages($table,
$bdd,
$resultats);
?>

<br /><br />
<h1>Questions</h1>

<?php
// Préparation de la requete

$req = $bdd->query('SELECT id, pseudo, discipline, titre_message, DATE_FORMAT(date_message, \'%d/%m/%Y à %Hh %imin %ssec\') AS date_message_fr FROM 
'.$table.' ORDER BY date_message DESC LIMIT '.$premier_article.','.$dernier_article.'');

while ($donnee = $req->fetch())
{
?>
         
	
  <?php echo '<p class="bordure"><strong>' . 'Discipline' . ':'  .  htmlspecialchars($donnee['discipline']) . '</strong>' . '<br /><br />'
      .'<strong>' . 'Titre' . ':'  .  htmlspecialchars($donnee['titre_message']) . '</strong>'  . '<br /><br />'  . '<em> Posté par </em>' 
      . htmlspecialchars($donnee['pseudo'])  . '<br /><br />' . '<em> le </em>' . htmlspecialchars($donnee['date_message_fr']) . '</p>'; ?>

  
	
	  <div id = "r"><a href="discussions_pc.php?message=<?php echo $donnee['titre_message']; ?>">Réponses</a></div>  


	  
<?php	
	
	}// Fin de la boucle des messages
$req->closeCursor();

affichage_des_liens($page, $nbr_pages);
	  
?>	 


		   
		   </article>
            </section>

                <footer>

                           <?php include("includes/pied_de_page.php"); ?>
                           

                          </footer>
                    </div>
          </body>
</html> 