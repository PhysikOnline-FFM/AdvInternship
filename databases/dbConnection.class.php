<?php
/**
 * Handles the database connection to 'fpraktikum' and 'alias'
 * 
 * @author 	Bastian Krones
 * @date 	06.01.2017
 */
class DbConnection
{
  protected $db;

  public function __construct($dbLink, $dbName, $dbUser, $dbPassword)
  {
    try{
	    $this->db = new PDO('mysql:host=' . $dbLink . ';dbname=' . $dbName, $dbUser, $dbPassword);
    } catch(PDOException $e) {
      echo 'Konnte keine Verbinung herstellen: ' . $e->getMessage();
    }
  }

  public function prepare($query)
  {
    $stmt = $this->db->prepare($query);
    if (!$stmt) {
      die("Error ".$this->db->error);
    }
    return $stmt; 
  }

  public function __destruct()
  {
      // throws error $this->db would be undefined
      //$this->db->close();
  }
}