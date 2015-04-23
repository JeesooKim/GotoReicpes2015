<?php include './ref/header-iframe.php';  ?>  
<!--end top-->
<?php
#File name: eventjob_list.php
#File for Volunteer
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class
?>

<?php if ( count($eventjobadminPage) > 0 ) { ?>

<table class="table" >
    <tr>
    <th>Event Id</th>
    <th>Job Id</th>
    <th>What</th>
    <th>When</th>
    <th>End Date</th>
    <th>Search Volunteer</th>
</tr>
<?php 
}else{
?>
<tr>
    <td colspan="6">No data Found!</td>
    
</tr>
<?php
}
?>

<?php
foreach ($eventjobadminPage as $eventjob) :
    echo "<tr>";
    echo "<td>";
    echo $eventjob->getEventId();
    echo "</td>";
    echo "<td>";
    echo $eventjob->getJobId();
    echo "</td>";
    echo "<td>";
    echo $eventjob->getJobTitle();
    echo "</td>";
    echo "<td>";
    echo $eventjob->getJobTime();
    echo "</td>";
    echo "<td>";
    echo $eventjob->getRegistDate();
    echo "</td>";
?>
<form action="./volunteer.php" method="get" id="volunteer_list_form" target="volunteer">
<?php
    echo "<td>";

?>
        <input type="hidden" name="action"      value="show_add_form" />
        <input type="hidden" name="event_id"     value="<?php echo $eventjob->getEventId(); ?>" />
        <input type="hidden" name="job_id"    value="<?php echo $eventjob->getJobId(); ?>" />
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

$pgLink = Paginator::pageList($pgSelf, $pgPage, $totCnt, $cntPerPage, $pgLinkCnt, $condition );

echo "<br /><br />";
  
echo '<iframe src="./ref/blank.php" name="volunteer" width="100%" height="400" scrolling="no"></iframe>';


include './ref/footer-iframe.php'; 

?>
