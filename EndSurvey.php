<?php

$servername = "localhost";
$username = "root";
$password = "poovarasan@13";
$dbname = "exitsurvey";
session_start();

if (!isset($_SESSION['Department'])) {
    header("Location: Admin Login.php");
    exit();
}


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$question="SELECT * FROM question";

$res = $conn->query($question);
$i=1;

if ($res->num_rows > 0) {
    // Output data of each row
    while($row = $res->fetch_assoc() ) {
        ${"q$i"} =  $row["question"] ;
        $i=$i+1;
        
    }
} 

$origin="";
$tables = array();
$table = $_SESSION['Department'];


//psos
$question1="";
$question2="";

$department=$_SESSION['Dept'];
 $sql="SELECT * FROM psos WHERE department='$department' ";

 $result=mysqli_query($conn,$sql);

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


if ($table == "ALL") {
    $batch= $_SESSION['batch'];
    $origin=$table;

 $tables = array("it$batch","cs$batch","ad$batch","ee$batch","ce$batch","cd$batch","me$batch","et$batch","cy$batch","ct$batch","ec$batch");
 
} else {
    $tables[] = $table;
}

// for( $i=1;$i<=27;$i++)
// {
//     ${total.$i}=0;
// }
$count1 = $count2 = $count3 = $count4 = $count5 = 0;
$countt1 = $countt2 =  $countt3= $countt4= $countt5=0;
$count11=$count21=$count31=$count41=$count51=$count61=$count71=$count81=$count91=$count101=$count111=$count121=$count131=$count141=$count151=$count161=$count171=$count181=$count191=$count201=$count211=$count221=$count231=$count241=$count251=$count261=$count271=$count281=$count291=$count301=$count311=$count321=$count331=$count341=$count351=0;
$count12=$count22=$count32=$count42=$count52=$count62=$count72=$count82=$count92=$count102=$count112=$count122=$count132=$count142=$count152=$count162=$count172=$count182=$count192=$count202=$count212=$count222=$count232=$count242=$count252=$count262=$count272=$count282=$count292=$count302=$count312=$count322=$count332=$count342=$count352=0;
$count13=$count23=$count33=$count43=$count53=$count63=$count73=$count83=$count93=$count103=$count113=$count123=$count133=$count143=$count153=$count163=$count173=$count183=$count193=$count203=$count213=$count223=$count233=$count243=$count253=$count263=$count273=$count283=$count293=$count303=$count313=$count323=$count333=$count343=$count353=0;
$count14=$count24=$count34=$count44=$count54=$count64=$count74=$count84=$count94=$count104=$count114=$count124=$count134=$count144=$count154=$count164=$count174=$count184=$count194=$count204=$count214=$count224=$count234=$count244=$count254=$count264=$count274=$count284=$count294=$count304=$count314=$count324=$count334=$count344=$count354=0;
$count15=$count25=$count35=$count45=$count55=$count65=$count75=$count85=$count95=$count105=$count115=$count125=$count135=$count145=$count155=$count165=$count175=$count185=$count195=$count205=$count215=$count225=$count235=$count245=$count255=$count265=$count275=$count285=$count295=$count305=$count315=$count325=$count335=$count345=$count355=0;
$count_31=$count_32=$count_33=$count_34=$count_35=$count_36=$count_37=$count_38=$count_39=$count_310=$count_311=$count_312=$count_313=$count_314=$count_315=$count_316=$count_317=$count_318=$count_319=$count_320=$count_321=$count_322=$count_323=$count_324=$count_325=$count_326=$count_327=$count_328=$count_329=$count_330=$count_331=$count_332=$count_333=$count_334=$count_335=0;
for($j=2;$j<=27;$j++)
{
    ${"count_$j"}=0;
}
foreach ($tables as $table){
    $checkTableQuery = "SHOW TABLES LIKE '$table'";


$tableExists = $conn->query($checkTableQuery)->num_rows > 0;

if($tableExists){






    for ($question = 1; $question <= 27; $question++) {
        ${"total$question"} = 0;
        for ($rating = 1; $rating <= 5; $rating++) {
            $sql = "SELECT COUNT(column$question) as count FROM $table WHERE column$question = $rating";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ${"count$question$rating"} += $row["count"];
                ${"c$question$rating"}= $row["count"];
                ${"total$question"} += ${"count$question$rating"};
                ${"count$rating"} += ${"c$question$rating"};
                if(($rating == 3 || $rating == 4|| $rating==5 ) )
                {
                    ${"count_3$question"}+=${"count$question$rating"};
                 
                }
                
            }
        }
    }

    for ($question = 28; $question <= 35; $question++) {
        ${"totall$question"} = 0;
        
        for ($rating = 1; $rating <= 5; $rating++) {
            $sql1 = "SELECT COUNT(column$question) as count FROM $table WHERE column$question = $rating";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
                $row = $result1->fetch_assoc();
                ${"count$question$rating"}+= $row["count"];
                ${"c$question$rating"}= $row["count"];
                ${"totall$question"} += ${"count$question$rating"};
                ${"countt$rating"} += ${"c$question$rating"};
                if(($rating == 3 || $rating == 4|| $rating==5 ) )
                {
                    ${"count_3$question"}+=${"count$question$rating"};
                 
                }
            }
        }
    }
}
}
 if (isset($_GET['export_csv']) && $_GET['export_csv'] === 'true') {
    foreach ($tables as $table){
        $checkTableQuery = "SHOW TABLES LIKE '$table'";
    
    
    $tableExists = $conn->query($checkTableQuery)->num_rows > 0;
    
    if($tableExists){
    
$sql = "SELECT name as Name,rollno as RollNo,email,number as PhoneNumber,department as Department,column36 as comment1,column37 as comment2,column38 as comment3,gate as Gate_Mark FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Set appropriate headers for CSV download
    if($origin == "ALL"){
        $table="ALL". $batch;
    }
    
    header('Content-Type: text/csv');
    header("Content-Disposition: attachment; filename=$table.csv");

    // Create a file pointer connected to the output stream
    $csv_file = fopen('php://output', 'w');

    // Write CSV headers
    $row = $result->fetch_assoc();
    fputcsv($csv_file, array_keys($row));

    // Write CSV rows
    fputcsv($csv_file, $row);

    while($row = $result->fetch_assoc()) {
        fputcsv($csv_file, $row);
    }

   
    // No need to echo anything here as the CSV file has already been outputted for download
} else {
    echo "No data found.";
}
    }} fclose($csv_file);
    exit;
}
$batch= $_SESSION['batch'];
$academic=$_SESSION['academic']; 


 
$conn->close();

