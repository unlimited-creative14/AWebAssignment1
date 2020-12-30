<?php
    session_start();
    include_once "../models/ProductModel.php";

    if (!array_key_exists('role', $_SESSION))
    {
        $role = 'guest';
        $uid = "0";
    }
    else {
        $role = $_SESSION['role'];
        $uid = $_SESSION['username'];
    }

    $method = $_SERVER["REQUEST_METHOD"];
    switch ($method) {
        case 'GET':
            $PID = $_GET['id'];
            $res = getProductPicture($PID)[0];
            $img = [];
            
            if (!$res){
                echo "Error";
                return;
            }
            
            $img = $res->fetch_all();
            echo json_encode($img);
            break;
        
        default:
            # code...
            break;
    }
?>
