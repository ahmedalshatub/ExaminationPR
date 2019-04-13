<html>
<head>
<title>My Exams</title>
<link rel="stylesheet" href="../Style/Style.css">
<?php
if(!isset($_COOKIE['UserID'])) {
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

<body background="../img/bg.jpg">






  <br>
  <br>

</center><br><br>
<?php
GetExamsTable();
 ?>

</body>
</html>





<?php




  function GetExamsTable() {

    $TheacherID=$_COOKIE['UserID'];

   include '../Connection.php';
   echo "<table class='MyTable' border='1'>
   <tr>
   <th>ExamID</th>
   <th>ExamTitle</th>
   <th>Exam Subject</th>
<th>Result</th>
   </tr>";


     $sql = "SELECT * FROM metaltable Where `TeacherID` ='$TheacherID' ";
 $result = $mysqli->query($sql);



   while($TheTable=mysqli_fetch_array($result))
   {
     $TheMetalID=$TheTable['MetalID'];
     $sql1 = "SELECT * FROM examtable Where `MetalID` ='$TheMetalID' ";
 $result1 = $mysqli->query($sql1);

 while($TheTable1=mysqli_fetch_array($result1))
 {
   echo "<tr>";
   echo "<td>" . $TheTable1['ExamID'] . "</td>";
   echo "<td>" . $TheTable1['ExamTitle'] . "</td>";

   echo "<td>" . $TheTable['MetalName'] . "</td>";

   echo '<form action="./ExamResult.php" method="post">';

   echo "<td>".'<button type="submit" class="DeleteBT" Name="ExamID" value="'.$TheTable1['ExamID'] .'">Show Result</button><br>'. "</td>";
   echo '</form>';


   echo "</tr>";


 }







   }
   echo "</table>";

 } ?>
