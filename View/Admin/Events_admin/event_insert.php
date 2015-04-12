<?php  include PATH_HEADER_ADMIN;  ?> 
<?php
#File name: event_insert.php
#File for Events-Admin (3/4)
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim @Humber College 2015
#Created :April 3, 2015
#Modified: 
#Reference: Class material -PDO Class
?>

<!-- jQuery datetime picker for Admin-Event-->
<link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS; ?>/event_dtpick/jquery.datetimepicker.css" />
<script src="<?php echo PATH_JS; ?>/event_dtpick/jquery.js"></script>
<script src="<?php echo PATH_JS; ?>/event_dtpick/jquery.datetimepicker.js"></script>
<!-- event datetime picker -->
                    

<script>
    
    $(function(){
	$('#datetimepickerS').datetimepicker();
        $('#datetimepickerE').datetimepicker();
    });
    
</script>

<div id="sidebar">
       <?php include PATH_VIEW_SHARED . '/side-menu.php';  ?> 
    </div> <!-- end of #sidebar -->
    
<div id="main">
    <ol class="breadcrumb">
        <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/index.php">Admin Panel</a></li>
        <li class="active"><a href="<?php echo PATH_ADMIN_EVENTS; ?>/index.php">Events</a></li>
        <li class="active">Insert a New Event</li>
    </ol>
    <?php
        if(isset($_GET['err'])){
            echo $_GET['err'];
        }
    ?>
    <br/>
    <h2><b>* Required</b></h2>
    <br/>
    <p><!--a href="index.php?action=list_events">View Events List</a--></p>
   
   
     <form action="index.php" method="post" >         
          <table>   
                <tr>
                    <td><label>Name *:</label></td>
                    <td> <input type="text" name="eventName"  /></td>
                </tr>
                <tr>
                    <td><label>Start *:</label></td>
                    <td><input id="datetimepickerS" type="text" name="eventStart" /></td>
                </tr>
                <tr>
                    <td><label>End *:</label></td>
                    <td><input id="datetimepickerE" type="text" name="eventEnd"  /></td>
                </tr>
                <tr>
                    <td><label>Location *:</label></td>
                    <td><input type="text" name="eventLoc" /></td>
                </tr>
                <tr>
                    <td><label>Detail:</label></td>
                    <td><input type="text" name="eventDetail" /></td>
                </tr>
                <tr>
                    <td><label>Contact Person Name *:</label></td>
                    <td><input type="text" name="eventContactName"  /></td>
                </tr>
                 <tr>
                    <td><label>Contact Person Email *:</label></td>
                    <td><input type="text" name="eventContactEmail" /></td>
                </tr>
                
                
        </table>
        <label>&nbsp;</label>
        <input type="submit" name="action" value="Insert Event" />  
        <br />
    </form>
    

</div>
<?php include PATH_FOOTER_ADMIN; ?>