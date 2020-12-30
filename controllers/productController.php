<?php
    include_once "../models/model.php";
    session_start();
    if (isset($_SESSION['role']))
        $role = 'guest';
    else
        $role = $_SESSION['role'];

    $method = $_SERVER["REQUEST_METHOD"];
    $type = $_GET["type"];

    if ($role == 'guest'){
        switch ($type) {
            case 'list':
                $products = getProduct();
                break;
            default:
                break;
        }
    }
    else
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