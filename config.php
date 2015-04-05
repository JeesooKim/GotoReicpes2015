<?php

define('HOST', 'http://localhost' );
define('ROOT_FOLDER', '/GotoReicpes2015');

define("SITEROOT", 'c:/xampp/htdocs/GotoReicpes2015');
define("SERVERROOT", 'http://localhost/GotoReicpes2015');

//***** Content Paths *****//
define('PATH_CSS' , SERVERROOT.'/Content/css');
define('PATH_FONTS', SERVERROOT.'/Content/fonts');
define('PATH_JS', SERVERROOT.'/Content/js');
//define("PATH_UPLOADS", "/Content/uploads");
define('PATH_IMAGES',  SERVERROOT.'/Content/uploads/images');
define('PATH_UPLOADS_IMAGES',  SITEROOT . '/Content/uploads/images');  //SERVERROOT is not working for filesystem
//***** Errors Paths *****//
define("PATH_ERRORS", SERVERROOT."/Errors");

//*****  Model Paths *****//   
//Note: SERVER ROOT is not working but SITEROOT is working ......why?
define("PATH_MODEL",   SITEROOT. "/Model");
define("PATH_DATABASE", SITEROOT. "/Model/database.php");
define("PATH_MODEL_CATEGORY", SITEROOT.  "/Model/category.php");
define("PATH_MODEL_CATEGORY_DB" , SITEROOT. "/Model/category_db.php");
define("PATH_MODEL_IMAGEGALLERY", SITEROOT. "/Model/imagegallery.php");
define("PATH_MODEL_IMAGEGALLERY_DB", SITEROOT. "/Model/imagegallery_db.php");
define("PATH_MODEL_LOCATIONS",  SITEROOT. "/Model/locations.php");
define("PATH_MODEL_LOCATION_DB", SITEROOT. "/Model/location_db.php");
define("PATH_MODEL_TOPRECIPE", SITEROOT. "/Model/toprecipe.php");
define("PATH_MODEL_TOPRECIPE_DB", SITEROOT. "/Model/toprecipe_db.php");
define("PATH_MODEL_IMAGESLIDERS", SITEROOT. "/Model/imagesliders.php");
define("PATH_MODEL_IMAGESLIDER_DB", SITEROOT. "/Model/imageslider_db.php");
define("PATH_MODEL_RECIPE",SITEROOT.  "/Model/recipe.php");
define("PATH_MODEL_RECIPES_DB", SITEROOT. "/Model/recipes_db.php");
define("PATH_MODEL_EVENT",  SITEROOT. "/Model/event.php");
define("PATH_MODEL_EVENTS_DB" , SITEROOT.  "/Model/events_db.php");
define("PATH_MODEL_PAGENATOR", SITEROOT. "/Model/pagenator.php");

//****** View Paths ******//
define("PATH_VIEW", SERVERROOT. "/View");
define("PATH_VIEW_ADMIN", SERVERROOT."/View/Admin");
define("PATH_VIEW_PUBLIC", SERVERROOT."/View/Public");
define("PATH_VIEW_SHARED", SERVERROOT."/View/Shared");

//*** View> Admin ***//
define("PATH_ADMIN_INDEX", PATH_VIEW_ADMIN );
define("PATH_ADMIN_GOOGLEMAP", PATH_VIEW_ADMIN."/GoogleMap_admin" );
define("PATH_ADMIN_IMAGEGALLERY", PATH_VIEW_ADMIN."/Imagegallery_admin");
define("PATH_ADMIN_RECIPES", PATH_VIEW_ADMIN."/recipes_admin");
define("PATH_ADMIN_EVENTS", PATH_VIEW_ADMIN."/Events_admin");
define("PATH_ADMIN_IMAGESLIDER", PATH_VIEW_ADMIN."/Imageslider_admin");
define("PATH_ADMIN_TOPRECIPES", PATH_VIEW_ADMIN. "/Toprecipes_admin");

//*** View> Public ***//
define("PATH_PUBLIC_CONTACT",  PATH_VIEW_PUBLIC ."/ContactUs" );
define("PATH_PUBLIC_IMAGEGALLERY",  PATH_VIEW_PUBLIC ."/ImageGallery");
define("PATH_PUBLIC_RECIPES",  PATH_VIEW_PUBLIC ."/Recipes");
//define("PATH_PUBLIC_IMAGESLIDER", PATH_VIEW_PUBLIC . "/Imageslider");
define("PATH_PUBLIC_IMAGESLIDER", "View/Public/Imageslider");
define("PATH_PUBLIC_EVENTS",  PATH_VIEW_PUBLIC . "/Events");

//*** View> Shared ***//
define("PATH_HEADER",  SITEROOT. "/View/Shared/header.php");  //SERVERROOT is not working
define("PATH_FOOTER",  SITEROOT.  "/View/Shared/footer.php");
define("PATH_HEADER_ADMIN",  SITEROOT. "/View/Shared/header_admin.php");  //SERVERROOT is not working
define("PATH_FOOTER_ADMIN",  SITEROOT.  "/View/Shared/footer_admin.php");

//echo HOST . ROOT_FOLDER . PATH_HEADER . "<br/>";
//echo ROOT. "<br/>";
//echo ROOT.PATH_HEADER . "<br/>";
//echo PATH__PUBLIC_IMAGEGALLERY , "<br/>";
//echo ROOT.PATH_CSS . "<br/>";
//echo ROOT.PATH_JS . "<br/>"; 
//echo "imsges" .  PATH_IMAGES; 
?>
