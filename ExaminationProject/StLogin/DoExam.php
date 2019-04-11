<html>
<head>
<title>Teachers</title>
<link rel="stylesheet" href="../Style/Style.css">
<?php
if(!isset($_COOKIE['StID'])) {
        header('Location: ./index.php');
 }
 if(!isset($_POST['ExamID'])) {
         header('Location: ./index.php');
        exit();
  }


  ?>
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
<form action="./SaveAnswers.php" method="post">
<?php

GetQuestionsTable();
$TheExam= $_POST['ExamID'] ;
 ?>
 <button type="submit"  Name="ExamID" value="<?php echo $TheExam;  ?>">Send Answers</button>
</form>
</body>
</html>





<?php




function CheckIFHeDOTheExam($ExamID ) {
  include '../Connection.php';
  $StID=$_COOKIE['StID'];
      $sql = "SELECT QestionID  FROM answerstable Where StID =$StID And ExamID = $ExamID" ;
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);
return $row[0];

}
  function GetQuestionsTable() {

   include '../Connection.php';
   echo "<table class='MyTable' border='1'>
   <tr>
   <th>Question Num</th>
   <th>Question Title</th>
   <th>Question Answer</th>


   </tr>";
   $StID=$_COOKIE['StID'];
$ExamIDs=$_POST['ExamID'];
     $sql = "SELECT * FROM questionstable Where `ExamID` ='$ExamIDs' ";
 $result = $mysqli->query($sql);


$k=1;
   while($TheTable=mysqli_fetch_array($result))
   {

  if($TheTable['QuestionType']=="TF"){
echo "<tr>";
echo "<td>";
echo $TheTable['QuestionTittle']; echo "</td>";



echo "<td>";

echo $k; echo "</td>";

echo "<td>";

echo"  <input type='radio' name='$k' value='True'> True<br>";
echo"  <input type='radio' name='$k' value='False'>False<br>";
 echo "</td>";
echo "</tr>";
  }


  if($TheTable['QuestionType']=="Te"){
echo "<tr>";
echo "<td>";
echo $TheTable['QuestionTittle']; echo "</td>";



echo "<td>";

echo $k; echo "</td>";

echo "<td>";
echo "    <textarea rows = '5' cols = '60' name = '$k'></textarea>";



 echo "</td>";
echo "</tr>";
  }
  if($TheTable['QuestionType']=="Mu"){
    $ChNum=1;
  echo "<tr>";
  echo "<td>";
  echo $TheTable['QuestionTittle']; echo "</td>";



  echo "<td>";

  echo $k; echo "</td>";

  echo "<td>";
  $QID=$TheTable['QuestionID'];
  $sql1 = "SELECT * FROM questionchoice Where `QuestionID` =$QID ";
$result1 = $mysqli->query($sql1);
while($TheTable1=mysqli_fetch_array($result1))
{
  $ChTitle=$TheTable1['ChoiceTitle'];
  echo "<input type='checkbox' name='$QID/$ChNum' value='1'>$ChTitle<br>";


$ChNum++;
}


  echo "</td>";
  echo "</tr>";
  }




$k++;
   }
   echo "</table>";

 }

















 ?>
