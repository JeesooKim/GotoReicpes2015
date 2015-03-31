<?php  include "c:/xampp/htdocs/suzieq/PHP/GotoReicpes2015/config.php";  ?>

<?php include PATH_HEADER;  ?>  
<!--end top-->

<?php
require(PATH_DATABASE);
require(PATH_MODEL_TOPRECIPE);
require(PATH_MODEL_TOPRECIPE_DB);

$category_parm = "";
if(isset($_POST['category'])){
    $category_parm = $_POST['category'];
}

$categories = ToprecipeDB::getRecipeCategory();

?>


Today's Recipe
                
    <form action="toprecipes.php" method="post">
        <select name="category">
        <?php 
        echo "<option value='' >All</option>";
        foreach ($categories as $category) : 
            
            if( !strcmp($category_parm, $category)){
                echo "<option value='$category' selected >$category</option>";
            }else{
                echo "<option value='$category'  >$category</option>";
            }
        endforeach;
        ?>
        </select>

        <input type="submit" name="submit" value="Submit" />
    </form>                

<?php

$toprecipes = ToprecipeDB::getTopRecipeByCategory($category_parm);


echo "<br />";
echo '<table border="1">';
?>
<tr>
    <th>count</th>
    <th>Dish Id</th>
    <th>Dish Name</th>
    <th>Category</th>
    <th>Key</th>
    <th>Number of Serving</th>
    <th>Cook Time</th>
</tr>

<?php

foreach ($toprecipes as $toprecipe) :
    echo "<tr>";
    echo "<td>";
    echo $toprecipe->getCnt();
    echo "</td>";
    echo "<td>";
    echo $toprecipe->getDishId();
    echo "</td>";
    echo "<td>";
    echo $toprecipe->getDishName();
    echo "</td>";
    echo "<td>";
    echo $toprecipe->getDishCat();
    echo "</td>";
    echo "<td>";
    echo $toprecipe->getDishKey();
    echo "</td>";
    echo "<td>";
    echo $toprecipe->getDishNumServing();
    echo "</td>";
    echo "<td>";
    echo $toprecipe->getDishCookTime();
    echo "</td>";
    echo "</tr>";
endforeach;

?>
<?php include  PATH_FOOTER; ?>