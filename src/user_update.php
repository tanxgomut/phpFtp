<?php
    session_start();
    include_once('controller/tb_user/get.php');
    include_once('controller/tb_file/get.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Profile Update - FTP</title>
</head>
<?php require 'control/header.php' ?>
<body class="bg-login">
    <div class="container">
        <div class="row" style="margin: 50px 0px; padding: 0px 5%;">
        <!-- noti -->
        <?php if(isset($_SESSION['err'])) : ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['err']; unset($_SESSION['err']); ?>
            </div>
        <?php endif ?>
        <!--  -->
            <div class="card shadow" style="width: 100%; height: 500px;">
                <div class="fw-bolder mt-4 text-center" >
                    <h1>Profile Update</h1>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="card-body " style="width: 30%;">
                        <form action="controller/tb_user/update.php?user_id=<?php echo $_GET['user_id'] ?>" method="POST">
                        <?php
                            $tb_user = new tb_user();
                            $user_list = $tb_user->findById($_GET['user_id']); 
                            while($row = mysqli_fetch_array($user_list)){
                        ?>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input name="username" type="text" class="form-control" placeholder="username"
                                value="<?php echo $row['username']?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" placeholder="email" 
                                value="<?php echo $row['email']?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" placeholder="password" 
                                value="<?php echo $row['password']?>">
                            </div>
                            <?php if($_SESSION['status'] === 'admin'): ?>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="col-md-5">
                                    <label class="form-label">Status</label>
                                    <select name="status" type="text" class="form-select" aria-label="Default select example">
                                        <?php if( $row['status'] === 'user'): ?>
                                            <option value="admin">admin</option>
                                            <option selected value="user">user</option>
                                        <?php endif ?>
                                        <?php if( $row['status'] === 'admin'): ?>
                                            <option value="user">user</option>
                                            <option selected value="admin">admin</option>
                                        <?php endif ?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Active</label>
                                    <select name="active" type="text" class="form-select" aria-label="Default select example">
                                        <?php if( $row['active'] === 'Y'): ?>
                                            <option value="N">N</option>
                                            <option selected value="Y">Y</option>
                                        <?php endif ?>
                                        <?php if( $row['active'] === 'N'): ?>
                                            <option value="Y">N</option>
                                            <option selected value="N">Y</option>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                            <?php endif ?>
                        <?php } ?>
                            <button  type="submit" name="save" class=" text-center btn bg-login rounded-pill text-white " 
                                    onclick="return confirm('Are you sure To update !!')"
                                    style="margin-left: auto; margin-right: auto; display: block;">
                                update
                            </button>
                        </form>
                    </div>
                    <div class="card-body  " style="width: 70%;" >
                        <label class="form-label d-flex justify-content-end">File History</label>
                        <div style="overflow: auto; height: 295px;">
                            <?php
                                $tb_file = new tb_file();
                                $file_list = $tb_file->findUserFile($_GET['user_id']); 
                                while($row = mysqli_fetch_array($file_list)){
                            ?>
                                <div class="card w-100 mb-1">
                                    <div class="card-body" style="overflow: hidden;">
                                        <div class="d-flex justify-content-start">
                                            <span class="text-truncate" style="width: 75%;" >
                                                <?php echo $row['title'] ?>
                                            </span>
                                            <span  style="width: 10%; text-align: center;" class=" px-1 text-truncate " >
                                                <span class="<?php echo $row['file_type'] === 'jpg' || $row['file_type'] === 'png' ? " type-img" : " type-doc" ?>">
                                                    <?php echo $row['file_type'] ?>
                                                </span>
                                                
                                            </span>
                                            <span class="text-truncate" style="width: 15%;">
                                                <?php echo $row['fomatDate'] ?>
                                            </span>
                                        </div> 
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
