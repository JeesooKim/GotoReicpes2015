<?php include "../../../View/Shared/_Layout/header.php";  ?>  
<!--end top-->
<?php
#File name: event_list.php
#File for Volunteer
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class
?>

<script  src="../../../Content/js/calendar.js"></script>
<script  src="../../../Content/js/calendar_jquery.js"></script>

<h1>Today's Recipe</h1>
<br /><br />                

<form action="." method="GET">
<b>Event Date:</b>
<input type="date" id="event_date" name="event_date" size="20" />
<input type="submit" value="Submit" name="submit"></p>
</form>
<br />

<table class="table" >
    <tr>
    <th>Event Id</th>
    <th>Event Name</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Contact email</th>
    <th>Search Position</th>
</tr>

<?php
//Get Display event list
foreach ($eventadminPage as $event) :
    echo "<tr>";
    echo "<td>";
    echo $event->getEventId();
    echo "</td>";
    echo "<td>";
    echo $event->getEventName();
    echo "</td>";
    echo "<td>";
    echo $event->getEventStart();
    echo "</td>";
    echo "<td>";
    echo $event->getEventEnd();
    echo "</td>";
    echo "<td>";
    echo $event->getEventContactEmail();
    echo "</td>";
?>
<form action="./eventjob.php" method="get" id="event_list_form" target="eventjob" >
<?php
    echo "<td>";
?>
        <input type="hidden" name="action"      value="eventjob_list" />
        <input type="hidden" name="event_id"     value="<?php echo $event->getEventId(); ?>" />
        <input type="hidden" name="pgPage"      value="<?php echo $pgPage; ?>" />
        <input type="submit" value="Search" />
    </form>
<?php
    echo "</td>";
    echo "</tr>";
endforeach;
?>
</table>

<?php
    //Dispaly page link list
    $pgLink = Paginator::pageList($pgSelf, $pgPage, $totCnt, $cntPerPage, $pgLinkCnt, $condition );

    echo "<br /><br />";
    
    echo '<iframe src="./ref/blank.php" name="eventjob" width="100%" height="800" scrolling="no"></iframe>';

?>
