<?php
    session_start();
    require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>login</title>
</head>
<body class="bg-login">
    <div class="container ">
        <div class="row" style="margin: 150px 0px; padding: 0px 30%;">
        <!-- noti -->
        <?php if(isset($_SESSION['err'])) : ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['err']; unset($_SESSION['err']); ?>
            </div>
        <?php endif ?>
        <!--  -->
            <div class="card shadow" style="width: 100%;">
                <div class="card-body">
                    <form action="control/login_check.php" method="GET">
                        <div class="mt-4 text-center fw-bolder" >
                            <h1>Login In</h1>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text bg-white border-end-0 " id="addon-wrapping">
                                    <img src="controller/tb_file/uploads/user.png"  width="25px" style="height: 24px;">
                                </span>
                                <input name="username" type="text" class="form-control border-start-0" placeholder="username">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text bg-white border-end-0 ">
                                    <img src="controller/tb_file/uploads/padlock.png"  width="25px" style="height: 24px;">
                                </span>
                                <input name="password" type="password" class="form-control border-start-0" placeholder="password" >
                            </div>
                        </div>
                        <div class="mb-3 fw-bolder">
                            <button name="singIn" type="submit" class="btn bg-login w-100 rounded-pill text-white">Sign In</button>
                        </div>
                        <div class="text-center mb-3 ">
                            <span>ยังไม่มีสมัครสมาชิกใช่หรือไม่ ? <a href="register.php">Register now ! !</a></span>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
