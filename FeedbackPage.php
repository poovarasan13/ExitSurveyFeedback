
<?php

$servername = "localhost";
$username = "root";
$password = "poovarasan@13";
$dbname = "exitsurvey";

 $con=mysqli_connect($servername,$username,$password,$dbname);

session_start();


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
//question
$question="SELECT * FROM question";

$res = $con->query($question);
$i=1;

if ($res->num_rows > 0) {
    // Output data of each row
    while($row = $res->fetch_assoc() ) {
        ${"q$i"} =  $row["question"] ;
        $i=$i+1;
        
    }
} 
else {
    
}

$currentCount=0;


$rollno=$_SESSION['rollno'];

$tableName = $_SESSION['Dept'].$_SESSION['Batch'];

$checkTableQuery = "SHOW TABLES LIKE '$tableName'";


$tableExists = $con->query($checkTableQuery)->num_rows > 0;

if (!$tableExists   ) {
    $createTableQuery = "CREATE TABLE IF NOT EXISTS $tableName (
       
        name VARCHAR(50) NOT NULL,
        rollno VARCHAR(13) NOT NULL,
        department VARCHAR(20) NOT NULL,
        number VARCHAR(10) NOT NULL,
        email VARCHAR(30) NOT NULL,
        column1 INT NOT NULL DEFAULT 0,
        column2 INT NOT NULL DEFAULT 0,
        column3 INT NOT NULL DEFAULT 0,
        column4 INT NOT NULL DEFAULT 0,
        column5 INT NOT NULL DEFAULT 0,
        column6 INT NOT NULL DEFAULT 0,
        column7 INT NOT NULL DEFAULT 0,
        column8 INT NOT NULL DEFAULT 0,
        column9 INT NOT NULL DEFAULT 0,
        column10 INT NOT NULL DEFAULT 0,
        column11 INT NOT NULL DEFAULT 0,
        column12 INT NOT NULL DEFAULT 0,
        column13 INT NOT NULL DEFAULT 0,
        column14 INT NOT NULL DEFAULT 0,
        column15 INT NOT NULL DEFAULT 0,
        column16 INT NOT NULL DEFAULT 0,
        column17 INT NOT NULL DEFAULT 0,
        column18 INT NOT NULL DEFAULT 0,
        column19 INT NOT NULL DEFAULT 0,
        column20 INT NOT NULL DEFAULT 0,
        column21 INT NOT NULL DEFAULT 0,
        column22 INT NOT NULL DEFAULT 0,
        column23 INT NOT NULL DEFAULT 0,
        column24 INT NOT NULL DEFAULT 0,
        column25 INT NOT NULL DEFAULT 0,
        column26 INT NOT NULL DEFAULT 0,
        column27 INT NOT NULL DEFAULT 0,
        column28 INT NOT NULL DEFAULT 0,
        column29 INT NOT NULL DEFAULT 0,
        column30 INT NOT NULL DEFAULT 0,
        column31 INT NOT NULL DEFAULT 0,
        column32 INT NOT NULL DEFAULT 0,
        column33 INT NOT NULL DEFAULT 0,
        column34 INT NOT NULL DEFAULT 0,
        column35 INT NOT NULL DEFAULT 0,
        column36 VARCHAR(100) NOT NULL,
        column37 VARCHAR(100) NOT NULL,
        column38 VARCHAR(100) NOT NULL,
        gate int
    )";
    

