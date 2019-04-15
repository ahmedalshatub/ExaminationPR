<?php
if (!isset($_COOKIE['UserID']) )
{
  header('Location: ./index.php');
exit();
}
session_start();

if (!isset($_SESSION['PageName']) )
{
  header('Location: ./HomePage.php');
  exit();

}
$PageName=$_SESSION["PageName"];

$UserID=$_COOKIE["UserID"];
if(CheckIFISAdmin($UserID)==false){
  session_start();
  $_SESSION['ErorrText'] = "You Are Not The Admin";
  header('Location: ./index.php');

   exit();

 }
else {
  session_start();
  $_SESSION['TrueAdmin'] = "T";
  header('Location: '.$PageName.'.php');
}

function CheckIFISAdmin($TeacherID) {
  include 'Connection.php';
    $sql = "SELECT Level FROM teacherstable Where TeacherID ='$TeacherID'limit 1 ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);
$TheLevel=$row[0];
if($TheLevel==0)
return true;
else {
  return false;
}
}





 ?>
