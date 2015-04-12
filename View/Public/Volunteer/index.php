<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  

#File name: index.php
#File for Volunteer
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class

require(PATH_DATABASE);
require(PATH_MODEL_VOLUNTEER);
require(PATH_MODEL_VOLUNTEER_DB);
require(PATH_MODEL_PAGENATOR);

//Get the action 
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'event_list';
}

if ($action == 'event_list') {

    $cntPerPage = 5;
    $pgLinkCnt = 5;

    $pgSelf = "index.php";
    $category_parm = "";
    $condition = "&action=".$action;

    //Get pgPage, event_date and condition
    if(isset($_GET['pgPage'])){
        $pgPage = $_GET['pgPage'];
    }else{
        $pgPage = 1;
    }
    if(isset($_GET['event_date'])){
        $event_date = $_GET['event_date'];
        $condition = "&event_date=".$event_date;
    }else{
        $event_date = date("m/d/Y"); 
    }

    //Get totCnt, eventadminPage data
    $totCnt = VolunteerDB::getTotEventCount($event_date);
    $eventadminPage = VolunteerDB::getPageEventByEventdate($event_date, $cntPerPage, $pgPage);

    // Display the event list
    include('event_list.php');

    
    include  PATH_FOOTER; 
}
?>
