<?php include PATH_HEADER_ADMIN;  ?>  
<!--end top-->

<h1>Today's Recipe</h1>
<br /><br />                
    <form action="." method="GET">
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
        <input type="hidden" name="action" value="toprecipes_list" />
        <input type="submit" name="submit" value="Submit" />
    </form>                
<br />

<table class="table" >
    <tr>
    <th>Count</th>
    <th>Dish Id</th>
    <th>Dish Name</th>
    <th>Category</th>
    <th>Key</th>
    <th>Number of Serving</th>
    <th>Cook Time</th>
    <th>Display YN</th>
</tr>

<?php

foreach ($toprecipesadminPage as $toprecipe) :
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
?>
    <form action="." method="get" id="update_toprecipes_form">
<?php
    echo "<td>";

    if( $toprecipe->getDispYn() != "N") {
        echo "<input type=checkbox name=disp_yn checked>";
    }else{
        echo "<input type=checkbox name=disp_yn>";
    }
?>
        <input type="hidden" name="action"      value="update_toprecipes" />
        <input type="hidden" name="dish_id"     value="<?php echo $toprecipe->getDishId(); ?>" />
        <input type="hidden" name="category"    value="<?php echo $category_parm; ?>" />
        <input type="hidden" name="pgPage"      value="<?php echo $pgPage; ?>" />
        <input type="submit" value="Update" />
    </form>
<?php
    echo "</td>";
    echo "</tr>";
endforeach;
?>
</table>

<?php

$pgLink = Paginator::pageList($pgSelf, $pgPage, $totCnt, $cntPerPage, $pgLinkCnt, $condition );

include  PATH_FOOTER_ADMIN; 

?>