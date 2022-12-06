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
    <title>reister</title>
</head>
<body class="bg-login">
    <div class="container">
        <div class="row" style="margin: 100px 0px; padding: 0px 30%;">
        <!-- noti -->
        <?php if(isset($_SESSION['err'])) : ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['err']; unset($_SESSION['err']); ?>
            </div>
        <?php endif ?>
        <!--  -->
            <div class="card shadow" style="width: 100%;">
                <div class="mt-4 text-center fw-bolder" >
                    <h1>Register</h1>
                </div>
                <div class="card-body">
                    <form action="controller/tb_user/save.php" method="POST">
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
                            <label class="form-label">Email</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text bg-white border-end-0 " id="addon-wrapping">
                                    <img src="controller/tb_file/uploads/message.png"  width="25px" style="height: 24px;">
                                </span>
                                <input name="email" type="email" class="form-control border-start-0" placeholder="email" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text bg-white border-end-0 " id="addon-wrapping">
                                    <img src="controller/tb_file/uploads/padlock.png"  width="25px" style="height: 24px;">
                                </span>
                                <input name="password" type="password" class="form-control border-start-0" placeholder="password" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text bg-white border-end-0 " id="addon-wrapping">
                                    <img src="controller/tb_file/uploads/padlock.png"  width="25px" style="height: 24px;">
                                </span>
                                <input name="confirm_password" type="password" class="form-control border-start-0" placeholder="confirm password" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save" class="btn bg-login w-100 rounded-pill text-white">Register</button>
                        </div>
                        <div class="mb-3 text-center">
                            <a href="login.php">Sign In now ! !</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>
