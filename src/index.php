<?php
    session_start();
    require 'config.php';
    include_once('controller/tb_user/get.php');
    include_once('controller/tb_file/get.php');
    if(!isset($_SESSION['user_id'])){
        header('location: login.php');
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['user_id']);
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Main Pages - FTP</title>
</head>
<?php require 'control/header.php' ?>
<body class="bg-light">
    <div class="container mt-3">
    <?php if (isset($_SESSION['user_id'])) : ?>
            <p> Welcome <?php echo $_SESSION['user_id'] ?></p>
            <p> Welcome <?php echo $_SESSION['username'] ?></p>
            <p> Welcome <?php echo $_SESSION['password'] ?></p>
            <p> Welcome <?php echo $_SESSION['email'] ?></p>
            <p> Welcome <?php echo $_SESSION['create_at'] ?></p>
            <p> Welcome <?php echo $_SESSION['update_at'] ?></p>
            <p> Welcome <?php echo $_SESSION['status'] ?></p>
            <p> Welcome <?php echo $_SESSION['active'] ?></p>
            <p><a href="index.php?logout='1'">logout</a></p>
            <a href="user_update.php?user_id=<?php echo $_SESSION['user_id'] ?>">โปรไฟล์</a>
            <a href="file_save.php?user_id=<?php echo $_SESSION['user_id'] ?>">uploda file</a>
            <a href="file_list.php?find=&type_file=all&seanch=find">file list</a>
            <div class="mt-4 text-center" >
            <?php if($_SESSION['user_id'] === '1') :?>
                <h1>text</h1>
            <?php endif ?>
            </div>
    <?php endif ?>
    <!-- test select -->
    <?php
        $tb_user = new tb_user();
        $tb_user_num = new tb_user();
        $user_list = $tb_user->findAll(); 
        $num = $tb_user_num->findNumberY();
        echo $num;
        while($row = mysqli_fetch_array($user_list)){ 
    ?>
        <p>
            <?php echo $row['user_id'] ?><?php echo $row['username'] ?>
            <a href="user_update.php?user_id=<?php echo $row['user_id']?>">update</a>
        </p>
    <?php  }  ?>
    </div>
</body>
</html>
