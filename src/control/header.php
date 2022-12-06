<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2b5f956b3c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Mitr', sans-serif;
        }
    </style>
</head>
        <div class="row position-sticky top-0 w-100 bg-login" style="height: 60px; z-index: 1000;"  >
            <div class="container">
                <div class="d-flex justify-content-between " style="padding: 4px 4px 4px 140px;">
                    <div class="" style="width: 30%;" >
                        <a href="index.php" class="text-decoration-none">
                            <div class="d-flex justify-content-start">
                                <div style="padding: 8px 0px;">
                                    <img src="controller/tb_file/uploads/file.png"  width="50px" style="height: 40px;">
                                </div>
                                <div class="fw-bolder " style="font-size: 30px; padding: 5px; color: white; margin-left: 8px; ">
                                    F T P
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="text-white" style="width: 50%;">
                        <div class="d-flex justify-content-start fw-bolder " style="padding: 15px 15px 15px 140px;">   
                            <a  href="file_list.php?find=&type_file=all&seanch=find" class=" text-white text-decoration-none">
                                <div class="hoverItems" style="margin-right: 15px;">
                                    Documents
                                </div>
                            </a> 
                            <a  href="file_images.php?find=&type_file=all&seanch=find" class=" text-white text-decoration-none">
                                <div class="hoverItems" style="margin-right: 15px;">
                                    Images
                                </div>
                            </a>
                            <a href="file_save.php?user_id=<?php echo $_SESSION['user_id'] ?>" class=" text-white text-decoration-none">
                                <div class="hoverItems" style="margin-right: 15px;">
                                    Upload File
                                </div>
                            </a>
                            
                            <?php if($_SESSION['status'] === 'admin') : ?>
                            <a href="admin_mode.php?page=admin_dashboard&user_id=<?php echo $_SESSION['user_id'] ?>" 
                            class=" text-white text-decoration-none">
                                <div class="hoverItems" >
                                    Admin Mode
                                </div>
                            </a>
                            <?php endif ?>
                        </div>
                    </div>
                    <div  style="width: 20%;">
                        <div class="d-flex justify-content-between" style="padding: 15px 15px;">
                            <a href="user_update.php?user_id=<?php echo $_SESSION['user_id'] ?>" class="text-white text-decoration-none">
                                <div class="d-flex justify-content-start  fw-bolder text-truncate">
                                    <span class="icon-size" style="top: 2px; margin-right: 6px;"><i class="fa-solid fa-user-secret"></i></i></span>
                                    <span><?php echo $_SESSION['username'] ?></span> 
                                </div>
                            </a>
                            <a href="index.php?logout='1'"  class="text-decoration-none">
                                <div class="text-white fw-bolder icon-size" style="margin-left: 10px;">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </div>
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

</html>