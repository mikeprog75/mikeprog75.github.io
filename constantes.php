<?php

//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

?>

<?php
if (isset ($_COOKIE['pseudo']) && empty($id))
{
$_SESSION['pseudo'] = $_COOKIE['pseudo']; 

/* On créé la variable de session à partir du cookie pour ne pas avoir à vérifier 2 fois sur les pages qu'un membre est connecté. */

}
if (isset ($_COOKIE['pseudo']) && !empty($id))
{
//On est connecté
}
if (!isset ($_COOKIE['pseudo']) && empty($id))
{
//On n'est pas connecté
}
?>

<?php
function erreur($err='')
{
   $mess=($err!='')? $err:'Une erreur inconnue s\'est produite';
   exit('<p>'.$mess.'</p>
   <p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d\'acceuil et deconnectez-vous</p>');
}

?>

<?php
define('VISITEUR',1);
define('INSCRIT',2);
define('MODO',3);
define('ADMIN',4);
?>

<?php
define('ERR_IS_CO','Vous ne pouvez pas acceder à cette page parsque vous êtes connecté');
?>