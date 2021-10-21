<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Employee.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate employee object
  $employee = new Employee($db);


  // Get employee
  $result = $employee->sort();
  

    // Get row count
    $num = $result->rowCount();
// Check if any empl
if($num > 0) {
    
    $empl_arr = array();

    $employe = [];
                
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
         $employe[] = $row;
    }

   $response = [];
   $response['data'] =  $employe;

   echo json_encode($response, JSON_PRETTY_PRINT) . "\n";

  } else {
    // No Employee
    echo json_encode(
      array('message' => 'No Employee Found')
    );
  }