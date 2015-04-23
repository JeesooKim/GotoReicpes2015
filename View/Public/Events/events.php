<?php
        require_once('../../../Model/database.php');   
        require_once('../../../Model/event.php');
        require_once('../../../Model/events_db.php');

        #File name: events.php
        #File for Events-Public(1/1)
        #Team Project: PHP project-gotorecipes.com
        #Author: Jeesoo Kim
        #Created : April 2, 2015
        #Modified: 
        #Reference: Class material -PDO Class

        //connect to db
        //bring data here
        //display the data
        include "../../../View/Shared/_Layout/header.php";
?>
<?php  
// list of events will be rendered.
//get the event object,,,EventsDB::GetEvents()

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_view_events';
}

if ($action == 'list_view_events') {
        $events =EventsDB::getEvents(); 
        // the following is inside of this curly bracket , action 'list_view_events
?>

<!--CDN for  jQuery Accordion-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!--link rel="stylesheet" href="/resources/demos/style.css"-->
<script>
$(function() {
$( "#accordion" ).accordion();
});
</script>
<!-- -->


<div id="main">
    <ol class="breadcrumb">
        <li><a href="../../../index.php">Home</a></li>
        <li class="active">Events</li>
        
    </ol>
    <br/>
    
    <div id="sidebar">        
       <!-- a href="<?php //echo PATH_ADMIN_EVENTS; ?>/index.php">Events Admin(temporary)</a-->       
    </div><!-- end of #sidebar -->
    
 <div id="accordion">
    <?php foreach ($events as $event) : ?>
    <h3> <!-- Name of event-->
        <?php echo $event -> getEventName(); ?> : 
        <?php 
        
            $start =$event->getEventStart();   //returns 2015-05-11 10:00:00.000000
            $start = substr($start, 0,16);
            echo $start;  ?>
        
    </h3> 
     <div>
         <p>
             <!--p class="contentBox">
            <!-- displays the content of the event: 
            Key Ingredient, Number Serving, Cooking TIme, Ingredients, and Steps-->
            <?php
            $end =$event->getEventEnd();   //returns 2015-05-11 10:00:00.000000
            $end = substr($end, 0,16);
             ?>
            
           When : <?php echo $start;  ?> ~ <?php echo $end; ?>
           <br/><br/>
           Where: <?php echo $event->getEventLocation(); ?>
           <br/><br/>
           What:  <?php echo $event->getEventDetail(); ?>
           <br/><br/>
           Contact: <?php echo $event->getEventContactName(); ?>  by Email : 
           
           <?php echo $event->getEventContactEmail(); ?> 
            <!--/p -->             
         </p>         
     </div>    
<?php endforeach; ?>   
</div><!-- end of #accordion -->   
</div><!-- end of #main -->
        
<?php
} //end of action 'list_view_events
?>
<!-- END of FILE events_view-->
<!-- START of footer -->
<?php include "../../../View/Shared/_Layout/footer.php";?>
        
        
        