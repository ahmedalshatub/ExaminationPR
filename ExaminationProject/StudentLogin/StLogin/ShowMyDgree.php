<html>
<head>
<title>SHow My Dgree</title>
<link rel="stylesheet" href="../../Style/Style.css">
<?php
if(!isset($_COOKIE['StID'])) {
        header('Location: ./index.php');
        exit();

 }  ?>
<?php
session_start();
if(isset($_SESSION['ErorrText'])){
echo '<script type="text/javascript">alert("'.$_SESSION['ErorrText'].'");</script>';

unset($_SESSION['ErorrText']);}


 ?>
</head>
  <br>  <br>
<body background="../../img/bg.jpg">

  <div class="StBT"><center>
    <a  href="./LogOut.php">Log Out</a>
    <a  href="./HomePage.php">Show avalible Exams</a></center></div>





  <br>
  <br>

</center><br><br>
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

   <th>Dgree</th>
   <th>    </th>

   </tr>";
   $StID=$_COOKIE['StID'];

     $sql = "SELECT * FROM dgreestable Where `StID` ='$StID' ";
 $result = $mysqli->query($sql);



   while($TheTable=mysqli_fetch_array($result))
   {



   echo "<tr>";
   echo "<td>" . GetExamTitle($TheTable['ExamID']) . "</td>";
   $ExamMEtalID=GetExamMetal($TheTable['ExamID']);
   echo "<td>" .GetMetalName($ExamMEtalID) . "</td>";

   echo "<td>" .$TheTable['Dgree'] . "</td>";
   echo '<form action="./ObjectionPage.php" method="post">';

   echo "<td>".'<button class="DeleteBT" type="submit" Name="ExamID" value="'.$TheTable['ExamID'] .'">Objection</button><br>'. "</td>";
echo '</form>';


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

 function GetExamTitle($ExamID) {
   include '../Connection.php';
       $sql = "SELECT `ExamTitle`  FROM `examtable` Where `ExamID` = '$ExamID' limit 1 " ;
 $result1 = $mysqli->query($sql);


 $row = mysqli_fetch_array($result1);
 return $row[0];

 } ?>
