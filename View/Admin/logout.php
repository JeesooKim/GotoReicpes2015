<?php

#FILE name: logout.php
#Content: to destroy all the sessions and redirecting to home page
#Source: www.formget.com/login-form-in-php/
#Referenced on March 18, 2015 by Jeesoo Kim


session_start();  //Start new or resume existing session

if(session_destroy()){  // Destroying All Sessions
    
    //How does PHP know if session_destroy() is triggered?
    
    header('Location: logout_display.php'); //Redirecting to Home page
}
?>