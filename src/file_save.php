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
    <title>File Uploads - FTP</title>
</head>
<?php require 'control/header.php' ?>
<body class="bg-login">
    <div class="container mt-3">
        <div class="row" style="margin: 50px 0px; padding: 0px 30%;">
         <!-- noti -->
         <?php if(isset($_SESSION['err'])) : ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['err']; unset($_SESSION['err']); ?>
            </div>
        <?php endif ?>
        <!--  -->
            <div class="card shadow" style="width: 100%;">
                <div class="mt-4 text-center" >
                    <h1>file Upload</h1>
                </div>
                <div class="card-body">
                    <form action="controller/tb_file/save.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input name="title" type="text" class="form-control " placeholder="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">file</label>
                            <input name="file" type="file" require class="form-control streched-link" 
                            accept=".png, .jpg, .docx, .doc, application/pdf" >
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="submit" name="save" value="Upload" class="btn bg-login rounded-pill text-white">
                            <a href="index.php">back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>