<?php
#File name: sitemap.php
#File for Sitemap
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class
?>

<?php include "../../../View/Shared/_Layout/header.php";  ?>  
<!--end top-->

<?php
require("../../../Model/database.php");
require("../../../Model/sitemap.php");
require("../../../Model/sitemap_db.php");

?>
<h1>Sitemap</h1>
<br /><br />                
<?php

//Get max manu_level data
$max_level = SitemapDB::getMaxMenuLevel();

$totmenus = array();

for ($menu_level = 0; $menu_level <= $max_level-1; $menu_level++) {
    //Get all menu data from the database
    $totmenus[$menu_level] = SitemapDB::getMenuListByLevel($menu_level+1);
}

echo "<table class=table>";

// Display 1 Level menus
foreach ($totmenus[0] as $menu_1) :
echo "<tr>";
    echo "<td><a href=".$menu_1->getUrl().">". $menu_1->getMenuName() .'</a><br/><br/></td>';
    echo "<td>";

    // Display 2 Level menus
    if($max_level >= 2) {
        echo "<table >";
        foreach ($totmenus[1] as $menu_2) :
            if($menu_1->getId() == $menu_2->getUpperMenu()) {
                echo "<tr>";
                echo "<td><a href=".$menu_2->getUrl().">------------". $menu_2->getMenuName() .'</a><br/><br/></td>';
                echo "<td>";

                // Display 3 Level menus
                if($max_level >= 3) {
                
                    echo "<table >";
                    foreach ($totmenus[2] as $menu_3) :
                        if($menu_2->getId() == $menu_3->getUpperMenu()) {
                            echo "<tr>";
                            echo "<td>---<a href=".$menu_3->getUrl().">------------". $menu_3->getMenuName() .'</a><br/><br/></td>';
                            echo "<td>";
                            // Display 4 Level menus
                            if($max_level >= 4) {
                
                                echo "<table >";
                                foreach ($totmenus[3] as $menu_4) :
                                    if($menu_3->getId() == $menu_4->getUpperMenu()) {
                                        echo "<tr>";
                                        echo "<td>---<a href=".$menu_4->getUrl().">------------". $menu_4->getMenuName() .'</a><br/><br/></td>';
                                        echo "<td>";
                                        // 4 Level
                                        echo "<br/><br/></td>";
                                        echo "</tr>";
                                    }
                                endforeach;
                                echo "</table>";

                            }//if(max_level >= 4) {    

                            echo "<br/><br/></td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "</table>";

                }//if(max_level >= 3) {    

                echo "<br/><br/></td>";
                echo "</tr>";
            }
        endforeach;
        echo "</table>";
    }//if(max_level >= 2) {    
        
    echo "<br/><br/></td>";
echo "</tr>";
endforeach;
echo "</table>";

?>
<?php include "../../../View/Shared/_Layout/footer.php";  ?>  
