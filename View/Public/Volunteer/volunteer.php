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
    $action = 'show_add_form';
}

if(isset($_GET['event_id'])){
    $event_id = $_GET['event_id'];
}else{
    $event_id = "1";
}

if(isset($_GET['job_id'])){
    $job_id = $_GET['job_id'];
}else{
    $job_id = "1";
}

if ($action == 'show_add_form') {

    include('volunteer_add.php');
    
}else if ($action == 'add_volunteer') {

    $id = VolunteerDB::getNewVolunteerId($event_id, $job_id);
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];

    //*************Validation ***********************//
    $valid =true;
    if($name == null || empty($name)){
        $error .= "Enter your full name<br/>";
        $valid = false;
        
    }
    if($phone == null || empty($phone)){
        $error .= "Enter your phone number<br/>";
        $valid= false;
    }
    if($email == null || empty($email)){
        $error .= "Enter your email <br/>";
        $valid= false;
    }    //*****************validation ********************//
    if(!$valid){
        $error .= "Sorry, you was not inserted.<br/>";
        if($error != ""){
            header("location: ./volunteer.php?action=show_add_form&name=$name&phone=$phone&email=$email&url=$url&err=".$error);
        }
    }
    else if($valid){
    
        $volunteer = new Volunteer($event_id, $job_id, $id, $name, $phone, $email, '', '');
        VolunteerDB::addVolunteer($volunteer);

        header('Location: ./volunteer.php?action=show_result&name=$name');
    }    
}else if ($action == 'show_result') {
    
    echo "Thank you. You are registered.";
    
}



?>