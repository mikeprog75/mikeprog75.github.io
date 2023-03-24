<?php
function code($texte)
{
//Smileys
$texte = str_replace(':coucou ', '<img src="./images/smileys/coucou.gif" title="coucou" alt="coucou" />', $texte);
$texte = str_replace(':degoute: ', '<img src="./images/smileys/degoute.gif" title="degouté" alt="degouté" />', $texte);
$texte = str_replace(':etourdi:', '<img src="./images/smileys/etourdi.gif" title="etourdi" alt="etourdi" />', $texte);
$texte = str_replace(':heureux:', '<img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" />', $texte);
$texte = str_replace(':colere:', '<img src="./images/smileys/colere.gif" title="colere" alt="colere" />', $texte);
$texte = str_replace(':pianiste', '<img src="./images/smileys/pianiste.gif" title="pianiste" alt="pianiste" />', $texte);
$texte = str_replace(':salut', '<img src="./images/smileys/salut.gif" title="salut" alt="salut" />', $texte);
$texte = str_replace(':peur:', '<img src="./images/smileys/peur.gif" title="peur" alt="peur" />', $texte);
$texte = str_replace(':triste:', '<img src="./images/smileys/triste.gif" title="triste" alt="triste" />', $texte);
$texte = str_replace(':amoureux:', '<img src="./images/smileys/amoureux.gif" title="amoureux" alt="amoureux" />', $texte);

//Mise en forme du texte
//gras
$texte = preg_replace('`\[g\](.+)\[/g\]`isU', '<strong>$1</strong>', $texte); 
//italique
$texte = preg_replace('`\[i\](.+)\[/i\]`isU', '<em>$1</em>', $texte);
//souligné
$texte = preg_replace('`\[s\](.+)\[/s\]`isU', '<u>$1</u>', $texte);
//lien
$texte = preg_replace('`\[url\](.+)\[/url\]`isU', '<a href="http://[a-z0-9._/-]">$1</a>', $texte);

//On retourne la variable texte
return $texte;
}
?>