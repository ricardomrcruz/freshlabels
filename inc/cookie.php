<?php

// INCLUDE FILE TO CHECK COOKIE STATUS
//the cookie is unset and destroyed in logout.php

if (isset($_COOKIE['tkncookie']) && time() < $_COOKIE['tkncookie']) {
    
    //user can move freely, no change

  } else {
    setcookie('tkncookie', '', time() - 3600, '/');
    header('Location: logout.php');
    exit;
}
  
  