?>
<DOCTYPE html>
<head>
    
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');</style>
    <link rel="stylesheet" href="EndSurveyStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <style>
        .topic{
    border-radius: 10px;
}
.topic th{
    width: 150px;
    height: 30px;
    font-size: 15px;
    text-align: center;
    
}
.end_survey_table td{
    text-align:center;
}
#title{
    background: radial-gradient( #33ccff 0%, #2b60c2 100%);
    color: #000000;
}

.login_logo{
    width: 400px;
 height: 100px;
    margin: 0px auto;
    margin-top: 10px;
}

</style>
</head>
<body class="end_survey_body">
    <center><img src="Logo.avif" class="login_logo">
   
    <h2 >Exit Survey Feedback Summary</h2>
   
    <table class="topic"  cellspacing="0" border="2">
        <tr id="title">
            <th style=" 1 border-top-left-radius: 10px;  border-bottom-left-radius: 10px;" >Department:<?php echo $_SESSION['Dept']; ?></th>
            <th >Batch: <?php echo  $batch-4 ; ?>-<?php echo  $batch; ?></th>
            <th style=" border-top-right-radius: 10px;  border-bottom-right-radius: 10px; width:200px">Academic Year: <?php echo  $batch-1 ; ?>-<?php echo  $batch; ?></th>        
        </tr>
      </table>
  
 
  
