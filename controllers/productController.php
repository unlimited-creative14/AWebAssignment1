<?php
    include "../models/model.php";
    global $role;
    global $uid; 
    $role = "member";
    $uid = "1000";

    $method = $_SERVER["REQUEST_METHOD"];
    $type = $_GET["type"];
    switch ($method){
        case 'GET':
            switch ($type) {
                case 'list':
                    $products = getProduct();
                    break;
                case 'editlist':
                    if ($role == "member")
                        $products = getProductAssocUID($uid);
                    elseif ($role == "admin")
                        $products = getProduct();
                    break;
                default:
                    # code...
                    break;
            }
            echo json_encode($products);                
            break;

        case 'POST': 
            switch ($type) {
                case 'delete':
                    $res = deleteProduct($_POST["id"]);
                    break;
                case 'edit':
                    $res = updateProduct($_POST["id"], $_POST['pname'], $_POST['img'], $_POST['price'], $_POST['other']);                        
                    break;
                case 'create':
                    $res = createProduct($uid, $_POST['pname'], $_POST['img'], $_POST['price'], $_POST['other']);
                    break;
                default:
                    # code...
                    break;
            }
            echo json_encode($res);
            break;
    }
?>