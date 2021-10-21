<?php 
  class Employee {
    // DB stuff
    private $conn;
    private $table = 'employee';

    // Post Properties
    public $id;
    public $Job_title;
    public $Salary;
    public $Location;
    public $YearsExperience;
    public $sort;
    public $fields;

  
    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }
        
                             /**************Get employee*****************/ 
        public function read() {
            // Create query
            $query = 'SELECT id, Job_title , Salary, Location, YearsExperience
                                      FROM '  . $this->table  ;
            
            // Prepare statement
            $stmt = $this->conn->prepare($query);
      
            // Execute query
            $stmt->execute();
      
            return $stmt;
          }

                        /**************Get employee by Job & Salary*****************/ 
      public function read_job_salary() {
        // Create query
        $query = 'SELECT id, Job_title , Salary, Location, YearsExperience
                                  FROM ' . $this->table . ' 
                                  WHERE
                                  Job_title = ? and Salary = ?
                                  ';    

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->Job_title, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->Salary, PDO::PARAM_INT);

        // Execute query
        $stmt->execute();

        return $stmt;
  }
                              /**************Get employee by id*****************/ 
     public function read_single() {
        // Create query
        $query = 'SELECT id, Job_title , Salary, Location, YearsExperience
                                  FROM ' . $this->table . ' 
                                  WHERE
                                    id = ?
                                  LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->Job_title = $row['Job_title'];
        $this->Salary = $row['Salary'];
        $this->Location = $row['Location'];
        $this->YearsExperience = $row['YearsExperience'];
  }

                       /**************Get employee by Job & Salary*****************/ 
                       public function sort() {
                        // Create query
                        $query = 'SELECT id, Job_title , Salary, Location, YearsExperience
                                                  FROM ' . $this->table . ' 
                                                 order by ? desc
                                                  ';    
                
                        // Prepare statement
                        $stmt = $this->conn->prepare($query);
                
                        // Bind ID
                        $stmt->bindParam(1,$this->sort);
                
                        // Execute query
                        $stmt->execute();
                
                        return $stmt;
                  }

                     /**************Get employee by Job & Salary & Experience*****************/ 
                     public function read_single_employee() {
                        // Create query
                        $query = 'SELECT id, Job_title , Salary, Location, YearsExperience
                                                  FROM ' . $this->table . ' 
                                                   WHERE
                                                   Job_title = "Software Engineer III" and
                                                    Salary =89000 and 
                                                   Location="Oklahoma"
                                                  ';    
                
                        // Prepare statement
                        $stmt = $this->conn->prepare($query);
                
                        // Bind ID
                        $stmt->bindParam(1,$this->fields);
                
                         // Execute query
                        $stmt->execute();

                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                        // Set properties
                        $this->Job_title = $row['Job_title'];
                        $this->Salary = $row['Salary'];
                        $this->Location = $row['Location'];
                        $this->YearsExperience = $row['YearsExperience'];
                     }
                   
                  
  
        }