<br>
<h3>I. General Aspects</h3>
     <table class="end_survey_table" style="text-align:center;" cellspacing="0" border="1">
        <tr id="table_title">
            <td style="width: 110px; border-top-left-radius: 10px; text-align:center;">Q.Nos:</td>
            <td style="text-align:center;">1</td>
            <td style="text-align:center;">2</td>
            <td style="text-align:center;">3</td>
            <td style="text-align:center;">4</td>
            <td style="text-align:center;">5</td>
            <td style="width: 50px; border-top-right-radius: 10px; text-align:center;">6</td>
         
          
        </tr>
        <tr >
            <td style="text-align:center;">YES</td>
            <td style="text-align:center;" id="1,1"> 
            <?php echo $count281; ?> </td>
            <td style="text-align:center;"><?php echo $count291; ?></td>
            <td style="text-align:center;"><?php echo $count301; ?></td>
            <td style="text-align:center;"><?php echo $count311; ?></td>
            <td style="text-align:center;"><?php echo $count321; ?></td>
            <td style="text-align:center;"><?php echo $count331; ?></td>
       
           
            
        </tr>
        <tr>
            <td style="text-align:center;">No</td>
            <td style="text-align:center;"><?php echo $count282; ?></td>
            <td style="text-align:center;"><?php echo $count292; ?></td>
            <td style="text-align:center;"><?php echo $count302; ?></td>
            <td style="text-align:center;"><?php echo $count312; ?></td>
            <td style="text-align:center;"><?php echo $count322; ?></td>
            <td style="text-align:center;"><?php echo $count332; ?></td>
            
           
        </tr>
        
       
        <tr>
            <td style="border-bottom-left-radius: 10px;">Student Count</td>
            <td style="text-align:center;"><?php echo $totall28; ?></td>
            <td style="text-align:center;"><?php echo $totall29; ?></td>
            <td style="text-align:center;"><?php echo $totall30; ?></td>
            <td style="text-align:center;"><?php echo $totall31; ?></td>
            <td style="text-align:center;"><?php echo $totall32; ?></td>
            <td  style="border-bottom-right-radius: 10px;"><?php echo $totall33; ?></td>
           
          
        </tr>
        
    </table> 
    <br>
    <h3>II. POs & PSOs</h3>
    <table class="end_survey_table" cellspacing="0" border="1">
        <tr id="table_title">
            <td  style="width: 110px; border-top-left-radius: 10px;"  >Q.Nos:</td>
            <td >PO1</td>
            <td >PO2</td>
            <td >PO3</td>
            <td >PO4</td>
            <td >PO5</td>
            <td >PO6</td>
            <td >PO7</td>
            <td >PO8</td>
            <td >PO9</td>
            <td >PO10</td>
            <td >PO11</td>
            <td >PO12</td>
           
                <td>PSO1</td>
                <td style="width: 40px; border-top-right-radius: 10px;" >PSO2</td></tr>
         
            <!-- <td style="border-top-right-radius: 10px;">12</td> -->
        </tr>
        <tr>
            <td>No of 1's</td>
            <td id="1,1"> 
            <?php echo $count11; ?> </td>
            <td ><?php echo $count21; ?></td>
            <td><?php echo $count31; ?></td>
            <td><?php echo $count41; ?></td>
            <td><?php echo $count51; ?></td>
            <td><?php echo $count61; ?></td>
            <td><?php echo $count71; ?></td>
            <td><?php echo $count81; ?></td>
            <td><?php echo $count91; ?></td>
            <td><?php echo $count101; ?></td>
            <td><?php echo $count111; ?></td>
            <td ><?php echo $count121; ?></td>
            <td><?php echo $count341; ?></td>
            <td><?php echo $count351; ?></td>
            
        </tr>
        <tr>
            <td>No of 2's</td>
            <td><?php echo $count12; ?></td>
            <td ><?php echo $count22; ?></td>
            <td><?php echo $count32; ?></td>
            <td><?php echo $count42; ?></td>
            <td><?php echo $count52; ?></td>
            <td><?php echo $count62; ?></td>
            <td><?php echo $count72; ?></td>
            <td><?php echo $count82; ?></td>
            <td><?php echo $count92; ?></td>
            <td><?php echo $count102; ?></td>
            <td><?php echo $count112; ?></td>
            <td><?php echo $count122; ?></td>
            <td><?php echo $count342; ?></td>
            <td><?php echo $count352; ?></td>
            
        </tr>
        <tr>
            <td>No of 3's</td>
            <td><?php echo $count13; ?></td>
            <td ><?php echo $count23; ?></td>
            <td><?php echo $count33; ?></td>
            <td><?php echo $count43; ?></td>
            <td><?php echo $count53; ?></td>
            <td><?php echo $count63; ?></td>
            <td><?php echo $count73; ?></td>
            <td><?php echo $count83; ?></td>
            <td><?php echo $count93; ?></td>
            <td><?php echo $count103; ?></td>
            <td><?php echo $count113; ?></td>
            <td><?php echo $count123; ?></td>
            <td><?php echo $count343; ?></td>
            <td><?php echo $count353; ?></td>
        </tr>
        <tr>
            <td>No of 4's</td>
            <td><?php echo $count14; ?></td>
            <td ><?php echo $count24; ?></td>
            <td><?php echo $count34; ?></td>
            <td><?php echo $count44; ?></td>
            <td><?php echo $count54; ?></td>
            <td><?php echo $count64; ?></td>
            <td><?php echo $count74; ?></td>
            <td><?php echo $count84; ?></td>
            <td><?php echo $count94; ?></td>
            <td><?php echo $count104; ?></td>
            <td><?php echo $count114; ?></td>
            <td><?php echo $count124; ?></td>
            <td><?php echo $count344; ?></td>
            <td><?php echo $count354; ?></td>
            
        </tr>
        <tr>
            <td>No of 5's</td>
            <td><?php echo $count15; ?></td>
            <td ><?php echo $count25; ?></td>
            <td><?php echo $count35; ?></td>
            <td><?php echo $count45; ?></td>
            <td><?php echo $count55; ?></td>
            <td><?php echo $count65; ?></td>
            <td><?php echo $count75; ?></td>
            <td><?php echo $count85; ?></td>
            <td><?php echo $count95; ?></td>
            <td><?php echo $count105; ?></td>
            <td><?php echo $count115; ?></td>
            <td><?php echo $count125; ?></td>
            <td><?php echo $count345; ?></td>
            <td><?php echo $count355; ?></td>           
        </tr>

        <tr>
            <td>Student Count</td>
            <td colspan="14" style="text-align:center;"><?php echo $total1; ?></td>
        <!-- <td><?php echo $total2; ?></td>
            <td><?php echo $total3; ?></td>
            <td><?php echo $total4; ?></td>
            <td><?php echo $total5; ?></td>
            <td><?php echo $total6; ?></td>
            <td><?php echo $total7; ?></td>
            <td><?php echo $total8; ?></td>
            <td><?php echo $total9; ?></td>
            <td><?php echo $total10; ?></td>
            <td><?php echo $total11; ?></td>

            <td ><?php echo $total12; ?></td>
         
            <td><?php echo $totall34; ?></td>  
            <td ><?php echo $totall35; ?></td>
