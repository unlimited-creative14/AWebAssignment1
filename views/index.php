<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <title>Trang chủ</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="../public/bootstrap-4.5.3-dist/css/bootstrap.css">
        <script src="../public/jquery-3.5.1/jquery-3.5.1.js"></script>
		<script src="../public/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
        <link rel="stylesheet" href="../public/css/style.css"> 
        <link rel="stylesheet" href="../public/css/footer.css">
    </head>
    <body>
        <!-- name = current page -->
        <script>let name = "Home"</script>
        <button id="scrollTop" style="background-color: black; opacity: .4;" class="btn" onclick="window.scrollTo(0, 0)">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-bar-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <div class="parallax" id="parallaxScrolling"></div>
        <?php 
            include "./navbar.php";
        ?>
        <!-- Home Landing -->
        <div class="container-fluid my-container" id="homeContainer">
            <div class="overlay"></div>
            <div class="container-md" id="homeContent">
                <div id="homeContent_main">
                    <h4 class="med-title" style="color: gray;">Chào mừng đến với dịch vụ thiết kế  <img style="margin: 5px;" src="../public/images/lhvl.png" alt="LHVL" width="150" height="42"></h4>
                    <h1 class="big-title white" >Chúng tôi là những người sáng tạo, chuyên thiết kế nhãn hiệu và trải nghiệm số</h1>
                </div>
                <div class="container-md home-btn-group" id="homeContent_buttonGroup">
                    <a class="btn my-home-btn" href="./services.html">Về dịch vụ</a>
                    <a class="btn my-home-btn" onclick="window.scrollTo(0, $('#homeContainer').height() + 10)">Về chúng tôi</a>
                </div>
            </div>
        </div>

        <div class="container-md pt-3 my-container" id="introContainer">
            <div class="row m-auto flex-column" id="introHeader">
                <h2 class="sub-title">Giới thiệu về công ty</h2>
                <p class="title white">Công ty chúng tôi chuyên về thiết kế các sản phẩm điện tử, web site, cung cấp các giải pháp thiết kế cho các doanh nghiệp, cá nhân có nhu cầu.</p>
                <div id="introSlide" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="10000">
                        <img src="../public/images/introImage/design-word-concept_23-2147844787.jpg" height="320" class="d-block " alt="...">
                    </div>
                    <div class="carousel-item" data-interval="2000">
                        <img src="../public/images/introImage/photography-1500-0-.jpg" height="320" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../public/images/introImage/Design.png" class="d-block" height="320" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#introSlide" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#introSlide" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <a class="btn my-home-btn" href="about.php" >Nhiều hơn về chúng tôi</a>
            </div>
            
        </div>
        <div class="container-md pt-3 my-container" id="clientContainer">
            <div class="row m-auto flex-column" id="clientHeader">
                <h2 class="sub-title">Đối tác tin cậy</h2><br>
                <p class="title black" style="text-align: center;">Chúng tôi rất vinh dự khi trở thành đối tác của các bạn</p>
            </div>
            <div class="row" id="clientBox" style="margin: 10px;"></div>            
        </div>

        <?php
            include "footer.php";
        ?>
    
        <script src="../public/js/home.js"></script>
        <script>
            partners = [
                {name: "Company 1", src: "../public/images/partner_icon/logo1.png", description: ""},
                {name: "Company 2", src: "../public/images/partner_icon/logo2.png", description: ""},
                {name: "Company 3", src: "../public/images/partner_icon/logo3.jpg", description: ""},
                {name: "Company 4", src: "../public/images/partner_icon/logo4.jpg", description: ""},
                {name: "Company 5", src: "../public/images/partner_icon/logo5.png", description: ""},
                {name: "Company 6", src: "../public/images/partner_icon/logo2.png", description: ""},
                {name: "Company 7", src: "../public/images/partner_icon/logo3.jpg", description: ""},
                {name: "Company 8", src: "../public/images/partner_icon/logo4.jpg", description: ""}
            ]
            createPartnerItem(partners);
        </script>
        <script>
            $(window).scroll(function() {
                // Set visibility of scroll top button
                if(checkLimit($(this).scrollTop(), [
                    [0, $('#homeContainer').outerHeight(true) / 2]
                ])){
                    $('#scrollTop').css("visibility","hidden");
                }
                else
                    $('#scrollTop').css("visibility","visible");

                // Set navbar text color, contrast
                if(!checkLimit($(this).scrollTop(), [
                    [0, $('#homeContainer').outerHeight(true) + $('#introContainer').outerHeight(true) - $('#navbarContainer').outerHeight(true)], 
                    [$('#homeContainer').outerHeight(true) + $('#introContainer').outerHeight(true) + $('#clientContainer').outerHeight(true), Infinity]
                ])){
                    $('#navbarContainer').css('background-color', '#1c1c1c').css('opacity', '.85')
                }
                else {
                    $('#navbarContainer').css('background-color', 'transparent').css('opacity', '1')
                }
            });            
                        
            if ($(window).width() > 768) {
                $(window).scroll(function() {
                    // Scroll down the parallax background
                    if($(this).scrollTop() < $('#homeContainer').height())
                    {
                        //$('.overlay').css('top', $(this).scrollTop()+"px")
                        $('.overlay').css('position', 'fixed')
                        $('.parallax').css('background-position-y', (50 + $(this).scrollTop()/12) + '%')                     
                    }      
                    else
                        $('.overlay').css('position', 'absolute')
                });
            }
        </script>
    </body>
</html>