<?php
#File name: imagegallery_db.php
#File for Image Gallery -Model
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim@Humber College
#March 16, 2015
#Reference: Class material -PDO Class

class ImageGalleryDB{
    //ImageGalleryDB class is controllers to connect and control data from the table 
    //manipulate and control data to render what we need and want to show 
    //images in the gallery table are all relate through its cat_id(foreign key) to cat_id of the categories table(primary key)
    //there are five methods in this class to control the data from the gallery and categories tables of the database
    //(1)GetImages() :  to get all the images from the gallery/categories tables
    //(2)GetImage($img_id): to get a specific image with $img_id
    //(3)GetImagesByCategory($cat_id) :  to get the images depending on the category selected ($cat_id)
    //(4)deleteImage($img_id) : to delete the image with $img_id
    //(5)addImage($image): to add an image
    
    public static function GetImages(){
        $dbCon =Database::getDB();    //connection to the database
        
        $sql= 'SELECT * FROM imagegallery INNER JOIN categories ON gallery.cat_id=categories.cat_id';
        $result= $dbCon ->query($sql);   
        $images = array();
        foreach($result as $row){    
           //for each result (row) of the above query
            //$category is an object  instantiated by Category class with selected cat_id and cat_name from the categories table
            //$image is an object instantiated by Gallery class with the data from the gallery table
            //$image id is written in the same value as img_id in the table
            //Then, $image (one row) is appended to the array, $images.
            //The array, $images, will be returned by this method
            $category= new Category($row['cat_id'], $row['cat_name']);
            $category_id= $category->getCatId();
            $image = new ImageGallery($row['img_title'], $category_id, $row['img_key'], $row['img_detail'], $row['img_filename'], $row['img_path'], $row['img_size'], $row['img_type'], $row['img_author'], $row['img_source']);
            $image->setID($row['img_id']);
            $images[]= $image;
        }
        return $images;                             
        }
    
        public static function GetImage($img_id){
        
        //create db connection, 
        //get an image matching with img_id from gallery table 
        //-query the above
        // Fetches the next row from a result set 
        // store one record in $row
        //get the category by creating category obj
        
        $dbCon= Database::getDB();
        $sql = "SELECT * FROM imagegallery WHERE img_id = '$img_id'";
        $result = $dbCon->query($sql);
        
        //convert result into array
        $row = $result->fetch();
        //creates category object
        $category = CategoryDB::getCategory($row['cat_id']);
        $category_id=$row['cat_id'];
        $image = new ImageGallery($row['img_title'], $category_id, $row['img_key'], $row['img_detail'], $row['img_filename'], $row['img_path'], $row['img_size'], $row['img_type'],  $row['img_author'], $row['img_source']);
        $image->setID($row['img_id']);
        return $image;        
    }
    
    public static function GetImagesByCategory($category_id){
        //from DB, get the category id from categories table
        //then get the images from gallery table where cat_id matches  $category_id
        $dbCon=Database::getDB();
        //$category :   CategoryDB::getCategory($category_id);
        $sql = "SELECT * FROM imagegallery WHERE cat_id='$category_id'  ORDER BY img_id ";

        $result= $dbCon->query($sql);
        $images=array();
        
        foreach($result as $row){
            $image = new ImageGallery($row['img_title'], $category_id, $row['img_key'], $row['img_detail'], $row['img_filename'], $row['img_path'], $row['img_size'], $row['img_type'],  $row['img_author'], $row['img_source']);
            $image->setID($row['img_id']);
            $images[]= $image;            
        }
        return $images;
    }
        
        
    public static function deleteImage($img_id){
        try{
        $dbCon=Database::getDB();
        $sql="DELETE FROM imagegallery WHERE img_id=".$img_id;
        $q = $dbCon->prepare($sql);
        $q->execute();
        //$row_count = $dbCon->exec($sql);
        //return $row_count; 
        } 
        catch (Exception $ex) {
            $err= $ex->getMessage();
             echo $err;
             die();
        }        
    }
    
