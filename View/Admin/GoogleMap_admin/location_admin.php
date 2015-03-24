<?php
include '../../header.php';
include '../../Shared/side-column.php';
require('../../Model/location_admin.php');
require('../../Model/location_db.php');

if(isset($_POST['location_id'])){
$location_id = $_POST['location_id'];
locationDB::deleteLocation($location_id);
    header("Location: location_admin.php");
}
?>

<div id="main">
    <article class="placeholder">
        <h4>Contact Locations</h4>
        <a href="location_insert.php" class="btn btn-primary">Insert new branch</a>
    </article>

    <table class="table table-responsive table-striped">
        <thead>
        <tr>
            <th>Branch</th>
            <th>Phone</th>
            <th>Street</th>
            <th>Postal</th>
            <th>City</th>
            <th>Province</th>
            <th>Country</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $locations = locationDB::getLocations();
        foreach ($locations as $row):

            ?>
            <tr>
                <iframe width="325" height="250" frameborder="1" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.ca/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $row->getStreet(),$row->getPostal(),$row->getCountry();?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $row->getStreet(),$row->getPostal(),$row->getCountry();?>&amp;t=m&amp;z=12&amp;output=embed" w></iframe>
            </tr>
            <tr>
                <td><?php echo $row->getBranch(); ?></td>
                <td><?php echo $row->getPhone(); ?></td>
                <td><?php echo $row->getStreet(); ?></td>
                <td><?php echo $row->getPostal(); ?></td>
                <td><?php echo $row->getCity(); ?></td>
                <td><?php echo $row->getProvince(); ?></td>
                <td><?php echo $row->getCountry(); ?></td>
                <td>
                    <a class="btn btn-link" href="location_update.php?id=<?php echo $row->getID(); ?>">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
                <td>
                    <form action="location_admin.php" method="post">
                        <input type="hidden" name="location_id" value="<?php echo $row->getID(); ?>"/>
                        <button class="btn btn-link" type="submit" value="delete">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div><!--End of main-->

<?php
include '../../Shared/footer.php';
?>
                