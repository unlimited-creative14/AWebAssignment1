<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Giới thiệu</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../public/bootstrap-4.5.3-dist/css/bootstrap.css">
    <script src="../public/jquery-3.5.1/jquery-3.5.1.js"></script>
    <script src="../public/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../public/css/about.css">
    <link rel="stylesheet" href="../public/css/footer.css">

</head>
<body>
    <script>let name = "About"</script>
    <div id="top_page"></div>
    <div>
        <?php
            include "navbar.php";
        ?>
    </div>
    <div id="about">
        <div id="about_1">
            <div class="size mx-auto scroll">
                <div class="text-center">
                    <div class="pl-4 pr-4 pt-5 pb-2">
                        <h1 class="display-5">
                            <strong>Xin chào</strong>
                        </h1>
                        <h1 class="text-white display-2">
                            <strong class="shine line_bottom">Đồng hành cùng bạn</strong>
                        </h1>
                    </div>
                    <div class="pl-4 pr-4 pt-2 pb-4">
                        <h1 class="display-5">
                                Đôi khi sự đấu tranh luôn cần phải có trong cuộc sống. Nếu cuộc sống trôi qua thật suôn sẻ, 
                                chúng ta sẽ không hiểu được cuộc sống, không có được bản lĩnh, nghị lực như chúng ta cần phải có, 
                                cuộc sống thật công bằng, không phải vô cớ mà mọi điều xảy đến với ta.
                        </h1>
                    </div>
                </div>
            </div>
            <div class="size_1 mx-auto scroll1">
                <div class="row">
                    <div class="col-sm-6 col-lg-3 text-center">
                        <h1 class="display-2 text-white">
                            <strong class="counter" data-target="4045">0</strong>
                        </h1>
                        <h4>Lượt truy cập</h4>
                    </div>
                    <div class="col-sm-6 col-lg-3 text-center">
                        <h1 class="display-1 text-white">
                            <strong class="counter" data-target="1500">0</strong>
                        </h1>
                        <h4>Lượt thích</h4>
                    </div>
                    <div class="col-sm-6 col-lg-3 text-center">
                        <h1 class="display-1 text-white">
                            <strong class="counter" data-target="545">0</strong>
                        </h1>
                        <h4>Sản phẩm</h4>
                    </div>
                    <div class="col-sm-6 col-lg-3 text-center">
                        <h1 class="display-1 text-white">
                            <strong class="counter" data-target="1250">0</strong>
                        </h1>
                        <h4>Lời bình chọn</h4>
                    </div>
                </div>
            </div>
        </div>

        <div id="about_2">
            <div class="bg-dark wrap">
                <div class="intro pl-sm-3 pb-sm-3 pr-sm-3 pl-md-5 pb-md-5 pr-md-5 size_1 m-auto">
                    <h1 class="display-5 text-success text-center">
                        <strong>Công việc</strong>
                    </h1>
                    <h1 class="display-2 pb-sm-3 pb-md-5 text-light text-center line_bottom">
                        <strong>Chúng tôi có những thứ bạn cần cho việc thiết kế sản phẩm</strong>
                    </h1>
                </div>
            </div>
            <div id="flag_content_about2"></div>
            <div class="works_content size_2">
                <div class="row p-4">
                    <div class="col-md p-0">
                        <div class="bg-dark">
                            <div class="item">
                                <img src="../public/images/pts.jpg" alt="Photoshop">
                                <div class="item_info">
                                    <h4>Photoshop</h4>
                                    <p>
                                        Một vài dòng mô tả công việc
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-dark">
                            <div class="item">
                                <img src="../public/images/Design.png" alt="Design">
                                <div class="item_info">
                                    <h4>Thiết kế</h4>
                                    <p>
                                        Một vài dòng mô tả công việc
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-dark">
                            <div class="item">
                                <img src="../public/images/graphics.jpg" alt="Effect">
                                <div class="item_info">
                                    <h4>Đồ họa</h4>
                                    <p>
                                        Một vài dòng mô tả công việc
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md p-0">
                        <div class="bg-dark">
                            <div class="item">
                                <img src="../public/images/web_developer.jpg" alt="Web developer">
                                <div class="item_info">
                                    <h4>Lập trình web</h4>
                                    <p>
                                        Một vài dòng mô tả công việc
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-dark">
                            <div class="item">
                                <img src="../public/images/home_design.jpg" alt="home design">
                                <div class="item_info">
                                    <h4>Thiết kế nội thất</h4>
                                    <p>
                                        Một vài dòng mô tả công việc
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include "footer.php";
    ?>
    <button class="backtotop btn btn-link text-success" onclick="scrollToTop();return false">
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-bar-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </button>
    <script src="../public/js/home.js"></script>
    <script src="../public/js/counter.js"></script>
    <script src="../public/js/backToTop.js"></script>
    <script>
        $(window).scroll(function () {
            const distance = document.getElementById('about_2').getBoundingClientRect().top - document.getElementById('top_page').getBoundingClientRect().top
            const distance1 = document.getElementById('flag_content_about2').getBoundingClientRect().top - document.getElementById('top_page').getBoundingClientRect().top
            $('nav').toggleClass('scrolled', $(this).scrollTop() > distance && $(this).scrollTop() < distance1)
        })
        
    </script>
</body>
</html>