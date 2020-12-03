<?php
include '../../Classes/DataBase/DataBase_info.config.php';
include '../../Classes/DataBase/DataBase.class.php';
include '../../Source/API_PHP/fc_api_1.0a.php';


    $db = new DataBase\DataBase;
    $conn = $db->db_connect();

    $stmt = $conn->prepare("INSERT INTO `fc_admin` (`id`, `username`, `password`, `permission`) VALUES (NULL, ?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $permission);

    $username = $_POST['au'];
    $password = $_POST['ap'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $permission = 'root';
    $stmt->execute();
    $stmt->close();
    $conn->close();
?>