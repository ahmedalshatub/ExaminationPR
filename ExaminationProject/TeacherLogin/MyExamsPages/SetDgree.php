
<?php
if(!isset($_COOKIE['UserID'])) {
        header('Location: ../index.php');
        exit();}

        if(!isset($_POST['TheDgree'])) {
                header('Location: ../index.php');
                exit();

         }

         session_start();
         if(isset($_SESSION['TheExamID'])){
           $ExamID=$_SESSION['TheExamID'];
         unset($_SESSION['TheExamID']);}
         else {
           header('Location: ../index.php');
           exit();
         }


         if(!isset($_POST['TheStID'])) {
                 header('Location: ../index.php');
                 exit();

          }
          DeleteDgreeIfExist($_POST['TheStID'],$ExamID);
          AddDgreeToSt($_POST['TheDgree'],$_POST['TheStID'],$ExamID);
          // header('Location: ../index.php');
          echo "<script>window.close();</script>";

          exit();

// exit();








































function DeleteDgreeIfExist($TheStID,$TheExamID) {
  include '../Connection.php';


$sql = "DELETE FROM `dgreestable` WHERE `StID`='$TheStID' AND `ExamID`='$TheExamID'";
if ($mysqli->query($sql) == false) {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


}
          function AddDgreeToSt($TheDgree,$TheStID,$TheExamID) {
            include '../Connection.php';


          $sql = "INSERT INTO DgreesTable (`ExamID`, `StID`,`Dgree`)
          VALUES ('$TheExamID', '$TheStID','$TheDgree')";

          if ($mysqli->query($sql) == false) {
              echo "Error: " . $sql . "<br>" . $mysqli->error;
          }


          }



  ?>
