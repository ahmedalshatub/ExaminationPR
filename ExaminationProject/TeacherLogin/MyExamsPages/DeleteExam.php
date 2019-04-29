<?php
if (!isset($_COOKIE['UserID']) )
{
  header('Location: ../Studentspage.php');
exit();
}
if (!isset($_POST['ExamID']) )
{

  header('Location: ./Studentspage.php');
exit();

}

if(!CheckIFExamISExist($_POST['ExamID'])){

  session_start();
   $_SESSION['ErorrText'] = "The Exam Does Not Exist";
   header('Location: ./.php');

   exit();
}
else {





DeleteExam($_POST['ExamID']);
header('Location: ./.php');
exit();
}


function DeleteExam($ExamID) {
  include '../Connection.php';


$sql = "DELETE FROM `examtable` WHERE `ExamID` ='$ExamID'";
if ($mysqli->query($sql) == false) {
  session_start();
   $_SESSION['ErorrText'] = "There IS Problem To Connect to The Server";
   header('Location: ./');

   exit();
}


}



function CheckIFExamISExist($ExamID) {
  include '../Connection.php';
    $sql = "SELECT ExamID FROM examtable Where ExamID =$ExamID ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);
if($row[0]!=0)
return true;
else {
  return false;
}
}

 ?>
