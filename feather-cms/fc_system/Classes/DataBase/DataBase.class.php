<?php

    namespace  DataBase;

    include_once 'Database_Info.config.php';

    use Database_Info;
    use mysqli;
    use API;

    class DataBase extends Database_Info{

            protected  $db_host;
            protected  $db_name;
            protected  $db_user;
            protected  $db_password;
            private $api;

            public function __construct() {
                $db_info = new DataBase_Info;
                $this->db_host = $db_info->db_host;
                $this->db_name = $db_info->db_name;
                $this->db_user = $db_info->db_user;
                $this->db_password = $db_info->db_password;
                $this->api = new API;
            }

            public function Get_Db_Info() {
                return $database = array($this->db_host, $this->db_name, $this->db_user, $this->db_password);
            }

            public function db_connect() {

                    $connect = @new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);

                    global $debuger_errors;

                    if($connect->connect_errno) {

                        error_reporting(1);

                        if(!isset($_SESSION['debuger_errors'])) {
                            $_SESSION['debuger_errors'] = array();
                        }

                        $debuger_errors = $_SESSION['debuger_errors'];

                        if(!in_array('Fatal: '.$connect->connect_error, $debuger_errors)) {
                            
                            echo "Failed connection to database! Use debuger for potentional fix.<br>";

                            $this->api->PushToDebuger('debuger_errors', 'Fatal: '.$connect->connect_error);

                            return false;
                        }
                    } else {
                        return $connect;
                    }
            }

            public function __destruct()
            {
                
            }
        }