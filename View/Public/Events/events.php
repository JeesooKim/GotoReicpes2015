<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>
<?php
        require_once( PATH_DATABASE);   //SERVER ROOT is not working but SITEROOT is working ......why?
        require_once( PATH_MODEL_EVENT);
        require_once( PATH_MODEL_EVENTS_DB);

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
        include PATH_HEADER; 
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

<!-- -->
<!-- jQuery Full Calendar -->
                    <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.css' />
                    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js'></script>
                    <script src='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.js'></script>
                    <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.print.css' />
                    <!-- jQuery full Calendar CDN-->
    <script>
    
    $(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
        
    })

    });
    </script>
<!-- -->


<div id="main">
    <ol class="breadcrumb">
        <li><a href="<?php echo SERVERROOT; ?>/index.php">Home</a></li>
        <li class="active">Events</li>
        
    </ol>
    <br/>
    
    <div id="sidebar">        
       <!-- a href="<?php //echo PATH_ADMIN_EVENTS; ?>/index.php">Events Admin(temporary)</a-->       
    </div><!-- end of #sidebar -->
    
    
    <div id='calendar'></div>
    <br/><br/>

    
    
    <?php foreach ($events as $event) : ?>
                            <h2> <!-- Name of event-->
                                   <?php
                                             $eve = $event -> getEventName();
                                             echo $eve . "<br/>";
                                   ?>
                            </h2> 
                            <p class="contentBox">
                                <!-- displays the content of the event: 
                                    Key Ingredient, Number Serving, Cooking TIme, Ingredients, and Steps-->
                                   Event Start Date and Time : 
                                          <?php echo $event->getEventStart();  ?>
                                   <br />
                                   Event End Date and Time:
                                          <?php echo $event->getEventEnd(); ?>
                                   <br/>
                                   Event Location;
                                         <?php echo $event->getEventLocation(); ?>
                                   <br/>
                                   Event Detail:
                                          <?php echo $event->getEventDetail(); ?>
                                   <br/>
                                   Event Contact Person:
                                          <?php echo $event->getEventContactName(); ?>    
                                   <br/>
                                   Email to Contact:
                                          <?php echo $event->getEventContactEmail(); ?> 
                            </p>
                    <?php endforeach; ?>   
    
    
</div><!-- end of #main -->
        
<?php
} //end of action 'list_view_events
?>
        <!-- END of FILE events_view-->
        <!-- START of footer -->
        <?php include PATH_FOOTER; ?>


        
        
        