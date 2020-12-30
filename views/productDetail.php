<?php
    if (!array_key_exists("id", $_GET))
        header("Location: ./price.php");
?>
<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <title>Sản phẩm</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="../public/bootstrap-4.5.3-dist/css/bootstrap.css">
        <script src="../public/jquery-3.5.1/jquery-3.5.1.js"></script>
        <script src="../public/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
        <script src="../public/sweetalert2-10.12.6/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="../public/sweetalert2-10.12.6/sweetalert2.min.css">
        <link rel="stylesheet" href="../public/css/style.css"> 
        <link rel="stylesheet" href="../public/css/footer.css">
        <link rel="stylesheet" href="../public/css/price.css">
    </head>
    <body>
        <button id="scrollTop" style="background-color: black; opacity: .4;" class="btn" onclick="window.scrollTo(0, 0)">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-bar-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <div class="parallax" id="parallaxScrolling"></div>
        <?php include "navbar.php" ?>
        <?php 
            if (!array_key_exists('role', $_SESSION))
                $role = 'guest';
            else
                $role = $_SESSION['role'];
            include "../controllers/ProductDetailController.php";
            $product = getProductByID($_GET["id"]);
        ?>
        <div class="container-fluid mt-2 md-2" style="height:100%;">
            <div class="row pt-3">
                <div class="col-md-5 ml-2 mr-2">
                    
                </div>
                <div class="col-md-7"></div>
            </div>
            
            
        </div>

    </body>
</html>
