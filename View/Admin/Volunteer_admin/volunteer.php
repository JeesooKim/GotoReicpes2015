<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  

require(PATH_DATABASE);
require(PATH_MODEL_VOLUNTEER);
require(PATH_MODEL_VOLUNTEER_DB);
require(PATH_MODEL_PAGENATOR);

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

    if(isset($_GET['job_id'])){
        $job_id = $_GET['job_id'];
        $condition = "&job_id=".$job_id;
    }else{
        $job_id = "1";
    }

    //$categories = ToprecipeDB::getRecipeCategory();
    $totCnt = VolunteerDB::getTotVolunteerCount($event_id, $job_id );
    $volunteeradminPage = VolunteerDB::getPageVolunteerByEventidJobid($event_id, $job_id, $cntPerPage, $pgPage);

    // Display the toprecipes list
    include('volunteer_list.php');

    
}else if ($action == 'volunteer_update') {

    if (isset($_POST['hire_yes_no'])) {
        $hire_yes_no = "Y";
    } else if (isset($_GET['hire_yes_no'])) {
        $hire_yes_no = "Y";
    } else {
        $hire_yes_no = '';
    }

    $event_id = $_GET['event_id'];
    $job_id = $_GET['job_id'];
    $id = $_GET['id'];
    $pgPage = $_GET['pgPage'];

    VolunteerDB::updateVolunteerHireYN($event_id, $job_id, $id, $hire_yes_no);
    
    header("Location: ./volunteer.php?pgPage=$pgPage&category=$category");
}



?>