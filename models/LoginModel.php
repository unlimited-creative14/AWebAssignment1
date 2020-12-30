<?php
session_start();
$db = new mysqli("localhost", "root", "", "Db_ass2");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$username = $_POST['username'];
$pass = $_POST['pwd'];
$role = '';

// Chua su dung ham bam
$sql = 'select * from login where BINARY username=\'' . $username . '\'' . 'and BINARY pass=\'' . $pass . '\'';
$result = $db->query($sql);

// Query successfully
if($result->num_rows > 0){

    $row = $result->fetch_assoc();
    if(is_array($row)){
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        $contactID = $row['contactID'];
        $sql_cm = 'SELECT * FROM contact WHERE contactID = \'' .$contactID. '\'';
        $contact = $db->query($sql_cm);
        $contact = $contact->fetch_assoc();
        $_SESSION['Fname'] = $contact['Fname'];
        $_SESSION['Lname'] = $contact['Lname'];
        $_SESSION['address'] = $contact['address'];
        $_SESSION['Phone'] = $contact['Phone'];
        $_SESSION['Email'] = $contact['Email'];
        // Chuyen huong toi trang chu
        header("location:index.php");
    }
}
else{
    echo '<div class="alert alert-danger">Invalid username or password!</div>';
}

$db->close();


