<?php

			/*connexion a la BDD*/
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=clic', 'root', '');
            }
            catch (Exception $e)
            {
	        die('Erreur : ' . $e->getMessage());
            } 
?>