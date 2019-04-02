<?php
if (!isset($_COOKIE['UserID']) )
{
  header('Location: ../index.php');

}
if (!isset($_POST['MetalID']) )
{

  header('Location: ../HomePage.php');


}
$MetalID=$_POST['MetalID'];
if(!CheckIFISExistMetals($MetalID)){

  session_start();
   $_SESSION['ErorrText'] = "The metal Does Not Exist";
   header('Location: ./MetalsPage.php');

   exit();
}



DeleteMetal($MetalID);
header('Location: ./MetalsPage.php');

function DeleteMetal($MetalID) {
  include '../Connection.php';


$sql = "DELETE FROM `metaltable` WHERE `MetalID`='$MetalID'";
if ($mysqli->query($sql) == false) {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


}


function CheckIFISExistMetals($MetalID) {
  include '../Connection.php';
    $sql = "SELECT MetalID FROM metaltable Where MetalID ='$MetalID' ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);
if($row[0]!=0)
return true;
else {
  return false;
}
}

 ?>