if ($con->query($createTableQuery) === FALSE) {
    die("Error creating table: " . $con->error);
}}
 if($tableExists){
//$check = "SELECT COUNT(*) as count FROM $tableName WHERE RollNo = '$rollno' ";
$check = "SELECT RollNo FROM $tableName WHERE RollNo = '$rollno' ";
$resultt=$con->query($check);
if($resultt->num_rows>0)
{
    while($row=$resultt->fetch_assoc())
    { $currentCount=  1;
      //  $currentCount=  $row["count"];
    }
}
if($currentCount == 1)
{ header("Location:Already.html");
   exit();
}
}
if($tableExists){
    // $multiple="multi";
    // $yes="yes_no";
$tableName = $_SESSION['Dept'].$_SESSION['Batch'];

    
if (isset($_POST['submit'])){

    $checkTableQuery = "SHOW TABLES LIKE '$tableName'";
    $tableExists = $con->query($checkTableQuery)->num_rows > 0;
   

$name=$_SESSION['name'];
$rollno=$_SESSION['rollno'];
$batch=$_SESSION['Batch'];
$dept= $_SESSION['Dept'];




$number=$_POST["number"];
$email=$_POST['email'];
$q1=$_POST["Q1"] ; 
$q2=$_POST["Q2"] ;   
$q3=$_POST["Q3"] ;   
$q4=$_POST["Q4"] ;   
$q5=$_POST["Q5"] ;   
$q6=$_POST["Q6"] ;   
$q7=$_POST["Q7"] ;   
$q8=$_POST["Q8"] ;   
$q9=$_POST["Q9"] ;   
$q10=$_POST["Q10"] ;   
$q11=$_POST["Q11"] ;   
$q12=$_POST["Q12"] ;   
$q13=$_POST["Q13"] ;   
$q14=$_POST["Q14"] ;   
$q15=$_POST["Q15"] ;   
$q16=$_POST["Q16"] ;   
$q17=$_POST["Q17"] ;   
$q18=$_POST["Q18"] ;   
$q19=$_POST["Q19"] ;   
$q20=$_POST["Q20"] ;   
$q21=$_POST["Q21"] ;   
$q22=$_POST["Q22"] ;   
$q23=$_POST["Q23"] ;   
$q24=$_POST["Q24"] ;   
$q25=$_POST["Q25"] ;   
$q26=$_POST["Q26"] ;
$q27=$_POST["Q27"] ;  

$q28=$_POST["Y1"] ;   
$q29=$_POST["Y2"] ;  
$q30=$_POST["Y3"] ;   
$q31=$_POST["Y4"] ;   
$q32=$_POST["Y5"] ; 
$q33=$_POST["Y6"] ;
$q34=$_POST["Q28"];
$q35=$_POST["Q29"];
$q36=$_POST["comment1"];
 $q37=$_POST["comment2"];
$q38=$_POST["comment3"];
$q39=0;
$q39=$_POST["additionalInfo"];



    $stmt =$con->prepare("INSERT INTO $tableName(name,rollno,department,number,email,column1,column2,column3,column4,column5,column6,column7,column8,column9,column10,
                                                                        column11,column12,column13,column14,column15,column16,column17,column18,column19,column20,
                                                                        column21,column22,column23,column24,column25,column26,column27,column28,column29,column30,
                                                                        column31,column32,column33,column34,column35,column36,column37,column38,gate)  VALUES  (
                                                                                                            ?,?,?,?,?,?,?,?,?,?,
                                                                                                            ?,?,?,?,?,?,?,?,?,?,
                                                                                                            ?,?,?,?,?,?,?,?,?,?,
                                                                                                            ?,?,?,?,?,?,?,?,?,?,
                                                                                                            ?,?,?,?) " );
     $stmt->bind_param("sssssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiisssi",
     $name, $rollno, $dept, $number,$email,
     $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10,
     $q11, $q12, $q13, $q14, $q15, $q16, $q17, $q18, $q19, $q20,
     $q21, $q22, $q23, $q24, $q25, $q26, $q27, $q28, $q29, $q30,
     $q31, $q32, $q33, $q34,
     $q35, $q36, $q37, $q38,$q39);

  
                                                             
                                                             $stmt->execute();

                                                             // Close statement
                                                             $stmt->close();




     header("Location:ThankyouPage.php");
   exit();
 } }
$department=$_SESSION['Dept'];
 $sql="SELECT * FROM psos WHERE department='$department' ";

 $result=mysqli_query($con,$sql);
 
 
 if ($result->num_rows > 0) 
 {  while($row = mysqli_fetch_assoc($result)){
   
 //  $name=  $row["name"];
  // $batch=$row["batch"];
   $question1=$row["question1"];
   $question2=$row["question2"];
 
  // $converted=preg_replace('/-/','_',$row["Batch"]);
  // $_SESSION['Batch']=$converted;
 
  }
 }
 
// Close the connection

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- <script src="Feedback_JS.js"></script> -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <!-- <script src="Feedback_JS.js">
            <script src=""> -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        

.yes input{
    opacity: 1;
    display: inline;
    height: 15px; 
    width: 15px;    
}

