<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>
<?php
        require_once( PATH_DATABASE);   //SERVER ROOT is not working but SITEROOT is working ......why?
        require_once( PATH_MODEL_EVENT);
        require_once( PATH_MODEL_EVENTS_DB);

        #File name: index.php
        #File for Events-Admin (1/4)
        #Team Project: PHP project-gotorecipes.com
        #Author: Jeesoo Kim
        #Created : April 3, 2015
        #Modified: 
        #Reference: Class material -PDO Class
        
        include PATH_HEADER_ADMIN; ?>
<?php
error_reporting();
$error = '';
$action ="";

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_events';  //when this page is loaded for the first time, assign 'list_events' string to $action
}

//echo "Where is my action:[". $action."]";

if ($action == 'list_events') { //when the page is loaded for the first time
// First thing to do is to get event data
    
    $events = EventsDB::GetEvents();

    // Display the list of events
    include('event_list.php');
    
} 
// ********************* DELETE ********************************
else if ($action == 'delete_event') {    
    // Get the IDs
    $event_id = $_POST['event_id'];
   
    // Delete the event
    EventsDB::deleteEvent($event_id);     
     
    // Display the Events List page
    header("Location:event_list.php");
    exit();
    
}
// ********************* EDIT **************************************
else if ($action == 'show_edit_form') {
    // this action is triggered by around line 48 of event_list.php 
    // 
    //******************Editing an Event starts ******************//
    // Get the IDs
    $event_id = $_POST['eventId'];     //gets the id of the selected event   
    $event=EventsDB::GetEvent($event_id);
    include('event_edit.php');
    
}else if($action=='Edit_Event'){        
    
    $event_id = $_POST['eventId'];
    
    //$event = EventsDB::GetEvent($event_id);      
    $event_name = $_POST['eventName'];    
    $event_start=$_POST['eventStart'];
    $event_end=$_POST['eventEnd'];    
    $event_loc=$_POST['eventLoc'];
    $event_detail=$_POST['eventDetail'];
    $event_contactName =$_POST['eventContactName'] ;
    $event_contactEmail =$_POST['eventContactEmail'];  
   
    //Edit a Event
    EventsDB::editEvent($event_id, $event_name, $event_start, $event_end, $event_loc, $event_detail, $event_contactName ,$event_contactEmail);
    
    // Display the Event List page
    header("Location:event_list.php");
    
}  //******************Editing ends ******************//
 //************Insert  a new event starts ***********//   
else if ($action == 'show_insert_form') {       
    include('event_insert.php');    
}else if ($action == 'Insert Event') {    
    
    $event_name = $_POST['eventName'];    
    $event_start=$_POST['eventStart'];
    $event_end=$_POST['eventEnd'];    
    $event_loc=$_POST['eventLoc'];
    $event_detail=$_POST['eventDetail'];
    $event_contactName =$_POST['eventContactName'] ;
    $event_contactEmail =$_POST['eventContactEmail'];   
   
    // if everything is ok, (Validation)
    //instantiate a new event pbject, and try to insert a new event    
     $eventObj = new Event($event_name, $event_start, $event_end, $event_loc, $event_detail, $event_contactName ,$event_contactEmail);
          
     EventsDB::addEvent($eventObj);                                   
         
      // Display the Events List
     //header("Location: .");         
     header("Location:event_list.php");
    }    
     //****************** Inserting a new Event ends ******************//
    ?>
