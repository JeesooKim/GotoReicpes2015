<?php  include '../../Shared/header-admin.php';  ?>
<?php
#File name: event_edit.php
#File for Events-Admin (4/4)
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created : April 3, 2015
#Modified: 
#Reference: Class material -PDO Class

?>


<!-- jQuery datetime picker for Admin-Event-->
<link rel="stylesheet" type="text/css" href="../../../Content/css/event_dtpick/jquery.datetimepicker.css" />
<script src="../../../Content/js/event_dtpick/jquery.js"></script>
<script src="../../../Content/js/event_dtpick/jquery.datetimepicker.js"></script>
<!-- event datetime picker -->
                    
<script>
    
    $(function(){
	$('#datetimepickerS').datetimepicker();
        $('#datetimepickerE').datetimepicker();
    });
    
</script>
<div id="sidebar">
       <?php include '../../Shared/side-menu.php';  ?> 
    </div> <!-- end of #sidebar -->

<div id="main">
    <ol class="breadcrumb">
        <li><a href="../index.php">Admin Panel</a></li>
        <li class="active"><a href="../Events_admin/index.php">Events</a></li>
        <li class="active">Edit Event</li>
    </ol>
        
    <p><!--a href="index.php?action=list_events">View Events List</a--></p>   
        
<!--     <form action="index.php" method="post" >      this is the original line. for the purpose of debugging the below line is added-->
     <form action="." method="post" >      
         <input type="hidden" name="eventId" value="<?php echo $event->getEventID(); ?>" />
         
         <?php //echo "<br/>Event ID in event_edit.php" . $event->getEventID() . "<br/>"; ?>
         
          <table> 
                 <tr>
                    <td><label>Name:</label></td>
                    <td> <input type="text" name="eventName"  value="<?php echo $event->getEventName();  ?>"/></td>
                </tr>
                <tr>
                    <td><label>Start:</label></td>
                    <td><input id="datetimepickerS" type="text" name="eventStart" value="<?php echo $event->getEventStart(); ?>" /></td>
                </tr>
                <tr>
                    <td><label>End:</label></td>
                    <td><input id="datetimepickerE" type="text" name="eventEnd" value="<?php echo $event->getEventEnd(); ?>" /></td>
                </tr>
                <tr>
                    <td><label>Location:</label></td>
                    <td><input type="text" name="eventLoc" value="<?php echo $event->getEventLocation(); ?>"/></td>
                </tr>
                <tr>
                    <td><label>Detail:</label></td>
                    <td><input type="text" name="eventDetail" value="<?php echo $event->getEventDetail(); ?>"/></td>
                </tr>
                <tr>
                    <td><label>Contact Person Names:</label></td>
                    <td><input type="text" name="eventContactName" value="<?php echo $event->getEventContactName(); ?>"/></td>
                </tr>
                <tr>
                    <td><label>Contact Person Email:</label></td>
                    <td><input type="text" name="eventContactEmail" value="<?php echo $event->getEventContactEmail(); ?>"/></td>
                </tr>
                
        </table>
        <label>&nbsp;</label>
        <input type="submit" name="action" value="Edit_Event" />  
        <br />
    </form>
</div> <!-- end of #main-->

<?php include '../../Shared/footer-admin.php'; ?>