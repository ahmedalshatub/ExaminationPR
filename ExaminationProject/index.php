<html>
<head>

<title>Login</title>
<link rel="stylesheet" href="./Style/Style.css">
<?php
if(isset($_COOKIE['UserID'])) {
        header('Location: ./HomePage.php');
 }



session_start();
if(isset($_SESSION['ErorrText'])){
echo '<script type="text/javascript">alert("'.$_SESSION['ErorrText'].'");</script>';

unset($_SESSION['ErorrText']);}


 ?>
</head>
<body background="./img/bg.jpg" ><br><br><br><br>
  <center>
  <div class="AddNewExam">
  <br><h1>Online Examinations</h1>
  <form action="./CheckLogin.php" method="post">
    <br>
    <h4 class="h3Tex">UserName</h4>
    <input class="TheBox1"  type="text" name="username">

    <h4 class="h3Tex">Password</h4>
    <input class="TheBox1" type="password" name="passwordBox"><br><br>




<input class="AddBT" type="submit" value="Login"> <br>
  </form></div></center>


</body>
</html>
