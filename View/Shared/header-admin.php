<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to GoToRecipes-ADMIN</title>
        <!--[if lt IE 9]>
              <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
              <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->        

        <link href="../../Content/css/admin-css.css" rel="stylesheet" />
        <link href="../../Content/css/bootstrap.css" rel="stylesheet" />
        <link href="../../Content/css/reset.css" rel="stylesheet" type="text/css" /><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../../Content/js/bootstrap.min.js"></script>                    

        <!-- The following is for Image Gallery -->                    
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/bootstrap-image-gallery.css"> 
        <!-- Bootstrap JS is not required, but included for the responsive demo navigation and button states -->                    
        <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
        <script src="//blueimp.github.io/Gallery/js/blueimp-gallery.min.js"></script>
        <script src="//blueimp.github.io/Gallery/js/bootstrap-image-gallery.js"></script>
        <script src="../../Content/js/bootstrap-image-gallery.js"></script>
        <!-- Image Gallery CDN-->

        <!-- The following is for tables in admin view -->
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.css">  
        <!-- jQuery -->
        <script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>  
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.js"></script>
        <!-- Recipes data tables CDN -->  
    </head> 
    <body>
        <header>
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="../../View/Admin/index.php">                     
                            <img id="logo" src="../../Content/uploads/images/logo.jpg"; ?>" alt="gotorecipes" title="Homepage" /></a>
                    </div><!-- end of "navbar-header-->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right"> 
                            <div id="profile" style="color: white;">
<!--                                <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b> -->
                                <br/>
                                <b id="logout"><a href="../../View/Admin/logout.php">Log Out</a></b>
                            </div>

<!--
                            <li><a href="../../View/Admin/register.php">Register</a></li>
                            <li><a href="../../View/Admin/login.php">Login</a></li>                                -->
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
        <!--end top-->
        <div id="wrapper" class="active">
            <!-- Page content -->
            <div id="page-content-wrapper">
                <!-- Keep all page content within the page-content inset div! -->
                <div class="page-content inset">
