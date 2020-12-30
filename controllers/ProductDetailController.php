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
            
            break;
        case 'POST':
            $img = $_POST['img1'];
            $res = createProductPicture($_GET['id'], $img);
            $img = $_POST['img2'];
            $res = createProductPicture($_GET['id'], $img);
            $img = $_POST['img3'];
            $res = createProductPicture($_GET['id'], $img);
        default:
            # code...
            break;
    }
?>
