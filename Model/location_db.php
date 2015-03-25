<?php
class LocationDB {
	//use category and product class
	//four static method
    public static function getLocations() {
        $db = Database::getDB();
        $query = 'SELECT * FROM location';
        $result = $db->query($query);
        $locations = array();
        foreach ($result as $row) {
            $location = new Location(
                                   $row['branch'],
                                   $row['phone'],
                                   $row['street'],
                                   $row['postal'],
                                   $row['city'],
                                   $row['province'],
                                   $row['country']);
            $location->setId($row['id']);
            $locations[] = $location;
        }
        return $locations;
    }

    //accept product id
    public static function getLocation($location_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM location
                  WHERE id = '$location_id'";
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();
        $location = new Location(
                                   $row['branch'],
                                   $row['phone'],
                                   $row['street'],
                                   $row['postal'],
                                   $row['city'],
                                   $row['province'],
                                   $row['country']);
        $location->setID($row['id']);
        return $location;
    }

    public static function deleteLocation($location_id) {
        $db = Database::getDB();
        $query = "DELETE FROM location
                  WHERE id = '$location_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function addLocation($location) {
        $db = Database::getDB();

        //$location_id = $location->getID();
        $branch = $location->getBranch();
        $phone = $location->getPhone();
        $street = $location->getStreet();
        $postal = $location->getPostal();
        $city = $location->getCity();
        $province = $location->getProvince();
        $country = $location->getCountry();

        $query =
            "INSERT INTO location
                 (branch, phone, street, postal, city, province, country)
             VALUES
                 ('$branch', '$phone', '$street', '$postal', '$city', '$province', '$country')";

        $row_count = $db->exec($query);
        return $row_count;
    }
}
?>