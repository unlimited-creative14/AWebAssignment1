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
$sql = 'select * from login where username like \'' . $username . '\'' . 'and pass=\'' . $pass . '\'';
$result = $db->query($sql);

// Query successfully
if($result->num_rows > 0){

    $row = $result->fetch_assoc();
    if(is_array($row)){
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        // Chuyen huong toi trang chu
        header("location:index.php");
    }
}
else{
    echo '<div class="alert alert-danger">Invalid username or password!</div>';
}

$db->close();


