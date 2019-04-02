<?php
if (!isset($_COOKIE['UserID']) )
{
  header('Location: ./index.php');

}
if (!isset($_SESSION['PageName']) )
{
  header('Location: ./HomePage.php');

}
$PageName=$_SESSION["PageName"];

$UserID=$_COOKIE["UserID"];
if($CheckIFISAdmin($UserID)==true){}
  session_start();
  $_SESSION['ErorrText'] = "You Are Not The Admin";
  header('Location: ./TeachersDashBoard.php');

   exit();}
else {
  header('Location: ./'$PageName'.php');
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
