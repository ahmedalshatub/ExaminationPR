<?php

if (!isset($_COOKIE['UserID']) )
{
  header('Location: ../index.php');

}
if (!isset($_POST['UserName']) )
{


  header("Location:../index.php");

}
$EnteredUserName=$_POST['UserName'];
$UserID=CheckIFUserNameExist($EnteredUserName);

if($UserID!=0)
 {
   session_start();
    $_SESSION['ErorrText'] = "The UserName Already Exist Chose Another One";
    header('Location: ./TeachersPage.php');

    exit();
 }
AddNewTeacher($_POST['UserName'],$_POST['Password'],$_POST['Level']);


header('Location: ./TeachersPage.php');




function CheckIFUserNameExist($UserName) {
  include '../Connection.php';
    $sql = "SELECT teacherID FROM teacherstable Where TeacherName ='$UserName'limit 1 ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);

return  $row[0];
}
function AddNewTeacher($UserName,$password,$Level) {
  include '../Connection.php';


$sql = "INSERT INTO teacherstable (`TeacherName`, `TeacherPassword`,`Level`)
VALUES ('$UserName', '$password','$Level')";

if ($mysqli->query($sql) == false) {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


}

?>
