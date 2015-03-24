<?php
include '../../Shared/header.php';
include '../../Sharedside-column.php';
require('../../Model/location_admin.php');
require('../../Model/location_db.php');

if(isset($_POST['location_insert'])){
    $location_branch = $_POST['location_branch'];
    $location_phone = $_POST['location_phone'];
    $location_street = $_POST['location_street'];
    $location_postal = $_POST['location_postal'];
    $location_city = $_POST['location_city'];
    $location_province = $_POST['location_province'];
    $location_country = $_POST['location_country'];
    

    if($location_branch != ' ' || $location_phone != ' ' || $location_street !=' ' || $location_postal !=' ' || $location_city !=' ' || $location_province !=' ' || $location_country !=' '){
        $map_location = new Location($location_branch, $location_phone, $location_street, $location_postal, $location_city, $location_province, $location_country);
        locationDB::AddLocation($map_location);
        header("Location: location_admin.php");
    }
    else{
        echo  'Missing data fields.';
    }
}
?>

<div id="main">
    <h1>Insert a branch</h1>

    <form action="location_insert.php" method="post">
        <div class="form-group">
            <label for="location_branch">Branch</label>
            <input type="text" class="form-control" name="location_branch">
        </div>

        <div class="form-group">
            <label for="location_phone">Phone</label>
            <textarea class="form-control" name="location_phone"></textarea>
        </div>

        <div class="form-group">
            <label for="location_street">Street</label>
            <input type="text" class="form-control" name="location_street">
        </div>

        <div class="form-group">
            <label for="location_postal">Postal</label>
            <input type="text" class="form-control" name="location_postal">
        </div>

        <div class="form-group">
            <label for="location_city">City</label>
            <input type="text" class="form-control" name="location_city">
        </div>
        
        <div class="form-group">
            <label for="location_province">Province</label>
            <input type="text" class="form-control" name="location_province">
        </div>
        
        <div class="form-group">
            <label for="location_country">Country</label>
            <input type="text" class="form-control" name="location_country">
        </div>

        <button type="submit" class="btn btn-primary" name="location_insert">Insert</button>
        <a class="btn btn-default" href="location_insert.php">Cancel</a>
    </form>
</div><!-- /main -->

<?php
include '../../Shared/footer.php';
?>