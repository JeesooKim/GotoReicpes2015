<?php
include '../../Shared/_Layout/header-admin.php';
include '../../Shared/_Layout/side-menu.php';
?>  
<!--end top-->
<?php
#File name: sitemap_list.php
#File for Sitemap_admin
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class
?>
<h1>Sitemap Admin</h1>

<br /><br />                
<form action="." method="GET">
    Menu Level : 
    <select name="menu_level">
        <?php
        //Display menu_level list
        foreach ($levels as $row) :

            $level = $row->getLevelId();
            $level_name = $row->getLevelName();

            if (!strcmp("0", $level)) {
                $level_name = "Root";
            }

            if (!strcmp($menu_level, $level)) {
                echo "<option value='$level' selected >$level_name</option>";
            } else {
                echo "<option value='$level'  >$level_name</option>";
            }
        endforeach;
        ?>
    </select>
    <input type="hidden" name="action" value="sitemaps_list" />
    <input type="submit" name="submit" value="Submit" />
</form>                
<br />

<table class="table" >
    <tr>
        <th>Id</th>
        <th>Menu_Level</th>
        <th>Menu_Name</th>
        <th>URL</th>
        <th>Parent_Menu_Id</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>

    <?php
//Display menu list
    foreach ($menus as $menu) :
        echo "<tr>";
        echo "<td>";
        echo $menu->getId();
        echo "</td>";
        echo "<td>";
        echo $menu->getMenuLevel();
        echo "</td>";
        echo "<td>";
        echo $menu->getMenuName();
        echo "</td>";
        echo "<td>";
        echo $menu->getUrl();
        echo "</td>";
        echo "<td>";
        echo $menu->getUpperMenu();
        echo "</td>";
        echo "<td>";
        ?>
        <form action="." method="get" id="update_sitemap_form">
            <input type="hidden" name="action" value="show_edit_form" />
            <input type="hidden" name="id"     value="<?php echo $menu->getId(); ?>" />
            <input type="hidden" name="upper_menu"     value="<?php echo $menu->getId(); ?>" />
            <input type="hidden" name="menu_name"     value="<?php echo $menu->getMenuName(); ?>" />
            <input type="hidden" name="menu_level"  value="<?php echo $menu->getMenuLevel(); ?>" />
            <input type="hidden" name="url"  value="<?php echo $menu->getUrl(); ?>" />
            <input type="hidden" name="parent_menu_level"     value="<?php echo (int) $menu->getMenuLevel() - 1; ?>" />
            <input type="submit" value="Update" />
        </form>

    </td>
    <td>

        <form action="." method="get" id="delete_sitemap_form">
            <input type="hidden" name="action" value="delete_sitemap" />
            <input type="hidden" name="id"     value="<?php echo $menu->getId(); ?>" />
            <input type="hidden" name="menu_level"  value="<?php echo $menu->getMenuLevel(); ?>" />
            <input type="submit" value="Delete" onclick="return confirm('Are you sure to delete?')"/>
        </form>

    </td>
    <td>

        <form action="." method="get" id="insert_sitemap_form">
            <input type="hidden" name="action"      value="show_insert_form" />
            <input type="hidden" name="upper_menu"     value="<?php echo $menu->getId(); ?>" />
            <input type="hidden" name="menu_level"     value="<?php echo $menu->getMenuLevel() + 1; ?>" />
            <input type="hidden" name="parent_menu_level"     value="<?php echo $menu->getMenuLevel(); ?>" />
            <input type="submit" value="Add Child Menu" />
        </form>

    </td>
    </tr>

    <?php
endforeach;
?>
</table>

<?php include '../../Shared/_Layout/footer-admin.php'; ?>
