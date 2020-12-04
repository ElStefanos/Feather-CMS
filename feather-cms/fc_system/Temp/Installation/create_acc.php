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

    $stmt = $conn->prepare("SELECT * FROM `fc_admin` WHERE `username` = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    if($rows < 1) {
        $response = array('Error creating account', '0');
        echo json_encode($response);
    } else {
        $response = array('Success creating account', '1');
        echo json_encode($response);
    }

    $stmt->close();
    $conn->close();
?>