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
    header("Location:index.php");
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
    $event_name = $_POST['eventName'];  //Required
    $event_start=$_POST['eventStart'];  //Required
    $event_end=$_POST['eventEnd'];      //Required
    $event_loc=$_POST['eventLoc'];      //Required
    $event_detail=$_POST['eventDetail'];
    $event_contactName =$_POST['eventContactName'] ;  //Required
    $event_contactEmail =$_POST['eventContactEmail']; //Required 
   
    //---- Validation starts (Edit)------//  
    $valid=true;
    if($event_name == null || empty($event_name)){
        $valid=false;
        $error .="Please enter the <em>name</em> of the event.<br/>";       
    }
    
    if($event_start == null || empty($event_start)){
        $valid=false;
        $error .="Please enter the time to <em>start</em>.<br/>";       
    }
    
     if($event_end == null || empty($event_end)){
        $valid=false;
        $error .="Please enter the time to <em>end</em>.<br/>";       
    }
    
     if($event_loc == null || empty($event_loc)){
        $valid=false;
        $error .="Please enter the <em>location</em> of the event.<br/>";       
    }    
     if($event_contactName == null || empty($event_contactName)){
        $valid=false;
        $error .="Please enter the contact <em>Person</em>.<br/>";       
    }
    if($event_contactEmail == null || empty($event_contactEmail)){
        $valid=false;
        $error .="Please enter the <em>email</em> to contact.<br/>";       
    }
    //---------- Validation ends(Edit)---------------//
    if(!$valid){
        $error .= "Sorry the event is not edited.<br/>";
        if($error != ""){
        header("location:index.php?action=show_edit_form&err=".$error);
        }
    }
    elseif($valid){        
    //Edit a Event
    EventsDB::editEvent($event_id, $event_name, $event_start, $event_end, $event_loc, $event_detail, $event_contactName ,$event_contactEmail);
    
    // Display the Event List page
    header("Location:index.php");        
    } 
}  //******************Editing ends ******************//

//************Insert  a new event starts ***********//   
else if ($action == 'show_insert_form') {  
    
    
    
    include('event_insert.php');    
}else if ($action == 'Insert Event') { 
    $event_id = $_POST['eventId'];
    
    //$event = EventsDB::GetEvent($event_id);      
    $event_name = $_POST['eventName'];  //Required
    $event_start=$_POST['eventStart'];  //Required
    $event_end=$_POST['eventEnd'];      //Required
    $event_loc=$_POST['eventLoc'];      //Required
    $event_detail=$_POST['eventDetail'];
    $event_contactName =$_POST['eventContactName'] ;  //Required
    $event_contactEmail =$_POST['eventContactEmail']; //Required 
    //
    //---- Validation starts (Insert) ------//  
    $valid=true;
    if($event_name == null || empty($event_name)){        
        $valid=false;
        $error .="Please enter the <em>name</em> of the event.<br/>";       
    }
    
    if($event_start == null || empty($event_start)){        
        $valid=false;
        $error .="Please enter the time to <em>start</em>.<br/>";       
    }
    
     if($event_end == null || empty($event_end)){         
        $valid=false;
        $error .="Please enter the time to <em>end</em>.<br/>";       
    }
    
     if($event_loc == null || empty($event_loc)){         
        $valid=false;
        $error .="Please enter the <em>location</em> of the event.<br/>";       
    }    
     if($event_contactName == null || empty($event_contactName)){              
        $valid=false;
        $error .="Please enter the contact <em>Person</em>.<br/>";       
    }
    
    if($event_contactEmail == null || empty($event_contactEmail)){        
        $valid=false;
        $error .="Please enter the <em>email</em> to contact.<br/>";        
    }
    else if(!filter_var($event_contactEmail ,FILTER_VALIDATE_EMAIL)){
            $valid = false;     
            $error .= " Please enter a <em>valid</em> email<br/>";
        }       
   //---- Validation ends (Insert) -------//
        
    if(!$valid){
        $error .= "<br/>Sorry the event is not inserted yet.<br/>";
        if($error != ""){
        
        
        header("location:index.php?action=show_insert_form&err=".$error);
        
        }
    }
    elseif($valid){  
    // if everything is ok, (Validation)
    //instantiate a new event pbject, and try to insert a new event    
     $eventObj = new Event($event_name, $event_start, $event_end, $event_loc, $event_detail, $event_contactName ,$event_contactEmail);
          
     EventsDB::addEvent($eventObj);                                   
         
      // Display the Events List
     //header("Location: .");         
     header("Location:index.php");
    } 
}//****************** Inserting a new Event ends ******************//
?>
