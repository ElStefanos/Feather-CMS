<?php

include '../../Classes/DataBase/DataBase_info.config.php';
include '../../Classes/DataBase/DataBase.class.php';
include '../../Source/API_PHP/fc_api_1.0a.php';


    $db = new DataBase\DataBase;
    $conn = $db->db_connect();

    $stmt = $conn->prepare("INSERT INTO `fc_info` (`web_name`, `date`) VALUES (?, ?)");
    $stmt->bind_param("ss", $web_name, $date);

    $web_name = $_POST['wn'];
    $date = date('Y-m-d H:i:s');
    $stmt->execute();
    $stmt->close();
    $conn->close();
?>