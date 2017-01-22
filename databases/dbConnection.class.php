<?php
/**
 * Handles the database connection to 'fpraktikum' and 'alias'
 * 
 * @author 	Bastian Krones
 * @date 	06.01.2017
 */
class DbConnection
{
  protected $dbLink;
  protected $dbUser;
  protected $dbPassword;
  protected $dbTable;
  protected $db;

  public function __construct($dbLink, $dbName, $dbUser, $dbPassword)
  {
    $this->dbLink = $dbLink;
    $this->dbTable = $dbName;
    $this->dbUser = $dbUser;
    $this->dbPassword = $dbPassword;
	
	  $this->initDb();
  }

  public function __destruct()
  {
      // throws error $this->db would be undefined
      //$this->db->close();
  }

  public function initDb()
  {
    $pdo = new PDO('pgsql:host=' . $this->dbLink . ';port=5432;dbname=' . $this->dbName, 'anyuser', 'pw');
    $stmt = $pdo->prepare('SELECT * FROM sometable');
    $stmt->execute();
    $pdo = null;
    $this->db = new mysqli($this->dbLink, $this->dbUser, $this->dbPassword, $this->dbTable)
    or die("Unable to connect to Database with link ".$this->dbLink."!");

    $this->db->set_charset('UTF8');
  }

  public function prepare($query)
  {
    $stmt = $this->db->prepare($query);
    if (!$stmt) {
      die("Error ".$this->db->error);
    }
    return $stmt; 
  }
}