<html>
<head>
<title>Studnets</title>
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
        exit();
        
 }  ?>
 <br>
 <br>
 <center>
 <div class="AddnewTeacherBox">
 <form action="./AddNewSt.php" class="AddBox" method="post">
   <br><h1>Add New Teacher </h1>
     <div class="BoxesClass">
 <center>
   <h4 class="h3Text">UserName:  </h4>
   <input class="TheBox" type="text" name="UserName">
   <h4 class="h3Text">Password:  </h4>
   <input class="TheBox" type="password" name="Password">
   <h4 class="h3Text">Stage:   </h4>

   <select class="TheBox"  name="StLevel">
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
GetStudntsTable();
  ?>


</body>
</html>





<?php





  function GetStudntsTable() {
   include '../Connection.php';
   $TheUserID=$_COOKIE['UserID'];
     $sql = "SELECT * FROM studentstable ";
 $result = $mysqli->query($sql);



   echo "<table class='MyTable' border='1'>
   <tr>
   <th>Student ID</th>
   <th>Student Name</th>
   <th>Student Stage</th>


   </tr>";
      // <th>Delete</th>
   while($TheTable=mysqli_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $TheTable['StID'] . "</td>";

   echo "<td>" . $TheTable['StName'] . "</td>";

if($TheTable['StLevel']==1)
     echo "<td>Stage one</td>";
     if($TheTable['StLevel']==2)
          echo "<td>Stage second</td>";
          if($TheTable['StLevel']==3)
               echo "<td>Stage third</td>";
               if($TheTable['StLevel']==4)
                    echo "<td>Stage fourth</td>";




   echo "</tr>";
   }
   echo "</table>";

 } ?>
