<?php 
     class tb_user {
          public function __construct(){
               $conn = new mysqli('mysql_db', 'root', 'root', 'test_docker_db');
               $this->dbcon = $conn;
               if($this->dbcon->connect_error){
                    echo "error" . $this->dbcon->connect_error;
               }
          }

          public function findAll(){
               $sql = " ";
               $sql .= " SELECT * FROM tb_user WHERE active = 'Y'";
               $result = mysqli_query($this->dbcon, $sql);
               return $result;
          }

          public function findNumberY(){
               $sql = " SELECT count(user_id) as num FROM tb_user LIMIT 1";
               $result = mysqli_query($this->dbcon, $sql);
               $result_num = mysqli_fetch_assoc($result);
               $num = $result_num['num'];
               return $num;
          }

          public function findById($user_id){
               $sql = " SELECT * FROM tb_user WHERE user_id = '$user_id'";
               $result = mysqli_query($this->dbcon, $sql);
               return $result;
          }

          public function findUserActive($active,$find){
               $list = array();
               $sql =  " SELECT tu.* , count(tf.user_id) as totalfile ";
               $sql .= " FROM tb_user tu";
               $sql .= " LEFT JOIN tb_file tf ON tu.user_id = tf.user_id";
               $sql .= " WHERE tu.active = '$active' AND tu.status = 'user'";
               if(!empty($find)){
                    $sql .= " AND tu.username LIKE '%$find%' "; 
               }
               $sql .= " GROUP BY tu.user_id";
               $result = mysqli_query($this->dbcon, $sql);
               while($row = mysqli_fetch_array($result)){
                    array_push($list, array(
                         "user_id"=> $row['user_id'], 
                         "username"=> $row['username'],
                         "email"=> $row['email'], 
                         "totalfile"=> $row['totalfile'],
                         "create_at"=> $row['create_at'], 
                         "status"=> $row['status']
                    ));
                }
               return $result;
          }
     }
?>