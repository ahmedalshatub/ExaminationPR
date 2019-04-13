<?php
if (!isset($_COOKIE['UserID']) )
{
  header('Location: ../index.php');
  exit();

}
if (!isset($_POST['TeacherID']) )
{

  header('Location: ../HomePage.php');
  exit();


}
$TeacherID=$_POST['TeacherID'];
if(!CheckIFISExistAdmin($TeacherID)){

  session_start();
  $_SESSION['TrueAdmin'] = "T";

   $_SESSION['ErorrText'] = "The Teacher Does Not Exist";

   header('Location: ./TeachersPage.php');
   exit();
}



DeleteTeacher($TeacherID);
session_start();
$_SESSION['TrueAdmin'] = "T";
header('Location: ./TeachersPage.php');
exit();

function DeleteTeacher($TeacherID) {
  include '../Connection.php';


$sql = "DELETE FROM `teacherstable` WHERE `TeacherID`='$TeacherID'";
if ($mysqli->query($sql) == false) {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


}


function CheckIFISExistAdmin($TeacherID) {
  include '../Connection.php';
    $sql = "SELECT TeacherID FROM teacherstable Where TeacherID ='$TeacherID' ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);
if($row[0]!=0)
return true;
else {
  return false;
}
}

 ?>
