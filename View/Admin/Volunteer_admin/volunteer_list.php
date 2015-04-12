<?php include PATH_HEADER_IFRAME_ADMIN;  ?>  
<!--end top-->
<?php
#File name: volunteer_list.php
#File for Volunteer_admin
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class
?>
<table class="table" >
    <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>hire Yes No</th>
</tr>

<?php
foreach ($volunteeradminPage as $volunteer) :
    echo "<tr>";
    echo "<td>";
    echo $volunteer->getId();
    echo "</td>";
    echo "<td>";
    echo $volunteer->getName();
    echo "</td>";
    echo "<td>";
    echo $volunteer->getPhone();
    echo "</td>";
    echo "<td>";
    echo $volunteer->getEmail();
    echo "</td>";
?>
<form action="./volunteer.php" method="get" id="volunteer_update_form" target="volunteer">
<?php
    echo "<td>";
    if( $volunteer->getHireYesNo() == "Y") {
        echo "<input type=checkbox name=hire_yes_no checked>";
    }else{
        echo "<input type=checkbox name=hire_yes_no>";
    }
?>
        <input type="hidden" name="action"      value="volunteer_update" />
        <input type="hidden" name="event_id"    value="<?php echo $volunteer->getEventId(); ?>" />
        <input type="hidden" name="job_id"      value="<?php echo $volunteer->getJobId(); ?>" />
        <input type="hidden" name="id"          value="<?php echo $volunteer->getId(); ?>" />
        <input type="hidden" name="pgPage"      value="<?php echo $pgPage; ?>" />
        <input type="submit" value="Update" />
    </form>
<?php
    echo "</td>";
    echo "</tr>";
endforeach;
?>
</table>

<?php

$pgLink = Paginator::pageList($pgSelf, $pgPage, $totCnt, $cntPerPage, $pgLinkCnt, $condition );

include  PATH_FOOTER_IFRAME_ADMIN; 

?>
