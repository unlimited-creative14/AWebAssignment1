<?php
$port = 3306;
$db = new mysqli("localhost", "root", "", "CtyLHVL", $port);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

function checkUser($username, $isAdmin=false){
    // check if user existed
}
function checkSlide($username){
    // check if slide existed
}
function checkProduct($pid){
    // check if product existed
    global $db;
    $qstr = "SELECT * FROM PRODUCT WHERE PID LIKE ".$pid;
    $res = $db->query($qstr);
    
    if($res->num_rows == 0)
        return false;
    return true;
}
function checkContact($username){
    // check if contact existed
}
//////////////////////////////
// Return [<result>, <reason>]
//////////////////////////////

function getUser($username){
    if(!$username)
    {
        // Do query all user
        return [True, ""];
    }
    if (!checkUser($username)) {
        return [false, "Username does not exist!"];
    }
    // Do query user here
}

function createUser($username, $hash, $other){
    if (checkUser($username)) {
        return [false, "Username existed!"];
    }
    // Do insert new user
}

function updateUser($username, $other){
    if (checkUser($username)) {
        return [false, "Username does not exist!"];
    }
    // Do update SQL
}

// Can change password here

////////////////////////////////
// Slider
////////////////////////////////

function getSlide($slideID){
    if (!checkSlide($slideID)) {
        return [false, "Slide does not exist!"];
    }
    // Do query slide here
}

function createSlide($slideID, $hash, $other){
    if (checkSlide($slideID)) {
        return [false, "Slide existed!"];
    }
    // Do insert new slide
}

function updateSlide($slideID, $other){
    if (checkSlide($slideID)) {
        return [false, "Slide does not exist!"];
    }
    // Do update SQL
}

////////////////////////////////
// Product
////////////////////////////////

function getProduct(){
    
    // Do query product here
    $sqtr = "SELECT * FROM PRODUCT";
    global $db;
    $res = $db->query($sqtr);
    return $res->fetch_all();
}

function getProductAssocUID($uid){
    
    // Do query product here
    $sqtr = "SELECT * FROM PRODUCT WHERE USERID=".$uid;
    global $db;
    $res = $db->query($sqtr);
    return $res->fetch_all();
}

function createProduct($whoid, $pname, $thumbImg, $price, $other){
    global $db;
    $qstr = "SELECT MAX(PID)+1 FROM PRODUCT";
    $m = $db->query($qstr);
    $maxid = $m->fetch_array();
    $qstr = "INSERT INTO PRODUCT (PID, PNAME, IMG, PRICE, USERID, OTHER) 
                VALUES(?, ?, ?, ?, ?, ?)";
    // Do insert new product
    print_r($maxid);
    $prep = $db->prepare($qstr);
    $nul = null;
    $prep->bind_param("isbsss",$maxid[0], $pname, $nul, $price, $whoid, $other);
    $prep->send_long_data(2, $thumbImg);
    $res = $prep->execute();

    return [$res, "None"];
}

function updateProduct($pid, $pname, $thumbImg , $price, $other){
    $qstr = "UPDATE PRODUCT
    SET PNAME=?, IMG=?, PRICE=?, OTHER=? WHERE PID LIKE ".$pid;   
    // Do update SQL
    global $db;
    $prep = $db->prepare($qstr);
    $nul = null;
    $prep->bind_param("sbss", $pname, $nul, $price, $other);
    $prep->send_long_data(1, $thumbImg);
    $res = $prep->execute();

    return [$res, "none"];
}

function deleteProduct($pid){
    $qstr = "DELETE FROM PRODUCT WHERE PID=".$pid;   
    // Do update SQL
    global $db;
    
    $res = $db->query($qstr);

    return [$res, "None"];
}

////////////////////////////////
// Contact
////////////////////////////////
function getContact($pid){
    if (!checkContact($pid)) {
        return [false, "Contact does not exist!"];
    }
    // Do query slide here
}

function createContact($pid, $thumbImg , $other){
    if (checkContact($pid)) {
        return [false, "Contact existed!"];
    }
    // Do insert new user
}

// function updateContact($pid, $other){
//     if (checkContact($username)) {
//         return [false, "Contact does not exist!"];
//     }
//     // Do update SQL
// }

?>