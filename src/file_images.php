<?php
    session_start();
    require 'config.php';
    include_once('controller/tb_file/get.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/2b5f956b3c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>File Images - FTP</title>
</head>
<?php require 'control/header.php' ?>
<body class="bg-light">
    <div class="container mt-3 ">
        <form action="" method="GET">
            <div class="d-flex justify-content-start">
                <h2 class="fw-bolder" style="width: 25%; margin: 0px; padding: 2px 0px;">
                    Flie Images
                </h2>
                <input name="find" type="text" value="<?php echo isset($_GET['find']) ? $_GET['find'] : '' ?>" class="form-control"  placeholder="To Find" style="width: 50%;">
                <select name="type_file" class="form-select" aria-label="Default select example" style="margin-left: 8px; width: 20%;">
                    <option value="all" >all</option>
                    <?php 
                        $tb_file_img = new tb_file();
                        $file_list_img = $tb_file_img->findTypeImg(); 
                        while($row = mysqli_fetch_array($file_list_img)){
                    ?>
                        <option value="<?php echo $row['file_type'] ?>" 
                           <?php echo (isset($_GET['find'])) ? (empty($_GET['type_file']) ? " " : (($_GET['type_file'] === $row['file_type']) ? " selected" : " ") ) : " " ?> >
                            <?php echo $row['file_type'] ?>
                        </option>
                    <?php  } ?>
                </select>
                <button type="submit" value="find" name="seanch" class="btn alert-primary text-primary" 
                        style="margin-left: 8px ; width: 5%;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                </button>    
            </div>
        </form>
        <!--  -->
            <?php 
                $tb_file_Img = new tb_file();
                $file_Img = $tb_file_Img->findFilterImg($_GET['find'],$_GET['type_file']); 
               ?>
            <div class="row mt-3">
                <?php while($row = mysqli_fetch_array($file_Img)){ ?>
                    <div class="col-md-2 mb-2" >
                        <div class="card">
                            <div style="height: 170px;">
                                <img src="controller/tb_file/uploads/<?php echo $row['file_name'] ?>" class="card-img-top " style="height: 170px;">
                            </div>
                            <div class="card-body">
                                <p class="card-text text-truncate">
                                    <?php echo $row['title'] ?>
                                </p>
                                <div class="d-flex justify-content-end">
                                    <?php if($_SESSION['status'] === 'admin') : ?>
                                    <span>
                                        <a href="file_update.php?file_id=<?php echo $row['file_id'] ?>&title=<?php echo $row['title'] ?>&file_name=<?php echo $row['file_name'] ?>&type=<?php echo $row['file_type'] ?>&active=<?php echo $row['active'] ?>">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </span>
                                    <?php endif?>
                                <span style="margin-left: 8px;">
                                        <a style="<?php echo $row['file_type'] === 'png' ? " color: rgba(103,24,101,1);" : " color: rgb(224, 91, 171);" ?> "
                                            href="controller/tb_file/uploads/<?php echo $row['file_name'] ?>"  download>
                                            <i class="fa-solid fa-download"></i>
                                        </a>
                                </span>
                                </div> 
                            </div>
                        </div>
                    </div>
                <?php  }  ?>
            </div>
    </div>
</body>
</html>