<?php
require_once( '../../../Model/database.php');
require_once( '../../../Model/locations.php');
require_once( '../../../Model/location_db.php');

//delete option
if (isset($_POST['location_id'])) {
    $location_id = $_POST['location_id'];
    LocationDB::deleteLocation($location_id);
    header("Location: location_admin.php");
}
?>

<?php include '../../Shared/_Layout/header-admin.php'; ?>
<!--end top-->


<?php include '../../Shared/_Layout/side-menu.php'; ?>

<!-- The following is for Recipes -->
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.css">  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.js"></script>
<!-- Recipes data tables CDN --> 

    <ol class="breadcrumb">
        <li><a href="../index.php">Admin Panel</a></li>
        <li class="active">Locations List</li>
    </ol>
<div class="row">
    <div class="col-md-12">

        <article>
            <h4 class="page-header">Branch Locations</h4>
            <a href="location_insert.php">Add new branch</a>
        </article>
        <!-- display a table of products -->
        <table id="recipeTB" class="display">   
            <!-- table id="recipe_insert_table"    width="900" -->
            <thead bgcolor="#a8cb81" >                
                <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:18px;">
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
                $locations = LocationDB::getLocations();
                foreach ($locations as $row):
                    ?>
                <ul>
                    <li style="display:inline; float:left; margin-right:8px;"><iframe class="map" width="325" height="250" frameborder="1" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.ca/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $row->getStreet(), $row->getPostal(), $row->getCountry(); ?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $row->getStreet(), $row->getPostal(), $row->getCountry(); ?>&amp;t=m&amp;z=12&amp;output=embed" w></iframe></li>
                </ul>  
                <tr>
                    <td><?php echo $row->getBranch(); ?></td>
                    <td><?php echo $row->getPhone(); ?></td>
                    <td><?php echo $row->getStreet(); ?></td>
                    <td><?php echo $row->getPostal(); ?></td>
                    <td><?php echo $row->getCity(); ?></td>
                    <td><?php echo $row->getProvince(); ?></td>
                    <td><?php echo $row->getCountry(); ?></td>
                    <td>
                        <a class="btn-link" href="location_update.php?id=<?php echo $row->getID(); ?>">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                    <td>
                        <form action="location_admin.php" method="post">
                            <input type="hidden" name="location_id" value="<?php echo $row->getID(); ?>"/>
                            <button class="btn-link" type="submit" value="delete"  onclick="return confirm('Are you sure you want to delete this?');">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>




    <?php include '../../Shared/_Layout/footer-admin.php'; ?>
                
