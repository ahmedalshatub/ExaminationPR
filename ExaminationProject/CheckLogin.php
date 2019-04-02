<?php

if (!isset($_POST['username']) )
{

  header('Location: ./index.php');


}

$EnteredUserName=$_POST['username'];
$EnteredPassword=$_POST['passwordBox'];
$UserID=CheckIFUserExist($EnteredUserName);
if($UserID==0)
 {
  session_start();
   $_SESSION['ErorrText'] = "The UserName Does Not Exist";
   header("Location:./index.php");
   exit();
 }
else {


  if(!CheckPassowrd($UserID,$EnteredPassword)){
session_start();
$_SESSION['ErorrText'] = "The Password IS Not Correct";

 header("Location:./index.php");
 exit();
 }
  else {
    setcookie("UserID", $UserID, time() + (86400 * 1000), "/");
header('Location: ./HomePage.php');
  }

}








function CheckIFUserExist($UserName) {
  include 'Connection.php';
    $sql = "SELECT teacherID FROM teacherstable Where TeacherName ='$UserName'limit 1 ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);

return  $row[0];
}
function CheckPassowrd($TeacherID,$EnteredPassword) {
  include 'Connection.php';
    $sql = "SELECT TeacherPassword FROM teacherstable Where TeacherID ='$TeacherID'limit 1 ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);
$ThePassword=$row[0];
if($EnteredPassword==$ThePassword)
return true;
else {
  return false;
}
}




 ?>