--> 
        </tr>
        <tr>
            <td >Number of Students Given Score 3 and above</td>
            <td><?php echo $count_31; ?></td>
            <td><?php echo $count_32; ?></td>
            <td><?php echo $count_33; ?></td>
            <td><?php echo $count_34; ?></td>
            <td><?php echo $count_35; ?></td>
            <td><?php echo $count_36; ?></td>
            <td><?php echo $count_37; ?></td>
            <td><?php echo $count_38; ?></td>
            <td><?php echo $count_39; ?></td>
            <td><?php echo $count_310; ?></td>
            <td><?php echo $count_311; ?></td>
            <td><?php echo $count_312; ?></td>
            <td><?php echo $count_334; ?></td>
            <td ><?php echo $count_335; ?></td>
           

</tr>

<tr>
<td style="border-bottom-left-radius: 10px;">Percentage of Attainment</td>
              <td><?php echo round((($count_31/$total1)*100),2); ?></td>
            <td><?php echo round((($count_32/$total1)*100),2); ?></td>
            <td><?php echo round((($count_33/$total1)*100),2); ?></td>
            <td><?php echo round((($count_34/$total1)*100),2); ?></td>
            <td><?php echo round((($count_35/$total1)*100),2); ?></td>
            <td><?php echo round((($count_36/$total1)*100),2); ?></td>
            <td><?php echo round((($count_37/$total1)*100),2); ?></td>
            <td><?php  echo round((($count_38/$total1)*100),2); ?></td>
            <td><?php echo round((($count_39/$total1)*100),2); ?></td>
            <td><?php  echo round((($count_310/$total1)*100),2); ?></td>
            <td><?php echo round((($count_311/$total1)*100),2); ?></td>
            <td><?php echo round((($count_312/$total1)*100),2); ?></td>
            <td><?php echo round((($count_334/$total1)*100),2); ?></td>
            <td style="border-bottom-right-radius: 10px;"><?php echo round((($count_335/$total1)*100),2); ?></td>
           
