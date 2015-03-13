<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Website Admin</title>
	
	<link rel="stylesheet" href="../../Content/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="../../Content/js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="../../Content/js/hideshow.js" type="text/javascript"></script>
	<script src="../../Content/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../../Content/js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
</head>

<body>
	<header id="header">
		<hgroup>
			<a href="../../View/Public/index.php"><img id="logo" src="../../Content/uploads/images/logo.jpg" /></a>
			<h1 class="site_title">
				<a href="../../View/Admin/index.php">Website Admin For GotoRecipe</a>
			</h1>
		</hgroup>
	</header> 
	<!-- end header -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Administrator</p>
		</div>
	</section>
	<!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Database</h3>
		<ul class="toggle">
			<li class="table1"><a href="#">table1</a></li>
			<li class="table2"><a href="#">table2</a></li>
			<li class="table3"><a href="#">table3</a></li>
			<li class="table4"><a href="#">table4</a></li>
		</ul>
		<h3>Users</h3>
		<ul class="toggle">
			<li class="add_users"><a href="#">Add New User</a></li>
			<li class="update_users"><a href="#">Update Users</a></li>
			<li class="delete_users"><a href="#">Delete Users</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="change_pwd"><a href="#">Change Password</a></li>
			<li class="logout"><a href="../../View/Public/index.php">Logout</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright © 2015 GotoRecipe Website Admin</strong></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<h4 class="alert_info">Welcome to use Content Management System for GotoRecipe</h4>
		
		<article class="module width_full">
			<header><h3>Table</h3></header>
			<table border="1" cellspacing="0">
			<thead>	
				<tr>
					<th>Action</th>
					<th>Column1</th>
					<th>Column2</th>
					<th>Column3</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><input type="checkbox"></td>
					<td>Some text1</td>
					<td>Some text1</td>
					<td>Some text1</td>
				</tr>

				<tr>
					<td><input type="checkbox"></td>
					<td>Some text2</td>
					<td>Some text2</td>
					<td>Some text2</td>
				</tr>

				<tr>
					<td><input type="checkbox"></td>
					<td>Some text3</td>
					<td>Some text3</td>
					<td>Some text3</td>
				</tr>

				<tr>
					<td><input type="checkbox"></td>
					<td>Some text4</td>
					<td>Some text4</td>
					<td>Some text4</td>
				</tr>
			</tbody>
			</table>

			<footer>
				<div class="submit_link">
					<input type="submit" value="Create New Record" class="alt_btn">
					<input type="submit" value="Update">
					<input type="submit" value="Delete">
				</div>
			</footer>

		</article>
		<!-- end module width_full -->
		
		<div class="clear"></div>
		
		<div class="spacer"></div>
	</section>
</body>
</html>