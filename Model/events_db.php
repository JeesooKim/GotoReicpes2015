<?php

#File name: events_db.php 
#File for Events -Model
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#April 2, 2015
#Reference: Class material -PDO Class

//EventsDB class (controller)
//Validation class

class EventsDB{
    //this class is a controller to connect Data from DB with pages in View
    //(1)GetEvents(): method for getting all the recipes
    //(2)GetEvent($event_id): method for getting an event (object) of a certain id
    //(3)deleteEvent(): method for deleting an event
    //(4)editEvent(): method for editing(updating) an event
    //(5)addEvent(): method for adding(inserting) an event
    
    public static function GetEvents(){
        //connect to the database
        $dbCon = Database::getDB();

        //query to retrieve events
        $query= "SELECT * FROM events ORDER BY event_start";
        
        //execute the query
        $result = $dbCon->query($query);
        
        //list of events
        $events = array();        
        
        foreach($result as $row){                               

        //instantiating a event object
        $event= new Event($row['event_name'], $row['event_start'], $row['event_end'], $row['event_location'], $row['event_detail'], $row['event_contactName'], $row['event_contactEmail'] );
        $event->setEventID($row['event_id']);
        $events[] =$event; //adding each event to the array of events as an element
        }
        return $events; //return an array        
    }
    
    public static function GetEvent($eventId){
        $dbCon=Database::getDB();
        $query="SELECT * FROM events WHERE event_id = '$eventId' ORDER BY event_start";
        $result = $dbCon->query($query);
        //convert result into array
        $row = $result -> fetch();
        
        $event = new Event($row['event_name'], $row['event_start'], $row['event_end'], $row['event_location'], $row['event_detail'], $row['event_contactName'], $row['event_contactEmail'] );
        $event->setEventID($eventId);
        
        return $event;  //return an object of the Event class 
    }
        
    public static function deleteEvent($eventId){
        try{
            //connect to DB
        $dbCon=Database::getDB();
        
        //query to delete the object of the given id, $dish_id
        $query="DELETE FROM events WHERE event_id=".$eventId;
        $q = $dbCon->prepare($query);
        $q->execute();
            
        //$row_count= exec($query);
        //return $row_count;
        //$dbCon->exec($query);  
        } 
        catch (Exception $ex) {
            $err= $ex->getMessage();
             echo $err;
             die();
        }        
    }
    
    public static function editEvent($eventId, $eventName, $eventStart, $eventEnd, $eventLoc, $eventDetail, $eventContactName, $eventContactEmail){
        
       try{
        //connect to DB
           $dbCon=Database::getDB();
        
        //query to UPDATE the table for the values passed by parameters of this method
        //http://www.phpeveryday.com/articles/PDO-Insert-and-Update-Statement-Use-Prepared-Statement-P552.html
        $query = "UPDATE events SET "
                . "event_name=?, "
                . "event_start=?, "
                . "event_end =?, "
                . "event_location =?, "
                . "event_detail=?, "
                . "event_contactName =?, "
                . "event_contactEmail =? "
                . "WHERE event_id=?";
               
        $statement = $dbCon->prepare($query);        
        $statement->execute(array(               
               $eventName,$eventStart,$eventEnd,$eventLoc,$eventDetail,$eventContactName,$eventContactEmail,$eventId));  
       } 
       catch (Exception $ex) {
           $err= $ex->getMessage();
           echo $err;
           die();
       } 
    }    
        
     public static function addEvent($event){
         try{
             
             //the parameter is an object of Event class
         //connectDB
         $dbCon=Database::getDB();
         
         //get the values of the object ($event) from functions/methods of Event class
         //event_id : Auto Incremented
         $eventName = $event -> getEventName();    
         $eventStart = $event -> getEventStart();
         $eventEnd = $event -> getEventEnd();
         $eventLoc = $event -> getEventLocation();
         $eventDetail = $event -> getEventDetail();
         $eventContactName = $event -> getEventContactName();
         $eventContactEmail= $event -> getEventContactEmail();
         
         //Insert the values of the object into the events table
         $query= "INSERT INTO events (event_name, event_start, event_end, event_location, event_detail, event_contactName, event_contactEmail)"
                 . "VALUES (:eventName, :eventStart, :eventEnd, :eventLoc, :eventDetail, :eventContactName, :eventContactEmail )";
         
         $statement = $dbCon->prepare($query);
        $statement -> bindParam(':eventName',$eventName, PDO::PARAM_STR, 100 );
        $statement -> bindParam(':eventStart', $eventStart,PDO::PARAM_STR, 50 );
        $statement -> bindParam(':eventEnd',$eventEnd, PDO::PARAM_STR, 50);
        $statement -> bindParam(':eventLoc', $eventLoc, PDO::PARAM_STR,  150);
        $statement -> bindParam(':eventDetail', $eventDetail,PDO::PARAM_STR, 250);
        $statement -> bindParam(':eventContactName', $eventContactName,PDO::PARAM_STR, 100);
        $statement -> bindParam(':eventContactEmail',$eventContactEmail,PDO::PARAM_STR, 100);
                                                         
        $statement->execute();              
    
         } catch (Exception $ex) {
             $err= $ex->getMessage();
              echo $err;
              die();
         }

         }        
         
}

class Validation{
    
}
