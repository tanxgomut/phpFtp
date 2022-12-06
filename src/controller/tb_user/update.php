<?php 
    session_start();
    date_default_timezone_set("Asia/Bangkok");
    $conn = new mysqli('mysql_db', 'root', 'root', 'test_docker_db');
    if(isset($_POST['save'])){
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $username =  mysqli_real_escape_string($conn, $_POST['username']);
        $email =  mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $update_at = date("Y-m-d H:i:s");
        $active = (isset($_POST['active'])) ? mysqli_real_escape_string($conn, $_POST['active']) : mysqli_real_escape_string($conn, $_SESSION['active']) ;
        $status = (isset($_POST['status'])) ? mysqli_real_escape_string($conn, $_POST['status']) : mysqli_real_escape_string($conn,  $_SESSION['status']) ;

        $sql = " UPDATE tb_user SET 
                                `username` = '$username', `password` = '$password', 
                                `email` = '$email', `update_at` = '$update_at', 
                                `status` = '$status', `active` = '$active' 
                                WHERE `user_id` = '$user_id'";
                mysqli_query($conn, $sql);
                $sql_ses = " SELECT * FROM `tb_user` WHERE `user_id` = '$user_id' LIMIT 1 ";
                $sql_ex = mysqli_query($conn, $sql_ses);
                $result = mysqli_fetch_assoc($sql_ex);
                
                $_SESSION['user_id'] = $result['user_id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['password'] = $result['password'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['update_at'] = $result['update_at'];
                $_SESSION['status'] = $result['status'];
                $_SESSION['active'] = $result['active'];
                header('location: /user_update.php?user_id='.$user_id.'');
    }else{

    }
    
?>