</tr>  
    </table>
    <br>
    <br>
    <br><br>
    <br>

    <h3>III. Feedback on Curriculum</h3>
    <table class="end_survey_table" cellspacing="0" border="1">
        <tr id="table_title">
            <td style="width: 110px; border-top-left-radius: 10px;">Q.Nos:</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td style="border-top-right-radius: 10px;">7</td>
            
        </tr>
        <tr>
            <td>No of 1's</td>
            
            <td><?php echo $count131; ?></td>
            <td><?php echo $count141; ?></td>
            <td><?php echo $count151; ?></td>
            <td><?php echo $count161; ?></td>
            <td><?php echo $count171; ?></td>
            <td><?php echo $count181; ?></td>
            <td><?php echo $count191; ?></td>
            
            
        </tr>
        <tr>
            <td>No of 2's</td>
           
            <td><?php echo $count132; ?></td>
            <td><?php echo $count142; ?></td>
            <td><?php echo $count152; ?></td>
            <td><?php echo $count162; ?></td>
            <td><?php echo $count172; ?></td>
            <td><?php echo $count182; ?></td>
            <td><?php echo $count192; ?></td>
           
        </tr>
        <tr>
            <td>No of 3's</td>
            
            <td><?php echo $count133; ?></td>
            <td><?php echo $count143; ?></td>
            <td><?php echo $count153; ?></td>
            <td><?php echo $count163; ?></td>
            <td><?php echo $count173; ?></td>
            <td><?php echo $count183; ?></td>
            <td><?php echo $count193; ?></td>
            
        </tr>
        <tr>
            <td>No of 4's</td>
            
            <td><?php echo $count134; ?></td>
            <td><?php echo $count144; ?></td>
            <td><?php echo $count154; ?></td>
            <td><?php echo $count164; ?></td>
            <td><?php echo $count174; ?></td>
            <td><?php echo $count184; ?></td>
            <td><?php echo $count194; ?></td>
            
        </tr>
        <tr>
            <td>No of 5's</td>
            
            <td><?php echo $count135; ?></td>
            <td><?php echo $count145; ?></td>
            <td><?php echo $count155; ?></td>
            <td><?php echo $count165; ?></td>
            <td><?php echo $count175; ?></td>
            <td><?php echo $count185; ?></td>
            <td><?php echo $count195; ?></td>
            
        </tr>
        <tr>
            <td >Student Count</td>
            
            <td colspan="7" style="text-align:center;" ><?php echo $total13; ?></td>
          <!--  <td><?php echo $total14; ?></td>
            <td><?php echo $total15; ?></td>
            <td><?php echo $total16; ?></td>
            <td><?php echo $total17; ?></td>
            <td><?php echo $total18; ?></td>
            <td ><?php echo $total19; ?></td>
-->    
        </tr>
        <tr>
        <td style="border-bottom-left-radius: 10px;">Number of Students Given Score 3 and above</td>
            <td><?php echo $count_313; ?></td>
            <td><?php echo $count_314; ?></td>
            <td><?php echo $count_315; ?></td>
            <td><?php echo $count_316; ?></td>
            <td><?php echo $count_317; ?></td>
            <td><?php echo $count_318; ?></td>
            <td style="border-bottom-right-radius: 10px;" ><?php echo $count_319; ?></td>
</tr>
<!--
<td style="border-bottom-left-radius: 10px;">Percentage of Number of Students 3 and above</td>
            <td><?php  echo round((($count_313/$total1)*100),2); ?></td>
            <td><?php  echo round((($count_314/$total1)*100),2); ?></td>
            <td><?php  echo round((($count_315/$total1)*100),2);?></td>
            <td><?php  echo round((($count_316/$total1)*100),2); ?></td>
            <td><?php echo round((($count_317/$total1)*100),2); ?></td>
            <td><?php  echo round((($count_318/$total1)*100),2); ?></td>
            <td style="border-bottom-right-radius: 10px;"><?php  echo round((($count_319/$total1)*100),2); ?></td>
