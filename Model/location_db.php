<?php
class locationDB {

    public static function getLocation(){
        $db = database::getDB();
        $query = 'SELECT * FROM location ORDER BY id';
        
        $result = $db->query($query);

        return $result;
    
    }
    
    public static function addLocation($location){
        $db = database::getDB();

        $branch = $location->getBranch();
        $phone = $location->getPhone();
        $street = $location->getStreet();
        $postal = $location->getPostal();
        $city = $location->getCity();
        $province = $location->getProvince();
        $country = $location->getCountry();

        $query = "INSERT INTO location
                      (branch, phone, street, postal, city, province, country)
                  VALUES
                      ('$branch','$phone','$street','$postal','$city','$province','$country')";

        $row_count = $db->exec($query);
        return $row_count;
    }
    
    //Update location info
    public static function updateLocation($location, $id)
    {
        $db = Database::getDB();
        $branch = $location->getBranch();
        $phone = $location->getPhone();
        $street = $location->getStreet();
        $postal = $location->getPostal();
        $city = $location->getCity();
        $province = $location->getProvince();
        $country = $location->getCountry();

        $query = "UPDATE location SET id = '$id',
                    branch = '$branch',
                    phone = '$phone',
                    street = '$street',
                    postal = '$postal',
                    city = '$city',
                    province = '$province',
                    country = '$country' WHERE id = $id ";
        $row_count = $db->exec($query);
        return $row_count;

    }

    //Delete location info
    public static function deleteLocation($id){
        $db = Database::getDB();
        $query = "DELETE FROM location WHERE id = $id";
        $row_count = $db->exec($query);
        return $row_count;
    }
}
?>