.yes label{
    color: black;
    display: inline;
    margin-top: 0px;
    margin-left: 3%;
    font-size: 16px;
    font-weight: 500;
}
        *{
            font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: normal;
        }
        /* kce-logo-info-box */
        .logo{
            height: 75px;
            width: 75px;
        }

        body{
        background-repeat: no-repeat;
        background-size: cover;
        }
        
        input[type="radio"]{
            opacity: 0;
        }
        .rb{
            margin-top: -30px;
        }
        .rb-star {
        font-size: 2em;
        color: rgba(0, 0, 0, 0.5);
        cursor: pointer;
        transition: color 0.3s;
        }

        .rb-star:hover,
        .rb-star.checked {
        color: rgb(235, 209, 18);
        }
        .col-12{
            margin-top:30px;
        }

        .form-check-input1 + label {
            margin-right: 50px;         }
            .form-check-input2+ label {
            margin-right: 50px;         }

            #textboxContainer {
            display: none;
            
                   }
        .form-check-input1, .form-check-input2 {
            opacity: 1;
        }

        /* #additionalInfo {
            width: 100px; 
        }
        #text{
            margin-right:100px;
        } */
     </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.rb-star');

    stars.forEach((star) => {
        star.addEventListener('click', function () {
            const value = parseInt(star.dataset.value);
            const ratingContainer = star.parentNode.parentNode;
            const stars = ratingContainer.querySelectorAll('.rb-star');

            stars.forEach((s, index) => {
                if (index < value) {
                    s.classList.add('checked');
                } else {
                    s.classList.remove('checked');
                }
            });

            // Update the hidden input value (if needed)
            const input = ratingContainer.querySelector('input[type="hidden"]');
            if (input) {
                input.value = value;
            }
        });
    });
});
        function next1(event){
            document.getElementById("form1").style.display="none";
            document.getElementById("form2").style.display="block";
            document.getElementById("form3").style.display="none";
            document.getElementById("form4").style.display="none";
            document.getElementById("form5").style.display="none";
            document.getElementById("form6").style.display="none";
            event.preventDefault();
        }
        function next2(event){
            document.getElementById("form1").style.display="none";
            document.getElementById("form2").style.display="none";
            document.getElementById("form3").style.display="block";
            document.getElementById("form4").style.display="none";
            document.getElementById("form5").style.display="none";
            document.getElementById("form6").style.display="none";
            event.preventDefault();
        }
        function next3(event){
            document.getElementById("form1").style.display="none";
            document.getElementById("form2").style.display="none";
            document.getElementById("form3").style.display="none";
            document.getElementById("form4").style.display="block";
            document.getElementById("form5").style.display="none";
            document.getElementById("form6").style.display="none";
            event.preventDefault();
        }
        function next4(event){
            document.getElementById("form1").style.display="none";
            document.getElementById("form2").style.display="none";
            document.getElementById("form3").style.display="none";
            document.getElementById("form4").style.display="none";
            document.getElementById("form5").style.display="block";
            document.getElementById("form6").style.display="none";
            event.preventDefault();
        }
        function next5(event){
            document.getElementById("form1").style.display="none";
            document.getElementById("form2").style.display="none";
            document.getElementById("form3").style.display="none";
            document.getElementById("form4").style.display="none";
            document.getElementById("form5").style.display="none";
            document.getElementById("form6").style.display="block";
            event.preventDefault();
        }

    </script>
