<?php  //include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>
<?php  include "C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015/config.php";  ?>


<?php
require_once( PATH_DATABASE);  
require(PATH_MODEL_IMAGESLIDERS);
require(PATH_MODEL_IMAGESLIDER_DB);

//delete option
if(isset($_POST['image_id'])){
$img_id = $_POST['image_id'];
ImagesliderDB::deleteImageslider($img_id);
    header("Location: imageslider_admin.php");
}
?>

<?php include PATH_HEADER_ADMIN;    ?>
<!--end top-->

<div id="main">
    <ol class="breadcrumb">
        <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/index.php">Admin Panel</a></li>        
        <li class="active">Imageslider</li>
    </ol>

    <article>
        <a href="imageslider_insert.php">Add new image</a>
    </article>

    <!-- The following is for Recipes -->
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.css">  
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>  
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.js"></script>
    <!-- Recipes data tables CDN --> 
    
    <script>
        $(document).ready( function () { 
            $('#recipeTB').DataTable();}
                );
            </script>
    
    
    <!--div id="content">
        <!-- display a table of products -->
        <table id="recipeTB" class="display">   
        <!-- table id="recipe_insert_table"    width="900" -->
            <thead bgcolor="#a8cb81" >                
                <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:18px;">
                    <th>Name</th>
                    <th>Image</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        <tbody>
        <?php
        $imagesliders = ImagesliderDB::getImagesliders();
        foreach ($imagesliders as $row):
            ?>
            <tr>
                <td><?php echo $row->getName(); ?></td>
                <td width="500px"><?php echo "<img style='width: 300px;' src='". SERVERROOT . '/Content/uploads/images/imageslider/' . $row->getPath()."' />" ?></td>
                <td>
                    <a class="btn-link" href="imageslider_update.php?image_id=<?php echo $row->getImageID(); ?>">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
                <td>
                    <form action="imageslider_admin.php" method="post">
                        <input type="hidden" name="image_id" value="<?php echo $row->getImageID(); ?>"/>
                        <button class="btn-link" type="submit" value="delete"  onclick="return confirm('Are you sure you want to delete this?');">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div><!--End of main-->

<?php
    include PATH_FOOTER_ADMIN;   
?>
                
