<?php
if (isset($_COOKIE['StID'])) {
    unset($_COOKIE['StID']);
    setcookie('StID', '', time() - 3600, '/');
}
unset($_COOKIE['StID']);
setcookie('StID', '', time() - 3600, '/');
header('Location: ./index.php');
exit();
 ?>
