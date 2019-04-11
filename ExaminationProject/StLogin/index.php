<html>
<head>

<title>Students Manger || Do Exams</title>
  <link rel="stylesheet" href="../Style/Style.css">
  <?php
  session_start();
  if(isset($_SESSION['ErorrText'])){
  echo '<script type="text/javascript">alert("'.$_SESSION['ErorrText'].'");</script>';

  unset($_SESSION['ErorrText']);}

  if(isset($_COOKIE['StID'])) {
          header('Location: ./HomePage.php');
   }
   ?>
</head>

<body >
  <div class="wrapper">
    <form class="form-signin" method="post" action="./CheckLogin.php">
      <center>
      <h2 class="LoginHeader">Do Exams</h2>
      <input type="text" id="LoginBox" class="form-control" name="UserName" placeholder="UserName" required="" autofocus="" /><br><br>
      <input type="password" id="LoginBox" class="form-control" name="Password" placeholder="Password" required=""/><br>
<br>
      <button class="LoginBT" type="submit">Login</button>
    </center>
    <div class="main1"><br>
      <center>


    </center>
      </div>
    </form>
  </div>
</body>
</html>
