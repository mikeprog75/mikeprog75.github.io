                    
					<?php
					
                    $extension_upload = strtolower(substr(  strrchr($_FILES['avatar1']['name'], '.')  ,1));
                    $name1 = time();
                    $nom_avatar1 = str_replace(' ','',$name1).".".$extension_upload;
                    $name1 = "./images/galerie1/".str_replace(' ','',$name1).".".$extension_upload;
                    move_uploaded_file($_FILES['avatar1']['tmp_name'],$name1);
                   
				   ?>
				   
				   <?php
					
                    $extension_upload = strtolower(substr(  strrchr($_FILES['avatar2']['name'], '.')  ,1));
                    $name2 = time();
                    $nom_avatar2 = str_replace(' ','',$name2).".".$extension_upload;
                    $name2 = "./images/galerie2/".str_replace(' ','',$name2).".".$extension_upload;
                    move_uploaded_file($_FILES['avatar2']['tmp_name'],$name2);
                   
				   ?>
				   
				   <?php
					
                    $extension_upload = strtolower(substr(  strrchr($_FILES['avatar3']['name'], '.')  ,1));
                    $name3 = time();
                    $nom_avatar3 = str_replace(' ','',$name3).".".$extension_upload;
                    $name3 = "./images/galerie3/".str_replace(' ','',$name3).".".$extension_upload;
                    move_uploaded_file($_FILES['avatar3']['tmp_name'],$name3);
                   
				   ?>
				   
				   <?php
					
                    $extension_upload = strtolower(substr(  strrchr($_FILES['avatar4']['name'], '.')  ,1));
                    $name4 = time();
                    $nom_avatar4 = str_replace(' ','',$name4).".".$extension_upload;
                    $name4 = "./images/galerie4/".str_replace(' ','',$name4).".".$extension_upload;
                    move_uploaded_file($_FILES['avatar4']['tmp_name'],$name4);
                   
				   ?>
				   
				   