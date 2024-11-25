<?php 

namespace DAO;

use \PDO as PDO;
use \Exception as Exception;

class Connection {

  private $pdo = NULL;
  private static $instance = NULL;

  private function __construct() {
    try {
      $this->pdo = new PDO(DSN, DB_USER, DB_PASS);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e) {
      throw $e;
    }
  }


  public static function GetInstance() {
    if(self::$instance == NULL) {
      self::$instance = new Connection();
    }
    return self::$instance;
  }


  public function getPDO() {
    return $this->pdo;
  }
  
}

?>