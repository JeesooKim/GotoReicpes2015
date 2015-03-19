<?php

class LocationDB
{
    //Get All Locations
    public static function getLocations()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM location';
        $result = $db->query($query);
        $map_locations = array();
        foreach ($result as $row) {
            $map_location = new Location(
                $row['branch'],
                $row['phone'],
                $row['street'],
                $row['postal'],
                $row['city'],
                $row['province'],
                $row['country']);
            $map_location->setID($row['id']);
            $map_locations[] = $map_location;
        }
        return $map_locations;

    }

    //Get a location by id
    public static function getLocation($map_location_id)
    {
        $db = Database::getDB();
        $query = "SELECT * FROM location WHERE id = $map_location_id";
        $result = $db->query($query);
        //convert result to array
        $row = $result->fetch();
        $map_location = new Location(
            $row['branch'],
            $row['phone'],
            $row['street'],
            $row['postal'],
            $row['city'],
            $row['province'],
            $row['country']);
        $map_location->setID($row['id']);
        return $map_location;
    }

    //Add new location
    public static function AddLocation($map_location)
    {
        $db = Database::getDB();
        $branch = $map_location->getBranch();
        $phone = $map_location->getPhone();
        $street = $map_location->getStreet();
        $postal = $map_location->getPostal();
        $city = $map_location->getCity();
        $province = $map_location->getProvince();
        $country = $map_location->getCountry();
        $query = "INSERT INTO location (branch, phone, street, postal, city, province, country) VALUES ('$branch', '$phone', '$street', '$postal', '$city', '$province', '$country')";
        $row_count = $db->exec($query);
        return $row_count;

    }

    //Update Location
    public static function UpdateLocation($map_location, $map_location_id)
    {
        $db = Database::getDB();
        $branch = $map_location->getBranch();
        $phone = $map_location->getPhone();
        $street = $map_location->getStreet();
        $postal = $map_location->getPostal();
        $city = $map_location->getCity();
        $province = $map_location->getProvince();
        $country = $map_location->getCountry();

        $query = "UPDATE location SET branch = '$branch',
                                              phone = '$phone',
                                              street = '$street',
                                              postal = '$postal',
                                              city = '$city', province = '$province', country = '$country' WHERE id = $map_location_id ";
        $row_count = $db->exec($query);
        return $row_count;

    }

    //Delete Location
    public static function DeleteLocation($map_location_id){
        $db = Database::getDB();
        $query = "DELETE FROM location WHERE id = $map_location_id";
        $row_count = $db->exec($query);
        return $row_count;

    }


}