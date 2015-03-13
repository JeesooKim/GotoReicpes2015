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
	<link href="../../Content/css/bootstrap.css" rel="stylesheet">
	<link href="../../Content/css/style.css" rel="stylesheet" type="text/css">
	<link href="../../Content/css/reset.css" rel="stylesheet" type="text/css">
	
</head>

<body>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../Content/js/bootstrap.min.js"></script>

	<div id="container">
		<?php include ('../../View/Shared/header.php') ?>
		<!--end top-->

		<?php include ('../../View/Public/imageslider.php') ?>
		<!--end imageslider feature-->

<!-- <ol class="breadcrumb">
				<li><a href="#">Home</a></li>
			</ol> --> <!--breadcrumb sitemap-->


			<div id="content-recipes">

			<div class="left-row">
				<h1 class="h1-title">Recipes</h1>
				<div class="col-sm-6 col-md-4">
					<a href="#"><div class="thumbnail">
						<img src="../../Content/uploads/images/prawnmango.jpg" class="img-responsive" alt="Appetizers">
						<div class="caption">
						<h3>Breakfast</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<p><a href="#" class="btn btn-primary" role="button">View</a></p>
						</div>
					</div></a>
				</div>

				<div class="col-sm-6 col-md-4">
					<a href="#"><div class="thumbnail">
					  <img src="../../Content/uploads/images/prawnmango.jpg" class="img-responsive" alt="Quick Meals">
						<div class="caption">
						<h3>Pastry</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<p><a href="#" class="btn btn-primary" role="button">View</a></p>
						</div>
					</div></a>
				</div>

				<div class="col-sm-6 col-md-4">
					<a href="#"><div class="thumbnail">
					  <img src="../../Content/uploads/images/prawnmango.jpg" class="img-responsive" alt="Pastry">
						<div class="caption">
						<h3>Lunch</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<p><a href="#" class="btn btn-primary" role="button">View</a></p>
						</div>
					</div></a>
				</div>

				<div class="col-sm-6 col-md-4">
					<a href="#"><div class="thumbnail">
					  <img src="../../Content/uploads/images/prawnmango.jpg" class="img-responsive" alt="Pastry">
						<div class="caption">
						<h3>Dinner</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<p><a href="#" class="btn btn-primary" role="button">View</a></p>
						</div>
					</div></a>
				</div>

				<div class="col-sm-6 col-md-4">
					<a href="#"><div class="thumbnail">
					  <img src="../../Content/uploads/images/prawnmango.jpg" class="img-responsive" alt="Pastry">
						<div class="caption">
						<h3>Beverages</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<p><a href="#" class="btn btn-primary" role="button">View</a></p>
						</div>
					</div></a>
				</div>

			</div>

			<div id="right-row">
				<h1 class="h1-title">Events</h1>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

			</div>

			</div> <!--/end recipes-->
		</section>
		<!--end content-->

		<?php include ('../../View/Shared/footer.php') ?>
	</div> <!--end container-->
</body>
</html>