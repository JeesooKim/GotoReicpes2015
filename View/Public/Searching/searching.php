<?php  include "c:/xampp/htdocs/GotoReicpes2015-master/config.php";  ?>
<?php
	//Get the link to database
	require_once( PATH_DATABASE);
	
	//Declare variable
	$keyword = $category1 = $category2 = "";
	$ingredient1 = $ingredient2 = $ingredient3 = "";
	$result1 = $result2 = array();
	$result = array();
	
	//Declare test_input function
	function test_input($data) {
   		$data = trim($data);
   		$data = stripslashes($data);
   		$data = htmlspecialchars($data);
   		return $data;
   	}

   	//REQUEST_METHOD from form
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["keyword"]))
			$keyword = test_input($_POST["keyword"]);

		if(isset($_POST["category1"]))
			$category1 = test_input($_POST["category1"]);

		if(isset($_POST["ingredient1"]))
			$ingredient1 = test_input($_POST["ingredient1"]);

		if(isset($_POST["ingredient2"]))
			$ingredient2 = test_input($_POST["ingredient2"]);

		if(isset($_POST["ingredient3"]))
			$ingredient3 = test_input($_POST["ingredient3"]);

		if(isset($_POST["category2"]))
			$category2 = test_input($_POST["category2"]);


		//Fuzzy query by using 'LIKE'
		$query1 = "SELECT * FROM $category1 WHERE recipeName LIKE '%$keyword%'";
		$result1 = $db -> query($query1);

		//Fuzzy query by using 'LIKE'
		$query2 = "SELECT * FROM $category2 WHERE ingredient LIKE '%$ingredient1%' AND 
				   ingredient LIKE '%$ingredient2%' AND 
				   ingredient LIKE '%$ingredient3%'";
		$result2 = $db -> query($query2);
	}

	//Set the result array
	if(!empty($result1))
		$result = $result1;
	else if(!empty($result2))
		$result = $result2;
?>

<?php include PATH_HEADER;  ?>  
<?php include PATH_PUBLIC_IMAGESLIDER. '/imageslider.php'; ?>
<link href="../../../Content/css/searching.css" rel="stylesheet" type="text/css">

		<section id="content">
			<div id="filter">
			<fieldset>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<legend>Filter</legend>
					<label id="main_label">General Searching</label> 
					<br />
					<label>Keyword:</label>
					<input type="text" name="keyword" value="keyword" />
					<br /><br />
					<label>Category:</label>
					<select name="category1">
            			<option value="Breakfast"> Breakfast</option>
            			<option value="Lunch"> Lunch</option>
            			<option value="Dinner"> Dinner</option>
            			<option value="Appetizers"> Appetizers</option>
            			<option value="Beverage"> Beverage</option>
        			</select>
					<br /><br />
					<input id="content_button" type="submit" name="find1" value="Find" />
				</form>

				<br /><br /><br />

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<label id="main_label">Ingredient Searching</label>
					<br />
					<label>Ingredients</label>
					<input type="text" name="ingredient1">
					<br /><br />
					<input type="text" name="ingredient2">
					<br /><br />
					<input type="text" name="ingredient3">
					<br /><br />
					<label>Category:</label>
					<select name="category2">
            			<option value="Breakfast"> Breakfast</option>
            			<option value="Lunch"> Lunch</option>
            			<option value="Dinner"> Dinner</option>
            			<option value="Appetizers"> Appetizers</option>
            			<option value="Beverage"> Beverage</option>
        			</select>
					<br /><br />
					<input id="content_button" type="submit" name="find2" value="Find" />
				</form>
			</fieldset>
			</div>
			<!--end filter-->

			<div id="result">
				<fieldset>
					<legend>Result</legend>
					<table id="table">
						<thead>
							<tr>
								<th>Recipe Name</th>
								<th>Ingredient</th>
								<th>Steps</th>
							</tr>
						</thead>
						<tbody>
							<!-- Display the result -->
							<?php foreach($result as $display) : ?>
							<tr>
								<td><?php echo $display['recipeName']; ?></td>
								<td><?php echo $display['ingredient']; ?></td>
								<td><?php echo $display['recipeStep']; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<!--end result table-->
				</fieldset>
			</div>
			<!--end result-->
		</section>
		<!--end content-->

		<?php include PATH_FOOTER; ?>