<?php include '../../Shared/_Layout/header-admin.php';

?>  

<?php
#File name: sitemap_edit.php
#File for Sitemap_admin
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class
?>

<div id='sidebar'>   
        <?php include '../../Shared/_Layout/side-menu.php';  ?>
    </div><!-- end of #sidebar -->
<div id="main">

    <br/>

    <p><a href="index.php?action=sitemaps_list">View Sitemap List</a></p>
    <hr/>
    <?php
    //Get the error information
    if (isset($_GET['err'])) {
        echo $_GET['err'];
    }
    ?>
    <br/>
    <h2><b>* Required</b></h2>
    <br/>
    <form action="./index.php" method="GET" >         
        <input type="hidden" name="action" value="edit_sitemap" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <table>                
            <tr>
                <td><label>Parent Menu * :</label></td>
                <td> 
                    <select name="upper_menu">
                        <?php foreach ($parent_menus as $parent_menu) : ?>                            
                            <?php
                            if (!strcmp($upper_menu, $parent_menu)) {
                                ?>
                                <option value="<?php echo $parent_menu->getId(); ?>" selected><?php echo $parent_menu->getMenuName(); ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $parent_menu->getId(); ?>"><?php echo $parent_menu->getMenuName(); ?></option>
                                <?php
                            }
                            ?>
<?php endforeach; ?>
                    </select>
                </td>

            </tr>


            <tr>
                <td><label>Menu Name *:</label></td>
                <td> <input type="text" name="menu_name" value="<?php echo $menu_name; ?>" /></td>
            </tr>
            <tr>
                <td><label>URL *:</label></td>
                <td><input type="text" name="url" value="<?php echo $url; ?>" /></td>
            </tr>
            <tr>
                <td><label>Menu Level:</label></td>
            <input type="hidden" name="menu_level" value="<?php echo $menu_level; ?>" />
            <td><?php echo $menu_level; ?></td>
            </tr>

        </table>
        <br/><br/>
        <input type="submit" name="Submit" value="Update Menu" />  
        <br />
    </form>


</div>
<?php include '../../Shared/_Layout/footer-admin.php'; ?>