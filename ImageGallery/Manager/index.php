<?php
require('../../model/database.php');
require('../../model/category.php');
require('../../model/category_db.php');
require('../../model/imagegallery.php');
require('../../model/imagegallery_db.php');
error_reporting();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_images';  //when this page is loaded for the first time, assign 'list_images' string to $action
}
//'action' is the name of the hidden type input under a form from 'image_upload.php' 

if ($action == 'list_images') { //when the page is loaded for the fist time
// First thing to do is to get the category id
// 
    // Get the current category ID
    if(!isset($_GET['category_id'])) {
        $category_id = 1;
    }else
    {
       $category_id = $_GET['category_id'];   
    }
    // Get image and category data
    $current_category = CategoryDB::getCategory($category_id);   //Category object having name and id properties
    $categories = CategoryDB::getCategories();
    $images = ImageGalleryDB::GetImagesByCategory($category_id);

    // Display the image list
    include('image_list.php');
    
} else if ($action == 'delete_image') {
    // Get the IDs
    $img_id = $_POST['image_id'];
    $category_id = $_POST['category_id'];

    // Delete the image
    ImageGalleryDB::deleteImage($img_id);

    // Display the Image List page for the current category
    header("Location: .?category_id=$category_id");
    
} else if ($action == 'show_upload_form') {
    $categories = CategoryDB::getCategories();
    
    include('image_upload.php');
    
} else if ($action == 'Upload Image') {
    
    $category_id = $_POST['category_id'];       
    $img_title = $_POST['img_title'];    
    $img_key=$_POST['img_key'];
    $img_detail=$_POST['img_detail'];    
    $img_author=$_POST['img_author'];
    $img_source=$_POST['img_source'];
    
    $img_filename = basename($_FILES['file_upload']['name']);
    $t_name = $_FILES['file_upload']['tmp_name'];
    $dir='../../content/uploads/images/'; //specifies the directory where the file is going to be placed
    $img_path = $dir . $img_filename;
    $img_size =$_FILES["file_upload"]["size"];
    $img_type = pathinfo($img_path, PATHINFO_EXTENSION);  //holds the file extension of the file
    //$img_type=$_FILES['file_upload']['type'];
    
    //http://www.php-mysql-tutorial.com/wikis/mysql-tutorials/uploading-files-to-mysql-database.aspx    
    //$fp      = fopen($t_name, 'r');
    //$img_content = fread($fp, filesize($t_name));
    //$img_content = addslashes($img_content);
   // fclose($fp);

    if(!get_magic_quotes_gpc())
    {
        $img_filename = addslashes($img_filename);
    }       
    //http://www.w3schools.com/php/php_file_upload.asp
    //check if image file is an actual image or fake one
    //echo "Image type $img_type";
    
 /********************   Image File Validation****************/   
    //$uploadOk is the variable to store the validation result.   True/False
//    $uploadOk=ImageFileValidation::isImage($t_name) ; 
//    $uploadOk=ImageFileValidation::isExists($img_path); //value will be overwritten
//    $uploadOk=ImageFileValidation::sizeCheck($img_size);
//    $uploadOk=ImageFileValidation::formatCheck($img_type);
      
      $check = getimagesize($t_name);
    if($check ){
             //echo "File is an image - " . $check["mime"] . ".<br/>";
             $uploadOk= 1;
        }
        else{
            echo 'File is not an image. <br/>';
             $uploadOk=0;       
        }


 // Check if file already exists
        if(file_exists($img_path)){
            echo "File already exists in uploads folder. <br/>";
            $uploadOk=0;    
        }
        else{
            $uploadOK=1;
        }
        
         // Check file size
        if($img_size > 5000000){
            echo "File is too large. <br/>";
            $uploadOk=0;      
             }
             else{
            $uploadOK=1;
        }
             
             //check file type
        if($img_type != "jpg" 
                 && $img_type != "png" 
                 && $img_type != "jpeg"
                 && $img_type != "gif" ) {
             echo "Only JPG, JPEG, PNG & GIF files are allowed.<br/>";
             $uploadOk=0;  
             }
             else{
            $uploadOK=1;
        }
        
/***************** end of  ImageFile Validation ***********************************/

//    echo "title: " . $img_title . "<br/>";    
//    echo "cat id: " . $category_id . "<br/>";  
//    echo "key:  " . $img_key . "<br/>";  
//    echo "detail: " . $img_detail . "<br/>";  
//    echo "author: " . $img_author . "<br/>";  
//    echo "source: " . $img_source . "<br/>";  
//    
//    echo "filename: " . $img_filename . "<br/>";
//    echo "path: " . $img_path. "<br/>";
//    echo "size: " . $img_size. "<br/>";
//    echo "type: " . $img_type. "<br/>";    
//    
//    
//    echo $uploadOK . "<br/>";
    
    //Depending on the result of the above validation, do the following.
     //Check if $uploadOk is set to 0 by an error             
    if ($uploadOk == 0) {        
        $error = "Sorry, your file was not uploaded.";
        include('../../Errors/error.php');    
    }
    else if($uploadOK ==1) {       
        // if everything is ok, try to upload file        
         //$current_category = CategoryDB::getCategory($category_id);       
         //$current category...is a category Object...not a string         
         $imageObj = new ImageGallery($img_title, $category_id, $img_key,$img_detail, $img_filename, $img_path, $img_size, $img_type, $img_author,$img_source);
                                               
          if(move_uploaded_file($t_name, "$img_path")){ 
          //move_uploaded_file — Moves an uploaded file to a new location
           //bool move_uploaded_file ( string $filename , string $destination )
             
              try{
//                        $db= Database::getDB();       
//
//                        $query = "INSERT INTO gallery (img_title, cat_id ,img_key, img_detail, img_filename, img_path, img_size, img_type, 
//                                                                             img_author, img_source)
//                                            VALUES('$img_title', '$category_id', '$img_key','$img_detail', '$img_filename', '$img_path', '$img_size', '$img_type', 
//                                                                             '$img_author','$img_source' )";
//                        //$db->prepare($query);
//                        $db->exec($query);

                        ImageGalleryDB::addImage($imageObj);
                        //echo "upload successful";                           
              }
              catch(PDOException $e){
                  $err= $e->getMessage();
                  echo $err;
              }
              
              // Display the Image List page for the current category
              header("Location: .?category_id=$category_id");
              
           }else{  
                 echo 'upload fail.<br/>';                      
          }
    }
    //Ref: http://www.w3schools.com/php/php_file_upload.asp  Feb 25,2015
}
?>