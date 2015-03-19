<?php 
        include ('../../../View/Shared/header.php');
        require ('../../../Model/database.php'); 
        require ('../../../Model/location_db.php'); 
        require ('../../../Model/locations.php'); 
        
        //handle delete from data
        if(isset($_POST['location_id'])){
            $location_id = $_POST['location_id'];
            locationDB::deleteLocation($location_id);
        }
        
        //take input from user and allocate to variable
        if(isset($_POST['insert'])){
            $id = $_POST['id'];
            $branch = $_POST['branch'];
            $phone = $_POST['phone'];
            $street = $_POST['street'];
            $postal = $_POST['postal'];
            $city = $_POST['city'];
            $province = $_POST['province'];
            $country = $_POST['country'];
            
        // Validate inputs
        if($id != ' ' || $branch != ' ' || $phone != ' ' || $street !=' ' || $postal != ' ' || $city != ' ' || $province !=' ' || $country !=' '){
            $location = new Location($id, $branch, $phone, $street, $postal, $city, $province, $country);
            locationDB::addLocation($location);
        }
        else{
            echo  'Missing fields';
            }
        }
        
        //get table
        $location = locationDB::getLocations();
        
        ?>
        
        <table class="table table-responsive table-striped">
            <form action="location_admin.php" method="post">
                <tr>
                    <td>Branch:</td>
                    <td><input type="text" name="branch" /></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="text" name="phone" /></td>
                </tr>
                <tr>
                    <td>Street:</td>
                    <td><input type="text" name="street" /></td>
                </tr>
                <tr>
                    <td>Postal Code:</td>
                    <td><input type="text" name="postal" /></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="city" /></td>
                </tr>
                <tr>
                    <td>Province:</td>
                    <td><input type="text" name="province" /></td>
                </tr>
                <tr>
                    <td>Country:</td>
                    <td><input type="text" name="country" /></td>
                </tr>
                <tr>
                    <td><input value='Insert' type='submit' name="insert"></td>
                </tr>
            </form>
        </table>
        
            <table class="table table-responsive table-striped">
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
                    <th></th>
                </tr>

            <?php
            foreach ($location as $row) : ?>
                <tr>
                    <iframe width="325" height="250" frameborder="1" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.ca/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $row['street'],$row['postal'],$row['country'];?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $row['street'],$row['postal'],$row['country'];?>&amp;t=m&amp;z=12&amp;output=embed" w></iframe>
                </tr>
                <tr>
                    <td> <?php echo $row['id']; ?></td>
                    <td> <?php echo $row['branch']; ?></td>
                    <td> <?php echo $row['phone']; ?></td>
                    <td> <?php echo $row['street']; ?></td>
                    <td> <?php echo $row['postal']; ?></td>
                    <td> <?php echo $row['city']; ?></td>
                    <td> <?php echo $row['province']; ?></td>
                    <td> <?php echo $row['country']; ?></td>
                    <td>
                    <?php 
                    //to set the id for update
                    if(isset($_POST['update'])){
                        $location_id = $_POST['location_id'];
                    }
                    ?>
                        <form action="update_location.php" method="POST">
                            <input type="hidden" name="location_id" value="<?php echo $row['id']; ?>" />
                            <input type="submit" name="update" value="Update" />
                        </form>
                    </td>
                    <td>
                        
                        <form action="location_admin.php" method="POST">
                            <button class="btn btn-link" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure to delete?')">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </form>
                    </td>
            <?php endforeach; ?>
            </table>
  
