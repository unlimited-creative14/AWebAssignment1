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
            $product = getProductByID($_GET["id"])[0];
        ?>
        <div class="container-fluid mt-2 md-2" style="height:100%;background-color:mintcream">
            <div class="row pt-3">
                <div class="col-md-7">
                    <!--Carousel Wrapper-->
                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">
                        <?php 
                            $imgs = getProductPicture($_GET["id"]);
                            //print_r ($imgs[0]->fetch_array());
                            $i = 0;
                            while ($row = $imgs[0]->fetch_row()) {
                                $template = '<div class="carousel-item">
                                <img class="d-block w-100" style="height: 300px;" src="'.$row[0].'" alt="Slide"></div>';
                                $template_active = '<div class="carousel-item active">
                                <img class="d-block w-100" style="height: 300px;" src="'.$row[0].'" alt="Slide"></div>';
                                if($i == 0)
                                    echo $template_active;
                                else 
                                    echo $template;
                                $i++;
                        }
                        ?>
                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                    <ol class="carousel-indicators" style="position:relative;">
                        <?php 
                            $imgs = getProductPicture($_GET["id"]);
                            //print_r ($imgs[0]->fetch_array());
                            $i = 0;
                            while ($row = $imgs[0]->fetch_row()) {
                                $template_active = '<li data-target="#carousel-thumb" data-slide-to="'.$i.'" class="active"> <img class="d-block w-100" src="'.$row[0].'"
                                class="img-fluid"></li>';
                                $template = '<li data-target="#carousel-thumb" data-slide-to="'.$i.'"> <img class="d-block w-100" src="'.$row[0].'"
                                class="img-fluid"></li>';

                                if($i == 0)
                                {
                                    echo $template_active;
                                }else
                                    echo $template;
                                $i++;
                            }
                        ?>
                    </ol>
                    </div>
                    <!--/.Carousel Wrapper-->
                    <?php 
                        if (($role == 'user' || $role == "superuser") && ($product[4] == $_SESSION["username"])){
                            echo '
                            <div class="ml-5 mr-5" id="prodControlGroup" style="position: inherit">
                                <div class="btn btn-primary" id="editdetailBtn" onclick="editThumbnailClick('.$_GET['id'].')">Chế độ chỉnh sửa</div>
                            </div>';
                        }
                    ?>
                        
                </div>
                <div class="col-md-5 pl-3 pt-5">
                    <h3 id="productName" style="font-weight:bold"><?php echo $product[1]; ?></h3>
                    <h4 id="productPrice">
                        <?php 
                            if (ctype_digit($product[3]))
                                echo $product[3].'đ';
                            else 
                                echo $product[3];
                        ?>
                    </h4>
                    <h5 class="m-5" id="owner">Người đăng tin: <?php echo $product[4]; ?></h5> 
                    <h5 class="m-5" id="other">Thông tin thêm: <?php echo $product[5]; ?></h5>
                </div>
            </div> 
            <script src="../public/js/product.js"></script>
        </div>
    </body>
</html>
