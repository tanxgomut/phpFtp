<?php 
    session_start();
    date_default_timezone_set("Asia/Bangkok");
    $conn = new mysqli('mysql_db', 'root', 'root', 'test_docker_db');
    if(isset($_POST['save'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
        $create_at = date("Y-m-d H:i:s");
        $update_at = date("Y-m-d H:i:s");
        $active = 'Y';
        $status = 'user';
        if(empty($username) || empty($email) || empty($password) || empty($confirm_password) ){
            $_SESSION['err'] = 'กรอกข้อมูลไม่ครบ';
            header('location: /register.php');
        }else if($password != $confirm_password){
            $_SESSION['err'] = 'รหัสผ่านไม่ตรงกัน';
            header('location: /register.php');
        }else{
            $sql_check = " SELECT * FROM `tb_user` WHERE username = '$username' AND active = 'Y' LIMIT 1 ";
            $sql_result = mysqli_query($conn, $sql_check);
            $result = mysqli_fetch_assoc($sql_result);
            if($result){
                if($result['username'] === $username){
                    $_SESSION['err'] = 'Username มีผู้ใช้แล้ว';
                    header('location: /register.php');
                }
            }else{
                $sql = " INSERT INTO `tb_user` (`username`, `password`, `email`, `create_at`, `update_at`, `status`, `active`) VALUES ('$username', '$password', '$email', '$create_at', '$update_at', '$status', '$active');";
                mysqli_query($conn, $sql);
                $select = " SELECT * FROM `tb_user` WHERE username = '$username' AND active = 'Y' LIMIT 1 ";
                $sql_db = mysqli_query($conn, $select);
                $result_user = mysqli_fetch_assoc($sql_db);
                $_SESSION['user_id'] = $result_user['user_id'];
                $_SESSION['username'] = $result_user['username'];
                $_SESSION['password'] = $result_user['password'];
                $_SESSION['email'] = $result_user['email'];
                $_SESSION['create_at'] = $result_user['create_at'];
                $_SESSION['update_at'] = $result_user['update_at'];
                $_SESSION['status'] = $result_user['status'];
                $_SESSION['active'] = $result_user['active'];
                header('location: /index.php');
            }
        }
       
    }else{

    }
?>