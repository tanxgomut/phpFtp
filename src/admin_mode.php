<?php 
    session_start();
    include_once('controller/tb_file/get.php');
    include_once('controller/tb_user/get.php');
    require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/2b5f956b3c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Mode - FTP</title>
</head>
<?php require 'control/header.php' ?>
<body class="bg-light">
    <div class="container mt-3">
        <div class="row">
        <div class="col-2" style="border-right: 1px solid rgb(12, 12, 126);">
            <div class="col-12 admin-list-pages" >
                <a href="admin_mode.php?page=admin_dashboard&user_id=<?php echo $_SESSION['user_id'] ?>" 
                    class="fw-bolder text-decoration-none <?php echo $_GET['page'] === 'admin_dashboard' ? " text-info" : " text-main" ?>">
                    Dashboard
                </a>
            </div>
            <div class="col-12 admin-list-pages">
                <a href="admin_mode.php?page=admin_account&user_id=<?php echo $_SESSION['user_id'] ?>&active=Y&find=" 
                    class=" fw-bolder text-decoration-none <?php echo $_GET['page'] === 'admin_account'  &&  $_GET['active'] === 'Y' ? " text-info" : " text-main" ?>">
                    Active Account
                </a>
            </div>
            <div class="col-12 admin-list-pages" >
                <a href="admin_mode.php?page=admin_account&user_id=<?php echo $_SESSION['user_id'] ?>&active=N&find=" 
                    class="fw-bolder text-decoration-none <?php echo $_GET['page'] === 'admin_account'  &&  $_GET['active'] === 'N' ? " text-info" : " text-main" ?>">
                    Inactive Account
                </a>
            </div>
            <div class="col-12 admin-list-pages" >
                <a href="file_list.php?find=&type_file=all&seanch=find" class=" text-main fw-bolder text-decoration-none">
                    File Documents
                </a>
            </div>
            <div class="col-12 admin-list-pages" >
                <a href="file_images.php?find=&type_file=all&seanch=find" class=" text-main fw-bolder text-decoration-none">
                    File Images
                </a>
            </div>
        </div>
        <div class="col-10">
            <?php if($_GET['page'] === 'admin_dashboard'){ ?>
                <?php require 'admin_dashboard.php' ?>
            <?php } ?>
            <?php if($_GET['page'] === 'admin_account' && $_GET['active'] === 'Y'){ ?>
                <?php require 'admin_account.php' ?>
            <?php } ?>
            <?php if($_GET['page'] === 'admin_account' && $_GET['active'] === 'N'){ ?>
                <?php require 'admin_account.php' ?>
            <?php } ?>
        </div>
        </div>
        
    </div>
</body>
</html>