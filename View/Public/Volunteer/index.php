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
    $action = 'event_list';
}

if ($action == 'event_list') {

    $cntPerPage = 5;
    $pgLinkCnt = 5;

    $pgSelf = "index.php";
    $category_parm = "";
    $condition = "&action=".$action;

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

    //$categories = ToprecipeDB::getRecipeCategory();
    $totCnt = VolunteerDB::getTotEventCount($event_date);
    $eventadminPage = VolunteerDB::getPageEventByEventdate($event_date, $cntPerPage, $pgPage);

    // Display the toprecipes list
    include('event_list.php');

    
    include  PATH_FOOTER; 
}
?>
