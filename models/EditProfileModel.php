<?php

$db = new mysqli("localhost", "root", "", "Db_ass2");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$username = $_SESSION['username'];
$Fname = $_SESSION['Fname'];
if ($_POST['Fname'] != "") {
    $Fname = $_POST['Fname'];
}

$Lname = $_SESSION['Lname'];
if ($_POST['Lname'] != "") {
    $Lname = $_POST['Lname'];
}

$address = $_SESSION['address'];
if ($_POST['address'] != "") {
    $address = $_POST['address'];
}

$Phone = $_SESSION['Phone'];
if ($_POST['Phone'] != "") {
    $Phone = $_POST['Phone'];
}   

$Email = $_SESSION['Email'];
if ($_POST['Email'] != "") {
    $Email = $_POST['Email'];
}

$_SESSION['Fname'] = $Fname;
$_SESSION['Lname'] = $Lname;
$_SESSION['address'] = $address;
$_SESSION['Phone'] = $Phone;
$_SESSION['Email'] = $Email;

$sql = 'SELECT contactID FROM login WHERE username = \'' .$username. '\'';
$result = $db->query($sql);

$result = $result->fetch_assoc();
$contactID = $result['contactID'];

$sql = 'UPDATE contact 
SET Fname = \'' .$Fname. '\',
    Lname = \'' .$Lname. '\',
    address = \'' .$address. '\',
    Phone = \'' .$Phone. '\',
    Email = \'' .$Email. '\'
WHERE contactID = \'' .$contactID. '\'';

$result = $db->query($sql);

echo '<div class="alert alert-success">Cập nhật thành công!</div>';
?>