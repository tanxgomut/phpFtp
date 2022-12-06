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
    <title>File Update - FTP</title>
</head>
<?php require 'control/header.php' ?>
<body class="bg-login">
    <div class="container ">
        <div class="row" style="margin: 50px 0px; padding: 0px 30%;">
         <!-- noti -->
         <?php if(isset($_SESSION['err'])) : ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['err']; unset($_SESSION['err']); ?>
            </div>
        <?php endif ?> 
        <!--  -->
            <div class="card shadow" style="width: 100%;">
                <div class="fw-bolder mt-4 text-center" >
                    <h1>File Update</h1>
                </div>
                <div class="card-body">
                    <form action="controller/tb_file/update.php?file_id=<?php echo $_GET['file_id'] ?>&title=<?php echo $_GET['title'] ?>&file_name=<?php echo $_GET['file_name'] ?>&type=<?php echo $_GET['type'] ?>&active=<?php echo $_GET['active'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input name="title" id="title" type="text" class="form-control " placeholder="title"
                             value="<?php echo $_GET['title'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">file</label>
                            <input name="file" id="thefile" type="file" class="form-control streched-link" 
                            accept=".png, .jpg, .docx, .doc, application/pdf" 
                            >
                        </div>
                        <div class="mb-3">
                            <?php if($_GET['type'] === 'doc' || $_GET['type'] === 'docx' || $_GET['type'] === 'pdf'){ ?>
                            <div class="card <?php echo ($_GET['type'] === 'docx' ? " alert-primary text-primary" : ($_GET['type'] === 'doc' ? " alert-info text-info" : " alert-danger text-danger") ) ?> ">
                                <div class="card-body ">
                                    <?php echo $_GET['file_name'] ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($_GET['type'] === 'png' || $_GET['type'] === 'jpg'){ ?>
                            <div class="card">
                                <div class="card-body align-center">
                                    <img class="img-update" src="controller/tb_file/uploads/<?php echo $_GET['file_name'] ?>"  >
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Active</label>
                                <select name="active" type="text" class="form-select" aria-label="Default select example">
                                    <option value="N" <?php echo ($_GET['active'] === 'N') ? " selected" : '' ?>>N</option>
                                    <option value="Y" <?php echo ($_GET['active'] === 'Y') ? " selected" : '' ?>>Y</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <label class="cursor-pointer text-primary"  onclick="cancel()" style="padding: 7px 0px; cursor: pointer;">Cancel</label>

                            <!-- <input data-id="<?php echo $_GET['file_id']?>" type="" name="save" value="upload" class=" uploads-btn btn bg-login rounded-pill text-white"> -->
                            <input onclick="return confirm('Are you sure To upload !!')" type="submit" name="save" value="upload" class=" uploads-btn btn bg-login rounded-pill text-white">

                            <?php if($_GET['type'] === 'png' || $_GET['type'] === 'jpg') { ?>
                                <a href="file_images.php?find=&type_file=all&seanch=find"  class="text-decoration-none" style="padding: 7px 0px;">
                                    Back
                                </a>
                            <?php } ?>
                            <?php if($_GET['type'] === 'doc' || $_GET['type'] === 'docx' || $_GET['type'] === 'pdf') { ?>
                                <a href="file_list.php?find=&type_file=all&seanch=find" class="text-decoration-none" style="padding: 7px 0px;">
                                   Back
                                </a>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function cancel(){
            const urlParams = new URLSearchParams(window.location.search);
            const title = urlParams.get('title');
            document.getElementById('title').value = title;
            document.getElementById('thefile').value = null;
        }
        // $('uploads-btn').click(function(e){
        //     var file_id = $(this).data('id');
        //     e.preventDefault();
        // });

        // function uploadFile(file_id){
        //     Swal.fire({
        //         title: 'Are you sure ? ',
        //         text: 'to upload file',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonText: '#d33',
        //         confirmButtonText: 'Yes , Upload now!',
        //     })
        // }
    </script> 
    
</body>
</html>