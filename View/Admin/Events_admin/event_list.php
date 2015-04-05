<?php   ?>  
<!--end top-->
<?php
#File name: event_list.php
#File for Events-Admin(2/4)
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created :  April 3, 2015
#Modified: 
#Reference: Class material -PDO Class
?>


<div id="main">
    <p><a href="?action=show_insert_form">Insert a New Event</a></p>
    <h1>Events List</h1>
    <div id="sidebar">
        
    </div> <!-- end of #sidebar -->
    
    <table width="900">
<!--     <table id="event_insert_table" width="900">-->
            <thead bgcolor="#a8cb81" >                
                <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:18px;">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Location</th>
                    <th>Detail</th>
                    <th>Contact Person Name</th>
                    <th>Contact Person Email</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event) : ?>
                <!-- $events = EventsDB::GetEvents(); from index.php -->
                        <tr>
                            <td><?php echo $event->getEventID(); ?> </td>
                            <td><?php echo $event ->getEventName(); ?></td>
                            <td><?php echo $event ->getEventStart(); ?></td>
                            <td><?php echo $event ->getEventEnd(); ?></td>
                            <td><?php echo $event ->getEventLocation(); ?></td>
                            <td><?php echo $event ->getEventDetail(); ?></td>
                            <td><?php echo $event ->getEventContactName(); ?></td>
                            <td><?php echo $event ->getEventContactEmail(); ?></td>
                            <td><form action="." method="post" id="edit_event_form">
                                            <input type="hidden" name="action" value="show_edit_form" />
                                            <input type="hidden" name="eventId" value="<?php echo $event->getEventID(); ?>" />                                            
                                            <input type="submit" value="Edit" />
                                    </form>
                            </td>
                            <td><form action="." method="post" id="delete_event_form">
                                            <input type="hidden" name="action" value="delete_event" />
                                            <input type="hidden" name="event_id" value="<?php echo $event->getEventID(); ?>" />                                            
                                            <input type="submit" value="Delete" />
                                            <!-- this delete button isi not working -->
                                    </form>
                                        <a href="index.php?action=delete_event&event_id=<?php echo $event->getEventID(); ?>" >delete</a>
                                        <!-- this link is not working -->
                                        
                             </td>
                        </tr>     
                <?php endforeach; ?>                        
        </tbody>                
        </table>        
        </div><!-- end of #main -->
<?php include PATH_FOOTER_ADMIN; ?>