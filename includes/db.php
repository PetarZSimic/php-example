<?php

 class Database {
    private static $db = NULL;

    public function __construct() {        
    }

    public static function getInstance() {
        if (static::$db == NULL) {                                          
            static::$db = mysqli_connect('localhost','root','','cars_db');   
        }
        return static::$db; 
    }
}    
    
$connection = Database::getInstance();

if(!$connection){    
    die(mysqli_error($connection));
}
?>