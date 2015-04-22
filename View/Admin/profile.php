<?php
#FILE name: profile.php
#Content: the redirected page on successful login
#Source: www.formget.com/login-form-in-php/
#Referenced on March 18, 2015 by Jeesoo Kim

include('session.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Success</title>            
    </head>
    <body>
        
        <div id="profile">
            <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>    <!-- $login_session is the username as $row['username']; -->
            <p>You are logged in now.</p>
            <?php //echo "Your IP Address : \"" . $login_ip_add ."\"<br/>" ; ?>
            <?php //echo "Hashed IP Address: \"" . $login_ip_add_hashed ."\"<br/>" ; ?>
            
            The above two values are stored in db. Here is displayed to see what we get.
            <br/>
            <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>           
    </body>
</html>