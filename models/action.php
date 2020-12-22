<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_GET["type"]){
        case "register":
            // play backend script for register
        case 'login':
            // play backend script for Login process here
            break;
        case 'logout':
            //Do Logout
            break;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch ($_GET["type"]){
        case "register":
            // Show register form here
            break;
        case 'login':
            // Return Login screen here
            break;
        case 'logout':
            // Do Logout
            break;
    }
}
?>