<?php

#FILE name: login.php
#Content: login scripts in which PHP session is initialized
#Source: www.formget.com/login-form-in-php/
#Ref: www.php-mysql-tutorial.com/wikis/php-tutorial/user-aithentication-with-image-verification.aspx
#Ref: stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
#Referenced on March 18, 2015 by Jeesoo Kim

//include 'database.php';

session_start(); //Starting Session(Start new or resume existing session)
$error=''; //Variable To Store Error Mesage

if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        $error ="Username or Password is invalid";
    } else //if username and password inputs are not null, do the following
            {
        
             //Image Authenticaion added
             //firstly check if the number submitted is correct
             $number = $_POST['imgNumber'];
             
             if(md5($number) == $_SESSION['image_random_value']){
                 //if the hashed input(number) from image matches with the session value generated from randomimage.php file,
                 //do the following
                 
                    //Define $username and $password
                   $username =$_POST['username'];
                   $password=$_POST['password'];
                   //To protect MySQL injection for Security purpose
                   $username =stripslashes($username);   //stripslashes(): Un-quotes a quoted string.
                   $password=stripslashes($password);
//                   $username= mysql_real_escape_string($username); //Escapes special characters in a string for use in an SQL statement
//                   $password=  mysql_real_escape_string($password);//Returns an escaped string. 

                   
                   //******* call and bring the user info from db*************//
                   //Establishing Connection with Server by passing server_name, user_id and password as a parameter
                   $connection = mysql_connect("lotus.arvixe.com", "admin_gotorecipe", "recipe");
                                      
                   //Selecting Database
                   $db=mysql_select_db("gotorecipes_db", $connection);  
                   //$dbCon=Database::GetDB();
                   
                   //Record the ip address the information is coming from (2) 
                   //$ip_add= $_SERVER['REMOTE_ADDR'];                   
                   //$query="UPDATE users SET ip_address='$ip_add' WHERE username='$username'";
                   //$dbCon->query($query);
                   //mysql_query("UPDATE users SET ip_address='$ip_add' WHERE userName='$username'", $connection); 
                   
                    //make hashes of the ip address
                   //$ip_add_hashed = md5( $_SERVER['REMOTE_ADDR'] );
                   
                   //$query2="UPDATE users SET ip_add_hashed='$ip_add_hashed' WHERE username='$username'";
                   //$dbCon->query($query2);
                   //mysql_query("UPDATE users SET ip_add_hashed='$ip_add_hashed' WHERE userName='$username'", $connection); 
                   //*********************************************************//
                    

                   //SQL query to fetch information of registered users and finds user match.
                   $query = mysql_query("SELECT * FROM users WHERE password = '$password' AND userName='$username'", $connection);
                   $rows = mysql_num_rows($query);
                   
                   if($rows ==1){
                       //the username and password match, then set the session as follows
                       $_SESSION['login_user'] = $username;   //this sets variables in the session with the value $username, i.e.initializing Session

                       //image auth session set
                       $_SESSION['image_auth_login'] = true;

                       //remove the random value from session
                       $_SESSION['image_random_value']='';
                       
                       //Session time out (3)
                       //Ref: stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
                       //store the last time the user made a request                        
                        $_SESSION['timeout']= time(); //taking now logged in time
                        //$_SESSION['expire'] = $_SESSION['start']+10;  //10 seconds timeout
                      
                        header("location: index.php");
                      //header("location: profile.php") ; // Redirecting to other page
                      exit;
                   }
                   else{
                       $error= "Username or Password is invalid";
                   }

                   mysql_close($connection); //Close connection    
             }
             else{
                $error= " Wrong Number. Please try again";
              }
            }//end of first else
 }//end of if isset['submit']
?>