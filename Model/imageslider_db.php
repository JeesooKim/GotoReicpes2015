<?php
class ImagesliderDB {
    
    //selecting all rows from the table
    public static function getImagesliders() {
        //calling the database
        $db = Database::getDB();
        $query = 'SELECT * FROM imageslider';
        $result = $db->query($query);
        $imagesliders = array();
        foreach ($result as $row) {
            $imageslider = new Imageslider(
                                    $row['name'],
                                    $row['path']);
            $imageslider->setImageID($row['image_id']);
            $imagesliders[] = $imageslider;
        }
        return $imagesliders;
    }

    public static function getImageslider($img_id) {
        //calling the database
        $db = Database::getDB();
        $query = "SELECT * FROM imageslider
                  WHERE image_id = '$img_id'";
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();
        $imageslider = new Imageslider(
                                    $row['name'],
                                    $row['path']);
        $imageslider->setImageID($row['image_id']);
        return $imageslider;
    }

    public static function deleteImageslider($img_id) {
        //calling the database
        $db = Database::getDB();
        $query = "DELETE FROM imageslider
                  WHERE image_id = '$img_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }

    //function inserting into imageslider table
    public static function addImageslider($imageslider) {
        //calling the database
        $db = Database::getDB();
        
        //declaring variables from the values of imagesliders
        $img_name = $imageslider->getName();
        $img_path = $imageslider->getPath();

        //sql insert statement
        $query =
            "INSERT INTO imageslider
                 (name, path)
             VALUES
                 ('$img_name', '$img_path')";

        $statement = $db->prepare($query);
        $statement -> bindParam(':name',$img_name, PDO::PARAM_STR, 400 );
        $statement -> bindParam(':path', $img_path,PDO::PARAM_STR, 400 );
                                                            
        $statement->execute(); 
    }

    //function updating the imageslider table
    public static function updateImageslider($imageslider, $img_id)
    {
        //calling the database
        $db = Database::getDB();
        
        //declaring variables from the values of imagesliders
        $img_name = $imageslider->getName();
        $img_path = $imageslider->getPath();

        //sql update statement
        $query = "UPDATE imageslider SET name = '$img_name', path = '$img_path' WHERE image_id = '$img_id'";
        
        $statement = $db->prepare($query);
        $statement -> bindParam(':name',$img_name, PDO::PARAM_STR, 400 );
        $statement -> bindParam(':path', $img_path,PDO::PARAM_STR, 400 );
                                                            
        $statement->execute(); 
    }
}
?>