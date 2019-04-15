<html>
<head>
<title>My Exams</title>
<link rel="stylesheet" href="../../Style/Style.css">

<?php
if(!isset($_COOKIE['UserID'])) {
        header('Location: ./index.php');
        exit();
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

<body background="../../img/bg.jpg">

<center>
  <h1>The Exam :
<?php

echo GetExamTitle();
 ?>
</h1>
</center>
  <?php

  GetExamAnswers();

   ?>

  <br>
  <br>

<br><br>


</body>
</html>
<?php
function GetQuestinTitle($QuestionID) {
  include '../Connection.php';
      $sql = "SELECT `QuestionTittle`  FROM `questionstable` Where `QuestionID` = '$QuestionID' limit 1 " ;
$result1 = $mysqli->query($sql);


$row = mysqli_fetch_array($result1);
return $row[0];

}
function GetExamTitle() {
  include '../Connection.php';
  $ExamID=$_POST['ExamID'];
      $sql = "SELECT `ExamTitle`  FROM `examtable` Where `ExamID` = '$ExamID' limit 1 " ;
$result1 = $mysqli->query($sql);


$row = mysqli_fetch_array($result1);
return $row[0];

}
function GetStudentName($StID) {
  include '../Connection.php';
      $sql = "SELECT `StName`  FROM `studentstable` Where `StID` = '$StID' limit 1 " ;
$result1 = $mysqli->query($sql);


$row = mysqli_fetch_array($result1);
return $row[0];

}

function GetExamAnswers() {
 include '../Connection.php';
 $TheExamID=$_POST['ExamID'];

   $sql = "SELECT * FROM answerstable Where `ExamID` ='$TheExamID' ";
$result = $mysqli->query($sql);
$TheNum=0;



 while($TheTable=mysqli_fetch_array($result))
 {
   if($TheTable['StID']!=$TheNum){
     if($TheNum!=0){


       echo '</div>';}


echo '<button class="accordion">'.GetStudentName($TheTable['StID'])."            <br>             ".$TheTable['AnswerDateTime'].'</button>';

echo '<div class="panel">';
$TheNum=$TheTable['StID'];
}
echo "<h3>Q/".GetQuestinTitle($TheTable['QestionID']).'</h3></br>';
echo "<br>";


echo "The Answer:       <br> <h2>".$TheTable['Answer'].'</h2></br>';
echo "<br>";
echo "<br>";
 echo "<hr>";







}
 if($TheNum!=0){
echo '</div>';}
else {
  echo "<center>";
  echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
    echo "<h1>There Is No Answers</h1>";
      echo "</center>";
}


}














 ?>

 <script>
 var acc = document.getElementsByClassName("accordion");
 var i;

 for (i = 0; i < acc.length; i++) {
   acc[i].addEventListener("click", function() {
     this.classList.toggle("active");
     var panel = this.nextElementSibling;
     if (panel.style.display === "block") {
       panel.style.display = "none";
     } else {
       panel.style.display = "block";
     }
   });
 }
 </script>
