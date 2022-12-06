<?php 
    class tb_file {
        public function __construct(){
            $conn = new mysqli('mysql_db', 'root', 'root', 'test_docker_db');
            $this->dbcon = $conn;
            if($this->dbcon->connect_error){
                echo "error" . $this->dbcon->connect_error;
           }
        }

        public function findAll(){
            $sql = " ";
            $sql .= " SELECT tu.username, tu.email, tu.status, tf.*";
            $sql .= " FROM `tb_file` tf";
            $sql .= " LEFT JOIN tb_user tu ON tf.`user_id` = tu.`user_id`";
            $sql .= " WHERE tf.active = 'Y'";
            $result = mysqli_query($this->dbcon, $sql);
            return $result;
        }

        public function findById($file_id){
            $sql = " ";
            $sql .= " SELECT tu.username, tu.email, tu.status, tf.*";
            $sql .= " FROM `tb_file` tf";
            $sql .= " LEFT JOIN tb_user tu ON tf.`user_id` = tu.`user_id`";
            $sql .= " WHERE tf.file_id = '$file_id'";
            $result = mysqli_query($this->dbcon, $sql);
            return $result;
        }

        public function findFilterDoc($title, $type_file ){
            $sql = " ";
            $sql .= " SELECT tu.username, tu.email, tu.status, tf.*";
            $sql .= " FROM `tb_file` tf";
            $sql .= " LEFT JOIN tb_user tu ON tf.`user_id` = tu.`user_id`";
            $sql .= " WHERE tf.active = 'Y'  ";
            if(!empty($title) && $type_file != 'all'){
                $sql .= "       AND (tf.module LIKE '%$title%' OR tf.title LIKE '%$title%')";
                $sql .= "       AND tf.file_type = '$type_file' ";
            }else if(!empty($title) && $type_file === 'all'){
                $sql .= "       AND (tf.module LIKE '%$title%' OR tf.title LIKE '%$title%')";
                $sql .= "       AND (tf.file_type = 'doc' OR tf.file_type = 'docx' OR tf.file_type = 'pdf')";
            }else if(empty($title) && $type_file != 'all'){
                $sql .= "       AND tf.file_type = '$type_file' ";
            }else if(empty($title) && $type_file === 'all'){
                $sql .= "       AND (tf.file_type = 'doc' OR tf.file_type = 'docx' OR tf.file_type = 'pdf')";
            }
            $result = mysqli_query($this->dbcon, $sql);
            return $result;
        }

        public function findTypeDoc(){
            $sql = " SELECT file_type FROM `tb_file` WHERE file_type  = 'doc' OR  file_type  = 'docx' OR  file_type  = 'pdf' GROUP BY file_type";
            $result = mysqli_query($this->dbcon, $sql);
            return $result;
        }

        public function findFilterImg($title, $type_file ){
            $sql = " ";
            $sql .= " SELECT tu.username, tu.email, tu.status, tf.*";
            $sql .= " FROM `tb_file` tf";
            $sql .= " LEFT JOIN tb_user tu ON tf.`user_id` = tu.`user_id`";
            $sql .= " WHERE tf.active = 'Y'  ";
            if(!empty($title) && $type_file != 'all'){
                $sql .= "       AND (tf.module LIKE '%$title%' OR tf.title LIKE '%$title%')";
                $sql .= "       AND tf.file_type = '$type_file' ";
            }else if(!empty($title) && $type_file === 'all'){
                $sql .= "       AND (tf.module LIKE '%$title%' OR tf.title LIKE '%$title%')";
                $sql .= "       AND (tf.file_type = 'jpg' OR tf.file_type = 'png')";
            }else if(empty($title) && $type_file != 'all'){
                $sql .= "       AND tf.file_type = '$type_file' ";
            }else if(empty($title) && $type_file === 'all'){
                $sql .= "       AND (tf.file_type = 'jpg' OR tf.file_type = 'png')";
            }
            $result = mysqli_query($this->dbcon, $sql);
            return $result;
        }

        public function findTypeImg(){
            $sql = " SELECT file_type FROM `tb_file` WHERE file_type  = 'png' OR  file_type  = 'jpg' GROUP BY file_type";
            $result = mysqli_query($this->dbcon, $sql);
            return $result;
        }

        public function findUserFile($user_id){
            $sql =  " SELECT *, DATE(create_at) as fomatDate FROM `tb_file` ";
            $sql .= " WHERE `user_id` = '$user_id' AND active = 'Y' ";
            $sql .= " ORDER BY create_at DESC ";
            $result = mysqli_query($this->dbcon, $sql);
            return $result;
        }

        public function chart(){
            $chart_list = array();
            $sql = " SELECT file_type as x , COUNT(file_id) as y ";
            $sql .= " FROM `tb_file` WHERE active = 'Y' GROUP BY file_type ";
            $result = mysqli_query($this->dbcon, $sql);
            while($row = mysqli_fetch_array($result)){
                array_push($chart_list, array("x"=> $row['x'], "y"=> $row['y']));
            }
            return $chart_list;
        }

        public function rankFile(){
            $rank_list = array();
            $sql = " SELECT file_type ,COUNT(file_type) totalFile FROM `tb_file`";
            $sql .= " WHERE active = 'Y' GROUP BY file_type ORDER BY totalFile DESC";
            $result = mysqli_query($this->dbcon, $sql);
            while($row = mysqli_fetch_array($result)){
                array_push($rank_list, array("file_type"=> $row['file_type'], "totalFile"=> $row['totalFile']));
            }
            return $rank_list;
        }
    }
?>