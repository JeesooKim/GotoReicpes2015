<?php include '../Shared/_Layout_adminIndex/header.php'; ?>  

<?php
require_once('../../Model/database.php');
require_once('../../Model/user.php');
require_once('../../Model/user_db.php');

$username = "";
$password = "";
$error = "";
?>


<?php
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $pw = $_POST['password'];

    $valid = true;
    if ($username == NULL || empty($username)) {
        $error .= "Please enter a username.<br/>";
        $valid = false;
    }
    if ($pw == null || empty($pw)) {
        $error .= "Please enter a password.<br/><br/>";
        $valid = false;
    }

    if (!$valid) {
        //$error.= "Your regisration is not successful!  Please try again.";
    } else if ($valid) {
        $userObj = new User($username, $pw);
        UserDB::addUser($userObj);
        
        //header('Location:thanks.php');
    }
}
?>

<div id="login">
    <h2><span class="fontawesome-lock"></span>Register</h2>
    <br/>
    <?php echo $error; ?>


    <form action="register.php" method="POST">
        <fieldset>            
            <p><label for="username">Username</label></p>
            <p><input type="username" name="username" id="username" value="<?php echo $username; ?>" onBlur="if (this.value == '')
                        this.value = 'username'" onFocus="if (this.value == 'username')
                                    this.value = ''"></p>
            <br/>

            <p><label for="password">Password</label></p>
            <p><input type="password" name="password" id="password" value="<?php echo $password; ?>" onBlur="if (this.value == '')
                        this.value = 'password'" onFocus="if (this.value == 'password')
                                    this.value = ''"></p>

<!--				<p><label for="password">Re-type Password</label></label></p>
                                <p><input type="password" id="password" value="" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p>

                                <p><label for="email">Email</label></label></p>
                                <p><input type="email" id="email" value="" onBlur="if(this.value=='')this.value='email'" onFocus="if(this.value=='email')this.value=''"></p>-->

<!--            <p><a href="#" class="btn btn-primary" role="button">Register</a></p>-->
            <br/>
            <input type="submit" name="submit" value="Register"/><br/><br/>
            <p><a href="../../index.php">Return</a></p>

        </fieldset>
    </form>

</div> 
<!-- end login -->

<?php include '../Shared/_Layout_adminIndex/footer.php'; ?>
