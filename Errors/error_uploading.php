<?php 

#File name: error_uploading.php
#File for Image Gallery/Recipes
#Team Project: gotorecipes
#Author: Jeesoo Kim
#March 2015
#Reference: Class material -PDO Class

include  PATH_HEADER_ADMIN; 

ini_set('display_errors', 'on');
//error_reporting(E_All);
?>

<div id="main">
    <h1 class="top">Error</h1>
    <p><?php 
    
    echo $error; 
    echo '<br/><br/><a href="index.php">Back to List </a>';   
    
    ?></p>
    
        
</div>
<?php include PATH_FOOTER_ADMIN; ?>