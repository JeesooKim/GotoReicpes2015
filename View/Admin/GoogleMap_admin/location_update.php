<?php
include('../../../view/shared/header.php');
require('../../../model/database.php');
require('../../../model/locations.php');
require('../../../model/location_db.php');

if(isset($_GET['id'])) {
    $location_id = $_GET['id'];
} else {
    $location_id = $_POST['location_id'];
}
$map_location = LocationDB::getLocation($location_id);
$map_location_branch = $map_location->getBranch();
$map_location_phone = $map_location->getPhone();
$map_location_street = $map_location->getStreet();
$map_location_postal = $map_location->getPostal();
$map_location_city = $map_location->getCity();
$map_location_province = $map_location->getProvince();
$map_location_country = $map_location->getCountry();

if (isset($_POST['location_update'])) {
    $map_location_branch = $_POST['location_branch'];
    $map_location_phone = $_POST['location_phone'];
    $map_location_street = $_POST['location_street'];
    $map_location_postal = $_POST['location_postal'];
    $map_location_city = $_POST['location_city'];
    $map_location_province = $_POST['location_province'];
    $map_location_country = $_POST['location_country'];

    // Validate the entered data
    if ($map_location_branch != '' || $map_location_phone != '' || $map_location_street != '' || $map_location_postal !='' || $map_location_city !='' ||$map_location_province !='' ||$map_location_country !='') {
        $map_location = new Location($map_location_branch, $map_location_phone, $map_location_street, $map_location_postal, $map_location_city, $map_location_province, $map_location_country);

        locationDB::UpdateLocation($map_location, $location_id);

        header("Location: location_admin.php");
    }else{
        echo "Missing fields.";
        die(); 
   }
}
?>

<!--Update form-->
<div>
    <h1>Update Branch Location: <?php echo $map_location_branch; ?></h1>

    <form action="location_update.php" method="POST">
        <input type="hidden" name="location_id" value="<?php echo $location_id; ?>" />
        <div class="form-group">
            <label for="location_branch">Branch</label>
            <input type="text" value="<?php echo $map_location_branch; ?>" class="form-control" name="location_branch">
        </div>
        <div class="form-group">
            <label for="location_phone">Phone</label>
            <input type="text" value="<?php echo $map_location_phone; ?>" class="form-control" name="location_phone">
        </div>
        
        <div class="form-group">
            <label for="location_street">Street</label>
            <input type="text" value="<?php echo $map_location_street; ?>" class="form-control" name="location_street">
        </div>
        
        <div class="form-group">
            <label for="location_postal">Postal</label>
            <input type="text" value="<?php echo $map_location_postal; ?>" class="form-control" name="location_postal">
        </div>
        
        <div class="form-group">
            <label for="location_city">City</label>
            <input type="text" value="<?php echo $map_location_city; ?>" class="form-control" name="location_city">
        </div>
        
        <div class="form-group">
            <label for="location_province">Province</label>
            <input type="text" value="<?php echo $map_location_province; ?>" class="form-control" name="location_province">
        </div>
        
        <div class="form-group">
            <label for="location_country">Country</label>
            <input type="text" value="<?php echo $map_location_country; ?>" class="form-control" name="location_country">
        </div>
        <button type="submit" class="btn btn-primary" name="location_update">Update</button>
        <a class="btn btn-default" href="location_admin.php">Back to list</a>
    </form>
</div>
<!--End of update form-->

<?php
include '../../Shared/footer.php';
?>
         