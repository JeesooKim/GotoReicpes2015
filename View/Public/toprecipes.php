<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>

<?php include SITEROOT. PATH_HEADER;  ?>  
<!--end top-->

<?php
require(SITEROOT.PATH_DATABASE);
require(SITEROOT.PATH_MODEL_TOPRECIPE);
require(SITEROOT.PATH_MODEL_TOPRECIPE_DB);

require(SITEROOT.PATH_MODEL.'/category.php');
require(SITEROOT.PATH_MODEL.'/pagenator.php');

$pgSelf = "toprecipes.php";
$cntPerPage = 5;
$pgLinkCnt = 5;

if(isset($_GET['pgPage'])){
    $pgPage = $_GET['pgPage'];
}else{
    $pgPage = 1;
}

$category_parm = "";
$condition = "";
if(isset($_GET['category'])){
    $category_parm = $_GET['category'];
    $condition = "&category=".$category_parm;
}

$categories = ToprecipeDB::getRecipeCategory();

?>
<h1>Today's Recipe</h1>
<br /><br />                
    <form action="toprecipes.php" method="GET">
        Category : 
        <select name="category">
        <?php 
        echo "<option value='' >All</option>";
        foreach ($categories as $category) : 
           
            $catId = $category->getCatID();
            $catName = $category->getCatName();
            
            if( !strcmp($category_parm, $catId)){
                echo "<option value='$catId' selected >$catName</option>";
            }else{
                echo "<option value='$catId'  >$catName</option>";
            }
        endforeach;
        ?>
        </select>

        <input type="submit" name="submit" value="Submit" />
    </form>                

<?php

$totCnt = ToprecipeDB::getTotCount($category_parm);
$toprecipesPage = ToprecipeDB::getPageTopRecipeByCategory($category_parm, $cntPerPage, $pgPage);


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

foreach ($toprecipesPage as $toprecipe) :
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

$pgLink = Paginator::pageList($pgSelf, $pgPage, $totCnt, $cntPerPage, $pgLinkCnt, $condition );
?>
<?php include SITEROOT. PATH_FOOTER; ?>
