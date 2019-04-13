<html>
<head>
<title>Add Exam Questions</title>
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
<body background="../img/bg.jpg">






  <br>
  <br><center>
  <div class="AddNewExam">
  <br><h1>Add New Exam</h1>
  <form action="./StartExam.php" method="post">
    Exam Title:<br>
    <input type="text" class="TheBox1" name="ExamTitle" ><br>
    Exam end Time:<br>
    <input type="time" class="TheBox1" name="ExamEndTime" ><br>
      TheMetal:<br>
    <select class="TheBox1" name="Metal">
    <?php GetTeachersMetalsTable(); ?>
    </select>
    <br><br><br>
<?php
echo "<hr>";
$Thei=0;
for ($i=0; $i < $_POST["MuCount"]; $i++) {
  echo $Thei+1;
  echo "The Question Title ";
echo     '<input class="TheBox1" type="text" name="Mu'.$i.'" required=""><br><br>';
echo "Choice A      ";
echo     '<input class="TheBox1" type="text" name="'.$i.'a" required="" ><br><br>';
echo "Choice B      ";
echo     '<input class="TheBox1" type="text" name="'.$i.'b" required="" ><br><br>';
echo "Choice C      ";
echo     '<input class="TheBox1" type="text" name="'.$i.'c"  required=""><br><br>';
echo "Choice D      ";
echo     '<input class="TheBox1" type="text" name="'.$i.'d" required="" ><br><br>';
echo "<hr>";
$Thei++;
}
for ($i=0; $i < $_POST["TeCount"]; $i++) {
  echo $Thei+1;
  echo "The Question Title      ";
echo     '<input class="TheBox1" type="text" name="Te'.$i.'" required="" ><br>';
echo "<hr>";
$Thei++;
}

for ($i=0; $i < $_POST["TFCount"]; $i++) {
  echo $Thei+1;
  echo "The Question Title    ";
echo     '<input class="TheBox1" type="text" name="TF'.$i.'" required="" >True/False<br>';

echo "<hr>";
$Thei++;

}






 ?>



  <input class="AddBT"  type="submit" value="Start Exams">
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