    public static function editImage($img_id,$img_title,$img_key, $img_detail, $img_filename,$img_path, $img_size, $img_type , $img_author,$img_source, $cat_id){
        //the parameter $image for this method is supposed to be an object initiated by the ImageGallery class
        try{
        $dbCon= Database::getDB();       
        $image = self::GetImage($img_id);   
        
        $sql = "UPDATE imagegallery SET "
                . "img_title =?, "
                . "cat_id   = ?, "
                . "img_key = ?, "
                . "img_detail = ?, "
                . "img_filename = ?, "
                . "img_path = ?, "
                . "img_size = ?, "
                . "img_type = ?, "
                . "img_author = ?, "
                . "img_source = ? "
                . "WHERE img_id = ?";
        
         //$dbCon->exec($sql); 
         $statement = $dbCon->prepare($query);        
         $statement->execute(array(            
             $img_title,$cat_id,$img_key,$img_detail,$img_filename,$img_path,$img_size,$img_type,$img_author,$img_source,$img_id));  
         }
          catch(PDOException $e){
              $err= $e->getMessage();
              echo $err;
          }
    }
    
    public static function addImage($image){
        //the parameter $image for this method is supposed to be an object initiated by the ImageGallery class
        try{
        $dbCon= Database::getDB();       
        
        $img_title= $image ->getTitle();
        $cat_id= $image -> getCategoryID();//-> getCatID();   
        //from the ImageGallery class, get cat_id, then get img_id as well 
        //this is like $image=new ImageGallery();
        //$something= $image->getCategory();    returns cat_id of the $image from the gallery table
        //$cat_id = $image->getID();  returns cat_id,  for the returne cat_id of the gallery table
        //??????????????????????????????
        $img_key = $image -> getKeyIngredient();
        $img_detail = $image ->getDetail();
        $img_filename =$image ->getFilename();
        $img_path = $image ->getPath();
        $img_size= $image->getSize();
        $img_type = $image ->getType();
        //$img_content = $image -> getContent();
        $img_author = $image -> getAuthor();
        $img_source = $image->getSource();
        
        $sql = "INSERT INTO imagegallery (img_title, cat_id, img_key, img_detail, "
                                                    . "img_filename, img_path, img_size, img_type,"
                                                    . " img_author, img_source) "
                                        . "VALUES(:img_title, :cat_id , :img_key, :img_detail, :img_filename, :img_path, "
                                                        . ":img_size, :img_type, :img_author, :img_source )";
        
        $statement = $dbCon->prepare($sql);
        $statement -> bindParam(':img_title', $img_title, PDO::PARAM_STR, 100 );
        $statement -> bindParam(':cat_id', $cat_id, PDO::PARAM_INT );
        $statement -> bindParam(':img_key', $img_key, PDO::PARAM_STR, 100);
        $statement -> bindParam(':img_detail', $img_detail, PDO::PARAM_STR, 110);
        $statement -> bindParam(':img_filename', $img_filename, PDO::PARAM_STR, 100);
        $statement -> bindParam(':img_path', $img_path, PDO::PARAM_STR, 100);
        $statement -> bindParam(':img_size', $img_size, PDO::PARAM_INT);
        $statement -> bindParam(':img_type', $img_type, PDO::PARAM_STR, 30);
        $statement -> bindParam(':img_author', $img_author, PDO::PARAM_STR, 100);
        $statement -> bindParam(':img_source', $img_source, PDO::PARAM_STR, 200);
                                                            
        $statement->execute(); 
        }
          catch(PDOException $e){
              $err= $e->getMessage();
              echo $err;
          }
    }
}

class ImageFileValidation{
    
    //$t_name, $image_file_path, $image_size, $image_type;
    public static $error;
    
    public static function isImage($t_name){
        if(getimagesize($t_name)){
             //echo "File is an image - " . $check["mime"] . ".<br/>";
            return true;
        }
        else{
            self::$error = 'File is not an image. <br/>';
            return false;       
        }
    }
    
    public static function doesExist($image_file_path){
         // Check if file already exists
        if(file_exists($image_file_path)){
            self::$error= "File already exists in uploads folder. <br/>";
            return false;
        }else {return true;}        
    }
    
    public static function sizeCheck($image_size){
        // Check file size
        if($image_size > 5000000){
            self::$error="File is too large. <br/>";
            return false;        
             }else{return true;}
             
    }
    
