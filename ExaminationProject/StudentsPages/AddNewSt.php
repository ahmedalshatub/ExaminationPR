<?php

if (!isset($_COOKIE['UserID']) )
{
  header('Location: ../index.php');

}
if (!isset($_POST['UserName']) )
{


  header("Location:../index.php");

}


AddNewSt($_POST['UserName'],$_POST['Password'],$_POST['StLevel']);


header('Location: ./StudentsPage.php');





function AddNewSt($UserName,$password,$Level) {
  include '../Connection.php';


$sql = "INSERT INTO studentstable (`StName`, `StPassword`,`StLevel`)
VALUES ('$UserName', '$password','$Level')";

if ($mysqli->query($sql) == false) {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


}

?>
