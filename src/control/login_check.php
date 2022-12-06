<?php
    session_start();
    $conn = new mysqli('mysql_db', 'root', 'root', 'test_docker_db');
    if(isset($_GET['singIn'])){
        $username = mysqli_real_escape_string($conn, $_GET['username']);
        $password = mysqli_real_escape_string($conn, $_GET['password']);
        if(empty($username) || empty($password)){
            $_SESSION['err'] = 'กรอกข้อมูลไม่ครบ';
            header('location: /login.php');
        }else{
            $sql_check = " SELECT * FROM `tb_user` WHERE username = '$username' AND password = '$password' LIMIT 1 ";
            $sql_result = mysqli_query($conn, $sql_check);
            $result = mysqli_fetch_assoc($sql_result);
            if($result){
                if($result['active'] === 'Y'){
                    $_SESSION['user_id'] = $result['user_id'];
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['password'] = $result['password'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['create_at'] = $result['create_at'];
                    $_SESSION['update_at'] = $result['update_at'];
                    $_SESSION['status'] = $result['status'];
                    $_SESSION['active'] = $result['active'];
                    header('location: /index.php');
                }else{
                    $_SESSION['err'] = 'บัญชีคุณถูกลบ';
                    header('location: /login.php');
                }
            }else{
                $_SESSION['err'] = 'ยังไม่สมัครสมาชิก';
                header('location: /login.php');
            }
        }
    }else{

    }

?>