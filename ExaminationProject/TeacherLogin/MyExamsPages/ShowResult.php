<html>
<head>
<title>Dgrees</title>
<link rel="stylesheet" href="../../Style/Style.css">
<?php

if(!isset($_COOKIE['UserID'])) {
        header('Location: ./index.php');
        exit();

 }
 if(!isset($_POST['ExamID'])) {
         header('Location: ./index.php');
         exit();

  }  ?>
<?php
if(isset($_SESSION['ErorrText'])){
echo '<script type="text/javascript">alert("'.$_SESSION['ErorrText'].'");</script>';

unset($_SESSION['ErorrText']);}


 ?>
</head>
<body background="../../img/bg.jpg">

  <center>
    <h1>The Exam :
  <?php
  echo GetExamTitle($_POST['ExamID']);
   ?>
  </h1>
  </center>





  <br>
  <br>

<?php
GetDgreesOfExam($_POST['ExamID']);
 ?>

</body>
</html>





<?php




function GetDgreesOfExam($ExamID) {


 include '../Connection.php';
 echo "<table class='MyTable' border='1'>
 <tr>
 <th>Student Name</th>
 <th>Dgree</th>


 </tr>";

   $sql = "SELECT * FROM dgreestable Where `ExamID`= '$ExamID' ";
$result = $mysqli->query($sql);



 while($TheTable=mysqli_fetch_array($result))
 {



 echo "<tr>";
  echo "<td>" .GetStName($TheTable['StID']) . "</td>";
  echo "<td>" .$TheTable['Dgree'] . "</td>";
 echo "</tr>";}











 echo "</table>";

}


function GetStName($StID) {
 include '../Connection.php';
     $sql = "SELECT `StName`  FROM `studentstable` Where `StID` = '$StID' limit 1 " ;
$result1 = $mysqli->query($sql);


$row = mysqli_fetch_array($result1);
return $row[0];

}
function GetExamTitle($ExamID) {
 include '../Connection.php';
     $sql = "SELECT `ExamTitle`  FROM `examtable` Where `ExamID` = '$ExamID' limit 1 " ;
$result1 = $mysqli->query($sql);


$row = mysqli_fetch_array($result1);
return $row[0];

} ?>
