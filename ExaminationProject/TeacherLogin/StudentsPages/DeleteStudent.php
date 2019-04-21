<?php
if (!isset($_COOKIE['UserID']) )
{
  header('Location: ../Studentspage.php');
exit();
}
if (!isset($_POST['STID']) )
{

  header('Location: ./Studentspage.php');
exit();

}
$StID=$_POST['STID'];
if(!CheckIFStudentISExist($StID)){

  session_start();
   $_SESSION['ErorrText'] = "The Student Does Not Exist";
   header('Location: ./Studentspage.php');

   exit();
}
else {





DeleteStudent($StID);
header('Location: ./Studentspage.php');
}
function DeleteStudent($StID) {
  include '../Connection.php';


$sql = "DELETE FROM `StudentsTable` WHERE `StID`='$StID'";
if ($mysqli->query($sql) == false) {
  session_start();
   $_SESSION['ErorrText'] = "There IS Problem To Connect to The Server";
   header('Location: ./index.php');

   exit();
}


}



function CheckIFStudentISExist($StudentID) {
  include '../Connection.php';
    $sql = "SELECT StID FROM StudentsTable Where StID =$StudentID ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);
if($row[0]!=0)
return true;
else {
  return false;
}
}

 ?>
