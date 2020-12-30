<?php

$isValid = true;

if (isset($_POST['Fname'])) {

}

if (isset($_POST['Lname'])) {

}

if (isset($_POST['address'])) {

}

if (isset($_POST['Phone'])) {
    if ($_POST['Phone'] != "" && (preg_match('/^[0-9]$/', $_POST['Phone']) || strlen($_POST['Phone']) != 10)) {
        echo '<div class="alert alert-danger">Số điện thoại không hợp lệ</div>';
        $isValid = false;
    } 
}

if (isset($_POST["Email"])) {
    if ($_POST['Email'] != "" && !preg_match('/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i', $_POST["Email"])) {
        echo '<div class="alert alert-danger">Email không hợp lệ</div>';
        $isValid = false;
    }
}

if ($isValid) {
    require("../models/EditProfileModel.php");
}

?>
