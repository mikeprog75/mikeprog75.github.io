<?php

// temps en min avant d'être considéré comme incactif
$temps = 5;
                               
// modifier les infos
$conn = mysqli_connect('localhost','root', '', 'clic');
                                   
// ip du client
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
$ip = $_SERVER['REMOTE_ADDR'];
}
                               
// time actuel
$time = time();
// on recherche l'utilsateur
$sql_query = "SELECT * FROM connectes where ip='$ip'";
$result = $conn->query($sql_query);
                               
// si l'utilisateur n'est pas deja dans la table
if($result->num_rows == 0)
{
$sql_query = "INSERT INTO connectes VALUES ('$ip', '$time')";
$result = $conn->query($sql_query);
                                   
}
// mise-à -jour
else
{
$sql_query = "UPDATE connectes SET derniere='$time' WHERE ip='$ip'";
                                   
$result = $conn->query($sql_query);
                                   
}
                               
// temps d'incativité
$time -= $temps * 60;
                               
// on supprime ceux qui n'ont pas été connectés depuis assez longtemps
$sql_query = "DELETE LOW_PRIORITY FROM connectes WHERE derniere <= $time";
$result = $conn->query($sql_query);
                               
/*******************
Affichage des connectés
*******************/
$sql_query = "SELECT count(*) FROM connectes";
$result = $conn->query($sql_query);
                                                   
if($result)
{
$visiteurs = mysqli_fetch_array($result);
echo '<p class=connectes>Visiteurs connectés:<br /> ' . $visiteurs[0].'</p>';
}
?>


