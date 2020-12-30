<?php
session_start();
$nav = '<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbarContainer">
        <a class="navbar-brand" href="./">
            <img src="../public/images/lhvl.png" alt="Avatar" style="width:70px; height:25px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerNavBar" aria-controls="headerNavBar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="headerNavBar">
        <ul class="navbar-nav mr-auto" id="navListItem">
            <li class="nav-item"><a href="./index.php" class="nav-link">Trang chủ</a></li>
            <li class="nav-item"><a href="./about.php" class="nav-link">Giới thiệu</a></li>
            <li class="nav-item"><a href="./services.php" class="nav-link">Dịch vụ</a></li>
            <li class="nav-item"><a href="./price.php" class="nav-link">Sản phẩm</a></li>
            <li class="nav-item"><a href="./contacts.php" class="nav-link">Liên hệ</a></li>
        </ul>
        <form class="form-inline  my-lg-0">';


$nav_2 = '
        </form>
    </nav>';

if (!isset($_SESSION['username'])) {
    $nav_3 = '
    <a href="login.php" role="button" class="btn btn-outline-success mx-2 my-2 my-sm-0" type="submit">Log In</a>
    <a href="signup.php" role="button" class="btn btn-outline-success mx-2 my-2 my-sm-0" type="submit">Sign Up</a>';
    echo $nav . $nav_3 . $nav_2;
} else {
    $username = $_SESSION["username"];
    $nav_3 = '
        <span class="btn btn-out line-light navbar-text text-light my-2 my-sm-0 mr-3"> Hello, ' . $_SESSION["username"].
    '</span>
        <a href="logout.php" role="button" class="btn btn-outline-success my-2 my-sm-0" type="submit">LogOut</a>';
    echo $nav . $nav_3 . $nav_2;
}
