<?php

if (!isset($_COOKIE['StID']) )
{
  header("Location:./index.php");

  exit();

}
if (!isset($_POST['ExamID']) )
{
  header("Location:./index.php");

  exit();

}
if (!isset($_POST['ObjectionText']) )
{


  header("Location:./index.php");
  exit();

}
DeleteObjection($_COOKIE['StID'],$_POST['ExamID']);
AddNewObjection($_COOKIE['StID'],$_POST['ExamID'],$_POST['ObjectionText']);


header("Location:./index.php");

exit();




function DeleteObjection($StID,$ExamID) {
  include '../Connection.php';


$sql = "DELETE FROM `objectionTable` WHERE `StID`='$StID' And `ExamID`='$ExamID'";
if ($mysqli->query($sql) == false) {
  session_start();
   $_SESSION['ErorrText'] = "There IS Problem To Connect to The Server";
   header('Location: ./index.php');

   exit();
}


}
function AddNewObjection($StID,$ExamID,$ObjectionTitle) {
  include '../Connection.php';


$sql = "INSERT INTO objectionTable (`ExamID`, `StID`,`objectionTitle`)
VALUES ('$ExamID', '$StID','$ObjectionTitle')";

if ($mysqli->query($sql) == false) {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


}

?>