    public static function formatCheck($image_type){
    //check file type
         if($image_type != "jpg" 
                 && $image_type != "png" 
                 && $image_type != "jpeg"
                 && $image_type != "gif" ) {
             self::$error="Only JPG, JPEG, PNG & GIF files are allowed.<br/>";
             return false;
             }       else{return true;}      
    }
}

class ImageEdit {
//Ref: http://webcheatsheet.com/php/create_thumbnail_images.php
//Ref: http://davidwalsh.name/create-image-thumbnail-php
//Ref: http://php.net/manual/en/function.imagecreatefromjpeg.php
    //thumbWidth : unit in dpi (dots per inch)
public static function CreateThumbs( $pathToImages, $pathToThumbs, $thumbWidth )
{
  // open the directory
  $dir = opendir( $pathToImages );

            // loop through it, looking for any/all JPG files:
            while (false !== ($fname = readdir( $dir ))) {
                        // parse path for the extension
                        $info = pathinfo($pathToImages . $fname);                        
                        // continue only if this is a JPEG, PNG, or GIF image
                        if ( strtolower($info['extension']) == 'jpg' ||  strtolower($info['extension']) == 'png' || strtolower($info['extension']) == 'gif')
                        {
                          
                          // load image and get image size
                          switch( strtolower($info['extension'])){
                              case "jpg":
                                  $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );                                  
                                  $width = imagesx( $img );
                                  $height = imagesy( $img );

                                  // calculate thumbnail size
                                  $new_width = $thumbWidth;
                                  $new_height = floor( $height * ( $thumbWidth / $width ) );

                                  // create a new temporary image
                                  $tmp_img = imagecreatetruecolor( $new_width, $new_height );

                                  // copy and resize old image into new image
                                  imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

                                  // save thumbnail into a file
                                  //imagejpeg — Output image to browser or file
                                  //imagejpeg() creates a JPEG file from the given image.
                                  imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
                                  //echo "Creating thumbnail for {$fname} <br />";
                                  break;
                              case "png":
                                  $img = imagecreatefrompng( "{$pathToImages}{$fname}" );
                                  $width = imagesx( $img );
                                  $height = imagesy( $img );

                                  // calculate thumbnail size
                                  $new_width = $thumbWidth;
                                  $new_height = floor( $height * ( $thumbWidth / $width ) );

                                  // create a new temporary image
                                  $tmp_img = imagecreatetruecolor( $new_width, $new_height );

                                  // copy and resize old image into new image
                                  imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

                                  // save thumbnail into a file
                                  //imagejpeg — Output image to browser or file
                                  //imagejpeg() creates a JPEG file from the given image.
                                  imagepng( $tmp_img, "{$pathToThumbs}{$fname}" );
                                  //echo "Creating thumbnail for {$fname} <br />";
                                  break;
                              case "gif":
                                  $img = imagecreatefromgif( "{$pathToImages}{$fname}" );
                                  $width = imagesx( $img );
                                  $height = imagesy( $img );

                                  // calculate thumbnail size
                                  $new_width = $thumbWidth;
                                  $new_height = floor( $height * ( $thumbWidth / $width ) );

                                  // create a new temporary image
                                  $tmp_img = imagecreatetruecolor( $new_width, $new_height );

                                  // copy and resize old image into new image
                                  imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

                                  // save thumbnail into a file
                                  //imagejpeg — Output image to browser or file
                                  //imagejpeg() creates a JPEG file from the given image.
                                  imagegif( $tmp_img, "{$pathToThumbs}{$fname}" );
                                  //echo "Creating thumbnail for {$fname} <br />";
                                  break;
                              default:
                                  break;
                          }//end of switch                             
                        }//end of if
            }    //end of while     
  // close the directory
  closedir( $dir );
}
// call createThumb function and pass to it as parameters the path
// to the directory that contains images, the path to the directory
// in which thumbnails will be placed and the thumbnail's width.
// We are assuming that the path will be a relative path working
// both in the filesystem, and through the web for links
//createThumbs("upload/","upload/thumbs/",100);
}

?>
