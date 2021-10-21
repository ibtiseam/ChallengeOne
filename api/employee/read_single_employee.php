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
  $employee->read_single_employee();

  // Create array
  $employee_arr = array(
    'Job_title' => $employee->Job_title,
    'Salary' => $employee->Salary,
    'Location' => $employee->Location,
    'YearsExperience' => $employee->YearsExperience
  );

  // Make JSON
  print_r(json_encode($employee_arr));