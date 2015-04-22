<?php  

#File name: volunteer.php
#File for Volunteer_admin
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class

require('../../../Model/database.php');
require('../../../Model/volunteer.php');
require('../../../Model/volunteer_db.php');
require('../../../Model/pagenator.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'volunteer_list';
}

if ($action == 'volunteer_list') {

    $cntPerPage = 5;
    $pgLinkCnt = 5;

    $pgSelf = "volunteer.php";
    $category_parm = "";
    $condition = "&action=".$action;

    // Get the current page
    if(isset($_GET['pgPage'])){
        $pgPage = $_GET['pgPage'];
    }else{
        $pgPage = 1;
    }
    
    // Get the event_id and condition
    if(isset($_GET['event_id'])){
        $event_id = $_GET['event_id'];
        $condition = "&event_id=".$event_id;
    }else{
        $event_id = "1";
    }

    // Get the job_id and condition
    if(isset($_GET['job_id'])){
        $job_id = $_GET['job_id'];
        $condition = "&job_id=".$job_id;
    }else{
        $job_id = "1";
    }

    // Get totCnt and eventadminPage data
    $totCnt = VolunteerDB::getTotVolunteerCount($event_id, $job_id );
    $volunteeradminPage = VolunteerDB::getPageVolunteerByEventidJobid($event_id, $job_id, $cntPerPage, $pgPage);

    // Display the volunteer list
    include('volunteer_list.php');

    
}else if ($action == 'volunteer_update') {

    if (isset($_POST['hire_yes_no'])) {
        $hire_yes_no = "Y";
    } else if (isset($_GET['hire_yes_no'])) {
        $hire_yes_no = "Y";
    } else {
        $hire_yes_no = '';
    }

    //Get event_id, job_id, id, pgPage
    $event_id = $_GET['event_id'];
    $job_id = $_GET['job_id'];
    $id = $_GET['id'];
    $pgPage = $_GET['pgPage'];

    //Update volunteerHireYn data
    VolunteerDB::updateVolunteerHireYN($event_id, $job_id, $id, $hire_yes_no);
    
    // Display the volunteer page for the current category
    header("Location: ./volunteer.php?event_id=$event_id&job_id=$job_id&pgPage=$pgPage");
}



?>