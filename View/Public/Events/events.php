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

<div id="main">
    <div id="sidebar">        
        <p><a href="<?php echo PATH_ADMIN_EVENTS; ?>/index.php">Events Admin(temporary)</a></p>        
    </div><!-- end of #sidebar -->
    
    
    
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


        
        
        