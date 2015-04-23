<?php
#File name: user.php 
#File for Register - Model
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#April 23, 2015


class User{
    //User class to create an object to PLACE DATA from the users table
    //Three(3) properties with methods to read/write such properties    
    //    userId  int(8):PRIMARY KEY of the table
    //    userName	varchar(100)
    //    password	datetime(60)
    
    
    private $userId, $userName, $password;
    
    public function __construct($username, $pw){
         
        $this->userName = $username;
        $this->password = $pw;         
    }
    
    public function getUserID(){
        return $this->userId;
    }
    
    public function setUserID($value){
        $this-> userId = $value;
    }
    
    public function getUserName(){
        return $this-> userName;
    }
    
    public function setUserName($value){
        $this-> userName = $value;
    }
    
    public function getPassword(){
        return $this-> password;
    }
    
    public function setPassword($value){
        $this-> password = $value;
    }
}

?>
    