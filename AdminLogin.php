<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "poovarasan@13";
$dbname = "exitsurvey";




$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$dept = "";
$batch ="";
$batchh="";
$academic="";
$department="";
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $dept = $_POST['Dept'];
    $_SESSION['Dept']=$dept;
    $batch =  $_POST['batch'];
    $academic=$_POST['academic'];
    
    if ($dept == "ALL" ) {
      
        $department = "ALL"; 
        $_SESSION['Department'] = $department;
        $_SESSION['academic'] = $academic;
      
        $_SESSION['batch'] = $batch;
        $sql = "SHOW TABLES LIKE '%$batch%'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
         
                header("Location: EndSurvey.php");
               
               
            }
            }
        else{
            echo "<script> alert('table')</script> ";
        }
        
          
 } else {
        // Fetch feedback based on selected department and batch
        $department = $dept . $batch;
     
    
    
   
    $_SESSION['Department'] = $department;
 $_SESSION['batch']=$batch;
 $_SESSION['academic'] = $academic;

  
   

        $checkTableQuery = "SHOW TABLES LIKE '$department'";
        $tableExists = $conn->query($checkTableQuery)->num_rows > 0;

        if ($tableExists) {
            $sq = "SELECT * FROM $department";
            $res = mysqli_query($conn, $sq);
            $rescheck = mysqli_num_rows($res);

            if ($rescheck > 0) {
                $_SESSION['Department'] = $department;
                header("Location: EndSurvey.php");
                //?dept=" . urlencode($department));
             
            }
           
        }
     
       
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>End Survey</title>
    <link rel="stylesheet" href="CSStyle.css">
    <link rel="stylesheet" href="AdminPageStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <script>
        //   document.addEventListener('DOMContentLoaded', function () {
        //     // Reset the specific form fields when the page loads
        //     document.getElementsByName("Dept")[0].value = "ALL";
        //     document.getElementsByClassName("Select_Input")[0].value = "2022-2026";
        // });

        // function validateForm() {
        //     var deptValue = document.getElementsByName("Dept")[0].value;

        //     if (deptValue === "ALL") {
        //         // Display an error message
        //         document.getElementById("error-message").innerText = "Please select a department.";
        //         return false;
        //     } else {
        //         // Clear the error message
        //         document.getElementById("error-message").innerText = "";
        //         return true;
        //     }
        // }
    </script>
    <style>
        
.login_logo{
    width: 400px;
 height: 100px;
    margin: 0px auto;
    margin-top: 10px;
}
    </style>
</head>
<body>
    <center>
        
        <form method="POST" action="" onsubmit="return validateForm();">
        <img src="Logo.avif" class="login_logo">
            <p>
                <b style="font-weight: 600;">Select Department : &ensp;</b>
                <select name="Dept">   
                    <option value="ALL">ALL</option>
                    <option value="IT">IT</option>
                    <option value="AD">AI&DS</option>
                    <option value="CE">Civil</option>
                    <option value="CD">CSD</option>
                    <option value="CS">CSE</option>
                    <option value="CT">CST</option>
                    <option value="CY">Cyber Security</option>
                    <option value="EC">ECE</option>
                    <option value="EE">EEE</option>
                    <option value="ET">ETE</option>
                    <option value="ME">Mech</option>
                    <!-- Add other department options -->
                </select>
                <br><br><br>
                <b style="font-weight: 600;">Select Batch : &ensp;</b>
                <select   name="batch">
                     
                     <option value="2024">2020-2024</option>
                    <option value="2025">2021-2025</option>
                    <option value="2026">2022-2026</option>
                    <option  value="2027">2023-2027</option>
                    <option value="2028">2024-2028</option>
                    <option value="2029">2025-2029</option>
                    <!-- Add other batch options -->
                </select>
                <br><br><br>
                <b style="font-weight: 600;">Select Academic : &ensp;</b>
                
                <select   name="academic">
                     
                     <option value="2024">2023-2024</option>
                    <option value="2025">2024-2025</option>
                    <option value="2026">2025-2026</option>
                    <option  value="2027">2026-2027</option>
                    
                </select>
                <button class="Admin_Login_Button-2" type="submit" name="submit">Get Data</button>
                <input type="button" class="Admin_Login_Button-2" type="submit" onclick="window.location='Insert.php';" value="Insert data">
            </p>
            <br>
            <p style="color:red"><?php echo $error_message; ?></p>
        </form>
    </center> 
</body>
</html>
