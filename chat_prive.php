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
		<title>Chat prive</title>
		
		<?php include ("includes/fonction_bbcode_forum.php") ;?>
		
    
                
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
	
	<?php include("includes/fonction_traduction.php"); ?>
	
	<?php include("includes/fonction_pagination_pc.php"); ?>
	
	<?php include("includes/constantes.php"); ?>
	
	

	
	<?php

$action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):'';

?>

<div id = "upload_photos">Vous pouvez télécharger d autres photos <a href="./avatar.php">ici</a></div><br /><br />

<div id = "modif_profil"><a href="./modification_profil_mp.php">Modifier votre profil</a></div><br /><br />

<?php
switch($action) //On switch sur $action
{

case "consulter": 
 
    echo'<p><i>Vous êtes ici</i> :  <a href="./chat_prive.php">Messagerie privée</a> --> Consulter un message</p><br /><br />';
    $id_mess = (int) $_GET['id']; //On récupère la valeur de l'id
    echo '<h1>Consulter un message</h1><br /><br />';

    //La requête nous permet d'obtenir les infos sur ce message :
	
    $query = $bdd->prepare('SELECT  m.mp_expediteur mp_expediteur, m.mp_receveur mp_receveur, m.mp_titre mp_titre,               
    m.mp_time mp_time, m.mp_text mp_text, m.mp_lu mp_lu, f.id id, f.pseudo pseudo, f.nom_avatar nom_avatar,
    f.localisation localisation, f.date_inscription date_inscription
    FROM forum_mp m 
    LEFT JOIN forum_membres f  ON f.id = m.mp_expediteur
    WHERE mp_id = :id');
    $query->bindValue(':id',$id_mess,PDO::PARAM_INT);
    $query->execute();
    $data=$query->fetch();

    // Attention ! Seul le receveur du mp peut le lire !
    if ($id != $data['mp_receveur']) erreur(ERR_WRONG_USER);
       
    //bouton de réponse
    echo'<p><a class = editer href="./chat_prive.php?action=repondre&amp;dest='.$data['mp_expediteur']. '">Répondre</a></p>'; 

    ?>
	
<table>     
    <tr>
    <th class="vt_auteur"><strong>Auteur</strong></th>             
    <th class="vt_mess"><strong>Message</strong></th>       
    </tr>
    <tr>
    <td>
    <?php echo'<strong>
    <a href="./profil_mp.php?fm='.$data['id'].'&amp;action=consulter">
    '.stripslashes(htmlspecialchars($data['pseudo'])).'</a></strong></td>
    <td>Posté à '.date('H\hi \l\e d M Y',$data['mp_time']).'</td>';
    ?>
    </tr>
    <tr>
    <td>
    <?php
        
    //Ici des infos sur le membre qui a envoyé le mp
    echo'<p><img src="./images/avatar/'.$data['nom_avatar'].'" alt="" id = "mini_avatar" />
    <br />Membre inscrit le '. htmlspecialchars(conversion($data['date_inscription'])).'
    <br />
    <br />Localisation : '.stripslashes(htmlspecialchars($data['localisation'])).'</p>
	</td><td>';
        
    echo code(nl2br(stripslashes(htmlspecialchars($data['mp_text'])))).'
    <hr />' .' 
    
	</td></tr></table>';

        ?>
<?php
    if ($data['mp_lu'] == 0) //Si le message n'a jamais été lu
    {
        $query->CloseCursor();
        $query=$bdd->prepare('UPDATE forum_mp 
        SET mp_lu = :lu
        WHERE mp_id= :id');
        $query->bindValue(':id',$id_mess, PDO::PARAM_INT);
        $query->bindValue(':lu','1', PDO::PARAM_STR);
        $query->execute();
        $query->CloseCursor();
    }
        
break; //La fin !
?>


<?php
case "nouveau": //Nouveau mp
       
   echo'<p><i>Vous êtes ici</i> :  <a href="./chat_prive.php">Messagerie privée</a> --> Ecrire un message</p><br /><br />';
   echo '<h1>Nouveau message privé</h1><br /><br />';
   ?>
   
   
  
   <fieldset>
   <form method="post" action="chat_prive_post.php?action=nouveaump" name="formulaire">
   <p>
   <label for="to">Envoyer à : </label>
   <input type="text" size="15" maxlength = "10" id="to" name="to" />
   <br /><br />
   <label for="titre">Titre : </label>
   <input type="text" size="25" maxlength = "25" id="titre" placeholder = "obligatoire" name="titre" />
   <br /><br />
   <div id = "bbcode_chat">
<fieldset><legend>Mise en forme</legend>
<input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)"  />
<input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
<input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
<input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
<br /><br />
<img src="./images/smileys/coucou.gif" title="coucou" alt="coucou" id ="emoticone" onClick="javascript:smilies(' :coucou ');return(false)" />
<img src="./images/smileys/degoute.gif" title="degouté" alt="degouté" id ="emoticone" onClick="javascript:smilies(' :degoute: ');return(false)" />
<img src="./images/smileys/etourdi.gif" title="etourdi" alt="etourdi" id ="emoticone" onClick="javascript:smilies(' :etourdi: ');return(false)" />
<img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" id ="emoticone" onClick="javascript:smilies(' :heureux: ');return(false)" />
<img src="./images/smileys/colere.gif" title="colere" alt="colere" id ="emoticone" onClick="javascript:smilies(' :colere: ');return(false)" />
<img src="./images/smileys/pianiste.gif" title="pianiste" alt="pianiste" id ="emoticone" onClick="javascript:smilies(' :pianiste ');return(false)" />
<img src="./images/smileys/salut.gif" title="salut" alt="salut" id ="emoticone" onClick="javascript:smilies(' :salut ');return(false)" />
<img src="./images/smileys/peur.gif" title="peur" alt="peur" id ="emoticone" onClick="javascript:smilies(' :peur: ');return(false)" />
<img src="./images/smileys/triste.gif" title="triste" alt="triste" id ="emoticone" onClick="javascript:smilies(' :triste: ');return(false)" />
<img src="./images/smileys/amoureux.gif" title="amoureux" alt="amoureux" id ="emoticone" onClick="javascript:smilies(' :amoureux: ');return(false)" />
</fieldset>
</div>

   <textarea cols="80" rows="8" id="messenger" name="message"></textarea>
   <br /><br />
   <input type="submit" class="gr-button" value="Envoyer" /> <input class="erase-button" type="reset" value="Effacer" />

   </form>
   </fieldset>
   

<?php   
break;	

?>

<?php
case "repondre": //On veut répondre
   echo'<p><i>Vous êtes ici</i> <a href="./chat_prive.php">Messagerie privée</a> --> Ecrire un message</p><br /><br />';
   echo '<h1>Répondre à un message privé</h1><br /><br />';

   $dest = (int) $_GET['dest'];
   ?>
   
   <fieldset>
   <form method="post" action="chat_prive_post.php?action=repondremp&amp;dest=<?php echo $dest ?>" name="formulaire">
   
   <label for="titre">Titre : </label><input type="text" size="25" maxlength ="25" placeholder = "obligatoire" id="titre" name="titre" />
   <br /><br />
   <div id = "bbcode_chat">
<fieldset><legend>Mise en forme</legend>
<input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)"  />
<input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
<input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
<input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
<br /><br />
<img src="./images/smileys/coucou.gif" title="coucou" alt="coucou" id ="emoticone" onClick="javascript:smilies(' :coucou ');return(false)" />
<img src="./images/smileys/degoute.gif" title="degouté" alt="degouté" id ="emoticone" onClick="javascript:smilies(' :degoute: ');return(false)" />
<img src="./images/smileys/etourdi.gif" title="etourdi" alt="etourdi" id ="emoticone" onClick="javascript:smilies(' :etourdi: ');return(false)" />
<img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" id ="emoticone" onClick="javascript:smilies(' :heureux: ');return(false)" />
<img src="./images/smileys/colere.gif" title="colere" alt="colere" id ="emoticone" onClick="javascript:smilies(' :colere: ');return(false)" />
<img src="./images/smileys/pianiste.gif" title="pianiste" alt="pianiste" id ="emoticone" onClick="javascript:smilies(' :pianiste ');return(false)" />
<img src="./images/smileys/salut.gif" title="salut" alt="salut" id ="emoticone" onClick="javascript:smilies(' :salut ');return(false)" />
<img src="./images/smileys/peur.gif" title="peur" alt="peur" id ="emoticone" onClick="javascript:smilies(' :peur: ');return(false)" />
<img src="./images/smileys/triste.gif" title="triste" alt="triste" id ="emoticone" onClick="javascript:smilies(' :triste: ');return(false)" />
<img src="./images/smileys/amoureux.gif" title="amoureux" alt="amoureux" id ="emoticone" onClick="javascript:smilies(' :amoureux: ');return(false)" />
</fieldset>
</div>

   <br /><br />
   <textarea cols="80" rows="8" id="messenger" name="message"></textarea>
   <br /><br />
      
      
   <input type="submit" class="gr-button" value="Envoyer" /> <input class="erase-button" type="reset" value="Effacer" />
   </form>
   </fieldset>
   <?php
break;
?>

<?php

    case "supprimer":

       

    //On récupère la valeur de l'id

    $id_mess = (int) $_GET['id'];

    //Il faut vérifier que le membre est bien celui qui a reçu le message

    $query=$bdd->prepare('SELECT mp_receveur

    FROM forum_mp WHERE mp_id = :id');

    $query->bindValue(':id',$id_mess,PDO::PARAM_INT);

    $query->execute();

    $data = $query->fetch();

    //Sinon la sanction est terrible :p

    if ($id != $data['mp_receveur']) erreur(ERR_WRONG_USER);

    $query->CloseCursor(); 


    //2 cas pour cette partie : on est sûr de supprimer ou alors on ne l'est pas

    $sur = (int) $_GET['sur'];

    //Pas encore certain

    if ($sur == 0)

    {

    echo'<p>Etes-vous certain de vouloir supprimer ce message ?<br />

    <a href="./chat_prive.php?action=supprimer&amp;id='.$id_mess.'&amp;sur=1">

    Oui</a> - <a href="./chat_prive.php">Non</a></p>';

    }

    //Certain

    else

    {

        $query=$bdd->prepare('DELETE from forum_mp WHERE mp_id = :id');

        $query->bindValue(':id',$id_mess,PDO::PARAM_INT);

        $query->execute();

        $query->CloseCursor(); 

        echo'<p>Le message a bien été supprimé.<br />

        Cliquez <a href="./chat_prive.php">ici</a> pour revenir à la boite

        de messagerie.</p>';

    }


    break;

?>

<?php
//Si rien n'est demandé ou s'il y a une erreur dans l'url 
//On affiche la boite de mp.
default;
    
    echo'<p><i>Vous êtes ici</i> :  <a href="./chat_prive.php">Messagerie privée</a><br /><br />';
    echo '<h1>Messagerie Privée</h1><br /><br />';

    $query=$bdd->prepare('SELECT m.mp_lu mp_lu, m.mp_id mp_id, m.mp_expediteur mp_expediteur, m.mp_titre mp_titre, m.mp_time mp_time, f.id id, f.pseudo pseudo
    FROM forum_mp m
    LEFT JOIN forum_membres f ON m.mp_expediteur = f.id
    WHERE mp_receveur = :id ORDER BY mp_id DESC');
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    echo'<p><a class = editer href="./chat_prive.php?action=nouveau">Nouveau</a></p>';
    
    if ($query->rowCount()>0)
    {
        ?>
        <table>
        <tr>
        <th></th>
        <th class="mp_titre"><strong>Titre</strong></th>
        <th class="mp_expediteur"><strong>Expéditeur</strong></th>
        <th class="mp_time"><strong>Date</strong></th>
        <th><strong>Action</strong></th>
        </tr>

        <?php
        //On boucle et on remplit le tableau
        while ($data = $query->fetch())
        {
            echo'<tr>';
            //Mp jamais lu, on affiche l'icone en question
            if($data['mp_lu'] == 0)
            {
            echo'<td>Non lu</td>';
            }
            else //sinon une autre icone
            {
            echo'<td>Déja lu</td>';
            }
            echo'<td id="mp_titre">
            <a href="./chat_prive.php?action=consulter&amp;id='.$data['mp_id'].'">
            '.stripslashes(htmlspecialchars($data['mp_titre'])).'</a></td>
            <td id="mp_expediteur">
            <a href="./profil_mp.php?action=consulter&amp;fm='.$data['id'].'">
            '.stripslashes(htmlspecialchars($data['pseudo'])).'</a></td>
            <td id="mp_time">'.date('H\hi \l\e d M Y',$data['mp_time']).'</td>
            <td>
            <a href="./chat_prive.php?action=supprimer&amp;id='.$data['mp_id'].'&amp;sur=0">supprimer</a></td></tr>';
        } //Fin de la boucle
        $query->CloseCursor();
        echo '</table>';

    } //Fin du if
    else
    {
        echo'<p>Vous n avez aucun message privé pour l instant, cliquez
        <a href="./mp.php">ici</a> pour revenir à la page d accueil du chat privé</p>';
    }
} //Fin du switch
?>


</article>
            </section>

                <footer>

                           <?php include("includes/pied_de_page.php"); ?>
                           

                          </footer>
                    </div>
          </body>
</html>