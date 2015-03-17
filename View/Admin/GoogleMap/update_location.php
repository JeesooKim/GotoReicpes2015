<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Location Entries</title>
    </head>
    <body>
        <?php
        require ('../../Model/database.php'); 
        require ('../../Model/location_db.php'); 
        require ('../../Model/locations.php'); 
        
        //to get the id from location_admin
            if(isset($_POST['location_id'])){
                $location_id = $_POST['location_id'];
            }
        
        $locationresult = locationDB::getLocation();
        $location = locationDB::getLocation($location_id);
        $branch = $location['branch'];
        $phone = $location['phone'];
        $street = $location['street'];
        $postal = $location['postal'];
        $city = $location['city'];
        $province = $location['province'];
        $country = $location['country'];

        if(isset($_POST['update'])){
            $UpdateBranch = $_POST['branch'];
            $UpdatePhone = $_POST['phone'];
            $UpdateStreet = $_POST['street'];
            $UpdatePostal = $_POST['postal'];
            $UpdateCity = $_POST['city'];
            $UpdateProvince = $_POST['province'];
            $UpdateCountry = $_POST['country'];
        }
        //validate
        if ($UpdateBranch != '' || $UpdatePhone != '' || $UpdateStreet != '' || $UpdatePostal !='' ||$UpdateCity !='' || $UpdateProvince !='' || $UpdateCountry !='' ) {
            echo "Please enter all fields";
            $location = new Location($branch, $phone, $street, $postal, $city, $province, $country);

            locationDB::updateLocation($location,$id);

        }
        
        //allow for delete
        
        
        //confirm delete
        ?>
        
        <h2>Update Location Entries</h2>
        
        <form action="update_location.php" method="POST">
            <!--passing hidden id-->
            <input type="hidden" name="id" value="<?php echo $location; ?>" />
            <br />
            Branch: <input type="text" name="branch" value="<?php echo $branch; ?>" />
            <br />
            Phone: <input type="text" name="postal" value="<?php echo $phone; ?>" />
            <br />
            Street: <input type="text" name="street" value="<?php echo $street; ?>" />
            <br />
            Postal Code: <input type="text" name="postal" value="<?php echo +$postal; ?>" />
            <br />
            City: <input type="text" name="city" value="<?php echo $city; ?>" />
            <br />
            Province: <input type="text" name="province" value="<?php echo $province; ?>" />
            <br />
            Country: <input type="text" name="country" value="<?php echo $country; ?>" />
            <br /><br />
        <input type="submit" name="update" value="Update" />
        <input type="submit" name="delete" value="Delete" />
        </form> 
        
        <a href="../../View/Admin/location_admin.php">Back</a>
        
    </body>
</html>
