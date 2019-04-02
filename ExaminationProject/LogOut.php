<?php



if (isset($_COOKIE['UserID'])) {
    unset($_COOKIE['UserID']);
    setcookie('UserID', '', time() - 3600, '/');
}
unset($_COOKIE['UserID']);
setcookie('UserID', '', time() - 3600, '/');
header('Location: ./index.php');
 ?>
