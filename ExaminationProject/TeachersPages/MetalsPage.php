<html>
<head>
<title>Metals</title>
<link rel="stylesheet" href="../Style/Style.css">
<?php
session_start();
if(isset($_SESSION['ErorrText'])){
echo '<script type="text/javascript">alert("'.$_SESSION['ErorrText'].'");</script>';

unset($_SESSION['ErorrText']);}


 ?>
</head>
<body background="../img/bg.jpg">


<?php
if(!isset($_COOKIE['UserID'])) {
        header('Location: ./index.php');
 }  ?>
 <center>
 <div class="AddnewTeacherBox">
 <form action="./AddNewMetal.php" class="AddBox" method="post">
   <br><h1>Add New Metal </h1>
     <div class="BoxesClass" id="TheBox" >
 <center>
   <h4 class="h3Text">MetalName:  </h4>
   <input class="TheBox" type="text" name="MetalName">

   <h4 class="h3Text">Stage:   </h4>

   <select class="TheBox"   name="TheLevel">
 <option value="1">Stage1</option>
 <option value="2">Stage2</option>
 <option value="3">Stage3</option>
 <option value="4">Stage4</option>

 </select><br><br></center>
</div>
<center>
<input class="AddBT" type="submit" value="Add"></center><br><br>
</form></div></center><br><br>
 <?php
GetTeachersMetalsTable();
  ?>


  <br>

</body>
</html>





<?php





  function GetTeachersMetalsTable() {
   include '../Connection.php';
   $TheUserID=$_COOKIE['UserID'];
     $sql = "SELECT * FROM metaltable Where `TeacherID` ='$TheUserID' ";
 $result = $mysqli->query($sql);



   echo "<table class='MyTable' border='1'>
   <tr>

   <th>Metal Name</th>
   <th>Metal Stage</th>
   <th>Delete</th>

   </tr>";
   while($TheTable=mysqli_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $TheTable['MetalName'] . "</td>";


   if($TheTable['Level']==1)
        echo "<td>Stage one</td>";
        if($TheTable['Level']==2)
             echo "<td>Stage second</td>";
             if($TheTable['Level']==3)
                  echo "<td>Stage third</td>";
                  if($TheTable['Level']==4)
                       echo "<td>Stage fourth</td>";



   echo '<form action="./DeleteMetal.php" method="post">';

   echo "<td>".'<button class="DeleteBT" type="submit" Name="MetalID" value="'.$TheTable['MetalID'] .'">Delete</button><br>'. "</td>";
   echo '</form>';


   echo "</tr>";
   }
   echo "</table>";

 } ?>
