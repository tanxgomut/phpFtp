<?php
    session_start();
    date_default_timezone_set("Asia/Bangkok");
    $conn = new mysqli('mysql_db', 'root', 'root', 'test_docker_db');
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $module = 'test';
    $status = 'user';
    $active = 'Y';
    $create_at = date("Y-m-d H:i:s");
    $update_at = date("Y-m-d H:i:s");
    if(isset($_POST['save'])){
        if(!empty($_FILES['file']['name']) && !empty($title)){
            $base_name = basename($_FILES['file']['name']);
            $file_type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $file_name = md5(date("Y-m-d H:i:sa")) . '.' . $file_type;
            $path = 'uploads/' . $file_name;
            $allow_type = array('png','jpg','pdf','docx', 'doc');
            if(in_array($file_type,$allow_type)){
                $moveTo = move_uploaded_file($_FILES['file']['tmp_name'], $path);
                if($moveTo){
                    $sql = "";
                    $sql .= " INSERT INTO `tb_file` (`user_id`, `module`, `file_name`,";
                    $sql .= " `file_type`, `status`, `active`, `create_at`, `update_at`, `title`)";
                    $sql .= " VALUES ('$user_id', '$module', '$file_name', '$file_type', '$status', '$active',";
                    $sql .= " '$create_at', '$update_at', '$title')";
                    $result = $conn->query($sql);
                    if($result){
                        $_SESSION['err'] = 'upload file successfully !!';
                        header('location: /file_save.php');
                    }else{
                        $_SESSION['err'] = 'Upload file Failed !!';
                        header('location: /file_save.php');
                    }
                }else{
                    $_SESSION['err'] = 'Upload file Failed !!';
                    header('location: /file_save.php');
                }   
            }else{
                $_SESSION['err'] = 'Not allowed file !!';
                header('location: /file_save.php');
            }
        }else{
            $_SESSION['err'] = 'Empty file upload !!';
            header('location: /file_save.php');
        }
    }else{
        $_SESSION['err'] = 'Not Confrim !!';
        header('location: /file_save.php');
    }
?>