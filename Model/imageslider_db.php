<?php
class ImagesliderDB {
    
    public static function getImagesliders() {
        $db = Database::getDB();
        $query = $db->prepare('SELECT * FROM imageslider');
        $result = $db->query($query);
        $imagesliders = array();
        foreach ($result as $row) {
            $imageslider = new Slideshow(
                                   $row['name'],
                                   $row['description'],
                                   $row['image'],
                                   $row['date']);
            $imageslider->setId($row['imageId']);
            $imagesliders[] = $imageslider;
        }
        return $imagesliders;
    }

    //accept product id
    public static function getImageslider($image_id) {
        $db = Database::getDB();
        $query = $db->prepare("SELECT * FROM imageslider
                  WHERE imageId = '$image_id'");
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();
        $imageslider = new Slideshow(
                                   $row['name'],
                                   $row['description'],
                                   $row['image'],
                                   $row['date']);
        $imageslider->setImageID($row['imageId']);
        return $imageslider;
    }

    public static function deleteImageslider($image_id) {
        $db = Database::getDB();
        $query = $db->prepare("DELETE FROM imageslider
                  WHERE imageId = '$image_id'");
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function addImageslider($imageslider) {
        $db = Database::getDB();

        $name = $imageslider->getName();
        $description = $imageslider->getDescription();
        $image = $imageslider->getImage();
        $date = $imageslider->getDate();

        $query = $db->prepare(
            "INSERT INTO imageslider
                 (name, description, image, date)
             VALUES
                 ('$name', '$description', '$image', '$date')");

        $row_count = $db->exec($query);
        return $row_count;
    }

    
    public static function updateImageslider($imageslider, $image_id)
    {
        $db = Database::getDB();
        $name = $imageslider->getName();
        $description = $imageslider->getDescription();
        $image = $imageslider->getImage();
        $date = $imageslider->getDate();

        $query = $db->prepare("UPDATE imageslider SET name = '$name',
                                              description = '$description',
                                              image = '$image',
                                              date = '$date' WHERE imageId = '$image_id' ");
        $row_count = $db->exec($query);
        return $row_count;

    }
}
?>