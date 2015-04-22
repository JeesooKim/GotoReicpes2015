<?php
#File name: eventjob.php
#File for Volunteer
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class

require('../../../Model/database.php');
require('../../../Model/volunteer.php');
require('../../../Model/volunteer_db.php');
require('../../../Model/pagenator.php');

//Get action
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'eventjob_list';
}

if ($action == 'eventjob_list') {

    $cntPerPage = 5;
    $pgLinkCnt = 5;

    $pgSelf = "eventjob.php";
    $category_parm = "";
    $condition = "&action=".$action;
    
    //Get pgPage, event_id and condition
    if(isset($_GET['pgPage'])){
        $pgPage = $_GET['pgPage'];
    }else{
        $pgPage = 1;
    }
    if(isset($_GET['event_id'])){
        $event_id = $_GET['event_id'];
        $condition = "&event_id=".$event_id;
    }else{
        $event_id = "1";
    }

    //Get totCnt, eventjobadminPage data from database
    $totCnt = VolunteerDB::getTotEventjobCount($event_id);
    $eventjobadminPage = VolunteerDB::getPageEventjobByEventid($event_id, $cntPerPage, $pgPage);

    // Display the eventjob list
    include('eventjob_list.php');

    
    }?>