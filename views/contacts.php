<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Liên hệ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap-4.5.3-dist/css/bootstrap.css">
    <script src="../public/jquery-3.5.1/jquery-3.5.1.js"></script>
    <script src="../public/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/about.css">
    <link rel="stylesheet" href="../public/css/contact.css">
</head>

<body>
    <script>
        let name = "Contacts"
    </script>
    <div>
        <?php 
            include "navbar.php";
        ?>
        </div>

        <div class="image-box my-container">
            <div class="super">
                <div class="container">

                    <div class="row">

                        <div class="col-xl-8 offset-xl-2 py-5">

                            <h1 class="contact">Liên hệ với chúng tôi qua <a href="#" class="contact">laptrinhweb.hcmut.com.vn</a></h1>

                            <p class="lead">Mọi thông tin của khách hàng sẽ được bảo vệ, chúng tôi chỉ sử dụng thông này khi được sự cho phép của khách hàng.</p>

                            <form id="contact-form" method="post" role="form">

                                <div class="messages">

                                </div>

                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_name">Họ và tên đệm *</label>
                                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Họ và tên đệm (VD: Nguyễn Văn) *" required="required" data-error="Họ và tên đệm không được để trống.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_lastname">Tên</label>
                                                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Tên (VD: A) *" required="required" data-error="Tên không được để trống.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_email">Email *</label>
                                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Email của bạn abc@abc.com *" required="required" data-error="Vui lòng nhập đúng mẫu của email.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_message">Message *</label>
                                                <textarea id="form_message" name="message" class="form-control" placeholder="Nội dung liên hệ *" rows="4" required="required" data-error="Vui lòng điền nội dung liên hệ."></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-success btn-send" value="Gửi">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small id="passwordHelp" class="text-danger">
                                            * Trường yêu cầu không được bỏ trống
                                        </small>
                                        </div>
                                    </div>
                                </div>

                            </form>

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
    <script src="../public/js/backToTop.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
        <script src="../public/js/home.js"></script>
        <script>
            $(window).scroll(function() {
                // Set navbar text color, contrast
                if(checkLimit($(this).scrollTop(), [
                    [$('#navbarContainer').outerHeight(true), Infinity], 
                ])){
                    $('#navbarContainer').css('background-color', '#1c1c1c').css('opacity', '.85')
                }
                else {
                    $('#navbarContainer').css('background-color', 'transparent').css('opacity', '1')
                }
            });   
        </script>
</body>

</html>