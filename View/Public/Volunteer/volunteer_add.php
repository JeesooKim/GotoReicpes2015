<?php include './ref/header-iframe.php';  ?>  
<!--end top-->
<?php
#File name: volunteer_add.php
#File for Volunteer
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class
?>
<?php
        if(isset($_GET['err'])){
            echo $_GET['err'];
        }
        
?>
<br />
<form action="./volunteer.php" method="get" id="volunteer_add_form" target="volunteer">
    <input type="hidden" name="action" value="add_volunteer" />
    <input type="hidden" name="event_id"    value="<?php echo $event_id; ?>" />
    <input type="hidden" name="job_id"      value="<?php echo $job_id; ?>" />

    <table>
        <tr>
            <td>
                <label>Name</label>
            </td>
            <td>
                <input type="text" name="name" value="" />
            </td>
        </tr>
        <tr>
            <td>
                <label>Phone</label>
            </td>
            <td>
                <input type="text" name="phone" value=""/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Email</label>
            </td>
            <td>
                <input type="text" name="email" value=""/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Apply" />
            </td>
        </tr>
    </table>
</form>

<?php

include './ref/footer-iframe.php'; 

?>
