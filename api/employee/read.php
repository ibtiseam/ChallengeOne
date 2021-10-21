<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Employee.php';

  $database = new Database();
  $db = $database->connect();

   $employee = new Employee($db);

   
    $result = $employee->read();
    // Get row count
    $num = $result->rowCount();
// Check if any empl
if($num > 0) {
    
    $empl_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $empl_item = array(
        'id' => $id,
        'Job_title' => $Job_title,
        'Salary' => $Salary,
        'Location' => $Location,
        'YearsExperience' => $YearsExperience
      );

      // Push to "data"
      array_push($empl_arr, $empl_item);
      // array_push($empl_arr['data'], $empl_item);
    }

    // Turn to JSON & output
    echo json_encode($empl_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Employee Found')
    );
  }