</head>
<body style="background-image: url('Background Pic 1.avif');">
    
    <!-- user-dashboard -->
   <form action="" method="post">
    <!-- Form 1 -->
        <div id="form1">
            <div class="container mt-5" > 
                <div class="row">
                <div class="col-4">
                </div>
                <div class=" col-12 col-md-4 mt-5 p-md-0 p-3">
                    <!-- dashboard-form -->
                        <div class="card">
                            <div class="my-5">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center align-items-center ">
                                                    <img src="Logo 1.avif" class="logo rounded-circle " alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-10 col-12">
                                            <div class="text-start">
                                                <h6 class=" fs-6">Name:<span><?php echo $_SESSION['name']; ?></span></h6>
                                                <h6 class=" fs-6">Roll No:<span><?php echo $_SESSION['rollno']; ?></span></h6>
                                                <h6 class=" fs-6">Branch:<span> <?php echo $_SESSION['Dept']; ?></span></h6>
                                                <h6 class=" fs-6">Batch:<span> <?php echo $_SESSION['Batch']-4; ?>-<?php echo $_SESSION['Batch']; ?></span></h6>
                                            </div>
                                            <!-- input-field -->
                                                <div class="mt-3">
                                                    <div class="form-floating mb-3" id="nerrorr1">
                                                        <input type="tel" class="form-control" id="number" name="number" placeholder="Number" required>
                                                        <label for="floatingInput">Phone Number</label>
                                                    </div>
                                                    <div class="form-floating" id="nerrorr">
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                                        <label for="floatingPassword">Email </label>
                                                    </div>
                                                </div>
                                                <!-- input-field -->
                                            </div>
                                            <div class="col-md-1">
        
                                            </div>
                                            <div class="container mt-3">
                                                <div class="align-items-center justify-content-center d-flex ">
                                                    <input type="button" class="btn btn-primary rounded-5 " onclick="form_check1()" value="Next">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-md-4">
                </div>
                </div>
            </div>
        </div>

        <!-- Form 2 -->
        <div class="radio">
            <div id="form2" style="display: none;">
                <div class="container my-5" > 
                    <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class=" col-12 col-lg-6 mt-5 p-md-0 p-3">
                        <!-- card -->
                        
                                <div class="card  bg-white bg-gradient ">
                                    <div class="my-5">
                                    <div class="">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-center ">
                                                        <img src="Logo 1.avif" class="logo rounded-circle " alt="">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                <h5>Name:<?php echo $_SESSION['name']; ?></h5>
                                                 </div>

                                                 <div class="col-12 mt-3">
                                                <h5>Roll No:<?php echo $_SESSION['rollno']; ?></h5>
                                                 </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                            <h5 style="text-align:center; font-weight:bold">I.General Aspects(GA)</h5>
                                            <div class="form-check">
                                            <div class="form-check">
                                                 <label id="errory1"><b>GA 1:</b><?php echo $q1 ?></label>
                                                                 <br>
                                                    <input class="form-check-input1" style="opacity:1;" type="radio" id="checkboxNoLabel1" value="1" name="Y1" aria-label="...">
                                                     <label class="form-check-label1" for="checkboxNoLabel1">Yes</label>

        
                                                     <input class="form-check-input2" style="opacity:1;" type="radio" id="checkboxNoLabel2" value="2" name="Y1" aria-label="...">
                                                         <label class="form-check-label2" for="checkboxNoLabel2">No</label>
        </div>      
                                     
        <div class="form-check">
        <div class="Container-fluid">
        <label id="errory2" class="mt-3"><b>GA 2:</b> <?php echo $q2 ?></label>
        <br>
        <input class="form-check-input1 " style="opacity:1;" type="radio" id="checkboxYes" value="1" name="Y2" aria-label="Yes" onclick="toggleTextbox()">
        <label class="form-check-label1" for="checkboxYes">Yes</label>
        <input class="form-check-input2" style="opacity:1;" type="radio" id="checkboxNo" value="2" name="Y2" aria-label="No" onclick="toggleTextbox()">
        <label class="form-check-label2" for="checkboxNo">No</label>
    </div>
   
    <div id="textboxContainer" >
        <label for="additionalInfo" >If Gate appeared,Score:</label>
        <input style="width:40px" type="text" id="additionalInfo" name="additionalInfo">
    </div>
    </div>
   
                                                <div  class="form-check">
                                                    <label id="errory3"  class="mt-3"><b>GA 3:</b><?php echo $q3 ?></label>
                                                    <br>
                                                    <input class="form-check-input1" style="opacity:1;" type="radio" id="checkboxNoLabel5" value="1"name="Y3" aria-label="...">
                                                    <label class="form-check-label1" for="checkboxNoLabel5">Yes</label>
                                                    <input class="form-check-input2" style="opacity:1;" type="radio" id="checkboxNoLabel6" value="2"name="Y3" aria-label="...">
                                                    <label class="form-check-label2" for="checkboxNoLabel6">No</label>
                                                    </div>
                                                <div class="form-check">
                                                    <label id="errory4" class="mt-3"><b>GA 4:</b><?php echo $q4 ?></label>
                                                    <br>
                                                    <input class="form-check-input1" style="opacity:1;" type="radio" id="checkboxNoLabel7" value="1" name="Y4" aria-label="...">
                                                    <label class="form-check-label1" for="checkboxNoLabel7">Yes</label>
                                                    <input class="form-check-input2" style="opacity:1;" type="radio" id="checkboxNoLabel8" value="2" name="Y4" aria-label="...">
                                                    <label class="form-check-label2" for="checkboxNoLabel8">No</label>
                                                    </div>
                                                <div class="form-check">
                                                    <label id="errory5" class="mt-3"><b>GA 5:</b><?php echo $q5 ?></label>
                                                    <br>
                                                    <input class="form-check-input1" style="opacity:1;" type="radio" id="checkboxNoLabel9" value="1" name="Y5" aria-label="...">
                                                    <label class="form-check-label1" for="checkboxNoLabel9">Yes</label>
                                                    <input class="form-check-input2" style="opacity:1;" type="radio" id="checkboxNoLabel10" value="2" name="Y5" aria-label="...">
                                                    <label class="form-check-label2" for="checkboxNoLabel10">No</label>
                                                    </div>
                                                <div class="form-check">
                                                    <label  id="errory6" class="mt-3"><b>GA 6:</b><?php echo $q6 ?></label>
                                                    <br>
                                                    <input class="form-check-input1" style="opacity:1;" type="radio" id="checkboxNoLabel11" value="1" name="Y6" aria-label="...">
                                                    <label class="form-check-label1" for="checkboxNoLabel11">Yes</label>
                                                    <input class="form-check-input2" style="opacity:1;" type="radio" id="checkboxNoLabel12" value="2" name="Y6" aria-label="...">
                                                    <label class="form-check-label2" for="checkboxNoLabel12">No</label>
                                                    </div>
                                            </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center  align-items-center ">
                                        <input type="button"  onclick="form_check2()" class="btn btn-primary  rounded-5 " value="Next">
                                    </div>
                                    </div>
                            
                            </div>
                    </div>
                    <div class="col-3">
                    </div>
                    </div>
                </div>
                </div>
        </div>
        <!-- Form 3 -->
        <div id="form3" style="display: none;">
        <div class="container my-5" > 
            <div class="row">
             <div class="col-lg-3">
             </div>
             <div class=" col-12 col-lg-6 mt-5 p-md-0 p-3">
                 <!-- card -->    
                        <div class="card  bg-white bg-gradient ">
                            <div class="my-5">
                              <div class="">
                                  <div class="container">
                                      <div class="row">
                                          <div class="col-12">
                                              <div class="d-flex justify-content-center align-items-center ">
                                                  <img src="Logo 1.avif" class="logo rounded-circle " alt="">
                                              </div>
                                          </div>
                                          <div class="col-12 mt-3">
                                                <h5>Name:<?php echo $_SESSION['name']; ?></h5>
                                                 </div>

                                                 <div class="col-12 mt-3">
                                                <h5>Roll No:<?php echo $_SESSION['rollno']; ?></h5>
                                                 </div>
                                      </div>
                                  </div>
                               </div>
                               <div class="card-body">
                                  <div class="container">
                                     <div class="row">
                                            <!-- General Aspects --> <h5 style="text-align:center; font-weight:bold">II .Program Outcomes(POs)</h5>
                                            <h5 style="text-align:center; ">Assess attainment of POs by you during four-year on the scale of 5 to 1</h5>
                                            <!-- Question-1 -->
                                            <pre><h6>1-Below Average. 2-Average. 3-Good. 4-Very Good 5-Excellent<h6></pre>
                                            <div class="col-12">
                                                <p id="error1"><b>PO1:</b><?php echo $q7 ?></p>
                                                    <div id="rb-1" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            
                                                            <label class="mx-md-2 mx-1">
                                                            <input type="radio" name="Q1" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label class="mx-md-2 mx-1">
                                                            <input type="radio" name="Q1" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label   class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q1" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q1" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q1" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>    
                                            <!-- Question-2 -->
                                            <div class="col-12"  style="margin-top:30px;">
                                                <p id="error2"><b>PO2:</b><?php echo $q8 ?></p>
                                                    <div id="rb-2" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label   class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q2" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q2" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label   class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q2" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q2" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q2" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>    
                                            <!-- Question-3 -->
                                            <div class="col-12">
                                                <p id="error3"><b>PO3:</b><?php echo $q9 ?></p>
                                                    <div id="rb-3" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q3" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q3" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label   class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q3" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q3" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q3" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>    
                                            <!-- Question-4 -->
                                            <div class="col-12"  style="margin-top:30px;">
                                                <p id="error4"><b>PO4:</b><?php echo $q10 ?></p>
                                                    <div id="rb-4" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q4" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q4" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label   class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q4" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q4" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q4" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                            <!-- Question-5 -->
                                            <div class="col-12"  style="margin-top:30px;">
                                                <p id="error5"><b>PO5:</b><?php echo $q11 ?></p>
                                                    <div id="rb-5" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q5" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q5" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label   class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q5" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q5" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q5" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>    
                                            <!-- Question-6 -->
                                            <div class="col-12"  style="margin-top:30px;">
                                                <p id="error6"><b>PO6:</b><?php echo $q12 ?></p>
                                                    <div id="rb-6" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q6" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q6" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q6" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q6" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q6" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>    
                                            <!-- Question-7 -->
                                            <div class="col-12"  style="margin-top:30px;">
                                                <p id="error7"><b>PO7:</b><?php echo $q13 ?></p>
                                                    <div id="rb-7" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q7" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q7" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q7" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q7" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q7" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>    
                                            <!-- Question-8 -->
                                            <div class="col-12"  style="margin-top:30px;">
                                                <p id="error8"><b>PO8:</b><?php echo $q14 ?></p>
                                                    <div id="rb-8" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q8" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q8" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q8" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q8" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q8" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>    
                                            <!-- Question-9 -->
                                            <div class="col-12"  style="margin-top:30px;">
                                                <p id="error9"><b>PO9:</b><?php echo $q15 ?></p>
                                                    <div id="rb-9" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q9" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q9" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q9" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q9" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q9" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>    
                                            <!-- Question-10 -->
                                            <div class="col-12"  style="margin-top:30px;">
                                                <p id="error10"><b>PO10:</b><?php echo $q16 ?></p>
                                                    <div id="rb-10" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q10" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q10" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q10" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q10" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q10" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>    
                                            <!-- Question-11 -->
                                            <div class="col-12"  style="margin-top:30px;">
                                                <p id="error11"><b>PO11:</b><?php echo $q17 ?></p>
                                                    <div id="rb-11" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q11" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q11" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q11" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q11" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q11" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>    
                                            <!-- Question-12 -->
                                            <div class="col-12"  style="margin-top:30px;">
                                                <p id="error12"><b>PO12:</b><?php echo $q18 ?></p>
                                                    <div id="rb-12" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q12" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q12" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q12" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q12" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q12" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>

                                            <h5 style="text-align:center; font-weight:bold">III .Program Specific Outcomes(PSOs)</h5>
                                            <h5 style="text-align:center; ">Assess attainment of PSOs by you during four-year on the scale of 5 to 1</h5>
                                            <!-- Question-1 -->
                                            <div class="col-12">
                                                <p id="error28"><b>PSO1:</b><?php echo $question1 ?></p>
                                                    <div id="rb-28" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q28" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q28" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q28" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q28" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q28" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>

                                            <div class="col-12">
                                                <p id="error29"><b>PSO2:</b><?php echo $question2 ?></p>
                                                    <div id="rb-29" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q29" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q29" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q29" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q29" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q29" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                  </div>
                               </div>
                               <div class="d-flex justify-content-center  align-items-center mt-3 ">
                                    <input type="button" class="btn btn-primary rounded-5 " onclick="form_check3()" value="Next">
                               </div>
                            </div>
                     </div>
             </div>
             <div class="col-3">
             </div>
            </div>
         </div>
        </div>
    </div>
        <!-- Form 4 -->
        <div id="form4" style="display: none;">
        <div class="container my-5" > 
            <div class="row">
             <div class="col-lg-3">
             </div>
             <div class=" col-12 col-lg-6 mt-5 p-md-0 p-3">
                 <!-- card -->    
                        <div class="card  bg-white bg-gradient ">
                            <div class="my-5">
                              <div class="">
                                  <div class="container">
                                      <div class="row">
                                          <div class="col-12">
                                              <div class="d-flex justify-content-center align-items-center ">
                                                  <img src="Logo 1.avif" class="logo rounded-circle " alt="">
                                              </div>
                                          </div>
                                          <div class="col-12 mt-3">
                                                <h5>Name:<?php echo $_SESSION['name']; ?></h5>
                                                 </div>

                                                 <div class="col-12 mt-3">
                                                <h5>Roll No:<?php echo $_SESSION['rollno']; ?></h5>
                                                 </div>                              
                                      </div>
                                  </div>
                               </div>
                               <div class="card-body">
                                  <div class="container">
                                     <div class="row">
            <!-- Analysis of Curriculum  -->
   <!-- General Aspects -->
                <h5 style="text-align:center; font-weight:bold">IV Feedback on Curriculum</h5>
                                            <!-- Question-1 -->
                                         
                                            <!-- Question-13 -->
                                            <div class="col-12">
                                                <p id="error13"><b>C1:</b><?php echo $q19 ?></p>
                                                    <div id="rb-13" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q13" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q13" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q13" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q13" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q13" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                            <!-- Question-14 -->
                                            <div class="col-12">
                                                <p id="error14"><b>C2:</b><?php echo $q20 ?></p>
                                                    <div id="rb-14" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q14" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q14" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q14" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q14" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q14" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                            <!-- Question-15 -->
                                            <div class="col-12">
                                                <p id="error15"><b>C3:</b><?php echo $q21 ?></p>
                                                    <div id="rb-15" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q15" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q15" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q15" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q15" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q15" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                            <!-- Question-16 -->
                                            <div class="col-12">
                                                <p id="error16"><b>C4:</b><?php echo $q22 ?></p>
                                                    <div id="rb-16" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q16" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q16" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q16" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q16" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q16" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                            <!-- Question-17 -->
                                            <div class="col-12">
                                                <p id="error17"><b>C5:</b><?php echo $q23 ?></p>
                                                    <div id="rb-17" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q17" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q17" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q17" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q17" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q17" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                            <!-- Question-18 -->
                                            <div class="col-12">
                                                <p id="error18"><b>C6:</b><?php echo $q24 ?></p>
                                                    <div id="rb-18" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q18" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q18" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q18" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q18" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q18" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                            <!-- Question-19 -->
                                            <div class="col-12">
                                                <p id="error19"><b>C7:</b><?php echo $q25 ?></p>
                                                    <div id="rb-19" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q19" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q19" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q19" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q19" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q19" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>

            <!-- Overall Program Experience --><div class="mt-5">
                                            <h5 style="text-align:center; font-weight:bold;">V.Overall Program Experience</h5>
                                                </div> <!-- Question-20 -->
                                            <div class="col-12">
                                                <p id="error20"><b>O1:</b><?php echo $q26 ?></p>
                                                    <div id="rb-20" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q20" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q20" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q20" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q20" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q20" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                            <!-- Question-21 -->
                                            <div class="col-12">
                                                <p id="error21"><b>O2:</b><?php echo $q27 ?></p>
                                                    <div id="rb-21" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q21" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q21" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q21" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q21" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q21" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                            <!-- Question-22 -->
                                            <div class="col-12">
                                                <p id="error22"><b>O3:</b><?php echo $q28 ?></p>
                                                    <div id="rb-22" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q22" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q22" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q22" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q22" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q22" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                  </div>
                               </div>
                               <div class="d-flex justify-content-center  align-items-center ">
                                    <input type="button" class="btn btn-primary rounded-5 " onclick="form_check4()" value="Next">
                               </div>
                            </div>
                     </div>
             </div>
             <div class="col-3">
             </div>
            </div>
         </div>
        </div>
    </div>

        <!-- Form 5 -->
        <div id="form5"  style="display: none;">
        <div class="container my-5" > 
            <div class="row">
            <div class="col-lg-3">
            </div>
            <div class=" col-12 col-lg-6 mt-5 p-md-0 p-3">
                <!-- card -->    
                        <div class="card  bg-white bg-gradient ">
                            <div class="my-5">
                            <div class="">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center align-items-center ">
                                                <img src="Logo 1.avif" class="logo rounded-circle " alt="">
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                                <h5>Name:<?php echo $_SESSION['name']; ?></h5>
                                                 </div>

                                                 <div class="col-12 mt-3">
                                                <h5>Roll No:<?php echo $_SESSION['rollno']; ?></h5>
                                                 </div>                                           
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                <!-- Facilities and other Activities -->
                                            <h5 style="text-align:center; font-weight:bold">VI.Facilities,Co and Extracurricular Activities</h5>
                                            <!-- Question-1 -->
                                            <div class="col-12">
                                                <p id="error23"><b>F1:</b><?php echo $q29 ?></p>
                                                    <div id="rb-23" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q23" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q23" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q23" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q23" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q23" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>

                                            <div class="col-12">
                                                <p id="error24"><b>F2:</b><?php echo $q30 ?></p>
                                                    <div id="rb-24" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q24" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q24" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q24" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q24" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q24" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>

                                            <div class="col-12">
                                                <p id="error25"><b>F3:</b><?php echo $q31 ?></p>
                                                    <div id="rb-25" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q25" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q25" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q25" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q25" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q25" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                            <div class="col-12">
                                                <p id="error26"><b>F4:</b><?php echo $q32 ?></p>
                                                    <div id="rb-26" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q26" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q26" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q26" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q26" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q26" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>
                                            <div class="col-12">
                                                <p id="error27"><b>F5:</b><?php echo $q33 ?></p>
                                                    <div id="rb-27" class="rb">
                                                        <div class="d-flex justify-content-center gap-md-5 gap-3 align-items-center ">
                                                            <label  class="mx-md-2 mx-1 ">
                                                                <input type="radio" name="Q27" value="1" required="required"/>
                                                                <div class="rb-star" data-value="1">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q27" value="2" required="required"/>
                                                                <div class="rb-star" data-value="2">★</div>
                                                            </label>

                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q27" value="3" required="required"/>
                                                                <div class="rb-star" data-value="3">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q27" value="4" required="required"/>
                                                                <div class="rb-star" data-value="4">★</div>
                                                            </label>
                                                            
                                                            <label  class="mx-md-2 mx-1">
                                                                <input type="radio" name="Q27" value="5" required="required" />
                                                                <div class="rb-star" data-value="5">★</div>
                                                            </label>
                                                        </div>
                                            
                                                    </div>
                                            </div>

            <!-- PSOs -->
                                          
                                </div>
                            </div>
                            <div class="d-flex justify-content-center  align-items-center ">
                                <input type="button" class="btn btn-primary rounded-5 " onclick="form_check5()" value="Next">
                            </div>
                            </div>
                    </div>
            </div>
            <div class="col-3">
            </div>
            </div>
        </div>
        </div>
    </div>

        <!-- Form 6 -->
        <div id="form6" style="display: none;">
        <div class="container my-5" > 
            <div class="row">
            <div class="col-lg-3">
            </div>
            <div class=" col-12 col-lg-6 mt-5 p-md-0 p-3">
                <!-- card -->    
                        <div class="card  bg-white bg-gradient ">
                            <div class="my-5">
                            <div class="">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center align-items-center ">
                                                <img src="Logo 1.avif" class="logo rounded-circle " alt="">
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                                <h5>Name:<?php echo $_SESSION['name']; ?></h5>
                                                 </div>

                                                 <div class="col-12 mt-3">
                                                <h5>Roll No:<?php echo $_SESSION['rollno']; ?></h5>
                                                 </div>                                         
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
            <!-- Comments -->
                            <h5  style="text-align:center; font-weight:bold">VII.Comments about the Program/Facilities</h5>

                            <div class="col-12">
                                <div class="container">
                                    <div>
                                        <h5 id="err1">1. Program Strength</h5>
                                        <input type="text" class=" w-100 rounded-1 mt-3"  id="text1" name="comment1" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="container">
                                    <div>
                                        <h5 id="err2">2. Program Weakness</h5>
                                        <input type="text" class=" w-100 rounded-1 mt-3"  id="text2" name="comment2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="container">
                                    <div>
                                        <h5 id="err3">3. Suggesions</h5>
                                        <input type="text" class=" w-100 rounded-1 mt-3"  id="text3" name="comment3">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center  align-items-center ">                                                    
                                <button type="submit" class="btn btn-primary  rounded-5 mt-3" name="submit" type="submit" onclick="form_check6()">Submit</button>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-3">
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    </form>
    <script> function toggleTextbox() {
            var yesRadio = document.getElementById('checkboxYes');
            var textboxContainer = document.getElementById('textboxContainer');
            if (yesRadio.checked) {
                textboxContainer.style.display = 'block';
            } else {
                textboxContainer.style.display = 'none';
            }
        }
        
        function form_check1(){
            var c=0;
            var email1=document.getElementById("email").value;
            if (validatephone()) {
                c=1;
            }
            if(!validateEmail()){
                c=1;
            }
            if(c==1){
                event.preventDefault(); // Prevent form submission if phone number is invalid
            } else {
                next1(event)
            }

            function validatephone() {
                let count = 0;
                var phone = document.getElementById("number").value;
                var pattern = /^\d{10}$/;
                if (!pattern.test(phone)) {
                    document.getElementById("nerrorr1").style.color="red";
                    document.getElementById("number").style.border="1px solid red";
                    count = 1;
                } else {
                    document.getElementById("nerrorr1").style.color="black"; 
                    document.getElementById("number").style.border="1px solid #ced4da";
                }

                return count == 1; 
            }
            function validateEmail() {
                var email = document.getElementById("email").value;
                const pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!pattern.test(email)) {
                    document.getElementById("nerrorr").style.color = "red";
                    document.getElementById("email").style.border="1px solid red";
                    return false; // Return false if email is invalid
                } else {
                    document.getElementById("nerrorr").style.color = "black";
                    document.getElementById("email").style.border="1px solid #ced4da";
                    return true; // Return true if email is valid
                }
            }
        }

        function form_check2(){
            let qn=['Y1','Y2','Y3','Y4','Y5','Y6'];
            let err=["errory1","errory2","errory3","errory4","errory5","errory6"]
            let count=0;
            for(i=0;i<qn.length;i++){
                if(isRadioChecked(qn[i])==false)
                {
                    document.getElementById(err[i]).style.color="red";
                    count=1;
                }
                else
                {
                    document.getElementById(err[i]).style.color="black";
                }
            }
            if(count==0){
                next2(event);
            }
            else{
                event.preventDefault();
            }

        }

        function form_check3(){

            let qn=['Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','Q11','Q12'];
            let err=["error1","error2","error3","error4","error5","error6","error7","error8","error9","error10","error11","error12"];
            //let qn=['Q1','Q2','Q3'];
            // let err=["error1","error2","error3"];
            let count=0;
            for(i=0;i<qn.length;i++){
                if(isRadioChecked(qn[i])==false)
                {
                    document.getElementById(err[i]).style.color="red";
                    count=1;
                }
                else
                {
                    document.getElementById(err[i]).style.color="black";
                }
            }
            if(count==0){
                next3(event);
            }
            event.preventDefault();

        }

        function form_check4(){

            let qn=['Q13','Q14','Q15','Q16','Q17','Q18','Q19','Q20','Q21','Q22'];
            let err=["error13","error14","error15","error16","error17","error18","error19","error20","error21","error22"];
            let count=0;
            for(i=0;i<qn.length;i++){
                if(isRadioChecked(qn[i])==false)
                {
                    document.getElementById(err[i]).style.color="red";
                    count=1;
                }
                else
                {
                    document.getElementById(err[i]).style.color="black";
                }
            }
            if(count==0){
                next4(event);
            }
            event.preventDefault();

        }

        function form_check5(){

            let qn=['Q23','Q24','Q25','Q26','Q27','Q28','Q29'];
            let err=["error23","error24","error25","error26","error27","error28","error29"];
            let count=0;
            for(i=0;i<qn.length;i++){
                if(isRadioChecked(qn[i])==false)
                {
                    document.getElementById(err[i]).style.color="red";
                    count=1;
                }
                else
                {
                    document.getElementById(err[i]).style.color="black";
                }
            }
        if(count==0){
            next5(event);
        }
            event.preventDefault();

        
        }

        function form_check6(){
            var c1=document.getElementById('text1').value;
            var c2=document.getElementById('text2').value;
            var c3=document.getElementById('text3').value;
            let count=0;
            let comments=[c1,c2,c3]
            let err=["err1","err2","err3"]
            for(i=0;i<comments.length;i++){
                if(comments[i]==="")
                {
                    document.getElementById(err[i]).style.color="red";
                    count=1;
                }
                else
                {
                    document.getElementById(err[i]).style.color="black";
                }
            }
            if(count==1){
                event.preventDefault();
            }
            

        }

        // function isRadioChecked (radioName){
        //     var radioList=document.getElementsByName(radioName);
        //     for(var i=0; i<radioList.length;i++){
        //         if(radioList[i].checked){
        //             return true;
        //         }
        //     }
        //     return false;
        // }
        
        function isRadioChecked (radioName){
            var radioList=document.getElementsByName(radioName);
            for(var i=0; i<radioList.length;i++){
                if(radioList[i].checked){
                    return true;
                }
            }
            return false;
        }

    </script>

</body>
</html>