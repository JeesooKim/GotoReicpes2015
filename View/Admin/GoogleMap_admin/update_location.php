<?php
        include '../../View/Shared/header.php';
        require ('../../Model/database.php');
        require ('../../Model/location_db.php'); 
        require ('../../Model/locations.php'); 
        
        //to get the id from location_admin
            if(isset($_GET['location_id'])) {
                $location_id = $_GET['location_id'];
            } else {
                $location_id = $_POST['location_id'];
            }
        
        $location = locationDB::getLocations($location_id);
        $location_branch = $location->getBranch();
        $location_phone = $location->getPhone();
        $location_street = $location->getStreet();
        $location_postal = $location->getPostal();
        $location_city = $location->getCity();
        $location_province = $location->getProvince();
        $location_country = $location->getCountry();

        if(isset($_POST['update'])){
            $location_branch = $_POST['branch'];
            $location_phone = $_POST['phone'];
            $location_street = $_POST['street'];
            $location_postal = $_POST['postal'];
            $location_city = $_POST['city'];
            $location_province = $_POST['province'];
            $location_country = $_POST['country'];
        
        
        //validate
        if ($location_branch != '' || $location_phone != '' || $location_street != '' || $location_postal !='' ||$location_city !='' || $location_province !='' || $location_country !='' ) {
            echo "Please enter all fields";
            $location = new Location($location_branch,$location_phone,$location_street,$location_postal,$location_city,$location_province,$location_country);

            locationDB::updateLocation($location, $location_id);

            }
        }
        ?>
        
        <h2>Update Location Entries</h2>
        
            <table class="table table-responsive table-striped">
            <form action="update_location.php" method="post">
                <tr>
                    <th>Branch:</th>
                    <td><input type="text" name="branch" value="<?php echo $location_branch; ?>" /></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="text" name="phone" value="<?php echo $location_phone; ?>" /></td>
                </tr>
                <tr>
                    <td>Street:</td>
                    <td><input type="text" name="street" value="<?php echo $location_street; ?>" /></td>
                </tr>
                <tr>
                    <td>Postal Code:</td>
                    <td><input type="text" name="postal" value="<?php echo $location_postal; ?>" /></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="city" value="<?php echo $location_city; ?>" /></td>
                </tr>
                <tr>
                    <td>Province:</td>
                    <td><input type="text" name="province" value="<?php echo $location_province; ?>" /></td>
                </tr>
                <tr>
                    <td>Country:</td>
                    <td><input type="text" name="country" value="<?php echo $location_country; ?>" /></td>
                </tr>
                <tr>
                    <td><input value='Update' type='submit' name="update"></td>
                </tr>
        </table>
        </form> 
        
        <a href="../../View/Admin/location_admin.php">Back</a>
        
