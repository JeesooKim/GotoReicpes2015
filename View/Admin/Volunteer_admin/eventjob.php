<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  

#File name: eventjob.php
#File for Volunteer_admin
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class

require(PATH_DATABASE);
require(PATH_MODEL_VOLUNTEER);
require(PATH_MODEL_VOLUNTEER_DB);
require(PATH_MODEL_PAGENATOR);

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

    //$categories = ToprecipeDB::getRecipeCategory();
    $totCnt = VolunteerDB::getTotEventjobCount($event_id);
    $eventjobadminPage = VolunteerDB::getPageEventjobByEventid($event_id, $cntPerPage, $pgPage);

    // Display the toprecipes list
    include('eventjob_list.php');

    
    }?>