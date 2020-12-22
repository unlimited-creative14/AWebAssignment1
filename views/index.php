<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <title>Trang chủ</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="./bootstrap-4.5.3-dist/css/bootstrap.css">
        <script src="./jquery-3.5.1/jquery-3.5.1.js"></script>
		<script src="./bootstrap-4.5.3-dist/js/bootstrap.js"></script>
        <link rel="stylesheet" href="./css/style.css"> 
        <link rel="stylesheet" href="./css/footer.css">
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
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbarContainer">
            <a class="navbar-brand" href="./">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerNavBar" aria-controls="headerNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="headerNavBar">
                <ul class="navbar-nav mr-auto" id="navListItem">
                </ul>
            </div>
		</nav>
        <!-- Home Landing -->
        <div class="container-fluid my-container" id="homeContainer">
            <div class="overlay"></div>
            <div class="container-md" id="homeContent">
                <div id="homeContent_main">
                    <h4 class="med-title" style="color: gray;">Chào mừng đến với dịch vụ thiết kế  <img style="margin: 5px;" src="./images/lhvl.png" alt="LHVL" width="150" height="42"></h4>
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
                        <img src="./images/introImage/design-word-concept_23-2147844787.jpg" height="320" class="d-block " alt="...">
                    </div>
                    <div class="carousel-item" data-interval="2000">
                        <img src="./images/introImage/photography-1500-0-.jpg" height="320" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/introImage/Design.png" class="d-block" height="320" alt="...">
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
            <a class="btn my-home-btn" href="about.html" >Nhiều hơn về chúng tôi</a>
            </div>
            
        </div>
        <div class="container-md pt-3 my-container" id="clientContainer">
            <div class="row m-auto flex-column" id="clientHeader">
                <h2 class="sub-title">Đối tác tin cậy</h2><br>
                <p class="title black" style="text-align: center;">Chúng tôi rất vinh dự khi trở thành đối tác của các bạn</p>
            </div>
            <div class="row" id="clientBox" style="margin: 10px;"></div>            
        </div>

        <div class="footer">
            <div class="footer_contents">
                <div class="content_1">
                    <div class="row">
                        <div class="col-md">
                            <h1 class="display-5 text-success">Assignment1.</h1>
                            <p class="text-white">
                                Đôi khi sự đấu tranh luôn cần phải có trong cuộc sống. Nếu cuộc sống trôi qua thật suôn sẻ, chúng ta sẽ không hiểu được cuộc sống, không có được bản lĩnh, nghị lực như chúng ta cần phải có, cuộc sống thật công bằng, không phải vô cớ mà mọi điều xảy đến với ta.
                            </p>
                        </div>    
                        <div class="col-md">
                            <h5 class="text-white">
                                Chúng tôi luôn bên bạn
                            </h5>
                            <p class="text-white">
                            Bạn cần sức mạnh, nghị lực nên cuộc sống đã đặt ra những khó khăn nghịch cảnh để bạn vượt qua và trở nên mạnh mẽ hơn
                            </p>
                            <button type="button" class="btn btn-success">
                                Đăng kí
                            </button>
                        </div>
                    </div>
                </div>
                <div class="content_2 pt-0">
                    <div class="developers">
                        <p class="text-white">Ngày thành lập :  27/11/2020</p>
                        <div class="row">
                            <div class="col-sm">
                                <p class="text-white">Nhà phát triển:</p>
                            </div>
                            <div class="col-sm">
                                <p class="text-white">Lê Hữu Võ Long</p>
                                <p class="text-white">Trương Hải Long</p>
                                <p class="text-white">Ngô Quốc Khánh</p>
                                <p class="text-white">Nguyễn Hữu Kiệt</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <script src="./js/home.js"></script>
        <script>
            partners = [
                {name: "Company 1", src: "./images/partner_icon/logo1.png", description: ""},
                {name: "Company 2", src: "./images/partner_icon/logo2.png", description: ""},
                {name: "Company 3", src: "./images/partner_icon/logo3.jpg", description: ""},
                {name: "Company 4", src: "./images/partner_icon/logo4.jpg", description: ""},
                {name: "Company 5", src: "./images/partner_icon/logo5.png", description: ""},
                {name: "Company 6", src: "./images/partner_icon/logo2.png", description: ""},
                {name: "Company 7", src: "./images/partner_icon/logo3.jpg", description: ""},
                {name: "Company 8", src: "./images/partner_icon/logo4.jpg", description: ""}
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