<html>
<head>
<title>Choose Exam</title>
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
    <a  href="./ShowMyDgree.php">Show My Dgrees</a></center></div></center>





  <br>
  <br>

</center><br><br>
<?php
GetExamsTable();
 ?>

</body>
</html>





<?php



function GetStageOFStudent() {
  include '../Connection.php';
  $StID=$_COOKIE['StID'];
      $sql = "SELECT StLevel  FROM studentstable Where StID =$StID ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);
return $row[0];

}
function CheckIFHeDOTheExam($ExamID ) {
  include '../Connection.php';
  $StID=$_COOKIE['StID'];
      $sql = "SELECT QestionID  FROM answerstable Where StID =$StID And ExamID = $ExamID" ;
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);
return $row[0];

}
  function GetExamsTable() {
    $StLevel=GetStageOFStudent();

   include '../Connection.php';
   echo "<table class='MyTable' border='1'>
   <tr>
   <th>ExamID</th>
   <th>ExamTitle</th>
   <th>Exam Subject</th>
   <th>Do Exam</th>

   </tr>";
   $StID=$_COOKIE['StID'];

     $sql = "SELECT * FROM metaltable Where `Level` ='$StLevel' ";
 $result = $mysqli->query($sql);



   while($TheTable=mysqli_fetch_array($result))
   {
     $TheMetalID=$TheTable['MetalID'];
     $sql1 = "SELECT * FROM examtable Where `MetalID` ='$TheMetalID' ";
 $result1 = $mysqli->query($sql1);

 while($TheTable1=mysqli_fetch_array($result1))
 {
   $CheckResult=CheckIFHeDOTheExam($TheTable1['ExamID']);
   // if(DateTime)
   if(!(date("Y/m/d")>=$TheTable1['ExamDate']&&date("H:i")<=$TheTable1['ExamTime']))
   if($CheckResult==0){
   echo "<tr>";
   echo "<td>" . $TheTable1['ExamID'] . "</td>";
   echo "<td>" . $TheTable1['ExamTitle'] . "</td>";

   echo "<td>" . $TheTable['MetalName'] . "</td>";

   echo '<form action="./DoExam.php" method="post">';

   echo "<td>".'<button type="submit" class="DeleteBT" Name="ExamID" value="'.$TheTable1['ExamID'] .'">Do Exam</button><br>'. "</td>";
   echo '</form>';


   echo "</tr>";}


 }







   }
   echo "</table>";

 } ?>
