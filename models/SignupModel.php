<?php
session_start();
$db = new mysqli("localhost", "root", "", "Db_ass2");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

function checkUser($username)
{
    global $db;
    $sql = 'select username from login where BINARY username=\'' . $username . '\'';
    
    $result = $db->query($sql);
    if($result->num_rows > 0){
        return true;
    }
    // if ($result->num_rows > 0) return true;
    else return false;
}
function insertUser($username, $pass)
{
    global $db;
    // Chua su dung ham bam
    $role = 'user';
    $tablename = 'login';
    $contactId = rand(1,10000);
    $sql_insContactId =  'insert into contact(contactID) values(' . $contactId . ')';
    $db->query($sql_insContactId);
    $sql = 'insert into login(username, pass,contactID,role) values (\'' . $username . '\',\'' . $pass . '\',' . $contactId . ',' . '\'user\'' . ')';
    $result = $db->query($sql);

    // Query successfully
    if ($result) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['role'] = $role;
        $_SESSION['Fname'] = "";
        $_SESSION['Lname'] = "";
        $_SESSION['address'] = "";
        $_SESSION['Email'] = "";
        $_SESSION['Phone'] = "";
        // Chuyen huong toi trang chu
        header("location:index.php");
    }
}

// $db->close();
