<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin</title>
    <link rel="stylesheet" href="../public/bootstrap-4.5.3-dist/css/bootstrap.css">
    <script src="../public/jquery-3.5.1/jquery-3.5.1.js"></script>
    <script src="../public/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../public/css/about.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/login.css">
</head>

<body>
    <?php 
        include "navbar.php";
    ?>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-signin" method="POST" action="?action=editprofile">
                    <h1 class="h3 mb-3 font-weight-bold text-center text-light mt-2">Chỉnh sửa thông tin</h1>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" placeholder= <?php echo $_SESSION['username'] ?> name="username" readonly>
                    </div>

                    <div class="form-group">
                        <label for="Fname">Họ:</label>
                        <input type="text" class="form-control" id="Fname" placeholder = "<?php if ($_SESSION['Fname'] == "c" || $_SESSION['Fname'] == Null) echo "Họ"; else echo sprintf($_SESSION['Fname']);?>" name="Fname">
                    </div>
                    
                    <div class="form-group">
                        <label for="Lname">Tên:</label>
                        <input type="text" class="form-control" id="Lname" placeholder = "<?php if ($_SESSION['Lname'] == "c" || $_SESSION['Lname'] == Null) echo "Tên"; else echo sprintf($_SESSION['Lname']);?>" name="Lname">
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address" placeholder = "<?php if ($_SESSION['address'] == "c" || $_SESSION['address'] == Null) echo "Địa chỉ"; else echo sprintf($_SESSION['address']);?>" name="address">
                    </div>

                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="text" class="form-control" id="Email" placeholder = "<?php if ($_SESSION['Email'] == "c" || $_SESSION['Email'] == Null) echo "Email"; else echo sprintf($_SESSION['Email']);?>" name="Email">
                    </div>

                    <div class="form-group">
                        <label for="Phone">Số điện thoại:</label>
                        <input type="text" class="form-control" id="Phone" placeholder = "<?php if ($_SESSION['Phone'] == "c" || $_SESSION['Phone'] == Null) echo "Số điện thoại"; else echo sprintf($_SESSION['Phone']);?>" name="Phone">
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="Create">Lưu</button>
                </form>
                <br>
                <?php
                if (isset($_GET['action'])) {
                    require_once('../controllers/EditProfileController.php');
                }
                ?>
                <!-- <p class="mb-3 text-muted text-center">© 2020-2021</p> -->
                <br>
                <p class="mb-3 text-center"><a class="text-light" href="index.php">Trang chủ</a></p>
            </div>
        </div>
    </div>
    <br>
    <?php
        include "footer.php";
    ?>
</body>

</html>