</tr>
-->
        
    </table>
    <h3>IV. Feedback on Overall Program Experience</h3>
    <table class="end_survey_table" cellspacing="0" border="1">
        <tr id="table_title">
            <td style="width: 110px; border-top-left-radius: 10px;">Q.Nos:</td>
            <td>1</td>
            <td>2</td>
           <td style="border-top-right-radius: 10px;">3</td>
            
        </tr>
        <tr>
            <td>No of 1's</td>
             
            <td><?php echo $count201; ?></td>
            <td><?php echo $count211; ?></td>
            <td><?php echo $count221; ?></td>
           
            
        </tr>
        <tr>
            <td>No of 2's</td>
            
            <td><?php echo $count202; ?></td>
            <td><?php echo $count212; ?></td>
            <td><?php echo $count222; ?></td>
             
        </tr>
        <tr>
            <td>No of 3's</td>
           
           <td><?php echo $count203; ?></td>
            <td><?php echo $count213; ?></td>
            <td><?php echo $count223; ?></td>
           
        </tr>
        <tr>
            <td>No of 4's</td>
            
          <td><?php echo $count204; ?></td>
            <td><?php echo $count214; ?></td>
            <td><?php echo $count224; ?></td>
          
        </tr>
        <tr>
            <td>No of 5's</td>
            
            <td><?php echo $count205; ?></td>
            <td><?php echo $count215; ?></td>
            <td><?php echo $count225; ?></td>
          
        </tr>
        <tr>
            <td >Studnet Count</td>
           
             <td colspan="3" style="text-align:center;"><?php echo $total20; ?></td>
          <!--  <td><?php echo $total21; ?></td>
            <td ><?php echo $total22; ?></td>
--> 
        </tr>
        <tr>
        <td style="border-bottom-left-radius: 10px;">Number of Students Given Score 3 and above</td>
            <td><?php echo $count_320; ?></td>
            <td><?php echo $count_321; ?></td>
            <td style="border-bottom-right-radius: 10px;"><?php echo $count_322; ?></td>
            
</tr>
<!--
<td style="border-bottom-left-radius: 10px;">Percentage of Number of Students 3 and above</td>
            <td><?php  echo round((($count_320/$total1)*100),2); ?></td>
            
            <td><?php  echo round((($count_321/$total1)*100),2); ?></td>
            <td style="border-bottom-right-radius: 10px;"><?php  echo round((($count_322/$total1)*100),2); ?></td>
</tr>
-->
    </table>

    <h3>V. Feedback on Facilities and other Activities</h3>
    <table class="end_survey_table" cellspacing="0" border="1">
        <tr id="table_title">
            <td style="width: 110px; border-top-left-radius: 10px;">Q.Nos:</td>
            <td>1</td>
            <td>2</td>
           <td>3</td>
             <td>4</td>
            <td style="border-top-right-radius: 10px;">5</td>
           
        </tr>
        <tr>
            <td>No of 1's</td>
             
            <td><?php echo $count231; ?></td>
            <td><?php echo $count241; ?></td>
            <td><?php echo $count251; ?></td>
            <td><?php echo $count261; ?></td>
            <td><?php echo $count271; ?></td>
            
        </tr>
        <tr>
            <td>No of 2's</td>
            
              <td><?php echo $count232; ?></td>
            <td><?php echo $count242; ?></td>
            <td><?php echo $count252; ?></td>
            <td><?php echo $count262; ?></td>
            <td><?php echo $count272; ?></td>
            
        </tr>
        <tr>
            <td>No of 3's</td>
           
              <td><?php echo $count233; ?></td>
            <td><?php echo $count243; ?></td>
            <td><?php echo $count253; ?></td>
            <td><?php echo $count263; ?></td>
            <td><?php echo $count273; ?></td>
            
        </tr>
        <tr>
            <td>No of 4's</td>
            
           <td><?php echo $count234; ?></td>
            <td><?php echo $count244; ?></td>
            <td><?php echo $count254; ?></td>
            <td><?php echo $count264; ?></td>
            <td><?php echo $count274; ?></td>
            
        </tr>
        <tr>
            <td>No of 5's</td>
            
              <td><?php echo $count235; ?></td>
            <td><?php echo $count245; ?></td>
            <td><?php echo $count255; ?></td>
            <td><?php echo $count265; ?></td>
            <td><?php echo $count275; ?></td>
            
           
        <tr>
            <td >Student Count</td>
            
             <td colspan="5" style="text-align:center;"><?php echo $total23; ?></td>
         <!--   <td><?php echo $total24; ?></td>
            <td><?php echo $total25; ?></td>
            <td><?php echo $total26; ?></td>
            <td ><?php echo $total27; ?></td> 
