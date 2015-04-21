<?php
/******STRICTLY SERVER ONLY*************/
define( 'ROOT_DIR', dirname(__FILE__) );

/***************************************************/
//define('HOST', 'http://localhost' );
//define('ROOT_FOLDER', 'GotorecipesGITHUB/GotoReicpes2015');
//define('ROOT_FOLDER', 'GotoReicpes2015');

//define("SITEROOT", 'C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015');
//define("SERVERROOT", 'http://localhost/GotorecipesGITHUB/GotoReicpes2015');
//define("SITEROOT", 'C:/xampp/htdocs/GotoReicpes2015');
//define("SERVERROOT", 'http://localhost/GotoReicpes2015');

//***** Content Paths *****//
define('PATH_CSS' , ROOT_DIR.'/Content/css');
define('PATH_FONTS', ROOT_DIR.'/Content/fonts');
define('PATH_JS', ROOT_DIR.'/Content/js');
define('PATH_RSLIDER', ROOT_DIR.'/Content/js');
define('PATH_CKEDITOR', ROOT_DIR.'/Content/ckeditor');
//define("PATH_UPLOADS", "/Content/uploads");
define('PATH_IMAGES',  ROOT_DIR.'/Content/uploads/images');
define('PATH_IMAGES_IMAGESLIDER',  ROOT_DIR.'/Content/uploads/images/imageslider');
define('PATH_UPLOADS_IMAGES',  ROOT_DIR . '/Content/uploads/images');  //SERVERROOT is not working for filesystem

//***** Errors Paths *****//
define("PATH_ERRORS", ROOT_DIR."/Errors");

//*****  Model Paths *****//   
//Note: SERVER ROOT is not working but SITEROOT is working ......why?
define("PATH_MODEL",   ROOT_DIR. "/Model");
define("PATH_DATABASE", ROOT_DIR. "/Model/database.php");
define("PATH_MODEL_CATEGORY", ROOT_DIR.  "/Model/category.php");
define("PATH_MODEL_CATEGORY_DB" , ROOT_DIR. "/Model/category_db.php");
define("PATH_MODEL_FAQS", ROOT_DIR.  "/Model/faqs.php");
define("PATH_MODEL_FAQ_DB" , ROOT_DIR. "/Model/faq_db.php");
define("PATH_MODEL_IMAGEGALLERY", ROOT_DIR. "/Model/imagegallery.php");
define("PATH_MODEL_IMAGEGALLERY_DB", ROOT_DIR. "/Model/imagegallery_db.php");
define("PATH_MODEL_LOCATIONS",  ROOT_DIR. "/Model/locations.php");
define("PATH_MODEL_LOCATION_DB", ROOT_DIR. "/Model/location_db.php");
define("PATH_MODEL_REVIEWS",  ROOT_DIR. "/Model/reviews.php");
define("PATH_MODEL_REVIEWS_DB", ROOT_DIR. "/Model/reviews_db.php");
define("PATH_MODEL_TOPRECIPE", ROOT_DIR. "/Model/toprecipe.php");
define("PATH_MODEL_TOPRECIPE_DB", ROOT_DIR. "/Model/toprecipe_db.php");
define("PATH_MODEL_IMAGESLIDERS", ROOT_DIR. "/Model/imagesliders.php");
define("PATH_MODEL_IMAGESLIDER_DB", ROOT_DIR. "/Model/imageslider_db.php");
define("PATH_MODEL_RECIPE",ROOT_DIR.  "/Model/recipe.php");
define("PATH_MODEL_RECIPES_DB", ROOT_DIR. "/Model/recipes_db.php");
define("PATH_MODEL_EVENT",  ROOT_DIR. "/Model/event.php");
define("PATH_MODEL_EVENTS_DB" , ROOT_DIR.  "/Model/events_db.php");
define("PATH_MODEL_VOLUNTEER",  ROOT_DIR. "/Model/volunteer.php");
define("PATH_MODEL_VOLUNTEER_DB" , ROOT_DIR.  "/Model/volunteer_db.php");
define("PATH_MODEL_SITEMAP", ROOT_DIR. "/Model/sitemap.php");
define("PATH_MODEL_SITEMAP_DB", ROOT_DIR. "/Model/sitemap_db.php");
define("PATH_MODEL_PAGENATOR", ROOT_DIR. "/Model/pagenator.php");

