<?php

if (!isset($_COOKIE['UserID']) )
{
  header('Location: ../index.php');
  exit();

}
if (!isset($_POST['ExamTitle']) )
{


  header("Location:../index.php");
  exit();

}
if (!isset($_POST['ExamEndTime']) )
{


  header("Location:../index.php");
  exit();

}



AddExam($_POST['ExamTitle'],$_POST['Metal'],$_POST['ExamEndTime']);
$TheExamID=0;
$TheExamID=GetMaxExamID();
for ($i=0; $i < 5; $i++) {
  if (!isset($_POST['TF'.$i]) )
  {
break;

  }
  AddQusetions($TheExamID,$_POST['TF'.$i],"TF");
}


for ($i=0; $i < 5; $i++) {
  if (!isset($_POST['Te'.$i]) )
  {
break;

  }
  AddQusetions($TheExamID,$_POST['Te'.$i],"Te");
}

for ($i=0; $i < 5; $i++) {
  if (!isset($_POST['Mu'.$i]) )
  {
break;

  }
  AddQusetions($TheExamID,$_POST['Mu'.$i],"Mu");
  $TheQsID=0;
  $TheQsID=GetQuestionID();
  AddMultiChoice($TheQsID,$_POST[$i.'a']);
  AddMultiChoice($TheQsID,$_POST[$i.'b']);
  AddMultiChoice($TheQsID,$_POST[$i.'c']);
  AddMultiChoice($TheQsID,$_POST[$i.'d']);
}

 header('Location: ../HomePage.php');
exit();




function AddExam($ExamTitle,$MetalID,$ExamTime) {
  include '../Connection.php';

$TheDate=date("Y/m/d");
$sql = "INSERT INTO examtable (`ExamTitle`, `MetalID`, `ExamDate`,`ExamTime`)
VALUES ('$ExamTitle','$MetalID','$TheDate' ,'$ExamTime')";

if ($mysqli->query($sql) == false) {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


}
function AddQusetions($ExamID,$QuestionTittle,$QuestionType) {
  include '../Connection.php';


$sql = "INSERT INTO questionstable (`QuestionTittle`, `QuestionType`, `ExamID`)
VALUES ('$QuestionTittle','$QuestionType','$ExamID')";

if ($mysqli->query($sql) == false) {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


}
function AddMultiChoice($QuestionID,$ChooiceText) {
  include '../Connection.php';


$sql = "INSERT INTO QuestionChoice (`ChoiceTitle`, `QuestionID`)
VALUES ('$ChooiceText','$QuestionID')";

if ($mysqli->query($sql) == false) {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


}

function GetMaxExamID() {
  include '../Connection.php';
    $sql = "SELECT Max(ExamID) FROM examtable ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);

return  $row[0];
}
function GetQuestionID() {
  include '../Connection.php';
    $sql = "SELECT Max(QuestionID) FROM questionstable ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);

return  $row[0];
}

?>
