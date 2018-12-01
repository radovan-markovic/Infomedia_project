<?php

require('../libraries/Database.php');

class Calc {

    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }

    public function addNewResult($data){

      $this->db->query('INSERT INTO multiplication (factor1, factor2, operation, result) 
      VALUES (:factor1, :factor2, :operation, :result)');

      // Bind Values
      $this->db->bind(':factor1', $data['factor1']);
      $this->db->bind(':factor2', $data['factor2']);
      $this->db->bind(':operation', $data['operation']);
      $this->db->bind(':result', $data['result']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
}