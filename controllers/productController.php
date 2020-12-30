<?php
    session_start();
    include_once "../models/ProductModel.php";
    
    if (!array_key_exists('role', $_SESSION))
    {
        $role = 'guest';
        $uid = "0";
    }
    else{
        $role = $_SESSION['role'];
        $uid = $_SESSION['username'];
    }
    
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
        echo json_encode($products); 
    }
    else
        switch ($method){
            case 'GET':
                switch ($type) {
                    case 'list':
                        $products = getProduct();
                        break;
                    case 'editlist':
                        if ($role == "user")
                            $products = getProductAssocUID($uid);
                        elseif ($role == "superuser")
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
                if (!$res[0])
                    http_response_code(400);
                echo json_encode($res);
                break;
        }
?>