<html>
<head>
<title>Teachers</title>
<link rel="stylesheet" href="../Style/Style.css">
<?php
if(!isset($_COOKIE['UserID'])) {
        header('Location: ./index.php');
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
  <br>
  <center>
  <div class="AddnewTeacherBox">
  <form action="./AddNewTeacher.php" class="AddBox" method="post">
    <br><h1>Add New Teacher </h1>
      <div class="BoxesClass">
<center>
    <h4 class="h3Text">UserName:  </h4>
    <input class="TheBox" type="text" name="UserName">
    <h4 class="h3Text">Password:  </h4>
    <input class="TheBox" type="password" name="Password">
    <h4 class="h3Text">Level:   </h4>

    <select class="TheBox" name="Level">
  <option value="0">Manger</option>
  <option value="1">Teacher</option>

</select><br><br></center>
</div>
<center>
  <input class="AddBT" type="submit" value="Add"></center><br><br>
</form></div></center><br><br>
<?php
GetTeachersTable();
 ?>

</body>
</html>





<?php





  function GetTeachersTable() {
   include '../Connection.php';
   $TheUserID=$_COOKIE['UserID'];
     $sql = "SELECT * FROM teacherstable Where `TeacherID` <>'$TheUserID' ";
 $result = $mysqli->query($sql);



   echo "<table class='MyTable' border='1'>
   <tr>
   <th>TeacherID</th>
   <th>TeacherUserNmae</th>
   <th>TeacherLevel</th>
   <th>Delete</th>

   </tr>";
   while($TheTable=mysqli_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $TheTable['TeacherID'] . "</td>";

   echo "<td>" . $TheTable['TeacherName'] . "</td>";

   if($TheTable['Level']==0 ){
     echo "<td>Manger</td>";


   }
   else {
     echo "<td>Simple Admin</td>";

   }
   echo '<form action="./DeleteTeacher.php" method="post">';

   echo "<td>".'<button type="submit" class="DeleteBT" Name="TeacherID" value="'.$TheTable['TeacherID'] .'">Delete</button><br>'. "</td>";
   echo '</form>';


   echo "</tr>";
   }
   echo "</table>";

 } ?>
