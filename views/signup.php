<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
                <form class="form-signin" method="POST" action="?action=signup">
                    <h1 class="h3 mb-3 font-weight-bold text-center text-light mt-2">Create a new account</h1>

                    <label for="inputUser" class="sr-only">Username</label>
                    <input type="text" id="inputEmail" class="form-control mb-2" placeholder="Username" required="" autofocus="" name="username" value="<?php echo (isset($_POST['username']) ? $_POST['username'] : ''); ?>">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required="" name="pwd">
                    <label for="inputPassword" class="sr-only">Repeat Password</label>
                    <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Repeat Password" required="" name="repwd">
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="text" id="inputPassword" class="form-control mb-2" placeholder="Email" required="" name="email">
                    <div class="checkbox mb-2">
                        <label>
                            <input type="checkbox" value=""> I agree to the terms of the <span class="font-weight-bold"> Agreement</span> and the Valve <a class="font-weight-bold text-dark"> Privacy Policy </a>.
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="Create">Continue</button>
                    <div class="mt-3">
                        <p>Forgot your password? <a href="#" class="text-light">Click here</a></p>
                        <p>Do you have your account? <a href="login.php" class="text-light">Click here</a></p>
                    </div>
                </form>
                <?php
                if (isset($_GET['action'])) {
                    require_once('../controllers/SignupController.php');
                }
                ?>
                <!-- <p class="mb-3 text-muted text-center">© 2020-2021</p> -->
                <p class="mb-3 text-center"><a class="text-light" href="index.php">Trang chủ</a></p>
            </div>
            
        </div>
    </div>
</body>

</html>