<?php

/**
 * Class calculator
 * Caculate multiplication result of two factors
 * Add record to db
 * Return result 
 */
require '../models/Calc.php';

class Calculator {

    private $factor_1;
    private $factor_2;

    //Get data from ajax and mulitply data ajax request
    public function miltiply(){

        if(isset($_POST['factor1']) && isset($_POST['factor1'])) {

            $this->factor_1 = (int)$_POST['factor1'];
            json_decode($this->factor_1);
            $this->factor_2 = (int)$_POST['factor2'];
            json_decode($this->factor_2);

            $this->result = ($this->factor_1 * $this->factor_2);
    
        }

        if($this->save_result($this->factor_1, $this->factor_2, $this->result)){
            $response = [
                'status' => 'success',
                'result' => $this->result
            ];
        
        }else {
            $response = [
                'status' => 'Not saved'
            ];
        }
        
        echo json_encode($response);
        
    }

    //Save data to db
    public function save_result($fac_1, $fac_2, $res) {
        
        $data = [
            'factor1' => $fac_1,
            'factor2' => $fac_2,
            'operation' => '*',   
            'result' => $res
          ];
          
          //add record to db
          $record = new Calc();
          if($record->addNewResult($data)){
              return true;
          }else {
              return false;
          }
    }
}

//Create a new object to intialize the class
$cal = new Calculator();
$cal->miltiply();


