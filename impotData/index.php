<?php
          $connect = mysqli_connect("localhost", "root", "", "challenge"); 
          $query = '';
          $table_data = '';
          $filename = "data.json";
          $data = file_get_contents($filename); 
          $array = json_decode($data, true); 
		  //Extract the Array Values by using Foreach Loop
          foreach($array as $row)
		  {
			   $sql = "INSERT INTO employee(Job_title, Salary, Location, YearsExperience) VALUES 
			   ('".$row["Job_title"]."', '".$row["Salary"]."', '".$row["Location"]."', 
			   '".$row["YearsExperience"]."') ";  // Make Multiple Insert Query 
			   mysqli_query($connect, $sql); 
          }
	
		echo "Imported JSON Data";
 




          ?>
  