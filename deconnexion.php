<?php
// il faut demarrer la session//
session_start();

 
    //suppression des variables de session et de la session//
    $_SESSION = array();
    session_destroy();
	
	// Suppression des cookies de connexion automatique
       setcookie('pseudo', '');
       setcookie('pass', '');
 
    /*on renvoie sur la page d'accueil*/
    header('Location: index.php');     

?>