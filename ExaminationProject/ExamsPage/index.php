<html>
<head>
<title>Add New Exam</title>
<link rel="stylesheet" href="../Style/Style.css">
<?php
if(!isset($_COOKIE['UserID'])) {
        header('Location: ./index.php');
        exit();

 }  ?>
<?php
session_start();
if(isset($_SESSION['ErorrText'])){
echo '<script type="text/javascript">alert("'.$_SESSION['ErorrText'].'");</script>';

unset($_SESSION['ErorrText']);}


 ?>
</head>
<body background="../img/bg.jpg" >






  <br>
  <br><center>
  <div class="AddNewExam">
  <br><h1>Add New Exam</h1>
  <form action="./AddQuestions.php" method="post">
    <br>
    <h4 class="h3Tex">  number of Multi Choice Questions:</h4>

    <input class="TheBox1" min="0" max="5" value="1"  type="number" name="MuCount"><br>
    <h4 class="h3Tex">     number of Text Questions:</h4>

    <input class="TheBox1" min="0" max="5" value="1"  type="number" name="TeCount"><br>
    <h4 class="h3Tex">  number of True False Questions:</h4>

    <input class="TheBox1" min="0" max="5" value="1"  type="number" name="TFCount"><br><br><br>



  <input class="AddBT" type="submit" value="Add">
</form></div></center>
</body>
</html>



<?php
function GetTeachersMetalsTable() {
 include '../Connection.php';
 $TheUserID=$_COOKIE['UserID'];
   $sql = "SELECT * FROM metaltable Where `TeacherID` ='$TheUserID' ";
$result = $mysqli->query($sql);




 while($TheTable=mysqli_fetch_array($result))
 {


echo "<option value='".$TheTable['MetalID']."'>".$TheTable['MetalName']."</option>";


 }

} ?>
