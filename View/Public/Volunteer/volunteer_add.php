<?php include PATH_HEADER_IFRAME;  ?>  
<!--end top-->
<?php
        if(isset($_GET['err'])){
            echo $_GET['err'];
        }
        
?>
<br />
<form action="./volunteer.php" method="get" id="volunteer_add_form" target="volunteer">
    <input type="hidden" name="action" value="add_volunteer" />
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

include  PATH_FOOTER_IFRAME; 

?>
