<?php

require_once( SITEROOT.PATH_DATABASE);  
require(SITEROOT.PATH_MODEL_IMAGESLIDERS);
require(SITEROOT.PATH_MODEL_IMAGESLIDER_DB);

//file properties
        $file = $_FILES['image']['tmp_name'];
        
        if(!isset($file)){
            echo "Please select an image.";
        }else{
            //help avoid unwanted SQL injection. Add slashes.
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']); //avoid inverted commas
            $image_size = getimagesize($_FILES['image']['tmp_name']);   //ensures to find dimensions of an image
            
            if($image_size == false){
                echo "That's not an image.";
            }else{
                if(!$insert = mysql_query("INSERT INTO imageslider VALUES ('','$image_name','$image' )")){
                    echo "Problem uploading image.";
                }else{
                    
                }
                $imageslider = new Imageslider($img_name, $img_Image);
                ImagesliderDB::addImageslider($imageslider);
                header("Location: imageslider_admin.php");
            }
        }