<?php

$servername = "localhost";
$username = "root";
$password = "poovarasan@13";
$dbname = "exitsurvey";

 $conn=mysqli_connect($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} $tableName="data_kce";
$checkTableQuery = "SHOW TABLES LIKE '$tableName'";
$tableExists = $conn->query($checkTableQuery)->num_rows > 0;

if (!$tableExists) {$SQL="CREATE TABLE data_kce (
    Degree varchar(10),
    Dept varchar(10),
    Department varchar(100),
    RollNo varchar(20),
    Name varchar(100),
    Section varchar(3),
    Batch varchar(20),
    Password varchar(10)
    )";
  $sqltable = mysqli_query($conn,$SQL);
  if($sqltable){
      echo"table created";
  }
  else{
      echo"Error to create a table";
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $csvType = array('application/vnd.ms-excel', 'text/plain', 'text/csv');
    if (in_array($_FILES["file"]["type"], $csvType)) {
        if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
            $file = fopen($_FILES["file"]["tmp_name"], "r");
            $headers = fgetcsv($file); // Get the header row from CSV
            
            // Fetch column names of the database table
            $tableColumns = array();
            $result = $conn->query('SHOW COLUMNS FROM data_kce');
            while ($row = $result->fetch_assoc()) {
                $tableColumns[] = $row['Field'];
            }
            
            // Check if CSV headers match table columns
            if (count($headers) !== count($tableColumns) || !empty(array_diff($headers, $tableColumns))) {
                echo "<script>alert('CSV column headers do not match the table columns.');</script>";
                // Exit the script if columns don't match
                exit();
            }
            
            $sql = "INSERT INTO data_kce (" . implode(", ", $tableColumns) . ") VALUES ";
            $rows = [];
            while (($row = fgetcsv($file)) !== FALSE) {
                // Ensure that the number of columns in the row matches the number of table columns
                if (count($row) !== count($tableColumns)) {
                    echo "<script>alert('The number of columns in the CSV file does not match the table columns.');</script>";
                    exit();
                }
                $rows[] = "('" . implode("','", $row) . "')";
            }
            $sql.=implode(",", $rows);
            if ($conn->query($sql)) {
                echo "<script>alert('upload successfully');</script>";
            } else {
                echo "Failed. Please try again";
            }
        }
    } else {
        echo "<script>alert('Please upload CSV files');</script>";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <style>
    body{
    background-image: url('Background Pic 1.avif');
    background-repeat: no-repeat;
    background-size: cover;
}
.sin{
    text-align: center;
    border-radius: 20px;
    margin: 0px auto;
    margin-top: 2%;
    background-color: rgba(255, 255, 255, 0.507);
    border-radius: 10px;
    backdrop-filter: blur(30px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    letter-spacing: 1px;
    padding: 30px 35px
}
.bibin{
    margin-top: 50px;
    margin-left: 85px;
    width: 200px;
    outline: none;
    border: none;
    background-color: rgb(250, 250, 250);
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 10px;
    cursor: pointer;
}
p{
    font-size: 30px;
   
}
/* input[type="file"] {
    display: block;
    width: 0;
    height: 0;
} */
input:hover,
input:active{
    box-shadow: 0 0 8px rgb(84, 149, 224);
}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // function choose(){
        //     $('input').click();
        // }
    </script>
</head>
<body>  
    <div class="sin">
    <p> Insert the Data </p>
    <form method="POST"  action="" enctype='multipart/form-data'>
        <input type="file" name='file' size="chars" required>
        <!-- <input type="button" class="bibin" onclick="choose()" value="Choose File"> -->
        <!-- <input  type='file' placeholder="Choose File" required> -->
        <input class="bibin" type='submit' value='Insert' name='submit'>
        
</form>

</div>
 
</body>
</html>