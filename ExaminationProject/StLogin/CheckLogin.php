<?php

if (!isset($_POST['UserName']) )
{

  header('Location: ./index.php');
  exit();


}

$EnteredUserName=$_POST['UserName'];
$EnteredPassword=$_POST['Password'];
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
    setcookie("StID", $UserID, time() + (86400 * 1000), "/");
header('Location: ./HomePage.php');
exit();

  }

}








function CheckIFUserExist($UserName) {
  include '../Connection.php';
    $sql = "SELECT StID FROM studentstable Where StName ='$UserName'limit 1 ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);

return  $row[0];
}
function CheckPassowrd($StID,$EnteredPassword) {
  include '../Connection.php';
    $sql = "SELECT StPassword FROM studentstable Where StID ='$StID'limit 1 ";
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
