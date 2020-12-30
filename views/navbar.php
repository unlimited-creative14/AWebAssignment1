<?php
    include "../models/model.php";
    
    function getAvatar($uname)
    {
        global $username;
        $user = getUser($username);
    }
    
    $nav = '<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbarContainer">
    <a class="navbar-brand" href="./"><img src="../public/images/lhvl.png" alt="LHVL" width="90" height="28"></a>
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
        <div class="form-inline mr-2" style="color:wheat">
            <img class="rounded-circle" src="../public/images/lhvl.png" alt="Avatar" style="border-radius: 50%; width:50px; height:50px">
            User_name
        </div>
    </div>
</nav>';
    echo $nav;
?>