<html>
<head>
<title>DashBoard</title>
<link rel="stylesheet" href="../Style/Style.css">
</head>
<body background="../img/bg.jpg">

<?php
if(!isset($_COOKIE['UserID'])) {
        header('Location: ./index.php');
        exit();

 }

 session_start();
 if(isset($_SESSION['ErorrText'])){
 echo '<script type="text/javascript">alert("'.$_SESSION['ErorrText'].'");</script>';

 unset($_SESSION['ErorrText']);}



  ?>

<div class="main"><center>
<h1 >DahsBoard</h1>
<h2 >--<?php echo GetUserName(); ?>--</h2>
<br>
  <a  href="./Teacherspages/TeachersPage.php">Manger page</a>
  <a  href="./StudentsPages/StudentsPage.php">Students page</a>
  <a  href="./MyExamsPages">My Exams</a>
<br><br><br><br>
  <a  href="./Teacherspages/MetalsPage.php">My Metals</a>
  <a  href="./Teacherspages/ShowDgree.php">Show Dgrees</a>

  <a  href="./ExamsPage">Add New Exam</a>

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
