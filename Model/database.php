<?php

class Database{
    //Database class to create a database connection object(Php Data Object)    
    
//    private static $dsn='mysql:host=lotus.arvixe.com;dbname=gotorecipes_db';
//    private static $username = 'admin_gotorecipe';
//    private static $password ='recipe';
    
    private static $dsn='mysql:host=localhost;dbname=gotorecipes_db';
    private static $username = 'root';
    private static $password ='';
    
    //reference to db connection
    private static $dbCon;
    
public function __construct(){}
    
//return reference to pdo object
public static function getDB(){
    
            if(!isset(self::$dbCon)){
            //try to connec to db, alwasy use try and catch
                    try{
                        self::$dbCon = new PDO(self::$dsn, self::$username, self::$password);
                        //echo "PDO connected";
                    }
                    catch(PDOException $e){
                        $error_message= $e->getMessage();
                        include('../../../Errors/database_error.php');
                        exit();
                    }
            }  
            return self::$dbCon;
    }
}

//$pdo = Database::getDB();
?>