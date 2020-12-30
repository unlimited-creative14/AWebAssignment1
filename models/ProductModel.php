<?php
if (!array_key_exists("db", $GLOBALS)){
    $port = 3306;
    $db = new mysqli("localhost", "root", "", "Db_ass2", $port);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
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

//////////////////////////////
// Return [<result>, <reason>]
//////////////////////////////

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

function getProductByID($pid){
    
    // Do query product here
    $sqtr = "SELECT * FROM PRODUCT WHERE PID=".$pid;
    global $db;
    $res = $db->query($sqtr);
    return $res->fetch_all();
}

function getProductAssocUID($uid){
    
    // Do query product here
    $sqtr = "SELECT * FROM PRODUCT WHERE USERNAME=\"".$uid."\"";
    global $db;
    $res = $db->query($sqtr);
    return $res->fetch_all();
}

function createProduct($whoid, $pname, $thumbImg, $price, $other){
    global $db;
    $qstr = "SELECT MAX(PID)+1 FROM PRODUCT";
    $m = $db->query($qstr);
    $maxid = $m->fetch_array();
    $qstr = "INSERT INTO PRODUCT (PID, PNAME, IMG, PRICE, USERNAME, OTHER) 
                VALUES(?, ?, ?, ?, ?, ?)";
    // Do insert new product
    if ($price < 0)
    {
        return [false, "Giá không thể là số âm"];
    }

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

?>