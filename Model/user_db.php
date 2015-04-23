<?php

#File name: user_db.php 
#File for Register - Model
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#April 23, 2015

class UserDB {

    public static function GetUsers() {
//connect to the database
        $dbCon = Database::getDB();

//query to retrieve events
        $query = "SELECT * FROM users";

//execute the query
        $result = $dbCon->query($query);

//list of events
        $users = array();

        foreach ($result as $row) {

//instantiating a event object
            $user = new User($row['userName'], $row['password']);
            $user->setUserID($row['userId']);
            $users[] = $user; //adding each event to the array of events as an element
        }
        return $users; //return an array        
    }

    public static function GetUser($userId) {
        $dbCon = Database::getDB();
        $query = "SELECT * FROM users WHERE userId = '$userId' ";
        $result = $dbCon->query($query);
//convert result into array
        $row = $result->fetch();

        $user = new User($row['userName'], $row['password']);
        $user->setUserID($userId);

        return $user;  //return an object of the Event class 
    }

    public static function addUser($user) {
        try {

//the parameter is an object of Event class
//connectDB
            $dbCon = Database::getDB();

//get the values of the object ($event) from functions/methods of Event class
//event_id : Auto Incremented
            $userName = $user->getUserName();
            $password = $user->getPassword();

//Insert the values of the object into the events table
            $query = "INSERT INTO users (userName, password)"
                    . "VALUES (:userName, :password )";

            $statement = $dbCon->prepare($query);
            $statement->bindParam(':userName', $userName, PDO::PARAM_STR, 100);
            $statement->bindParam(':password', $password, PDO::PARAM_STR, 60);

            $statement->execute();
        } catch (Exception $ex) {
            $err = $ex->getMessage();
            echo $err;
            die();
        }
    }

    public static function editUser($userId, $userName, $password) {

        try {
            //connect to DB
            $dbCon = Database::getDB();

            //query to UPDATE the table for the values passed by parameters of this method
            //http://www.phpeveryday.com/articles/PDO-Insert-and-Update-Statement-Use-Prepared-Statement-P552.html
            $query = "UPDATE users SET "
                    . "userName =?, "
                    . "password =?, "
                    . "WHERE userId=?";

            $statement = $dbCon->prepare($query);
            $statement->execute(array(
                $userName, $password, $userId));
        } catch (Exception $ex) {
            $err = $ex->getMessage();
            echo $err;
            die();
        }
    }

    public static function deleteUser($userId) {
        try {
            //connect to DB
            $dbCon = Database::getDB();

            //query to delete the object of the given id, $dish_id
            $query = "DELETE FROM users WHERE userId=" . $userId;
            $q = $dbCon->prepare($query);
            $q->execute();
        } catch (Exception $ex) {
            $err = $ex->getMessage();
            echo $err;
            die();
        }
    }

}

?>