-->
        </tr>
        <tr>
        <td style="border-bottom-left-radius: 10px;">Number of Students Given Score 3 and above</td>
            <td><?php echo $count_323; ?></td>
            <td><?php echo $count_324; ?></td>
            <td><?php echo $count_325; ?></td>
            <td><?php echo $count_326; ?></td>
            <td style="border-bottom-right-radius: 10px;"><?php echo $count_327; ?></td>
</tr>  
<!-- 
<td style="border-bottom-left-radius: 10px;">Percentage of Number of Students 3 and above</td>
            <td><?php  echo round((($count_323/$total1)*100),2); ?></td>
            <td><?php  echo round((($count_324/$total1)*100),2); ?></td>
            <td><?php  echo round((($count_325/$total1)*100),2);?></td>
            <td><?php  echo round((($count_326/$total1)*100),2); ?></td>
           
            <td style="border-bottom-right-radius: 10px;"><?php  echo round((($count_327/$total1)*100),2); ?></td>
</tr>
-->

    </table>
    <br>
     
  
</center>
      
    <center>
<br>
     <button class="print-button "   id="hiddePrint" onclick="printTable()" >Print</button>   
     <br>
     <h3 id="hiddePrint"  id="hiddePrint" >Comments</h3>
   <div style="">
     <button type="submit" id="hiddePrint" class="print-button " style="margin-right" onclick="location.href='?export_csv=true';">Export to CSV</a></button>
    <br> <button type="back" id="hiddePrint" onclick="location.href='AdminLogin.php';" >Back</button>
