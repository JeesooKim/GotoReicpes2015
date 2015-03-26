<?php include ('../../View/Shared/header.php') ?>
<?php
require('../../Model/database.php');
require('../../Model/toprecipe.php');
require('../../Model/toprecipe_db.php');

$category_parm = "";
if(isset($_POST['category'])){
    $category_parm = $_POST['category'];
}

$categories = ToprecipeDB::getRecipeCategory();

?>
<h1>Today's Recipe</h1>
<br /><br />                
    <form action="toprecipes.php" method="post">
        Category : 
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
echo '<table class="table" >';
?>
<tr>
    <th>Count</th>
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
echo "</table>";
?>
<?php include ('../../View/Shared/footer.php') ?>