<?php
include 'inc/functions.inc.php'; //functions

// so it destroys the clicks session 
session_start();
if (user_is_connected()) {
    unset($_SESSION['user']['clicks'][$idcategory]);
    unset($_SESSION["token"]);
    unset($_SESSION["token2"]);
    unset($_SESSION['token_limit']);
    unset($_COOKIE['tkncookie']);
}
session_destroy();


session_start();
session_destroy();
header("Location: index.php");
exit;
