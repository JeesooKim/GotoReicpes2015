<?php

#FILE name: session.php
#Content: fetches complete informatino of the logged-in user
#Source: www.formget.com/login-form-in-php/
#Referenced on March 18, 2015 by Jeesoo Kim


//********* Database Connection ***************** //
//1. Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("lotus.arvixe.com", "admin_gotorecipe", "recipe");
//2. Selecting Database
$db=mysql_select_db("gotorecipes_db", $connection);
//***********************************************//

session_start();  // Starting session (Start new or resume existing session)
  
//3. Storing Session as being created with a key 'login_user'
$user_check=$_SESSION[ 'login_user'];

//4. SQL Query to Fetch Complete Information of user
$ses_sql=mysql_query("SELECT * FROM users WHERE userName= '$user_check'", $connection);
$row= mysql_fetch_assoc($ses_sql);
//echo "session sql fetched as an associative array: " . $row . "<br/>";
$login_session = $row['userName'];
//$login_ip_add = $row['ip_address'];
//$login_ip_add_hashed= $row['ip_add_hashed'];

//********session time out set  *****************************//
    $timeout = 60*30; // time for session to be out is set 30min
    //if the timeout session variable has been set,
    //see if the number of seconds since the last visit is greater than the timeout period.
    //Or, $now=time();   if($now>$_SESSION['expire']){destroysession} 
    //where $_SESSION['expire']=$_SESSION['start']+10 (this is to be set in login.php)
    $duration = time() - (int) $_SESSION['timeout'];
    if($duration > $timeout){
        
        //destroy the session 
        session_destroy();
        echo "Session Expired<br/>";        
    }  //else{
        //header("Location:profile.php");   ===> this gives an error because this is to redirect to the same page
    //}   
//************************************************************//
    
if(!isset($login_session)){
    mysql_close($connection);   //Closing Connection
    header("location:login_index.php"); //Redirecting to Home page       
}
?>