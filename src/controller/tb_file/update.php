<?php
    session_start();
    date_default_timezone_set("Asia/Bangkok");
    $conn = new mysqli('mysql_db', 'root', 'root', 'test_docker_db');
    $file_id = $_GET['file_id'];
    $file_check = $_GET['file_name'];
    $title_check = $_GET['title'];
    $active_check = $_GET['active'];
    $type_check = $_GET['type'];
    $title = $_POST['title'];
    $module = 'test';
    $active = $_POST['active'];
    $update_at = date("Y-m-d H:i:s");
    if(isset($_POST['save'])){
        if(empty($_FILES['file']['name']) && empty($title)){
            $_SESSION['err'] = 'Empty title And file !!';
            header('location: /file_update.php?file_id='.$file_id.'&title='.$title_check.'&file_name='.$file_check.'&type='.$type_check.'&active='.$active_check.'');
        }else if(empty($_FILES['file']['name']) && !empty($title) && !empty($active)){
            $sql = " UPDATE tb_file SET 
                            `title` = '$title', 
                            `active` = '$active', 
                            `update_at` = '$update_at' 
                            WHERE `file_id` = '$file_id'";
            $result = mysqli_query($conn, $sql);   
            $_SESSION['err'] = 'Update title successfuly !!';
            header('location: /file_update.php?file_id='.$file_id.'&title='.$title.'&file_name='.$file_check.'&type='.$type_check.'&active='.$active.'');
        }else if(!empty($_FILES['file']['name']) && !empty($title) && !empty($active)){
            $base_name = basename($_FILES['file']['name']);
            $file_type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $file_name = md5(date("Y-m-d H:i:sa")) . '.' . $file_type;
            $path = 'uploads/' . $file_name;
            $allow_type = array('png','jpg','jpeg','pdf','docx', 'doc');
            if(in_array($file_type,$allow_type)){
                $moveFile = move_uploaded_file($_FILES['file']['tmp_name'], $path);
                if($moveFile){
                    $sql = " UPDATE tb_file SET 
                            `title` = '$title', 
                            `file_name` = '$file_name',
                            `file_type` = '$file_type',
                            `active` = '$active', 
                            `update_at` = '$update_at' 
                            WHERE `file_id` = '$file_id'";
                    $result = mysqli_query($conn, $sql);   
                    $result = $conn->query($sql);
                    if($result){
                        $_SESSION['err'] = 'upload file successfully !!';
                        header('location: /file_update.php?file_id='.$file_id.'&title='.$title.'&file_name='.$file_name.'&type='.$file_type.'&active='.$active.'');
                    }else{
                        $_SESSION['err'] = 'Upload file Failed !!';
                        header('location: /file_update.php?file_id='.$file_id.'&title='.$title_check.'&file_name='.$file_check.'&type='.$type_check.'&active='.$active_check.'');
                    }
                }else{
                    $_SESSION['err'] = 'Upload file Failed !!'.$_FILES["file"]["error"];
                    header('location: /file_update.php?file_id='.$file_id.'&title='.$title_check.'&file_name='.$file_check.'&type='.$type_check.'&active='.$active_check.'');
                }   
            }else{
                $_SESSION['err'] = 'Not allowed file !!';
                header('location: /file_update.php?file_id='.$file_id.'&title='.$title_check.'&file_name='.$file_check.'&type='.$type_check.'&active='.$active_check.'');
            }
        }else{
            $_SESSION['err'] = 'Empty form upload !!';
            header('location: /file_update.php?file_id='.$file_id.'&title='.$title_check.'&file_name='.$file_check.'&type='.$type_check.'&active='.$active_check.'');
        }
    }else{
        $_SESSION['err'] = 'Not Confrim !!';
        header('location: /file_update.php?file_id='.$file_id.'&title='.$title_check.'&file_name='.$file_check.'&type='.$type_check.'&active='.$active_check.'');
    }
?>
