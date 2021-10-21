<?php 
  class Database {

    /**** Development connection******/

    private $host = 'localhost';
    private $db_name = 'challenge';
    private $username = 'root';
    private $password = '';
    private $conn;

   /***Remote DB connection***/

    // private $host = 'remotemysql.com';
    // private $db_name = 'KinMGoU174';
    // private $username = 'KinMGoU174';
    // private $password = 'xmX1VMB83n';
    // private $conn;
    
    // DB Connect
    public function connect() {
      $this->conn = null;

   
      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }