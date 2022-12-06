<?php

    $conn = new mysqli('mysql_db', 'root', 'root', 'test_docker_db');

    if($conn->connect_error){
        echo '<script>alert("เชื่อมต่อฐานข้อมูลผิดพลาด")</script>';
    }
?>