//****** View Paths ******//
define("PATH_VIEW", ROOT_DIR. "/View");
define("PATH_VIEW_ADMIN", ROOT_DIR."/View/Admin");
define("PATH_VIEW_PUBLIC", ROOT_DIR."/View/Public");
define("PATH_VIEW_SHARED", ROOT_DIR."/View/Shared");

//*** View> Admin ***//
define("PATH_ADMIN_INDEX", PATH_VIEW_ADMIN );
define("PATH_ADMIN_GOOGLEMAP", PATH_VIEW_ADMIN."/GoogleMap_admin" );
define("PATH_ADMIN_IMAGEGALLERY", PATH_VIEW_ADMIN."/Imagegallery_admin");
define("PATH_ADMIN_RECIPES", PATH_VIEW_ADMIN."/recipes_admin");
define("PATH_ADMIN_EVENTS", PATH_VIEW_ADMIN."/Events_admin");
define("PATH_ADMIN_IMAGESLIDER", PATH_VIEW_ADMIN."/Imageslider_admin");
define("PATH_ADMIN_FAQ", PATH_VIEW_ADMIN. "/faq_admin");
define("PATH_ADMIN_TOPRECIPES", PATH_VIEW_ADMIN. "/Toprecipes_admin");
define("PATH_ADMIN_VOLUNTEER", PATH_VIEW_ADMIN. "/Volunteer_admin");
define("PATH_ADMIN_SITEMAP", PATH_VIEW_ADMIN. "/Sitemap_admin");

//*** View> Public ***//
define("PATH_PUBLIC_INDEX",  ROOT_DIR ."~/index.php" );
define("PATH_PUBLIC_FAQ",  PATH_VIEW_PUBLIC ."/FAQ" );
define("PATH_PUBLIC_CONTACT",  PATH_VIEW_PUBLIC ."/ContactUs" );
define("PATH_PUBLIC_IMAGEGALLERY",  PATH_VIEW_PUBLIC ."/ImageGallery");
define("PATH_PUBLIC_RECIPES",  PATH_VIEW_PUBLIC ."/Recipes");
//define("PATH_PUBLIC_IMAGESLIDER", PATH_VIEW_PUBLIC . "/Imageslider");
define("PATH_PUBLIC_IMAGESLIDER", "View/Public/Imageslider");
define("PATH_PUBLIC_EVENTS",  PATH_VIEW_PUBLIC . "/Events");
define("PATH_PUBLIC_TOPRECIPES",  PATH_VIEW_PUBLIC ."/Toprecipes");
define("PATH_PUBLIC_VOLUNTEER",  PATH_VIEW_PUBLIC ."/Volunteer");
define("PATH_PUBLIC_SITEMAP",  PATH_VIEW_PUBLIC ."/Sitemap");

//*** View> Shared ***//
define("PATH_HEADER",  ROOT_DIR. "/View/Shared/header.php");  //SERVERROOT is not working
define("PATH_FOOTER",  ROOT_DIR.  "/View/Shared/footer.php");
define("PATH_SIDEMENU",  ROOT_DIR. "/View/Shared/side-menu.php");
define("PATH_HEADER_ADMIN",  ROOT_DIR. "/View/Shared/header-admin.php");  //SERVERROOT is not working
define("PATH_FOOTER_ADMIN",  ROOT_DIR. "/View/Shared/footer-admin.php");

//*** Volunteer ***//
define("PATH_HEADER_IFRAME",  "./ref/header-iframe.php");  //SERVERROOT is not working
define("PATH_FOOTER_IFRAME",  "./ref/footer-iframe.php");
define("PATH_HEADER_IFRAME_ADMIN",  "./ref/header-admin-iframe.php");  //SERVERROOT is not working
define("PATH_FOOTER_IFRAME_ADMIN",  "./ref/footer-admin-iframe.php");

?>
