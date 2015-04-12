<?php
#File name: event_insert.php
#File for Events-Admin (3/4)
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim @Humber College 2015
#Created :April 3, 2015
#Modified: 
#Reference: Class material -PDO Class
?>

<div id="main">
    <p><a href="index.php?action=list_events">View Events List</a></p>
    <h1>Insert a New Event</h1>

     <form action="index.php" method="Post" >         
          <table>   
                <tr>
                    <td><label>Name:</label></td>
                    <td> <input type="text" name="eventName" /></td>
                </tr>
                <tr>
                    <td><label>Start:</label></td>
                    <td><input type="text" name="eventStart" /></td>
                </tr>
                <tr>
                    <td><label>End:</label></td>
                    <td><input type="text" name="eventEnd" /></td>
                </tr>
                <tr>
                    <td><label>Location:</label></td>
                    <td><input type="text" name="eventLoc" /></td>
                </tr>
                <tr>
                    <td><label>Detail:</label></td>
                    <td><input type="text" name="eventDetail" /></td>
                </tr>
                <tr>
                    <td><label>Contact Person Name:</label></td>
                    <td><input type="text" name="eventContactName" /></td>
                </tr>
                 <tr>
                    <td><label>Contact Person Email:</label></td>
                    <td><input type="text" name="eventContactEmail" /></td>
                </tr>
                
                
        </table>
        <label>&nbsp;</label>
        <input type="submit" name="action" value="Insert Event" />  
        <br />
    </form>
    

</div>
<?php include PATH_FOOTER_ADMIN; ?>