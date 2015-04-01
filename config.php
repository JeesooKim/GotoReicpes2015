<?php

define('HOST', 'http://localhost' );
define('ROOT_FOLDER','/GotoReicpes2015');

define("SITEROOT", 'c:/xampp/htdocs/GotoReicpes2015');
define("SERVERROOT", 'http://localhost/GotoReicpes2015');

//***** Content Paths *****//
define('PATH_CSS' , SERVERROOT.'/Content/css');
define('PATH_FONTS', SERVERROOT.'/Content/fonts');
define('PATH_JS', SERVERROOT.'/Content/js');
//define("PATH_UPLOADS", "/Content/uploads");
define('PATH_IMAGES',  SERVERROOT.'/Content/uploads/images');

//***** Errors Paths *****//
define("PATH_ERRORS", SERVERROOT."/Errors");

//*****  Model Paths *****//   
//Note: SERVER ROOT is not working but SITEROOT is working ......why?
define("PATH_MODEL",   "/Model");
define("PATH_DATABASE", "/Model/database.php");
define("PATH_MODEL_CATEGORY",  "/Model/category.php");
define("PATH_MODEL_CATEGORY_DB" , "/Model/category_db.php");
define("PATH_MODEL_IMAGEGALLERY", "/Model/imagegallery.php");
define("PATH_MODEL_IMAGEGALLERY_DB", "/Model/imagegallery_db.php");
define("PATH_MODEL_LOCATIONS",  "/Model/locations.php");
define("PATH_MODEL_LOCATION_DB", "/Model/location_db.php");
define("PATH_MODEL_TOPRECIPE", "/Model/toprecipe.php");
define("PATH_MODEL_TOPRECIPE_DB", "/Model/toprecipe_db.php");
define("PATH_MODEL_IMAGESLIDERS", "/Model/imagesliders.php");
define("PATH_MODEL_IMAGESLIDER_DB", "/Model/imageslider_db.php");
define("PATH_MODEL_RECIPE", "/Model/recipe.php");
define("PATH_MODEL_RECIPES_DB", "/Model/recipes_db.php");


//****** View Paths ******//
define("PATH_VIEW", SERVERROOT. "/View");
define("PATH_VIEW_ADMIN", SERVERROOT."/View/Admin");
define("PATH_VIEW_PUBLIC", SERVERROOT."/View/Public");
define("PATH_VIEW_SHARED", SERVERROOT."/View/Shared");

//*** View> Admin ***//
define("PATH_ADMIN_GOOGLEMAP", PATH_VIEW_ADMIN."/GoogleMap_admins" );
define("PATH_ADMIN_IMAGEGALLERY", PATH_VIEW_ADMIN."/Imagegallery_admin");
define("PATH_ADMIN_RECIPES", PATH_VIEW_ADMIN."/recipes_admin");


//*** View> Public ***//
define("PATH_PUBLIC_CONTACT",  PATH_VIEW_PUBLIC ."/ContactUs" );
define("PATH_PUBLIC_IMAGEGALLERY",  PATH_VIEW_PUBLIC ."/ImageGallery");
define("PATH_PUBLIC_RECIPES",  PATH_VIEW_PUBLIC ."/Recipes");
define("PATH_PUBLIC_IMAGESLIDER", PATH_VIEW_PUBLIC . "/Imageslider");

//*** View> Shared ***//
define("PATH_HEADER",  SITEROOT. "/View/Shared/header.php");  //SERVERROOT is not working
define("PATH_FOOTER",  SITEROOT. "/View/Shared/footer.php");

//echo HOST . ROOT_FOLDER . PATH_HEADER . "<br/>";
//echo ROOT. "<br/>";
//echo ROOT.PATH_HEADER . "<br/>";
//echo PATH__PUBLIC_IMAGEGALLERY , "<br/>";
//echo ROOT.PATH_CSS . "<br/>";
//echo ROOT.PATH_JS . "<br/>"; 
//echo "imsges" .  PATH_IMAGES; 
?>
