<html>
<head>
<title>DashBoard</title>
<link rel="stylesheet" href="./Style/Style.css">
</head>
<body background="./img/bg.jpg">

<?php
if(!isset($_COOKIE['UserID'])) {
        header('Location: ./index.php');
 }




  ?>

<div class="main"><center>
<h1 >DahsBoard</h1>
<h2 >--<?php echo GetUserName(); ?>--</h2>
<br>
  <a  href="./Teacherspages/TeachersPage.php">Teacher page</a>
  <a  href="./StudentsPages/StudentsPage.php">Students page</a>
  <a  href="#">My Exams</a>
<br><br><br><br>
  <a  href="./Teacherspages/MetalsPage.php">My Metals</a>
  <a  href="./ExamsPage">Add New Exam</a>
  <a  href="#">Change Password</a>

  <br><br><br><br>
  <a  href="./LogOut.php">Log Out</a>

</center>
</div>

</body>
</html>
<?php
function GetUserName() {
  include 'Connection.php';
  $TheUserID=$_COOKIE['UserID'];
    $sql = "SELECT TeacherName FROM teacherstable Where TeacherID ='$TheUserID' limit 1 ";
$result = $mysqli->query($sql);


$row = mysqli_fetch_array($result);
return $row[0];

}
?>