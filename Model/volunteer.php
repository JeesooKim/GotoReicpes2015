<?php

class Event{
    
    private $event_id, $event_name, $event_start, $event_end, $event_location,
            $event_detail, $event_contactName, $event_contactEmail;
    
    public function __construct($event_id,$event_name,$event_start,$event_end,
        $event_location,$event_detail, $event_contactName, $event_contactEmail){
        
        $this->event_id=$event_id;
        $this->event_name=$event_name;
        $this->event_start=$event_start;
        $this->event_end=$event_end;
        $this->evnet_location=$event_location;
        $this->event_detail=$event_detail;
        $this->event_contactName=$event_contactName;
        $this->event_contactEmail=$event_contactEmail;
    }
 
    public function getEventId(){
        return $this->event_id;
    }
    
    public function setEventId($value){
        $this->event_id=$value;
    }    
    
    public function getEventName(){
        return $this->event_name;
    }
    
    public function setEventName($value){
        $this->event_name=$value;
    }    

    public function getEventStart(){
        return $this->event_start;
    }
    
    public function setEventStart($value){
        $this->event_id=$value;
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
        return $this->event_detail;
    }
    
    public function setEventDetail($value){
        $this->event_detail=$value;
    }    

    public function getEventContactName(){
        return $this->event_contactName;
    }
    
    public function setEventContactName($value){
        $this->event_contactName=$value;
    }    

    public function getEventContactEmail(){
        return $this->event_contactEmail;
    }
    
    public function setEventContactEmail($value){
        $this->event_contactEmail=$value;
    }    

}

class Eventjob{
    
    private $event_id, $job_id, $job_title, $job_time, $regist_date;
    
    public function __construct($event_id, $job_id, $job_title, $job_time, $regist_date){
        
        $this->event_id=$event_id;
        $this->job_id=$job_id;
        $this->job_title=$job_title;
        $this->job_time=$job_time;
        $this->regist_date=$regist_date;
    }
 
    public function getEventId(){
        return $this->event_id;
    }
    
    public function setEventId($value){
        $this->event_id=$value;
    }    
    
    public function getJobId(){
        return $this->job_id;
    }
    
    public function setJobId($value){
        $this->job_id=$value;
    }    

    public function getJobTitle(){
        return $this->job_title;
    }
    
    public function setJobTitle($value){
        $this->job_title=$value;
    }    

    public function getJobTime(){
        return $this->job_time;
    }
    
    public function setJobTime($value){
        $this->job_time=$value;
    }    

    public function getRegistDate(){
        return $this->regist_date;
    }
    
    public function setRegistDate($value){
        $this->regist_date=$value;
    }    
    
}

class Volunteer{
    
    private $event_id, $job_id, $id, $name, $phone, $email, $regist_date;
    
    public function __construct($event_id, $job_id, $id, $name, $phone, $email, $regist_date){
        
        $this->event_id=$event_id;
        $this->job_id=$job_id;
        $this->id=$id;
        $this->name=$name;
        $this->phone=$phone;
        $this->email=$email;
        $this->regist_date=$regist_date;
    }
 
    public function getEventId(){
        return $this->event_id;
    }
    
    public function setEventId($value){
        $this->event_id=$value;
    }    
    
    public function getJobId(){
        return $this->job_id;
    }
    
    public function setJobId($value){
        $this->job_id=$value;
    }    

    public function getId(){
        return $this->id;
    }
    
    public function setId($value){
        $this->id=$value;
    }    

    public function getName(){
        return $this->name;
    }
    
    public function setName($value){
        $this->name=$value;
    }    

    public function getPhone(){
        return $this->phone;
    }
    
    public function setPhone($value){
        $this->phone=$value;
    }    

    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($value){
        $this->email=$value;
    }    

    public function getRegistDate(){
        return $this->regist_date;
    }
    
    public function setRegistDate($value){
        $this->regist_date=$value;
    }    
    
}

?>