</div>
 
     <script>
       function printTable() {
 
 document.querySelector('table').style.display = 'table';

 window.print();

 document.querySelector('table').style.display = 'none';
}
    </script>
     </center>
    
     <div id="hide"  >
     <table  style=" border: 1px solid black;
  border-collapse: collapse;">
     <tr>
        <td> Q.Nos</td>
        <td  style="text-align:center; font-weight: 900;"> I.General Aspects </td>
        </tr>
       <tr>
        <td> 1</td>
        <td  style="text-align:left"><?php echo $q1 ?></td>
        </tr>
        <tr>
        <td> 2</td>
        <td  style="text-align:left"><?php echo $q2 ?></td>
        </tr>
        <tr>
        <td> 3</td>
        <td  style="text-align:left"><?php echo $q3 ?></td>
        </tr>
        <tr>
        <td> 4</td>
        <td  style="text-align:left"><?php echo $q4 ?></td>
        </tr>
        <tr>
        <td> 5</td>
        <td  style="text-align:left"><?php echo $q5 ?></td>
        </tr>
        <tr>
        <td> 6</td>
        <td  style="text-align:left"><?php echo $q6 ?></td>
        </tr>
        <tr>
        
        <td  colspan="2"  style="text-align:center; font-weight: 900;">II.POs & PSOs</td>
        </tr>
        <tr>
        <td> 1</td>
        <td  style="text-align:left"><?php echo $q7 ?></td>
        </tr>
        <tr>
        <td> 2</td>
        <td  style="text-align:left"><?php echo $q8 ?></td>
        </tr>
        <tr>
        <td> 3</td>
        <td  style="text-align:left"> <?php echo $q9 ?></td>
        </tr>
        <tr>
        <td> 4</td>
        <td  style="text-align:left"> <?php echo $q10 ?></td>
        </tr>
        <tr>
        <td> 5</td>
        <td  style="text-align:left"><?php echo $q11 ?></td>
        </tr>
        <tr>
        <td> 6</td>
        <td  style="text-align:left"><?php echo $q12 ?></td>
        </tr>
        <tr>
        <td> 7</td>
        <td  style="text-align:left"><?php echo $q13 ?></td>
        </tr>
        <tr>
        <td> 8</td>
        <td  style="text-align:left"><?php echo $q14 ?></td>
        </tr>
        <tr>
        <td> 9</td>
        <td  style="text-align:left"><?php echo $q15 ?></td>
        </tr>
        <tr>
        <td> 10</td>
        <td  style="text-align:left"><?php echo $q16 ?></td>
        </tr>
        <tr>
        <td> 11</td>
        <td  style="text-align:left"><?php echo $q17 ?></td>
        </tr>
       
        <td> 12</td>
        <td  style="text-align:left"><?php echo $q18 ?></td>
        </tr>
        <tr>
        <td    colspan="2"  style="text-align:center; font-weight: 900;">PSO's </td>
      
        </tr>
        <tr>
        <td> 1</td>
        <td  style="text-align:left"><?php echo $question1 ?></td>
        </tr>
        <tr>
        <td> 2</td>
        <td  style="text-align:left"><?php echo $question2 ?></td>
        </tr>
        <tr>
        <td    colspan="2"  style="text-align:center; font-weight: 900;">III. Feedback on Curriculum </td>
      
        </tr>
        <tr>
        <td> 1</td>
        <td  style="text-align:left"><?php echo $q19 ?></td>
        </tr>
        <tr>
        <td> 2</td>
        <td  style="text-align:left"><?php echo $q20 ?></td>
        </tr>
        <tr>
        <td> 3</td>
        <td  style="text-align:left"><?php echo $q21 ?></td>
        </tr>
        <tr>
        <td> 4</td>
        <td  style="text-align:left"><?php echo $q22 ?></td>
        </tr>
        <tr>
        <td> 5</td>
        <td  style="text-align:left"><?php echo $q23 ?></td>
        </tr>
        <tr>
        <td> 6</td>
        <td  style="text-align:left"><?php echo $q24 ?></td>
        </tr>
        <tr>
        <td> 7</td>
        <td  style="text-align:left"><?php echo $q25 ?></td>
        </tr>
        <tr>
        <td  colspan="2"  style="text-align:center; font-weight: 900;"> IV. Feedback on Overall Program Experience</td>
       
        </tr>
        <tr>
        <td> 1</td>
        <td  style="text-align:left"><?php echo $q26 ?></td>
        </tr>
        <tr>
        <td> 2</td>
        <td  style="text-align:left"><?php echo $q27 ?></td>
        </tr>
        <tr>
        <td> 3</td>
        <td  style="text-align:left"><?php echo $q28 ?></td>
        </tr>
   
        <tr>
        <td colspan="2"  style="text-align:center; font-weight: 900; width:100%  "> V. Feedback on Facilities and other Activities</td>
       
        </tr>

        <tr>
        <td> 1</td>
        <td  style="text-align:left"><?php echo $q29 ?></td>
        </tr>
        <tr>
        <td> 2</td>
        <td  style="text-align:left"><?php echo $q30 ?></td>
        </tr>
        <tr>
        <td> 3</td>
        <td  style="text-align:left"><?php echo $q31 ?></td>
        </tr>
        <tr>
        <td> 4</td>
        <td  style="text-align:left"><?php echo $q32 ?></td>
        </tr>
        <tr>
        <td> 5</td>
       <td  style="text-align:left ;  "><?php echo $q33 ?></td>
        </tr>
        <tr>
        <td style="display:none;text-align:center; font-weight: 900; width:100% ">****</td>
</tr>

<tr>
       
</tr>
<!-- <tr >
    
<td>
       <td rowspan="3" style="text-align:right;font-weight:900">  <b></b></p>

</tr>
<tr>
    <td>
</td>
</tr>
<tr>
    <td>
</td>
</tr>
<tr> -->
<td></td>
<td style="text-align:center;  width:100% ;" >****</td></tr>
<table>
    <br>
    <br>
<p style ="text-align:right;  width:100% ;font-weight:1000;margin-top:10px">Principal Signature</p>
</div>
</body>
</html>