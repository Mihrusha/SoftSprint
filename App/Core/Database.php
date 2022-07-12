<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
  # server name
  private $sName = "localhost";
  # user name
  private $uName = "root";
  # password
  private $pass = "";

  # database name
  private $db_name = "soft_sprint";

  private $conn;

  protected static $instanse = null;

  public static function Instanse()
  {
    if (null == self::$instanse) {
      self::$instanse = new self();
    }
    return self::$instanse;
  }


  public function __construct()
  {

    try {
      $this->conn = new PDO(
        "mysql:host=$this->sName;dbname=$this->db_name",
        $this->uName,
        $this->pass
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection failed : " . $e->getMessage();
    }
  }

  public function Query($sql, $data = [], $class): array
  {
    $sth = $this->conn->prepare($sql);
    $sth->execute($data);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, $class);
    return $result;
  }

  public function execute($sql, $data):bool
  {
    $sth = $this->conn->prepare($sql);
    $result = $sth->execute($data);
    
    return $result;
  }

  public function lastId()
  {
    return $this->conn->lastInsertId();
  }

  
}
