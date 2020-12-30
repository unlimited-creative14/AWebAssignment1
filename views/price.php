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
        ?>
        <div class="container-fluid my-container" id="priceContainer">   
            <div class="overlay" style="z-index:-1"></div> 
            <div class="container-fluid d-flex flex-column mb-4" id="introContainer" style="padding:10rem;min-height:768px;justify-content:center;align-items:center">
                <h2 style="font-weight:bold; font-size:xxx-large; color:#48f048;">Tin sản phẩm</h2>
                <p class="text-wrap" style="font-size:xx-large;text-align:center;color: honeydew;">Những sản phẩm bạn có thể tìm thấy ở đây đều được những thành viên của chúng tôi sẵn sàng đáp ứng hỗ trợ</p>
            </div>        
            
            <?php 
                if ($role == 'user' || $role == "superuser"){
                    echo '
                    <div class="ml-5 mr-5" id="prodControlGroup" style="position: inherit">
                        <div class="btn btn-primary" id="editBtn">Chế độ chỉnh sửa</div>
                    </div>';
                }
            ?>
            <div class="container d-flex flex-wrap justify-content-md-center" id="productCardList">
            </div>
            
        </div>
        <?php include "footer.php" ?>
        <script src="../public/js/home.js"></script>
        <script src="../public/js/product.js"></script>
        <script>
            $("#editBtn").click(() => {
            // enter edit mode
                if(!editmode)
                {
                    loadEditProduct();
                    $(".card-overlay").css("display", "flex")
                    editmode = true; 
                    addBtn = $('<div class="btn btn-primary" id="addBtn" onclick="addClick()">Thêm</div>');
                    $("#prodControlGroup").append(addBtn);
                }
                else {
                    loadProduct()
                    editmode = false; 
                    $("#addBtn").remove();
                }
                
            })

            loadProduct()
        </script>
    </body>
</html>