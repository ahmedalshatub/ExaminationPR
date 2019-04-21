<html>
<head>
<title>Teachers</title>
<link rel="stylesheet" href="../../Style/Style.css">
<?php
session_start();
if(!isset($_COOKIE['StID'])) {
        header('Location: ./index.php');
        exit();

 }
 if(!isset($_POST['ExamID'])) {
         header('Location: ./index.php');
        exit();
  }  ?>
<?php
if(isset($_SESSION['ErorrText'])){
echo '<script type="text/javascript">alert("'.$_SESSION['ErorrText'].'");</script>';

unset($_SESSION['ErorrText']);}


 ?>
</head>
<body background="../../img/bg.jpg">







  <br>
  <br>
  <center>
  <div class="AddnewTeacherBox">
  <form action="./SendTheObjection.php" class="AddBox" method="post">
    <br><h1>Add New Objection </h1>
      <div class="BoxesClass">
<center>
    <input class="TheBox11" type="hidden" name="ExamID" value=" <?php echo $_POST['ExamID'] ?>">


<textarea rows = '5' cols = '60' name = 'ObjectionText'></textarea>


<br><br></center>
</div>
<center>
  <input class="AddBT" type="submit" value="Send"></center><br><br>
</form></div></center><br><br>


</body>
</html>
