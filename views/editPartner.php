<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap-4.5.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/slider.css">
    <script src="../public/jquery-3.5.1/jquery-3.5.1.js"></script>
    <script src="../public/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    
    <title>Sửa đối tác</title>
</head>
<body>
    <div>
        <?php 
            include "navbar.php";
        ?>
    </div>
    <div class="something">
        navbar
    </div>
    <div class="slider_modal">
        <div class="modal fade" id="SliderModal" role="dialog">
            <div class="modal-dialog">
        <!-- Modal content-->
                <div class="modal-content" id="modalcontent">
                    
                </div>
            </div>
        </div>
    </div>
    <button id="btnInsert" type="button" class="btn btn-outline-success insert">Thêm</button>
    <div class="mg-2" id="partnerList">
    </div>

    <script src="../public/js/Partner.js"></script>
    <script>
        $('nav').addClass('bg-dark')
    </script>
</body>
</html>