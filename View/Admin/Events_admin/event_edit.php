<?php
#File name: event_edit.php
#File for Events-Admin (4/4)
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created : April 3, 2015
#Modified: 
#Reference: Class material -PDO Class

?>

<div id="main">
    <p><a href="index.php?action=list_events">View Events List</a></p>    
    <h1>Edit Event</h1>

<!--     <form action="index.php" method="post" >      this is the original line. for the purpose of debugging the below line is added-->
     <form action="." method="post" >      
         <input type="hidden" name="eventId" value="<?php echo $event->getEventID(); ?>" />
         
         <?php echo "<br/>Event ID in event_edit.php" . $event->getEventID() . "<br/>"; ?>
         
          <table> 
                 <tr>
                    <td><label>Name:</label></td>
                    <td> <input type="text" name="eventName"  value="<?php echo $event->getEventName();  ?>"/></td>
                </tr>
                <tr>
                    <td><label>Start:</label></td>
                    <td><input type="text" name="eventStart" value="<?php echo $event->getEventStart(); ?>" /></td>
                </tr>
                <tr>
                    <td><label>End:</label></td>
                    <td><input type="text" name="eventEnd" value="<?php echo $event->getEventEnd(); ?>" /></td>
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

<?php include PATH_FOOTER_ADMIN; ?>