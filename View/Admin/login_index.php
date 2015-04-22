<?php
#FILE name: login_index.php
#Content: login form (HTML)
#Source: www.formget.com/login-form-in-php/
#Ref: php.about.com/od/advancedphp/ss/php_sessions_3.htm#step-heading
#Referenced on March 18, 2015 by Jeesoo Kim


include('login.php');

if (isset($_SESSION['login_user'])) {
    header("location: index.php");
    //header("location: profile.php");
    //redirect to the browser  as sending this header back to the browser
    //header() should be written before any HTML
    //when the page is firstly loaded, the session is not set, so this block will be skipped.   
}
?>

<?php include '../Shared/header-admin.php'; ?>  


<h2><span class="fontawesome-lock"></span>User Login</h2>


<div id="error" >
    <?php
    if ($error != '') {
        ?>

        <p align="center"><strong><font color="#990000"><?php echo $error; ?></font></strong></p>
        <?php
    }
    ?>    
</div>

<div id="login">

    <form action="" method="Post">
        <fieldset name="Log_in">      

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="username" onBlur="if (this.value == '')
                        this.value = 'username'" onFocus="if (this.value == 'username')
                                    this.value = ''"/>
            <br/>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="********" onBlur="if (this.value == '')
                        this.value = 'password'" onFocus="if (this.value == 'password')
                                    this.value = ''"/>
            <br/>
        </fieldset>

        <!-- Start: Image Authentication (1) -->
        <fieldset name="Image_Auth_with_random_number">                  
            <!--            <legend>Image Authentication with 5 digit Random number</legend>-->
            <label>Please enter the number in yellow on black beside: </label>
            <input type="text" id="imgNumber" name="imgNumber" value=""/>
            &nbsp;&nbsp;<img src="randomImage.php"/>                  
            <!-- End: Image Authentication -->

            <br/>
            <input type="submit" name="submit" value="Login" />
        </fieldset>
        <span><?php echo $error; ?></span>                   
    </form>        
</div><!-- end of $login--> 


<?php include '../Shared/footer-admin.php'; ?>
