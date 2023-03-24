
<?php

// Nombre d'images à afficher

$max_images = 4;

// Chemin pour les avatars

$image_path = 'avatar/';


// Liste des extensions autorisées

$list_ext = array('jpeg', 'jpg', 'png', 'gif');

$folder = opendir($image_path);

while($file = readdir($folder)){

$ext = explode('.', $file);

$ext = strtolower($ext[count($ext)-1]);

if

(in_array($ext, $list_ext)){

$list_images[] = $image_path.$file;

}

}

$current_page = (! isset ($_GET['page']) ||

empty($_GET['page']))?1 : $_GET['page'];

$nb_pages = ceil(count($list_images)/$max_images);

// Affichage des images

for ($i = ($current_page - 1)* $max_images;

$i< ($current_page - 1)*$max_images + $max_images;

$i++){

if ($i< count($list_images)){

if (file_exists($list_images[$i])){

echo  '<img src = "'.$list_images[$i].'" . />';

      
	                       }
				    }
			}
			




?>