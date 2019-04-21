<html>
<head>
<title>Show Dgree</title>
<link rel="stylesheet" href="../../Style/Style.css">
<?php
session_start();
if(!isset($_SESSION['TrueAdmin'])){
  $_SESSION['PageName'] = "./TeachersPages/ShowDgree.php";
  header('Location: ../CheckIFAdmin.php');
exit();

}
unset($_SESSION['TrueAdmin']);



if(!isset($_COOKIE['UserID'])) {
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







  <br>
  <br>

<?php
GetDgreesTable();
 ?>

</body>
</html>





<?php




function GetDgreesTable() {


 include '../Connection.php';
 echo "<table class='MyTable' border='1'>
 <tr>
 <th>ExamTitle</th>
 <th>Metal Name</th>
 <th>Student Name</th>

 <th>Dgree</th>

 </tr>";

   $sql = "SELECT * FROM dgreestable ";
$result = $mysqli->query($sql);



 while($TheTable=mysqli_fetch_array($result))
 {



 echo "<tr>";
 echo "<td>" . GetExamTitle($TheTable['ExamID']) . "</td>";
 $ExamMEtalID=GetExamMetal($TheTable['ExamID']);
 echo "<td>" .GetMetalName($ExamMEtalID) . "</td>";
 echo "<td>" .GetStName($TheTable['StID']) . "</td>";

 echo "<td>" .$TheTable['Dgree'] . "</td>";





 echo "</tr>";}











 echo "</table>";

}
function GetMetalName($MetalID) {
 include '../Connection.php';
     $sql = "SELECT `MetalName`  FROM `metaltable` Where `MetalID` = '$MetalID' limit 1 " ;
$result1 = $mysqli->query($sql);


$row = mysqli_fetch_array($result1);
return $row[0];

}
function GetExamMetal($ExamID) {
 include '../Connection.php';
     $sql = "SELECT `MetalID`  FROM `examtable` Where `ExamID` = '$ExamID' limit 1 " ;
$result1 = $mysqli->query($sql);


$row = mysqli_fetch_array($result1);
return $row[0];

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
