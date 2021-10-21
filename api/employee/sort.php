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

    $employee = [];
                
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         $employee[] = $row;
    }

   $response = [];
   $response['data'] =  $employee;

   echo json_encode($response, JSON_PRETTY_PRINT) . "\n";

  } else {
    // No Employee
    echo json_encode(
      array('message' => 'No Employee Found')
    );
  }