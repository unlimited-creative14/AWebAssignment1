<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="../public/bootstrap-4.5.3-dist/css/bootstrap.css">
    <script src="../public/jquery-3.5.1/jquery-3.5.1.js"></script>
    <script src="../public/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../public/css/about.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/login.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-signin" method="POST" action="?action=login">

                    <h1 class="h3 mb-3 font-weight-bold text-center text-light ">Log in</h1>

                    <label for="inputEmail" class="sr-only">Username only letters and characters, no special chars</label>
                    <input type="text" id="inputEmail" class="form-control mb-2" placeholder="Username" required="" autofocus="" name="username" >
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required="" name="pwd">
                    <div class="checkbox mb-2">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="Login">Sign in</button>
                    <div class="mt-2">
                        <p>Forgot your password? <a href="#" class="text-light">Click here</a></p>
                        <p>New user? <a href="./signup.php" class="text-light">Create new account</a></p>
                    </div>

                </form>

                <?php
                if (isset($_GET['action'])) {
                    include('../controllers/LoginController.php');
                }
                ?>
                <!-- <p class="mb-3 text-muted text-center">© 2020-2021</p> -->
                <p class="mb-3 text-center"><a class="text-light" href="index.php">Trang chủ</a></p>
            </div>

        </div>
    </div>
</body>

</html>