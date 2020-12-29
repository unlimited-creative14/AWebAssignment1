<?php

$isValid = true;

// Check valid input
if (isset($_POST['username']) && isset($_POST['pwd'])) {
    // upper case, lowercase, 5-30 character
    if (preg_match('/^[a-zA-Z0-9]{5,30}+$/', $_POST['username']) == false) {
        echo '<div class="alert alert-danger">Invalid user name patern!</div>';
        $isValid = false;
    }

    // Check valid for password: must be have lower case, upeer case, len > 8
    $password = $_POST['pwd'];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if (!$uppercase || !$lowercase || strlen($password) < 8) {
        // tell the user something went wrong
        if(!$uppercase) echo '<div class="alert alert-danger">Password must contain at lease one upper case!</div>';
        else if(!$lowercase) echo '<div class="alert alert-danger">Password must contain at lease one lower case!</div>';
        else  echo '<div class="alert alert-danger">Password must be minimum of 8 characters!</div>';

        $isValid = false;
    }
}

// If user and pass are valid
if($isValid){
    require_once('../models/LoginModel.php');
    
    // Chuyen huong toi trang chu: gom new session va role
    
}


