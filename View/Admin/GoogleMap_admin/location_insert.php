<?php
require_once( '../../../Model/database.php');
require_once( '../../../Model/locations.php');
require_once( '../../../Model/location_db.php');

$error="";

if(isset($_POST['location_insert'])){
    $location_branch = $_POST['location_branch'];
    $location_phone = $_POST['location_phone'];
    $location_street = $_POST['location_street'];
    $location_postal = $_POST['location_postal'];
    $location_city = $_POST['location_city'];
    $location_province = $_POST['location_province'];
    $location_country = $_POST['location_country'];
    
    //validation for text fields
    $pattern_postal = "/^[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} *\d{1}[A-Z]{1}\d{1}$/";
    $pattern_phone = "/^[0-9]{8, 12}$/";
    if(!preg_match($pattern_postal,$location_postal)){
        $error .= "Please enter valid Canadian postal code <br />";
    }
    if(!preg_match($pattern_phone,$location_phone )){
        $error .= "Please enter phone with number only <br />";
    }
    
    else{
            if($location_branch != ' ' || $location_phone != ' ' || $location_street !=' ' || $location_postal !=' ' || $location_city !=' ' || $location_province !=' ' || $location_country !=' '){
                $map_location = new Location($location_branch, $location_phone, $location_street, $location_postal, $location_city, $location_province, $location_country);
                LocationDB::AddLocation($map_location);
                header("Location: location_admin.php");
            }
            else{
                echo  'Missing data fields.';
                exit();
            }
        }
    }

?>

<?php include '../../Shared/_Layout/header-admin.php';    ?>
<!--end top-->


    <?php include '../../Shared/_Layout/side-menu.php';    ?>

    <div class="row">
                <div class="col-md-12">
        <h1 class="page-header">Insert a branch</h1>

        <?php
        //display error from validation
         echo "<h3 style='color:red;'>" . $error . "</h3>";
        ?>

    <form action="location_insert.php" method="post">
        <div class="form-group">
            <label for="location_branch">Branch</label>
            <input type="text" class="form-control" name="location_branch">
        </div>

        <div class="form-group">
            <label for="location_phone">Phone</label>
            <input type="text" class="form-control" name="location_phone">
            <p class="help-block">Ex. 416-123-4567</p>
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

        <button type="submit" class="btn btn-primary" name="location_insert">Submit</button>
        <a class="btn btn-default" href="location_admin.php">Back to list</a>
    </form>
            </div>


<?php include '../../Shared/_Layout/footer-admin.php'; ?>
