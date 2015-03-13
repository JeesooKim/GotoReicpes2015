<?php
require_once('database.php');
error_reporting(0);

if( isset($_POST['upload']) ){
    //&& $_FILE['file_upload']['size']>0
    $img_title = $_POST['img_title'];
    $img_category = $_POST['img_category'];
    $img_key=$_POST['img_key'];
    $img_detail=$_POST['img_detail'];    
    $img_author=$_POST['img_author'];
    $img_source=$_POST['img_source'];
    $img_filename = basename($_FILES['file_upload']['name']);
    $t_name = $_FILES['file_upload']['tmp_name'];
    $dir='../Content/uploads/images/'; //specifies the directory where the file is going to be placed
    $img_path = $dir . $img_filename;
    $img_size =$_FILES["file_upload"]["size"];
    $img_type = pathinfo($img_path, PATHINFO_EXTENSION);  //holds the file extension of the file
    //$img_type=$_FILES['file_upload']['type'];
    
    //http://www.php-mysql-tutorial.com/wikis/mysql-tutorials/uploading-files-to-mysql-database.aspx    
    $fp      = fopen($t_name, 'r');
    $img_content = fread($fp, filesize($t_name));
    $img_content = addslashes($img_content);
    fclose($fp);

    if(!get_magic_quotes_gpc())
    {
        $img_filename = addslashes($img_filename);
    }

       
    //http://www.w3schools.com/php/php_file_upload.asp
    //check if image file is an actual image or fake one
    //echo "Image type $img_type";
    
        
    /***********   Image File Validation****************/
    $check = getimagesize($t_name);
    if($check){
        //echo "File is an image - " . $check["mime"] . ".<br/>";
            $uploadOk = 1;        
    }
    else
    {
        echo 'File is not an image.<br/>';
        $uploadOk=0;
    }   
    
    // Check if file already exists
    if (file_exists($img_path)) {
        echo "File already exists.<br/>";
        $uploadOk = 0;
    }
    // Check file size
    if ($img_size > 5000000) {
        echo "File is too large.<br/>";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($img_type != "jpg" && $img_type != "png" && $img_type != "jpeg"
    && $img_type != "gif" ) {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.<br/>";
        $uploadOk = 0;
    }
    /*************** ImageFile Validation   ****************/
    
    //Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br/>";
    // if everything is ok, try to upload file
    }
    else{
                if(move_uploaded_file($t_name, "$img_path"))
                { //move_uploaded_file — Moves an uploaded file to a new location
                    //bool move_uploaded_file ( string $filename , string $destination )

                        try{
                            $dbObj = Database::getDB();

                                //echo "connected<br/>";
                                //$sql = "INSERT INTO gallery (cat_name , img_name, img_path)";
                                //$sql .= "VALUES ('$img_cat', '$name', '$img_path')"; 
                                $query = "INSERT INTO gallery (img_title,img_cat,img_key, img_detail, img_filename, img_path, img_size, img_type, img_content, img_author, img_source) "
                                        . "VALUES('$img_title', '$img_category', '$img_key','$img_detail', '$img_filename', '$img_path', '$img_size', '$img_type', '$img_content', '$img_author','$img_source' )";
                                $dbObj ->exec($query);
        //                        if(!empty($result)){
        //                            echo "file '$name' upload successful! <br/>";
        //                        }
                            }

                        catch(PDOException $e){
                            echo $e->getMessage();
                        }

                 }else
                {
                    echo 'upload fail.<br/>';
                } 
    }
    
    //Ref: http://www.w3schools.com/php/php_file_upload.asp  Feb 25,2015
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD SHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999.xhtml">
    <head>
        <meta http-equiv="Contet-Type" content="text/html"; charset="utf-8" />
        <title>Upload Images</title>
    </head>
    <body>
        
        <form action="image_upload.php" method="post" enctype="multipart/form-data">
            
            <table>
                <tr>
                    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="5000000"> -->
                    <td><label>Upload Image File: </label>   
                    </td>
                    <td><input type="file" name="file_upload" /><br/><br/>
                    </td>                    
                </tr> 
                
                <tr>
                    <td><label>Title: </label></td>
                    <td><input type="text" name="img_title" /></td></tr>
            
                <tr> <!-- category table will be created later -->
                    <td> <label>Category: </label></td>
                    <td><select name="img_category">                        
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                        <option value="Pastry">Pastry</option>
                        <option value="Beverages">Beverages</option>
                    </select></td>
                </tr>
                
                
                <tr>
                    <td><label>Key Ingredient: </label></td>
                    <td><input type="text" name="img_key" placeholder="Only one main ingredient"/>
                    </td>                    
                </tr>
                
                <tr>
                    <td><label>Description: </label>
                    </td>
                    <td><textarea name="img_detail" row="2" cols="30" maxlength="100" ></textarea></td>
                </tr> 
                
                
                <tr><td><label>Author:</label></td>
                    <td><input type="text" name="img_author" /></td></tr>
                <tr><td><label>Source:</label></td>
                    <td><input type="text" name="img_source" /></td></tr>
            </table>                    
            
            <input type="submit" name="upload" value="Upload Image"/>
            
        </form>
    </body>
</html>
