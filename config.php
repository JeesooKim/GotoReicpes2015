<?php

//define('HOST', 'http://localhost' );

//define("YOUR_FOLDER","/your directory");
//suzieq/PHP/GotoReicpes2015
//define('ROOT_FOLDER','/suzieq/PHP/GotoReicpes2015');
//define('ROOT', HOST . ROOT_FOLDER);
define("SITEROOT", 'c:/xampp/htdocs/suzieq/PHP/GotoReicpes2015');
define("SERVERROOT", 'http://localhost/suzieq/PHP/GotoReicpes2015');

//***** Content Paths *****//
define('PATH_CSS' , '/Content/css');
define('PATH_FONTS', '/Content/fonts');
define('PATH_JS', '/Content/js');
//define("PATH_UPLOADS", "/Content/uploads");
define('PATH_IMAGES','http://localhost/suzieq/PHP/GotoReicpes2015/Content/uploads/images');

//***** Errors Paths *****//
define("PATH_ERRORS", "/Errors");

//*****  Model Paths *****//
define("PATH_MODEL", "/Model");
define("PATH_DATABASE","/Model/database.php");
define("PATH_MODEL_CATEGORY", "/Model/category.php");
define("PATH_MODEL_CATEGORY_DB" , "Model/category_db.php");
define("PATH_MODEL_IMAGEGALLERY", "Model/imagegallery.php");
define("PATH_MODEL_IMAGEGALLERY_DB", "Model/imagegallery_db.php");
define("PATH_MODEL_LOCATION", "Model/location.php");
define("PATH_MODEL_LOCATION_DB", "Model/location_db.php");
define("PATH_MODEL_TOPRECIPE", "Model/toprecipe.php");
define("PATH_MODEL_TOPRECIPE_DB", "Model/toprecipe_db.php");


//****** View Paths ******//
define("PATH_VIEW", "/View");
define("PATH_VIEW_ADMIN", "/View/Admin");
define("PATH_VIEW_PUBLIC", "/View/Public");
define("PATH_VIEW_SHARED", "/View/Shared");

//*** View> Admin ***//
define("PATH_ADMIN_GOOGLEMAP", PATH_VIEW_ADMIN."/GoogleMap_admins" );
define("PATH__ADMIN_IMAGEGALLERY", SERVERROOT. PATH_VIEW_ADMIN."/Imagegallery_admin");


//*** View> Public ***//
define("PATH_PUBLIC_CONTACT", PATH_VIEW_PUBLIC."/ContactUs" );
define("PATH__PUBLIC_IMAGEGALLERY", SERVERROOT. PATH_VIEW_PUBLIC."/ImageGallery");

//*** View> Shared ***//
define("PATH_HEADER", "/View/Shared/header.php");
define("PATH_FOOTER", "/View/Shared/footer.php");

//echo HOST . ROOT_FOLDER . PATH_HEADER . "<br/>";
//echo ROOT. "<br/>";
//echo ROOT.PATH_HEADER . "<br/>";
//echo PATH__PUBLIC_IMAGEGALLERY , "<br/>";
//echo ROOT.PATH_CSS . "<br/>";
//echo ROOT.PATH_JS . "<br/>"; 
//echo "imsges" .  PATH_IMAGES; 
?>