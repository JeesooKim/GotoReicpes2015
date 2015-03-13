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

		<h2><span class="fontawesome-lock"></span>User Login</h2>

		<form action="../../View/Admin/index.php" method="POST">

			<fieldset>

				<p><label for="username">Username</label></p>
				<p><input type="username" id="username" value="username" onBlur="if(this.value=='')this.value='username'" onFocus="if(this.value=='username')this.value=''"></p> 

				<p><label for="password">Password</label></p>
				<p><input type="password" id="password" value="password" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p> 

				<p><input type="submit" value="Log In"></p>
				<p><a href="../../View/Admin/index.php">Return</a></p>

			</fieldset>

		</form>

		<?php include ('../../View/Shared/footer.php') ?>
	</div> <!--end container-->
</body>
</html>