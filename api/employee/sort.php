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
    }

    // Turn to JSON & output

    print_r(json_encode($empl_arr));

  } else {
    // No Employee
    echo json_encode(
      array('message' => 'No Employee Found')
    );
  }