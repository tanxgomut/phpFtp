<?php    
    require 'config.php';
    include_once('controller/tb_user/get.php');
?>
<div class="container ">
        <form action="" method="GET" class="mb-2" > 
            <div class="d-flex justify-content-start">
                <input hidden name="page" value="admin_account" >
                <input hidden name="user_id" value="<?php echo $_SESSION['user_id'] ?>" >
                <input hidden name="active" value="<?php echo $_GET['active'] ?>" >
                <input name="find" type="text" value="<?php echo isset($_GET['find']) ? $_GET['find'] : '' ?>" 
                    class="form-control"  placeholder="To Find" style="width: 95%;">
                
                <button type="submit" value="find" class="btn alert-primary text-primary" 
                        style="margin-left: 8px ; width: 5%;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                </button>    
            </div>
        </form>
         <!-- active Y -->
        <?php if($_GET['page'] === 'admin_account' && $_GET['active'] === 'Y'){ ?>
                <table class="table table-borderless" id="dtBasicExample" >
                    <thead>
                        <tr>
                            <th scope="col">#NO</th>
                            <th scope="col">Code</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Total File</th>
                            <th scope="col">Create</th>
                            <th scope="col">Status</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $tb_user_y = new tb_user();
                        $user_list_y = $tb_user_y->findUserActive($_GET['active'],$_GET['find']); 
                        $index = 1;
                        foreach($user_list_y as $row){ 
                    ?>
                        <tr>
                            <th><?php echo $index++ ?></th>
                            <td><?php echo $row['user_id'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['totalfile'] ?></td>
                            <td><?php echo $row['create_at'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td class="text-primary">
                                <a href="user_update.php?user_id=<?php echo $row['user_id']?>"> <i class="fa-solid fa-pencil"></i></a>
                            </td>
                        </tr>
                    <?php  }  ?>
                    </tbody>
                </table>
        <?php } ?>




                    <!-- active N -->
        <?php if($_GET['page'] === 'admin_account' && $_GET['active'] === 'N'){ ?>
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">#NO</th>
                            <th scope="col">Code</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Total File</th>
                            <th scope="col">Create</th>
                            <th scope="col">Status</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $tb_user_n = new tb_user();
                        $user_list_n = $tb_user_n->findUserActive($_GET['active'],$_GET['find']); 
                        $num = 1;
                        foreach($user_list_n as $row){
                    ?>
                        <tr>
                            <th><?php echo $num++ ?></th>
                            <td><?php echo $row['user_id'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['totalfile'] ?></td>
                            <td><?php echo $row['create_at'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td class="text-primary">
                                <a href="user_update.php?user_id=<?php echo $row['user_id']?>"> <i class="fa-solid fa-pencil"></i></a>
                            </td>
                        </tr>
                    <?php  }  ?>
                    </tbody>
                </table>
        <?php } ?>
</div>