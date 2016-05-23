<?php

  //Singleton Class for Database connection

  class dbConn {
    
    protected static $db;

    private function __construct() {
      
      try{
        
	//assign PDO object to db Variable

	self::$db = new PDO('mysql:host=sql2.njit.edu;dbname=yk92;', 'yk92','kc8PZ8Mz');
	self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (PDOException $e) {
        echo "Connection Error: "  . $e->getMessage();
      }
    }

    public static function getConnection() {
      
      //Guarantee single instance, if no connection object exists create one

      if(!self::$db) {
        //new connection object
	new dbConn();
      }

      //return the connection
      return self::$db;
    }
  
  }


