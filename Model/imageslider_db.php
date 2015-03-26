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

        //$location_id = $location->getID();
        $branch = $location->getBranch();
        $phone = $location->getPhone();
        $street = $location->getStreet();
        $postal = $location->getPostal();
        $city = $location->getCity();
        $province = $location->getProvince();
        $country = $location->getCountry();

        $query = $db->prepare(
            "INSERT INTO location
                 (branch, phone, street, postal, city, province, country)
             VALUES
                 ('$branch', '$phone', '$street', '$postal', '$city', '$province', '$country')");

        $row_count = $db->exec($query);
        return $row_count;
    }

    
    public static function UpdateLocation($map_location, $location_id)
    {
        $db = Database::getDB();
        $map_location_branch = $map_location->getBranch();
        $map_location_phone = $map_location->getPhone();
        $map_location_street = $map_location->getStreet();
        $map_location_postal = $map_location->getPostal();
        $map_location_city = $map_location->getCity();
        $map_location_province = $map_location->getProvince();
        $map_location_country = $map_location->getCountry();

        $query = "UPDATE location SET branch = '$map_location_branch',
                                              phone = '$map_location_phone',
                                              street = '$map_location_street',
                                              postal = '$map_location_postal', city = '$map_location_city', province = '$map_location_province', country = '$map_location_country' WHERE id = '$location_id' ";
        $row_count = $db->exec($query);
        return $row_count;

    }
}
?>