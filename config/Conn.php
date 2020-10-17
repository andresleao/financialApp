<?php 

class Conn {

  private static $host = "localhost";
  private static $user = "root";
  private static $pass = "12345";
  private static $dbname = "financialdb";
  private static $connection = null;

  private static function connect()
  {
    
    try {
      if(self::$connection == null){
  	    self::$connection = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname, self::$user, self::$pass);
      }
    } catch(Exception $e){
      echo "Mensagem: " . $e->getMessage();
    }

    return self::$connection;
  } 

  public function getConn()
  {
     return self::connect();
  }
}





