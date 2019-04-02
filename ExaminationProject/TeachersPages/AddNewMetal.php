<?php

if (!isset($_COOKIE['UserID']) )
{
  header('Location: ../index.php');

}
if (!isset($_POST['MetalName']) )
{


  header("Location:../index.php");

}


AddNewSt($_POST['MetalName'],$_COOKIE['UserID'],$_POST['TheLevel']);


header('Location: ./MetalsPage.php');





function AddNewSt($MetalName,$UserID,$TheLevel) {
  include '../Connection.php';


$sql = "INSERT INTO metaltable (`MetalName`, `TeacherID`,`Level`)
VALUES ('$MetalName', '$UserID','$TheLevel')";

if ($mysqli->query($sql) == false) {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


}

?>
