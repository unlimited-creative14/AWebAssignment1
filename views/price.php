<?php 
    session_start();
    $role = "member";
    $uid = 1000;
?>
<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <title>Bảng giá</title>
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
        <script>let name = "Price"</script>
        <button id="scrollTop" style="background-color: black; opacity: .4;" class="btn" onclick="window.scrollTo(0, 0)">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-bar-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <div class="parallax" id="parallaxScrolling"></div>
        <?php include "navbar.php" ?>
        <div class="container-fluid my-container" id="priceContainer">            
            <div>San pham duoc rao ban</div>
            <?php 
                if ($role == 'member' || $role == "admin"){
                    echo '
                    <div class="ml-5 mr-5" id="prodControlGroup">
                        <div class="btn btn-primary" id="editBtn">Edit mode</div>
                    </div>';
                }
            ?>
            <div class="container d-flex flex-wrap" id="productCardList">
            </div>
            
        </div>
        <?php include "footer.php" ?>
        <script src="../public/js/home.js"></script>
        <script src="../public/js/product.js"></script>
    </body>
</html>