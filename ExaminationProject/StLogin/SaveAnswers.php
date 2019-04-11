<?php

if(!isset($_COOKIE['StID'])) {
        header('Location: ./index.php');
 }
if (!isset($_POST['ExamID']) )
{

  header("Location:./index.php");

}
if (!isset($_POST['1']) )
{


  header("Location:./index.php");

}

if(!(date("Y/m/d")>=GetTheDateOfExam($_POST['ExamID'])&&date("H:i")<=GetTheTimeOfExam($_POST['ExamID']))){
  SetAnswers($_POST['ExamID']);


}
else {
  session_start();
  $_SESSION['ErorrText'] = "The Exam Has been End Sory";

   header("Location:./HomePage.php");
   exit();
}



header('Location: ./index.php');
// GetTheDateOfExam();
function SetAnswers($ExamIDs) {
  if(CheckIFHeDOTheExam($ExamIDs)){
    session_start();
    $_SESSION['ErorrText'] = "You Already Did This Exam";

     header("Location:./HomePage.php");
     exit();
    return;
  }

 include '../Connection.php';

 $StID=$_COOKIE['StID'];
$ExamIDs=$_POST['ExamID'];
   $sql = "SELECT * FROM questionstable Where `ExamID` ='$ExamIDs' ";
$result = $mysqli->query($sql);
$date = date('Y-m-d H:i:s');


$k=1;
 while($TheTable=mysqli_fetch_array($result))
 {

if($TheTable['QuestionType']=="TF"){
  AddNewAnswer($TheTable['ExamID'],$TheTable['QuestionID'],$_POST[$k],$date);
}


if($TheTable['QuestionType']=="Te"){
    AddNewAnswer($TheTable['ExamID'],$TheTable['QuestionID'],$_POST[$k],$date);
}



if($TheTable['QuestionType']=="Mu"){
    $ChNum=1;
      $QID=$TheTable['QuestionID'];
  $TheAnswers="";
  $sql1 = "SELECT * FROM questionchoice Where `QuestionID` =$QID ";
$result1 = $mysqli->query($sql1);
while($TheTable1=mysqli_fetch_array($result1))
{
    $ChTitle=$TheTable1['ChoiceTitle'];
  if (isset($_POST[$QID.'/'.$ChNum]) )
  {
    if($ChNum==4){
      $TheAnswers=$TheAnswers.$ChTitle;

    }
      else {
        $TheAnswers=$TheAnswers.$ChTitle.',';

      }
}

$ChNum++;
}
AddNewAnswer($TheTable['ExamID'],$TheTable['QuestionID'],$TheAnswers,$date);
}








$k++;
}


}

function CheckIFHeDOTheExam($ExamID ) {
  include '../Connection.php';
  $StID=$_COOKIE['StID'];
      $sql = "SELECT `QestionID`  FROM answerstable Where StID ='$StID' And ExamID = '$ExamID' limit 1" ;
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);
return $row[0];

}
function GetTheDateOfExam($ExamID) {
  include '../Connection.php';
  $StID=$_COOKIE['StID'];
      $sql = "SELECT `ExamDate`  FROM `examtable` Where `ExamID` = '$ExamID' limit 1" ;
$result1 = $mysqli->query($sql);


$row = mysqli_fetch_array($result1);
return $row[0];

}

function GetTheTimeOfExam($ExamID) {
  include '../Connection.php';
  $StID=$_COOKIE['StID'];
      $sql = "SELECT `ExamTime`  FROM `examtable` Where `ExamID` = '$ExamID' limit 1 " ;
$result1 = $mysqli->query($sql);


$row = mysqli_fetch_array($result1);
return $row[0];

}

function AddNewAnswer($ExamID,$QuID,$Answer,$TheDate) {
  include '../Connection.php';
$StID=$_COOKIE['StID'];

$sql = "INSERT INTO answerstable (`StID`, `QestionID`,`Answer`,`ExamID`,`AnswerDateTime`)
VALUES ('$StID', '$QuID','$Answer','$ExamID','$TheDate')";

if ($mysqli->query($sql) == false) {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


}

?>
