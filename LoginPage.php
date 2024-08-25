<?php

$servername = "localhost";
$username = "root";
$password = "poovarasan@13";
$dbname = "exitsurvey";


$con = new mysqli($servername, $username, $password);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


$result = $con->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");

if ($result->num_rows == 0) {

    $sql_create_db = "CREATE DATABASE $dbname";
    if ($con->query($sql_create_db) === TRUE) {
       // echo "Database created successfully<br>";
        
        // Establish connection to the created database
        $con->close();
        $con = new mysqli($servername, $username, $password, $dbname);
        
        // Array of tables and their respective creation queries
        session_start();
//admin page
//Pso of department
$tableName="psos";
$checkTableQuery = "SHOW TABLES LIKE '$tableName'";
$tableExists = $con->query($checkTableQuery)->num_rows > 0;

if (!$tableExists) {$SQL="CREATE TABLE psos(
      department varchar(10),
      question1 varchar(500),
      question2 varchar(500)
    )";

if ($con->query($SQL) === TRUE) {

} else {
  echo "Error creating table: " . $con->error;
}

// Step 4: SQL queries to insert values into the table
$sql_insert_values = "INSERT INTO $tableName (department, question1,question2)
VALUES ('ce',' Field applications oriented practical knowledge in Civil Engineering such as Planning, Analysis, Designing, Estimation and Execution by applying current concepts of mathematics and physical sciences', 'An ability to succeed competitive examinations which offers challenging and rewarding career and to become an efficient Design engineer, Structural consultant, Project engineer or Construction manager with the help of management skills and leadership characteristics'),
 ('ec', 'Good knowledge and hands-on competence to solve emerging real-world problems related to Electronic Devices and Circuits, Communication Systems, Digital Systems, and Electro-magnetics.',' Demonstrate proficiency in specialized software packages and computer programming useful for the analysis/design of electronic engineering systems and profession.'),
 ('ee','Apply the knowledge in the field of electrical and electronics engineering to analyse, design and develop solutions for real world problems.','Demonstrate the skill in core and allied domain to work in interdisciplinary teams.'),
 ('me',' Identify analyse and impart complex engineering problems in Thermal Engineering, Design Engineering and Manufacturing Engineering domains.','Enabling the student to take-up career in core industries so as to develop products using CAD/CAM tools.'),
 ('et','Comprehend and analyze specific engineering problems in the field of Electronics & Telecommunication Engineering by applying the concepts of science, mathematics and engineering basics with Competency in using electronic Design Automation tools (both software and hardware) for the analysis and design of advanced electronic systems which culminates to link academics with research.','Apply the contextual knowledge of Electronics and Telecommunication Engineering to find solution to real time problems as an individual or a leader in a team to manage software projects pertaining to interdisciplinary environments to enhance life-long learning.'),
 ('cy',' Analyze, Design, Implement, Development and production in practices of computer science and engineering application pivot to Cryptography, Cyber Security and Cyber Forensics.','Ability to adapt for rapid growth in tools and technology with an understanding and solving the complex issues in vulnerability, risk assessment, physical and technical safe guards relevant to professional engineering.'),
 ('cs','Analyze, design, implement, test and evaluate computer programs in the areas related to algorithms, networking, web design, cloud computing, IoT and data analytics of varying complexity.','Develop innovative ideas to provide solutions for complex problems and apply advanced knowledge of computer science domain to identify research challenges in Computer Science and Engineering.'),
 ('ct',' Analyze, design, implement, test and evaluate computer programs in the areas related to networking, Storage Systems, web design, cloud computing, IoT and data capturing analysis of varying complexity.','Develop innovative ideas to provide solutions for complex technological problems and apply advanced knowledge of computer technology domain to identify research challenges in Computer Science and Technology.'),
 ('it','Ability to organize an IT infrastructure, secure the data and analyze the data analytic techniques in the field of data mining, big data as to facilitate in solving problems.','Ability to analyze and design the system in the domain of Cloud and Internet of Things.'),
 ('ad',' Demonstrate the knowledge of Artificial Intelligence, Machine Learning and Data Science for designing and developing intelligent systems','Implement Artificial Intelligence and data science methods for solving a problem in multi-disciplinary areas and design novel algorithms.'),
 ('cd',' Analyze, design, implement, test and evaluate computer programs in the areas related to networking, Storage Systems, web design, cloud computing, IoT and data capturing analysis of varying complexity.','Develop innovative ideas to provide solutions for complex technological problems and apply advanced knowledge of computer technology domain to identify research challenges in Computer Science and Design.')
";


if ($con->query($sql_insert_values) === TRUE) {

} else {
  echo "Error inserting values: " . $con->error;
}
} 
//Qusetion
$tableName="question";
$checkTableQuery = "SHOW TABLES LIKE '$tableName'";
$tableExists = $con->query($checkTableQuery)->num_rows > 0;

if (!$tableExists) {$SQL="CREATE TABLE question(
      number int,
      question varchar(2000)
    )";

if ($con->query($SQL) === TRUE) {

} else {
  echo "Error creating table: " . $con->error;
}
$sql_insert_values = "INSERT INTO $tableName (number, question) VALUES 
    (1, ' Do you have a job Offer in the Campus recruitment'),
    (2, ' Did you appear for GATE'),
    (3, ' Do you have any plans to pursue higher studies?'),
    (4, 'Do you know the PEOs(Program Educational Objectives)  of your program?'),
    (5, ' Do you know the POs(Program Outcomes)  of your program?'),
    (6, ' Do you know the PSOs(Program Specific Outcomes) of your program?'),
    (7, ' Apply the knowledge of mathematics, science, engineering fundamentals, and an engineering specialization to the solution of complex engineering problems'),
    (8, ' Identify, formulate, review research literature, and analyze complex engineering problems reaching substantiated conclusions using first principles of mathematics, natural sciences, and engineering sciences.'),
    (9, ' Design solutions for complex engineering problems and design system components or processes that meet the specified needs with appropriate consideration for the public health and safety, and the cultural, societal, and environmental considerations.'),
    (10, ' Use research-based knowledge and research methods including design of experiments, analysis and interpretation of data, and synthesis of the information to provide valid conclusions.'),
    (11, ' Create, select, and apply appropriate techniques, resources, and modern engineering and IT tools including prediction and modeling to complex engineering activities with an understanding of the limitations.'),
    (12, ' Apply reasoning informed by the contextual knowledge to assess societal, health, safety, legal and cultural issues and the consequent responsibilities relevant to the professional engineering practice.'),
    (13, ' Understand the impact of the professional engineering solutions in societal and environmental contexts, and demonstrate the knowledge of, and need for sustainable development.'),
    (14, ' Apply ethical principles and commit to professional ethics and responsibilities and norms of the engineering practice.'),
    (15, ' Function effectively as an individual, and as a member or leader in diverse teams, and in multidisciplinary settings.'),
    (16, ' Communicate effectively on complex engineering activities with the engineering community and with society at large, such as, being able to comprehend and write effective reports and design documentation, make effective presentations, and give and receive clear instructions.'),
    (17, ' Demonstrate knowledge and understanding of the engineering and management principles and apply these to one\'s own work, as a member and leader in a team, to manage projects and in multidisciplinary environments'),
    (18, ' Recognize the need for, and have the preparation and ability to engage in independent and life-long learning in the broadest context of technological change.'),
    (19, ' Core required courses'),
    (20, ' Electives offered are inline with current trends'),
    (21, ' Exposure sessions or Guest Lectures on contemporary topics'),
    (22, ' Assessment coordinated with objectives and learning outcomes'),
    (23, ' Experiential learning,Team & Individual work'),
    (24, ' Exposure about MOOCs and credit transfers.(Online Learning)'),
    (25, ' Active Learning(Team based  activities'),
    (26, ' Knowledge (Intellectual Capabilities)'),
    (27, ' Skill (Manual or Pyschomoror skills)'),
    (28, ' Attitude (Feeling, Emotions and Behavior)'),
    (29, ' Classroom facilities'),
    (30, ' Laboratory Facilities.'),
    (31, ' Counseling Process.'),
    (32, ' Placement'),
    (33, ' Co-curricular and Extra-curricular.')";



if ($con->query($sql_insert_values) === TRUE) {
//echo "data inserted";
} else {
  echo "Error inserting values: " . $con->error;
}
} 


 
$con->close();
        
    } else {
        echo "Error creating database: " . $con->error;
    }
} else {
   // echo "Database already exists<br>";
}

