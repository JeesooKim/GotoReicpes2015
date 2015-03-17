<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GoToRecipes Locations</title>
    </head>
    <body>
        <?php 
        require ('../../Model/database.php'); 
        require ('../../Model/location_db.php'); 
        require ('../../Model/locations.php'); 
        
        //take input from user and insert into db here
        if(isset($_POST['location_send'])){
            $id = $_POST['id'];
            $branch = $_POST['branch'];
            $phone = $_POST['phone'];
            $street = $_POST['street'];
            $postal = $_POST['postal'];
            $city = $_POST['city'];
            $province = $_POST['province'];
            $country = $_POST['country'];
            
        }
        // Validate inputs
            if(empty($branch) || empty($phone) || empty($street) || empty($postal) || empty($city) || empty($province) || empty($country)) {
            $error = "Missing data. Check all fields and try again.";
            } 
            else 
            {// If valid, add the product to the database
            $location = new location($branch, $phone, $street, $postal, $city, $province, $country);
            locationDB::addLocation($location);
            }
            
        //to set the id for update/delete
            if(isset($_POST['update_delete'])){
                $location_id = $_POST['id'];
            }
        
        $result = locationDB::getLocation();
        ?>
        
        <form action="location_admin.php" method="post">
            Branch: <input type="text" name="branch" />
            <br />
            Phone: <input type="text" name="phone" />
            <br />
            Street: <input type="text" name="street" />
            <br />
            Postal Code: <input type="text" name="postal" />
            <br />
            City: <input type="text" name="city" />
            <br />
            Province: <input type="text" name="province" />
            <br />
            Country: <input type="text" name="country" />
            <br /><br />
            <input value='Insert' type='submit' name="location_send">
            
        <?php
        ?>
        </form>
        
        
        
            <table>
                <tr>
                    <th>ID</th>
                    <th>Branch</th>
                    <th>Phone</th>
                    <th>Street</th>
                    <th>Postal Code</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Country</th>
                    <th></th>
                </tr>

            <?php foreach ($result as $row) : ?>
                <tr>
                    <td> <?php echo $row['id']; ?></td>
                    <td> <?php echo $row['branch']; ?></td>
                    <td> <?php echo $row['phone']; ?></td>
                    <td> <?php echo $row['street']; ?></td>
                    <td> <?php echo $row['postal']; ?></td>
                    <td> <?php echo $row['city']; ?></td>
                    <td> <?php echo $row['province']; ?></td>
                    <td> <?php echo $row['country']; ?></td>
                    <td> <form action="update_location.php" method="POST">
                        <input type="hidden" name="location_id" value="<?php echo $row['id']; ?>" />
                        <input type="submit" name="update_delete" value="Update/Delete" </td>
                        </form>
                <tr>
                    <!--google maps api display-->
                    <iframe width="325" height="250" frameborder="1" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.ca/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $row['street'],$row['postal'],$row['country'];?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $row['street'],$row['postal'],$row['country'];?>&amp;t=m&amp;z=12&amp;output=embed" w></iframe>
                </tr>
            <?php endforeach; ?>
            </table>
  
    </body>
</html>
