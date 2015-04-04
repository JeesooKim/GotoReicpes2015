<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>

<?php include SITEROOT.PATH_HEADER;  ?>  
<!--end top-->

<?php
require_once( SITEROOT. PATH_DATABASE);   //SERVER ROOT is not working but SITEROOT is working ......why?
require_once( SITEROOT. PATH_MODEL_EVENT);
require_once( SITEROOT. PATH_MODEL_EVENTS_DB);

#File name: index.php
#File for Events-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created : April 2, 2015
#Modified: 
#Reference: Class material -PDO Class

//connect to db
//bring data here
//display the data


echo "<br/> events admin index page <br/>";
?>


<!-- END of FILE events_view-->
<!-- START of footer -->
<?php include SITEROOT.PATH_FOOTER; ?>
