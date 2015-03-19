<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome to GoToRecipes</title>
	<!--[if lt IE 9]>
	      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<link href="../../../Content/css/bootstrap.css" rel="stylesheet">
	<link href="../../../Content/css/style.css" rel="stylesheet" type="text/css">
	<link href="../../../Content/css/reset.css" rel="stylesheet" type="text/css">
	
</head>

<body>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../Content/js/bootstrap.min.js"></script>

	<div id="container">
		<?php include ('../../../View/Shared/header.php') ?>
		<!--end top-->
<?php
require('../../../Model/database.php');
require('../../../Model/toprecipe.php');
require('../../../Model/toprecipe_db.php');

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
                <?php include ('../../../View/Shared/footer.php') ?>
	</div> <!--end container-->
</body>
</html>