if(isset($_POST['submit'])){
  $con = new mysqli($servername, $username, $password, $dbname);
  session_start();
  $rollno = $_POST['rollno'];
  $password = $_POST['password'];


    $table_name = 'data_kce';
$table_check_query = "SHOW TABLES LIKE '$table_name'";
$table_check_result = mysqli_query($con, $table_check_query);

if(mysqli_num_rows($table_check_result) == 0) {
    // Table does not exist, display alert message
    echo "<script>alert('Admin has not inserted any student details. Please contact the admin.')</script>";
} else {
    // Proceed with querying student data
    $sql_student = "SELECT Name, RollNo, Password, RIGHT(Batch, 4) AS Batch, Department, Dept FROM data_kce WHERE (LOWER(RollNo)='$rollno' OR RollNo='$rollno') AND Password='$password'";
    $result_student = mysqli_query($con, $sql_student);

    if (mysqli_num_rows($result_student) > 0) {
        while ($row = mysqli_fetch_assoc($result_student)) {
            $_SESSION['name'] = $row["Name"];
            $_SESSION['rollno'] = $row["RollNo"];
            $_SESSION['Dept']= $row["Dept"];
            $_SESSION['Department'] = $row["Department"];
            $_SESSION['Batch'] = $row["Batch"];
        }
        header("Location: FeedbackPage.php");
        exit();
    } else {
        echo "<script>alert('Error in login')</script>";
        exit();
    }
}

}
session_abort();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exit Survey Login</title>
    <!-- Bootstrap CSS --><style>
      body{
  
        background-position: 0 0;
    background-color: #080710;
    background-image: url('Background\ Pic\ 1.avif');
    background-size:100% ;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    .clg-icon{
height:100px;
width:300px;
    }
}</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        body{
            font-family: "Poppins", sans-serif;
        }

    #login_logo{
    width: 300px;
 height: 90px;
    margin: 0px auto;
    margin-top: 10px;
}
        </style>
</head>
<body >
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 ">
            <div class="col-md-6 col-lg-4">
                <div class="card p-4  bg-light text-dark">
                    <img src="Logo.avif" class="my-2 p-1" id="login_logo" alt="Logo" >
                    <h3 class="text-center mb-4">Exit Survey Login</h3>
                    <form action="" method="post" autocomplete="on">
                        <div class="mb-3">
                            <label for="rollno" class="form-label">Username</label>
                            <input type="text" name="rollno" id="rollno" class="form-control" placeholder=" Roll Number" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="d-flex justify-content-center  align-items-center " >
                        <button type="submit" name="submit" class="btn btn-primary rounded-2" id="b1">Log In</button>
                        </div>
                        
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>