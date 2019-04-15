<html>
<head>

<title>Students Manger || Do Exams</title>
  <link rel="stylesheet" href="../../Style/Style.css">
  <?php
  session_start();
  if(isset($_SESSION['ErorrText'])){
  echo '<script type="text/javascript">alert("'.$_SESSION['ErorrText'].'");</script>';

  unset($_SESSION['ErorrText']);}

  if(isset($_COOKIE['StID'])) {
          header('Location: ./HomePage.php');
          exit();

   }
   ?>
</head>

<body background="../../img/bg.jpg" >
  <br><br><br>
  <center>
  <div class="AddNewExam">
  <br><h1>Do Exams</h1>
  <form action="./CheckLogin.php" method="post">
    <br>
    <h4 class="h3Tex">UserName</h4>
    <input class="TheBox1"  type="text" name="UserName" required="">

    <h4 class="h3Tex">Password</h4>
    <input class="TheBox1" type="password" name="Password" required=""><br><br>




<input class="AddBT" type="submit" value="Login"> <br>
<br><br>

<br>
  </form></div></center>




</body>
</html>
