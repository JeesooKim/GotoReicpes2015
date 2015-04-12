    <?php  //include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>
<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>
<?php  //include "C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015/config.php";  ?>

<?php include PATH_HEADER;  ?>  
<!--end top-->

<?php
require(PATH_DATABASE);
require(PATH_MODEL_SITEMAP);
require(PATH_MODEL_SITEMAP_DB);

?>
<h1>Sitemap</h1>
<br /><br />                
<?php

$max_level = SitemapDB::getMaxMenuLevel();

$totmenus = array();

for ($menu_level = 0; $menu_level <= $max_level-1; $menu_level++) {

    $totmenus[$menu_level] = SitemapDB::getMenuListByLevel($menu_level+1);
}

echo "<table>";

// 1 Level
foreach ($totmenus[0] as $menu_1) :
echo "<tr>";
    echo "<td><a href=".$menu_1->getUrl().">". $menu_1->getMenuName() .'</a></td>';
    echo "<td>";

    // 2 Level
    if($max_level >= 2) {
        echo "<table>";
        foreach ($totmenus[1] as $menu_2) :
            if($menu_1->getId() == $menu_2->getUpperMenu()) {
                echo "<tr>";
                echo "<td><a href=".$menu_2->getUrl().">". $menu_2->getMenuName() .'</a></td>';
                echo "<td>";

                // 3 Level
                if($max_level >= 3) {
                
                    echo "<table>";
                    foreach ($totmenus[2] as $menu_3) :
                        if($menu_2->getId() == $menu_3->getUpperMenu()) {
                            echo "<tr>";
                            echo "<td><a href=".$menu_3->getUrl().">". $menu_3->getMenuName() .'</a></td>';
                            echo "<td>";
                            // 4 Level
                            if($max_level >= 4) {
                
                                echo "<table>";
                                foreach ($totmenus[3] as $menu_4) :
                                    if($menu_3->getId() == $menu_4->getUpperMenu()) {
                                        echo "<tr>";
                                        echo "<td><a href=".$menu_4->getUrl().">". $menu_4->getMenuName() .'</a></td>';
                                        echo "<td>";
                                        // 4 Level
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                endforeach;
                                echo "</table>";

                            }//if(max_level >= 4) {    

                            echo "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "</table>";

                }//if(max_level >= 3) {    

                echo "</td>";
                echo "</tr>";
            }
        endforeach;
        echo "</table>";
    }//if(max_level >= 2) {    
        
    echo "</td>";
echo "</tr>";
endforeach;
echo "</table>";

?>
<?php include PATH_FOOTER; ?>
