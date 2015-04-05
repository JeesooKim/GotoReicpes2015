<?php
#File name: event.php 
#File for Events -Model
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#April 2, 2015
#Reference: Class material -PDO Class

class Event{
    //Event class to create an object to PLACE DATA from the events table
    //Eight(8) properties with methods to read/write such properties    
    //    event_id  int(11):PRIMARY KEY of the table
    //    event_name	varchar(100)
    //    event_start	datetime(6)
    //    event_end	datetime(6)
    //    event_location	varchar(150)
    //    event_detail	varchar(250)
    //    event_contactName   varchar(100)	
    //    event_contactEmail    varchar(100)
    
    private $event_id, $event_name, $event_start, $event_end, $event_location, $event_detail, $event_contactName, $event_contactEmail;
    
    public function __construct($eventName, $eventStart, $eventEnd, $eventLoc, $eventDetail, $eventContactName, $eventContactEmail){
         
        $this->even_name = $eventName;
        $this->event_start =$eventStart; 
        $this->event_end= $eventEnd;
        $this->event_location= $eventLoc;
        $this->event_detail=$eventDetail;
        $this->event_contactName=$eventContactName;
        $this->event_contactEmail=$eventContactEmail;
    }
    
    public function getEventID(){
        return $this->event_id;
    }
    public function setEventID($value){
        $this->event_id=$value;
    }
    
    public function getEventName(){
        return $this->even_name;
    }
    public function setEventName($value){
        $this->even_name=$value;
    }
    
    public function getEventStart(){
        return $this->event_start;
    }
    public function setEventStart($value){
        $this->event_start=$value;
    }
    
    public function getEventEnd(){
        return $this->event_end;
    }
    public function setEventEnd($value){
        $this->event_end=$value;
    }
        
    public function getEventLocation(){
        return $this->event_location;
    }
    public function setEventLocation($value){
        $this->event_location=$value;
    }
    
    public function getEventDetail(){
        return  $this->event_detail;
    }
    public function setEventDetail($value){
         $this->event_detail=$value;
    }
   
    public function getEventContactName(){
        return $this->event_contactName;
    }
    public function setEventContactName($value){
        $this->event_contactName =$value;
    }
        
    public function getEventContactEmail(){
        return $this->event_contactEmail;
    }
    public function setEventContactEmail($value){
        $this->event_contactEmail =$value;    
    }
}


