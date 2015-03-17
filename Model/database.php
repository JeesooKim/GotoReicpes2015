<?php

class Database {

    private static $dsn = 'mysql:host=lotus.arvixe.com;dbname=gotorecipes_db';
    private static $username = 'admin_gotorecipe';
    private static $password = 'recipe';
    //reference to db connection
    private static $db;

    private function __construct() {}

    //return reference to pdo object
    public static function getDB () {

        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
                //echo "CONNECTED";
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../Errors/database_error.php');
                exit();
            }
            
        }
        return self::$db;
    }
    
}

//$pdo = Database::getDB();

?>


